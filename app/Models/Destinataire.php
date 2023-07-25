<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinataire extends Model
{
    use HasFactory;
    protected $table = 'destinataire';
    protected $fillable = ['nom', 'prenom'];

    public function transferts()
    {
        return $this->hasMany(Transfert::class, 'destinataire_id');
    }
}
