<?php

namespace App\Http\Controllers;

use App\Models\nhomhocphan;
use App\Models\loaihocphan;
use Illuminate\Http\Request;
use DB;

class NhomhocphanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Nhomhocphan()
    {
        $nhomhocphan = nhomhocphan::all();
        $loaihocphan = loaihocphan::all();
        return view('admin.nhomhocphan', compact('nhomhocphan','loaihocphan'));
    }
    
    public function postThem_Nhomhocphan(Request $request)
    {
        $this->validate($request, [
            'manhomhocphan' => ['required', 'max:6'],
            'tennhomhocphan' => ['required', 'max:100', 'unique:nhomhocphan'],
            'loaihocphan_id' => ['required'],
            'dkhocphantienquyet' => ['nullable','max:6'],
            'dkhocphanhoctruoc' => ['nullable','max:6'],
            'dkhocphansonghanh' => ['nullable','max:6'],
            'tongsotinchi' => ['required', 'numeric'],
            'sotietlythuyet' => ['nullable','numeric'],
            'sotietthuchanh' =>['nullable','numeric'],
            'hocky' => ['required'],
            
        ]);
        
        $orm = new nhomhocphan();
        $orm->loaihocphan_id = $request->loaihocphan_id;
        $orm->manhomhocphan = $request->manhomhocphan;
        $orm->tennhomhocphan = $request->tennhomhocphan;
        $orm->tongsotinchi = $request->tongsotinchi;
        $orm->sotietlythuyet = $request->sotietlythuyet;
        $orm->sotietthuchanh = $request->sotietthuchanh;
        $orm->dkhocphantienquyet = $request->dkhocphantienquyet;
        $orm->dkhocphanhoctruoc = $request->dkhocphanhoctruoc;
        $orm->dkhocphansonghanh = $request->dkhocphansonghanh;
        $orm->hocky = $request->hocky;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.nhomhocphan');
    }

    public function postSua_Nhomhocphan(Request $request)
    {
        $this->validate($request, [
            'manhomhocphan_edit' => ['required', 'max:6','unique:nhomhocphan,manhomhocphan,'. $request->id_edit],
            'tennhomhocphan_edit' => ['required', 'max:100', 'unique:nhomhocphan,tennhomhocphan,'. $request->id_edit],
            'loaihocphan_id_edit' => ['required'],
            'dkhocphantienquyet_edit' => ['nullable','max:6'],
            'dkhocphanhoctruoc_edit' => ['nullable','max:6'],
            'dkhocphansonghanh_edit' => ['nullable','max:6'],
            'tongsotinchi_edit' => ['required', 'numeric'],
            'sotietlythuyet_edit' => ['nullable','numeric'],
            'sotietthuchanh_edit' => ['nullable','numeric'],
            'hocky_edit' => ['required'],
        ]);
        
        $orm = nhomhocphan::find($request->id_edit);
        $orm->loaihocphan_id = $request->loaihocphan_id_edit;
        $orm->manhomhocphan = $request->manhomhocphan_edit;
        $orm->tennhomhocphan = $request->tennhomhocphan_edit;
        $orm->tongsotinchi = $request->tongsotinchi_edit;
        $orm->sotietlythuyet = $request->sotietlythuyet_edit;
        $orm->sotietthuchanh = $request->sotietthuchanh_edit;
        $orm->dkhocphantienquyet = $request->dkhocphantienquyet_edit;
        $orm->dkhocphanhoctruoc = $request->dkhocphanhoctruoc_edit;
        $orm->dkhocphansonghanh = $request->dkhocphansonghanh_edit;
        $orm->hocky = $request->hocky_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.nhomhocphan');
    }

    public function postXoa_Nhomhocphan(Request $request)
    {
        $orm = nhomhocphan::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.nhomhocphan');
    }

    public function postTimkiem_Nhomhocphan(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $nhomhocphan = DB::table('nhomhocphan')
            ->where('id', '=', "$query")
            ->paginate();
        }
        
        $nhomhocphansearch = nhomhocphan::all();
        return view('admin.nhomhocphan', compact('nhomhocphan','nhomhocphansearch'));
    }
}
