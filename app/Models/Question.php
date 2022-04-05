<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property array $valid_answers
 * @property int $category_id
 *
 * @property Category $category
 */
class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'valid_answers',
        'category_id',
    ];

    protected $casts = [
        'valid_answers' => 'array',
        'category_id' => 'int',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
