<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKhoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoa', function (Blueprint $table) {
            $table->id();
            $table->string('makhoa', 10)->unique();
            $table->string('tenkhoa', 100)->unique(); // Tên đăng nhập
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });


        DB::table('khoa')->insert([
            'makhoa' => 'CNTT',
            'tenkhoa' => 'Công nghệ thông tin',
        ]);
        DB::table('khoa')->insert([
            'makhoa' => 'SP',
            'tenkhoa' => 'Sư phạm',
        ]);
        DB::table('khoa')->insert([
            'makhoa' => 'NN',
            'tenkhoa' => 'Nông nghiệp - Tài nguyên thiên nhiên',
        ]);
        DB::table('khoa')->insert([
            'makhoa' => 'KT',
            'tenkhoa' => 'Kính tế - Quản trị kinh doanh',
        ]);
        DB::table('khoa')->insert([
            'makhoa' => 'KTH',
            'tenkhoa' => 'Kỹ thuật - Công nghệ - Môi trường',
        ]);
        DB::table('khoa')->insert([
            'makhoa' => 'NNG',
            'tenkhoa' => 'Ngoại ngữ',
        ]);
        DB::table('khoa')->insert([
            'makhoa' => 'LUAT',
            'tenkhoa' => 'Luật và khoa học chính trị',
        ]);
        DB::table('khoa')->insert([
            'makhoa' => 'DLVVHNT',
            'tenkhoa' => 'Du lịch và văn hóa nghệ thuật',
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khoa');
    }
}
