<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Evaluation;
use App\Models\EvaluationQuestion;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function create(Company $company)
    {
        $company->load(['questions']);

        return view('evaluation.create', compact(['company']));
    }

    public function store(Request $request) {
        $evaluation = new Evaluation;

        $evaluation->company_id = $request->input('company_id');
        $evaluation->user_id = auth()->user()->id;
        $evaluation->save();

        foreach ($request->get('answer') as $key => $answer)
        {
            $evaluationQuestion = new EvaluationQuestion;
            $evaluationQuestion->evaluation_id = $evaluation->id;
            $evaluationQuestion->question_id = $key;
            $evaluationQuestion->answer = $answer;
            $evaluationQuestion->save();
        }

        return redirect('dashboard');
    }
}
