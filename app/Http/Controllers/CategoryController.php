<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Category\CreateCategory;
use App\Services\Category\UpdateCategory;
use Illuminate\Support\Facades\DB;
use Throwable;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request, CreateCategory $service)
    {
        DB::beginTransaction();
        try
        {
            $service->handle($request->validated());

            DB::commit();
        }
        catch (Throwable $exception)
        {
            report($exception);

            DB::rollBack();

            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return redirect('/categories');
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Category $category, CategoryRequest $request, UpdateCategory $service)
    {
        DB::beginTransaction();
        try
        {
             $service->handle($category, $request->validated());

            DB::commit();
        }
        catch (Throwable $exception)
        {
            report($exception);

            DB::rollBack();

            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return redirect('/categories');
    }

    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try
        {
            $category->delete();

            DB::commit();
        }
        catch (Throwable $exception)
        {
            report($exception);

            DB::rollBack();

            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return redirect('/categories');
    }
}
