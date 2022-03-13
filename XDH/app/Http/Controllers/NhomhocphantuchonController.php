<?php

namespace App\Http\Controllers;


use App\Models\nhomhocphantuchon;
use Illuminate\Http\Request;
use DB;

class NhomhocphantuchonController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Nhomhocphantuchon()
    {
        $nhomhocphantuchon = nhomhocphantuchon::all();
        $nhomhocphantuchonsearch = nhomhocphantuchon::all();
        return view('admin.nhomhocphantuchon', compact('nhomhocphantuchon','nhomhocphantuchonsearch'));
    }
    
    public function postThem_Nhomhocphantuchon(Request $request)
    {
        $this->validate($request, [
            'manhomhocphantuchon' => ['required', 'max:6'],
            'tennhomhocphantuchon' => ['required', 'max:100', 'unique:nhomhocphantuchon'],
        ]);
        
        $orm = new nhomhocphantuchon();
        $orm->manhomhocphantuchon = $request->manhomhocphantuchon;
        $orm->tennhomhocphantuchon = $request->tennhomhocphantuchon;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.nhomhocphantuchon');
    }

    public function postSua_Nhomhocphantuchon(Request $request)
    {
        $this->validate($request, [
            'manhomhocphantuchon_edit' => ['required', 'max:6','unique:nhomhocphantuchon,manhomhocphantuchon,'. $request->id_edit],
            'tennhomhocphantuchon_edit' => ['required', 'max:100', 'unique:nhomhocphantuchon,tennhomhocphantuchon,'. $request->id_edit],
        ]);
        
        $orm = nhomhocphantuchon::find($request->id_edit);
        $orm->manhomhocphantuchon = $request->manhomhocphantuchon_edit;
        $orm->tennhomhocphantuchon = $request->tennhomhocphantuchon_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.nhomhocphantuchon');
    }

    public function postXoa_Nhomhocphantuchon(Request $request)
    {
        $orm = nhomhocphantuchon::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.nhomhocphantuchon');
    }

    public function postTimkiem_Nhomhocphantuchon(Request $request)
    {
    	if($request->search)
        {
            $query = $request->search;
            $nhomhocphantuchon = DB::table('nhomhocphantuchon')
            ->where('id', '=', "$query")
            ->paginate();
        }
        $nhomhocphantuchonsearch = nhomhocphantuchon::all();
        return view('admin.nhomhocphantuchon', compact('nhomhocphantuchon','nhomhocphantuchonsearch'));
    }
}
