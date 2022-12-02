<?php

namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumnosImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumno([
            'path'    => NULL,
            'name'    => NULL,
            'nombre'    => $row[0],
            'cumpleaños'    => $row[1],
            'telefono'    => $row[2],
            'padecimiento'    => $row[3],
        ]);
    }
}
