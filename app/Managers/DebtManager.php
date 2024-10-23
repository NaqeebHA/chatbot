<?php

namespace App\Managers;

use App\Models\Debt;

class DebtManager
{
    protected $model;

    public function __construct(Debt $model)
    {
        $this->model = $model;
    }
}
