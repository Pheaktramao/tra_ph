<?php

namespace Database\Seeders;

use App\Models\deliveryStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::fa ctory(10)->create();
        $this->call(AdminSeeder::class);
        \App\Models\Post::factory(17)->create();
        $this->call(MailsettingSeeder::class);
        $this->call(DeliveryStatusSeeder::class);
    }
}
