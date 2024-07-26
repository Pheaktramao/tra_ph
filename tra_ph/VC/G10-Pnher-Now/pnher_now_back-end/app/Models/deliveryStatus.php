<?php

namespace App\Models;

use App\Models\Baggage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliveryStatus extends Model
{
    use HasFactory;
    protected $table = 'delivery_status'; 
    protected $fillable = ['name'];

    public function baggage()
    {
        return $this->hasMany(Baggage::class);
    }
}
