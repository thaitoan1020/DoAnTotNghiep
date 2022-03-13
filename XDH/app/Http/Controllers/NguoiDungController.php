<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\nguoidung;
use App\Models\giangvien;
use App\Models\khoa;
use DB;

class NguoiDungController extends Controller
{

	public function getDoiMatKhau_Admin()
	{
		return view('admin.doimatkhau');
	}
	
    public function postDoiMatKhau_Admin( Request $request)
	{
		$this->validate($request, [
			'old_password' => 'required|max:5',
			'new_password' => 'required|min:6|confirmed'
		]);
		
		$nguoidung = nguoidung::where('id', Auth::user()->id)->first();
		if(Hash::check($request->old_password, $nguoidung->password))
		{
			nguoidung::where('id', Auth::user()->id)->update([
				'password' => Hash::make($request->new_password)
			]);
			return redirect()->route('admin.doimatkhau')->with('success', 'Đổi mật khẩu thành công!');
		}
		else
			return redirect()->route('admin.doimatkhau')->with('warning', 'Mật khẩu cũ không chính xác!');
	}
	public function getDoiMatKhau_SupManager()
	{
		return view('supmanager.doimatkhau');
	}
	
	public function postDoiMatKhau_SupManager(Request $request)
	{
		$this->validate($request, [
			'old_password' => 'required|max:5',
			'new_password' => 'required|min:6|confirmed'
		]);
		
		$nguoidung = nguoidung::where('id', Auth::user()->id)->first();
		if(Hash::check($request->old_password, $nguoidung->password))
		{
			nguoidung::where('id', Auth::user()->id)->update([
				'password' => Hash::make($request->new_password)
			]);
			return redirect()->route('supmanager.doimatkhau')->with('success', 'Đổi mật khẩu thành công!');
		}
		else
			return redirect()->route('supmanager.doimatkhau')->with('warning', 'Mật khẩu cũ không chính xác!');
	}
	
	public function getDoiMatKhau_Manager()
	{
		return view('manager.doimatkhau');
	}
	
	public function postDoiMatKhau_Manager(Request $request)
	{
		$this->validate($request, [
			'old_password' => 'required|max:5',
			'new_password' => 'required|min:6|confirmed'
		]);
		
		$nguoidung = nguoidung::where('id', Auth::user()->id)->first();
		if(Hash::check($request->old_password, $nguoidung->password))
		{
			nguoidung::where('id', Auth::user()->id)->update([
				'password' => Hash::make($request->new_password)
			]);
			return redirect()->route('manager.doimatkhau')->with('success', 'Đổi mật khẩu thành công!');
		}
		else
			return redirect()->route('manager.doimatkhau')->with('warning', 'Mật khẩu cũ không chính xác!');
	}
	
	public function getDoiMatKhau_User()
	{
		return view('user.doimatkhau');
	}
	
	public function postDoiMatKhau_User(Request $request)
	{
		$this->validate($request, [
			'old_password' => 'required|max:5',
			'new_password' => 'required|min:6|confirmed'
		]);
		
		$nguoidung = nguoidung::where('id', Auth::user()->id)->first();
		if(Hash::check($request->old_password, $nguoidung->password))
		{
			nguoidung::where('id', Auth::user()->id)->update([
				'password' => Hash::make($request->new_password)
			]);
			return redirect()->route('user.doimatkhau')->with('success', 'Đổi mật khẩu thành công!');
		}
		else
			return redirect()->route('user.doimatkhau')->with('warning', 'Mật khẩu cũ không chính xác!');
	}

	public function getDanhSach_Admin()
	{
		$nguoidung = nguoidung::where('privilege', 'admin')->get();
		$nguoidungsearch = nguoidung::where('privilege', 'admin')->get();
        return view('admin.nguoidung_admin', compact('nguoidung','nguoidungsearch'));
	}
	
	public function getDanhSach_SupManager()
	{
		$nguoidung = nguoidung::where('privilege', 'supmanager')->get();
		$nguoidungsearch = nguoidung::where('privilege', 'supmanager')->get();
        return view('admin.nguoidung_supmanager', compact('nguoidung','nguoidungsearch'));
	}
	
	public function getDanhSach_Manager()
	{
		$nguoidung = nguoidung::where('privilege', 'manager')->get();
		$khoa = khoa::all();
		$nguoidungsearch = nguoidung::where('privilege', 'manager')->get();
		return view('admin.nguoidung_manager', compact('nguoidung','khoa','nguoidungsearch'));
	}
	
