<?php

namespace App\Imports;

use App\Models\hocphan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class hocphanImport implements
    ToModel,
    WithHeadingRow
{
    public function model(array $row)
    {
        return new hocphan([
            'loaihocphan_id' => $row['loaihocphan_id'],
            'nhomhocphan_id' => $row['nhomhocphan_id'],
            'khoikienthuc_id' => $row['khoikienthuc_id'],
            'nhomgiangvien_id' => $row['nhomgiangvien_id'],
            'mahocphan' => $row['mahocphan'],
            'tenhocphantiengviet' => $row['tenhocphantiengviet'],
            'tenhocphantienganh' => $row['tenhocphantienganh'],
            'dkhocphantienquyet' => $row['dkhocphantienquyet'],
            'dkhocphansonghanh' => $row['dkhocphansonghanh'],
            'dkhocphanhoctruoc' => $row['dkhocphanhoctruoc'],
            'sotinchi' => $row['sotinchi'],
            'sotietlythuyet' => $row['sotietlythuyet'],
            'sotietthuchanh' => $row['sotietthuchanh'],
            'nhomhocphantuchon_id' => $row['nhomhocphantuchon_id'],
            'hocky' => $row['hocky'],
            'filedinhkem' => $row['filedinhkem'],
            'mota' => $row['mota'],
            'ghichu' => $row['ghichu'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}
