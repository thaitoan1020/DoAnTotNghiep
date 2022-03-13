@extends('layouts.admin')

@section('title')
  Khóa học
@endsection

@section('content')
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <a href="{{ route('admin.khoahoc') }}" style=" color: black;">
              <h5>Danh sách khóa học</h5>
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
                <h3 class="card-title">Danh sách khóa học</h3>
              </div> --}}
              <!-- /.card-header -->
               <div class="card-body table-responsive p-0" style="height: 100%;">
                <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th style="width: 10%">Mã khóa học</th>
                      <th style="width: 15%">Tên khóa học</th>
          					  <th style="width: 15%">Thời gian bắt đầu</th>
          					  <th style="width: 15%">Thời gian kết thúc</th>
                      <th style="width: 30%">Ghi chú</th>
                      <th style="width:  5%">Sửa</th>
                      <th style="width:  5%">Xóa</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($khoahoc as $value)
                    @php
                      $editLink = "getCapNhat(" . $value->id . ", '" . $value->makhoahoc . "', '" . $value->tenkhoahoc . "', '" . $value->ghichu . "'); return false;";
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $value->makhoahoc }}</td>
                      <td>{{ $value->tenkhoahoc }}</td>
          					  <td>{{ $value->thoigianbatdau }}</td>
          					  <td>{{ $value->thoigianketthuc }}</td>
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
    <form action="{{ route('admin.khoahoc.them') }}" method="post">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Thêm khóa học</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="makhoahoc"> Mã khóa học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('makhoahoc') is-invalid @enderror" id="makhoahoc" name="makhoahoc" value="{{ old('makhoahoc') }}" required />
              @error('makhoahoc')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tenkhoahoc">Tên khóa học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tenkhoahoc') is-invalid @enderror" id="tenkhoahoc" name="tenkhoahoc" value="{{ old('tenkhoahoc') }}" required />
              @error('tenkhoahoc')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
			
			<div class="form-group">
              <label for="thoigianbatdau">Thời gian bất đầu <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('thoigianbatdau') is-invalid @enderror" id="thoigianbatdau" name="thoigianbatdau" placeholder="dd-mm-yy" value="{{ old('thoigianbatdau') }}" required />
              @error('thoigianbatdau')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
			
			<div class="form-group">
              <label for="thoigianketthuc">Thời gian kết thúc <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('thoigianketthuc') is-invalid @enderror" id="thoigianketthuc" name="thoigianketthuc" placeholder="dd-mm-yy" value="{{ old('thoigianketthuc') }}" required />
              @error('thoigianketthuc')
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

  <form action="{{ route('admin.khoahoc.sua') }}" method="post">
    @csrf
    <input type="hidden" id="id_edit" name="id_edit" value="" />
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Cập nhật khóa học</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="makhoahoc_edit">Ma khóa học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('makhoahoc_edit') is-invalid @enderror" id="makhoahoc_edit" name="makhoahoc_edit" value="{{ old('makhoahoc_edit') }}" required />
              @error('makhoahoc_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tenkhoahoc_edit">Tên khóa học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tenkhoahoc_edit') is-invalid @enderror" id="tenkhoahoc_edit" name="tenkhoahoc_edit" value="{{ old('tenkhoahoc_edit') }}" required />
              @error('tenkhoahoc_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
			
			 <div class="form-group">
              <label for="thoigianbatdau_edit">Thời gian bất đầu <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('thoigianbatdau_edit') is-invalid @enderror" id="thoigianbatdau_edit" name="thoigianbatdau_edit" value="{{ old('thoigianbatdau_edit') }}" required />
              @error('thoigianbatdau_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
			
			 <div class="form-group">
              <label for="thoigianketthuc_edit">Thời gian kết thuc <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('thoigianketthuc_edit') is-invalid @enderror" id="thoigianketthuc_edit" name="thoigianketthuc_edit" value="{{ old('thoigianketthuc_edit') }}" required />
              @error('thoigianketthuc_edit')
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

  <form action="{{ route('admin.khoahoc.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="id_delete" name="id_delete" value="" />
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Xóa khóa học</h5>
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
    function getCapNhat(id, makhoahoc, tenkhoahoc, ghichu) {
      $('#id_edit').val(id);
      $('#makhoahoc_edit').val(makhoahoc);
      $('#tenkhoahoc_edit').val(tenkhoahoc);
	  $('#thoigianbatdau_edit').val(tenkhoahoc);
	  $('#thoigianketthuc_edit').val(tenkhoahoc);
      $('#ghichu_edit').val(ghichu);
    }
    
    function getXoa(id) {
      $('#id_delete').val(id);
    }
    
    @if($errors->has('makhoahoc') || $errors->has('tenkhoahoc') || $errors->has('thoigianbatdau') || $errors->has('thoigianketthuc'))
      $('#addModal').modal('show');
    @endif
    
    @if($errors->has('makhoahoc_edit') || $errors->has('tenkhoahoc_edit') || $errors->has('thoigianbatdau_edit') || $errors->has('thoigianketthuc_edit'))
      $('#editModal').modal('show');
    @endif
  </script>

  <script>
    $(function () {
      $('.select2').select2()
    });
  </script>

@endsection