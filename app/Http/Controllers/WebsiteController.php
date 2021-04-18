<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cource;
use App\Model\Teacher;
use App\Model\Event;
use App\Model\User;
use App\Model\syllabus;
use App\Model\Comment;
use App\Model\Teachercomment;
use Session;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         Session::put('last_url','');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cource= Cource::count();
        $user= User::count();
        $event= Event::get();
        $teacher= Teacher::get();
        $count= Teacher::count();
        $result= Cource::leftJoin('teacher','teacher.id','cources.added_by')
                    ->select('cources.*','teacher.image as img','teacher.position')
                    ->get();
        $comment= Comment::get();
        return view('website_view.index',compact('result','teacher','event','cource','user','count','comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function about()
    {
        $cource= Cource::count();
        $user= User::count();
        $count= Teacher::count();
        return view('website_view.about',compact('cource','user','count'));
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
