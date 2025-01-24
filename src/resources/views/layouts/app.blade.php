<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mogitate</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <header class="header__logo">
        <img src="{{ asset('storage/images/mogitate.png') }}">
    </header>

    <header__title>
        @yield('header')
    </header__title>


    <aside>
        @yield('aside')
    </aside>

    <main>
        @yield('content')
    </main>
</body>

</html>