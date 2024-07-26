<?php

namespace App\Http\Controllers\API\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company as ModelsCompany;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        // $companies = Company::with('branches')->get();
        $companies = Company::all();
        // $totalCompanies = $companies->count();

        // Return the collection along with the count
        // return response()->json([
        //     'total_count' => $totalCompanies,
        //     // 'company' => CompanyResource::collection($companies),
        // ]);
        // return view('admin.dashboard', [
        //     'total_count' => $totalCompanies,
        // ]);
        return response()->json(['success' => true, 'data'=> $companies]);
        // dd(10);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        $company = new CompanyResource($company);
        return response()->json($company);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        $company = new CompanyResource($company);
        return response()->json($company);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $company = Company::create($request->all());

        return response()->json($company, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());
        $company = new CompanyResource($company);

        return response()->json($company);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json(null, 204);
    }
}