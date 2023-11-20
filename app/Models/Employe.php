<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'nom', 'emploi', 'salaire', 'commission', 'departement_id', 'chef_de_departement_id',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    use HasFactory;
}
