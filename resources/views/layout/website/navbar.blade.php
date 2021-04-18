  <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
   
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">        
        <div class="navigation navigation-2 navigation-3">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-11 col-md-10 col-sm-9 col-9">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index-4.html">
                                <img src="{{ asset('style/images/logo.png') }}" >
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="{{ getActiveClass(['WebsiteController'],['index','create','edit','show']) }} " href="{{url('/')}}">Home</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ getActiveClass(['WebsiteController'],['about']) }} " href="{{url('about')}}">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ getActiveClass(['CourceController'],['cource','cource_deatails']) }} " href="{{url('cource')}}">Courses</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('event')}}" class="{{ getActiveClass(['EventController'],['website','event_deatiles']) }} ">Events</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('teacher')}}" class="{{ getActiveClass(['TeacherController'],['teacher','teacher_detailes']) }} ">Our teachers</a>
                                        
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="{{url('contact')}}" class="{{ getActiveClass(['ContactController'],['index','create','edit','show']) }} ">Contact</a>
                                        
                                    </li>
                                    @guest
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                     </li>
                                     @if (Route::has('register'))
                                     <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                     </li>
                                     @endif
                                    @else
                                    @endguest
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->