@extends('layout.website.app')

@section('internal_css')
   
 
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->
 
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{ asset('style/images/page-banner-2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $result->name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $result->name }}</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
    
    <!--====== COURSES SINGEl PART START ======-->
    
    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30">
                        <div class="title">
                            <h3>{{ $result->name }}</h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                           <img src="{{ asset('/images/teacher/'.$result->img)}}" alt="teacher" style="height: 50px; width: 50px;">
                                        </div>
                                        <div class="name">
                                            <span>{{ $result->position }}</span>
                                            <h6>{{ getaddedby($result->added_by) }}</h6>
                                        
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div> <!-- course terms -->
                        
                        <div class="corses-singel-image pt-50">
                            <img src="{{ asset('/images/cource/'.$result->image)}}" alt="Courses">
                        </div> <!-- corses singel image -->
                        
                        <div class="corses-tab mt-30">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Curriculam</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="overview-description">
                                        <div class="singel-description pt-40">
                                            <h6>Course Summery</h6>
                                            <p>{!! $result->description !!}</p>
                                        </div>
                                        
                                    </div> <!-- overview description -->
                                </div>
                                <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                    <div class="curriculam-cont">
                                        <div class="title">
                                            <h6>{{ $result->name }}</h6>
                                        </div>
                                        <div class="accordion" id="accordionExample">
                                            @foreach($syllabus as $key=>$value)
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture"></span></li>
                                                            <li><span class="head">{{ $value->name}}</span></li>
                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> 00.30.00</span></span></li>
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>Ut quis scelerisque risus, et viverra nisi. Phasellus ultricies luctus augue, eget maximus felis laoreet quis. Maecenasbibendum tempor eros.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div> <!-- curriculam cont -->
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
                                                            <h6>{{ $value->first_name.' '.$value->last_name}}</h6>
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
                                                            <span>/ {{ $value->rating  }} Star</span>
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
                                            <form action="{{ url('comment_store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="cource_id" value="{{ $result->id }}">
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
                        </div>
                    </div> <!-- corses singel left -->
                    
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                               <h4>Course Features </h4>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Duaration : <span>{{ $result->duration.' '.'month' }}</span></li>
                                    <li><i class="fa fa-clone"></i>Leactures : <span>{{ $count }}</span></li>
                                    <li><i class="fa fa-beer"></i>Quizzes :  <span>05</span></li>
                                    <li><i class="fa fa-user-o"></i>Students :  <span>100</span></li>
                                </ul>
                                <div class="price-button pt-10">
                                    <span>Price : <b>{{ $result->fees }}</b></span>
                                    @auth
                                    <a href="{{ url('stripe') }}" class="main-btn">Enroll Now</a>
                                    @else
                                    <a href='#loginPopup' data-toggle='modal' class="main-btn">Login</a>
                                    @endauth
                                </div>
                            </div> <!-- course features -->
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="You-makelike mt-30">
                                <h4>You make like </h4> 
                                <div class="singel-makelike mt-20">
                                    <div class="image">
                                        <img src="{{ asset('style/images/your-make/y-1.jpg') }}" alt="Image">
                                    </div>
                                    <div class="cont">
                                        <a href="#"><h4>Introduction to machine languages</h4></a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                            <li>$50</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="singel-makelike mt-20">
                                    <div class="image">
                                        <img src="{{ asset('style/images/your-make/y-1.jpg') }}" alt="Image">
                                    </div>
                                    <div class="cont">
                                        <a href="#"><h4>How to build a basis game with java </h4></a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                            <li>$50</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="singel-makelike mt-20">
                                    <div class="image">
                                        <img src="{{ asset('style/images/your-make/y-1.jpg') }}" alt="Image">
                                    </div>
                                    <div class="cont">
                                        <a href="#"><h4>Basic accounting from primary</h4></a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                            <li>$50</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div> <!-- row -->
            
        </div> <!-- container -->

    </section>

    
    <!--====== COURSES SINGEl PART ENDS ======-->

   @endsection

   @section('footer_script')
    <!-- Modal window to addUser -->
<div id="loginPopup" class="modal model-wide fade" data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><i class=" fa fa-user"></i> Login</h4>
            </div>
            <form method="POST" action="{{ route('login') }}">  
             <div class="modal-body">
                  <div class="card-content">
                        
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                  </div>
            </div>
           <div class="modal-footer">
                   @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
                  <button type="submit" class="btn btn-primary">
                     Login
                  </button>
                <button type="button" class="btn srb-default btn-round" data-dismiss="modal">
                    Close
                </button>
            </div>
         </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(document).on('click','#loginModalShow',function(event){
       event.preventDefault();
       alert('You are not loged in.... Pls login first');
     });
</script>
@endsection
