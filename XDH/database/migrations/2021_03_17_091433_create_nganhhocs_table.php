<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNganhhocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nganhhoc', function (Blueprint $table) {
            $table->id();
            $table->string('manganhhoc', 10);
            $table->string('tennganhhoc', 100)->unique(); // Tên đăng nhập
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });

        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7480201',
            'tennganhhoc' => 'Công nghệ thông tin',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7480103',
            'tennganhhoc' => 'Kỹ thuật phần mềm',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140209',
            'tennganhhoc' => 'Sư phạn Toán học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140211',
            'tennganhhoc' => 'Sư phạm Vật lý',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140212',
            'tennganhhoc' => 'Sư phạm Hóa học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140213',
            'tennganhhoc' => 'Sư phạm Sinh học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140217',
            'tennganhhoc' => 'Sư phạm Ngữ văn',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140218',
            'tennganhhoc' => 'Sư phạm Lịch sử',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140219',
            'tennganhhoc' => 'Sư phạm Địa lý',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140201',
            'tennganhhoc' => 'Giáo dục Mầm non',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140202',
            'tennganhhoc' => 'Giáo dục Tiểu học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7229030',
            'tennganhhoc' => 'Văn học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7460112',
            'tennganhhoc' => 'Toán ứng dụng',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7440112',
            'tennganhhoc' => 'Hóa học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7340201',
            'tennganhhoc' => 'Tài chính Doanh nghiệp',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7340301',
            'tennganhhoc' => 'Kế toán',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '0310106',
            'tennganhhoc' => 'Kinh tế quốc tế',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7340101',
            'tennganhhoc' => 'Quản trị kinh doanh',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7340201',
            'tennganhhoc' => 'Tài chính - Ngân hàng',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7340115',
            'tennganhhoc' => 'Marketing',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7620301',
            'tennganhhoc' => 'Nuôi trồng thủy sản',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7620105',
            'tennganhhoc' => 'Chăn nuôi',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7620110',
            'tennganhhoc' => 'Khoa học cây trồng',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7620116',
            'tennganhhoc' => 'Phát triển nông thôn',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7620112',
            'tennganhhoc' => 'Bảo vệ thực vật',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7420201',
            'tennganhhoc' => 'Công nghệ sinh học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7540101',
            'tennganhhoc' => 'Công nghệ thực phẩm',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7420203',
            'tennganhhoc' => 'Sinh học Ứng dụng',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7510406',
            'tennganhhoc' => 'Công nghệ kỹ thuật môi trường',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7850101',
            'tennganhhoc' => 'Quản lý tài nguyên và môi trường ',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7510401',
            'tennganhhoc' => 'Công nghệ Kỹ thuật Hóa học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140205',
            'tennganhhoc' => 'Giáo dục Chính trị',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7380101',
            'tennganhhoc' => 'Luật',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7220901',
            'tennganhhoc' => 'Triết học',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7310603',
            'tennganhhoc' => 'Việt Nam học (VH du lịch)',
        ]);

        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7140231',
            'tennganhhoc' => 'Sư phạm Tiếng Anh',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7220201',
            'tennganhhoc' => 'Ngôn ngữ Anh',
        ]);
        DB::table('nganhhoc')->insert([
            'manganhhoc' => '7220201',
            'tennganhhoc' => 'Ngôn ngữ Anh (chuyên ngành Tiếng Anh du lịch)',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nganhhoc');
    }
}
