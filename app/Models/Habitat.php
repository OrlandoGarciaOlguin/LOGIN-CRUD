<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    use HasFactory;
    protected $table = 'habitats';

    protected $fillable = [
        'id',
        'tipo',        
    ];

    public function animal()
    {
        return $this->hasMany(Animal::class, 'habitat_id');
    }

}
