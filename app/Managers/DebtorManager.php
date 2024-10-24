<?php

namespace App\Managers;

use Illuminate\Support\Facades\Auth;

use App\Models\Debtor;

class DebtorManager
{
    protected $model;

    public function __construct(Debtor $model)
    {
        $this->model = $model;
    }

    protected function getDebtor()
    {
        return Auth::user()->debtor;
    }

    public function getAccountNumber()
    {
        $debtor = $this->getDebtor();
        return $debtor->account_number;
    }
}
