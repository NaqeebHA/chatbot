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
    protected $user;

    public function __construct(Question $model,  DebtManager $debtManager, DebtorManager $debtorManager)
    {
        $this->model = $model;
        $this->debtManager = $debtManager;
        $this->debtorManager = $debtorManager;
        $this->user = Auth::user();
    }

    public function getStarterQuestions()
    {
        $questionEntities = $this->model
            ->select()
            ->where('is_starter', '=', '1')
            ->get();
        
        // foreach($questionEntities as $questionEntity) {
        //     $questionEntity['answer'] = $this->mergeField($questionEntity['answer']);
        //     dd($questionEntity['answer']);
        // } 

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
        $debtor = $this->user->debtor;
        $debt = $debtor->debts;

        // $answer = str_replace('[account_number]', $debtor->account_number, $answer);
        // $answer = str_replace('[debt_type]', $debtor['debt_type'], $answer);
        // $answer = str_replace('[total_amount]', $debtor['total_amount'], $answer);
        // $answer = str_replace('[paid_amount]', $debtor['paid_amount'], $answer);
        // $answer = str_replace('[outstanding_balance]', $debtor['outstanding_balance'], $answer);
        // $answer = str_replace('[due_date]', $debtor['due_date'], $answer);

        return  $answer;
    }
}
