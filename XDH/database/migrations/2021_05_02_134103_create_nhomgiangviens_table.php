<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNhomgiangviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomgiangvien', function (Blueprint $table) {
            $table->id();
            $table->string('manhomgiangvien', 10)->unique();
            $table->string('tennhomgiangvien', 100)->unique();
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        DB::table('nhomgiangvien')->insert([
            'manhomgiangvien' => 'NGV001',
            'tennhomgiangvien' => 'Nhóm A1',
        ]);
        DB::table('nhomgiangvien')->insert([
            'manhomgiangvien' => 'NGV002',
            'tennhomgiangvien' => 'Nhóm A2',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhomgiangvien');
    }
}
