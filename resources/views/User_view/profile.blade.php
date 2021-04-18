@extends('layout.user.app')

@section('internal_css')
 <style type="text/css">
      .margin{
margin-left: 130px;
      }
  </style>  
  
@endsection

@section('content')


 <main class="mdl-layout__content ui-form-components">

<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--10-col-tablet mdl-cell--6-col-phone margin">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
                    </div>
                    <div class="mdl-card__supporting-text">
                       <form action="{{ url('profile_update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--3-col-tablet mdl-cell--1-col-phone">
                                    <div class=" profile-image--round">
                                        <img src="{{ asset('/images/user/'.Auth::user()->image) }}" width="150px" height="150px" style="border-radius: 22px; height: 200px; width: 200px;">
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" name="name" value="{{ Auth::user()->name}}" id="profile-floating-first-name">
                                        <label class="mdl-textfield__label" for="profile-floating-first-name">Name</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" name="email" value="{{ Auth::user()->email}}" id="profile-floating-e-mail">
                                        <label class="mdl-textfield__label" for="floating-e-mail">Email</label>
                                    </div>
                                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" name="contact" value="{{ Auth::user()->contact}}" id="profile-floating-contact">
                                        <label class="mdl-textfield__label" for="floating-contact">Contact</label>
                                    </div>
                                     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" name="address" value="{{ Auth::user()->address}}" id="profile-floating-address">
                                        <label class="mdl-textfield__label" for="floating-address">Address</label>
                                    </div>
                                 
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green ">
                                    SAVE CHANGES
                                    </button>
                            </div>
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
        </main>
       
        @endsection
