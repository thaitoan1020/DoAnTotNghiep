@extends('layouts.supmanager')

@section('title')
    Nhóm giảng viên
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a href="{{ route('supmanager.nhomgiangvien') }}" style=" color: black;">
                        <h5>Danh sách nhóm giảng viên</h5>
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
                <h3 class="card-title">Danh sách nhóm giảng viên</h3>
              </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 100%;">
                            <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align: center; vertical-align: middle;">Mã nhóm giảng viên</th>
                                        <th style="text-align: center; vertical-align: middle;">Tên nhóm giảng viên</th>
                                        <th style="text-align: center; vertical-align: middle;">Các thành viên</th>
                                        <th style="text-align: center; vertical-align: middle;">Thêm giảng viên</th>
                                        <th style="text-align: center; vertical-align: middle;">Sửa</th>
                                        <th style="text-align: center; vertical-align: middle;">Xóa</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nhomgiangvien as $value)
                                        @php
                                            $editLink = "getCapNhat(" . $value->id . ", '" . $value->manhomgiangvien . "', '" . $value->tennhomgiangvien . "', '" . $value->ghichu . "'); return false;";
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->manhomgiangvien }}</td>
                                            <td>{{ $value->tennhomgiangvien }}</td>
                                            <td multiple="multiple" data-placeholder="Any">
                                                @foreach ($nhomgiangvien_giangvien as $item)

                                                    @if ($item->nhomgiangvien_id == $value->id)
                                                        <a href="#xoagv" class="btn btn-info mb-1" role="button" data-toggle="modal"
                                                        data-target="#deletegvModal"
                                                        onclick="getXoagv('{{ $item->id }}'); return false;" >{{ $item->giangvien->tengiangvien }}</a><br>
                                                    @endif
                                                @endforeach
                                                
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="#suagv" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal"
                                                data-target="#editgvModal" onclick="getCapNhatgv('{{ $value->id }}')"><i
                                                    class="fa fa-pencil-alt"></i></a></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a  href="#sua" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal"
                                                    data-target="#editModal" onclick="{!! $editLink !!}"><i
                                                        class="fa fa-pencil-alt"></i></a>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle;">
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
    <form action="{{ route('supmanager.nhomgiangvien.them') }}" method="post">
        @csrf
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Thêm nhóm giảng viên</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="manhomgiangvien"> Mã nhóm giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('manhomgiangvien') is-invalid @enderror"
                                id="manhomgiangvien" name="manhomgiangvien" value="{{ old('manhomgiangvien') }}"
                                required />
                            @error('manhomgiangvien')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tennhomgiangvien">Tên nhóm giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('tennhomgiangvien') is-invalid @enderror"
                                id="tennhomgiangvien" name="tennhomgiangvien" value="{{ old('tennhomgiangvien') }}"
                                required />
                            @error('tennhomgiangvien')
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

    <form action="{{ route('supmanager.nhomgiangvien.sua') }}" method="post">
        @csrf
        <input type="hidden" id="id_edit" name="id_edit" value="" />
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Cập nhật nhóm giảng viên</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="manhomgiangvien_edit">Ma nhóm giảng viên <abbr
                                    title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('manhomgiangvien_edit') is-invalid @enderror"
                                id="manhomgiangvien_edit" name="manhomgiangvien_edit"
                                value="{{ old('manhomgiangvien_edit') }}" required />
                            @error('manhomgiangvien_edit')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i>
                                        {{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tennhomgiangvien_edit">Tên nhóm giảng viên <abbr
                                    title="Bắt buộc nhập">*</abbr></label>
                            <input type="text" class="form-control @error('tennhomgiangvien_edit') is-invalid @enderror"
                                id="tennhomgiangvien_edit" name="tennhomgiangvien_edit"
                                value="{{ old('tennhomgiangvien_edit') }}" required />
                            @error('tennhomgiangvien_edit')
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

    <form action="{{ route('supmanager.nhomgiangvien.suagv') }}" method="post">
        @csrf
        <input type="hidden" id="nhomgiangvien_id_edit" name="nhomgiangvien_id_edit" value="" />
        <div class="modal fade" id="editgvModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Cập nhật giảng viên</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="giangvien_id">Cố vấn học tập <abbr title="Bắt buộc nhập">*</abbr></label>
                            <select class="custom-select @error('giangvien_id') is-invalid @enderror" id="giangvien_id" name="giangvien_id" required>
                              <option value="">-- Chọn --</option>
                              @foreach($giangvien as $value)
                                <option value="{{ $value->id }}">{{ $value->tengiangvien }}</option>
                              @endforeach
                            </select>
                            @error('giangvien_id')
                              <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
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

    <form action="{{ route('supmanager.nhomgiangvien.xoa') }}" method="post">
        @csrf
        <input type="hidden" id="id_delete" name="id_delete" value="" />
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xóa nhóm giảng viên</h5>
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

    <form action="{{ route('supmanager.nhomgiangvien.xoagv') }}" method="post">
        @csrf
        <input type="hidden" id="id_deletegv" name="id_deletegv" value="" />
        <div class="modal fade" id="deletegvModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xóa giảng viên</h5>
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
        function getCapNhat(id, manhomgiangvien, tennhomgiangvien, ghichu) {
            $('#id_edit').val(id);
            $('#manhomgiangvien_edit').val(manhomgiangvien);
            $('#tennhomgiangvien_edit').val(tennhomgiangvien);
            $('#ghichu_edit').val(ghichu);
        }
        function getCapNhatgv(nhomgiangvien_id) {
            console.log(nhomgiangvien_id);
            $('#nhomgiangvien_id_edit').val(nhomgiangvien_id);
        }

        function getXoa(id) {
            $('#id_delete').val(id);
        }
        function getXoagv(id) {
            console.log(id);
            $('#id_deletegv').val(id);
        }

        @if ($errors->has('manhomgiangvien') || $errors->has('tennhomgiangvien'))
            $('#addModal').modal('show');
        @endif

        @if ($errors->has('manhomgiangvien_edit') || $errors->has('tennhomgiangvien_edit'))
            $('#editModal').modal('show');
        @endif

    </script>

    <script>
        $(function() {
            $('.select2').select2()
        });

    </script>

@endsection
