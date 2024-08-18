<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Joueur;
use App\Models\User;


class Parente extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'joueur_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enfants()
    {
        return $this->hasMany(Joueur::class, 'parente_id');
    }
}

