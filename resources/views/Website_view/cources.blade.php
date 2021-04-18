 
@extends('layout.website.app')

@section('internal_css')
  
  
@endsection

@section('content')

<!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(style/images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Our Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== COURSES PART START ======-->
    
    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item"></li>
                        </ul> <!-- nav -->
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row">
                        @foreach($result as $key=>$value)
                        <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="{{ asset('/images/cource/'.$value->image)}}" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span>{{ $value->fees }}</span>
                                    </div>
                                </div>
                                <div class="cont">

                                    <ul>

                                        @for($i=1;$i<=rating($value->id); $i++)
                                        <li><i class="fa fa-star"></i></li>
                                        @endfor
                                        
                                    </ul>
                                    <span>({{ Reviws($value->id) }} Reviws)</span><br>
                                    <a href="{{ url('/cource_details') }}/{{ $value->id }}"><h4>{{ $value->name }}</h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                           <img src="{{ asset('/images/teacher/'.$value->img)}}" alt="teacher">
                                        </div>
                                        <div class="name">
                                          <h6>{{ getaddedby($value->added_by) }}</h6>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                        @endforeach
            

                    </div> <!-- row -->
                </div>
                <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                    <div class="row">
                         @foreach($result as $key=>$value)
                        <div class="col-lg-12">
                            <div class="singel-course mt-30">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="{{ asset('/images/cource/'.$value->image)}}" alt="Course">
                                            </div>
                                            <div class="price">
                                                <span>{{ $value->fees }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                           
                                            <a href="{{ url('/cource_details') }}/{{ $value->id }}"><h4>{{ $value->name }}</h4></a>
                                            <div class="course-teacher">
                                                <div class="thum">
                                                    <img src="{{ asset('/images/teacher/'.$value->img)}}">
                                                </div>
                                                <div class="name">
                                                    <h6>{{ getaddedby($value->added_by) }}</h6>
                                                </div>
                                            <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                      @endforeach
   
                                </div> <!--  row  -->
                            </div> <!-- singel course -->
                        </div>
                             
                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            
        </div> <!-- container -->
    </section>
    
    <!--====== COURSES PART ENDS ======-->
   @endsection