<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;
    protected $table = 'especies';

    protected $fillable = [
        'id',
        'tipo',        
    ];

    public function animal()
    {
        return $this->hasMany(Animal::class, 'especie_id');
    }

}
