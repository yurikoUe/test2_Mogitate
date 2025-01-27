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
        <a href="{{ route('products') }}">
            <img src="{{ asset('storage/images/mogitate.png') }}" alt="もぎたてロゴ">
        </a>
    </header>

    <header class="header__title">
        @yield('header')
    </header>

    <main class="main">
        <aside class="sidebar">
            @yield('aside')
        </aside>
        <article class="content">
            @yield('content')
        </article>
    </main>

</body>

</html>