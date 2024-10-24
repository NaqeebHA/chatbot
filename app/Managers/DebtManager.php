<?php

namespace App\Managers;

use Illuminate\Support\Facades\Auth;

use App\Models\Debt;
use Carbon\Carbon;

class DebtManager
{
    protected $model;

    public function __construct(Debt $model)
    {
        $this->model = $model;
    }

    protected function getDebts()
    {
        return Auth::user()->debtor->debts;
    }

    public function getDebtTypes()
    {
        $debts = $this->getDebts();
        $types = array();
        foreach ($debts as $debt) {
            $types[] = $debt->debt_type;
        }
        return $types;
    }

    public function getTotalAmounts()
    {
        $debts = $this->getDebts();
        $amounts = array();
        foreach ($debts as $debt) {
            $amounts[] = $debt->total_amount;
            
        }
        return $amounts;
    }

    public function getSumTotalAmounts()
    {
        $amounts = $this->getTotalAmounts();
        return 'RM'.array_sum($amounts);
    }

    public function getPaidAmounts()
    {
        $debts = $this->getDebts();
        $paid = array();
        foreach ($debts as $debt) {
            $paid[] = $debt->paid_amount;
        }
        return $paid;
    }

    public function getSumPaidAmount()
    {
        $amounts = $this->getPaidAmounts();
        return 'RM'.array_sum($amounts);
    }

    public function getOutstandingBalances()
    {
        $debts = $this->getDebts();
        $outstanding = array();
        foreach ($debts as $debt) {
            $outstanding[] = 'RM'.$debt->outstanding_balance;
        }
        return $outstanding;
    }

    public function getNextOutstandingBalance()
    {
        $date = Carbon::parse($this->getNextPaymentDue())->format('Y-m-d');
        $debt = $this->model
            ->select('outstanding_balance')
            ->where('due_date', '=',  $date)
            ->where('debtor_id',  '=', Auth::user()->debtor->id)
            ->first()
            ->outstanding_balance;
        return 'RM'.$debt;
    }

    public function getDueDates()
    {
        $debts = $this->getDebts();
        $dates = array();
        foreach ($debts as $debt) {
            $dates[] = Carbon::parse($debt->due_date)->format('d-m-Y');
        }
        return $dates;
    }

    public function getNextPaymentDue()
    {
        $dates = $this->getDueDates();

        $futureDates = array_filter($dates, function ($date) {
            return Carbon::parse($date)->isFuture();
        });
        usort($futureDates, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });

        return !empty($futureDates) ? $futureDates[0] : null;
    }
}
