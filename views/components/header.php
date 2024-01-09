<?php
/**
 * @var string $uri
 */


$isActiveHome = $uri === 'home' ? 'active' : '';
$isActiveMovies = $uri === 'movies' ? 'active' : ''
?>

<!doctype html>
<html lang='ru'>
<head>
    <meta name='viewport' content='width=device-width, initial'>
    <meta name='description' content='some description'>
    <meta name='author' content=''>
    <link rel='stylesheet' href='/static/css/index.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/home" class="nav-link <?php
                echo $isActiveHome ?>"
                                    aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/movies" class="nav-link <?php
                echo $isActiveMovies ?>">Movies</a>
            </li>
        </ul>
    </header>
</div>