<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginForm() {
        return view('admin-login'); // show login form
    }

    public function login(Request $request) {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['is_admin' => true, 'admin_name' => $admin->name]);
            return redirect('/admin');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout() {
        session()->forget(['is_admin', 'admin_name']);
        return redirect('/');
    }
}