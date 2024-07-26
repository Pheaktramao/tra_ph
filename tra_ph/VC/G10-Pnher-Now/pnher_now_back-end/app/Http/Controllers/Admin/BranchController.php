<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch as ModelsBranch;
use App\Models\Company as ModelsCompany;
use App\Models\Supervisor\Branch;
use App\Models\Supervisor\Company;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Branch access|Branch create|Branch edit|Branch delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Branch create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Branch edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Branch delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = ModelsBranch::all();
        $branches = BranchResource::collection($branches);
        return view('branch.index', ['branches' => $branches], compact('branches'));
        // return view('branch.index', ['branches' => $branches]);
        // return view('branch.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supervisors = User::whereHas('roles', function ($query) {
            $query->where('name', 'supervisor');
        })->whereDoesntHave('branchs')
            ->get();

        $companies = Company::all();
        return view('branch.new', compact('supervisors', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'company_id' => 'required',
            'address' => 'required',
        ]);
        $branch = Branch::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.branch.index')->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::findOrFail($id);

        // Fetch supervisors who don't already have a branch
        $supervisors = User::whereHas('roles', function ($query) {
            $query->where('name', 'supervisor');
        })
            ->whereDoesntHave('branchs')
            ->orWhere('id', $branch->user_id) // Include the current supervisor of the branch
            ->get();

        $companies = Company::all();

        return view('branch.edit', compact('branch', 'supervisors', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'address' => 'required|string|max:255',
        ]);

        // Update the branch
        $branch->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
            'address' => $request->address,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('admin.branch.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->route('admin.branch.index')->with('success', 'Branch deleted successfully.');
    }
}
