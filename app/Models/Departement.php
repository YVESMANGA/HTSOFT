<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'nom_departement', 'chef_de_departement_id',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function chefDeDepartement()
    {
        return $this->belongsTo(Employe::class, 'chef_de_departement_id');
    }
    use HasFactory;
}
