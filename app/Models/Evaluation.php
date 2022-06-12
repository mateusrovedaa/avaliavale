<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function evaluationQuestions() {
        return $this->hasMany(EvaluationQuestion::class);
    }

    public function comment() {
        return $this->belongsTo(Comment::class);
    }
}
