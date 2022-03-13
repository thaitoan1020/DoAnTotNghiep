<?php

namespace App\Exports;

use App\Models\hocphan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class ctdt_hocphan_hockyExport implements
    FromView,
    ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('export.ctdt_hocky',[
            'ctdt_hocphan' => hocphan::join('ctdt_hocphan', 'hocphan.id', '=', 'ctdt_hocphan.hocphan_id')
            ->orderBy('hocphan.hocky', 'asc')
            ->get()
        ]);
    }
    
}
