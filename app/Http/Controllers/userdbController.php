<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userdbController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin='ghassengharsseloui@gmail.com';
        if(auth()->user()->email==$admin){
        
        $users=User::all();
        return view('admin.index')->with('users',$users);
        }
        return redirect('book')->with('error', 'access denied');

    }

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $admin='ghassengharsseloui@gmail.com';
        if(auth()->user()->email==$admin){
        $user=User::find($id);
       if ($user->email!=$admin){
        $user->delete();
       return redirect('/user')->with('success','book removed by admin');
       }
       return redirect('/user')->with('error','you cant remove admin ');
    }
         return redirect('book')->with('error', 'access denied');
}


}
