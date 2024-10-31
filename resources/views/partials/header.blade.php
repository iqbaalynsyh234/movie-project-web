<!--========== Header ==============-->
<header id="gen-header" class="gen-header-style-1 gen-has-sticky">
    <div class="gen-bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">
                            <img class="img-fluid logo" src="{{ asset('movie/images/logo-1.png') }}"
                                alt="streamlab-image">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div id="gen-menu-contain" class="gen-menu-contain">
                                <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                    <li class="menu-item active">
                                        <a href="#" aria-current="page">Home</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="gen-header-info-box">
                            <!-- Search Block -->
                            <div class="gen-menu-search-block">
                                <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                                <div class="gen-search-form">
                                    <form role="search" method="get" class="search-form" action="#">
                                        <label>
                                            <input type="search" class="search-field" placeholder="Search …" value=""
                                                name="s">
                                        </label>
                                        <button type="submit" class="search-submit"></button>
                                    </form>
                                </div>
                            </div>

                            <!-- Account Holder -->
                            <div class="gen-account-holder">
                                <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                                <div class="gen-account-menu">
                                    <ul class="gen-account-menu">
                                        @auth
                                            <li>
                                                <a href="#"><i class="fa fa-user"></i> Welcome, {{ Auth::user()->name }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('favorites') }}"><i class="fa fa-heart"></i> My Favorites
                                                    Movie</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Logout</button>
                                                </form>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>

                            <form method="GET" action="{{ url()->current() }}" style="display: inline;">
                                <select name="lang" onchange="this.form.submit()">
                                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="id" {{ app()->getLocale() == 'id' ? 'selected' : '' }}>Bahasa Indonesia</option>
                                </select>
                            </form>

                            <!-- Subscribe Button -->
                            <div class="gen-btn-container">
                                <a href="{{ route('register') }}" class="gen-button">
                                    <div class="gen-button-block">
                                        <span class="gen-button-line-left"></span>
                                        <span class="gen-button-text">Subscribe</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--========== Header End ==============-->