<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctdt_hocphan extends Model
{
    use HasFactory;
    protected $table = 'ctdt_hocphan';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'hocphan_id', 'ctdt_id', 'ghichu',
	];
	
	public function ctdt()
	{
		return $this->belongsTo('App\Models\ctdt', 'ctdt_id', 'id');
	}
	public function hocphan()
	{
		return $this->belongsTo('App\Models\hocphan', 'hocphan_id', 'id');
	}
}
