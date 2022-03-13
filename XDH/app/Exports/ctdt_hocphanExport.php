<?php

namespace App\Exports;

use App\ctdt_hocphan;
use Maatwebsite\Excel\Concerns\FromCollection;

class ctdt_hocphanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ctdt_hocphan::all();
    }
}
