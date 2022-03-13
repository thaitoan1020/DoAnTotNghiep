<?php

namespace App\Http\Controllers;

use App\Models\nganhhoc;
use Illuminate\Http\Request;
use DB;

class NganhhocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Nganhhoc()
    {
        $nganhhoc = nganhhoc::all();
        $nganhhocsearch = nganhhoc::all();
        return view('admin.nganhhoc', compact('nganhhoc','nganhhocsearch'));
    }
    
    public function postThem_Nganhhoc(Request $request)
    {
        $this->validate($request, [
            'manganhhoc' => ['required', 'max:10'],
            'tennganhhoc' => ['required', 'max:100', 'unique:nganhhoc'],
        ]);
        
        $orm = new nganhhoc();
        $orm->manganhhoc = $request->manganhhoc;
        $orm->tennganhhoc = $request->tennganhhoc;
        $orm->ghichu = $request->ghichu ?? null;
        
        $orm->save();
        
        return redirect()->route('admin.nganhhoc');
    }

    public function postSua_Nganhhoc(Request $request)
    {
        $this->validate($request, [
            'manganhhoc_edit' => ['required', 'max:10'],
            'tennganhhoc_edit' => ['required', 'max:100', 'unique:nganhhoc,tennganhhoc,'. $request->id_edit],
        ]);
        
        $orm = nganhhoc::find($request->id_edit);
        $orm->manganhhoc = $request->manganhhoc_edit;
        $orm->tennganhhoc = $request->tennganhhoc_edit;
        $orm->ghichu = $request->ghichu_edit ?? null;
        $orm->save();
        
        return redirect()->route('admin.nganhhoc');
    }

    public function postXoa_Nganhhoc(Request $request)
    {
        $orm = nganhhoc::find($request->id_delete);
        $orm->delete();
        
        return redirect()->route('admin.nganhhoc');
    }

    public function postTimkiem_Nganhhoc(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $nganhhoc = DB::table('nganhhoc')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $nganhhocsearch = nganhhoc::all();
        return view('admin.nganhhoc', compact('nganhhoc','nganhhocsearch'));
    }
}
