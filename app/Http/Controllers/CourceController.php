<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Model\Cource;
use File;

use App\Model\Teacher;
use App\Model\Event;
use App\Model\User;
use App\Model\syllabus;
use App\Model\Comment;
use App\Model\Teachercomment;
use Session;


class CourceController extends Controller
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
       return view('admin_view.cource_list');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function feestype()
    {
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = DB::table('teacher')->pluck('name','id');
        $fees_type = DB::table('fees_types')->pluck('name','id');
        return view('admin_view.cource',compact('fees_type','teacher'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

 $messages = [
            'name.required' => 'Please enter your name',
            'description.required' => 'Description is required',
              'description.max255' => 'Description is maximum 255 words', 
              'description.min50' => 'Description is maximum 255 words', 
        ];

        $validator = Validator::make( $request->all(), [
            'name'  => 'required',
            'description'    => 'required',
            'duration'    => 'required',
            'fees'    => 'required',
            'added_by'    => 'required',
            'fees_type'    => 'required',

        ], $messages );
        #return error if validation fail
        if ( $validator->fails() ) {
           // return Redirect::back()->withErrors($validator);
            return back()->withErrors($validator, 'errors')->withInput();
        }

        if($request->hasfile('image')){
            $destinationPath = public_path( 'images/cource' );
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

       $array = [
            'name' =>  $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'fees' => $request->fees,
            'added_by' => $request->added_by,
            'fees_type' => $request->fees_type,
             'image' => $fileName,
             ];

       Cource::insert($array);
        return redirect('cource-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $responce = Cource::get();       
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->name,
                $value->description,
                $value->duration,
                $value->fees,
                getfeestype($value->fees_type),
                getaddedby($value->added_by),
               '<button class="btn btn-success btn-sm" style="background:white; width: 100px; border-radius:22px;">
                    <a href="syllabus/'.$value->id .'">
                    <i class="fas fa-plus"></i>
                    </a>',
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="cource-edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
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
       $teacher = DB::table('teacher')->pluck('name','id');
        $fees_type = DB::table('fees_types')->pluck('name','id');
         $result = Cource::where('id','=',$id)
                ->first();
        return view('admin_view/cource-edit',compact('result','fees_type','teacher'));
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
        $messages = [
            'name.required' => 'Please enter your name',
            'description.required' => 'Description is required',
            
        ];

        $validator = Validator::make( $request->all(), [
            'name'  => 'required',
            'description'    => 'required',
            'duration'    => 'required',
            'fees'    => 'required',
            'added_by'    => 'required',
            'fees_type'    => 'required',

        ], $messages );

        #return error if validation fail
        if ( $validator->fails() ) {
           // return Redirect::back()->withErrors($validator);
            return back()->withErrors($validator, 'errors')->withInput();
        }

       $id = $request->id;
        $array = [
            'name' =>  $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'fees' => $request->fees,
            'added_by' => $request->added_by,
            'fees_type' => $request->fees_type,
             ];
        Cource::where('id',$id)
            ->update($array);
        return redirect('cource-list');
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

      $deleted =   Cource::where('id',$id)
                    ->delete();
        if($deleted){
            $responce['status'] = true;
        }
        return  $responce;
    
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cource()
    {
      $result= Cource::leftJoin('teacher','teacher.id','cources.added_by')
                    ->select('cources.*','teacher.image as img')
                    ->get();

        $rating=Comment::leftJoin('cources','cources.id','comments.cource_id')
                        ->select('cources.id','comments.rating','comments.cource_id')
                        ->count('cource_id');

        
        return view('website_view.cources',compact('result','rating')); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cource_deatails($id)
    {
        Session::put('last_url','cource_details/'.$id);
        Session::put('product_id',$id);

        $result= Cource::leftJoin('teacher','teacher.id','cources.added_by')
                    ->select('cources.*','teacher.image as img','teacher.position')
                    ->where('cources.id','=',$id)
                    ->first();
        if(!empty($result)){
            Session::put('product_price',$result->fees);
        }            
        $syllabus = syllabus::where('syllabus.cource_id','=',$id)
                         ->get(); 
        $count= syllabus::where('syllabus.cource_id','=',$id)
                         ->get()->count();  
        $comment=Comment::leftJoin('users','users.id','comments.user_id')
                        ->leftJoin('cources','cources.id','comments.cource_id')
                        ->select('comments.*','users.image as img','cources.id')
                        ->where('cources.id','=',$id)
                        ->get();
        return view('website_view.cource_details',compact('result','syllabus','count','comment'));
        
    }

}
