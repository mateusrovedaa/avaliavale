<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\Comment\CreateComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CommentController extends Controller
{
    public function create(Request $request, CreateComment $service, ?Comment $comment = null)
    {
        DB::beginTransaction();
        try
        {
            $service->handle($request->all(), $comment);

            DB::commit();
        }
        catch (Throwable $exception)
        {
            report($exception);

            DB::rollBack();

            return response()->json([
                'error' => $exception->getMessage(),
            ], 500);
        }

        return redirect('');
    }
}
