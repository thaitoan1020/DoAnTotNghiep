<?php

namespace App\Http\Controllers;

use App\Models\khoa;
use Illuminate\Http\Request;
use DB;

class KhoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Khoa()
    {
        $khoa = khoa::all();
        $khoasearch = khoa::all();
        return view('admin.khoa', compact('khoa','khoasearch'));
    }
    
    public function postThem_Khoa(Request $request)
    {
        $this->validate($request, [
            'makhoa' => ['required', 'max:10'],
            'tenkhoa' => ['required', 'max:100', 'unique:khoa'],
        ]);
        
        $orm = new khoa();
        $orm->makhoa = $request->makhoa;
        $orm->tenkhoa = $request->tenkhoa;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.khoa');
    }

    public function postSua_Khoa(Request $request)
    {
        $this->validate($request, [
            'makhoa_edit' => ['required', 'max:10','unique:khoa,makhoa,'. $request->id_edit],
            'tenkhoa_edit' => ['required', 'max:100', 'unique:khoa,tenkhoa,'. $request->id_edit],
        ]);
        
        $orm = khoa::find($request->id_edit);
        $orm->makhoa = $request->makhoa_edit;
        $orm->tenkhoa = $request->tenkhoa_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.khoa');
    }

    public function postXoa_Khoa(Request $request)
    {
        $orm = khoa::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.khoa');
    }
    public function postTimkiem_Khoa(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $khoa = DB::table('khoa')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $khoasearch = khoa::all();
        return view('admin.khoa', compact('khoa','khoasearch'));
    }
}
