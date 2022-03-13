<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\giangvien;
use App\Models\bomon;
use App\Models\khoa;
use Illuminate\Support\Facades\Auth;
use DB;

class GiangvienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach_Giangvien()
    {
        $giangvien = giangvien::all();
        $bomon = bomon::all();
        $khoa = khoa::all();
        $giangviensearch = giangvien::all();
        if (Auth::user()->privilege == 'admin') {
            return view('admin.giangvien', compact('giangvien','bomon','khoa','giangviensearch'));
        }
        if (Auth::user()->privilege == 'supmanager') {
            return view('supmanager.giangvien', compact('giangvien','bomon','khoa','giangviensearch'));
        }
        if (Auth::user()->privilege == 'manager') {
            return view('manager.giangvien', compact('giangvien','bomon','khoa','giangviensearch'));
        }
        
    }
    
    public function postThem_Giangvien(Request $request)
    {
        $this->validate($request, [
            'bomon_id' => ['required'],
            'khoa_id' => ['required'],
            'email' => ['required', 'max:100'],
            'magiangvien' => ['required', 'max:6'],
            'tengiangvien' => ['required', 'max:100', 'unique:giangvien'],
            'dienthoai' => ['required', 'numeric'],
            'email' => ['required', 'max:100'],
        ]);
        
        $orm = new giangvien();
        $orm->bomon_id = $request->bomon_id; 
        $orm->khoa_id = $request->khoa_id;
        $orm->magiangvien = $request->magiangvien;
        $orm->tengiangvien = $request->tengiangvien;
        $orm->dienthoai = $request->dienthoai;
        $orm->email = $request->email;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.giangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.giangvien');
        }
    }

    public function postSua_Giangvien(Request $request)
    {
        $this->validate($request, [
            'bomon_id_edit' => ['required'],
            'khoa_id_edit' => ['required'],
            'magiangvien_edit' => ['required', 'max:6','unique:giangvien,magiangvien,'. $request->id_edit],
            'tengiangvien_edit' => ['required', 'max:100', 'unique:giangvien,tengiangvien,'. $request->id_edit],
            'dienthoai_edit' => ['required', 'numeric'],
            'email_edit' => ['required', 'max:100'],
        ]);
        
        $orm = giangvien::find($request->id_edit);
        $orm->bomon_id = $request->bomon_id_edit;
        $orm->khoa_id = $request->khoa_id_edit;
        $orm->tengiangvien = $request->tengiangvien_edit;
        $orm->dienthoai = $request->dienthoai_edit;
        $orm->email = $request->email_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.giangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.giangvien');
        }
    }

    public function postXoa_Giangvien(Request $request)
    {
        $orm = giangvien::find($request->id_delete);
        $orm->delete();
        
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.giangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.giangvien');
        }
    }

    // public function postTimkiem_Giangvien(Request $request)
    // {
    //     if($request->search)
    //     {
    //         $query = $request->search;
    //         $giangvien = DB::table('giangvien')
    //         ->where('id', '=', "$query")
    //         ->paginate(25);
    //     }
    //     $bomon = bomon::all();
    //     $khoa = khoa::all();
    //     $giangviensearch = giangvien::all();
    //     return view('admin.giangvien', compact('giangvien','bomon','khoa','giangviensearch'));
    // }
}