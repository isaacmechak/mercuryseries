<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    use HasFactory;
    protected $table = 'transferts';
    protected $fillable = ['devise', 'montant', 'expediteur_id', 'destinataire_id'];

    public function expediteur()
    {
        return $this->belongsTo(Expediteur::class, 'expediteur_id');
    }

    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class, 'destinataire_id');
    }
}
