<?php

use App\Http\Controllers\JobController;
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
Route::post('/jobs', [JobController::class, 'store']);


//Edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);


//Update
Route::patch('/jobs/{job}', [JobController::class, 'update']);


//Destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::view('/', 'contacts');



//#3
//Route::resource('jobs', JobController::class);

Route::fallback(
    function () {
        return response()->view('errors.404', ['message' => 'wrong subroute!'], 404);
    }
);
