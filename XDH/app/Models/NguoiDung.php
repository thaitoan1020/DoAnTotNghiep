<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class NguoiDung extends Authenticatable
{
	use HasFactory, Notifiable;
	
	protected $table = 'nguoidung';
	
	protected $fillable = [
		'name', 'username', 'email', 'password', 'privilege',
	];
	
	protected $hidden = [
		'password', 'remember_token',
	];
	
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function giangvien()
	{
		return $this->belongsTo('App\Models\giangvien', 'giangvien_id', 'id');
	}
	public function khoa()
	{
		return $this->belongsTo('App\Models\khoa', 'khoa_id', 'id');
	}
}