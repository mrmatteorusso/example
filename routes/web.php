<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {


    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs', [
        'jobs' => Job::all()
    ]);
});


Route::get('/jobs/{id}', function ($id) {

    // $job = \Illuminate\support\Arr::first($jobs, fn($job) => $job['id'] == $id);
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::fallback(
    function () {
        return response()->view('errors.404', ['message' => 'wrong subroute!'], 404);
    }
);
