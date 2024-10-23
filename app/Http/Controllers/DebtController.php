<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Managers\DebtManager;

class DebtController extends Controller
{
    protected $manager;

    public function __construct(DebtManager $manager)
    {
        $this->manager = $manager;
    }
}
