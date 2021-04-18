<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

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
            if(Auth::user()->role == 2){
             return redirect('admin');
        }else{
            if(!empty(Session::get('last_url'))){
                return redirect(Session::get('last_url'));
            }else{
                Session::put('last_url','');
                return redirect('user');
            }
        }
    }
}
