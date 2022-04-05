<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\Category\CreateCategory;
use App\Services\Category\UpdateCategory;
use Illuminate\Support\Facades\DB;
use Throwable;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(CategoryRequest $request, CreateCategory $service)
    {
        DB::beginTransaction();
        try
        {
            $category = $service->handle($request->validated());

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

        return new CategoryResource($category);
    }

    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    public function update(Category $category, CategoryRequest $request, UpdateCategory $service)
    {
        DB::beginTransaction();
        try
        {
            $category = $service->handle($category, $request->validated());

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

        return new CategoryResource($category);
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

        return new CategoryResource($category);
    }
}
