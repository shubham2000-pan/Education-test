<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use response;
use DB;
use File;
use App\Model\Notes;
use App\Model\Cource;
use App\Model\syllabus;
use App\Model\Teacher;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               
        return view('admin_view/notes_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher= Teacher::get();
        $cource= Cource::get();
        $syllabus= syllabus::get();
        return view('admin_view/note',compact('teacher','cource','syllabus'));
    }

    /**created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            $destinationPath = public_path( 'images/notes/images' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $image = $request['image'];
                $extension = $image->getClientOriginalExtension(); 
                $fileName = time().'.'.$extension; 
                $image->move($destinationPath, $fileName);
            }else{
                $fileName = Null;
            }

            if($request->hasfile('video')){
            $destinationPath = public_path( 'images/notes/video' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $video = $request['video'];
                $extension = $video->getClientOriginalExtension(); 
                $fileName2 = time().'.'.$extension; 
                $video->move($destinationPath, $fileName2);
            }else{
                $fileName2 = Null;
            }

        $array = [
            'cource_id' =>  $request->cource_id,
            'syllabus_id' =>  $request->syllabus_id,
            'name' =>  $request->name,
            'description' =>  $request->description,
            'image' => $fileName,
            'video' => $fileName2,
            'added_by' =>  $request->added_by,

            

             ];

        Notes::insert($array);
        return redirect('notes_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $responce = Notes::leftJoin('cources','cources.id','notes.cource_id')
                    ->select('notes.*','cources.name as cources_name' )
                    ->get();

        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->cources_name,
                getsyllabus($value->syllabus_id),
                $value->name,
                $value->description,
                getaddedby($value->added_by),
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="notes-edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
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
        $teacher= Teacher::get();
        $cource= Cource::get();
        $syllabus= syllabus::get();
        $result = Notes::where('id','=',$id)
                ->first();
        return view('admin_view/notes-edit',compact('result','teacher','cource','syllabus'));
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
             'cource_id' =>  $request->cource_id,
            'syllabus_id' =>  $request->syllabus_id,
            'name' =>  $request->name,
            'description' =>  $request->description,
            'added_by' =>  $request->added_by,
            
             ];
        Notes::where('id',$id)
            ->update($array);
        return redirect('notes_list');
   
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

        $deleted =  Notes::where('id',$id)
        ->delete();
         if($deleted){
            $responce['status'] = true;
        }
        return  $responce;
    }



   public function courceselect (Request $request)
   {

    $data['syllabus'] = syllabus::where("cource_id",$request->cource_id)->get(["name", "id"]);
        return response()->json($data);    
   }
}
