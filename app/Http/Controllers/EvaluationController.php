<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluationRequest;
use App\Models\Company;
use App\Models\Evaluation;
use App\Models\EvaluationQuestion;
use App\Services\Evaluation\CreateEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class EvaluationController extends Controller
{
    public function create(Company $company)
    {
        $company->load(['questions']);

        return view('evaluation.create', compact(['company']));
    }

    public function store(EvaluationRequest $request, CreateEvaluation $service)
    {
        DB::beginTransaction();
        try
        {
            $service->handle($request->validated(), $request->user());

            DB::commit();
        }
        catch (Throwable $exception)
        {
            report($exception);

            DB::rollBack();

            return response()->json([
                'error' => $exception->getMessage(),
            ], 500);
        }

        return redirect('dashboard');
    }
}
