<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGiangviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('giangvien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bomon_id')->constrained('bomon');
            $table->foreignId('khoa_id')->constrained('khoa');
            $table->string('magiangvien', 6)->unique();
            $table->string('tengiangvien', 100);
            $table->string('email', 100); 
            $table->string('dienthoai', 10)->nullable(); 
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });

        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV001',
            'tengiangvien' => 'Lê Hoàng Anh',
            'email' => 'lhanh@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV002',
            'tengiangvien' => 'Nguyễn Văn Hòa',
            'email' => 'nvhoa@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV003',
            'tengiangvien' => 'Trương Thị Diễm',
            'email' => 'ttdiem@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV004',
            'tengiangvien' => 'Nguyễn Quang Huy',
            'email' => 'nqhuy@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV005',
            'tengiangvien' => 'Lê Thị Minh Nguyệt',
            'email' => 'ltmnguyet@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV006',
            'tengiangvien' => 'Nguyễn Thị Lan Quyên',
            'email' => 'ntlquyen@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV007',
            'tengiangvien' => 'Nguyễn Văn Đông',
            'email' => 'nvdong@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV008',
            'tengiangvien' => 'Lê Công Đoàn',
            'email' => 'lcdoan@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV009',
            'tengiangvien' => 'Huỳnh Cao Thế Cường',
            'email' => 'hctcuong@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV010',
            'tengiangvien' => 'Phan Thanh Bình',
            'email' => 'ptbinh@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV011',
            'tengiangvien' => 'Nguyễn Thái Dư',
            'email' => 'ntdu@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 1,
            'khoa_id' => 1,
            'magiangvien' => 'GV012',
            'tengiangvien' => 'Châu Ngân Khánh',
            'email' => 'cnkhanh@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV013',
            'tengiangvien' => 'Đoàn Thanh Nghị',
            'email' => 'pdtnghi@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV014',
            'tengiangvien' => 'Phạm Hữu Dũng',
            'email' => 'phdung@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV015',
            'tengiangvien' => 'Nguyễn Thị Mỹ Truyền',
            'email' => 'ntmtruyen@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV016',
            'tengiangvien' => 'Lê Trung Thư',
            'email' => 'ltthu@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV017',
            'tengiangvien' => 'Lê Văn Toán',
            'email' => 'lvtoan@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV018',
            'tengiangvien' => 'Nguyễn Minh Vi',
            'email' => 'nmvi@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV019',
            'tengiangvien' => 'Huỳnh Phước Hải',
            'email' => 'hphai@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV020',
            'tengiangvien' => 'Trần Thị Tuyết Vân',
            'email' => 'tttvan@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV021',
            'tengiangvien' => 'Thiều Thanh Quang Phú',
            'email' => 'ttqphu@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV022',
            'tengiangvien' => 'Huỳnh Lý Thanh Nhàn',
            'email' => 'hltnhan@agu.edu.vn',
            'dienthoai' => '',
        ]);
        DB::table('giangvien')->insert([
            'bomon_id' => 2,
            'khoa_id' => 1,
            'magiangvien' => 'GV023',
            'tengiangvien' => 'Nguyễn Hoàng Tùng',
            'email' => 'nhoangtung@agu.edu.vn',
            'dienthoai' => '',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giangvien');
    }
}
