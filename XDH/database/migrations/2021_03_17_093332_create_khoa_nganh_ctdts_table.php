<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKhoaNganhCtdtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoa_nganh_ctdt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khoahoc_id')->constrained('khoahoc');
            $table->foreignId('nganhhoc_id')->constrained('nganhhoc');
            $table->foreignId('ctdt_id')->constrained('ctdt');
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
        Schema::dropIfExists('khoa_nganh_ctdt');
    }
}
