<?php

declare(strict_types=1);

namespace App\Services\Evaluation\EvaluationQuestion;

use App\Models\Evaluation;
use App\Models\EvaluationQuestion;

class CreateEvaluationQuestion
{
    public function handle(Evaluation $evaluation, string $answer, int $questionId): EvaluationQuestion
    {
        $evaluationQuestion = new EvaluationQuestion;
        $evaluationQuestion->evaluation_id = $evaluation->id;
        $evaluationQuestion->question_id = $questionId;
        $evaluationQuestion->answer = $answer;

        $evaluationQuestion->save();

        return $evaluationQuestion;
    }
}
