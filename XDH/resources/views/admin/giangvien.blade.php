@extends('layouts.admin')

@section('title')
  Giảng viên
@endsection

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <a href="{{ route('admin.giangvien') }}" style=" color: black;">
              <h5>Danh sách giảng viên</h5>
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
              {{-- <div class="card-header">
                <h3 class="card-title">Danh sách giảng viên</h3>
              </div> --}}
              <!-- /.card-header -->
             <div class="card-body table-responsive p-0" style="height: 100%;">
                <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th style="width: 10%">Mã giảng viên</th>
                      <th style="width: 15%">Tên giảng viên</th>
                      <th style="width: 10%">Số điện thoại</th>
                      <th style="width: 10%">Email</th>
                      <th style="width: 15%">Tên bộ môn</th>
                      <th style="width: 15%">Tên Khoa</th>
                      <th style="width: 10%">Ghi chú</th>
                      <th style="width:  5%">Sửa</th>
                      <th style="width:  5%">Xóa</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($giangvien as $value)
                    @php
                      $editLink = "getCapNhat(" . $value->id . ", '" . $value->bomon_id . "', '" . $value->khoa_id . "', '" . $value->magiangvien . "', '" . $value->tengiangvien . "', '" . $value->email . "', '" . $value->dienthoai . "', '" . $value->ghichu . "'); return false;";
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $value->magiangvien }}</td>
                      <td>{{ $value->tengiangvien }}</td>
                      <td>{{ $value->dienthoai }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->bomon->tenbomon }}</td>
                      <td>{{ $value->khoa->tenkhoa }}</td>
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
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <form action="{{ route('admin.giangvien.them') }}" method="post">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Thêm giảng viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="bomon_id">Bộ môn <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('bomon_id') is-invalid @enderror" id="bomon_id" name="bomon_id" required>
                <option value="">-- Chọn --</option>
                @foreach($bomon as $value)
                  <option value="{{ $value->id }}">{{ $value->tenbomon }} </option>
                @endforeach
              </select>
              @error('bomon_id')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="khoa_id">Khoa <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('khoa_id') is-invalid @enderror" id="khoa_id" name="khoa_id" required>
                <option value="">-- Chọn --</option>
                @foreach($khoa as $value)
                  <option value="{{ $value->id }}">{{ $value->tenkhoa }} </option>
                @endforeach
              </select>
              @error('khoa_id')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

          
            <div class="form-group">
              <label for="magiangvien"> Mã giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('magiangvien') is-invalid @enderror" id="magiangvien" name="magiangvien" value="{{ old('magiangvien') }}" required />
              @error('magiangvien')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tengiangvien">Tên giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tengiangvien') is-invalid @enderror" id="tengiangvien" name="tengiangvien" value="{{ old('tengiangvien') }}" required />
              @error('tengiangvien')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
              @error('email')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="dienthoai">Điện thoại <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('dienthoai') is-invalid @enderror" id="dienthoai" name="dienthoai" value="{{ old('dienthoai') }}" required />
              @error('dienthoai')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="ghichu">Ghi chú</label>
              <input type="text" class="form-control @error('ghichu') is-invalid @enderror" id="ghichu" name="ghichu" value="{{ old('ghichu') }}"  />
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

  <form action="{{ route('admin.giangvien.sua') }}" method="post">
    @csrf
    <input type="hidden" id="id_edit" name="id_edit" value="" />
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Cập nhật giảng viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">

             <div class="form-group">
              <label for="bomon_id_edit">Bộ môn <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('bomon_id_edit') is-invalid @enderror" id="bomon_id_edit" name="bomon_id_edit" required>
                <option value="">-- Chọn --</option>
                @foreach($bomon as $value)
                  <option value="{{ $value->id }}">{{ $value->tenbomon }} </option>
                @endforeach
              </select>
              @error('bomon_id_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="khoa_id_edit">Khoa <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('khoa_id_edit') is-invalid @enderror" id="khoa_id_edit" name="khoa_id_edit" required>
                <option value="">-- Chọn --</option>
                @foreach($khoa as $value)
                  <option value="{{ $value->id }}">{{ $value->tenkhoa }} </option>
                @endforeach
              </select>
              @error('khoa_id_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="magiangvien_edit">Ma giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('magiangvien_edit') is-invalid @enderror" id="magiangvien_edit" name="magiangvien_edit" value="{{ old('magiangvien_edit') }}" required />
              @error('magiangvien_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tengiangvien_edit">Tên giảng viên <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tengiangvien_edit') is-invalid @enderror" id="tengiangvien_edit" name="tengiangvien_edit" value="{{ old('tengiangvien_edit') }}" required />
              @error('tengiangvien_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

             <div class="form-group">
              <label for="email_edit">Email <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="email" class="form-control @error('email_edit') is-invalid @enderror" id="email_edit" name="email_edit" value="{{ old('email_edit') }}" required />
              @error('email_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="dienthoai_edit">Điện thoại <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('dienthoai_edit') is-invalid @enderror" id="dienthoai_edit" name="dienthoai_edit" value="{{ old('dienthoai_edit') }}" required />
              @error('dienthoai_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="ghichu_edit">Ghi chú </label>
              <input type="text" class="form-control @error('ghichu_edit') is-invalid @enderror" id="ghichu_edit" name="ghichu_edit" value="{{ old('ghichu_edit') }}"  />
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

  <form action="{{ route('admin.giangvien.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="id_delete" name="id_delete" value="" />
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Xóa giảng viên</h5>
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
    function getCapNhat(id, bomon_id, khoa_id, magiangvien, tengiangvien, email, dienthoai, ghichu) {
      $('#id_edit').val(id);
      $('#bomon_id_edit').val(bomon_id);
      $('#khoa_id_edit').val(khoa_id);
      $('#magiangvien_edit').val(magiangvien);
      $('#tengiangvien_edit').val(tengiangvien);
      $('#email_edit').val(email);
      $('#dienthoai_edit').val(dienthoai);
      $('#ghichu_edit').val(ghichu);
    }
    
    function getXoa(id) {
      $('#id_delete').val(id);
    }
    
    @if($errors->has('magiangvien')|| $errors->has('bomon_id')|| $errors->has('khoa_id') || $errors->has('tengiangvien')|| $errors->has('email')|| $errors->has('dienthoai'))
      $('#addModal').modal('show');
    @endif
    
    @if($errors->has('magiangvien_edit') || $errors->has('bomon_id_edit') || $errors->has('khoa_id_edit') || $errors->has('tengiangvien_edit') || $errors->has('email_edit') || $errors->has('dienthoai_edit'))
      $('#editModal').modal('show');
    @endif
  </script>

  <script>
    $(function () {
      $('.select2').select2()
    });
  </script>
  
@endsection