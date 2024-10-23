<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Managers\DebtorManager;

class DebtorController extends Controller
{
    protected $manager;

    public function __construct(DebtorManager $manager)
    {
        $this->manager = $manager;
    }
}
