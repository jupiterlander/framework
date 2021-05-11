<!doctype html>
<html>
    <meta charset="utf-8">
    <title><?= $title ?? "No title" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url("/favicon.ico") ?>">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<header>
    <nav>
        <a href="<?= url("/yatzy") ?>">Yatzy</a> |
        <a href="<?= url("/session") ?>">Session</a> |
        <a href="<?= url("/php") ?>">php</a> |
        <a href="<?= url("/laravel") ?>">Laravel</a> |
        <a href="<?= url("/no/such/path") ?>">Show 404 example</a> |
         <a href="<?= url("/kill") ?>">Kill session</a>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>This is the footer.</p>
</footer>
</body>
</html>