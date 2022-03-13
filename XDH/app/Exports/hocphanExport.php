<?php

namespace App\Exports;

use App\Models\hocphan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class hocphanExport implements FromCollection,
							   WithHeadings,
							   WithCustomStartCell,
							   WithMapping
{
	public function headings(): array
	{
		return [
			'Mã học phàn',
			'Tên tên học phần tiếng việt',
			'Tên tên học phần tiếng anh',
			'Tên loại học phàn',
			'Tên nhóm loại học phần',
			'Tên khối kiến thức',
			'Điều kiện học phần tiên quyết',
			'Điều kiện học phần học trước',
			'Điều kiện học phần song hàng',
			'số tín chỉ',
			'Số tiết lý thuyết',
			'Số tiết thực hành',
			'Nhóm học phần tự chọn',
			'Người phụ trách',
			'Học kỳ',
			'Mo tả',
			'Ghi chú',
			'File đính kềm',

		];
	}
	
	public function map($row): array
	{
		return [
			$row->mahocphan,
			$row->tenhocphantiengviet,
			$row->tenhocphantienganh,
			$row->loaihocphan_id,
			$row->nhomhocphan_id,
			$row->khoikienthuc_id,
			$row->dkhocphantienquyet,
			$row->dkhocphanhoctruoc,
			$row->dkhocphansonghanh,
			$row->sotinchi,
			$row->sotietlythuyet,
			$row->sotietthuchanh,
			$row->nhomhocphantuchon_id,
			$row->giangvien_id,
			$row->hocky,
			$row->mota,
			$row->ghichu,
			$row->filedinhkem,
		];
	}
	
	public function startCell(): string
	{
		return 'A1';
	} 
    public function collection()
    {
        return hocphan::all();
    }
}
