@extends('layouts.manager')

@section('title')
    Nhóm giảng viên
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a href="{{ route('manager.nhomgiangvien') }}" style=" color: black;">
                        <h5>Danh sách nhóm giảng viên</h5>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="row mb-2 ">
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
