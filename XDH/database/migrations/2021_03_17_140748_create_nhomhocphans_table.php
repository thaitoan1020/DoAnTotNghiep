<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNhomhocphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomhocphan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaihocphan_id')->constrained('loaihocphan');
            $table->string('manhomhocphan', 10)->unique();
            $table->string('tennhomhocphan', 100)->unique();
            $table->string('tongsotinchi')->unique();
            $table->string('sotietlythuyet')->unique();
            $table->string('sotietthuchanh')->unique();
            $table->string('dkhocphantienquyet')->nullable();
            $table->string('dkhocphansonghanh')->nullable();
            $table->string('dkhocphanhoctruoc')->nullable();
            $table->string('hocky');
            $table->text('ghichu')->nullable();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        DB::table('nhomhocphan')->insert([
            'loaihocphan_id' => '1',
            'manhomhocphan' => 'PHT101',
            'tennhomhocphan' => 'Giáo duc Thể chất',
            'tongsotinchi' => 3,
            'sotietlythuyet'=>'8',
            'sotietthuchanh'=>'82',
            'hocky'=>'1,2',
        ]);
        DB::table('nhomhocphan')->insert([
            'loaihocphan_id' => '1',
            'manhomhocphan' => 'MIS102',
            'tennhomhocphan' => 'Giáo dục quốc phòng - an ninh 1,2,3',
            'tongsotinchi' => 8,
            'sotietlythuyet'=>'91',
            'sotietthuchanh'=>'69',
            'hocky'=>'3,4,5',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhomhocphan');
    }
}
