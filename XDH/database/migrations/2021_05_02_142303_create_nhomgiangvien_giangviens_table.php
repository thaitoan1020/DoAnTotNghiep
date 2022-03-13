<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNhomgiangvienGiangviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomgiangvien_giangvien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nhomgiangvien_id')->constrained('nhomgiangvien');
            $table->foreignId('giangvien_id')->constrained('giangvien');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        
        DB::table('nhomgiangvien_giangvien')->insert([
            'nhomgiangvien_id' => '1',
            'giangvien_id' => '1',
        ]);
        DB::table('nhomgiangvien_giangvien')->insert([
            'nhomgiangvien_id' => '1',
            'giangvien_id' => '2',
        ]);
        DB::table('nhomgiangvien_giangvien')->insert([
            'nhomgiangvien_id' => '1',
            'giangvien_id' => '3',
        ]);
        DB::table('nhomgiangvien_giangvien')->insert([
            'nhomgiangvien_id' => '1',
            'giangvien_id' => '4',
        ]);
        DB::table('nhomgiangvien_giangvien')->insert([
            'nhomgiangvien_id' => '2',
            'giangvien_id' => '1',
        ]);
        DB::table('nhomgiangvien_giangvien')->insert([
            'nhomgiangvien_id' => '2',
            'giangvien_id' => '3',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhomgiangvien_giangvien');
    }
}
