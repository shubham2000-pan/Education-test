<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <!-- Search-->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search"/>
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>

            
            
           
            

            <div class="avatar-dropdown" id="icon">
                <span>{{ Auth::user()->name }}</span>
                <img src="{{ asset('/images/user/'.Auth::user()->image) }}" style="border-radius: 50px;">
            </div>
            <!-- Account dropdawn-->
            <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                for="icon">
                <li class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">
                        <span class="material-icons mdl-list__item-avatar">
                            <img src="{{ asset('/images/user/'.Auth::user()->image) }}" style=" height: 50px; width: 50px;"></span>
                        <span>{{ Auth::user()->name }}</span>
                        <span class="mdl-list__item-sub-title">{{ Auth::user()->email }}</span>
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <a href="{{ url('profile') }}"><i class="material-icons mdl-list__item-icon">account_circle</i>
                       My account</a> 
                    </span>
                </li>
               
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <a href="{{ url('password') }}"><i class="material-icons mdl-list__item-icon">perm_contact_calendar</i>
                        Change Password</a>
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                
                <a href="login.html">
                    <li class="mdl-menu__item mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                             <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </span>
                    </li>
                </a>
            </ul>

            
    </header>

    <div class="mdl-layout__drawer">
        <header> Dashboard</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="{{url('user')}}">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Dashboard
                        </a>
                        <div class="sub-navigation">
                            
                        </div>
                        <div class="mdl-layout-spacer"></div>
                        <hr>
                        <b>Shubham Pandey</b>
                    </nav>
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>