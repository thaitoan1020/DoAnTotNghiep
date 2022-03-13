<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giangvien extends Model
{
    use HasFactory;
    protected $table = 'giangvien';
	
	protected $fillable = [
		'magiangvien', 'tengiangvien', 'ghichu',
	];
	
	public function nguoidung()
	{
		return $this->belongsTo('App\Models\nguoidung', 'giangvien_id', 'id');
	}
	public function bomon()
	{
		return $this->belongsTo('App\Models\bomon', 'bomon_id', 'id');
	}
	public function khoa()
	{
		return $this->belongsTo('App\Models\khoa', 'khoa_id', 'id');
	}
	public function nhomgiangvien_giangvien()
	{
		return $this->hasMany('App\Models\nhomgiangvien_giangvien', 'giangvien_id', 'id');
	}
	public function lophoc()
	{
		return $this->belongsTo('App\Models\lophoc', 'giangvien_id', 'id');
	}
}
