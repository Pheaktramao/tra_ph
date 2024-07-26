<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baggage extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 'weight', 'receiver_phone', 'sending_address', 'company', 'receiving_address',  'post_id', 'delivery_status_id'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function deliveryStatus()
    {
        return $this->belongsTo(DeliveryStatus::class, 'delivery_status_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
