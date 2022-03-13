<?php

namespace App\Http\Controllers;

use App\Models\khoahoc;
use Illuminate\Http\Request;
use DB;

class KhoahocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Khoahoc()
    {
        $khoahoc = khoahoc::all();
        $khoahocsearch = khoahoc::all();
        return view('admin.khoahoc', compact('khoahoc','khoahocsearch'));
    }
    
    public function postThem_Khoahoc(Request $request)
    {
        $this->validate($request, [
            'makhoahoc' => ['required', 'max:6'],
            'tenkhoahoc' => ['required', 'max:100', 'unique:khoahoc'],
			'thoigianbatdau' => ['required', 'date:d-m-Y'],
			'thoigianketthuc' => ['required', 'date:d-m-Y'],
        ]);
        
        $orm = new khoahoc();
        $orm->makhoahoc = $request->makhoahoc;
        $orm->tenkhoahoc = $request->tenkhoahoc;
		$orm->thoigianbatdau = $request->thoigianbatdau;
		$orm->thoigianketthuc = $request->thoigianketthuc;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.khoahoc');
    }

    public function postSua_Khoahoc(Request $request)
    {
        $this->validate($request, [
            'makhoahoc_edit' => ['required', 'max:6','unique:khoahoc,makhoahoc,'. $request->id_edit],
            'tenkhoahoc_edit' => ['required', 'max:100', 'unique:khoahoc,tenkhoahoc,'. $request->id_edit],
			'thoigianbatdau_edit' => ['required', 'date:d-m-Y'],
			'thoigianketthuc_edit' => ['required', 'date:d-m-Y'],
        ]);
        
        $orm = khoahoc::find($request->id_edit);
        $orm->makhoahoc = $request->makhoahoc_edit;
        $orm->tenkhoahoc = $request->tenkhoahoc_edit;
		$orm->thoigianbatdau = $request->thoigianbatdau_edit;
		$orm->thoigianketthuc = $request->thoigianketthuc_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.khoahoc');
    }

    public function postXoa_Khoahoc(Request $request)
    {
        $orm = khoahoc::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.khoahoc');
    }

    public function postTimkiem_Khoahoc(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $khoahoc = DB::table('khoahoc')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $khoahocsearch = khoahoc::all();
        return view('admin.khoahoc', compact('khoahoc','khoahocsearch'));
    }
}
