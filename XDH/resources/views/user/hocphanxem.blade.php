@extends('layouts.user')

@section('title')
    Học phần
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a href="{{ route('user.hocphan') }}" style=" color: black;">
                        <h5>Danh sách học phần</h5>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="row mb-2 ">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-2 ">
                                <div class="col-sm-9">
                                    <a href="{{ route('user.hocphan.xuat') }}" class="float-left btn btn-light"><i
                                            class="fa fa-download" title="Xuất"></i> Xuất Excel<span
                                            class="ml-1"></span></a>
                                </div>
                                <div class="col-sm-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Danh sách học phần</h3>

                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 100%;">
                            <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">#</th>
                                        <th style="width: 5%; font-size: 10pt;">Mã học phần</th>
                                        <th style="width: 7%; font-size: 10pt;">Tên học phần tiếng việt</th>
                                        <th style="width: 6%; font-size: 10pt;">Tên học phần tiếng anh</th>
                                        <th style="width: 5%; font-size: 10pt;">Tên loại học phần</th>
                                        <th style="width: 5%; font-size: 10pt;">Tên nhóm môn hoc</th>
                                        <th style="width: 5%; font-size: 10pt;">Tên khối kiên thức</th>
                                        <th style="width: 5%; font-size: 10pt;">Học phần tiên quyết</th>
                                        <th style="width: 5%; font-size: 10pt;">Học phần học trước</th>
                                        <th style="width: 5%; font-size: 10pt;">Học phần song hành</th>
                                        <th style="width: 5%; font-size: 10pt;">Số tín chỉ</th>
                                        <th style="width: 5%; font-size: 10pt;">Số tiết lý thuyết</th>
                                        <th style="width: 5%; font-size: 10pt;">Số tiết thực hành</th>
                                        <th style="width: 5%; font-size: 10pt;">Nhóm học phần tự chọn</th>
                                        <th style="width: 5%; font-size: 10pt;">Nhóm người phụ trách</th>
                                        <th style="width: 5%; font-size: 10pt;">Học kỳ</th>
                                        <th style="width: 5%; font-size: 10pt;">File dính kèm</th>
                                        <th style="width: 5%; font-size: 10pt;">Xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hocphan as $value)
                                        @php
                                            $editLink = "getCapNhat('". $value->id ."', '" . $value->loaihocphan_id . "', '" . $value->nhomhocphan_id . "'
                                            , '" . $value->khoikienthuc_id . "', '" . $value->mahocphan . "', '" . $value->tenhocphantiengviet . "'
                                            , '" . $value->tenhocphantienganh . "', '" . $value->dkhocphantienquyet . "', '" . $value->dkhocphanhoctruoc . "'
                                            , '" . $value->dkhocphansonghanh . "', '" . $value->sotinchi . "', '" . $value->sotietlythuyet . "', '" . $value->sotietthuchanh . "'
                                            , '" . $value->nhomhocphantuchon_id . "', '" . $value->nhomgiangvien_id . "', '" . $value->hocky . "', '" . $value->filedinhkem . "'
                                            , '" . $value->ghichu . "'); return false;";
                                        @endphp
                                        <tr>
                                            <td style="width: 2%;font-size: 9pt;">{{ $loop->iteration }}</td>
                                            <td style="width: 5%;font-size: 9pt;">{{ $value->mahocphan }}</td>
                                            <td style="width: 7%;font-size: 9pt;">{{ $value->tenhocphantiengviet }}</td>
                                            <td style="width: 6%;font-size: 9pt;">{{ $value->tenhocphantienganh }}</td>
                                            <td style="width: 5%;font-size: 9pt;">
                                                {{ $value->loaihocphan->tenloaihocphan }}
                                            </td>
                                            <td style="width: 5%;font-size: 9pt;">
                                                {{ $value->nhomhocphan->tennhomhocphan ?? 'N/A' }}</td>
                                            <td style="width: 5%;font-size: 9pt;">
                                                {{ $value->khoikienthuc->tenkhoikienthuc }}</td>
                                            <td style="width: 5%;font-size: 9pt;">{{ $value->dkhocphantienquyet }}</td>
                                            <td style="width: 5%;font-size: 9pt;">{{ $value->dkhocphanhoctruoc }}</td>
                                            <td style="width: 5%;font-size: 9pt;">{{ $value->dkhocphansonghanh }}</td>
                                            <td style="width: 5%;font-size: 9pt;">{{ $value->sotinchi }}</td>
                                            <td style="width: 5%;font-size: 9pt;">{{ $value->sotietlythuyet }}</td>
                                            <td style="width: 5%;font-size: 9pt;">{{ $value->sotietthuchanh }}</td>
                                            <td style="width: 5%;font-size: 9pt;">
                                                {{ $value->nhomhocphantuchon->tennhomhocphantuchon ?? 'N/A' }}</td>
                                            <td style="width: 5%;font-size: 9pt;">
                                                {{ $value->nhomgiangvien->tennhomgiangvien }}</td>
                                            @if ($value->hocky == 1)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">I</td>
                                            @endif
                                            @if ($value->hocky == 2)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">II</td>
                                            @endif
                                            @if ($value->hocky == 3)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">III</td>
                                            @endif
                                            @if ($value->hocky == 4)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">IV</td>
                                            @endif
                                            @if ($value->hocky == 5)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">V</td>
                                            @endif
                                            @if ($value->hocky == 6)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">VI</td>
                                            @endif
                                            @if ($value->hocky == 7)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">VII</td>
                                            @endif
                                            @if ($value->hocky == 8)
                                                <td style="width: 5%;font-size: 9pt; text-align: center">VII</td>
                                            @endif
                                            <td style="width: 5%;font-size: 9pt;">
                                                @if ($value->filedinhkem)<a
                                                        href="{{ env('APP_URL') . '/storage/app/' . $value->filedinhkem }}"
                                                        target="_blank" class="btn btn-sm btn-icon btn-secondary"><i
                                                            class="fa fa-eye"></i></a>@endif
                                            </td>
                                            <td>
                                                <a href="{{ route('user.hocphan.chitiet', ['id' => $value->id]) }}"
                                                    class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-eye"></i></a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
