<?php

namespace App\Http\Controllers;

use App\Models\ctdt;
use App\Models\nganhhoc;
use App\Models\bomon;
use App\Models\khoa;
use App\Models\hocphan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CtdtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Ctdt()
    {
        $ctdt = ctdt::get();
        $nganhhoc = nganhhoc::all();
        $bomon = bomon::all();
        $khoa = khoa::all();
        $ctdtsearch = ctdt::all();
        if (Auth::user()->privilege == 'admin') {
            return view('admin.ctdt', compact('ctdt','nganhhoc','bomon','khoa','ctdtsearch'));
        }
        if (Auth::user()->privilege == 'supmanager') {
            return view('supmanager.ctdt', compact('ctdt','nganhhoc','bomon','khoa','ctdtsearch'));
        }
    }
    public function postThem_Ctdt(Request $request)
    {
        $this->validate($request, [
            'nganhhoc_id' => ['required'],
            'bomon_id' => ['required'],
            'khoa_id' => ['required'],
            'mactdt' => ['required', 'max:10'],
            'tenctdt' => ['required', 'max:100', 'unique:ctdt'],
            'tongsotinchi' => ['required', 'numeric'],
        ]);
        
        $orm = new ctdt();
        $orm->nganhhoc_id = $request->nganhhoc_id;
        $orm->bomon_id = $request->bomon_id;
        $orm->khoa_id = $request->khoa_id;
        $orm->mactdt = $request->mactdt;
        $orm->tenctdt = $request->tenctdt;
        $orm->tongsotinchi = $request->tongsotinchi;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt');
        }
    }

    public function postSua_Ctdt(Request $request)
    {
        $this->validate($request, [
            'nganhhoc_id_edit' => ['required'],
            'bomon_id_edit' => ['required'],
            'khoa_id_edit' => ['required'],
            'mactdt_edit' => ['required', 'max:10','unique:ctdt,mactdt,'. $request->id_edit],
            'tenctdt_edit' => ['required', 'max:100', 'unique:ctdt,tenctdt,'. $request->id_edit],
            'tongsotinchi_edit' => ['required', 'numeric'],
            'trangthai_edit' => ['required', 'numeric'],
        ]);
        
        $orm = ctdt::find($request->id_edit);
        $orm->nganhhoc_id = $request->nganhhoc_id_edit;
        $orm->bomon_id = $request->bomon_id_edit;
        $orm->khoa_id = $request->khoa_id_edit;
        $orm->mactdt = $request->mactdt_edit;
        $orm->tenctdt = $request->tenctdt_edit;
        $orm->tongsotinchi = $request->tongsotinchi_edit;
        $orm->trangthai = $request->trangthai_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt');
        }
    }

    public function postXoa_Ctdt(Request $request)
    {
        $orm = ctdt::find($request->id_delete);
        $orm->delete();
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt');
        }
    }

    public function postTimkiem_Ctdt(Request $request)
    {
        if($request->search)
        {
            $query = $request->search;
            $ctdt = DB::table('ctdt')
            ->where('id', '=', "$query")
            ->paginate(25);
        }
        $nganhhoc = nganhhoc::all();
        $bomon = bomon::all();
        $khoa = khoa::all();
        $ctdtsearch = ctdt::all();
        return view('admin.ctdt', compact('ctdt','nganhhoc','bomon','khoa','ctdtsearch'));
    }
}
