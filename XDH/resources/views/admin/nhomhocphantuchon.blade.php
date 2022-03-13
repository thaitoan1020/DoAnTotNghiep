@extends('layouts.admin')

@section('title')
Nhóm môn học tự chọn
@endsection


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-3">
        <a href="{{ route('admin.nhomhocphantuchon') }}" style=" color: black;">
          <h5>Danh sách nhóm môn học tự chọn</h5>
        </a>
      </div>
      <div class="col-sm-9">
        <div class="row mb-2 ">
          <div class="col-sm-9">

          </div>
          <div class="col-sm-3">

            <button type="button" class="float-right btn btn-success btn-floated  " data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span></button>
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
            <h3 class="card-title">Danh sách nhóm môn học tự chọn</h3>
          </div> --}}
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 100%;">
            <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
              <thead>
                <tr>
                  <th style="width: 5%">#</th>
                  <th style="width: 15%">Mã nhóm môn học tự chọn</th>
                  <th style="width: 25%">Tên nhóm môn học tự chọn</th>
                  <th style="width: 45%">Ghi chú</th>
                  <th style="width:  5%">Sửa</th>
                  <th style="width:  5%">Xóa</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                @foreach($nhomhocphantuchon as $value)
                @php
                $editLink = "getCapNhat(" . $value->id . ", '" . $value->manhomhocphantuchon . "', '" . $value->tennhomhocphantuchon . "', '" . $value->ghichu . "'); return false;";
                @endphp
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->manhomhocphantuchon }}</td>
                  <td>{{ $value->tennhomhocphantuchon }}</td>
                  <td>{{ $value->ghichu }}</td>
                  <td>
                    <a href="#sua" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal" data-target="#editModal" onclick="{!! $editLink !!}"><i class="fa fa-pencil-alt"></i></a>
                  </td>
                  <td>
                    <a href="#xoa" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal" data-target="#deleteModal" onclick="getXoa({{ $value->id }}); return false;"><i class="far fa-trash-alt"></i></a>
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
<form action="{{ route('admin.nhomhocphantuchon.them') }}" method="post">
  @csrf
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Thêm nhóm môn học tự chọn</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="manhomhocphantuchon"> Mã nhóm môn học tự chọn <abbr title="Bắt buộc nhập">*</abbr></label>
            <input type="text" class="form-control @error('manhomhocphantuchon') is-invalid @enderror" id="manhomhocphantuchon" name="manhomhocphantuchon" value="{{ old('manhomhocphantuchon') }}" required />
            @error('manhomhocphantuchon')
            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tennhomhocphantuchon">Tên nhóm môn học tự chọn <abbr title="Bắt buộc nhập">*</abbr></label>
            <input type="text" class="form-control @error('tennhomhocphantuchon') is-invalid @enderror" id="tennhomhocphantuchon" name="tennhomhocphantuchon" value="{{ old('tennhomhocphantuchon') }}" required />
            @error('tennhomhocphantuchon')
            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
            @enderror
          </div>
          <div class="form-group">
            <label for="ghichu">Ghi chú</label>
            <input type="text" class="form-control @error('ghichu') is-invalid @enderror" id="ghichu" name="ghichu" value="{{ old('ghichu') }}" />
            @error('ghichu')
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

<form action="{{ route('admin.nhomhocphantuchon.sua') }}" method="post">
  @csrf
  <input type="hidden" id="id_edit" name="id_edit" value="" />
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Cập nhật nhóm môn học tự chọn</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="manhomhocphantuchon_edit">Ma nhóm môn học tự chọn <abbr title="Bắt buộc nhập">*</abbr></label>
            <input type="text" class="form-control @error('manhomhocphantuchon_edit') is-invalid @enderror" id="manhomhocphantuchon_edit" name="manhomhocphantuchon_edit" value="{{ old('manhomhocphantuchon_edit') }}" required />
            @error('manhomhocphantuchon_edit')
            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tennhomhocphantuchon_edit">Tên nhóm môn học tự chọn <abbr title="Bắt buộc nhập">*</abbr></label>
            <input type="text" class="form-control @error('tennhomhocphantuchon_edit') is-invalid @enderror" id="tennhomhocphantuchon_edit" name="tennhomhocphantuchon_edit" value="{{ old('tennhomhocphantuchon_edit') }}" required />
            @error('tennhomhocphantuchon_edit')
            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
            @enderror
          </div>
          <div class="form-group">
            <label for="ghichu_edit">Ghi chú </label>
            <input type="text" class="form-control @error('ghichu_edit') is-invalid @enderror" id="ghichu_edit" name="ghichu_edit" value="{{ old('ghichu_edit') }}" />
            @error('ghichu_edit')
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

<form action="{{ route('admin.nhomhocphantuchon.xoa') }}" method="post">
  @csrf
  <input type="hidden" id="id_delete" name="id_delete" value="" />
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Xóa nhóm môn học tự chọn</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <p class="font-weight-bold text-danger"><i class="fa fa-question-circle"></i> Xác nhận xóa? Hành động này không thể phục hồi.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Hủy bỏ</button>
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Thực hiện</button>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
@section('javascript')
<script>
  function getCapNhat(id, manhomhocphantuchon, tennhomhocphantuchon, ghichu) {
    $('#id_edit').val(id);
    $('#manhomhocphantuchon_edit').val(manhomhocphantuchon);
    $('#tennhomhocphantuchon_edit').val(tennhomhocphantuchon);
    $('#ghichu_edit').val(ghichu);
  }

  function getXoa(id) {
    $('#id_delete').val(id);
  }

  @if($errors->has('manhomhocphantuchon') || $errors->has('tennhomhocphantuchon'))
  $('#addModal').modal('show');
  @endif

  @if($errors->has('manhomhocphantuchon_edit') || $errors->has('tennhomhocphantuchon_edit'))
  $('#editModal').modal('show');
  @endif
</script>

<script>
  $(function() {
    $('.select2').select2()
  });
</script>

@endsection