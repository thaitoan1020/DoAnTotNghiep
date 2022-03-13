@extends('layouts.user')

@section('title')
  Đổi mật khẩu
@endsection

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>ĐỔI MẬT KHẨU</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
      <div class="page-section">
        <div class="card card-fluid">
          <div class="card-body">
            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
                <span class="font-weight-bold text-primary"><i class="fa fa-check-circle"></i> {{ session('success') }}</span>
              </div>
            @endif
            @if(session('warning'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
                <span class="font-weight-bold text-danger"><i class="fa fa-exclamation-triangle"></i> {{ session('warning') }}</span>
              </div>
            @endif
            <form role="form" method="post" action="{{ route('user.doimatkhau') }}">
              @csrf
              <div class="form-group">
                <label for="old_password">Mật khẩu cũ <abbr title="Bắt buộc nhập">*</abbr></label>
                <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" required />
                @error('old_password')
                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
              </div>
              <div class="form-group">
                <label for="new_password">Mật khẩu mới <abbr title="Bắt buộc nhập">*</abbr></label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required />
                @error('new_password')
                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
              </div>
              <div class="form-group">
                <label for="new_password_confirmation">Xác nhận mật khẩu mới <abbr title="Bắt buộc nhập">*</abbr></label>
                <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" required />
                @error('new_password_confirmation')
                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Đổi mật khẩu</button>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
    