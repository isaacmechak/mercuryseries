<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediteur extends Model
{
    use HasFactory;
    protected $table = 'expediteur';
    protected $fillable = ['nom', 'prenom'];

    public function transferts()
    {
        return $this->hasMany(Transfert::class, 'expediteur_id');
    }
}
