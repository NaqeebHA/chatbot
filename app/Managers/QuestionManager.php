<?php

namespace App\Managers;

use Illuminate\Support\Facades\Auth;

use App\Models\Question;
use App\Managers\DebtManager;
use App\Managers\DebtorManager;

class QuestionManager
{
    protected $model;
    protected $debtManager;
    protected $debtorManager;

    public function __construct(Question $model,  DebtManager $debtManager, DebtorManager $debtorManager)
    {
        $this->model = $model;
        $this->debtManager = $debtManager;
        $this->debtorManager = $debtorManager;
    }

    public function getStarterQuestions()
    {
        $questionEntities = $this->model
            ->select()
            ->where('is_starter', '=', '1')
            ->get();
        
        foreach($questionEntities as $questionEntity) {
            $questionEntity['answer'] = $this->mergeField($questionEntity['answer']);
        } 

        return $questionEntities;
    }

    public function getFollowupQuestions($id)
    {
        $column = $this->model
            ->select('followup_question_ids')
            ->where('id', '=', $id)
            ->get();
        $fids = explode(",", $column[0]['followup_question_ids']);
        foreach ($fids as $fid){
            $questionEntities[] = $this->model->find($fid);
        }
        
        foreach($questionEntities as $questionEntity) {
            $questionEntity['answer'] = $this->mergeField($questionEntity['answer']);
        } 
        
        return $questionEntities;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data)
    {
        $modelToUpdate = $this->model->find($data['id']);
        return $modelToUpdate->updateOrFail($data);
    }

    public function delete($id)
    {
        $modelToDelete = $this->model->find($id);
        return $modelToDelete->delete();
    }

    private function mergeField($answer)
    {
        $debtor = $this->debtorManager;
        $debt = $this->debtManager;

        $answer = str_replace('[account_number]', $debtor->getAccountNumber(), $answer);
        $answer = str_replace('[debt_type]', implode(', ', $debt->getDebtTypes()), $answer);
        $answer = str_replace('[total_amount]', implode(', ',$debt->getTotalAmounts()), $answer);
        $answer = str_replace('[sum_total_amount]', $debt->getSumTotalAmounts(), $answer);
        $answer = str_replace('[paid_amount]', implode(', ',$debt->getPaidAmounts()), $answer);
        $answer = str_replace('[outstanding_balance]', implode(', ',$debt->getOutstandingBalances()), $answer);
        $answer = str_replace('[due_date]', implode(', ',$debt->getDueDates()), $answer);
        $answer = str_replace('[next_due_date]', $debt->getNextPaymentDue(), $answer);
        $answer = str_replace('[next_outstanding_balance]', $debt->getNextOutstandingBalance(), $answer);

        return  $answer;
    }
}
