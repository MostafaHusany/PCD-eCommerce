{{--
<div class="topbar-menu-area">
    <div class="container">
        <div class="topbar-menu left-menu">
            <ul>
                <li class="menu-item" >
                    <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                </li>
            </ul>
        </div>
        <div class="topbar-menu right-menu">
            <ul>
                <li class="menu-item" ><a title="Register or Login" href="login.html">Login</a></li>
                <li class="menu-item" ><a title="Register or Login" href="register.html">Register</a></li>
                <li class="menu-item lang-menu menu-item-has-children parent">
                    <a title="English" href="#"><span class="img label-before"><img src="{{ asset('shop_assets/images/lang-' . LaravelLocalization::getCurrentLocale() . '.png') }}" alt="lang-en"></span>{{ LaravelLocalization::getCurrentLocaleName() }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="submenu lang" >
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="menu-item">
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <img src="{{ asset('shop_assets/images/' . 'lang-' . $localeCode . '.png') }}"/>
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </li>
                <li class="menu-item menu-item-has-children parent" >
                    <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="submenu curency" >
                        <li class="menu-item" >
                            <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                        </li>
                        <li class="menu-item" >
                            <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                        </li>
                        <li class="menu-item" >
                            <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
--}}

<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item">
                <a class="nav-link link-dark px-2 {{ Request::is(LaravelLocalization::getCurrentLocale() ) ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-dark px-2 {{ Request::is(LaravelLocalization::getCurrentLocale() . '/shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Login</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Sign up</a></li>
        </ul>
        
        <ul class="nav">
            <li class="nav-item">
                <button type="button" class="btn btn-sm btn-dark position-relative" style="padding: 1px 10px;margin: 10px;">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
            </li>
        </ul>
    </div>
</nav>
<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
            <i class="fas fa-wrench fa-2x" style="padding: 0px 10px;"></i>
            <span class="fs-4">{{ env('APP_NAME') }}</span>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
    </div>
</header>

{{--
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is(LaravelLocalization::getCurrentLocale() ) ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is(LaravelLocalization::getCurrentLocale() . '/shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
--}}