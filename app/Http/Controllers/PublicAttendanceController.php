<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\EmployeeLogin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PublicAttendanceController extends Controller
{
    public function checkIn(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Find employee by username
        $employeeLogin = EmployeeLogin::where('username', $request->username)->first();

        if (!$employeeLogin || !Hash::check($request->password, $employeeLogin->password)) {
            return back()->with('error', 'Username atau password salah!');
        }

        // Check if already checked in today
        $today = Carbon::today();
        $existingAttendance = Attendance::where('karyawan_id', $employeeLogin->employee_id)
            ->whereDate('tanggal', $today)
            ->first();

        if ($existingAttendance) {
            return back()->with('error', 'Anda sudah absen masuk hari ini!');
        }

        // Create new attendance record
        Attendance::create([
            'karyawan_id' => $employeeLogin->employee_id,
            'tanggal' => $today,
            'waktu_masuk' => Carbon::now(),
            'status' => 'hadir'
        ]);

        return back()->with('success', 'Absen masuk berhasil dicatat!');
    }

    public function checkOut(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Find employee by username
        $employeeLogin = EmployeeLogin::where('username', $request->username)->first();

        if (!$employeeLogin || !Hash::check($request->password, $employeeLogin->password)) {
            return back()->with('error', 'Username atau password salah!');
        }

        // Find today's attendance
        $today = Carbon::today();
        $attendance = Attendance::where('karyawan_id', $employeeLogin->employee_id)
            ->whereDate('tanggal', $today)
            ->first();

        if (!$attendance) {
            return back()->with('error', 'Anda belum absen masuk hari ini!');
        }

        if ($attendance->waktu_keluar) {
            return back()->with('error', 'Anda sudah absen keluar hari ini!');
        }

        // Update attendance with check-out time
        $attendance->update([
            'waktu_keluar' => Carbon::now()
        ]);

        return back()->with('success', 'Absen keluar berhasil dicatat!');
    }
}
