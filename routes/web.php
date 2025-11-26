<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\PublicAttendanceController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\EmployeeAttendanceController;
use Illuminate\Support\Facades\Route;

// Public landing page
Route::get('/', function () {
    return view('welcome');
});

// Public attendance routes (no login required, just username/password check)
Route::post('/attendance/check-in', [PublicAttendanceController::class, 'checkIn'])->name('attendance.checkin.public');
Route::post('/attendance/check-out', [PublicAttendanceController::class, 'checkOut'])->name('attendance.checkout.public');

// Employee registration (public access to register new employee account)
Route::get('employee/register', [EmployeeAuthController::class, 'showRegister'])->name('employee.register');
Route::post('employee/register', [EmployeeAuthController::class, 'register'])->name('employee.register.post');

// Admin authentication
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin-only routes (protected with auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('salaries', SalaryController::class);
});

// Employee-facing auth for attendance (session-based) - Old routes kept for compatibility
Route::get('employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
Route::post('employee/login', [EmployeeAuthController::class, 'login'])->name('employee.login.post');
Route::post('employee/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');

// Employee attendance dashboard and actions (uses session employee_id)
Route::get('employee/attendance', [EmployeeAttendanceController::class, 'index'])->name('employee.attendance.dashboard');
Route::post('employee/attendance/checkin', [EmployeeAttendanceController::class, 'checkIn'])->name('employee.attendance.checkin');
Route::post('employee/attendance/checkout', [EmployeeAttendanceController::class, 'checkOut'])->name('employee.attendance.checkout');