<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationQuestion extends Model
{
    use HasFactory;

    protected $table = 'evaluation_questions';

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
