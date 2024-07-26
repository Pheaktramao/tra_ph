<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Correct the view name here, assuming it should be 'admin.supervisors.index'

        return view('setting.supervisor.index');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implement logic to store a new resource
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement logic to show a specific resource identified by $id
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement logic to update a specific resource identified by $id
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement logic to delete a specific resource identified by $id
    }
}
