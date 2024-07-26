<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelivererAndUser extends Model
{
    use HasFactory;
    protected $fillable = ['deliverer_id', 'user_id'];
}
