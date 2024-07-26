<?php

namespace App\Models;

use App\Models\User;
use App\Models\Delivery_baggage;
use App\Models\Baggage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'publish'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveryBaggages()
    {
        return $this->hasMany(Delivery_Baggage::class);
    }
    public function baggage()
    {
        return $this->hasMany(Baggage::class);
    }
}
