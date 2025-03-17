<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

// Redirect the root URL to the colleges index page
Route::get('/', function () {
    return redirect('/colleges');
});

// Routes for CollegeController
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index'); // List all colleges
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create'); // Show form to create college
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store'); // Store new college
Route::get('/colleges/{college}/edit', [CollegeController::class, 'edit'])->name('colleges.edit'); // Edit college
Route::put('/colleges/{college}', [CollegeController::class, 'update'])->name('colleges.update'); // Update college
Route::delete('/colleges/{college}', [CollegeController::class, 'destroy'])->name('colleges.destroy'); // Delete college

// Routes for StudentController
Route::get('/students', [StudentController::class, 'index'])->name('students.index'); // List all students (with filtering by college)
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create'); // Show form to create student
Route::post('/students', [StudentController::class, 'store'])->name('students.store'); // Store new student
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit'); // Edit student
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update'); // Update student
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy'); // Delete student
