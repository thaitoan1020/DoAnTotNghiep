<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomhocphan extends Model
{
    use HasFactory;
    protected $table = 'nhomhocphan';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'manhomhocphan', 'tennhomhocphan', 'ghichu',
	];
	
	public function hocphan()
	{
		return $this->hasMany('App\Models\hocphan', 'nhomhocphan_id', 'id');
	}
	public function loaihocphan()
	{
		return $this->belongsTo('App\Models\loaihocphan', 'loaihocphan_id', 'id');
	}
}
