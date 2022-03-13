<?php

namespace App\Http\Controllers;

use App\Models\nhomgiangvien;
use App\Models\giangvien;
use App\Models\nhomgiangvien_giangvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class nhomgiangvienController extends Controller
{
    public function getDanhSach_Nhomgiangvien()
    {
        $nhomgiangvien = nhomgiangvien::all();
        $giangvien = giangvien::all();
        $nhomgiangvien_giangvien = nhomgiangvien_giangvien::all();

        if (Auth::user()->privilege == 'admin') {
            return view('admin.nhomgiangvien', compact('nhomgiangvien','nhomgiangvien_giangvien','giangvien'));
        }
        if (Auth::user()->privilege == 'supmanager') {
            return view('supmanager.nhomgiangvien', compact('nhomgiangvien','nhomgiangvien_giangvien','giangvien'));
        }
        if (Auth::user()->privilege == 'manager') {
            return view('manager.nhomgiangvien', compact('nhomgiangvien','nhomgiangvien_giangvien','giangvien'));
        }
        
    }
    
    public function postThem_Nhomgiangvien(Request $request)
    {
        $this->validate($request, [
            'manhomgiangvien' => ['required', 'max:6'],
            'tennhomgiangvien' => ['required', 'max:100', 'unique:nhomgiangvien'],
        ]);
        
        $orm = new nhomgiangvien();
        $orm->manhomgiangvien = $request->manhomgiangvien;
        $orm->tennhomgiangvien = $request->tennhomgiangvien;
        $orm->ghichu = $request->ghichu;
        
        $orm->save();
        
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.nhomgiangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.nhomgiangvien');
        }
       
    }

    public function postSua_Nhomgiangvien(Request $request)
    {
        $this->validate($request, [
            'manhomgiangvien_edit' => ['required', 'max:6','unique:nhomgiangvien,manhomgiangvien,'. $request->id_edit],
            'tennhomgiangvien_edit' => ['required', 'max:100', 'unique:nhomgiangvien,tennhomgiangvien,'. $request->id_edit],
        ]);
        
        $orm = nhomgiangvien::find($request->id_edit);
        $orm->manhomgiangvien = $request->manhomgiangvien_edit;
        $orm->tennhomgiangvien = $request->tennhomgiangvien_edit;
        $orm->ghichu = $request->ghichu_edit;
        $orm->save();
        
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.nhomgiangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.nhomgiangvien');
        }
    }
    public function postSua_Nhomgiangvien_giangvien(Request $request)
    {
        $this->validate($request, [
            'giangvien_id' => ['required'],
        ]);
        $orm = new nhomgiangvien_giangvien();
        $orm->nhomgiangvien_id = $request->nhomgiangvien_id_edit;
        $orm->giangvien_id = $request->giangvien_id;
        $orm->save();
        
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.nhomgiangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.nhomgiangvien');
        }
    }

    public function postXoa_Nhomgiangvien(Request $request)
    {
        $nhomgiangvien = nhomgiangvien::find($request->id_delete);
        $nhomgiangvien_giangvien = nhomgiangvien_giangvien::where( 'nhomgiangvien_id',$nhomgiangvien->id);
        $nhomgiangvien_giangvien->delete();
        $nhomgiangvien->delete();
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.nhomgiangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.nhomgiangvien');
        }
    }

    public function postXoa_Nhomgiangvien_giangvien(Request $request)
    {
        $orm = nhomgiangvien_giangvien::find($request->id_deletegv);
        $orm->delete();
        
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.nhomgiangvien');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.nhomgiangvien');
        }
    }
}
