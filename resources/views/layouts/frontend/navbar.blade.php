<nav>
    <p>
        <a href="{{ url('/') }}">
            <img class="logo" src="{{ asset('assets/images/logo(nav).png') }}" alt="logo">
        </a>
    </p>

    <div class="menu-toggle">
        <i class="fas fa-bars"></i>
    </div>

    <ul class="links active">
        <li><a href="{{ url('/') }}">home</a></li>
        <li><a href="{{ url('/about_us') }}">about us</a></li>
        <li><a href="{{ url('/products') }}">products</a></li>
        <li><a href="{{ url('/contact_us') }}">contact us</a></li>
    </ul>

    <ul class="right active">
        @guest
            <li><a href="{{ url('/register') }}">Register</a></li>
            <li><a class="login" href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/login') }}"><i class="fa fa-basket-shopping"></i></a></li>
        @endguest
        @auth
            <li><a class="logout" href="{{ url('/logout') }}">Logout</a></li>
            <li><a href="{{ url('/previous') }}"><i class="fa fa-user"> {{ auth()->user()->name }}</i></a></li>
            <li><a href="{{ url('/basket') }}"><i class="fa fa-basket-shopping">
                        {{ app('App\Http\Controllers\BasketController')->getBasketCount() }}</i></a></li>
        @endauth
    </ul>

</nav>
