<?php

namespace Database\Seeders;

use App\Models\deliveryStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Pending',
            'PickedUp',
            'InStock',
            'InProgress',
            'Delivered'
        ];

        foreach ($statuses as $status) {
            DB::table('delivery_status')->insert([
                'name' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
