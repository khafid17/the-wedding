<?php

namespace App\Exports;

use App\Models\Undangan;
use Maatwebsite\Excel\Concerns\FromCollection;

class UndanganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Undangan::all();
    }
}
