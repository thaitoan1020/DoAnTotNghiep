<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocphan extends Model
{
    use HasFactory;
    protected $table = 'hocphan';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'loaihocphan_id', 
		'nhomhocphan_id', 
		'khoikienthuc_id', 
		'nhomgiangvien_id', 
		'mahocphan', 
		'tenhocphantiengviet', 
		'tenhocphantienganh', 
		'dkhocphantienquyet', 
		'dkhocphansonghanh', 
		'dkhocphanhoctruoc', 
		'sotinchi', 
		'sotietlythuyet', 
		'sotietthuchanh', 
		'nhomhocphantuchon_id', 
		'hocky', 
		'filedinhkem', 
		'mota', 
		'ghichu',
	];

	public function loaihocphan()
	{
		return $this->belongsTo('App\Models\loaihocphan', 'loaihocphan_id', 'id');
	}
	
	public function nhomhocphan()
	{
		return $this->belongsTo('App\Models\nhomhocphan', 'nhomhocphan_id', 'id');
	}
	public function nhomhocphantuchon()
	{
		return $this->belongsTo('App\Models\nhomhocphantuchon', 'nhomhocphantuchon_id', 'id');
	}
	public function khoikienthuc()
	{
		return $this->belongsTo('App\Models\khoikienthuc', 'khoikienthuc_id', 'id');
	}
	public function ctdt_hocphan()
	{
		return $this->hasMany('App\Models\ctdt_hocphan', 'hocphan_id', 'id');
	}
	public function nhomgiangvien()
	{
		return $this->belongsTo('App\Models\nhomgiangvien', 'nhomgiangvien_id', 'id');
	}
}

