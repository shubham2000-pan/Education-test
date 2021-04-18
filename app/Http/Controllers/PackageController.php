<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Model\Package;
use App\Model\Cource;
use App\Model\fees_type;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin_view.package_list');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $result= Cource::get();
      $fees_type= fees_type::get();
       return view('admin_view/add_package',compact('result','fees_type'));
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
            $destinationPath = public_path( 'images/package' );
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
            'cource_id' =>  $request->cource_id,
            'name' =>  $request->name,
            'description' => $request->description,
            'price' =>  $request->price,
            'price_type' =>  $request->price_type,
            'image' => $fileName,
            ]; 
            
            
       Package::insert($array);
        return redirect('add_package');
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $responce = Package::leftJoin('cources','cources.id','package.cource_id')
                    ->select('package.*','cources.name as cources_name')
                    ->get();
        $totalResult = count($responce);

        $result = [];

        foreach ($responce as $key => $value) {
            $currentAry = [
                $value->id,
                $value->cources_name,
                $value->name,
                $value->description,
                $value->price,
                getfeestype($value->price_type),
               '<img src="'. asset('/images/package/'.$value->image).'"  style="height:30px">',
               '<button class="btn btn-success btn-sm" style="background:white; border-radius:22px;"><a href="package_edit/'.$value->id.'"><i class="fas fa-edit"></i></a></button> <button class="btn btn-danger btn-sm" style="background:white; border-radius:22px;"><a href="#" class="delete-data" data-id="'.$value->id.'"><i class="fas fa-trash"></i></a></button>',
               
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
       $result = Package::where('id','=',$id)
                ->first();
        return view('admin_view/package_edit',compact('result'));   
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
            'description' => $request->description,
            'price' =>  $request->price,
            'price_type' =>  $request->price_type,
            
             ];
        Package::where('id',$id)
            ->update($array);
        return redirect('package_list');  }

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

        $deleted = Package::where('id',$id)
        ->delete();
        if($deleted){
            $responce['status'] = true;
        }
        return  $responce;
    }
}
