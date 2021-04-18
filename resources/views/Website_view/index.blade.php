 
@extends('layout.website.app')

@section('internal_css')
    
  
@endsection

@section('content')
 <!--====== SLIDER PART START ======-->
    
   <section id="slider-part" class="slider-active">
        <div class="single-slider bg_cover pt-150" style="background-image: url(style/images/slider/s-3.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Education - Portal</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">An Educational Portal has been developed to address the needs of the educational community in the region and to foster the adoption of Information Society Technologies.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{ url('about')}}">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="{{ url('cource')}}">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
        
        <div class="single-slider bg_cover pt-150" style="background-image: url(style/images/slider/s-3.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Education - Portal</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">An Educational Portal has been developed to address the needs of the educational community in the region and to foster the adoption of Information Society Technologies.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{ url('about')}}">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="{{ url('cource')}}">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
        
        <div class="single-slider bg_cover pt-150" style="background-image: url(style/images/slider/s-3.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Education - Portal</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">An Educational Portal has been developed to address the needs of the educational community in the region and to foster the adoption of Information Society Technologies.</p>
                            <ul>
                               <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{ url('about')}}">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="{{ url('cource')}}">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- slider feature -->
        </div> <!-- container -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
    
    <!--====== CATEGORY PART START ======-->
    
    <section id="category-3" class="category-2-items pt-50 pb-80 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="singel-items text-center mt-30">
                        <div class="items-image">
                            <img src="style/images/category/ctg-1.jpg" alt="Category">
                        </div>
                        <div class="items-cont">
                            <a href="#">
                                <h5>App Design</h5>
                                <span>24 courses</span>
                            </a>
                        </div>
                    </div> <!-- singel items -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="singel-items text-center mt-30">
                        <div class="items-image">
                            <img src="style/images/category/ctg-1.jpg" alt="Category">
                        </div>
                        <div class="items-cont">
                            <a href="#">
                                <h5>UI/ UX Design</h5>
                                <span>103 courses</span>
                            </a>
                        </div>
                    </div> <!-- singel items -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="singel-items text-center mt-30">
                        <div class="items-image">
                            <img src="style/images/category/ctg-1.jpg" alt="Category">
                        </div>
                        <div class="items-cont">
                            <a href="#">
                                <h5>App development</h5>
                                <span>57 courses</span>
                            </a>
                        </div>
                    </div> <!-- singel items -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="singel-items text-center mt-30">
                        <div class="items-image">
                            <img src="style/images/category/ctg-1.jpg" alt="Category">
                        </div>
                        <div class="items-cont">
                            <a href="#">
                                <h5>Photography</h5>
                                <span>17 courses</span>
                            </a>
                        </div>
                    </div> <!-- singel items -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CATEGORY PART ENDS ======-->
    
    <!--====== COURSE PART START ======-->
    
    <section id="course-part" class="pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-45">
                        <h5>Our course</h5>
                        <h2>Featured courses </h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row course-slied mt-30">
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
            </div> <!-- course slied -->
        </div> <!-- container -->
    </div>

    </section>
    
    <!--====== COURSE PART ENDS ======-->
    
    <!--====== COUNTER PART START ======-->
    
    <div id="counter-part" class="bg_cover pt-25 pb-70 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter counter-3 text-center mt-40">
                        <span><span class="counter">{{ $user }}</span>+</span>
                        <p>Students enrolled</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter counter-3 text-center mt-40">
                        <span><span class="counter">{{ $cource }}</span>+</span>
                        <p>Courses Uploaded</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter counter-3 text-center mt-40">
                        <span><span class="counter">{{ $user }}</span>+</span>
                        <p>user ragister</p>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter counter-3 text-center mt-40">
                        <span><span class="counter">{{ $count}}</span>+</span>
                        <p>Global Teachers</p>
                    </div> <!-- singel counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    
    <!--====== COUNTER PART ENDS ======-->
    
    <!--====== EVENT 2 PART START ======-->
    
    <section id="event-part" class="pt-120 pb-120">
        <div class="container">
            <div class="event-bg bg_cover" style="background-image: url(style/images/bg-3.jpg)">
                <div class="row">
                    <div class="col-lg-5 offset-lg-6 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                        <div class="event-2 pt-90 pb-70">
                            <div class="event-title">
                                <h3>Upcoming events</h3>
                            </div> <!-- event title -->
                            <ul>
                               @foreach($event as $key=>$value)
                                <li>
                                    <div class="singel-event">
                                        <span><i class="fa fa-calendar"></i> {{ dateFormat($value->date)  }}</span>
                                        <a href="{{url('event_deatiles/'.$value->id)}}"><h4>{{ $value->name }}</h4></a>
                                        <span><i class="fa fa-clock-o"></i> {{timeFormat( $value->start_time) .' - '. timeFormat($value->finish_time )}}</span>
                                        <span><i class="fa fa-map-marker"></i> {{ $value->place }}</span>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul> 
                        </div> <!-- event 2 -->
                    </div>
                </div> <!-- row -->
            </div>
        </div> <!-- container -->
    </section>
    
    <!--====== EVENT 2 PART ENDS ======-->
    
    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-part" class="pt-65 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mt-50 pb-25">
                        <h5>Top Tutors</h5>
                        <h2>Featured Teachers</h2>
                    </div> <!-- section title -->
                    <div class="teachers-2">
                        <div class="row">
                             @foreach($teacher as $key=>$value)
                            <div class="col-md-6">
                                <div class="teachers-2-singel mt-30">
                                    <div class="thum">
                                        <img src="{{ asset('/images/teacher/'.$value->image)}}" alt="Teacher" style="height: 70px; width: 70px;">
                                    </div>
                                    <div class="cont">
                                        <a href="{{url('teacher/'.$value->id)}}"><h6>{{ $value->name }}</h6></a>
                                        <p>{{ $value->position}}</p>
                                        <span><i class="fa fa-book"></i>{{teachercources($value->id) }} Courses</span>
                                    </div>
                                </div> <!-- teachers 2 singel -->
                            </div>
                            @endforeach
                            
    
                        </div> <!-- row -->
                    </div> <!-- teachers 2 -->
                </div>
                <div class="col-lg-6 ">
                    <div class="happy-student mt-55">
                        <div class="happy-title">
                            <h3>Happy Students</h3>
                        </div>
                        <div class="student-slied">
                            @foreach($comment as $key=>$value)
                            <div class="singel-student">
                                <img src="style/images/teachers/teacher-2/quote.png" alt="Quote">
                                <p>{{ $value->comment }}</p>
                                <h6>{{ $value->first_name.' '. $value->last_name }}</h6>
                                
                            </div> <!-- singel student -->
                            @endforeach
                        </div> <!-- student slied -->
                        <div class="student-image">
                            <img src="style/images/teachers/teacher-2/happy.png" alt="Image">
                        </div>
                    </div> <!-- happy student -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->
   @endsection