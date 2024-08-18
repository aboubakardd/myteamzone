<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Joueur;
use App\Models\orderDetails;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dateDeNaissance',
        'profile_photo_path',
        'typeUser',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function parente()
    {
        return $this->hasOne(Parente::class);
    }

    public function children()
    {
        return $this->hasManyThrough(Joueur::class, Parente::class, 'user_id', 'parente_id');
    }

    public function enfants()
    {
        return $this->hasMany(Joueur::class, 'parent_id');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

public function orderDetails()
{
    return $this->hasMany(OrderDetail::class);
}

}
