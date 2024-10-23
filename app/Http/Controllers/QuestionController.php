<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Managers\QuestionManager;

class QuestionController extends Controller
{
    protected $manager;

    public function __construct(QuestionManager $manager)
    {
        $this->manager = $manager;
    }

    public function getStarterQuestions()
    {
        $questions = $this->manager->getStarterQuestions();
        return response()->json($questions);
    }

    public function getFollowupQuestions($id)
    {
        $questions = $this->manager->getFollowupQuestions($id);
        return response()->json($questions);
    }

    public function create($data)
    {
        return response()->json($this->manager->create($data));
    }

    public function update($data)
    {
        return response()->json($this->manager->update($data));
    }

    public function delete($id)
    {
        return response()->json($this->manager->delete($id));
    }
}
