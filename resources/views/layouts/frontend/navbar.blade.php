<nav>
    <p>
        <a href="{{ url('/') }}">
            <img class="logo" src="{{ asset('assets/images/logo(white).png') }}" alt="logo">
        </a>
    </p>

    <ul class="links">
        <li><a href="{{ url('/') }}">home</a></li>
        <li><a href="{{ url('/about_us') }}">about us</a></li>
        <li><a href="{{ url('/products') }}">products</a></li>
        <li><a href="{{ url('/contact_us') }}">contact us</a></li>
    </ul>

    <ul class="right">
        @guest
            <li><a href="{{ url('/register') }}">Register</a></li>
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/login') }}"><i class="fa fa-basket-shopping"></i></a></li>
        @endguest
        @auth
            <li><a href="">{{ auth()->user()->name }}</a></li>
            <li><a href="{{ url('/previous') }}">Your orders</a></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
            <li><a href="{{ url('/basket') }}"><i class="fa fa-basket-shopping"></i></a></li>
        @endauth
    </ul>

</nav>
