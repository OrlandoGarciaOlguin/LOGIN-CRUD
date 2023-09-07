<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'latin',
        'descripcion',
        'img',
        'habitat_id',
        'especie_id',
    ];

    public function habitat(){
        return $this->belongTo(Habitat::class, 'habitat_id');
    }

    public function especie(){
        return $this->belongTo(Especie::class, 'especie_id');
    }
}
