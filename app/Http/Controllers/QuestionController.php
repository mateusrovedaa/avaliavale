<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Category;
use App\Models\Question;
use App\Services\Question\CreateQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Throwable;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with(['category'])->get();
        $formattedQuestions = [];

        foreach ($questions as $question)
        {
            $formattedQuestion = new stdClass;
            $formattedQuestion->id = $question->id;
            $formattedQuestion->name = $question->name;
            $formattedQuestion->type = $this->formatType($question);
            $formattedQuestion->category = $question->category->name;

            $formattedQuestions[] = $formattedQuestion;
        }

        return view('question.index', ['questions' => $formattedQuestions]);
    }

    public function create()
    {
        return view('question.create', ['categories' => Category::all()]);
    }

    public function store(QuestionRequest $request, CreateQuestion $service)
    {
        DB::beginTransaction();
        try {
            $service->handle($request->validated());

            DB::commit();
        } catch (Throwable $exception) {
            report($exception);

            DB::rollBack();

            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return redirect('/questions');
    }

    public function edit(Question $question)
    {
        return view('question.edit', ['question' => $question, 'categories' => Category::all()]);
    }

    private function formatType(Question $question) : string
    {
        return match ($question->type) {
            'text' => 'Texto',
            'number' => 'Número',
            'list' => 'Lista',
        };
    }
}
