<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LoginController extends Controller
{
    public function index()
    {
    	if (!Auth::check()) {
            return view('backend/login/index');
        }
        elseif (Auth::check()) {
            $user = Auth::user();
            if ($user['permission'] == 2) {
                    Auth::logout();
                    Session::flash('level', 'You are not Admin');
                    return view('backend/login/index');
                }
            return view('/backend/home');

        } 
    }

    public function check(Request $request)
    {

    	$rules = [
        'email' =>'required|email',
        'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            Session::flash('note', 'Dang Nhap Khong Thanh Cong !');
            return redirect('/admin/login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email'   => $email, 'password' => $password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                return redirect('/admin');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('/admin/login');
            }
        }
    	
    }
    public function logout()
    {
    	Auth::logout();
    	
    	return redirect('/admin/login');
    }
}
