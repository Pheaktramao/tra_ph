<?php

namespace App\Models\Supervisor;

use App\Models\Company;
use App\Models\User;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'company_id', 'address'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     // Relationship with Deliverers
     public function deliverers()
     {
         return $this->hasMany(DelivererInBranch::class);
     }

}
