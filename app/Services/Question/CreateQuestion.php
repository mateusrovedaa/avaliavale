<?php

declare(strict_types=1);

namespace App\Services\Question;

use App\Models\Question;

class CreateQuestion
{
    public function handle(array $data): Question
    {
        $question = new Question;

        $question->name = $data['name'];
        $question->type = $data['type'];
        $question->valid_answers = $data['valid_answers'] ? explode(',', $data['valid_answers']) : null;
        $question->category_id = $data['category_id'];

        $question->save();

        return $question;
    }
}
