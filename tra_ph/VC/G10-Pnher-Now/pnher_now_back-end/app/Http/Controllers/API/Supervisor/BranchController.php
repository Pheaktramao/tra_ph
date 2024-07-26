<?php

namespace App\Http\Controllers\API\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
// use App\Models\Branch as ModelsBranch;
// use App\Models\Supervisor\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        // dd(1);
        $branches = Branch::with(['company', 'user'])->get();
        // $branches = Branch::all();
        return BranchResource::collection($branches);
        return response()->json($branches);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'address' => 'required',
        ]);

        $branch = Branch::create($request->all());

        return response()->json($branch, 201);
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        $branch = new BranchResource($branch);
        return response()->json($branch);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>"required",
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'address' => 'required',
        ]);
        
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        $branch = new BranchResource($branch);
        return response()->json($branch, 200);
    }

    public function destroy($id){
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return response()->json(null, 204);
    }
}
