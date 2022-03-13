<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLoaihocphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaihocphan', function (Blueprint $table) {
            $table->id();
            $table->string('maloaihocphan', 100)->unique();;
            $table->string('tenloaihocphan', 255)->unique();
            $table->text('ghichu')->nullable();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });

        DB::table('loaihocphan')->insert([
            'maloaihocphan' => 'LHP001',
            'tenloaihocphan' => 'Bắt buộc',
        ]);
        DB::table('loaihocphan')->insert([
            'maloaihocphan' => 'LHP002',
            'tenloaihocphan' => 'Tự chọn',
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaihocphan');
    }
}
