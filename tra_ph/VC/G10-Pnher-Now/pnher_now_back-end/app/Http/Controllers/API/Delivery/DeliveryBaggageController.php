<?php

namespace App\Http\Controllers\API\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baggage;
use App\Models\Post;
use App\Models\Delivery_baggage;
use Illuminate\Support\Facades\Response;

class DeliveryBaggageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function GetPost()
    {
        // Retrieve all delivery baggage with their associated posts and users
        $deliveryBaggage = Delivery_Baggage::with('post.user', 'post.baggage')->get();

        // Extract relevant data
        $deliveryBaggageWithUserData = $deliveryBaggage->map(function ($item) {
            return [
                'id' => $item->id,
                'post_id' => optional($item->post)->id,
                'post_title' => optional($item->post)->title,
                'user_name' => optional(optional($item->post)->user)->name,
                'user_email' => optional(optional($item->post)->user)->email,
                'baggage' => $item->post->baggage->map(function ($baggage) {
                    return [
                        'baggage_id' => $baggage->id,
                        'type' => $baggage->type,
                        'weight' => $baggage->weight,
                        'receiver_phone' => $baggage->receiver_phone,
                        'sending_address' => $baggage->sending_address,
                        'company' => $baggage->company,
                        'receiving_address' => $baggage->receiving_address,
                        'status' => $baggage->status,
                    ];
                })->toArray(),
                'status' => $item->status,
            ];
        });

        // Return JSON response
        return Response::json(['data' => $deliveryBaggageWithUserData]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function PostDelivery(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'deliverer_id' => 'required|exists:users,id',
            'status' => 'required|boolean',
        ]);

        // Prepare the data for insertion
        $data = $request->all();

        // Create the delivery baggage entry
        $deliveryBaggage = Delivery_Baggage::create($data);

        // Return a JSON response
        return response()->json(['success' => 'Delivery baggage created successfully!', 'delivery_baggage' => $deliveryBaggage], 201);
    }

    /**
     * Display the specified resource.
     */
    public function GetDelivery(string $id)
    {
        // Retrieve delivery baggage with their associated posts, users, and baggage by ID
        $deliveryBaggage = Delivery_Baggage::with('post.user', 'post.baggage')
            ->where('id', $id)
            ->get();

        // Check if delivery baggage with the specified ID exists
        if ($deliveryBaggage->isEmpty()) {
            return Response::json(['error' => 'Delivery baggage not found.'], 404);
        }

        // Extract relevant data
        $deliveryBaggageWithUserData = $deliveryBaggage->map(function ($item) {
            return [
                'id' => $item->id,
                'post_id' => optional($item->post)->id,
                'post_title' => optional($item->post)->title,
                'user_name' => optional(optional($item->post)->user)->name,
                'user_email' => optional(optional($item->post)->user)->email,
                'baggage' => $item->post->baggage->map(function ($baggage) {
                    return [
                        'baggage_id' => $baggage->id,
                        'type' => $baggage->type,
                        'weight' => $baggage->weight,
                        'receiver_phone' => $baggage->receiver_phone,
                        'sending_address' => $baggage->sending_address,
                        'company' => $baggage->company,
                        'receiving_address' => $baggage->receiving_address,
                        'status' => $baggage->status,
                    ];
                })->toArray(),
                'status' => $item->status,
            ];
        });

        // Return JSON response
        return Response::json(['data' => $deliveryBaggageWithUserData]);
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
