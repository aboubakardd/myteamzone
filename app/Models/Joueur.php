<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'position',
        'birthdate',
        'parente_id'
    ];

    public function statistiques()
    {
        return $this->hasMany(Statistique::class);
    }

    public function parente()
    {
        return $this->belongsTo(Parente::class);
    }
    
    
}
