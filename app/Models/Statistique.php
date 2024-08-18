<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    use HasFactory;

    protected $fillable = [
        'joueur_id',
        'matchs_joues',
        'buts',
        'passes_decisives',
        'cartons_jaunes',
        'cartons_rouges',
    ];

    public function joueur()
    {
        return $this->belongsTo(Joueur::class);
    }
}
