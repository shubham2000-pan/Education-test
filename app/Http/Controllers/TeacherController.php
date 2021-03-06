<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Model\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Model\Cource;

use App\Model\Event;
use App\Model\User;
use App\Model\syllabus;
use App\Model\Comment;
use App\Model\Teachercomment;
use Session;


class TeacherController extends Controller
{
      public function __construct()
    {
         Session::put('last_url','');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_view.teacher_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_view.add_teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            $destinationPath = public_path( 'images/teacher' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $image = $request['image'];
               // $title = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension(); 
                $fileName = time().'.'.$extension; 
                $image->move($destinationPath, $fileName);
            }else{
                $fileName = Null;
            }



        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';
        $array = [
            'name' =>  $request->name,
            'email' => $request->email,
            'contact' =>  $request->contact,
            'address' =>  $request->address,
            'about' =>  $request->about,
            'acchivments' =>  $request->acchivments,
            'objective' =>  $request->objective,
            'image' => $fileName,
            'position' => $request->position,
        ]; 
            
            
        
        $save= Teacher::insert($array);
        if($save){
            $responce['status'] = true;
             $responce['message'] = 'added successfully';
         }
       return  $responce;
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $responce = Teacher::get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->name,
                $value->email,
                $value->contact,
                $value->address,
                $value->position,
               '<img src="'. asset('/images/teacher/'.$value->image).'"  style="height:30px">',
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="teacher_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
            ];
            array_push($result, $currentAry);
        }

        $data['data']            = $result;
        $data['recordsTotal']    = $totalResult;
        $data['recordsFiltered'] = $totalResult;
        $data['draw']            = ! empty( $request['draw'] ) ? $request['draw'] : 1;

        echo json_encode( $data );
        exit;
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $result = Teacher::where('id','=',$id)
                ->first();
        return view('admin_view/teacher_edit',compact('result'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $array = [
             'name' =>  $request->name,
            'email' => $request->email,
            'contact' =>  $request->contact,
            'address' =>  $request->address,
            'about' =>  $request->about,
            'acchivments' =>  $request->acchivments,
            'objective' =>  $request->objective,
            'position' =>  $request->position,
             ];
       Teacher::where('id',$id)
            ->update($array);
        return redirect('teacher_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';

        $deleted = Teacher::where('id',$id)
        ->delete();
        if($deleted){
            $responce['status'] = true;
        }
        return  $responce;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function teacher()
    {
        $result = Teacher::get();
        return view('website_view.teacher',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teacher_detailes($id)
    {
        $cource= Cource::leftJoin('teacher','teacher.id','cources.added_by')
                        ->select('cources.*','teacher.image as img')
                        ->where('cources.added_by',$id)->get();
        $result = Teacher::where('id','=',$id)
                ->first();
        $comment=Teachercomment::leftJoin('users','users.id','teachercomments.user_id')
                    ->leftJoin('teacher','teacher.id','teachercomments.teacher_id')
                    ->select('teachercomments.*','users.image as img','teacher.id')
                    ->where('teacher.id','=',$id)
                    ->get();

        return view('website_view.teacher_detailes',compact('result','cource','comment'));
        
    }
}
