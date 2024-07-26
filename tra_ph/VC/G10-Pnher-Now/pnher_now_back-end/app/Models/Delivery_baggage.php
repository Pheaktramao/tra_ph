<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Delivery_baggage extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'deliverer_id', 'status'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function deliverer()
    {
        return $this->belongsTo(User::class, 'deliverer_id');
    }
}
