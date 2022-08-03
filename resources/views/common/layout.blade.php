<!doctype html>
<html lang="ru">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

    <!-- SEO -->
    <title>@yield('title')</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="/image/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/image/favicon/favicon-16x16.png">
    <link rel="manifest" href="/image/favicon/site.webmanifest">
    <link rel="mask-icon" href="/image/favicon/safari-pinned-tab.svg" color="#ffffff">
    <link rel="shortcut icon" href="/image/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#212529">
    <meta name="msapplication-config" content="/image/favicon/browserconfig.xml">
    <meta name="theme-color" content="#212529">

    <!-- CSS -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">

    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
@include('common.header')

@yield('content')

@include('common.footer')
</body>
</html>