	public function getDanhSach_User()
	{
		$nguoidung = nguoidung::where('privilege', 'user')->get();
		$giangvien = giangvien::all();
		$nguoidungsearch = nguoidung::where('privilege', 'user')->get();
		return view('admin.nguoidung_user', compact('nguoidung', 'giangvien','nguoidungsearch'));
	}
	
	public function postThem_Admin(Request $request)
	{
		$this->validate($request, [
			'name' => ['required', 'max:5'],
			'username' => ['required', 'max:5', 'unique:nguoidung'],
			'email' => ['required', 'email', 'max:5', 'unique:nguoidung'],
			'password' => ['required', 'min:6', 'confirmed'],
		]);
		
		$orm = new nguoidung();
		$orm->name = $request->name;
		$orm->username = $request->username;
		$orm->email = $request->email;
		$orm->password = Hash::make($request->password);
		$orm->privilege = 'admin';
		$orm->save();
		
		return redirect()->route('admin.nguoidung_admin');
	}
	
	public function postThem_SupManager(Request $request)
	{
		$this->validate($request, [
			'name' => ['required', 'max:5'],
			'username' => ['required', 'max:5', 'unique:nguoidung'],
			'email' => ['required', 'email', 'max:5', 'unique:nguoidung'],
			'password' => ['required', 'min:6', 'confirmed'],
		]);
		
		$orm = new nguoidung();
		$orm->name = $request->name;
		$orm->username = $request->username;
		$orm->email = $request->email;
		$orm->password = Hash::make($request->password);
		$orm->privilege = 'supmanager';
		$orm->save();
		
		return redirect()->route('admin.nguoidung_supmanager');
	}
	
	public function postThem_Manager(Request $request)
	{
		$this->validate($request, [
			'khoa_id' => ['required'],
			'name' => ['required', 'max:5'],
			'username' => ['required', 'max:5', 'unique:nguoidung'],
			'email' => ['required', 'email', 'max:5', 'unique:nguoidung'],
			'password' => ['required', 'min:6', 'confirmed'],
		]);

		$khoa = khoa::find($request->khoa_id);
		
		$orm = new nguoidung();
		$orm->khoa_id =  $khoa->id;
		$orm->name = $request->name;
		$orm->username = $request->username;
		$orm->email = $request->email;
		$orm->password = Hash::make($request->password);
		$orm->privilege = 'manager';
		$orm->save();
		
		return redirect()->route('admin.nguoidung_manager');
	}
	
	public function postThem_User(Request $request)
	{
		$this->validate($request, [
			'giangvien_id' => ['required'],
			'username' => ['required', 'max:5', 'unique:nguoidung'],
			'password' => ['required', 'min:6', 'confirmed'],
		]);
		
		$giangvien = giangvien::find($request->giangvien_id);
		
		$orm = new nguoidung();
		$orm->giangvien_id =  $giangvien->id;
		$orm->name = $giangvien->tengiangvien;
		$orm->username = $request->username;
		$orm->email =  $giangvien->email;
		$orm->password = Hash::make($request->password);
		$orm->privilege = 'user';
		$orm->save();
		
		return redirect()->route('admin.nguoidung_user');
	}
	
	public function postSua_Admin(Request $request)
	{
		$this->validate($request, [
			'name_edit' => ['required', 'max:5'],
			'username_edit' => ['required', 'max:5', 'unique:nguoidung,username,' . $request->id_edit],
			'email_edit' => ['required', 'email', 'max:5', 'unique:nguoidung,email,' . $request->id_edit],
			'password_edit' => ['confirmed'],
		]);
		
		$orm = nguoidung::find($request->id_edit);
		$orm->name = $request->name_edit;
		$orm->username = $request->username_edit;
		$orm->email = $request->email_edit;
		if(!empty($request->password_edit)) $orm->password = Hash::make($request->password_edit);
		$orm->save();
		
		return redirect()->route('admin.nguoidung_admin');
	}
	
	public function postSua_SupManager(Request $request)
	{
		$this->validate($request, [
			'name_edit' => ['required', 'max:5'],
			'username_edit' => ['required', 'max:5', 'unique:nguoidung,username,' . $request->id_edit],
			'email_edit' => ['required', 'email', 'max:5', 'unique:nguoidung,email,' . $request->id_edit],
			'password_edit' => ['confirmed'],
		]);
		
		$orm = nguoidung::find($request->id_edit);
		$orm->name = $request->name_edit;
		$orm->username = $request->username_edit;
		$orm->email = $request->email_edit;
		if(!empty($request->password_edit)) $orm->password = Hash::make($request->password_edit);
		$orm->save();
		
		return redirect()->route('admin.nguoidung_supmanager');
	}
	
