<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\syllabus;
use App\Model\Cource;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('admin_view.syllabus_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result= Cource::get();
       return view('admin_view/add_syllabus',compact('result')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = [
            'cource_id' =>  $request->cource_id,
            'name' =>  $request->name,
            
             ];

        syllabus::insert($array);
        return redirect('syllabus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $result = syllabus::where('id','=',$id)
                ->first();
        return view('admin_view/syllabus',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cource= Cource::get();
        $result = syllabus::where('id','=',$id)
                ->first();
        return view('admin_view/syllabus-edit',compact('result','cource'));
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
            'name' =>  $request->name,
            
             ];
        syllabus::where('id',$id)
            ->update($array);
        return redirect('syllabus');
   
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

        $deleted = syllabus::where('id',$id)
        ->delete();
        if($deleted){
            $responce['status'] = true;
        }
        return  $responce;
    }
    
public function ajax(Request $request)
    {
        $responce = syllabus::leftJoin('cources','cources.id','syllabus.cource_id')
                    ->select('syllabus.*','cources.name as cources_name')
                    ->get();

        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->cources_name,
                $value->name,
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="syllabus-edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
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

}

