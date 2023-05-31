<?php

namespace App\Exports;

use App\Models\Show;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShowsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Show::all();
    }
}
