<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\DelivererResource;
use App\Http\Resources\UserResource;
use App\Models\DelivererInBranch;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DelivererController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliverers = DelivererInBranch::all();
        $deliverers = DelivererResource::collection($deliverers);

        $user = auth()->user();
        $branches = $user->branches;
        return view('deliverer.index', compact('deliverers','branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name', 'deliverer')->get();
        $user = auth()->user();
        $branches = $user->branches;

        return view('deliverer.new', compact('roles', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'branch_id' => 'required',
            'role_id' => 'required',
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        DelivererInBranch::create([
            'branch_id' => $request->branch_id,
            'deliverer_id' => $user->id,
        ]);


        $user->syncRoles($request->role_id);
        // $createdUserId = $user->id;
        return redirect()->route('admin.deliverer.index')->withSuccess('Deliverer created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deliverer = User::findOrFail($id);
        $user = User::findOrFail($id);
        $roles = Role::where('name', 'deliverer')->get();
        $branches = $deliverer->branches;
        return view('deliverer.edit', compact('deliverer', 'user', 'roles', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deliverer = DelivererInBranch::findOrFail($id);
        
        $deliverer->user->delete();
        $deliverer->delete();
        return redirect()->route('admin.deliverer.index')->withSuccess('Deliverer deleted successfully.');
    }
}
