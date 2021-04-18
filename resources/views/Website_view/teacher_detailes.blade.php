@extends('layout.website.app')

@section('internal_css')
    
  
@endsection

@section('content')

<!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{ asset('style/images/page-banner-3.jpg') }}">
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
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-singel" class="pt-70 pb-120 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="{{ asset('/images/teacher/'.$result->image)}}" alt="Teachers">
                        </div>
                        <div class="name">
                            <h6>{{ $result->name }}</h6>
                            <span>{{ $result->position }}</span>
                        </div>
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>{{ $result->about }}</p>
                        </div>
                    </div> <!-- teachers left -->
                </div>
                <div class="col-lg-8">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul> <!-- nav -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">
                                    <div class="singel-dashboard pt-40">
                                        <h5>About</h5>
                                        <p>{{ $result->about }}</p>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>Acchivments</h5>
                                        <p>{{ $result->acchivments }}</p>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>My Objective</h5>
                                        <p>{{ $result->objective }}</p>
                                    </div> <!-- singel dashboard -->
                                </div> <!-- dashboard cont -->
                            </div>
                            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                <div class="courses-cont pt-20">
                                    <div class="row">
                                        @foreach($cource as $key => $value)
                                        <div class="col-md-6">
                                            <div class="singel-course mt-30">
                                                <div class="thum">
                                                    <div class="image">
                                                        <img src="{{ asset('images/cource/'.$value->image) }}" alt="Course">
                                                    </div>
                                                    <div class="price">
                                                        <span>{{$value->fees}}</span>
                                                    </div>
                                                </div>
                                                <div class="cont border">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    
                                                    <a href="#"><h4>{{$value->name}}</h4></a>
                                                    <div class="course-teacher">
                                                        <div class="thum">
                                                            <a href="#"><img src="{{ asset('images/teacher/'.$value->img) }}" alt="teacher"></a>
                                                        </div>
                                                        <div class="name">
                                                            <a href="#"><h6>{{getaddedby($value->added_by)}}</h6></a>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div> <!-- singel course -->
                                         
                                        </div>
                                           @endforeach
                                    </div> <!-- row -->
                                </div> <!-- courses cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Student Reviews</h6>
                                    </div>
                                    <ul>
                                      @foreach($comment as $key=>$value)
                                           <li>
                                               <div class="singel-reviews">
                                                    <div class="reviews-author">
                                                        <div class="author-thum">
                                                            <img src="{{ asset('images/user/'.$value->img) }}" alt="Reviews" width="50px" height="50px" style="border-radius: 50px;">
                                                        </div>
                                                        <div class="author-name">
                                                            <h6>{{ $value->first_name.$value->last_name}}</h6>
                                                            <span>{{ dateFormat($value->created_at)}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-description pt-20">
                                                        <p>{{ $value->comment}}</p>
                                                        <div class="rating">
                                                            <ul>
                                                                
                                                                
                                                                @for($i=1;$i<=$value->rating; $i++)
                                                                <li><i class="fa fa-star"></i></li>
                                                                @endfor
                                                                
                                                            </ul>
                                                            <span>/ {{$value->rating}} Star</span>
                                                        </div>
                                                    </div>
                                                </div> <!-- singel reviews -->
                                           </li>
                                           @endforeach
                                    </ul>
                                    <div class="title pt-15">
                                        <h6>Leave A Comment</h6>
                                    </div>
                                    <div class="reviews-form">
                                       <form action="{{ url('teachercomment_store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="teacher_id" value="{{ $result->id }}">
                                                @Auth
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                @endAuth
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" name="first_name" placeholder="Fast name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text"  name="last_name" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                    <div class="form-singel">
                                                    <select name="rating" class="form-control">
                                                   <option >1</option>
                                                   <option>2</option>
                                                   <option>3</option>
                                                   <option>4</option>
                                                   <option>5</option>
                                                    </select>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <textarea placeholder="Comment" name="comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                    @Auth
                                                    <div class="form-singel">
                                                        
                                                        <input type="submit" name="Post Comment" value="Post Comment" class="main-btn">
                                                    </div>
                                                    @else
                                                    <a href='#loginPopup' data-toggle='modal' class="main-btn">Login</a>
                                                    @endAuth
                                                    </div>
                                                </div> <!-- row -->
                                            </form>
                                    </div>
                                </div> <!-- reviews cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- teachers right -->

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->
@endsection