<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlumnosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alumno::select("id", "nombre", "cumpleaños", "telefono", "padecimiento")->get();
    }

    public function headings(): array
    {
        return ["id", "nombre", "cumpleaños", "telefono", "padecimiento"];
    }
}
