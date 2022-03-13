<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHocphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocphan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaihocphan_id')->constrained('loaihocphan');
            $table->uuid('nhomhocphan_id')->nullable();
            $table->foreignId('khoikienthuc_id')->constrained('khoikienthuc');
            $table->foreignId('nhomgiangvien_id')->constrained('nhomgiangvien');
            $table->string('mahocphan', 6)->unique();
            $table->string('tenhocphantiengviet', 100)->unique();
            $table->string('tenhocphantienganh', 100)->unique();
            $table->string('dkhocphantienquyet')->nullable();
            $table->string('dkhocphansonghanh')->nullable();
            $table->string('dkhocphanhoctruoc')->nullable();
            $table->string('sotinchi');
            $table->Integer('sotietlythuyet')->nullable();
            $table->Integer('sotietthuchanh')->nullable();
            $table->uuid('nhomhocphantuchon_id')->nullable();
            $table->Integer('hocky');
            $table->string('filedinhkem')->nullable();
            $table->text('mota')->nullable();;
            $table->text('ghichu')->nullable();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hocphan');
    }
}
