<?php

namespace App\Imports;

use App\Models\ctdt_hocphan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ctdt_hocphanImport implements ToModel,
WithHeadingRow
{
    public function model(array $row)
    {
        return new ctdt_hocphan([
            'ctdt_id' => $row['ctdt_id'],
            'hocphan_id' => $row['hocphan_id'],
            'ghichu' => $row['ghichu'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
