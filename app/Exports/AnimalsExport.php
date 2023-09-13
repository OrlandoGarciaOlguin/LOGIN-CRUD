<?php

namespace App\Exports;

use App\Models\Animal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnimalsExport implements FromCollection, WithHeadings
{

    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Animal::select(
            'id',
            'nombre',
            'latin',
            'descripcion',
            'img',
            'habitat_id',
            'especie_id',            
        )->get();
    }

    public function headings(): array
    {
        return ["id", "nombre", "latin", "descripcion", "img", "habitat_id", "especie_id"];
    }
}