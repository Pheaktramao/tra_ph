<?php

namespace App\Models;

// use App\Models\Supervisor\Branch;

use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelivererInBranch extends Model
{
    use HasFactory;

    protected $fillable = ['deliverer_id', 'branch_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'deliverer_id');
    }
    public function branch()
    {
        return $this->belongsTo(BranchResource::class,'branch_id');
    }
}
