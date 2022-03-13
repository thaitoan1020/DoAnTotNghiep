<?php

namespace App\Exports;

use App\Models\hocphan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class ctdt_hocphan_khoikienthucExport implements 
FromView,
    ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('export.ctdt_khoikienthuc',[
            'ctdt_hocphan' => hocphan::join('ctdt_hocphan','hocphan.id','=','ctdt_hocphan.hocphan_id')
            ->join('khoikienthuc','hocphan.khoikienthuc_id','=','khoikienthuc.id')
            ->orderBy('khoikienthuc.id','asc')
            ->get()
        ]);
    }
}
