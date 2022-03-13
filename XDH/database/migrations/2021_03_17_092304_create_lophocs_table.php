<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLophocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lophoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khoahoc_id')->constrained('khoahoc');
            $table->foreignId('nganhhoc_id')->constrained('nganhhoc');
            $table->string('malophoc', 10)->unique();
            $table->string('tenlophoc', 100);
            $table->foreignId('giangvien_id')->constrained('giangvien');
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        DB::table('lophoc')->insert([
            'khoahoc_id' => '1',
            'nganhhoc_id' => '1',
            'malophoc' => 'DH18TH1',
            'tenlophoc' => 'Đại học Công nghệ thông tin 1',
            'giangvien_id' => '12',
        ]);
        DB::table('lophoc')->insert([
            'khoahoc_id' => '1',
            'nganhhoc_id' => '1',
            'malophoc' => 'DH18TH2',
            'tenlophoc' => 'Đại học Công nghệ thông tin 2',
            'giangvien_id' => '18',
        ]);
        DB::table('lophoc')->insert([
            'khoahoc_id' => '1',
            'nganhhoc_id' => '2',
            'malophoc' => 'DH18PM',
            'tenlophoc' => 'Đại học Kỹ thuật phần mềm',
            'giangvien_id' => '21',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lophoc');
    }
}
