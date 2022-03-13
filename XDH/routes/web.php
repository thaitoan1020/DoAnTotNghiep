<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupManagerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\khoaController;
use App\Http\Controllers\nganhhocController;
use App\Http\Controllers\khoahocController;
use App\Http\Controllers\bomonController;
use App\Http\Controllers\loaihocphanController;
use App\Http\Controllers\nhomhocphanController;
use App\Http\Controllers\nhomhocphantuchonController;
use App\Http\Controllers\khoikienthucController;
use App\Http\Controllers\ctdtController;
use App\Http\Controllers\lophocController;
use App\Http\Controllers\hocphanController;
use App\Http\Controllers\giangvienController;
use App\Http\Controllers\nhomgiangvienController;
use App\Http\Controllers\ctdt_hocphanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('home');

Auth::routes();

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function() {
	Route::get('/', [AdminController::class, 'getHome'])->name('home');
	Route::get('/home', [AdminController::class, 'getHome'])->name('home');

	Route::get('/nguoidung/admin', [NguoiDungController::class, 'getDanhSach_Admin'])->name('nguoidung_admin');
	Route::post('/nguoidung/admin/them', [NguoiDungController::class, 'postThem_Admin'])->name('nguoidung_admin.them');
	Route::post('/nguoidung/admin/sua', [NguoiDungController::class, 'postSua_Admin'])->name('nguoidung_admin.sua');
	Route::post('/nguoidung/admin/xoa', [NguoiDungController::class, 'postXoa_Admin'])->name('nguoidung_admin.xoa');
	Route::post('/nguoidung/admin/timkiem', [NguoiDungController::class, 'postTimkiem_Admin'])->name('nguoidung_admin.timkiem');
	
	Route::get('/nguoidung/supmanager', [NguoiDungController::class, 'getDanhSach_SupManager'])->name('nguoidung_supmanager');
	Route::post('/nguoidung/supmanager/them', [NguoiDungController::class, 'postThem_SupManager'])->name('nguoidung_supmanager.them');
	Route::post('/nguoidung/supmanager/sua', [NguoiDungController::class, 'postSua_SupManager'])->name('nguoidung_supmanager.sua');
	Route::post('/nguoidung/supmanager/xoa', [NguoiDungController::class, 'postXoa_SupManager'])->name('nguoidung_supmanager.xoa');
	Route::post('/nguoidung/supmanager/timkiem', [NguoiDungController::class, 'postTimkiem_SupManager'])->name('nguoidung_supmanager.timkiem');
	
	Route::get('/nguoidung/manager', [NguoiDungController::class, 'getDanhSach_Manager'])->name('nguoidung_manager');
	Route::post('/nguoidung/manager/them', [NguoiDungController::class, 'postThem_Manager'])->name('nguoidung_manager.them');
	Route::post('/nguoidung/manager/sua', [NguoiDungController::class, 'postSua_Manager'])->name('nguoidung_manager.sua');
	Route::post('/nguoidung/manager/xoa', [NguoiDungController::class, 'postXoa_Manager'])->name('nguoidung_manager.xoa');
	Route::post('/nguoidung/manager/timkiem', [NguoiDungController::class, 'postTimkiem_Manager'])->name('nguoidung_manager.timkiem');

	Route::get('/nguoidung/user', [NguoiDungController::class, 'getDanhSach_User'])->name('nguoidung_user');
	Route::post('/nguoidung/user/them', [NguoiDungController::class, 'postThem_User'])->name('nguoidung_user.them');
	Route::post('/nguoidung/user/sua', [NguoiDungController::class, 'postSua_User'])->name('nguoidung_user.sua');
	Route::post('/nguoidung/user/xoa', [NguoiDungController::class, 'postXoa_User'])->name('nguoidung_user.xoa');
	Route::post('/nguoidung/user/timkiem', [NguoiDungController::class, 'postTimkiem_User'])->name('nguoidung_user.timkiem');

	Route::get('/khoa', [khoaController::class, 'getDanhSach_Khoa'])->name('khoa');
	Route::post('/khoa/them', [khoaController::class, 'postThem_Khoa'])->name('khoa.them');
	Route::post('/khoa/sua', [khoaController::class, 'postSua_Khoa'])->name('khoa.sua');
	Route::post('/khoa/xoa', [khoaController::class, 'postXoa_Khoa'])->name('khoa.xoa');
	Route::post('/khoa/timkiem', [khoaController::class, 'postTimkiem_Khoa'])->name('khoa.timkiem');

	Route::get('/nganhhoc', [nganhhocController::class, 'getDanhSach_Nganhhoc'])->name('nganhhoc');
	Route::post('/nganhhoc/them', [nganhhocController::class, 'postThem_Nganhhoc'])->name('nganhhoc.them');
	Route::post('/nganhhoc/sua', [nganhhocController::class, 'postSua_Nganhhoc'])->name('nganhhoc.sua');
	Route::post('/nganhhoc/xoa', [nganhhocController::class, 'postXoa_Nganhhoc'])->name('nganhhoc.xoa');
	Route::post('/nganhhoc/timkiem', [nganhhocController::class, 'postTimkiem_Nganhhoc'])->name('nganhhoc.timkiem');

	Route::get('/khoahoc', [khoahocController::class, 'getDanhSach_Khoahoc'])->name('khoahoc');
	Route::post('/khoahoc/them', [khoahocController::class, 'postThem_Khoahoc'])->name('khoahoc.them');
	Route::post('/khoahoc/sua', [khoahocController::class, 'postSua_Khoahoc'])->name('khoahoc.sua');
	Route::post('/khoahoc/xoa', [khoahocController::class, 'postXoa_Khoahoc'])->name('khoahoc.xoa');
	Route::post('/khoahoc/timkiem', [khoahocController::class, 'postTimkiem_Khoahoc'])->name('khoahoc.timkiem');

	Route::get('/bomon', [bomonController::class, 'getDanhSach_Bomon'])->name('bomon');
	Route::post('/bomon/them', [bomonController::class, 'postThem_Bomon'])->name('bomon.them');
	Route::post('/bomon/sua', [bomonController::class, 'postSua_Bomon'])->name('bomon.sua');
	Route::post('/bomon/xoa', [bomonController::class, 'postXoa_Bomon'])->name('bomon.xoa');
	Route::post('/bomon/timkiem', [bomonController::class, 'postTimkiem_Bomon'])->name('bomon.timkiem');

	Route::get('/loaihocphan', [loaihocphanController::class, 'getDanhSach_Loaihocphan'])->name('loaihocphan');
	Route::post('/loaihocphan/them', [loaihocphanController::class, 'postThem_Loaihocphan'])->name('loaihocphan.them');
	Route::post('/loaihocphan/sua', [loaihocphanController::class, 'postSua_Loaihocphan'])->name('loaihocphan.sua');
	Route::post('/loaihocphan/xoa', [loaihocphanController::class, 'postXoa_Loaihocphan'])->name('loaihocphan.xoa');
	Route::post('/loaihocphan/timkiem', [loaihocphanController::class, 'postTimkiem_Loaihocphan'])->name('loaihocphan.timkiem');

	Route::get('/nhomhocphan', [nhomhocphanController::class, 'getDanhSach_Nhomhocphan'])->name('nhomhocphan');
	Route::post('/nhomhocphan/them', [nhomhocphanController::class, 'postThem_Nhomhocphan'])->name('nhomhocphan.them');
	Route::post('/nhomhocphan/sua', [nhomhocphanController::class, 'postSua_Nhomhocphan'])->name('nhomhocphan.sua');
	Route::post('/nhomhocphan/xoa', [nhomhocphanController::class, 'postXoa_Nhomhocphan'])->name('nhomhocphan.xoa');
	Route::post('/nhomhocphan/timkiem', [nhomhocphanController::class, 'postTimkiem_Nhomhocphan'])->name('nhomhocphan.timkiem');

	Route::get('/nhomhocphantuchon', [nhomhocphantuchonController::class, 'getDanhSach_Nhomhocphantuchon'])->name('nhomhocphantuchon');
	Route::post('/nhomhocphantuchon/them', [nhomhocphantuchonController::class, 'postThem_Nhomhocphantuchon'])->name('nhomhocphantuchon.them');
	Route::post('/nhomhocphantuchon/sua', [nhomhocphantuchonController::class, 'postSua_Nhomhocphantuchon'])->name('nhomhocphantuchon.sua');
	Route::post('/nhomhocphantuchon/xoa', [nhomhocphantuchonController::class, 'postXoa_Nhomhocphantuchon'])->name('nhomhocphantuchon.xoa');
	Route::post('/nhomhocphantuchon/timkiem', [nhomhocphantuchonController::class, 'postTimkiem_Nhomhocphantuchon'])->name('nhomhocphantuchon.timkiem');

	Route::get('/khoikienthuc', [khoikienthucController::class, 'getDanhSach_Khoikienthuc'])->name('khoikienthuc');
	Route::post('/khoikienthuc/them', [khoikienthucController::class, 'postThem_Khoikienthuc'])->name('khoikienthuc.them');
	Route::post('/khoikienthuc/sua', [khoikienthucController::class, 'postSua_Khoikienthuc'])->name('khoikienthuc.sua');
	Route::post('/khoikienthuc/xoa', [khoikienthucController::class, 'postXoa_Khoikienthuc'])->name('khoikienthuc.xoa');
	Route::post('/khoikienthuc/timkiem', [khoikienthucController::class, 'postTimkiem_Khoikienthuc'])->name('khoikienthuc.timkiem');

	Route::get('/ctdt', [ctdtController::class, 'getDanhSach_Ctdt'])->name('ctdt');
	Route::post('/ctdt/them', [ctdtController::class, 'postThem_Ctdt'])->name('ctdt.them');
	Route::post('/ctdt/sua', [ctdtController::class, 'postSua_Ctdt'])->name('ctdt.sua');
	Route::post('/ctdt/xoa', [ctdtController::class, 'postXoa_Ctdt'])->name('ctdt.xoa');

	Route::get('/lophoc', [lophocController::class, 'getDanhSach_Lophoc'])->name('lophoc');
	Route::post('/lophoc/them', [lophocController::class, 'postThem_Lophoc'])->name('lophoc.them');
	Route::post('/lophoc/sua', [lophocController::class, 'postSua_Lophoc'])->name('lophoc.sua');
	Route::post('/lophoc/xoa', [lophocController::class, 'postXoa_Lophoc'])->name('lophoc.xoa');
	Route::post('/lophoc/timkiem', [lophocController::class, 'postTimkiem_Lophoc'])->name('lophoc.timkiem');

	Route::get('/hocphan', [hocphanController::class, 'getDanhSach_Hocphan'])->name('hocphan');
	Route::post('/hocphan/them', [hocphanController::class, 'postThem_Hocphan'])->name('hocphan.them');
	Route::post('/hocphan/sua', [hocphanController::class, 'postSua_Hocphan'])->name('hocphan.sua');
	Route::post('/hocphan/xoa', [hocphanController::class, 'postXoa_Hocphan'])->name('hocphan.xoa');
	Route::get('/hocphan/chitiet{id}', [hocphanController::class, 'getXem_Hocphanchitiet'])->name('hocphan.chitiet');
	Route::post('/hocphan/timkiem', [hocphanController::class, 'postTimkiem_Hocphan'])->name('hocphan.timkiem');

	Route::post('/hocphan/nhap', [hocphanController::class, 'postNhap'])->name('hocphan.nhap');
	Route::get('/hocphan/xuat', [hocphanController::class, 'getXuat'])->name('hocphan.xuat');

	Route::get('/giangvien', [giangvienController::class, 'getDanhSach_Giangvien'])->name('giangvien');
	Route::post('/giangvien/them', [giangvienController::class, 'postThem_Giangvien'])->name('giangvien.them');
	Route::post('/giangvien/sua', [giangvienController::class, 'postSua_Giangvien'])->name('giangvien.sua');
	Route::post('/giangvien/xoa', [giangvienController::class, 'postXoa_Giangvien'])->name('giangvien.xoa');
	Route::post('/giangvien/timkiem', [giangvienController::class, 'postTimkiem_Giangvien'])->name('giangvien.timkiem');

	Route::get('/nhomgiangvien', [nhomgiangvienController::class, 'getDanhSach_Nhomgiangvien'])->name('nhomgiangvien');
	Route::post('/nhomgiangvien/them', [nhomgiangvienController::class, 'postThem_Nhomgiangvien'])->name('nhomgiangvien.them');
	Route::post('/nhomgiangvien/sua', [nhomgiangvienController::class, 'postSua_Nhomgiangvien'])->name('nhomgiangvien.sua');
	Route::post('/nhomgiangvien/suagv', [nhomgiangvienController::class, 'postSua_Nhomgiangvien_giangvien'])->name('nhomgiangvien.suagv');
	Route::post('/nhomgiangvien/xoa', [nhomgiangvienController::class, 'postXoa_Nhomgiangvien'])->name('nhomgiangvien.xoa');
	Route::post('/nhomgiangvien/xoagv', [nhomgiangvienController::class, 'postXoa_Nhomgiangvien_giangvien'])->name('nhomgiangvien.xoagv');

	Route::get('/ctdt_hocphan_hocky', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_hocphan_hocky'])->name('ctdt_hocphan_hocky');

	Route::get('/ctdt_hocphan_khoikienthuc', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc');

	Route::get('/ctdt_hocphan{id}', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_hocphan_admin'])->name('ctdt_hocphan');
	Route::post('/ctdt_hocphan/themctdt', [ctdt_hocphanController::class, 'postThem_Ctdt_ctdt'])->name('ctdt_hocphan.themctdt');
	Route::post('/ctdt_hocphan/themhp', [ctdt_hocphanController::class, 'postThem_Ctdt_hocphan'])->name('ctdt_hocphan.themhp');
	Route::post('/ctdt_hocphan/themnhptc', [ctdt_hocphanController::class, 'postThem_Ctdt_nhomhocphantuchon'])->name('ctdt_hocphan.themnhptc');
	Route::post('/ctdt_hocphan/sua', [ctdt_hocphanController::class, 'postSua_Ctdt_hocphan'])->name('ctdt_hocphan.sua');
	Route::post('/ctdt_hocphan/xoa', [ctdt_hocphanController::class, 'postXoa_Ctdt_hocphan'])->name('ctdt_hocphan.xoa');
	Route::post('/ctdt_hocphan/xoaAll', [ctdt_hocphanController::class, 'postXoaALL_Ctdt_hocphan'])->name('ctdt_hocphan.xoaAll');
	Route::get('/ctdt_hocphan/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach'])->name('ctdt_hocphan.ajax');
	Route::get('/ctdt_hocphan_hocky/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_hocky'])->name('ctdt_hocphan_hocky.ajax');
	Route::get('/ctdt_hocphan_khoikienthuc/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc.ajax');

	Route::post('/ctdt_hocphan/nhap', [ctdt_hocphanController::class, 'postNhap'])->name('ctdt_hocphan.nhap');
	Route::get('/ctdt_hocphan/xuat_ctdt_hocky', [ctdt_hocphanController::class, 'getXuat_ctdt_hocky'])->name('ctdt_hocphan.xuat_ctdt_hocky');
	Route::get('/ctdt_hocphan/xuat_ctdt_khoikienthuc', [ctdt_hocphanController::class, 'getXuat_ctdt_khoikienthuc'])->name('ctdt_hocphan.xuat_ctdt_khoikienthuc');

	

	Route::get('/doimatkhau', [NguoiDungController::class, 'getDoiMatKhau_Admin'])->name('doimatkhau');
	Route::post('/doimatkhau', [NguoiDungController::class, 'postDoiMatKhau_Admin'])->name('doimatkhau');
});

