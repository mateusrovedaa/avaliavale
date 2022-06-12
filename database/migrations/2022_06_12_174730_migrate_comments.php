<?php

use App\Models\Comment;
use App\Models\Evaluation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var Evaluation $evalution */
        foreach (Evaluation::all() as $evalution)
        {
            $comment = new Comment;
            $comment->comment = $evalution->comment;
            $comment->save();

            $evalution->comment_id = $comment->id;
            $evalution->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
