<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //FETCH ALL USERS
        //$users = DB::select("select * from users where email=?",['ishanmadhawa44@gmail.com']);
    //INSERT USER
        //$users = DB::insert('insert into users (name,email,password) values (?, ?,?)', ['Sansala', 'sansala@gmail.com','$2y$10$6/DdgUI4E7te2w6RngKMJuvBp34znXM8KzB3htu9AKkamxUXI9u22']);
    //UPDATE
        //$users = DB::update("update users set name = 'sansala' where id = 2");
    //DELETE
        //$users = DB::delete("delete from users where id =2");
    dd($users);
    //return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
