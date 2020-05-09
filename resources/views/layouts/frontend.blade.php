<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Paperback-bd</title>

    <!-- Main CSS-->
    <link href="{{ asset('css/paperbackbd.bundle.css') }}" rel="stylesheet">

</head>

<body class="app sidebar-mini">
    @yield('preloader')

    <div class="app-header" style="background-color: #fcca03"><a class="app-header__logo" href="{{ route('home') }}" style="background-color: transparent;"> <img src="{{asset('logo/paperback-logo.png')}}" alt="Paper Back" height="60" width="250" style="float: left; padding-right: 40px"></a>
        <ul class="app-nav" style="background-color: #fcca03">
            <li class="app-search">
                {!! Form::open(['method'=> 'GET', 'action'=>'HomeController@showSearchResult']) !!}
                    {!! Form::text('search', null, ['id'=>'search-input', 'class'=>'app-search__input','required' => 'required', 'placeholder' => 'Type Book Name']) !!}
                    {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'app-search__button'] )  }}
                {!! Form::close() !!}
            </li>
            <li>
                <a class="app-nav__item" href="{{ route('cart.index') }}" style="text-decoration: none">
                    <i class="fa fa-shopping-cart fa-lg"></i>
                        <span class="fa-lg ml-1" id="totalcartItems">@if (Cart::count() > 0 ){{ Cart::count() }} @endif</span>
                </a>
            </li>
            <!-- User Menu-->
            @if (Route::has('login'))
                @auth
                    <li class="dropdown">
                        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                            <i class="fa fa-user fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile', auth()->user()->slug) }}">
                                    <i class="fa fa-user fa-lg"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('myorder') }}">
                                    <i class="fa fa-cog fa-lg"></i>My Order
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-lg"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                <li>
                    <a class="app-nav__item fa-lg" href="{{ route('login') }}" style="text-decoration: none">
                        Log in
                    </a>
                </li>

                @endauth
            @endif
        </ul>

    </div>

<div class="app-header-bottom"></div>


    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h5> <i class="fa fa-laptop fa-sm"> </i> Category</h5></li>

                        @if($categories)
                            @foreach($categories as $category)
                                <li class="list-group-item"><a href="{{ route('home.category', $category->slug) }}">{{ $category->title }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-10">
                	@yield('content')

                </div>
            </div>
        </div>
    </div>


    @yield('footer')


    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/paperbackbd.bundle.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/main.js') }}" ></script>

    @yield('scripts')




</body>

</html>
