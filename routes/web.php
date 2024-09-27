<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

use function Pest\Laravel\delete;

Route::get('/', function () {


    return view('home');
});

Route::get('/jobs', function () {
    $job = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $job
    ]);
});


Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {

    // $job = \Illuminate\support\Arr::first($jobs, fn($job) => $job['id'] == $id);
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    request()->validate(
        [
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]
    );

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
    return redirect('/jobs');
});


Route::get('/jobs/{id}/edit', function ($id) {

    // $job = \Illuminate\support\Arr::first($jobs, fn($job) => $job['id'] == $id);
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

Route::patch('/jobs/{id}', function ($id) {

    // $job = \Illuminate\support\Arr::first($jobs, fn($job) => $job['id'] == $id);

    //Validate
    request()->validate(
        [
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]
    );
    // Authorise
    //update the job
    $job = Job::findOrFail($id);
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();
    $job->update(
        [

            'title' => request('title'),
            'salary' => request('salary'),
        ]
    );
    //and persist
    //redirect to the job page
    return redirect('/jobs/' . $job->id);
});

Route::delete('/jobs/{id}', function ($id) {

    // $job = \Illuminate\support\Arr::first($jobs, fn($job) => $job['id'] == $id);
    // Authorise
    $job = Job::findOrFail($id);
    $job->delete();
    return redirect('/jobs');


    return view('jobs.show', ['job' => $job]);
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::fallback(
    function () {
        return response()->view('errors.404', ['message' => 'wrong subroute!'], 404);
    }
);
