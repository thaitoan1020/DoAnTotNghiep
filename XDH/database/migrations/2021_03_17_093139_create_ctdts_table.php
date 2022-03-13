<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCtdtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctdt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nganhhoc_id')->constrained('nganhhoc');
            $table->foreignId('bomon_id')->constrained('bomon');
            $table->foreignId('khoa_id')->constrained('khoa');
            $table->string('mactdt', 10)->unique();
            $table->string('tenctdt', 100)->unique();
            $table->Integer('tongsotinchi');
            $table->tinyInteger('trangthai')->default('0');
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });

        DB::table('ctdt')->insert([
            'nganhhoc_id' => '1',
            'bomon_id' => '1',
            'khoa_id' => '1',
            'mactdt' => '7480201',
            'tenctdt' => 'Công nghệ thông tin',
            'tongsotinchi' => '133',
        ]);
        DB::table('ctdt')->insert([
            'nganhhoc_id' => '1',
            'bomon_id' => '2',
            'khoa_id' => '1',
            'mactdt' => '7480103',
            'tenctdt' => 'Kỹ thuật phần mềm',
            'tongsotinchi' => '132',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctdt');
    }
}
