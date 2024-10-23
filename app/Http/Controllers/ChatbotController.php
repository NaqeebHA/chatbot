<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function getStarterQuestions()
    {
        $starterQuestions = [
            "What is my outstanding balance?",
            "When is the next payment due?",
            "How do I make a payment?",
            "What is my account number?",
            "What type of debts do I have?",
            "How do I contact customer service?"
        ];
    }
}
