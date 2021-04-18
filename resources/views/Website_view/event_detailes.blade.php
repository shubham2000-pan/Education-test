@extends('layout.website.app')

@section('internal_css')
    
  
@endsection

@section('content')
<!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('style/images/page-banner-3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $result->name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Events</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $result->name }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== EVENTS PART START ======-->

    <section id="event-singel" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="events-area">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="events-left">
                            <h3>{{ $result->name }}</h3>
                            <span><i class="fa fa-calendar"></i> {{ dateFormat($result->date) }}</span>
                           <span><i class="fa fa-clock-o"></i>{{ timeFormat($result->start_time) .' - '. timeFormat($result->finish_time)}}</span>
                            <span><i class="fa fa-map-marker"></i> {{ $result->place }}</span>
                            <img src="{{ asset('/images/Event/banner/'.$result->banner_image)}}" alt="Event">
                            <p>{{ $result->about }}</p>
                        </div> <!-- events left -->
                    </div>
                    <div class="col-lg-4">
                        <div class="events-right">
                            <div class="events-coundwon bg_cover" data-overlay="8" style="background-image: url({{ asset('style/images/event/singel-event/coundown.jpg') }}">
                                <div data-countdown="{{ $result->date }}"></div>
                                <div class="events-coundwon-btn pt-30">
                                    @auth
                                    <a href="#" class="main-btn">Book Your Seat</a>
                                    @else
                                    <a href="#" class="main-btn">Login</a>
                                    @endauth
                                </div>
                            </div> <!-- events coundwon -->
                            <div class="events-address mt-30">
                                <ul>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Start Time</h6>
                                                <span>{{ $result->start_time}}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-bell-slash"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Finish Time</h6>
                                                <span>{{ $result->finish_time}}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-map"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Address</h6>
                                                <span>{{ $result->address}}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                </ul>
                                
                            </div> <!-- events address -->
                        </div> <!-- events right -->
                    </div>
                </div> <!-- row -->
            </div> <!-- events-area -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->
    @endsection

@section('footer_script')

@endsection