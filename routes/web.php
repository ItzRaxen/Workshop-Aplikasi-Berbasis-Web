<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController; // Pastikan ini ada

// 1. Resource Route (untuk Employee CRUD)
Route::resource('employees', EmployeeController::class);


// 2. Route untuk menu yang menunjuk ke file view BARU
// Route untuk Department
Route::get('/department', function () { 
    // Menunjuk ke resources/views/employees/department_index.blade.php
    return view('employees.department_index'); 
});

// Route untuk Attendance
Route::get('/attendance', function () {
    // Menunjuk ke resources/views/employees/attendance_index.blade.php
    return view('employees.attendance_index');
});

// Route untuk Report
Route::get('/report', function () {
    // Menunjuk ke resources/views/employees/report_index.blade.php
    return view('employees.report_index');
});

// Route untuk Settings
Route::get('/settings', function () {
    // Menunjuk ke resources/views/employees/settings_index.blade.php
    return view('employees.settings_index');
});