<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    //
    public function index()
    {
        $job = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $job
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
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
    }

    public function edit(Job $job)
    {



        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request()->validate(
            [
                'title' => ['required', 'min:3'],
                'salary' => ['required'],
            ]
        );
        // Authorise
        //update the job
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
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');


        return view('jobs.show', ['job' => $job]);
    }
}
