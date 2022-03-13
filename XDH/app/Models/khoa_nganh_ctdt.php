<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoa_nganh_ctdt extends Model
{
    use HasFactory;
    protected $table = 'khoa_nganh_ctdt';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'khoahoc_id', 'nganhhoc_id', 'ctdt_id', 'ghichu', 
	];
	
	public function ctdt()
	{
		return $this->belongsTo('App\Models\ctdt', 'ctdt_id', 'id');
	}
	public function khoahoc()
	{
		return $this->hasMany('App\Models\khoahoc', 'khoahoc_id', 'id');
	}
	public function nganhhoc()
	{
		return $this->hasMany('App\Models\nganhhoc', 'nganhhoc_id', 'id');
	}
}
