<header class="header-area">
    <!-- Navbar Area -->
    <div class="newsbox-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newsboxNav">

                    <!-- Nav brand -->
                <a href="/" class="nav-brand"><img src="{{asset('ui/img/core-img/logo.png')}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>

                                @auth
                                @if (Auth::user()->is_admin == 1)
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('tags')}}">Tag</a></li>
                                <li><a href="{{route('posts')}}">Posts</a></li>
                                <li><a href="{{route('users')}}">Users</a></li>
                                @endif

                                <li>
                                    <a   href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                </li>


                                @else
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                                @endauth


                                <li><a href="#">Main</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('tags')}}">Tag</a></li>
                                        <li><a href="{{route('posts')}}">Posts</a></li>
                                        <li><a href="{{route('users')}}">Users</a></li>
                                    </ul>
                                </li>

                            </ul>

                            <!-- Header Add Area -->

                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
