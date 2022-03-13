@extends('layouts.manager')

@section('title')
  Giảng viên
@endsection

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <a href="{{ route('manager.giangvien') }}" style=" color: black;">
              <h5>Danh sách giảng viên</h5>
            </a>
          </div>
          <div class="col-sm-9">
            <div class="row mb-2 " >
              <div class="col-sm-9">
                
              </div>
              <div class="col-sm-3">
                
              
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