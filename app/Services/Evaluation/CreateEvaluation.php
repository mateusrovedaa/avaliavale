<?php

declare(strict_types=1);

namespace App\Services\Evaluation;

use App\Models\Evaluation;
use App\Models\User;
use App\Services\Evaluation\EvaluationQuestion\CreateEvaluationQuestion;
use Illuminate\Support\Collection;

class CreateEvaluation
{
    private CreateEvaluationQuestion $createEvaluationQuestionService;

    public function __construct(CreateEvaluationQuestion $createEvaluationQuestionService)
    {
        $this->createEvaluationQuestionService = $createEvaluationQuestionService;
    }

    public function handle(array $data, User $loggedUser): Evaluation
    {
        $evaluation = new Evaluation;

        $evaluation->company_id = $data['company_id'];
        $evaluation->user_id = $loggedUser->id;
        $evaluation->comment = $data['comment'];

        $evaluation->save();

        $this->createEvaluationQuestions($evaluation, $data['answer']);

        return $evaluation;
    }

    private function createEvaluationQuestions(Evaluation $evaluation, array $answers): void
    {
        collect($answers)
            ->each(fn($anwser, $questionId) =>
                $this->createEvaluationQuestionService
                    ->handle($evaluation, $anwser, $questionId)
            );
    }
}