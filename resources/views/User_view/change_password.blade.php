@extends('layout.user.app')

@section('internal_css')
 <style type="text/css">
      .margin{
margin-left: 130px;
      }
  </style>  
  
@endsection

@section('content')
<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
<main class="mdl-layout__content">
    <div class="mdl-card mdl-card__login mdl-shadow--2dp">
        <div class="mdl-card__supporting-text color--dark-gray">
            <div class="mdl-grid">
                
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="login-name text-color--white">Change password</span>
                   

                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="e-mail">
                        <label class="mdl-textfield__label" for="e-mail">Old Password</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="e-mail">
                        <label class="mdl-textfield__label" for="e-mail">New password</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="e-mail">
                        <label class="mdl-textfield__label" for="e-mail">Confirm Password</label>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                <span class="login-secondary-text text-color--smoke">(we need your old password to confirm your changes)</span>
            </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                    <div class="mdl-layout-spacer"></div>
                    
                    <a href="{{ url('change_password/'.Auth::user()->id)}}">
                        <buttons class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                            CHANGE PASSWORD
                        </buttons>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>
    @endsection