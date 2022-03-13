@extends('layouts.admin')

@section('title')
    Nhóm môn học
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a href="{{ route('admin.nhomhocphan') }}" style=" color: black;">
                        <h5>Danh sách nhóm học phần</h5>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="row mb-2 ">
                        <div class="col-sm-9">

                        </div>
                        <div class="col-sm-3">

                            <button type="button" class="float-right btn btn-success btn-floated  " data-toggle="modal"
                                data-target="#addModal"><span class="fa fa-plus"></span></button>
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
            <h3 class="card-title">Danh sách nhóm học phần</h3>
          </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 100%;">
                            <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Loại hoc phần</th>
                                        <th >Mã nhóm học phần</th>
                                        <th >Tên nhóm học phần</th>
                                        <th >Tổng số tính chỉ</th>
                                        <th >Số tiết lý thuyết</th>
                                        <th >Số tiết thực hành</th>
                                        <th >Học phần tiên quyết</th>
                                        <th >Học phần học trước</th>
                                        <th >Học phần song hành</th>
                                        <th >Học kỳ</th>
                                        <th >Sửa</th>
                                        <th >Xóa</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nhomhocphan as $value)
                                        @php
                                            $editLink = 'getCapNhat(' . $value->id . ", '" . $value->manhomhocphan . "', '" . $value->tennhomhocphan . "', '" . $value->loaihocphan_id . "', '" . $value->tongsotinchi . "', '" . $value->sotietlythuyet . "', '" . $value->sotietthuchanh . "', 
                                            '" . $value->dkhocphantienquyet . "', '" . $value->dkhocphanhoctruoc . "', '" . $value->dkhocphansonghanh . "', '" . $value->hocky . "', '" . $value->ghichu . "'); return false;";
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->loaihocphan->tenloaihocphan }}</td>
                                            <td style=" text-align: center">{{ $value->manhomhocphan }}</td>
                                            <td>{{ $value->tennhomhocphan }}</td>
                                            <td style=" text-align: center">{{ $value->tongsotinchi }}</td>
                                            <td style=" text-align: center">{{ $value->sotietlythuyet }}</td>
                                            <td style=" text-align: center">{{ $value->sotietthuchanh }}</td>
                                            <td style=" text-align: center">{{ $value->dkhocphantienquyet }}</td>
                                            <td style=" text-align: center">{{ $value->dkhocphanhoctruoc }}</td>
                                            <td style=" text-align: center">{{ $value->dkhocphansonghanh }}</td>
                                            {{-- @if ((string)$value->hocky == 1)
                                                <td style=" text-align: center">I</td>
                                            @endif
                                            @if ($value->hocky == 2)
                                                <td style=" text-align: center">III</td>
                                            @endif
                                            @if ($value->hocky == 3)
                                                <td style=" text-align: center">III</td>
                                            @endif
                                            @if ($value->hocky == 4)
                                                <td style=" text-align: center">IV</td>
                                            @endif
                                            @if ($value->hocky == 5)
                                                <td style=" text-align: center">V</td>
                                            @endif
                                            @if ($value->hocky == 6)
                                                <td style=" text-align: center">VI</td>
                                            @endif
                                            @if ($value->hocky == 7)
                                                <td style=" text-align: center">VII</td>
                                            @endif
                                            @if ($value->hocky == 8)
                                                <td style=" text-align: center">VII</td>
                                            @endif --}}
                                            @if ($value->hocky == '1,2')
                                                <td style=" text-align: center">I,II</td>
                                            @endif
                                            @if ($value->hocky == '3,4,5')
                                                <td style=" text-align: center">III,IV,V</td>
                                            @endif
                                            <td>
                                                <a href="#sua" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal"
                                                    data-target="#editModal" onclick="{!! $editLink !!}"><i
                                                        class="fa fa-pencil-alt"></i></a>
                                            </td>
                                            <td>
                                                <a href="#xoa" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal"
                                                    data-target="#deleteModal"
                                                    onclick="getXoa({{ $value->id }}); return false;"><i
                                                        class="far fa-trash-alt"></i></a>
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
    <form action="{{ route('admin.nhomhocphan.them') }}" method="post">
        @csrf
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Thêm nhóm học phần</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="loaihocphan_id">Loại học phần <abbr title="Bắt buộc nhập">*</abbr></label>
                            <select class="custom-select @error('loaihocphan_id') is-invalid @enderror" id="loaihocphan_id"
                                name="loaihocphan_id" required>
                                <option value="">-- Chọn --</option>
                                @foreach ($loaihocphan as $value)
                                    <option value="{{ $value->id }}">{{ $value->tenloaihocphan }}</option>
                                @endforeach
                            </select>
                            @error('loaihocphan_id')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="manhomhocphan"> Mã nhóm học phần <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('manhomhocphan') is-invalid @enderror"
                                id="manhomhocphan" name="manhomhocphan" value="{{ old('manhomhocphan') }}" required />
                            @error('manhomhocphan')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tennhomhocphan">Tên nhóm học phần <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('tennhomhocphan') is-invalid @enderror"
                                id="tennhomhocphan" name="tennhomhocphan" value="{{ old('tennhomhocphan') }}" required />
                            @error('tennhomhocphan')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tongsotinchi">Tổng số tín chỉ<abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('tongsotinchi') is-invalid @enderror" id="tongsotinchi"
                                name="tongsotinchi" value="{{ old('tongsotinchi') }}" required />
                            @error('tongsotinchi')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sotietlythuyet">Số tiết lý thuyết </label>
                            <input type="text" class="form-control @error('sotietlythuyet') is-invalid @enderror"
                                id="sotietlythuyet " name="sotietlythuyet" value="{{ old('sotietlythuyet') }}" />
                            @error('sotietlythuyet')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sotietthuchanh">Số tiết thực hành</label>
                            <input type="text" class="form-control @error('sotietthuchanh') is-invalid @enderror"
                                id="sotietthuchanh" name="sotietthuchanh" value="{{ old('sotietthuchanh') }}" />
                            @error('sotietthuchanh')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dkhocphantienquyet">Học phần tiên quyết <small>(Nhập mã môn học)</small></label>
                            <input type="text" class="form-control @error('dkhocphantienquyet') is-invalid @enderror"
                                id="dkhocphantienquyet" name="dkhocphantienquyet"
                                value="{{ old('dkhocphantienquyet') }}" />
                            @error('dkhocphantienquyet')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dkhocphanhoctruoc">Học phần học trước <small>(Nhập mã môn học)</small></label>
                            <input type="text" class="form-control @error('dkhocphanhoctruoc') is-invalid @enderror"
                                id="dkhocphanhoctruoc" name="dkhocphanhoctruoc" value="{{ old('dkhocphanhoctruoc') }}" />
                            @error('dkhocphanhoctruoc')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dkhocphansonghanh">Học phần song hành <small>(Nhập mã môn học)</small></label>
                            <input type="text" class="form-control @error('dkhocphansonghanh') is-invalid @enderror"
                                id="dkhocphansonghanh" name="dkhocphansonghanh" value="{{ old('dkhocphansonghanh') }}" />
                            @error('dkhocphansonghanh')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hocky">Học kỳ <abbr title="Bắt buộc nhập">*</abbr></label>
                            <select class="custom-select @error('hocky') is-invalid @enderror" id="hocky" name="hocky"
                                required>
                                <option value="">-- Chọn --</option>
                                {{-- <option value="1">I </option>
                                <option value="2">II </option>
                                <option value="3">III </option>
                                <option value="4">IV </option>
                                <option value="5">V </option>
                                <option value="6">VI </option>
                                <option value="7">VII </option>
                                <option value="8">VIII </option> --}}
                                <option value="1,2">I.II</option>
                                <option value="3,4,5">III,IV,V</option>
                            </select>
                            @error('hocky')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ghichu">Ghi chú</label>
                            <input type="text" class="form-control @error('ghichu') is-invalid @enderror" id="ghichu"
                                name="ghichu" value="{{ old('ghichu') }}" />
                            @error('ghichu')
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

    <form action="{{ route('admin.nhomhocphan.sua') }}" method="post">
        @csrf
        <input type="hidden" id="id_edit" name="id_edit" value="" />
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Cập nhật nhóm học phần</h5>
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
                            <label for="manhomhocphan_edit">Ma nhóm học phần <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('manhomhocphan_edit') is-invalid @enderror"
                                id="manhomhocphan_edit" name="manhomhocphan_edit" value="{{ old('manhomhocphan_edit') }}"
                                required />
                            @error('manhomhocphan_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tennhomhocphan_edit">Tên nhóm học phần <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('tennhomhocphan_edit') is-invalid @enderror"
                                id="tennhomhocphan_edit" name="tennhomhocphan_edit"
                                value="{{ old('tennhomhocphan_edit') }}" required />
                            @error('tennhomhocphan_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="tongsotinchi_edit">Tổng số tín chỉ <abbr title="Bắt buộc nhập">*</abbr></label>
                          <input type="text" class="form-control @error('tongsotinchi_edit') is-invalid @enderror"
                              id="tongsotinchi_edit" name="tongsotinchi_edit" value="{{ old('tongsotinchi_edit') }}" required />
                          @error('tongsotinchi_edit')
                              <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                      {{ $message }}</strong></div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="sotietlythuyet_edit">Số tiết lý thuyết </label>
                          <input type="text" class="form-control @error('sotietlythuyet_edit ') is-invalid @enderror"
                              id="sotietlythuyet_edit" name="sotietlythuyet_edit" value="{{ old('sotietlythuyet_edit ') }}"
                               />
                          @error('sotietlythuyet_edit')
                              <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                      {{ $message }}</strong></div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="sotietthuchanh_edit">Số tiết thực hành<small>(Nhập mã môn học)</small> </label>
                          <input type="text" class="form-control @error('sotietthuchanh_edit') is-invalid @enderror"
                              id="sotietthuchanh_edit" name="sotietthuchanh_edit"
                              value="{{ old('sotietthuchanh_edit') }}"  />
                          @error('sotietthuchanh_edit')
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
                        <label for="dkhocphansonghanh_edit">Học phần song hành</label>
                        <input type="text" class="form-control @error('dkhocphansonghanh_edit') is-invalid @enderror"
                            id="dkhocphansonghanh_edit" name="dkhocphansonghanh_edit"
                            value="{{ old('dkhocphansonghanh_edit') }}" />
                        @error('dkhocphansonghanh_edit')
                            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                    {{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="hocky_edit">Học kì <abbr title="Bắt buộc nhập">*</abbr></label>
                      <select class="custom-select @error('hocky_edit') is-invalid @enderror" id="hocky_edit"
                          name="hocky_edit" required>
                          <option value="">-- Chọn --</option>
                          {{-- <option value="1">I </option>
                          <option value="2">II </option>
                          <option value="3">III </option>
                          <option value="4">IV </option>
                          <option value="5">V </option>
                          <option value="6">VI </option>
                          <option value="7">VII </option>
                          <option value="8">VIII </option> --}}
                          <option value="1,2">I.II</option>
                          <option value="3,4,5">III,IV,V</option>

                      </select>
                      @error('hocky')
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Thực hiện</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.nhomhocphan.xoa') }}" method="post">
        @csrf
        <input type="hidden" id="id_delete" name="id_delete" value="" />
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xóa nhóm học phần</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p class="font-weight-bold text-danger"><i class="fa fa-question-circle"></i> Xác nhận xóa? Hành
                            động này không thể phục hồi.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Hủy
                            bỏ</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Thực hiện</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('javascript')
    <script>
        function getCapNhat(id, manhomhocphan, tennhomhocphan, loaihocphan_id, tongsotinchi, sotietlythuyet, sotietthuchanh, dkhocphantienquyet, dkhocphanhoctruoc, dkhocphansonghanh, hocky, ghichu) {
            $('#id_edit').val(id);
            $('#loaihocphan_id_edit').val(loaihocphan_id);
            $('#manhomhocphan_edit').val(manhomhocphan);
            $('#tennhomhocphan_edit').val(tennhomhocphan);
            $('#tongsotinchi_edit').val(tongsotinchi);
            $('#sotietlythuyet_edit').val(sotietlythuyet);
            $('#sotietthuchanh_edit').val(sotietthuchanh);
            $('#dkhocphantienquyet_edit').val(dkhocphantienquyet);
            $('#dkhocphanhoctruoc_edit').val(dkhocphanhoctruoc);
            $('#dkhocphansonghanh_edit').val(dkhocphansonghanh);
            $('#hocky_edit').val(hocky);
            $('#ghichu_edit').val(ghichu);
        }

        function getXoa(id) {
            $('#id_delete').val(id);
        }

        @if ($errors->has('manhomhocphan') || $errors->has('tennhomhocphan') || $errors->has('loaihocphan_id') || $errors->has('dkhocphansonghanh')
        || $errors->has('tongsotinchi') || $errors->has('sotietlythuyet') || $errors->has('dkhocphantienquyet') || $errors->has('dkhocphanhoctruoc')
        || $errors->has('hocky') || $errors->has('sotietthuchanh'))
            $('#addModal').modal('show');
        @endif

        @if ($errors->has('manhomhocphan_edit') || $errors->has('tennhomhocphan_edit') || $errors->has('loaihocphan_id_edit') || $errors->has('dkhocphansonghanh_edit')
        || $errors->has('tongsotinchi_edit') || $errors->has('sotietlythuyet_edit') || $errors->has('dkhocphantienquyet_edit') || $errors->has('dkhocphanhoctruoc_edit')
        || $errors->has('hocky_edit') || $errors->has('sotietthuchanh_edit'))
            $('#editModal').modal('show');
        @endif

    </script>

    <script>
        $(function() {
            $('.select2').select2()
        });

    </script>

@endsection
