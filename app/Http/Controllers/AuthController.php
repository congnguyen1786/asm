<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function login()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }
    
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }

    // Hiển thị form đăng ký
    public function register()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Tạo tài khoản mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Gửi email chào mừng
        Mail::to($user->email)->send(new WelcomeMail($user));

        return redirect()->route('auth.login')->with('success', 'Đăng ký thành công! Vui lòng kiểm tra email của bạn.');
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/dang-nhap')->with('success', 'Bạn đã đăng xuất thành công.');
    }
}
