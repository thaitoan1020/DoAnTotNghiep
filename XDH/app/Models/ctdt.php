<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctdt extends Model
{
    use HasFactory;
    protected $table = 'ctdt';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'nganhhoc_id', 'bomon_id', 'khoa_id', 'mactdt', 'tenctdt', 'tongsotinchi', 'trangthai', 'ghichu',
	];
	
	public function khoa_nganh_ctdt()
	{
		return $this->hasMany('App\Models\khoa_nganh_ctdt', 'ctdt_id', 'id');
	}
	public function ctdt_hocphan()
	{
		return $this->hasMany('App\Models\ctdt_hocphan', 'ctdt_id', 'id');
	}
	public function nganhhoc()
	{
		return $this->belongsTo('App\Models\nganhhoc', 'nganhhoc_id', 'id');
	}

	public function khoa()
	{
		return $this->belongsTo('App\Models\khoa', 'khoa_id', 'id');
	}

	public function bomon()
	{
		return $this->belongsTo('App\Models\bomon', 'bomon_id', 'id');
	}
}
