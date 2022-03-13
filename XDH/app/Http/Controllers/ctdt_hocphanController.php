<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ctdt;
use App\Models\ctdt_hocphan;
use App\Models\nganhhoc;
use App\Models\bomon;
use App\Models\khoa;
use App\Models\hocphan;
use App\Models\khoikienthuc;
use App\Models\nhomhocphan;
use App\Imports\ctdt_hocphanImport;
use App\Exports\ctdt_hocphan_hockyExport;
use App\Exports\ctdt_hocphan_khoikienthucExport;
use App\Models\nhomhocphantuchon;
use Illuminate\Support\Facades\Auth;
use DB;
use Excel;

class ctdt_hocphanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDanhSach_Ctdt_hocphan_admin($id)
    {
        $ctdt = ctdt::all();
        $ctdt_hocphan = ctdt_hocphan::where('ctdt_id', '=', $id)->get();
        $hocphan = hocphan::where('nhomhocphantuchon_id', '=', null)->get();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        return view('admin.ctdt_ql', compact('ctdt', 'hocphan', 'ctdt_hocphan', 'nhomhocphantuchon'));
    }
    /* start HocKy */
    public function getDanhSach_Ctdt_hocphan_hocky()
    {
        $ctdt_hocphan = hocphan::join('ctdt_hocphan', 'hocphan.id', '=', 'ctdt_hocphan.hocphan_id')
            ->orderBy('hocphan.hocky', 'asc')
            ->get();
        $ctdt_hocphan1 = hocphan::join('ctdt_hocphan', 'hocphan.id', '=', 'ctdt_hocphan.hocphan_id')
            ->orderBy('hocphan.hocky', 'asc');
        if (Auth::user()->privilege == 'admin') {
            return view('admin.ctdt_ql_hocky', compact('ctdt_hocphan'));
        }
        if (Auth::user()->privilege == 'supmanager') {
            return view('supmanager.ctdt_ql_hocky', compact('ctdt_hocphan'));
        }
        if (Auth::user()->privilege == 'manager') {
            return view('manager.ctdt_ql_hocky', compact('ctdt_hocphan'));
        }
        if (Auth::user()->privilege == 'user') {
            return view('user.ctdt_ql_hocky', compact('ctdt_hocphan'));
        }
    }
    /* end HocKy */

    /* start Khối kiến thức */
    public function getDanhSach_Ctdt_khoikienthuc()
    {
        $khoikienthuc = khoikienthuc::all();
        $nhomhocphan = nhomhocphan::all();
        $ctdt_hocphan = hocphan::join('ctdt_hocphan', 'hocphan.id', '=', 'ctdt_hocphan.hocphan_id')
            ->join('khoikienthuc', 'hocphan.khoikienthuc_id', '=', 'khoikienthuc.id')
            ->orderBy('khoikienthuc.id', 'asc')
            ->get();
        $ctdt_hocphan1 = hocphan::join('ctdt_hocphan', 'hocphan.id', '=', 'ctdt_hocphan.hocphan_id')
            ->join('khoikienthuc', 'hocphan.khoikienthuc_id', '=', 'khoikienthuc.id')
            ->join('nhomhocphan', 'nhomhocphan.id', '=', 'hocphan.nhomhocphan_id')
            ->orderBy('khoikienthuc.id', 'asc')
            ->get();
        if (Auth::user()->privilege == 'admin') {
            return view('admin.ctdt_ql_khoikienthuc', compact('ctdt_hocphan', 'khoikienthuc', 'nhomhocphan'));
        }
        if (Auth::user()->privilege == 'supmanager') {
            return view('supmanager.ctdt_ql_khoikienthuc', compact('ctdt_hocphan', 'khoikienthuc', 'nhomhocphan'));
        }
        if (Auth::user()->privilege == 'manager') {
            return view('manager.ctdt_ql_khoikienthuc', compact('ctdt_hocphan', 'khoikienthuc', 'nhomhocphan'));
        }
        if (Auth::user()->privilege == 'user') {
            return view('user.ctdt_ql_khoikienthuc', compact('ctdt_hocphan', 'khoikienthuc', 'nhomhocphan'));
        }
    }
    /* end Khối kiến thức */

    public function getDanhSach_Ctdt_hocphan_supmanager($id)
    {
        $ctdt = ctdt::all();
        $ctdt_hocphan = ctdt_hocphan::where('ctdt_id', '=', $id)->get();
        $hocphan = hocphan::where('nhomhocphantuchon_id', '=', null)->get();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        return view('supmanager.ctdt_ql', compact('ctdt', 'hocphan', 'ctdt_hocphan', 'nhomhocphantuchon'));
    }

    public function getDanhSach_Ctdt_hocphan_manager($id)
    {
        $ctdt = ctdt::all();
        $ctdt_hocphan = ctdt_hocphan::where('ctdt_id', '=', $id)->get();
        $hocphan = hocphan::where('nhomhocphantuchon_id', '=', null)->get();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        return view('manager.ctdt_ql', compact('ctdt', 'hocphan', 'ctdt_hocphan', 'nhomhocphantuchon'));
    }

    public function getDanhSach_Ctdt_hocphan_user($id)
    {
        $ctdt = ctdt::all();
        $ctdt_hocphan = ctdt_hocphan::where('ctdt_id', '=', $id)->get();
        $hocphan = hocphan::where('nhomhocphantuchon_id', '=', null)->get();
        $nhomhocphantuchon = nhomhocphantuchon::all();
        return view('user.ctdt_ql', compact('ctdt', 'hocphan', 'ctdt_hocphan', 'nhomhocphantuchon'));
    }



    public function AjaxGetDanhSach(Request $req)
    {
        $ctdt_hocphan = ctdt_hocphan::where('ctdt_id', $req->id)->get();
        $du_lieu_tra_ve  = '';
        $stt = 0;
        $tennhomhocphan = '';
        $row = 0;

        foreach ($ctdt_hocphan as  $value) {
            $stt = $stt + 1;
            $du_lieu_tra_ve  .= '
                
                <tr>
                    <td style="text-align: center">' . $stt . '</td>
                    <td style="text-align: center">' . $value->hocphan->mahocphan . '</td>
                    <td >' . $value->hocphan->tenhocphantiengviet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotinchi . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::laydulieu_hocphan_BT($value->hocphan) . '</td>
                    
            ';
            if ($value->hocphan->loaihocphan->tenloaihocphan == 'Tự chọn') {
                if ($value->hocphan->nhomhocphantuchon_id != $tennhomhocphan) {
                    $tennhomhocphan = $value->hocphan->nhomhocphantuchon_id;
                    $ctdt_hocphan = ctdt_hocphan::all();
                    foreach ($ctdt_hocphan as $value2) {
                        if ($value2->hocphan->nhomhocphantuchon_id == $tennhomhocphan && $value2->ctdt_id == $value->ctdt_id )
                            $row = $row + 1;
                    }
                    $du_lieu_tra_ve  .= '
                        <td style="text-align: center" rowspan="' . $row . '">' . $value->hocphan->nhomhocphantuchon->tongsotinchi . '</td>
                        ';
                    $row = 0;
                }
            } else {
                $du_lieu_tra_ve  .= '
                        <td style="text-align: center" ></td>
                        ';
            }
            $du_lieu_tra_ve  .= '
                    <td style="text-align: center">' . $value->hocphan->sotietlythuyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotietthuchanh . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphantienquyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphanhoctruoc . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphansonghanh . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::so_la_ma_hoky($value->hocphan->hocky) . '</td>
                        <td style="text-align: center">
                            <a href="#xoa" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal" data-target="#deleteModal" onclick="getXoa(' . $value->id . ',' . $value->ctdt_id . '); return false;"><i class="far fa-trash-alt"></i></a>
                                            
                        </td>
                </tr>
            ';
        }

        return response()->json([
            'du_lieu' => $du_lieu_tra_ve
        ]);
    }

    public function AjaxGetDanhSach_hocky(Request $req)
    {
        $hocphan = hocphan::where('hocphan.hocky', '=', $req->id)->get();
        $du_lieu_tra_ve  = '';
        $stt = 0;
        $sott = 0;
        $sottbb = 0;
        $tennhomhocphan = '';
        $tennhomhocphantc = '';
        $row = 0;
        $sotttc = 0;
        foreach ($hocphan as  $value1) {

            $ctdt_hocphan = ctdt_hocphan::where('ctdt_hocphan.hocphan_id', '=', $value1->id)->get();
            foreach ($ctdt_hocphan as  $value) {
                $stt = $stt + 1;
                $du_lieu_tra_ve  .= '
                
                <tr>
                    <td style="text-align: center">' . $stt . '</td>
                    <td style="text-align: center">' . $value->hocphan->mahocphan . '</td>
                    <td >' . $value->hocphan->tenhocphantiengviet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotinchi . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::laydulieu_hocphan_BT($value->hocphan) . '</td>
                    
                    
                
                ';
                if ($value->hocphan->loaihocphan->tenloaihocphan == 'Tự chọn') {
                    if ($value->hocphan->nhomhocphantuchon_id != $tennhomhocphan) {
                        $tennhomhocphan = $value->hocphan->nhomhocphantuchon_id;
                        $ctdt_hocphan = ctdt_hocphan::all();
                        foreach ($ctdt_hocphan as $value2) {
                            if ($value2->hocphan->nhomhocphantuchon_id == $tennhomhocphan && $value2->ctdt_id == $value->ctdt_id )
                                $row = $row + 1;
                        }
                        $du_lieu_tra_ve  .= '
                            <td style="text-align: center" rowspan="' . $row . '">' . $value->hocphan->nhomhocphantuchon->tongsotinchi . '</td>
                            ';
                        $row = 0;
                    }
                } else {
                    $du_lieu_tra_ve  .= '
                            <td style="text-align: center" ></td>
                            ';
                }


                $du_lieu_tra_ve  .= '
                    <td style="text-align: center">' . $value->hocphan->sotietlythuyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotietthuchanh . '</td>
                    
                </tr>
                ';
                $sott +=  $value->hocphan->sotinchi;

                $sottbb +=  (int)ctdt_hocphanController::laydulieu_hocphan_BT($value->hocphan);
                if ($value->hocphan->nhomhocphantuchon_id != $tennhomhocphantc) {
                    $sotttc +=  (int)ctdt_hocphanController::laydulieu_hocphan_TC($value->hocphan);
                    $tennhomhocphantc = $value->hocphan->nhomhocphantuchon_id;
                }
            }
        }
        $sott =  $sotttc +  $sottbb;
        $du_lieu_tra_ve  .= '
                <tr>
                    <td colspan="8"><b>Học kỳ ' . ctdt_hocphanController::so_la_ma_hoky($value->hocphan->hocky) . ': ' . $sott . '  TC  (Bất buộc: ' . $sottbb . ' TC; Tự chọn: ' . $sotttc . ' TC)</b></td>
                </tr>
        ';


        return response()->json([
            'du_lieu' => $du_lieu_tra_ve
        ]);
    }

    public function AjaxGetDanhSach_khoikienthuc(Request $req)
    {
        $hocphan = hocphan::where('hocphan.khoikienthuc_id', '=', $req->id)->get();
        $khoikienthuc = khoikienthuc::find($req->id);
        $du_lieu_tra_ve  = '';
        $stt = 0;
        $sott = 0;
        $sottbb = 0;
        $nhomhocphan = '';
        $tennhomhocphan = 0;
        $tennhomhocphantc = 0;
        $row = 0;
        $sotttc = 0;
        foreach ($hocphan as  $value1) {
            $ctdt_hocphan = ctdt_hocphan::where('ctdt_hocphan.hocphan_id', '=', $value1->id)->get();
            foreach ($ctdt_hocphan as  $value) {
                $stt = $stt + 1;
                if ($value->hocphan->nhomhocphan_id == '') {

                    $du_lieu_tra_ve  .= '
                <tr>
                    <td style="text-align: center">' . $stt . '</td>
                    <td style="text-align: center">' . $value->hocphan->mahocphan . '</td>
                    <td >' . $value->hocphan->tenhocphantiengviet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotinchi . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::laydulieu_hocphan_BT($value->hocphan) . '</td>
                    
            ';
                    if ($value->hocphan->loaihocphan->tenloaihocphan == 'Tự chọn') {
                        if ($value->hocphan->nhomhocphantuchon_id != $tennhomhocphan) {
                            $tennhomhocphan = $value->hocphan->nhomhocphantuchon_id;
                            $ctdt_hocphan = ctdt_hocphan::all();
                            foreach ($ctdt_hocphan as $value2) {
                                if ($value2->hocphan->nhomhocphantuchon_id == $tennhomhocphan && $value2->ctdt_id == $value->ctdt_id )
                                    $row = $row + 1;
                            }
                            $du_lieu_tra_ve  .= '
                        <td style="text-align: center" rowspan="' . $row . '">' . $value->hocphan->nhomhocphantuchon->tongsotinchi . '</td>
                        ';
                            $row = 0;
                        }
                    } else {
                        $du_lieu_tra_ve  .= '
                        <td style="text-align: center" ></td>
                        ';
                    }
                    $du_lieu_tra_ve  .= '
                    <td style="text-align: center">' . $value->hocphan->sotietlythuyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotietthuchanh . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphantienquyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphanhoctruoc . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphansonghanh . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::so_la_ma_hoky($value->hocphan->hocky) . '</td>
                </tr>
            ';
                } elseif ($value->hocphan->nhomhocphan_id != $nhomhocphan &&  $value->hocphan->nhomhocphan_id != null) {
                    $du_lieu_tra_ve  .= '
                <tr>
                    <td style="text-align: center">' . $stt . '</td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->manhomhocphan . '</td>
                    <td>' . $value->hocphan->nhomhocphan->tennhomhocphan . '</td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->tongsotinchi . '</td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->tongsotinchi . '</td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->sotietlythuyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->sotietthuchanh . '</td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->dkhocphantienquyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->dkhocphanhoctruoc . '</td>
                    <td style="text-align: center">' . $value->hocphan->nhomhocphan->dkhocphansonghanh . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::so_la_ma_hoky_nhom($value->hocphan->nhomhocphan->hocky) . '</td>
                    
            ';
                    $nhomhocphan = $value->hocphan->nhomhocphan_id;
                }

                $sott +=  $value->hocphan->sotinchi;
                $sottbb +=  (int)ctdt_hocphanController::laydulieu_hocphan_BT($value->hocphan);
                if ($value->hocphan->nhomhocphantuchon_id != $tennhomhocphantc) {
                    $sotttc +=  (int)ctdt_hocphanController::laydulieu_hocphan_TC($value->hocphan);
                    $tennhomhocphantc = $value->hocphan->nhomhocphantuchon_id;
                }
            }
        }
        $sott =  $sotttc +  $sottbb;
        $du_lieu_tra_ve  .= '
                <tr>
                    <td colspan="12"><b>' . $khoikienthuc->tenkhoikienthuc . ': ' . $sott . '  TC  (Bất buộc: ' . $sottbb . ' TC; Tự chọn: ' . $sotttc . ' TC)</b></td>
                </tr>
        ';
        return response()->json([
            'du_lieu' => $du_lieu_tra_ve
        ]);
    }

    public function AjaxGetDanhSach_GiangVien_manager(Request $req)
    {
        $ctdt_hocphan = ctdt_hocphan::where('ctdt_id', $req->id)->get();
        $du_lieu_tra_ve  = '';
        $stt = 0;

        foreach ($ctdt_hocphan as  $value) {
            $stt = $stt + 1;

            $du_lieu_tra_ve  .= '
                
                <tr>
                    <td style="text-align: center">' . $stt . '</td>
                    <td style="text-align: center">' . $value->hocphan->mahocphan . '</td>
                    <td >' . $value->hocphan->tenhocphantiengviet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotinchi . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::laydulieu_hocphan_BT($value->hocphan) . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::laydulieu_hocphan_TC($value->hocphan) . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotietlythuyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->sotietthuchanh . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphantienquyet . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphanhoctruoc . '</td>
                    <td style="text-align: center">' . $value->hocphan->dkhocphanhoctruoc . '</td>
                    <td style="text-align: center">' . ctdt_hocphanController::so_la_ma_hoky($value->hocphan->hocky) . '</td>
                </tr>
            ';
        }

        return response()->json([
            'du_lieu' => $du_lieu_tra_ve
        ]);
    }

    /* start chuc nang hien thi ten hocj phan  */
    public static function laydulieu_hocphan_TC($id)
    {
        if ($id->loaihocphan->tenloaihocphan == 'Tự chọn') {
            $hocphan = hocphan::where('id', $id->id)->get();
            foreach ($hocphan as  $value) {
                $nhomhocphantuchon = nhomhocphantuchon::find($value->nhomhocphantuchon_id);
                return  $nhomhocphantuchon->tongsotinchi;
            }
        } else
            return '';
    }
    public static function laydulieu_hocphan_BT($id)
    {
        if ($id->loaihocphan->tenloaihocphan == 'Bắt buộc') {
            $hocphan = hocphan::where('id', $id->id)->get();
            foreach ($hocphan as  $value) {
                return  $value->sotinchi;
            }
        } else
            return '';
    }



    public static function so_la_ma_hoky($value)
    {
        if ($value == 1) return 'I';
        if ($value == 2) return 'II';
        if ($value == 3) return 'III';
        if ($value == 4) return 'IV';
        if ($value == 5) return 'V';
        if ($value == 6) return 'VI';
        if ($value == 7) return 'VII';
        if ($value == 8) return 'VIII';
    }
    public static function so_la_ma_hoky_nhom($value)
    {
        if ($value == "1,2") return 'I,II';
        if ($value == "3,4,5") return 'III,IV,V';
    }
    /* end chuc nang hien thi ten hocj phan  */

    public function postThem_Ctdt_ctdt(Request $request)
    {
        $this->validate($request, [
            'ctdt_id_dt' => ['required'],
            'ctdt_id_tm' => ['required'],
        ]);

        $ctdt_hocphan = ctdt_hocphan::where('ctdt_id', $request->ctdt_id_dt)->get();

        foreach ($ctdt_hocphan as $value) {
            $orm =  new ctdt_hocphan();
            $orm->ctdt_id =  $request->ctdt_id_tm;
            $orm->hocphan_id = $value->hocphan_id;
            $orm->ghichu = $value->ghichu;
            $orm->save();
        }
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt_hocphan', ['id' => $request->ctdt_id_tm]);
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt_hocphan', ['id' => $request->ctdt_id_tm]);
        }
    }

    public function postThem_Ctdt_hocphan(Request $request)
    {
        $this->validate($request, [
            'ctdt_id' => ['required'],
            'hocphan_id' => ['required'],

        ]);
        $orm = new ctdt_hocphan();
        $orm->ctdt_id = $request->ctdt_id;
        $orm->hocphan_id = $request->hocphan_id;
        $orm->ghichu = $request->ghichu;

        $orm->save();

        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
    }

    public function postThem_Ctdt_nhomhocphantuchon(Request $request)
    {
        $this->validate($request, [
            'ctdt_id' => ['required'],
            'nhomhocphantuchon_id' => ['required'],
        ]);

        $hocphan1 = hocphan::where('nhomhocphantuchon_id', $request->nhomhocphantuchon_id)->get();

        foreach ($hocphan1 as $value) {
            $orm = new ctdt_hocphan();
            $orm->ctdt_id = $request->ctdt_id;
            $orm->hocphan_id = $value->id;
            $orm->ghichu = $request->ghichu;
            $orm->save();
        }
        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
    }

    public function postSua_Ctdt_hocphan(Request $request)
    {
        $this->validate($request, [
            'nganhhoc_id_edit' => ['required'],
            'bomon_id_edit' => ['required'],
            'khoa_id_edit' => ['required'],
            'mactdt_edit' => ['required', 'max:6', 'unique:ctdt,mactdt,' . $request->id_edit],
            'tenctdt_edit' => ['required', 'max:100', 'unique:ctdt,tenctdt,' . $request->id_edit],
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

        return redirect()->route('admin.ctdt');
    }

    public function postXoa_Ctdt_hocphan(Request $request)
    {
        $ctdt_hocphan = ctdt_hocphan::where('id', $request->id_delete)->first();
        $hocphan = hocphan::all();
        $hocphan1 = hocphan::where('id', $ctdt_hocphan->hocphan_id)->first();
        $nhomhocphantuchon = $hocphan1->nhomhocphantuchon_id;
        foreach ($hocphan as $value) {

            if ($nhomhocphantuchon != NULL && $value->nhomhocphantuchon_id == $nhomhocphantuchon) {
                $ctdt_hocphan1 = ctdt_hocphan::where('hocphan_id', $value->id)->first();
                $orm = ctdt_hocphan::find($ctdt_hocphan1->id);
                $orm->delete();
            }
        }
        if ($hocphan1->nhomhocphantuchon_id == NULL) {
            $orm = ctdt_hocphan::find($request->id_delete);
            $orm->delete();
        }

        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt_hocphan', ['id' => $request->ctdt_id_delete]);
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt_hocphan', ['id' => $request->ctdt_id_delete]);
        }
    }

    public function postXoaall_Ctdt_hocphan(Request $request)
    {
        $ctdt_hocphan = ctdt_hocphan::all();
        foreach ($ctdt_hocphan as $value) {

            if ($value->ctdt_id == $request->ctdt_id_deleteall) {
                $orm = ctdt_hocphan::find($value->id)->first();
                $orm->delete();
            }
        }
        return redirect()->route('admin.ctdt_hocphan', ['id' => $request->ctdt_id_deleteall]);
    }

    public function postTimkiem_Ctdt_hocphan(Request $request)
    {
        if ($request->search) {
            $query = $request->search;
            $ctdt = DB::table('ctdt')
                ->where('id', '=', "$query")
                ->paginate(25);
        }
        $nganhhoc = nganhhoc::all();
        $bomon = bomon::all();
        $khoa = khoa::all();
        $ctdtsearch = ctdt::all();
        return view('admin.ctdt', compact('ctdt', 'nganhhoc', 'bomon', 'khoa', 'ctdtsearch'));
    }

    // Nhập từ Excel
    public function postNhap(Request $request)
    {
        Excel::import(new ctdt_hocphanImport, $request->file('file_excel'));

        if (Auth::user()->privilege == 'admin') {
            return redirect()->route('admin.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
        if (Auth::user()->privilege == 'supmanager') {
            return redirect()->route('supmanager.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
        if (Auth::user()->privilege == 'manager') {
            return redirect()->route('supmanager.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
        if (Auth::user()->privilege == 'user') {
            return redirect()->route('user.ctdt_hocphan', ['id' => $request->ctdt_id]);
        }
    }
    // Xuất ra Excel
    public function getXuat_ctdt_hocky()
    {
        return Excel::download(new ctdt_hocphan_hockyExport, 'danh-sach-ctdt-hoc-ky.xlsx');
    }
    public function getXuat_ctdt_khoikienthuc()
    {
        return Excel::download(new ctdt_hocphan_khoikienthucExport, 'danh-sach-ctdt-khoi-kien-thuc.xlsx');
    }
}
