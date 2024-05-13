<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-white text-dark">
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 m-4 border-bottom">
        <span class="fs-4">MY EXAM</span>
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 link-secondary text-decoration-none" href="/">Главная</a>
            <a class="me-3 py-2 link-secondary text-decoration-none" href="/subject">Мои предметы</a>
            <a class="me-3 py-2 link-secondary text-decoration-none" href="/tests">Тестирование</a>
        </nav>
    </div>

    <div class="container">
        @yield('main_content')
    </div>
    
</body>

</html>