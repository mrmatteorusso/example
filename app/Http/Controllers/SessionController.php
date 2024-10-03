<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        //validate
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);


        if (! Auth::attempt($attributes)) {
            return back()->withErrors([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }

        request()->session()->regenerate();

        // Redirect to intended page
        return redirect('/jobs');
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
