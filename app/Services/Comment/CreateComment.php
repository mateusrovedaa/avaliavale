<?php

declare(strict_types=1);

namespace App\Services\Comment;

use App\Models\Comment;

class CreateComment
{
    public function handle(array $data, ?Comment $parent): Comment
    {
        $comment = new Comment;

        $comment->comment = $data['answer'];
        $comment->parent_id = $parent->id ?? null;

        $comment->save();

        return $comment;
    }
}
