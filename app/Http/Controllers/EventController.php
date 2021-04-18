<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_view.event_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_view.add_event');
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
            $destinationPath = public_path( 'images/Event' );
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
        
        if($request->hasfile('banner_image')){
            $destinationPath = public_path( 'images/Event/banner' );
            if ( ! File::exists( $destinationPath ) ) {
                File::makeDirectory( $destinationPath, 0777, true, true );
              }
             
                $banner_image = $request['banner_image'];
               // $title = $image->getClientOriginalName();
                $extension = $banner_image->getClientOriginalExtension(); 
                $filebanner = time().'.'.$extension; 
                $banner_image->move($destinationPath, $filebanner);
            }else{
                $filebanner = Null;
            }
        

        
        $array = [
            'name' =>  $request->name,
            'about' => $request->about,
            'heading' => $request->heading,
            'date' =>  $request->date,
            'start_time' =>  $request->start_time,
            'finish_time' =>  $request->finish_time,
            'address' =>  $request->address,
            'place' =>  $request->place,
            'image' => $fileName,
            'banner_image' => $filebanner,
            
        ]; 
            
            
        
         Event::insert($array);
       return  view('admin_view.event_list');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $responce = Event::get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->name,
                $value->heading,
                $value->date,
                $value->start_time,
                $value->finish_time,
                $value->address,
               '<img src="'. asset('/images/event/'.$value->image).'"  style="height:30px">',
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="event_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
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
        $result = Event::where('id','=',$id)
                ->first();
        return view('admin_view/event-edit',compact('result'));
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
        $responce['status'] = false;
        $responce['message'] = 'Something went wrong';

        $deleted = Event::where('id',$id)
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
    public function website()
    {
      $result= Event::get(); 
        return view('website_view.event',compact('result'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function event_deatiles($id)
    {
         $result = Event::where('id','=',$id)
                    ->first();
        return view('website_view.event_detailes',compact('result'));
    }


}
