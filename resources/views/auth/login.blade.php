@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="h5 fw-bold mb-0">Chào mừng trở lại</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('auth.postLogin') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                            <label for="password">Mật khẩu</label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                            <a href="#" class="text-decoration-none text-primary small">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Đăng nhập</button>
                    </form>
                    <p class="text-center mt-4 mb-0">
                        Chưa có tài khoản? <a href="{{ route('auth.register') }}" class="text-primary fw-bold">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
