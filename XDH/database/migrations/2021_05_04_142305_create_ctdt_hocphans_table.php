<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCtdtHocphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctdt_hocphan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hocphan_id')->constrained('hocphan');
            $table->foreignId('ctdt_id')->constrained('ctdt');
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('ctdt_hocphan');
    }
}
