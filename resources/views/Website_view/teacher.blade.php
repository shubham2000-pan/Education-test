@extends('layout.website.app')

@section('internal_css')
    
  
@endsection

@section('content')
 
<!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(style/images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Teachers</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            
           <div class="row">
            @foreach ($result as $key => $value) 
               <div class="col-lg-3 col-sm-6">
                   <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="{{ asset('/images/teacher/'.$value->image)}}" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="{{url('teacher/'.$value->id)}}"><h6>{{$value->name}}</h6></a>
                            <span>{{$value->position}}</span>
                        </div>
                    </div> <!-- singel teachers -->
               </div>
               @endforeach
           </div>
           
       </div>
   </section>

@endsection