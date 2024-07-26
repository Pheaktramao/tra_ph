<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->string('first_name');
            // $table->string('last_name');
            $table->string('address')->nullable();
            // $table->date('date_of_birth')->nullable();
            // Remove the 'name' column if needed (optional)
            // $table->dropColumn('name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('first_name');
            // $table->dropColumn('last_name');
            $table->dropColumn('address');
            // $table->dropColumn('date_of_birth');
        });
    }
};
