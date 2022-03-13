@extends('layouts.admin')

@section('title')
  Lớp học
@endsection

@section('content')
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <a href="{{ route('admin.lophoc') }}" style=" color: black;">
              <h5>Danh sách lớp học</h5>
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
                <h3 class="card-title">Danh sách lớp học</h3>
              </div> --}}
              <!-- /.card-header -->
               <div class="card-body table-responsive p-0" style="height: 100%;">
                <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th style="width: 15%">Mã lớp học</th>
                      <th style="width: 15%">Tên lớp học</th>
          					  <th style="width: 15%">Tên khóa học</th>
          					  <th style="width: 15%">Tên ngành học</th>
          					  <th style="width: 15%">Cố vấn học tập</th>
                      <th style="width: 10%">Ghi chú</th>
                      <th style="width:  5%">Sủa</th>
                      <th style="width:  5%">Xóa</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lophoc as $value)
                    @php
                      $editLink = "getCapNhat(" . $value->id . ", '" . $value->khoahoc_id . "', '" . $value->nganhhoc_id . "', '" . $value->malophoc . "', '" . $value->tenlophoc . "', '" . $value->covanhoctap . "', '" . $value->ghichu . "'); return false;";
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $value->malophoc }}</td>
                      <td>{{ $value->tenlophoc }}</td>
          					  <td>{{ $value->khoahoc->tenkhoahoc }}</td>
          					  <td>{{ $value->nganhhoc->tennganhhoc }}</td>
          					  <td>{{ $value->giangvien->tengiangvien }}</td>
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
    <form action="{{ route('admin.lophoc.them') }}" method="post">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Thêm lớp học</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="khoahoc_id">Khóa học <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('khoahoc_id') is-invalid @enderror" id="khoahoc_id" name="khoahoc_id" required>
                <option value="">-- Chọn --</option>
                @foreach($khoahoc as $value)
                  <option value="{{ $value->id }}">{{ $value->tenkhoahoc }} </option>
                @endforeach
              </select>
              @error('khoahoc_id')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="nganhhoc_id">Ngành học <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('nganhhoc_id') is-invalid @enderror" id="nganhhoc_id" name="nganhhoc_id" required>
                <option value="">-- Chọn --</option>
                @foreach($nganhhoc as $value)
                  <option value="{{ $value->id }}">{{ $value->tennganhhoc }}</option>
                @endforeach
              </select>
              @error('nganhhoc_id')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>


            <div class="form-group">
              <label for="malophoc"> Mã lớp học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('malophoc') is-invalid @enderror" id="malophoc" name="malophoc" value="{{ old('malophoc') }}" required />
              @error('malophoc')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tenlophoc">Tên lớp học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tenlophoc') is-invalid @enderror" id="tenlophoc" name="tenlophoc" value="{{ old('tenlophoc') }}" required />
              @error('tenlophoc')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="covanhoctap">Cố vấn học tập <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('covanhoctap') is-invalid @enderror" id="covanhoctap" name="covanhoctap" required>
                <option value="">-- Chọn --</option>
                @foreach($giangvien as $value)
                  <option value="{{ $value->id }}">{{ $value->tengiangvien }}</option>
                @endforeach
              </select>
              @error('covanhoctap')
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

  <form action="{{ route('admin.lophoc.sua') }}" method="post">
    @csrf
    <input type="hidden" id="id_edit" name="id_edit" value="" />
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Cập nhật lớp học</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="khoahoc_id_edit">Khóa học <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('khoahoc_id_edit') is-invalid @enderror" id="khoahoc_id_edit" name="khoahoc_id_edit" required>
                <option value="">-- Chọn --</option>
                @foreach($khoahoc as $value)
                  <option value="{{ $value->id }}">{{ $value->tenkhoahoc }} </option>
                @endforeach
              </select>
              @error('khoahoc_id_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="nganhhoc_id_edit">Ngành học <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('nganhhoc_id_edit') is-invalid @enderror" id="nganhhoc_id_edit" name="nganhhoc_id_edit" required>
                <option value="">-- Chọn --</option>
                @foreach($nganhhoc as $value)
                  <option value="{{ $value->id }}">{{ $value->tennganhhoc }}</option>
                @endforeach
              </select>
              @error('nganhhoc_id_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>


            <div class="form-group">
              <label for="malophoc_edit">Ma lớp học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('malophoc_edit') is-invalid @enderror" id="malophoc_edit" name="malophoc_edit" value="{{ old('malophoc_edit') }}" required />
              @error('malophoc_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tenlophoc_edit">Tên lớp học <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tenlophoc_edit') is-invalid @enderror" id="tenlophoc_edit" name="tenlophoc_edit" value="{{ old('tenlophoc_edit') }}" required />
              @error('tenlophoc_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

          
            <div class="form-group">
              <label for="covanhoctap_edit">Cố vấn học tập <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('covanhoctap_edit') is-invalid @enderror" id="covanhoctap_edit" name="covanhoctap_edit" required>
                <option value="">-- Chọn --</option>
                @foreach($giangvien as $value)
                  <option value="{{ $value->id }}">{{ $value->tengiangvien }}</option>
                @endforeach
              </select>
              @error('covanhoctap_edit')
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

  <form action="{{ route('admin.lophoc.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="id_delete" name="id_delete" value="" />
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Xóa lớp học</h5>
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
    function getCapNhat(id, khoahoc_id, nganhhoc_id, malophoc, tenlophoc, covanhoctap,ghichu) {
      $('#id_edit').val(id);
      $('#khoahoc_id_edit').val(khoahoc_id);
      $('#nganhhoc_id_edit').val(nganhhoc_id);
      $('#malophoc_edit').val(malophoc);
      $('#tenlophoc_edit').val(tenlophoc);
       $('#covanhoctap_edit').val(covanhoctap);
      $('#ghichu_edit').val(ghichu);
    }
    
    function getXoa(id) {
      $('#id_delete').val(id);
    }
    
    @if($errors->has('khoahoc_id') || $errors->has('nganhhoc_id') || $errors->has('malophoc') || $errors->has('tenlophoc') || $errors->has('covanhoctap'))
      $('#addModal').modal('show');
    @endif
    
    @if($errors->has('khoahoc_id_edit') || $errors->has('nganhhoc_id_edit') || $errors->has('malophoc_edit') || $errors->has('tenlophoc_edit') || $errors->has('covanhoctap_edit'))
      $('#editModal').modal('show');
    @endif
  </script>

  <script>
    $(function () {
      $('.select2').select2()
    });
  </script>

@endsection