@extends('layouts.admin')

@section('title')
  Tài khoản giảng viên
@endsection


@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <a href="{{ route('admin.nguoidung_user') }}" style=" color: black;">
              <h5> TÀI KHOẢN GIẢNG VIÊN </h5>
            </a>
          </div>
          <div class="col-sm-9">
            <div class="row mb-2 " >
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
              <div class="card-header">
                <h3 class="card-title">Danh tài khoản giảng viên</h3>

               

              </div>
              <!-- /.card-header -->
               <div class="card-body table-responsive p-0" style="height: 100%;">
                <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th style="width: 25%">Họ và tên</th>
                      <th style="width: 5%">Mã giảng viên</th>
                      <th style="width: 25%">Tên đăng nhập</th>
                      <th style="width: 25%">Email</th>
                      <th style="width: 5%">Quyền hạn</th>
                      <th style="width:  5%">Sửa</th>
                      <th style="width:  5%">Xóa</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($nguoidung as $value)
                    @php
                      $editLink = "getCapNhat(" . $value->id . ", " . $value->giangvien_id . " '" . $value->username . "', '" . $value->email . "'); return false;";
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->giangvien->magiangvien }}</td>
                      <td>{{ $value->username }}</td>
                      <td>{{ $value->email }}</td>
                      <td><span class="badge badge-pill badge-danger">Giảng viên</span></td>
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
    <form action="{{ route('admin.nguoidung_user.them') }}" method="post">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Thêm tài khoản giảng viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">

             <div class="form-group">
              <label for="giangvien_id">Mã giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('giangvien_id') is-invalid @enderror" id="giangvien_id" name="giangvien_id" required>
                <option value="">-- Chọn --</option>
                @foreach($giangvien as $value)
                  <option value="{{ $value->id }}">{{ $value->magiangvien }} - {{ $value->tengiangvien }}</option>
                @endforeach
              </select>
              @error('giangvien_id')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="username">Tên đăng nhập <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required />
              @error('username')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="password">Mật khẩu <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
              @error('password')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Xác nhận mật khẩu <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required />
              @error('password_confirmation')
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

  <form action="{{ route('admin.nguoidung_user.sua') }}" method="post">
    @csrf
    <input type="hidden" id="id_edit" name="id_edit" value="" />
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Cập nhật tài khoản giảng viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">

             <div class="form-group">
              <label for="giangvien_id_edit">Mã giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('giangvien_id_edit') is-invalid @enderror" id="giangvien_id_edit" name="giangvien_id_edit" required>
                <option value="">-- Chọn --</option>
                @foreach($giangvien as $value)
                  <option value="{{ $value->id }}">{{ $value->magiangvien }} - {{ $value->tengiangvien }}</option>
                @endforeach
              </select>
              @error('giangvien_id_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="username_edit">Tên đăng nhập <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('username_edit') is-invalid @enderror" id="username_edit" name="username_edit" value="{{ old('username_edit') }}" required />
              @error('username_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="password_edit">Mật khẩu <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="password" class="form-control @error('password_edit') is-invalid @enderror" id="password_edit" name="password_edit" placeholder="Bỏ trống sẽ giữ nguyên mật khẩu cũ" />
              @error('password_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_edit_confirmation">Xác nhận mật khẩu <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="password" class="form-control @error('password_edit_confirmation') is-invalid @enderror" id="password_edit_confirmation" name="password_edit_confirmation" placeholder="Bỏ trống sẽ giữ nguyên mật khẩu cũ" />
              @error('password_edit_confirmation')
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

  <form action="{{ route('admin.nguoidung_user.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="id_delete" name="id_delete" value="" />
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Xóa ngành học</h5>
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
    function getCapNhat(id, giangvien_id, username) {
      $('#id_edit').val(id);
      $('#giangvien_id_edit').val(giangvien_id);
      $('#username_edit').val(username);
    }
    
    function getXoa(id) {
      $('#id_delete').val(id);
    }
    
    @if( $errors->has('giangvien_id') || $errors->has('username') || $errors->has('password') || $errors->has('password_confirmation'))
      $('#addModal').modal('show');
    @endif
    
    @if( $errors->has('giangvien_id_edit') || $errors->has('username_edit') || $errors->has('password_edit') || $errors->has('password_edit_confirmation'))
      $('#editModal').modal('show');
    @endif
  </script>

  <script>
    $(function () {
      $('.select2').select2()
    });
  </script>

@endsection