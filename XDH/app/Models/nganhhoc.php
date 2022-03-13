<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nganhhoc extends Model
{
    use HasFactory;
    protected $table = 'nganhhoc';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'manganhhoc', 'tennganhhoc', 'ghichu',
	];
	
	public function lophoc()
	{
		return $this->hasMany('App\Models\lophoc', 'id', 'nganhoc_id');
	}
	public function khoa_nganh_ctdt()
	{
		return $this->hasMany('App\Models\khoa_nganh_ctdt', 'nganhoc_id', 'id');
	}
	public function ctdt()
	{
		return $this->hasMany('App\Models\ctdt', 'nganhoc_id', 'id');
	}
}
