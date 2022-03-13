<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomhocphantuchon extends Model
{
    use HasFactory;
    protected $table = 'nhomhocphantuchon';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'manhomhocphantuchon', 'tennhomhocphantuchon', 'ghichu',
	];
	
	public function hocphan()
	{
		return $this->hasMany('App\Models\hocphan', 'nhomhocphantuchon_id', 'id');
	}

}
