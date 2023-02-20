<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title link rel='shortcut icon' href='public/favicon.ico' type='image/x-icon'>Celessentials</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Font Awesome Link & Google Font Link-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        @include('layouts.frontend.navbar')

        <main>
            @yield('content')
        </main>
    </div>
    @include('layouts.frontend.footer')

    <!-- JS File Links -->

    <script src="{{ asset('assets/js/script.js')}}" type="module"></script>
    <script>
        window.addEventListener('message', event => {
            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        });
    </script>


</body>

</html>
