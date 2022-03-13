<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bomon extends Model
{
    use HasFactory;
    protected $table = 'bomon';
	// protected $primaryKey = 'id';
	// protected $keyType = 'string';
	
	protected $fillable = [
		'mabomon', 'tenbomon', 'ghichu',
	];
	
	public function ctdt()
	{
		return $this->hasMany('App\Models\ctdt', 'bomon_id', 'id');
	}
	public function giangien()
	{
		return $this->hasMany('App\Models\giangien', 'bomon_id', 'id');
	}
}
