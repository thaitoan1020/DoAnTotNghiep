@extends('layouts.admin')

@section('title')
    Chương trình đào tạo
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a href="{{ route('admin.ctdt_hocphan_khoikienthuc') }}" style=" color: black;">
                        <h5>CHƯƠNG TRÌNH ĐÀO TẠO</h5>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="row mb-2 ">
                        <div class="col-sm-9">
                            <div class="row mb-2 ">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <select class="form-control select2bs4" style="width: 100%;" id="khoikienthuc_SHOW"
                                            name="khoikienthuc_SHOW">
                                            <option>-- Chọn tên chương trình đào tạo --</option>
                                            @foreach ($khoikienthuc as $value)
                                                <option value="{{ $value->id }}"> {{ $value->tenkhoikienthuc }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <a href="{{ route('admin.ctdt_hocphan.xuat_ctdt_khoikienthuc') }}"
                                        class="float-left btn btn-light"><i class="fa fa-download" title="Xuất"></i> Xuất
                                        Excel<span class="ml-1"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">

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
                        <div class="card-header pb-0">
                            <div class="row mb-2 ">
                                <div class="col-sm-9">
                                    <h3 class="card-title">Danh sách chương trình đào tạo
                                    </h3>
                                </div>

                                <div class="col-sm-3">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 100%;">
                            <table id="TableTimKiem1" class="table table-bordered text-nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="font-size: 10pt; vertical-align: middle;">Mã HP</th>
                                        <th style="font-size: 10pt;vertical-align: middle; ">Tên học phần</th>
                                        <th style="font-size: 10pt;vertical-align: middle;;">Số tín chỉ</th>
                                        <th style="font-size: 10pt;">HP Bắt buộc</th>
                                        <th style="font-size: 10pt;">HP Tự chọn</th>
                                        <th style="font-size: 10pt;">ST Lý thuyết</th>
                                        <th style="font-size: 10pt;">ST Thực hành</th>
                                        <th style="font-size: 10pt;">DK Tiên quyết</th>
                                        <th style="font-size: 10pt;">DK Học trước</th>
                                        <th style="font-size: 10pt;">DK Song Hành</th>
                                        <th style=" font-size: 10pt;vertical-align: middle;">Học kỳ (Đự kiến)
                                        </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($ctdt_hocphan as $value)
                                        @php
                                            $stt = 0;
                                            $sttbc = 0;
                                            $stttt = 0;
                                            $row = 0;
                                            $nhomhocphan = '';
                                            $nhomhocphantuchonid = 0;
                                        @endphp
                                        @foreach ($ctdt_hocphan as $value)
                                            @if ($value->khoikienthuc_id == 1)
                                                @if ($value->nhomhocphan_id == '')
                                                    <tr>
                                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                                        <td>{{ $value->mahocphan }}</td>
                                                        <td>{{ $value->tenhocphantiengviet }}</td>
                                                        <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                                            <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                            @php
                                                                $sttbc += $value->sotinchi;
                                                            @endphp
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                                                            @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                                                @php
                                                                    $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                                @endphp
                                                                @foreach ($ctdt_hocphan as $value1)
                                                                    @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                                                        @php
                                                                            $row = $row + 1;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                <td style="text-align: center"
                                                                    rowspan="{{ $row }}">
                                                                    {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                                                {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                                                @php
                                                                    $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                                                    // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                                    $row = 0;
                                                                @endphp

                                                                {{-- @endif --}}
                                                            @endif
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        <td style="text-align: center">{{ $value->sotietlythuyet }}</td>
                                                        <td style="text-align: center">{{ $value->sotietthuchanh }}</td>
                                                        <td style="text-align: center">{{ $value->dkhocphantienquyet }}
                                                        </td>
                                                        <td style="text-align: center">{{ $value->dkhocphanhoctruoc }}
                                                        </td>
                                                        <td style="text-align: center">{{ $value->dkhocphansonghanh }}
                                                        </td>
                                                        @if ($value->hocky == 1)
                                                            <td style="text-align: center">I</td>
                                                        @endif
                                                        @if ($value->hocky == 2)
                                                            <td style="text-align: center">II</td>
                                                        @endif
                                                        @if ($value->hocky == 3)
                                                            <td style="text-align: center">III</td>
                                                        @endif
                                                        @if ($value->hocky == 4)
                                                            <td style="text-align: center">IV</td>
                                                        @endif
                                                        @if ($value->hocky == 5)
                                                            <td style="text-align: center">V</td>
                                                        @endif
                                                        @if ($value->hocky == 6)
                                                            <td style="text-align: center">VI</td>
                                                        @endif
                                                        @if ($value->hocky == 7)
                                                            <td style="text-align: center">VII</td>
                                                        @endif
                                                        @if ($value->hocky == 8)
                                                            <td style="text-align: center">VIII</td>
                                                        @endif

                                                    </tr>
                                                @endif
                                                @if ($value->nhomhocphan_id != $nhomhocphan && $value->nhomhocphan_id != null)
                                                    <tr>
                                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                                        <td>{{ $value->nhomhocphan->manhomhocphan }}</td>
                                                        <td>{{ $value->nhomhocphan->tennhomhocphan }}</td>
                                                        <td style="text-align: center">
                                                            {{ $value->nhomhocphan->tongsotinchi }}</td>
                                                        @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                                            <td style="text-align: center">
                                                                {{ $value->nhomhocphan->tongsotinchi }}</td>
                                                            @php
                                                                $sttbc += $value->nhomhocphan->tongsotinchi;
                                                            @endphp
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        <td></td>

                                                        <td style="text-align: center">
                                                            {{ $value->nhomhocphan->sotietlythuyet }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $value->nhomhocphan->sotietthuchanh }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $value->nhomhocphan->dkhocphantienquyet }}</td>
                                                        <td style="text-align: center">
                                                            {{ $value->nhomhocphan->dkhocphanhoctruoc }}</td>
                                                        <td style="text-align: center">
                                                            {{ $value->nhomhocphan->dkhocphansonghanh }}</td>
                                                        @if ($value->nhomhocphan->hocky == '1,2')
                                                            <td style="text-align: center">I,II</td>
                                                        @endif
                                                        @if ($value->nhomhocphan->hocky == '3,4,5')
                                                            <td style="text-align: center">III,IV.V</td>
                                                        @endif
                                                        @php
                                                            $nhomhocphan = $value->nhomhocphan_id;
                                                        @endphp
                                                    </tr>
                                                @endif


                                                @php
                                                    $stt = $stttt + $sttbc;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="12"><b>Khối kiến thức đại cương: {{ $stt }} TC (Bắt buộc:
                                                    {{ $sttbc }}
                                                    TC; Tự chọn: {{ $stttt }})</b></td>
                                        </tr>
                                        @php
                                            $stt = 0;
                                            $sttbc = 0;
                                            $stttt = 0;
                                            $nhomhocphantuchonid = 0;
                                        @endphp
                                        @foreach ($ctdt_hocphan as $value)
                                            @if ($value->khoikienthuc_id == 2)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td>{{ $value->mahocphan }}</td>
                                                    <td>{{ $value->tenhocphantiengviet }}</td>
                                                    <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                    @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                                        <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                        @php
                                                            $sttbc += $value->sotinchi;
                                                        @endphp
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                                                        @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                                            @php
                                                                $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                            @endphp
                                                            @foreach ($ctdt_hocphan as $value1)
                                                                @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                                                    @php
                                                                        $row = $row + 1;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            <td style="text-align: center" rowspan="{{ $row }}">
                                                                {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                                            {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                                            @php
                                                                $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                                                // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                                $row = 0;
                                                            @endphp

                                                            {{-- @endif --}}
                                                        @endif
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td style="text-align: center">{{ $value->sotietlythuyet }}</td>
                                                    <td style="text-align: center">{{ $value->sotietthuchanh }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphantienquyet }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphanhoctruoc }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphansonghanh }}</td>
                                                    @if ($value->hocky == 1)
                                                        <td style="text-align: center">I</td>
                                                    @endif
                                                    @if ($value->hocky == 2)
                                                        <td style="text-align: center">II</td>
                                                    @endif
                                                    @if ($value->hocky == 3)
                                                        <td style="text-align: center">III</td>
                                                    @endif
                                                    @if ($value->hocky == 4)
                                                        <td style="text-align: center">IV</td>
                                                    @endif
                                                    @if ($value->hocky == 5)
                                                        <td style="text-align: center">V</td>
                                                    @endif
                                                    @if ($value->hocky == 6)
                                                        <td style="text-align: center">VI</td>
                                                    @endif
                                                    @if ($value->hocky == 7)
                                                        <td style="text-align: center">VII</td>
                                                    @endif
                                                    @if ($value->hocky == 8)
                                                        <td style="text-align: center">VIII</td>
                                                    @endif

                                                </tr>
                                                @php
                                                    $stt = $stttt + $sttbc;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="12"><b>Khối kiến thức cơ sở ngành: {{ $stt }} TC (Bắt
                                                    buộc:
                                                    {{ $sttbc }}
                                                    TC; Tự chọn: {{ $stttt }})</b></td>
                                        </tr>
                                        @php
                                            $stt = 0;
                                            $sttbc = 0;
                                            $stttt = 0;
                                            $nhomhocphantuchonid = 0;
                                        @endphp
                                        @foreach ($ctdt_hocphan as $value)
                                            @if ($value->khoikienthuc_id == 3)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td>{{ $value->mahocphan }}</td>
                                                    <td>{{ $value->tenhocphantiengviet }}</td>
                                                    <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                    @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                                        <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                        @php
                                                            $sttbc += $value->sotinchi;
                                                        @endphp
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                                                        @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                                            @php
                                                                $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                            @endphp
                                                            @foreach ($ctdt_hocphan as $value1)
                                                                @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                                                    @php
                                                                        $row = $row + 1;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            <td style="text-align: center" rowspan="{{ $row }}">
                                                                {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                                            {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                                            @php
                                                                $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                                                // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                                $row = 0;
                                                            @endphp

                                                            {{-- @endif --}}
                                                        @endif
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td style="text-align: center">{{ $value->sotietlythuyet }}</td>
                                                    <td style="text-align: center">{{ $value->sotietthuchanh }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphantienquyet }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphanhoctruoc }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphansonghanh }}</td>
                                                    @if ($value->hocky == 1)
                                                        <td style="text-align: center">I</td>
                                                    @endif
                                                    @if ($value->hocky == 2)
                                                        <td style="text-align: center">II</td>
                                                    @endif
                                                    @if ($value->hocky == 3)
                                                        <td style="text-align: center">III</td>
                                                    @endif
                                                    @if ($value->hocky == 4)
                                                        <td style="text-align: center">IV</td>
                                                    @endif
                                                    @if ($value->hocky == 5)
                                                        <td style="text-align: center">V</td>
                                                    @endif
                                                    @if ($value->hocky == 6)
                                                        <td style="text-align: center">VI</td>
                                                    @endif
                                                    @if ($value->hocky == 7)
                                                        <td style="text-align: center">VII</td>
                                                    @endif
                                                    @if ($value->hocky == 8)
                                                        <td style="text-align: center">VIII</td>
                                                    @endif

                                                </tr>
                                                @php
                                                    $stt = $stttt + $sttbc;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="12"><b>Khối kiến thức chuyên ngành: {{ $stt }} TC (Bắt
                                                    buộc:
                                                    {{ $sttbc }}
                                                    TC; Tự chọn: {{ $stttt }})</b></td>
                                        </tr>
                                        @php
                                            $stt = 0;
                                            $sttbc = 0;
                                            $stttt = 0;
                                            $nhomhocphantuchonid = 0;
                                        @endphp
                                        @foreach ($ctdt_hocphan as $value)
                                            @if ($value->khoikienthuc_id == 4)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td>{{ $value->mahocphan }}</td>
                                                    <td>{{ $value->tenhocphantiengviet }}</td>
                                                    <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                    @if ($value->loaihocphan->tenloaihocphan == 'Bắt buộc')
                                                        <td style="text-align: center">{{ $value->sotinchi }}</td>
                                                        @php
                                                            $sttbc += $value->sotinchi;
                                                        @endphp
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($value->loaihocphan->tenloaihocphan == 'Tự chọn')
                                                        @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid)
                                                            @php
                                                                $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                            @endphp
                                                            @foreach ($ctdt_hocphan as $value1)
                                                                @if ($value1->nhomhocphantuchon_id == $nhomhocphantuchonid && $value1->ctdt_id == $value->ctdt_id )
                                                                    @php
                                                                        $row = $row + 1;
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                            <td style="text-align: center" rowspan="{{ $row }}">
                                                                {{ $value->nhomhocphantuchon->tongsotinchi }}</td>
                                                            {{-- @if ($value->nhomhocphantuchon_id != $nhomhocphantuchonid) --}}
                                                            @php
                                                                $stttt += (int) $value->nhomhocphantuchon->tongsotinchi;
                                                                // $nhomhocphantuchonid = $value->nhomhocphantuchon_id;
                                                                $row = 0;
                                                            @endphp

                                                            {{-- @endif --}}
                                                        @endif
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td style="text-align: center">{{ $value->sotietlythuyet }}</td>
                                                    <td style="text-align: center">{{ $value->sotietthuchanh }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphantienquyet }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphanhoctruoc }}</td>
                                                    <td style="text-align: center">{{ $value->dkhocphansonghanh }}</td>
                                                    @if ($value->hocky == 1)
                                                        <td style="text-align: center">I</td>
                                                    @endif
                                                    @if ($value->hocky == 2)
                                                        <td style="text-align: center">II</td>
                                                    @endif
                                                    @if ($value->hocky == 3)
                                                        <td style="text-align: center">III</td>
                                                    @endif
                                                    @if ($value->hocky == 4)
                                                        <td style="text-align: center">IV</td>
                                                    @endif
                                                    @if ($value->hocky == 5)
                                                        <td style="text-align: center">V</td>
                                                    @endif
                                                    @if ($value->hocky == 6)
                                                        <td style="text-align: center">VI</td>
                                                    @endif
                                                    @if ($value->hocky == 7)
                                                        <td style="text-align: center">VII</td>
                                                    @endif
                                                    @if ($value->hocky == 8)
                                                        <td style="text-align: center">VIII</td>
                                                    @endif

                                                </tr>
                                                @php
                                                    $stt = $stttt + $sttbc;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="12"><b>Kiến thức thực tập nghề nghiệp, khóa luận tốt nghiệp/các học
                                                    phần thay thế: {{ $stt }} TC (Bắt buộc:
                                                    {{ $sttbc }}
                                                    TC; Tự chọn: {{ $stttt }})</b></td>
                                        </tr>
                                    @break
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>



