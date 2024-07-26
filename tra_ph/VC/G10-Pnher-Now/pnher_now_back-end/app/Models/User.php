<?php

namespace App\Models;

use App\Http\Resources\BranchResource;
use App\Models\Supervisor\Branch;
// use App\Models\Branch;
use App\Models\Post;
use App\Models\Baggage;
use App\Models\Branch as ModelsBranch;
use App\Models\Company;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'date_of_birth',
        'profile',
        'current_password',
        'new_password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function updatePassword(string $currentPassword, string $newPassword): bool
    {
        $currentHashedPassword = User::where('id', $this->id)->value('password');
        if (!password_verify($currentPassword, $currentHashedPassword)) {
            return false; // Current password is incorrect
        }
        // Hash the new password
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        // Update the user's password in the database
        return $this->update([
            'password' => $newHashedPassword,
        ]);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function baggage()
    {
        return $this->hasMany(Baggage::class);
    }

    public function branches()
    {
        return $this->hasMany(ModelsBranch::class, 'user_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
}
