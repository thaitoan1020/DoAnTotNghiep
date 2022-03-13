<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    use HasFactory;
    protected $table = 'khoa';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'makhoa', 'tenkhoa', 'ghichu',
	];
	
	public function hocphan()
	{
		return $this->hasMany('App\Models\hocphan', 'khoa_id', 'id');
	}
	public function giangien()
	{
		return $this->hasMany('App\Models\giangien', 'khoa_id', 'id');
	}
	public function nguoidung()
	{
		return $this->belongsTo('App\Models\nguoidung', 'khoa_id', 'id');
	}
}