@endsection
@section('javascript')
    <script>
        function getCapNhat(hocPhan) {
            hocPhan = JSON.parse(hocPhan);
            console.log(hocPhan.id);
            $('#id_edit').val(id);
            $('#ctdt_id_edit').val(ctdt_id);
        }

        function getXoa(id, ctdt_id) {

            $('#id_delete').val(id);
            $('#ctdt_id_delete').val(ctdt_id);
        }

        function getXoaAll(ctdt_id) {
            //ctdt_hocphan = JSON.parse(JSON.parse(ctdt_hocphan));
            $('#ctdt_id_deleteall').val(ctdt_id);
        }

        @if ($errors->has('ctdt_id_dt') || $errors->has('ctdt_id_tm'))
            $('#addModal').modal('show');
        @endif

        @if ($errors->has('hocphan_id') || $errors->has('ctdt_id'))
            $('#addHPModal').modal('show');
        @endif

        @if ($errors->has('nhomhocphantuchon_id') || $errors->has('ctdt_id'))
            $('#addNHPModal').modal('show');
        @endif

        @if ($errors->has('nganhhoc_id_edit') || $errors->has('bomon_id_edit') || $errors->has('bomon_id_edit') || $errors->has('mactdt_edit') || $errors->has('tenctdt_edit') || $errors->has('tongsotinhchi_edit') || $errors->has('trangthi_edit'))
            $('#editModal').modal('show');
        @endif


        $(function() {
            $('.select2').select2()


            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

    </script>
    <script type="text/javascript">
        $('#khoikienthuc_SHOW').change(function() {
            let valueuu = $(this).val();
            $.ajax({
                url: "{{ route('admin.ctdt_hocphan_khoikienthuc.ajax') }}",
                dataType: 'json',
                data: {
                    id: valueuu
                },
                type: 'get',
                success: function(data_return) {

                    $('#TableTimKiem1').find('tbody').html(data_return.du_lieu);


                }
            });
        });

    </script>




@endsection
