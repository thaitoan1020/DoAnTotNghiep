@extends('layouts.admin')

@section('title')
  Trang Admin
@endsection
@section('css')
  <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme.min.css') }}" data-skin="default" />
@endsection

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>TRANG ADMIN</h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="metric-row">
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="card-metric">
                <a href=" {{ route('admin.hocphan') }}" class="metric">
                  <p class="metric-value h3">
                    <sub><i class="fal fa-2x fa-desktop"></i></sub>
                  </p>
                  <h2 class="metric-label">Học phần</h2>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="card-metric">
                <a href=" {{ route('admin.ctdt_hocphan',['id'=>-1]) }}" class="metric">
                  <p class="metric-value h3">
                    <sub><i class="fal fa-2x fa-desktop"></i></sub>
                  </p>
                  <h2 class="metric-label">Chương trình đào tạo</h2>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="card-metric">
                <a href=" {{ route('admin.ctdt_hocphan_khoikienthuc') }}" class="metric">
                  <p class="metric-value h3">
                    <sub><i class="fal fa-2x fa-desktop"></i></sub>
                  </p>
                  <h2 class="metric-label">CTĐT theo khối kiên thức</h2>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="card-metric">
                <a href=" {{ route('admin.ctdt_hocphan_hocky') }}" class="metric">
                  <p class="metric-value h3">
                    <sub><i class="fal fa-2x fa-desktop"></i></sub>
                  </p>
                  <h2 class="metric-label">CTĐT theo học kỳ</h2>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="card-metric">
                <a href="{{ route('admin.giangvien') }}" class="metric">
                  <p class="metric-value h3">
                    <sub><i class="fal fa-2x fa-desktop"></i></sub>
                  </p>
                  <h2 class="metric-label">Danh sách giảng viên</h2>
                </a>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="card-metric">
                <a href="{{ route('admin.nhomgiangvien') }}" class="metric">
                  <p class="metric-value h3">
                    <sub><i class="fal fa-2x fa-desktop"></i></sub>
                  </p>
                  <h2 class="metric-label">Danh sách nhóm giảng viên</h2>
                </a>
              </div>
            </div>
            

          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
    