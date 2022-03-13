<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBomonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bomon', function (Blueprint $table) {
            $table->id();
            $table->string('mabomon', 10)->unique();;
            $table->string('tenbomon', 100)->unique(); // Tên đăng nhập
            $table->text('ghichu')->nullable();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });


        DB::table('bomon')->insert([
            'mabomon' => 'CNTT',
            'tenbomon' => 'Công nghệ thông tin',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'KTPM',
            'tenbomon' => 'Kỹ thuật phần mềm',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'TOAN',
            'tenbomon' => 'Toán',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'VL',
            'tenbomon' => 'Vật lý',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'HH',
            'tenbomon' => 'Hóa học',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'SH',
            'tenbomon' => 'Sinh học',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'NV',
            'tenbomon' => 'Ngữ văn',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'LS',
            'tenbomon' => 'Lịch sử',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'DL',
            'tenbomon' => 'Địa lý',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'TLGD',
            'tenbomon' => 'Tâm lý Giáo dục',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'GDTH',
            'tenbomon' => 'Giáo dục tiểu học',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'GDMN',
            'tenbomon' => 'Giáo dục mầm non',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'NTTS',
            'tenbomon' => 'Nuôi trồng thủy sản',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'CNSH',
            'tenbomon' => 'Công nghệ Sinh học',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'KHCT',
            'tenbomon' => 'Khoa học Cây trồng',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'CNTP',
            'tenbomon' => 'Công nghệ Thực phẩm',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'CNTY',
            'tenbomon' => 'Chăn nuôi Thú y',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'PTNT',
            'tenbomon' => 'Phát triển Nông thôn',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'KTTH',
            'tenbomon' => 'Kinh tế tổng hợp',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'QTKD',
            'tenbomon' => 'Quản trị Kinh doanh',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'TCKT',
            'tenbomon' => 'Tài chính Kế toán',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'PPGDTA',
            'tenbomon' => 'Phương pháp giảng dạy Tiểng Anh',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'NNHVDTTA',
            'tenbomon' => 'Ngôn ngữ học và dịch thuật tiếng anh',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'NNP-T-N',
            'tenbomon' => 'Ngôn ngữ Pháp-Trung-Nhật',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'MAC',
            'tenbomon' => 'Những nguyên lý cơ bản của chủ nghĩa MAC-LÊNIN',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'HCM',
            'tenbomon' => 'Tư tưởng Hồ Chí MInh',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'DLCMVN',
            'tenbomon' => 'Đường lối cách mạng của Đảng cộng sản Việt Nam',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'LUAT',
            'tenbomon' => 'Luật',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'DULI',
            'tenbomon' => 'Du Lịch',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'AMNH',
            'tenbomon' => 'Âm Nhạc',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'MYTH',
            'tenbomon' => 'Mỹ Thuật',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'GDTC',
            'tenbomon' => 'Giáo dục thể chất',
        ]);
        DB::table('bomon')->insert([
            'mabomon' => 'GDQP',
            'tenbomon' => 'Giáo dục quốc phòng',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bomon');
    }
}
