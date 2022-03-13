<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoahoc extends Model
{
    use HasFactory;
    protected $table = 'khoahoc';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'makhoahoc', 'tenkhoahoc', 'thoigianbatdau', 'thoigianketthuc', 'ghichu',
	];
	
	public function lophoc()
	{
		return $this->belongsTo('App\Models\lophoc', 'khoahoc_id', 'id');
	}
	public function khoa_nganh_ctdt()
	{
		return $this->hasMany('App\Models\khoa_nganh_ctdt', 'khoahoc_id', 'id');
	}
}
