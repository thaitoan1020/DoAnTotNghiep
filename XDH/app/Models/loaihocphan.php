<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaihocphan extends Model
{
    use HasFactory;
    protected $table = 'loaihocphan';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'maloaihocphan', 'tenloaihocphan', 'ghichu',
	];
	
	public function hocphan()
	{
		return $this->hasMany('App\Models\hocphan', 'loaihocphan_id', 'id');
	}
	public function nhomhocphan()
	{
		return $this->hasMany('App\Models\nhomhocphan', 'loaihocphan_id', 'id');
	}
}
