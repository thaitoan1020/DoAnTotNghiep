<?php

namespace App\Http\Controllers;

use App\Models\khoikienthuc;
use Illuminate\Http\Request;
use DB;

class KhoikienthucController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Khoikienthuc()
    {
        $khoikienthuc = khoikienthuc::all();
        $khoikienthucsearch = khoikienthuc::all();
        return view('admin.khoikienthuc', compact('khoikienthuc','khoikienthucsearch'));
    }
    
    public function postThem_Khoikienthuc(Request $request)
    {
        $this->validate($request, [
            'makhoikienthuc' => ['required', 'max:6'],
            'tenkhoikienthuc' => ['required', 'max:100', 'unique:khoikienthuc'],
        ]);
        
        $orm = new khoikienthuc();
        $orm->makhoikienthuc = $request->makhoikienthuc;
        $orm->tenkhoikienthuc = $request->tenkhoikienthuc;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.khoikienthuc');
    }

    public function postSua_Khoikienthuc(Request $request)
    {
        $this->validate($request, [
            'makhoikienthuc_edit' => ['required', 'max:6','unique:khoikienthuc,makhoikienthuc,'. $request->id_edit],
            'tenkhoikienthuc_edit' => ['required', 'max:100', 'unique:khoikienthuc,tenkhoikienthuc,'. $request->id_edit],
        ]);
        
        $orm = khoikienthuc::find($request->id_edit);
        $orm->makhoikienthuc = $request->makhoikienthuc_edit;
        $orm->tenkhoikienthuc = $request->tenkhoikienthuc_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.khoikienthuc');
    }

    public function postXoa_Khoikienthuc(Request $request)
    {
        $orm = khoikienthuc::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.khoikienthuc');
    }

    public function postTimkiem_Khoikienthuc(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $khoikienthuc = DB::table('khoikienthuc')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $khoikienthucsearch = khoikienthuc::all();
        return view('admin.khoikienthuc', compact('khoikienthuc','khoikienthucsearch'));
    }
}
