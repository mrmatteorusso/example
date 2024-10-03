<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

use function Pest\Laravel\delete;

//#1
// Route::controller(JobController::class)->group(function () {


//     Route::view('/', 'home');

//     //Index
//     Route::get('/jobs', [JobController::class, 'index']);

//     //Create
//     Route::get('/jobs/create', [JobController::class, 'create']);

//     //Show
//     Route::get('/jobs/{job}', [JobController::class, 'show']);

//     //Store
//     Route::post('/jobs', [JobController::class, 'store']);


//     //Edit
//     Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);


//     //Update
//     Route::patch('/jobs/{job}', [JobController::class, 'update']);


//     //Destroy
//     Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//     Route::view('/', 'contacts');
// });


//#2
Route::view('/', 'home');

//Index
Route::get('/jobs', [JobController::class, 'index']);

//Create
Route::get('/jobs/create', [JobController::class, 'create']);

//Show
Route::get('/jobs/{job}', [JobController::class, 'show']);

//Store
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');


//Edit
//Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit-job', 'job');


//Update
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->can('edit-job', 'job');;


//Destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit-job', 'job');;

Route::view('/', 'contacts');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');

Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
//#3
//Route::resource('jobs', JobController::class);

Route::fallback(
    function () {
        return response()->view('errors.404', ['message' => 'wrong subroute!'], 404);
    }
);
