<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FeestypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_view/feestype_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_view/add_feestype');
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
            'name' =>  $request->name,
            'amount' =>  $request->amount,
            
             ];

        DB::table('fees_types')->insert($array);
        return redirect('feestype_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $responce =DB::table('fees_types')->get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->name,
                $value->amount,
                
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="feestype_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
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
        $result = DB::table('fees_types')->where('id','=',$id)
                ->first();
        return view('admin_view/feestype_edit',compact('result'));    
        
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
            'amount' => $request->amount,
            
             ];
       DB::table('fees_types')->where('id',$id)
            ->update($array);
        return redirect('feestype_list');
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

        $deleted = DB::table('fees_types')
                    ->where('id',$id)
                    ->delete();
        if($deleted){
            $responce['status'] = true;
        }
        return  $responce;
    }
}
