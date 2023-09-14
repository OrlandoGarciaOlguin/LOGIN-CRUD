<?php

namespace App\Imports;

use App\Models\Animal;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;



class AnimalsImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function model(array $row)
    {
        

        return new Animal([
            'id'     => $row['id'],
           'nombre'    => $row['nombre'], 
           'latin' => $row['latin'],
           'descripcion' => $row['descripcion'],
           'imagen'=> $row['imagen'],
           'habitat_id' => $row['habitat_id'],
           'especie_id' => $row['especie_id'],
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'nullable',
            'nombre' => 'required',
            'latin' => 'required',
            'descripcion' => 'required',
            'imagen' => 'nullable',
            'habitat_id' => 'required',
            'especie_id' => 'required',

        ];
    }

    public function getFileType(): string
    {
        return 'xlsx'; // Especifica el tipo de archivo aquí (xlsx, xls, csv, etc.)
    }
}
