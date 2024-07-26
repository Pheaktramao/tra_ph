<?php

namespace App\Models;

use App\Models\Supervisor\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Branch;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

}
