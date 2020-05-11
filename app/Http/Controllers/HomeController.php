<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin='ghassengharsseloui@gmail.com';
        $user_id=auth()->user()->id;
        $all=Book::all();
        if(auth()->user()->email==$admin){

            return view('home')->with('books',$all);
        }
        $user=User::find($user_id);
        return view('home')->with('books',$user->book);
    }
}
