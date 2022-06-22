<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Category;
use App\Models\Company;
use App\Services\Company\CreateCompany;
use App\Services\Company\UpdateCompany;
use Illuminate\Support\Facades\DB;
use Throwable;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('company.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('company.create', ['categories' => Category::all()]);
    }

    public function dashboard(Company $company)
    {
        return view('company.dashboard', ['company' => $company]);
    }

    public function store(CompanyRequest $request, CreateCompany $service)
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

        return redirect('/companies');
    }

    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company, 'categories' => Category::all()]);
    }

    public function update(Company $company, CompanyRequest $request, UpdateCompany $service)
    {
        DB::beginTransaction();
        try
        {
            $service->handle($company, $request->validated());

            DB::commit();
        }
        catch (Throwable $exception)
        {
            dd($exception);
            report($exception);

            DB::rollBack();

            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception->getCode());
        }

        return redirect('/companies');
    }

//    public function destroy(Category $category)
//    {
//        DB::beginTransaction();
//        try
//        {
//            $category->delete();
//
//            DB::commit();
//        }
//        catch (Throwable $exception)
//        {
//            report($exception);
//
//            DB::rollBack();
//
//            return response()->json([
//                'error' => $exception->getMessage(),
//            ], $exception->getCode());
//        }
//
//        return redirect('/categories');
//    }
}