Route::prefix('manager')->middleware('manager')->name('manager.')->group(function() {
	Route::get('/', [ManagerController::class, 'getHome'])->name('home');
	Route::get('/home', [ManagerController::class, 'getHome'])->name('home');

	Route::get('/hocphan', [hocphanController::class, 'getDanhSach_Hocphan'])->name('hocphan');
	Route::get('/hocphan/chitiet{id}', [hocphanController::class, 'getXem_Hocphanchitiet'])->name('hocphan.chitiet');

	Route::post('/hocphan/nhap', [hocphanController::class, 'postNhap'])->name('hocphan.nhap');
	Route::get('/hocphan/xuat', [hocphanController::class, 'getXuat'])->name('hocphan.xuat');

	Route::get('/giangvien', [giangvienController::class, 'getDanhSach_Giangvien'])->name('giangvien');

	Route::get('/nhomgiangvien', [nhomgiangvienController::class, 'getDanhSach_Nhomgiangvien'])->name('nhomgiangvien');
	
	Route::get('/ctdt_hocphan_hocky', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_hocphan_hocky'])->name('ctdt_hocphan_hocky');

	Route::get('/ctdt_hocphan_khoikienthuc', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc');

	Route::get('/ctdt_hocphan{id}', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_hocphan_supmanager'])->name('ctdt_hocphan');
	Route::get('/ctdt_hocphan/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach'])->name('ctdt_hocphan.ajax');
	Route::get('/ctdt_hocphan_hocky/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_hocky'])->name('ctdt_hocphan_hocky.ajax');
	Route::get('/ctdt_hocphan_khoikienthuc/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc.ajax');

	Route::get('/ctdt_hocphan/xuat_ctdt_hocky', [ctdt_hocphanController::class, 'getXuat_ctdt_hocky'])->name('ctdt_hocphan.xuat_ctdt_hocky');
	Route::get('/ctdt_hocphan/xuat_ctdt_khoikienthuc', [ctdt_hocphanController::class, 'getXuat_ctdt_khoikienthuc'])->name('ctdt_hocphan.xuat_ctdt_khoikienthuc');

	Route::get('/doimatkhau', [NguoiDungController::class, 'getDoiMatKhau_Supmanager'])->name('doimatkhau');
	Route::post('/doimatkhau', [NguoiDungController::class, 'postDoiMatKhau_Supmanager'])->name('doimatkhau');
});

Route::prefix('supmanager')->middleware('supmanager')->name('supmanager.')->group(function() {
	Route::get('/', [SupManagerController::class, 'getHome'])->name('home');
	Route::get('/home', [SupManagerController::class, 'getHome'])->name('home');

	Route::get('/ctdt', [ctdtController::class, 'getDanhSach_Ctdt'])->name('ctdt');
	Route::post('/ctdt/them', [ctdtController::class, 'postThem_Ctdt'])->name('ctdt.them');
	Route::post('/ctdt/sua', [ctdtController::class, 'postSua_Ctdt'])->name('ctdt.sua');
	Route::post('/ctdt/xoa', [ctdtController::class, 'postXoa_Ctdt'])->name('ctdt.xoa');

	Route::get('/hocphan', [hocphanController::class, 'getDanhSach_Hocphan'])->name('hocphan');
	Route::post('/hocphan/them', [hocphanController::class, 'postThem_Hocphan'])->name('hocphan.them');
	Route::post('/hocphan/sua', [hocphanController::class, 'postSua_Hocphan'])->name('hocphan.sua');
	Route::post('/hocphan/xoa', [hocphanController::class, 'postXoa_Hocphan'])->name('hocphan.xoa');
	Route::get('/hocphan/chitiet{id}', [hocphanController::class, 'getXem_Hocphanchitiet'])->name('hocphan.chitiet');

	Route::post('/hocphan/nhap', [hocphanController::class, 'postNhap'])->name('hocphan.nhap');
	Route::get('/hocphan/xuat', [hocphanController::class, 'getXuat'])->name('hocphan.xuat');

	Route::get('/giangvien', [giangvienController::class, 'getDanhSach_Giangvien'])->name('giangvien');
	Route::post('/giangvien/them', [giangvienController::class, 'postThem_Giangvien'])->name('giangvien.them');
	Route::post('/giangvien/sua', [giangvienController::class, 'postSua_Giangvien'])->name('giangvien.sua');
	Route::post('/giangvien/xoa', [giangvienController::class, 'postXoa_Giangvien'])->name('giangvien.xoa');
	Route::post('/giangvien/timkiem', [giangvienController::class, 'postTimkiem_Giangvien'])->name('giangvien.timkiem');

	Route::get('/nhomgiangvien', [nhomgiangvienController::class, 'getDanhSach_Nhomgiangvien'])->name('nhomgiangvien');
	Route::post('/nhomgiangvien/them', [nhomgiangvienController::class, 'postThem_Nhomgiangvien'])->name('nhomgiangvien.them');
	Route::post('/nhomgiangvien/sua', [nhomgiangvienController::class, 'postSua_Nhomgiangvien'])->name('nhomgiangvien.sua');
	Route::post('/nhomgiangvien/suagv', [nhomgiangvienController::class, 'postSua_Nhomgiangvien_giangvien'])->name('nhomgiangvien.suagv');
	Route::post('/nhomgiangvien/xoa', [nhomgiangvienController::class, 'postXoa_Nhomgiangvien'])->name('nhomgiangvien.xoa');
	Route::post('/nhomgiangvien/xoagv', [nhomgiangvienController::class, 'postXoa_Nhomgiangvien_giangvien'])->name('nhomgiangvien.xoagv');

	Route::get('/ctdt_hocphan_hocky', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_hocphan_hocky'])->name('ctdt_hocphan_hocky');

	Route::get('/ctdt_hocphan_khoikienthuc', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc');

	Route::get('/ctdt_hocphan{id}', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_hocphan_supmanager'])->name('ctdt_hocphan');
	Route::post('/ctdt_hocphan/themctdt', [ctdt_hocphanController::class, 'postThem_Ctdt_ctdt'])->name('ctdt_hocphan.themctdt');
	Route::post('/ctdt_hocphan/themhp', [ctdt_hocphanController::class, 'postThem_Ctdt_hocphan'])->name('ctdt_hocphan.themhp');
	Route::post('/ctdt_hocphan/themnhptc', [ctdt_hocphanController::class, 'postThem_Ctdt_nhomhocphantuchon'])->name('ctdt_hocphan.themnhptc');
	Route::post('/ctdt_hocphan/sua', [ctdt_hocphanController::class, 'postSua_Ctdt_hocphan'])->name('ctdt_hocphan.sua');
	Route::post('/ctdt_hocphan/xoa', [ctdt_hocphanController::class, 'postXoa_Ctdt_hocphan'])->name('ctdt_hocphan.xoa');
	Route::get('/ctdt_hocphan/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach'])->name('ctdt_hocphan.ajax');
	Route::get('/ctdt_hocphan_hocky/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_hocky'])->name('ctdt_hocphan_hocky.ajax');
	Route::get('/ctdt_hocphan_khoikienthuc/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc.ajax');

	Route::post('/ctdt_hocphan/nhap', [ctdt_hocphanController::class, 'postNhap'])->name('ctdt_hocphan.nhap');
	Route::get('/ctdt_hocphan/xuat_ctdt_hocky', [ctdt_hocphanController::class, 'getXuat_ctdt_hocky'])->name('ctdt_hocphan.xuat_ctdt_hocky');
	Route::get('/ctdt_hocphan/xuat_ctdt_khoikienthuc', [ctdt_hocphanController::class, 'getXuat_ctdt_khoikienthuc'])->name('ctdt_hocphan.xuat_ctdt_khoikienthuc');

	Route::get('/doimatkhau', [NguoiDungController::class, 'getDoiMatKhau_Supmanager'])->name('doimatkhau');
	Route::post('/doimatkhau', [NguoiDungController::class, 'postDoiMatKhau_Supmanager'])->name('doimatkhau');
});

Route::prefix('user')->middleware('user')->name('user.')->group(function() {
	Route::get('/', [UserController::class, 'getHome'])->name('home');
	Route::get('/home', [UserController::class, 'getHome'])->name('home');

	Route::get('/hocphanxem', [hocphanController::class, 'getDanhSach_Hocphan'])->name('hocphanxem');

	Route::get('/hocphan', [hocphanController::class, 'getDanhSach_Hocphan_user'])->name('hocphan');
	Route::post('/hocphan/sua', [hocphanController::class, 'postSua_Hocphan_user'])->name('hocphan.sua');
	Route::post('/hocphan/xoa', [hocphanController::class, 'postXoa_Hocphan_user'])->name('hocphan.xoa');
	Route::get('/hocphan/chitiet{id}', [hocphanController::class, 'getXem_Hocphanchitiet'])->name('hocphan.chitiet');
	Route::post('/hocphan/timkiem', [hocphanController::class, 'postTimkiem_Hocphan_user'])->name('hocphan.timkiem');

	Route::get('/hocphan/xuat', [hocphanController::class, 'getXuat'])->name('hocphan.xuat');

	Route::get('/ctdt_hocphan_hocky', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_hocphan_hocky'])->name('ctdt_hocphan_hocky');

	Route::get('/ctdt_hocphan_khoikienthuc', [ctdt_hocphanController::class, 'getDanhSach_Ctdt_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc');

	
	Route::get('/ctdt_hocphan_hocky/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_hocky'])->name('ctdt_hocphan_hocky.ajax');
	Route::get('/ctdt_hocphan_khoikienthuc/ajax-show', [ctdt_hocphanController::class, 'AjaxGetDanhSach_khoikienthuc'])->name('ctdt_hocphan_khoikienthuc.ajax');

	Route::get('/ctdt_hocphan/xuat_ctdt_hocky', [ctdt_hocphanController::class, 'getXuat_ctdt_hocky'])->name('ctdt_hocphan.xuat_ctdt_hocky');
	Route::get('/ctdt_hocphan/xuat_ctdt_khoikienthuc', [ctdt_hocphanController::class, 'getXuat_ctdt_khoikienthuc'])->name('ctdt_hocphan.xuat_ctdt_khoikienthuc');

	Route::get('/doimatkhau', [NguoiDungController::class, 'getDoiMatKhau_User'])->name('doimatkhau');
	Route::post('/doimatkhau', [NguoiDungController::class, 'postDoiMatKhau_User'])->name('doimatkhau');
});

Route::prefix('app')->middleware('admin')->name('app.')->group(function() {
	Route::get('/up', function(){
		Artisan::call('up');
		return redirect()->route('admin.home')->with('status', 'Đã tắt chế độ bảo trì hệ thống!');
	})->name('up');
	
	Route::get('/down', function(){
		Artisan::call('down');
		return redirect()->route('admin.home')->with('status', 'Đã kích hoạt chế độ bảo trì hệ thống!');
	})->name('down');
});	