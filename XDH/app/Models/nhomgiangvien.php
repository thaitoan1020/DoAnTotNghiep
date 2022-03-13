<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomgiangvien extends Model
{
    use HasFactory;
    protected $table = 'nhomgiangvien';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'manhomgiangvien', 'tennhomgiangvien', 'ghichu',
	];
	
	public function hocphan()
	{
		return $this->hasMany('App\Models\hocphan', 'nhomgiangvien_id', 'id');
	}
    public function nhomgiangvien_giangvien()
	{
		return $this->hasMany('App\Models\nhomgiangvien_giangvien', 'nhomgiangvien_id', 'id');
	}
}
