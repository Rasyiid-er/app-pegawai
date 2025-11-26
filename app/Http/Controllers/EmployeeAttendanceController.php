<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $employeeId = session('employee_id');
        if (!$employeeId) {
            return redirect()->route('employee.login');
        }

        $attendances = Attendance::where('karyawan_id', $employeeId)->orderBy('tanggal', 'desc')->get();
        return view('attendance.employee_dashboard', compact('attendances'));
    }

    public function checkIn(Request $request)
    {
        $employeeId = session('employee_id');
        if (!$employeeId) {
            return redirect()->route('employee.login');
        }

        $today = Carbon::today()->toDateString();
        $existing = Attendance::where('karyawan_id', $employeeId)->where('tanggal', $today)->first();
        if ($existing && $existing->waktu_masuk) {
            return back()->with('error', 'You already checked in today.');
        }

        Attendance::create([
            'karyawan_id' => $employeeId,
            'tanggal' => $today,
            'waktu_masuk' => Carbon::now()->format('H:i:s'),
            'waktu_keluar' => null,
            'status_absensi' => 'hadir',
        ]);

        return back()->with('success', 'Checked in successfully.');
    }

    public function checkOut(Request $request)
    {
        $employeeId = session('employee_id');
        if (!$employeeId) {
            return redirect()->route('employee.login');
        }

        $today = Carbon::today()->toDateString();
        $attendance = Attendance::where('karyawan_id', $employeeId)->where('tanggal', $today)->first();
        if (!$attendance || $attendance->waktu_keluar) {
            return back()->with('error', 'No open attendance to check out.');
        }

        $attendance->update(['waktu_keluar' => Carbon::now()->format('H:i:s')]);
        return back()->with('success', 'Checked out successfully.');
    }
}
