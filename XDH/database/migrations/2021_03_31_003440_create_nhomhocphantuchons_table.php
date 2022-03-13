<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNhomhocphantuchonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomhocphantuchon', function (Blueprint $table) {
            $table->id();
            $table->string('manhomhocphantuchon', 10)->unique();
            $table->string('tennhomhocphantuchon', 100)->unique();
            $table->string('tongsotinchi');
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });

        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC001',
            'tennhomhocphantuchon' => 'TA1-TP1-TC1',
            'tongsotinchi' => 3,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC002',
            'tennhomhocphantuchon' => 'TA2-TP2-TC3',
            'tongsotinchi' => 4,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC003',
            'tennhomhocphantuchon' => 'PPT-QHTT_LTTT',
            'tongsotinchi' => 2,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC004',
            'tennhomhocphantuchon' => 'KTSTVB TH-KNGTNN-TCSDLDB2',
            'tongsotinchi' => 2,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC005',
            'tennhomhocphantuchon' => 'CDJAVA-KKDL-DHMT',
            'tongsotinchi' => 3,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC006',
            'tennhomhocphantuchon' => 'CNW PHP-CNW ASP.NET',
            'tongsotinchi' => 3,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC007',
            'tennhomhocphantuchon' => 'XLNNTT-DTDM-GDNM',
            'tongsotinchi' => 3,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC008',
            'tennhomhocphantuchon' => 'XLA-LTCCTBDD-TKDH',
            'tongsotinchi' => 3,
        ]);
        DB::table('nhomhocphantuchon')->insert([
            'manhomhocphantuchon' => 'NTC009',
            'tennhomhocphantuchon' => 'HLTN-HPTT',
            'tongsotinchi' => 10,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhomhocphantuchon');
    }
}
