<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKhoikienthucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoikienthuc', function (Blueprint $table) {
            $table->id();
            $table->string('makhoikienthuc', 10)->unique();;
            $table->string('tenkhoikienthuc', 100)->unique(); // Tên đăng nhập
            $table->text('ghichu')->nullable();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        
        DB::table('khoikienthuc')->insert([
            'makhoikienthuc' => 'KCT001',
            'tenkhoikienthuc' => 'Kiến thức đại cương',
        ]);
        DB::table('khoikienthuc')->insert([
            'makhoikienthuc' => 'KCT002',
            'tenkhoikienthuc' => 'Kiến thức cơ sở ngành',
        ]);
        DB::table('khoikienthuc')->insert([
            'makhoikienthuc' => 'KCT003',
            'tenkhoikienthuc' => 'Kiến thức chuyên ngành',
        ]);
        DB::table('khoikienthuc')->insert([
            'makhoikienthuc' => 'KCT004',
            'tenkhoikienthuc' => 'Kiến thức thực tập nghề nghiệp, khóa luận tốt nghiệp/các học phần thay thế	',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khoikienthuc');
    }
}
