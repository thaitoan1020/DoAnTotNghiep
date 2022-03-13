@extends('layouts.log')

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Đại học An Giang</b></a>
    </div>
    <div class="card-body">
     <!--  <p class="login-box-msg">Sign in to start your session</p> -->

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control {{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Tên đang nhập/ email" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
           @if ($errors->has('email') || $errors->has('username'))
            <span class="invalid-feedback" role="alert"><strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong></span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
              <label for="remember">
                Nhớ tài khoản
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Email AGU
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Quên mật khẩu</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Tạo tài khoản</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection
    