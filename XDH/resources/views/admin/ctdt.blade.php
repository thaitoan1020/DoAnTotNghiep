@extends('layouts.admin')

@section('title')
  Chương trình đào tạo
@endsection

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <a href="{{ route('admin.ctdt') }}" style=" color: black;">
              <h5>Danh sách chương trình đào tạo</h5>
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
                <h3 class="card-title">Danh sách chương trình đào tạo</h3>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 100%;">
                <table id="TableTimKiem" class="table table-head-fixed text-nowrap" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 2%">#</th>
                      <th style="width: 10%">Tên ngành hoc</th>
                      <th style="width: 10%">Tên bộ môn</th>
                      <th style="width: 10%">Tên khoa</th>
                      <th style="width: 10%">Mã chương trình đào tạo</th>
                      <th style="width: 13%">Tên chương trình đào tạo</th>
                      <th style="width: 5%">Tổng số tính chỉ</th>
                      <th style="width: 5%">Trạng thái</th>
                      <th style="width: 20%">Ghi chú</th>
                      <th style="width:  5%">Sửa</th>
                      <th style="width:  5%">Xóa</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($ctdt as $value)
                    @php
                      $editLink = "getCapNhat(" . $value->id . ", '" . $value->nganhhoc_id . "', '" . $value->bomon_id . "', '" . $value->khoa_id . "', '" . $value->mactdt . "', '" . $value->tenctdt . "', '" . $value->tongsotinchi . "', '" . $value->trangthai . "', '" . $value->ghichu . "'); return false;";
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $value->nganhhoc->tennganhhoc }}</td>
                      <td>{{ $value->bomon->tenbomon }}</td>
                      <td>{{ $value->khoa->tenkhoa }}</td>
                      <td>{{ $value->mactdt }}</td>
                      <td>{{ $value->tenctdt }}</td>
                      <td>{{ $value->tongsotinchi }}</td>

                      <td>
                          @if($value->trangthai == 0 )
                              Chưa áp dụng
                          
                          @else
                              Đang áp dụng
                          @endif                                  
                      </td>

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
            </div>
          </div>
        </div>     
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <form action="{{ route('admin.ctdt.them') }}" method="post">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Thêm chương trình đào tạo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">

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
              <label for="khoa_id">Khóa học <abbr title="Bắt buộc nhập">*</abbr></label>
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
              <label for="mactdt"> Mã chương trình đào tạo <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('mactdt') is-invalid @enderror" id="mactdt" name="mactdt" value="{{ old('mactdt') }}" required />
              @error('mactdt')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tenctdt">Tên chương trình đào tạo <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tenctdt') is-invalid @enderror" id="tenctdt" name="tenctdt" value="{{ old('tenctdt') }}" required />
              @error('tenctdt')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tongsotinchi">Tổng số tín chỉ <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tongsotinchi') is-invalid @enderror" id="tongsotinchi" name="tongsotinchi" value="{{ old('tongsotinchi') }}" required />
              @error('tongsotinchi')
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

  <form action="{{ route('admin.ctdt.sua') }}" method="post">
    @csrf
    <input type="hidden" id="id_edit" name="id_edit" value="" />
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Cập nhật chương trình đào tạo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
          </div>
          <div class="modal-body">

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
              <label for="bomon_id_edit">Bộ môns <abbr title="Bắt buộc nhập">*</abbr></label>
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
              <label for="khoa_id_edit">Khóa <abbr title="Bắt buộc nhập">*</abbr></label>
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
              <label for="mactdt_edit">Ma chương trình đào tạo <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('mactdt_edit') is-invalid @enderror" id="mactdt_edit" name="mactdt_edit" value="{{ old('mactdt_edit') }}" required />
              @error('mactdt_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tenctdt_edit">Tên chương trình đào tạo <abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tenctdt_edit') is-invalid @enderror" id="tenctdt_edit" name="tenctdt_edit" value="{{ old('tenctdt_edit') }}" required />
              @error('tenctdt_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="tongsotinchi_edit">Tổng số tín chỉ<abbr title="Bắt buộc nhập">*</abbr></label>
              <input type="text" class="form-control @error('tongsotinchi_edit') is-invalid @enderror" id="tongsotinchi_edit" name="tongsotinchi_edit" value="{{ old('tongsotinchi_edit') }}" required />
              @error('tongsotinchi_edit')
                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
              @enderror
            </div>

            <div class="form-group">
              <label for="trangthai_edit">Trang thái <abbr title="Bắt buộc nhập">*</abbr></label>
              <select class="custom-select @error('trangthai_edit') is-invalid @enderror" id="trangthai_edit" name="trangthai_edit" required>
                <option value="">-- Chọn --</option>
                <option value="1">Đang áp dụng</option>
                <option value="0">Chưa áp dụng</option>
              </select>
              @error('trangthai_edit')
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

  <form action="{{ route('admin.ctdt.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="id_delete" name="id_delete" value="" />
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Xóa chương trình đào tạo</h5>
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
    function getCapNhat(id, nganhhoc_id, bomon_id, khoa_id, mactdt, tenctdt, tongsotinchi, trangthai, ghichu) {
      $('#id_edit').val(id);
      $('#nganhhoc_id_edit').val(nganhhoc_id);
      $('#bomon_id_edit').val(bomon_id);
      $('#khoa_id_edit').val(khoa_id);
      $('#mactdt_edit').val(mactdt);
      $('#tenctdt_edit').val(tenctdt);
      $('#tongsotinchi_edit').val(tongsotinchi);
      $('#trangthai_edit').val(trangthai);
      $('#ghichu_edit').val(ghichu);
    }
    
    function getXoa(id) {
      $('#id_delete').val(id);
    }
    
    @if($errors->has('nganhhoc_id') || $errors->has('bomon_id') || $errors->has('khoa_id') || $errors->has('mactdt') || $errors->has('tenctdt') || $errors->has('tongsotinchi'))
      $('#addModal').modal('show');
    @endif
    
    @if($errors->has('nganhhoc_id_edit') || $errors->has('bomon_id_edit') || $errors->has('bomon_id_edit') || $errors->has('mactdt_edit') || $errors->has('tenctdt_edit') || $errors->has('tongsotinhchi_edit')|| $errors->has('trangthi_edit'))
      $('#editModal').modal('show');
    @endif
  </script>

  

@endsection