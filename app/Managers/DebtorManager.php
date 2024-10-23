<?php

namespace App\Managers;

use App\Models\Debtor;

class DebtorManager
{
    protected $model;

    public function __construct(Debtor $model)
    {
        $this->model = $model;
    }
}
