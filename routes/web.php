<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

// Home route (optional)
Route::get('/', function () {
    return redirect('/colleges');
});

// Resourceful routes for Colleges and Students
Route::resource('colleges', CollegeController::class);
Route::resource('students', StudentController::class);
