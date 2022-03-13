<?php

namespace App\Http\Controllers;

use App\Models\hocphan;
use App\Models\loaihocphan;
use App\Models\nhomhocphan;
use App\Models\nhomhocphantuchon;
use App\Models\khoikienthuc;
use App\Models\giangvien;
use App\Models\nhomgiangvien;
use App\Models\nhomgiangvien_giangvien;
use App\Imports\hocphanImport;
use App\Exports\hocphanExport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HocphanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDanhSach_Hocphan()
    {
        $hocphan = hocphan::all();
        $loaihocphan = loaihocphan::all();
        $nhomhocphan = nhomhocphan::all();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        $khoikienthuc = khoikienthuc::all();
        $nhomgiangvien = nhomgiangvien::all();
        $hocphansearch = hocphan::all();
        if (Auth::user()->privilege == 'admin') {
            return view('admin.hocphan', compact('hocphan', 'loaihocphan','nhomgiangvien', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'hocphansearch'));
        }
        if (Auth::user()->privilege == 'supmanager') {
            return view('supmanager.hocphan', compact('hocphan', 'loaihocphan','nhomgiangvien', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'hocphansearch'));
        }
        if (Auth::user()->privilege == 'manager') {
            return view('manager.hocphan', compact('hocphan', 'loaihocphan','nhomgiangvien', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'hocphansearch'));
        }
        if (Auth::user()->privilege == 'user') {
            return view('user.hocphanxem', compact('hocphan', 'loaihocphan','nhomgiangvien', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'hocphansearch'));
        }
        
    }
    public function getDanhSach_Hocphan_user()
    {
        $nhomgiangvien = nhomgiangvien::all();
        // $hocphan = hocphan::join('nhomgiangvien','nhomgiangvien.id','=','hocphan.nhomgiangvien_id')
        // ->join('nhomgiangvien_giangvien','nhomgiangvien.id','=','nhomgiangvien_giangvien.nhomgiangvien_id')
        // ->where('nhomgiangvien_giangvien.giangvien_id' ,'=', Auth::user()->giangvien_id)
        // ->get();
        $hocphan = hocphan::all();
        $nhomgiangvien_giangvien = nhomgiangvien_giangvien::all();
        $loaihocphan = loaihocphan::all();
        $nhomhocphan = nhomhocphan::all();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        $khoikienthuc = khoikienthuc::all();
        return view('user.hocphan', compact('hocphan', 'loaihocphan','nhomgiangvien', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'nhomgiangvien_giangvien'));
    }

    public function postThem_Hocphan(Request $request)
    {
        $this->validate($request, [
            'loaihocphan_id' => ['required'],
            'khoikienthuc_id' => ['required'],
            'mahocphan' => ['required', 'max:6'],
            'tenhocphantiengviet' => ['required', 'max:100', 'unique:hocphan'],
            'tenhocphantienganh' => ['required', 'max:100', 'unique:hocphan'],
            'dkhocphantienquyet' => ['nullable','max:6'],
            'dkhocphanhoctruoc' => ['nullable','max:6'],
            'dkhocphansonghanh' => ['nullable','max:6'],
            'sotinchi' => ['required', 'numeric'],
            'sotietlythuyet' => ['nullable','numeric'],
            'sotietthuchanh' =>['nullable','numeric'],
            'nhomgiangvien_id' => ['required'],
            'hocky' => ['required', 'numeric'],
            'filedinhkem' => ['nullable','file', 'max:2097152', 'mimes:pdf,doc,docx,xlsx,xlsm,xlsb,xltx,xltm,xls'],
        ]);

        $path = '';

        // Kiểm tra tập tin rỗng hay không?
        if ($request->hasFile('filedinhkem')) {
            // Tạo thư mục nếu chưa có
            File::isDirectory($request->mahocphan) or Storage::makeDirectory($request->mahocphan, 0775);

            // Xác định tên tập tin
            $extension = $request->file('filedinhkem')->extension();
            $newfilename = Str::slug($request->tenhocphantiengviet, '-') . '.' . $extension;

            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs($request->mahocphan, $request->file('filedinhkem'), $newfilename);
        }

        $orm = new hocphan();
        $orm->loaihocphan_id = $request->loaihocphan_id;
        $orm->nhomhocphan_id  = $request->nhomhocphan_id;
        $orm->khoikienthuc_id  = $request->khoikienthuc_id;
        $orm->mahocphan = $request->mahocphan;
        $orm->tenhocphantiengviet = $request->tenhocphantiengviet;
        $orm->tenhocphantienganh = $request->tenhocphantienganh;
        $orm->dkhocphantienquyet = $request->dkhocphantienquyet;
        $orm->dkhocphansonghanh = $request->dkhocphansonghanh;
        $orm->dkhocphanhoctruoc = $request->dkhocphanhoctruoc;
        $orm->sotinchi = $request->sotinchi;
        $orm->sotietlythuyet  = $request->sotietlythuyet;
        $orm->sotietthuchanh  = $request->sotietthuchanh;
        $orm->nhomhocphantuchon_id  = $request->nhomhocphantuchon_id;
        $orm->nhomgiangvien_id  = $request->nhomgiangvien_id;
        $orm->hocky  = $request->hocky;
        if ($request->hasFile('filedinhkem')) $orm->filedinhkem = $path ?? null;
        $orm->mota = $request->mota ?? null;
        $orm->ghichu = $request->ghichu ?? null;

        $orm->save();

        return redirect()->route('admin.hocphan');
    }

    public function postSua_Hocphan(Request $request)
    {
        $this->validate($request, [
            'loaihocphan_id_edit' => ['required'],
            'khoikienthuc_id_edit' => ['required'],
            'mahocphan_edit' => ['required', 'max:6', 'unique:hocphan,mahocphan,' . $request->id_edit],
            'tenhocphantiengviet_edit' => ['required', 'max:100', 'unique:hocphan,tenhocphantiengviet,' . $request->id_edit],
            'tenhocphantienganh_edit' => ['required', 'max:100', 'unique:hocphan,tenhocphantienganh,' . $request->id_edit],
            'dkhocphantienquyet_edit' => ['nullable','max:6'],
            'dkhocphanhoctruoc_edit' => ['nullable','max:6'],
            'dkhocphansonghanh_edit' => ['nullable','max:6'],
            'sotinchi_edit' => ['required', 'numeric'],
            'sotietlythuyet_edit' => ['nullable','numeric'],
            'sotietthuchanh_edit' => ['nullable','numeric'],
            'nhomgiangvien_id_edit' => ['required'],
            'hocky_edit' => ['required', 'numeric'],
            'filedinhkem_edit' => ['nullable','file', 'max:2097152' , 'mimes:pdf,doc,docx,xlsx,xlsm,xlsb,xltx,xltm,xls'],
        ]);

        $path = '';
        // Kiểm tra tập tin rỗng hay không?
        if ($request->hasFile('filedinhkem_edit')) {
            // Xóa tập tin cũ
            $sp = hocphan::find($request->id_edit);
            Storage::delete($sp->filedinhkem);

            // Xác định tên tập tin mới
            $extension = $request->file('filedinhkem_edit')->extension();
            $newfilename = Str::slug($request->tenhocphantiengviet_edit, '-') . '.' . $extension;

            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs($request->mahocphan_edit, $request->file('filedinhkem_edit'), $newfilename);
        } else {
            // Khi Sửa tên Sp thì đổi tên tập tin
            $sp = hocphan::find($request->id_edit);
            if ($sp->tenhocphantiengviet != $request->tenhocphantiengviet_edit) {

                // Xác định tên tập tin mới
                $extension = Str::afterLast($sp->filedinhkem, '.');
                $newfilename = Str::slug($request->tenhocphantiengviet_edit, '-') . '.' . $extension;



                $path = $request->mahocphan_edit . '/' . $newfilename;

                Storage::move($sp->filedinhkem, $path);
            } else {
                $path = $sp->filedinhkem;
            }
        }

        $orm = hocphan::find($request->id_edit);
        $orm->loaihocphan_id = $request->loaihocphan_id_edit;
        $orm->nhomhocphan_id = $request->nhomhocphan_id_edit;
        $orm->khoikienthuc_id = $request->khoikienthuc_id_edit;
        $orm->mahocphan = $request->mahocphan_edit;
        $orm->tenhocphantiengviet = $request->tenhocphantiengviet_edit;
        $orm->tenhocphantienganh = $request->tenhocphantienganh_edit;
        $orm->dkhocphantienquyet = $request->dkhocphantienquyet_edit;
        $orm->dkhocphansonghanh = $request->dkhocphansonghanh_edit;
        $orm->dkhocphanhoctruoc = $request->dkhocphanhoctruoc_edit;
        $orm->sotinchi = $request->sotinchi_edit;
        $orm->sotietlythuyet = $request->sotietlythuyet_edit;
        $orm->sotietthuchanh = $request->sotietthuchanh_edit;
        $orm->nhomhocphantuchon_id = $request->nhomhocphantuchon_id_edit;
        $orm->nhomgiangvien_id = $request->nhomgiangvien_id_edit;
        $orm->hocky = $request->hocky_edit;
        $orm->filedinhkem = $path;
        $orm->mota = $request->mota_edit ?? null;
        $orm->ghichu = $request->ghichu_edit ?? null;
        $orm->save();

        return redirect()->route('admin.hocphan');
    }
    public function postSua_Hocphan_user(Request $request)
    {
        $this->validate($request, [
            'loaihocphan_id_edit' => ['required'],
            'khoikienthuc_id_edit' => ['required'],
            'mahocphan_edit' => ['required', 'max:6', 'unique:hocphan,mahocphan,' . $request->id_edit],
            'tenhocphantiengviet_edit' => ['required', 'max:100', 'unique:hocphan,tenhocphantiengviet,' . $request->id_edit],
            'tenhocphantienganh_edit' => ['required', 'max:100', 'unique:hocphan,tenhocphantienganh,' . $request->id_edit],
            'dkhocphantienquyet_edit' => ['nullable','max:6'],
            'dkhocphanhoctruoc_edit' => ['nullable','max:6'],
            'dkhocphansonghanh_edit' => ['nullable','max:6'],
            'sotinchi_edit' => ['required', 'numeric'],
            'sotietlythuyet_edit' => ['nullable','numeric'],
            'sotietthuchanh_edit' => ['nullable','numeric'],
            'nhomgiangvien_id_edit' => ['required'],
            'hocky_edit' => ['required', 'numeric'],
            'filedinhkem_edit' => ['nullable','file', 'max:2097152' , 'mimes:pdf,doc,docx,xlsx,xlsm,xlsb,xltx,xltm,xls'],
        ]);

        $path = '';
        // Kiểm tra tập tin rỗng hay không?
        if ($request->hasFile('filedinhkem_edit')) {
            // Xóa tập tin cũ
            $sp = hocphan::find($request->id_edit);
            Storage::delete($sp->filedinhkem);

            // Xác định tên tập tin mới
            $extension = $request->file('filedinhkem_edit')->extension();
            $newfilename = Str::slug($request->tenhocphantiengviet_edit, '-') . '.' . $extension;

            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs($request->mahocphan_edit, $request->file('filedinhkem_edit'), $newfilename);
        } else {
            // Khi Sửa tên Sp thì đổi tên tập tin
            $sp = hocphan::find($request->id_edit);
            if ($sp->tenhocphantiengviet != $request->tenhocphantiengviet_edit) {

                // Xác định tên tập tin mới
                $extension = Str::afterLast($sp->filedinhkem, '.');
                $newfilename = Str::slug($request->tenhocphantiengviet_edit, '-') . '.' . $extension;



                $path = $request->mahocphan_edit . '/' . $newfilename;

                Storage::move($sp->filedinhkem, $path);
            } else {
                $path = $sp->filedinhkem;
            }
        }

        $orm = hocphan::find($request->id_edit);
        $orm->loaihocphan_id = $request->loaihocphan_id_edit;
        $orm->nhomhocphan_id = $request->nhomhocphan_id_edit;
        $orm->khoikienthuc_id = $request->khoikienthuc_id_edit;
        $orm->mahocphan = $request->mahocphan_edit;
        $orm->tenhocphantiengviet = $request->tenhocphantiengviet_edit;
        $orm->tenhocphantienganh = $request->tenhocphantienganh_edit;
        $orm->dkhocphantienquyet = $request->dkhocphantienquyet_edit;
        $orm->dkhocphansonghanh = $request->dkhocphansonghanh_edit;
        $orm->dkhocphanhoctruoc = $request->dkhocphanhoctruoc_edit;
        $orm->sotinchi = $request->sotinchi_edit;
        $orm->sotietlythuyet = $request->sotietlythuyet_edit;
        $orm->sotietthuchanh = $request->sotietthuchanh_edit;
        $orm->nhomhocphantuchon_id = $request->nhomhocphantuchon_id_edit;
        $orm->nhomgiangvien_id = $request->nhomgiangvien_id_edit;
        $orm->hocky = $request->hocky_edit;
        $orm->filedinhkem = $path;
        $orm->mota = $request->mota_edit ?? null;
        $orm->ghichu = $request->ghichu_edit ?? null;
        $orm->save();

        return redirect()->route('user.hocphan');
    }

    public function postXoa_Hocphan(Request $request)
    {
        $orm = hocphan::find($request->id_delete);
        $orm->delete();

        return redirect()->route('admin.hocphan');
    }

    // Nhập từ Excel
    public function postNhap(Request $request)
    {
        Excel::import(new hocphanImport, $request->file('file_excel'));
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.hocphan');
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.hocphan');
        }
    }
    // Xuất ra Excel
    public function getXuat()
    {
        return Excel::download(new hocphanExport, 'danh-sach-hoc-phan.xlsx');
    }

    public function postTimkiem_Hocphan(Request $request)
    {
        if ($request->search) {
            $query = $request->search;
            $hocphan = DB::table('hocphan')
                ->where('id', '=', "$query")
                ->paginate(25);
        }
        $loaihocphan = loaihocphan::all();
        $nhomhocphan = nhomhocphan::all();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        $khoikienthuc = khoikienthuc::all();
        $giangvien = giangvien::all();
        $hocphansearch = hocphan::all();
        return view('admin.hocphan', compact('hocphan', 'loaihocphan', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'giangvien', 'hocphansearch'));
    }
    public function getXem_Hocphanchitiet($id)
    {
        $hocphan = hocphan::find($id);
        $giangvien = giangvien::join('nhomgiangvien_giangvien','nhomgiangvien_giangvien.giangvien_id','=','giangvien.id' )->where('nhomgiangvien_giangvien.nhomgiangvien_id' ,'=' , $hocphan->nhomgiangvien_id)->get();
        $loaihocphan = loaihocphan::all();
        $nhomhocphan = nhomhocphan::all();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        $khoikienthuc = khoikienthuc::all();
        if (Auth::user()->privilege == 'admin') {
            return view('admin.hocphan_xemchitiet', compact('hocphan', 'loaihocphan', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'giangvien',));
        }
        if (Auth::user()->privilege == 'supmanager') {
            return view('supmanager.hocphan_xemchitiet', compact('hocphan', 'loaihocphan', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'giangvien',));
        }
        if (Auth::user()->privilege == 'manager') {
            return view('manager.hocphan_xemchitiet', compact('hocphan', 'loaihocphan', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'giangvien',));
        }
        if (Auth::user()->privilege == 'user') {
            return view('user.hocphan_xemchitiet', compact('hocphan', 'loaihocphan', 'nhomhocphan', 'nhomhocphantuchon', 'khoikienthuc', 'giangvien',));
        }
    }
}
