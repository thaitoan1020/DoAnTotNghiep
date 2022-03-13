<?php

namespace App\Http\Controllers;

use App\Models\loaihocphan;
use Illuminate\Http\Request;
use DB;

class LoaihocphanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Loaihocphan()
    {
        $loaihocphan = loaihocphan::all();
        $loaihocphansearch = loaihocphan::all();
        return view('admin.loaihocphan', compact('loaihocphan','loaihocphansearch'));
    }
    
    public function postThem_Loaihocphan(Request $request)
    {
        $this->validate($request, [
            'maloaihocphan' => ['required', 'max:6'],
            'tenloaihocphan' => ['required', 'max:100', 'unique:loaihocphan'],
        ]);
        
        $orm = new loaihocphan();
        $orm->maloaihocphan = $request->maloaihocphan;
        $orm->tenloaihocphan = $request->tenloaihocphan;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.loaihocphan');
    }

    public function postSua_Loaihocphan(Request $request)
    {
        $this->validate($request, [
            'maloaihocphan_edit' => ['required', 'max:6','unique:loaihocphan,maloaihocphan,'. $request->id_edit],
            'tenloaihocphan_edit' => ['required', 'max:100', 'unique:loaihocphan,tenloaihocphan,'. $request->id_edit],
        ]);
        
        $orm = loaihocphan::find($request->id_edit);
        $orm->maloaihocphan = $request->maloaihocphan_edit;
        $orm->tenloaihocphan = $request->tenloaihocphan_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.loaihocphan');
    }

    public function postXoa_Loaihocphan(Request $request)
    {
        $orm = loaihocphan::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.loaihocphan');
    }

    public function postTimkiem_Loaihocphan(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $loaihocphan = DB::table('loaihocphan')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $loaihocphansearch = loaihocphan::all();
        return view('admin.loaihocphan', compact('loaihocphan','loaihocphansearch'));
    }
}
