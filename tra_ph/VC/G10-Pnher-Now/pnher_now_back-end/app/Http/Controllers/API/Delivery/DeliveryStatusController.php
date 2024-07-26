<?php

namespace App\Http\Controllers\API\Delivery;

use App\Http\Controllers\Controller;
use App\Models\deliveryStatus;
use Illuminate\Http\Request;

class DeliveryStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListStatus()
    {
        $status = deliveryStatus::all();
        return response()->json(['delivery_status' => $status,'message' =>'List Status successfully'],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function DeliveryStatusPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = deliveryStatus::create($request->all());
        return response()->json(['delivery_status' => $data,'message' => 'Delivery Status Created Successfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function DeliverStatusListByid(string $id)
    {
        $status = deliveryStatus::find($id);
        if (!$status) {
            return response()->json(['message' => 'Delivery Status not found'], 404);
        }
        return response()->json(['delivery_status' => $status,'message' => 'Delivery Status details successfully'],200);
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
