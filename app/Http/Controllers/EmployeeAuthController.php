<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('employee_auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $login = EmployeeLogin::where('username', $data['username'])->first();
        if ($login && Hash::check($data['password'], $login->password)) {
            // set employee session
            session()->regenerate();
            session(['employee_id' => $login->employee_id]);
            return redirect()->route('employee.attendance.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function showRegister()
    {
        // Get employees who don't have login accounts yet
        $existingLogins = EmployeeLogin::pluck('employee_id')->toArray();
        $employees = Employee::whereNotNull('nama_lengkap')
            ->whereNotIn('id', $existingLogins)
            ->get(['id', 'nama_lengkap']);
        return view('employee_auth.register', compact('employees'));
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id|unique:employee_logins,employee_id',
            'username' => 'required|string|unique:employee_logins,username',
            'password' => 'required|string|confirmed|min:6',
        ]);

        EmployeeLogin::create([
            'employee_id' => $data['employee_id'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/')->with('success', 'Akun berhasil dibuat! Sekarang Anda bisa melakukan absensi dengan username dan password yang telah dibuat.');
    }

    public function logout()
    {
        session()->forget('employee_id');
        session()->regenerate();
        return redirect()->route('employee.login');
    }
}
