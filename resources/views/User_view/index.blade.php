@extends('layout.user.app')

@section('internal_css')
  <style type="text/css">
      .margin{
margin-left: 20px;
      }
  </style>  
  
@endsection

@section('content')

    <main class="mdl-layout__content">

         <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--6-col-phone">
      
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Welcome back, {{ Auth::user()->name }} </h2>
            </div>
        </div>


<div class="margin">
    <h2>My courses</h2>
</div>

        <div class="mdl-grid mdl-grid--no-spacing dashboard">

            <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

                <!-- Pie chart-->
                <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                  
                    {{ payment($result->name) }}
                    <div class="mdl-card mdl-shadow--2dp pie-chart">
                        <div class="mdl-card__title">
                            
                            <h2 class="mdl-card__title-text">{{ $result->name }}</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="container">

                            </div>
                        </div>
                    </div>
                         
                </div>
                <!-- Line chart-->

                        
                

    </main>   
@endsection