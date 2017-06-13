<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {

    }

    public function create(){
        return view('sessions.login');

    }

    public function destroy(){
        auth()->logout();
        return redirect('/');

    }

    public function store(){

        // Attempt to authenticate user

        if(! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and resubmit'
            ]);
        }

        return redirect('/');
    }


}
