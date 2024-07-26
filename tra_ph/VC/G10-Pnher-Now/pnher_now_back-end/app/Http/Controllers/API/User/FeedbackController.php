<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function FeedbackList()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function FeedbackPost(Request $request)
    {
        $request->validate([
            // 'user_id' = auth()->user()->id,
            'title' => 'required',
            'comment' => 'required|string',
        ]);

        $feedback = Feedback::create($request->all());

        return response()->json(['message' => 'Feedback submitted successfully', 'data' => $feedback], 201);
    }

    /**
     * Display the specified resource.
     */
    public function GetFeedbackById(string $id)
    {
        //
    }

    public function store(string $request)
    {
        // $request->validate([
        //     // 'user_id' = auth()->user()->id,
        //     'title' => 'required',
        //     'comment' => 'required|string',
        // ]);

        // $feedback = Feedback::create($request->all());

        // return response()->json(['message' => 'Feedback submitted successfully', 'data' => $feedback], 201);
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
        //
    }
}
