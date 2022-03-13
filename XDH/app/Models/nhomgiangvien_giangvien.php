<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomgiangvien_giangvien extends Model
{
    use HasFactory;
    protected $table = 'nhomgiangvien_giangvien';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'nhomgiangvien_id', 'giangvien_id',
	];
	
	public function giangvien()
	{
		return $this->belongsTo('App\Models\giangvien', 'giangvien_id', 'id');
	}
	public function nhomgiangvien()
	{
		return $this->belongsTo('App\Models\nhomgiangvien', 'nhomgiangvien_id', 'id');
	}
}
