<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lophoc extends Model
{
    use HasFactory;
    protected $table = 'lophoc';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'khoahoc_id', 'nganhhoc_id', 'malophoc', 'tenlophoc', 'covanhoctap', 'ghichu',
	];
	
	public function khoahoc()
	{
		return $this->belongsTo('App\Models\khoahoc', 'khoahoc_id', 'id');
	}
	
	public function nganhhoc()
	{
		return $this->belongsTo('App\Models\nganhhoc', 'nganhhoc_id', 'id');
	}
	public function giangvien()
	{
		return $this->belongsTo('App\Models\giangvien', 'giangvien_id', 'id');
	}
}
