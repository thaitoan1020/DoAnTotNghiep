@extends('layouts.user')

@section('title')
    Học phần Xem
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <a href="{{ route('user.hocphan.xem') }}" style=" color: black;">
              <h5>Học phần chi tiết</h5>
            </a> --}}
                </div>
                <div class="col-sm-6">
                    <div class="row mb-2 ">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">


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
                <div class="col-md-6" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: center;">Học phần chi tiết</h3>



                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-star-of-life"> Tên học phần</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tên học phần tiếng việt</td>
                                        <td>{{ $hocphan->tenhocphantiengviet }}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tên học phần tiếng anh</td>
                                        <td>{{ $hocphan->tenhocphantienganh }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-star-of-life"> Mã số học phần</td>
                                        <td>{{ $hocphan->mahocphan }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-star-of-life"> Thời điểm tiến hành</td>
                                         
                                            @if ($hocphan->hocky == 1)
                                        <td >I</td>
                                        @endif
                                        @if ($hocphan->hocky == 2)
                                            <td >Học kỳ III</td>
                                        @endif
                                        @if ($hocphan->hocky == 3)
                                            <td >Học kỳ III</td>
                                        @endif
                                        @if ($hocphan->hocky == 4)
                                            <td >Học kỳ IV</td>
                                        @endif
                                        @if ($hocphan->hocky == 5)
                                            <td >Học kỳ V</td>
                                        @endif
                                        @if ($hocphan->hocky == 6)
                                            <td >Học kỳ VI</td>
                                        @endif
                                        @if ($hocphan->hocky == 7)
                                            <td >Học kỳ VII</td>
                                        @endif
                                        @if ($hocphan->hocky == 8)
                                            <td >Học kỳ VII</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td> <i class="fa fa-star-of-life"> Loại học phần</td>
                                        <td>{{ $hocphan->loaihocphan->tenloaihocphan }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-star-of-life"> Thuộc khối kiên thức</td>
                                        <td>{{ $hocphan->khoikienthuc->tenkhoikienthuc }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-star-of-life"> Số tính chỉ</td>
                                        <td>{{ $hocphan->sotinchi }}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số tiết lý thuyết</td>
                                        <td>{{ $hocphan->sotietlythuyet }}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số thực hành</td>
                                        <td>{{ $hocphan->sotietthuchanh }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-star-of-life"> Điều kiện tham dự học phần</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Học phần tiên quyết</td>
                                        <td>{{ $hocphan->dkhocphantienquyet }}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Học phần sang hành</td>
                                        <td>{{ $hocphan->dkhocphansonghanh }}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều kiện khác</td>
                                        <td>{{ $hocphan->dkhocphanhoctruoc }}</td>
                                    </tr>
                                    @foreach ($giangvien as $value)
                                        <tr>
                                            <td><i class="fa fa-star-of-life"> Giảng viên phụ trách</td>
                                            <td>{{ $value->tengiangvien }}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khoa/Bộ môn</td>
                                            <td>Khoa {{ $value->khoa->tenkhoa }}, Bộ môn {{ $value->bomon->tenbomon }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
                                            <td>{{ $value->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại</td>
                                            <td>{{ $value->dienthoai }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <h6> &#42; MÔ TẢ HỌC PHẦN</h6>
                        <div class="mx-2">
                            @php echo $hocphan->mota; @endphp
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
@section('javascript')
    <script>
        $(function() {
            $('.select2').select2()
        });

    </script>

@endsection