	public function postSua_Manager(Request $request)
	{
		$this->validate($request, [
			'name_edit' => ['required', 'max:5'],
			'username_edit' => ['required', 'max:5', 'unique:nguoidung,username,' . $request->id_edit],
			'email_edit' => ['required', 'email', 'max:5', 'unique:nguoidung,email,' . $request->id_edit],
			'password_edit' => ['confirmed'],
		]);

		$khoa = khoa::find($request->khoa_id_edit);

		$orm = nguoidung::find($request->id_edit);
		$orm->khoa_id =  $khoa->id;
		$orm->name = $request->name_edit;
		$orm->username = $request->username_edit;
		$orm->email = $request->email_edit;
		if(!empty($request->password_edit)) $orm->password = Hash::make($request->password_edit);
		$orm->save();
		
		return redirect()->route('admin.nguoidung_manager');
	}
	
	public function postSua_User(Request $request)
	{
		$this->validate($request, [
			'giangvien_id_edit' => ['required'],
			'username_edit' => ['required', 'max:5', 'unique:nguoidung,username,' . $request->id_edit],
			'email_edit' => ['required', 'email', 'max:5', 'unique:nguoidung,email,' . $request->id_edit],
			'password_edit' => ['confirmed'],
		]);

		$giangvien = giangvien::find($request->giangvien_id_edit);
		
		$orm = nguoidung::find($request->id_edit);
		$orm->giangvien_id =  $giangvien->id;
		$orm->name = $giangvien->tengiangvien;
		$orm->username = $request->username_edit;
		$orm->email = $giangvien->email;
		if(!empty($request->password_edit)) $orm->password = Hash::make($request->password_edit);
		$orm->save();
		
		return redirect()->route('admin.nguoidung_user');
	}
	
	public function postXoa_Admin(Request $request)
	{
		$orm = nguoidung::find($request->id_delete);
		$orm->delete();
		
		return redirect()->route('admin.nguoidung_admin');
	}
	
	public function postXoa_SupManager(Request $request)
	{
		$orm = nguoidung::find($request->id_delete);
		$orm->delete();
		
		return redirect()->route('admin.nguoidung_supmanager');
	}
	
	public function postXoa_Manager(Request $request)
	{
		$orm = nguoidung::find($request->id_delete);
		$orm->delete();
		
		return redirect()->route('admin.nguoidung_manager');
	}
	
	public function postXoa_User(Request $request)
	{
		$orm = nguoidung::find($request->id_delete);
		$orm->delete();
		
		return redirect()->route('admin.nguoidung_user');
	}
	//timkiem
	public function postTimkiem_Admin(Request $request)
    {
    	if($request->search)
        {
            $query = $request->search;
            $nguoidung = DB::table('nguoidung')
            ->where('id', '=', "$query" , 'and','privilege', 'admin')
            ->all();
        }
        $nguoidungsearch = nguoidung::where('privilege', 'admin')->get();
        return view('admin.nguoidung_admin', compact('nguoidung','nguoidungsearch'));
    }

    public function postTimkiem_SupManager(Request $request)
    {
    	if($request->search)
        {
            $query = $request->search;
            $nguoidung = DB::table('nguoidung')
            ->where('id', '=', "$query" , 'and','privilege', 'supmanager')
            ->all();
        }
        $nguoidungsearch = nguoidung::where('privilege', 'supmanager')->get();
        return view('admin.nguoidung_supmanager', compact('nguoidung','nguoidungsearch'));
    }

    public function postTimkiem_Manager(Request $request)
    {
    	if($request->search)
        {
            $query = $request->search;
            $nguoidung = DB::table('nguoidung')
            ->where('id', '=', "$query" , 'and','privilege', 'manager')
            ->all();
        }
        $khoa = khoa::all();
		$nguoidungsearch = nguoidung::where('privilege', 'manager')->get();
		return view('admin.nguoidung_manager', compact('nguoidung','khoa','nguoidungsearch'));
    }

    public function postTimkiem_User(Request $request)
    {
    	if($request->search)
        {
            $query = $request->search;
            $nguoidung = DB::table('nguoidung' )
            ->where('id', '=', "$query", 'and','privilege', 'user')
            ->all();
        }
      	$giangvien = giangvien::all();
		$nguoidungsearch = nguoidung::where('privilege', 'user')->get();
		return view('admin.nguoidung_user', compact('nguoidung', 'giangvien','nguoidungsearch'));
    }
	
}
