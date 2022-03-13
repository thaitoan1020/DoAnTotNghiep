<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoikienthuc extends Model
{
    use HasFactory;
    protected $table = 'khoikienthuc';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'makhoikienthuc', 'tenkhoikienthuc', 'ghichu',
	];
	
	public function hocphan()
	{
		return $this->hasMany('App\Models\hocphan', 'khoikienthuc_id', 'id');
	}
}
