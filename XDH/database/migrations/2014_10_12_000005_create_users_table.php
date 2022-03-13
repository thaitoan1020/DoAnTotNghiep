<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->id();
            $table->uuid('khoa_id')->nullable();
            $table->uuid('giangvien_id')->nullable();
            $table->string('name');
            $table->string('username', 100)->unique(); // Tên đăng nhập
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('privilege', 20)->default('user'); // Quyền hạn: admin, bgh, tdv, tlk, pdt, pctsv, cvht, bm, sv 
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });

        DB::table('nguoidung')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@agu.edu.vn',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'privilege' => 'admin',
        ]);

        DB::table('nguoidung')->insert([
            'name' => 'TN. Biên Soạn',
            'username' => 'supmanager',
            'email' => 'supmanager@agu.edu.vn',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'privilege' => 'supmanager',
        ]);

        DB::table('nguoidung')->insert([
            'khoa_id' => '1',
            'name' => 'BCN. Khoa',
            'username' => 'manager',
            'email' => 'manager@agu.edu.vn',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'privilege' => 'manager',
        ]);

        DB::table('nguoidung')->insert([
            'giangvien_id' => '1',
            'name' => 'Giảng vien',
            'username' => 'user',
            'email' => 'user@agu.edu.vn',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'privilege' => 'user',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}

