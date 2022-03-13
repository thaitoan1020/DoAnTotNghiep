<?php

namespace App\Http\Controllers;

use App\Models\lophoc;
use App\Models\nganhhoc;
use App\Models\khoahoc;
use App\Models\giangvien;
use Illuminate\Http\Request;
use DB;

class LophocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Lophoc()
    {
        $lophoc = lophoc::get();
		$khoahoc = khoahoc::all();
		$nganhhoc = nganhhoc::all();
        $lophocsearch = lophoc::all();
        $giangvien = giangvien::all();
        return view('admin.lophoc', compact('lophoc','khoahoc','nganhhoc','giangvien'));
    }
    
    public function postThem_Lophoc(Request $request)
    {
        $this->validate($request, [
			'khoahoc_id' => ['required'],
			'nganhhoc_id' => ['required'],
            'malophoc' => ['required', 'max:10'],
            'tenlophoc' => ['required', 'max:100'],
			'covanhoctap' => ['required'],
        ]);
        
        $orm = new lophoc();
		$orm->khoahoc_id = $request->khoahoc_id;
		$orm->nganhhoc_id = $request->nganhhoc_id;
        $orm->malophoc = $request->malophoc;
        $orm->tenlophoc = $request->tenlophoc;
		$orm->covanhoctap = $request->covanhoctap;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.lophoc');
    }

    public function postSua_Lophoc(Request $request)
    {
        $this->validate($request, [
			'khoahoc_id_edit' => ['required'],
			'nganhhoc_id_edit' => ['required'],
            'malophoc_edit' => ['required', 'max:10','unique:lophoc,malophoc,'. $request->id_edit],
            'tenlophoc_edit' => ['required', 'max:100'],
			'covanhoctap_edit' => ['required'],
        ]);
        
        $orm = lophoc::find($request->id_edit);
		$orm->khoahoc_id = $request->khoahoc_id_edit;
		$orm->nganhhoc_id = $request->nganhhoc_id_edit;
        $orm->malophoc = $request->malophoc_edit;
        $orm->tenlophoc = $request->tenlophoc_edit;
		$orm->covanhoctap = $request->covanhoctap_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.lophoc');
    }

    public function postXoa_Lophoc(Request $request)
    {
        $orm = lophoc::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.lophoc');
    }

    public function postTimkiem_Lophoc(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $lophoc = DB::table('lophoc')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $khoahoc = khoahoc::all();
        $nganhhoc = nganhhoc::all();
        $lophocsearch = lophoc::all();
        return view('admin.lophoc', compact('lophoc','khoahoc','nganhhoc','lophocsearch'));
    }
}
