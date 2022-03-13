<?php

namespace App\Http\Controllers;

use App\Models\bomon;
use Illuminate\Http\Request;
use DB;

class BomonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Bomon()
    {
        $bomon = bomon::all();
        $bomonsearch = bomon::all();
        return view('admin.bomon', compact('bomon','bomonsearch'));
    }
    
    public function postThem_Bomon(Request $request)
    {
        $this->validate($request, [
            'mabomon' => ['required', 'max:10'],
            'tenbomon' => ['required', 'max:100', 'unique:bomon'],
        ]);
        
        $orm = new bomon();
        $orm->mabomon = $request->mabomon;
        $orm->tenbomon = $request->tenbomon;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        return redirect()->route('admin.bomon');
    }

    public function postSua_Bomon(Request $request)
    {
        $this->validate($request, [
            'mabomon_edit' => ['required', 'max:10','unique:bomon,mabomon,'. $request->id_edit],
            'tenbomon_edit' => ['required', 'max:100', 'unique:bomon,tenbomon,'. $request->id_edit],
        ]);
        
        $orm = bomon::find($request->id_edit);
        $orm->mabomon = $request->mabomon_edit;
        $orm->tenbomon = $request->tenbomon_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        return redirect()->route('admin.bomon');
    }

    public function postXoa_Bomon(Request $request)
    {
        $orm = bomon::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.bomon');
    }

    public function postTimkiem_Bomon(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $bomon = DB::table('bomon')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $bomonsearch = bomon::all();
        return view('admin.bomon', compact('bomon','bomonsearch'));
    }
}
