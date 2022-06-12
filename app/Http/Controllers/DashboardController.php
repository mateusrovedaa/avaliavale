<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;
use stdClass;

class DashboardController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::with(['company', 'evaluationQuestions.question'])
             ->latest()
             ->get();
        $formattedEvaluations = [];

        foreach ($evaluations as $evaluation)
        {
            $formattedEvaluation = new stdClass;

            $formattedEvaluation->id = $evaluation->id;
            $formattedEvaluation->comment = $evaluation->comment->comment;
            $formattedEvaluation->comment_id = $evaluation->comment->id;
            $formattedEvaluation->thread = $this->getEvaluationThread($evaluation);
            $formattedEvaluation->companyLogo = $evaluation->company->logo;
            $formattedEvaluation->companyName = $evaluation->company->name;
            $formattedEvaluation->categoryName = $evaluation->company->category->name;
            $formattedEvaluation->grade = $evaluation->grade;

            $formattedEvaluations[] = $formattedEvaluation;
        }

        return view('welcome', ['evaluations' => $formattedEvaluations]);
    }

    private function getEvaluationThread(Evaluation $evaluation) {
        $sql = <<<SQL
with recursive cte (id, comment, parent_id, depth, path) as (
select     id,
             comment,
             parent_id,
            1 as depth,
            CONCAT(id) AS `path`
  from       comments
  where      parent_id = $evaluation->comment_id
  union all
  select     p.id,
             p.comment,
             p.parent_id,
             depth + 1 as depth,
             CONCAT(cte.path, ' > ', p.id)
  from       comments p
  inner join cte
          on p.parent_id = cte.id
)
select * from cte order by path;
SQL;

        return DB::select($sql);
    }
}