@section('javascript')
    <script>
        function getCapNhat(id , loaihocphan_id , nhomhocphan_id , khoikienthuc_id , mahocphan , tenhocphantiengviet , tenhocphantienganh 
        , dkhocphantienquyet , dkhocphanhoctruoc , dkhocphansonghanh , sotinchi , sotietlythuyet , sotietthuchanh , nhomhocphantuchon_id 
        , nhomgiangvien_id , hocky , filedinhkem , ghichu ) {
            //hocPhan = JSON.parse(hocPhan);
            $('#id_edit').val(id);
            $('#loaihocphan_id_edit').val(loaihocphan_id);
            $('#nhomhocphan_id_edit').val(nhomhocphan_id);
            $('#khoikienthuc_id_edit').val(khoikienthuc_id);
            $('#mahocphan_edit').val(mahocphan);
            $('#tenhocphantiengviet_edit').val(tenhocphantiengviet);
            $('#tenhocphantienganh_edit').val(tenhocphantienganh);
            $('#dkhocphantienquyet_edit').val(dkhocphantienquyet);
            $('#dkhocphansonghanh_edit').val(dkhocphansonghanh);
            $('#dkhocphanhoctruoc_edit').val(dkhocphanhoctruoc);
            $('#sotinchi_edit').val(sotinchi);
            $('#sotietlythuyet_edit').val(sotietlythuyet);
            $('#sotietthuchanh_edit').val(sotietthuchanh);
            $('#nhomhocphantuchon_id_edit').val(nhomhocphantuchon_id);
            $('#nhomgiangvien_id_edit').val(nhomgiangvien_id);
            $('#hocky_edit').val(hocky);
            $('#filedinhkem_edit').val(filedinhkem);
            //$('#mota_edit').val(mota);
            //CKEDITOR.instances['mota_edit'].setData(hocPhan);
            $('#ghichu_edit').val(ghichu);
        }
        function getCapNhatmt(mota) {
            CKEDITOR.instances['mota_edit'].setData(mota);
        }
        function getXoa(id) {
            $('#id_delete').val(id);
        }

        @if ($errors->has('loaihocphan_id') || $errors->has('nhomhocphan_id') || $errors->has('khoikienthuc_id') || $errors->has('mahocphan') || $errors->has('tenhocphantiengviet') || $errors->has('tenhocphantienga') || $errors->has('dkhocphantienquyet') || $errors->has('dkhocphansonghanh') || $errors->has('dkhocphanhoctruoc') || $errors->has('sotinchi') || $errors->has('sotietlythuyet') || $errors->has('sotietthuchanh') || $errors->has('nhomhocphantuchon_id') || $errors->has('nhomgiangien_id') || $errors->has('hocky'))
            $('#addModal').modal('show');
        @endif

        @if ($errors->has('loaihocphan_id_edit') || $errors->has('nhomhocphan_id_edit') || $errors->has('khoikienthuc_id_edit') || $errors->has('mahocphan_edit') || $errors->has('tenhocphantiengviet_edit') || $errors->has('tenhocphantienganh_edit') || $errors->has('dkhocphantienquyet_edit') || $errors->has('dkhocphansonghanh_edit') || $errors->has('dkhocphanhoctruoc_edit') || $errors->has('sotinchi_edit') || $errors->has('sotietlythuyet_edit') || $errors->has('nhomhocphantuchon_id_edit') || $errors->has('nhomgiangvien_id_edit') || $errors->has('sotietthuchanh_edit') || $errors->has('hocky_edit'))
            $('#editModal').modal('show');
        @endif

    </script>

    <script>
        $(function() {
            $('.select2').select2()
        });

    </script>



@endsection
