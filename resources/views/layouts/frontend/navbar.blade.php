<nav>
    <p>
        <a href="{{ url('/') }}">
            <img class="logo" src="{{ asset('assets/images/...') }}" alt="logo">
        </a>
    </p>

    <ul class="links">
        <li><a href="{{ url('/') }}">home</a></li>
        <li><a href="{{ url('/') }}">products</a></li>
        <li><a href="{{ url('/about_us') }}">about us</a></li>
        <li><a href="{{ url('/contact_us') }}">contact us</a></li>
    </ul>

    <ul class="right">
        <li><a href="{{ asset('/') }}"><i class="fa fa-basket-shopping"></i></a></li>
        <li><a href="{{ asset('/') }}"><i class="fa fa-user"></i></a></li>
    </ul>

</nav>
