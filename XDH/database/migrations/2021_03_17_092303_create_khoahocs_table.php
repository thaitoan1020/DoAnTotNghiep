<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKhoahocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoahoc', function (Blueprint $table) {
            $table->id();
            $table->string('makhoahoc', 6)->unique(); 
            $table->string('tenkhoahoc', 100)->unique(); 
            $table->string('thoigianbatdau', 50); 
            $table->string('thoigianketthuc', 50); 
            $table->text('ghichu')->nullable();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB'; 
        });
        
        DB::table('khoahoc')->insert([
            'makhoahoc' => 'DH18',
            'tenkhoahoc' => 'Đại học khóa 18',
            'thoigianbatdau' => '08-08-2017',
            'thoigianketthuc' => '30-06-2021',
        ]);
        DB::table('khoahoc')->insert([
            'makhoahoc' => 'DH19',
            'tenkhoahoc' => 'Đại học khóa 19',
            'thoigianbatdau' => '08-08-2017',
            'thoigianketthuc' => '30-06-2021',
        ]);
        DB::table('khoahoc')->insert([
            'makhoahoc' => 'DH20',
            'tenkhoahoc' => 'Đại học khóa 20',
            'thoigianbatdau' => '08-08-2017',
            'thoigianketthuc' => '30-06-2021',
        ]);
        DB::table('khoahoc')->insert([
            'makhoahoc' => 'DH21',
            'tenkhoahoc' => 'Đại học khóa 21',
            'thoigianbatdau' => '08-08-2017',
            'thoigianketthuc' => '30-06-2021',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khoahoc');
    }
}
