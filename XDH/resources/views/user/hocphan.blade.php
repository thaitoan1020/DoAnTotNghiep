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
                                        <th style="width: 5%; font-size: 10pt;">Sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nhomgiangvien_giangvien as $item1)
                                        @if ($item1->giangvien_id == Auth::user()->giangvien_id)
                                            @foreach ($nhomgiangvien as $item)
                                                @if ($item1->nhomgiangvien_id== $item->id)
                                                    @foreach ($hocphan as $value)
                                                        @if ($value->nhomgiangvien_id == $item->id)
                                                            @php
                                                                $editLink =
                                                                    "getCapNhat('" .
                                                                    $value->id .
                                                                    "', '" .
                                                                    $value->loaihocphan_id .
                                                                    "', '" .
                                                                    $value->nhomhocphan_id .
                                                                    "'
                                                                                                               , '" .
                                                                    $value->khoikienthuc_id .
                                                                    "', '" .
                                                                    $value->mahocphan .
                                                                    "', '" .
                                                                    $value->tenhocphantiengviet .
                                                                    "'
                                                                                                               , '" .
                                                                    $value->tenhocphantienganh .
                                                                    "', '" .
                                                                    $value->dkhocphantienquyet .
                                                                    "', '" .
                                                                    $value->dkhocphanhoctruoc .
                                                                    "'
                                                                                                               , '" .
                                                                    $value->dkhocphansonghanh .
                                                                    "', '" .
                                                                    $value->sotinchi .
                                                                    "', '" .
                                                                    $value->sotietlythuyet .
                                                                    "', '" .
                                                                    $value->sotietthuchanh .
                                                                    "'
                                                                                                               , '" .
                                                                    $value->nhomhocphantuchon_id .
                                                                    "', '" .
                                                                    $value->nhomgiangvien_id .
                                                                    "', '" .
                                                                    $value->hocky .
                                                                    "', '" .
                                                                    $value->filedinhkem .
                                                                    "'
                                                                                                               , '" .
                                                                    $value->ghichu .
                                                                    "'); return false;";
                                                            @endphp
                                                            <tr>
                                                                <td style="width: 2%;font-size: 9pt;">
                                                                    {{ $loop->iteration }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->mahocphan }}</td>
                                                                <td style="width: 7%;font-size: 9pt;">
                                                                    {{ $value->tenhocphantiengviet }}</td>
                                                                <td style="width: 6%;font-size: 9pt;">
                                                                    {{ $value->tenhocphantienganh }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->loaihocphan->tenloaihocphan }}
                                                                </td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->nhomhocphan->tennhomhocphan ?? 'N/A' }}
                                                                </td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->khoikienthuc->tenkhoikienthuc }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->dkhocphantienquyet }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->dkhocphanhoctruoc }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->dkhocphansonghanh }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->sotinchi }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->sotietlythuyet }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->sotietthuchanh }}</td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->nhomhocphantuchon->tennhomhocphantuchon ?? 'N/A' }}
                                                                </td>
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    {{ $value->nhomgiangvien->tennhomgiangvien }}</td>
                                                                @if ($value->hocky == 1)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        I</td>
                                                                @endif
                                                                @if ($value->hocky == 2)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        II</td>
                                                                @endif
                                                                @if ($value->hocky == 3)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        III</td>
                                                                @endif
                                                                @if ($value->hocky == 4)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        IV</td>
                                                                @endif
                                                                @if ($value->hocky == 5)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        V</td>
                                                                @endif
                                                                @if ($value->hocky == 6)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        VI</td>
                                                                @endif
                                                                @if ($value->hocky == 7)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        VII</td>
                                                                @endif
                                                                @if ($value->hocky == 8)
                                                                    <td
                                                                        style="width: 5%;font-size: 9pt; text-align: center">
                                                                        VII</td>
                                                                @endif
                                                                <td style="width: 5%;font-size: 9pt;">
                                                                    @if ($value->filedinhkem)<a
                                                                            href="{{ env('APP_URL') . '/storage/app/' . $value->filedinhkem }}"
                                                                            target="_blank"
                                                                            class="btn btn-sm btn-icon btn-secondary"><i
                                                                                class="fa fa-eye"></i></a>@endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('user.hocphan.chitiet', ['id' => $value->id]) }}"
                                                                        class="btn btn-sm btn-icon btn-secondary"><i
                                                                            class="fa fa-eye"></i></a>
                                                                </td>
                                                                <td>
                                                                    <a href="#sua" class="btn btn-sm btn-icon btn-secondary"
                                                                        data-toggle="modal" data-target="#editModal"
                                                                        onclick="getCapNhatmt('{{ $value->mota }}');{!! $editLink !!}; return false;"><i
                                                                            class="fa fa-pencil-alt"></i></a>
                                                                </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif

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

    <form action="{{ route('user.hocphan.sua') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id_edit" name="id_edit" value="" />
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Cập nhật học phần</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="loaihocphan_id_edit">Loại học phần <abbr title="Bắt buộc nhập">*</abbr></label>
                            <select class="custom-select @error('loaihocphan_id_edit') is-invalid @enderror"
                                id="loaihocphan_id_edit" name="loaihocphan_id_edit" required>
                                <option value="">-- Chọn --</option>
                                @foreach ($loaihocphan as $value)
                                    <option value="{{ $value->id }}">{{ $value->tenloaihocphan }}</option>
                                @endforeach
                            </select>
                            @error('loaihocphan_id_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nhomhocphan_id_edit">Nhóm học phần </label>
                            <select class="custom-select @error('nhomhocphan_id_edit') is-invalid @enderror"
                                id="nhomhocphan_id_edit" name="nhomhocphan_id_edit">
                                <option value="">-- Chọn --</option>
                                @foreach ($nhomhocphan as $value)
                                    <option value="{{ $value->id }}">{{ $value->tennhomhocphan }} </option>
                                @endforeach
                            </select>
                            @error('nhomhocphan_id_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="khoikienthuc_id_edit">Khối kiến thức <abbr title="Bắt buộc nhập">*</abbr></label>
                            <select class="custom-select @error('khoikienthuc_id_edit') is-invalid @enderror"
                                id="khoikienthuc_id_edit" name="khoikienthuc_id_edit" required>
                                <option value="">-- Chọn --</option>
                                @foreach ($khoikienthuc as $value)
                                    <option value="{{ $value->id }}">{{ $value->tenkhoikienthuc }} </option>
                                @endforeach
                            </select>
                            @error('khoikienthuc_id_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="mahocphan_edit">Ma học phần <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('mahocphan_edit') is-invalid @enderror"
                                id="mahocphan_edit" name="mahocphan_edit" value="{{ old('mahocphan_edit') }}" required />
                            @error('mahocphan_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tenhocphantiengviet_edit">Tên học phần tiếng việt <abbr
                                    title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('tenhocphantiengviet_edit') is-invalid @enderror"
                                id="tenhocphantiengviet_edit" name="tenhocphantiengviet_edit"
                                value="{{ old('tenhocphantiengviet_edit') }}" required />
                            @error('tenhocphantiengviet_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tenhocphantienganh_edit">Tên học phần tiếng anh <abbr
                                    title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('tenhocphantienganh_edit') is-invalid @enderror"
                                id="tenhocphantienganh_edit" name="tenhocphantienganh_edit"
                                value="{{ old('tenhocphantienganh_edit') }}" required />
                            @error('tenhocphantienganh_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dkhocphantienquyet_edit">Học phần tiên quyết<small>(Nhập mã môn học)</small></label>
                            <input type="text" class="form-control @error('dkhocphantienquyet_edit') is-invalid @enderror"
                                id="dkhocphantienquyet_edit" name="dkhocphantienquyet_edit"
                                value="{{ old('dkhocphantienquyet_edit') }}" />
                            @error('dkhocphantienquyet_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dkhocphanhoctruoc_edit">Học phần học trước<small>(Nhập mã môn học)</small></label>
                            <input type="text" class="form-control @error('dkhocphanhoctruoc_edit') is-invalid @enderror"
                                id="dkhocphanhoctruoc_edit" name="dkhocphanhoctruoc_edit"
                                value="{{ old('dkhocphanhoctruoc_edit') }}" />
                            @error('dkhocphanhoctruoc_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dkhocphansonghanh_edit">Học phần song hành<small>(Nhập mã môn học)</small></label>
                            <input type="text" class="form-control @error('dkhocphansonghanh_edit') is-invalid @enderror"
                                id="dkhocphansonghanh_edit" name="dkhocphansonghanh_edit"
                                value="{{ old('dkhocphansonghanh_edit') }}" />
                            @error('dkhocphansonghanh_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sotinchi_edit">Số tín chỉ <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('sotinchi') is-invalid @enderror"
                                id="sotinchi_edit" name="sotinchi_edit" value="{{ old('sotinchi_edit') }}" required />
                            @error('sotinchi_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sotietlythuyet_edit">Số tiết lý thuyết </label>
                            <input type="text" class="form-control @error('sotietlythuyet_edit ') is-invalid @enderror"
                                id="sotietlythuyet_edit" name="sotietlythuyet_edit"
                                value="{{ old('sotietlythuyet_edit ') }}" />
                            @error('sotietlythuyet_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sotietthuchanh_edit">Số tiết thực hành </label>
                            <input type="text" class="form-control @error('sotietthuchanh_edit') is-invalid @enderror"
                                id="sotietthuchanh_edit" name="sotietthuchanh_edit"
                                value="{{ old('sotietthuchanh_edit') }}" />
                            @error('sotietthuchanh_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nhomhocphantuchon_id_edit">Nhóm học phần tự chọn</label>
                            <select class="custom-select @error('nhomhocphantuchon_id_edit') is-invalid @enderror"
                                id="nhomhocphantuchon_id_edit" name="nhomhocphantuchon_id_edit">
                                <option value="">-- Chọn --</option>
                                @foreach ($nhomhocphantuchon as $value)
                                    <option value="{{ $value->id }}">{{ $value->tennhomhocphantuchon }}</option>
                                @endforeach
                            </select>
                            @error('nhomhocphantuchon_id_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nhomgiangvien_id_edit">Nhóm người phụ trách <abbr
                                    title="Bắt buộc nhập">*</abbr></label>
                            <select class="custom-select @error('nhomgiangvien_id_edit') is-invalid @enderror"
                                id="nhomgiangvien_id_edit" name="nhomgiangvien_id_edit" required>
                                <option value="">-- Chọn --</option>
                                @foreach ($nhomgiangvien as $value)
                                    <option value="{{ $value->id }}">{{ $value->tennhomgiangvien }}</option>
                                @endforeach
                            </select>
                            @error('nhomgiangvien_id_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hocky_edit">Học kì <abbr title="Bắt buộc nhập">*</abbr></label>
                            <select class="custom-select @error('hocky_edit') is-invalid @enderror" id="hocky_edit"
                                name="hocky_edit" required>
                                <option value="">-- Chọn --</option>
                                <option value="1">I </option>
                                <option value="2">II </option>
                                <option value="3">III </option>
                                <option value="4">IV </option>
                                <option value="5">V </option>
                                <option value="6">VI </option>
                                <option value="7">VII </option>
                                <option value="8">VIII </option>
                                <option value="1,2">I.II</option>
                                <option value="3,4,5">III,IV,V</option>

                            </select>
                            @error('hocky')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="mota_edit">Mô tả </label>
                            <textarea id="mota_edit" class="form-control ckeditor  @error('mota_edit') is-invalid @enderror"
                                name="mota_edit" rows="4"></textarea>
                            @error('mota_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ghichu_edit">Ghi chú </label>
                            <input type="text" class="form-control @error('ghichu_edit') is-invalid @enderror"
                                id="ghichu_edit" name="ghichu_edit" value="{{ old('ghichu_edit') }}" />
                            @error('ghichu_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="modal-body p-0">
                                <div class="mb-0">
                                    <label for="filedinhkem_edit" class="form-label">File đính kèm</label>
                                    <input type="file" class="form-control @error('filedinhkem_edit') is-invalid @enderror"
                                        id="filedinhkem_edit" name="filedinhkem_edit" />
                                </div>
                            </div>
                            @error('filedinhkem_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Thực hiện</button>
                    </div>
                </div>
            </div>
        </div>
    </form>




@endsection
@section('javascript')
    <script>
        function getCapNhat(id, loaihocphan_id, nhomhocphan_id, khoikienthuc_id, mahocphan, tenhocphantiengviet,
            tenhocphantienganh, dkhocphantienquyet, dkhocphanhoctruoc, dkhocphansonghanh, sotinchi, sotietlythuyet,
            sotietthuchanh, nhomhocphantuchon_id, nhomgiangvien_id, hocky, filedinhkem, ghichu) {
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
