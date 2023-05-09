<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title> BurgerPlanet - Categorias de productos </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
        
    </head>
    <body class="antialiased">
        
        <!--Paneles de navegacion de las 4 entidades -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">BurgerPlanet</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/products">Productos</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="/categories">Categorias</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="/orders">Ordenes</a> </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="/items">Items</a> </li>
                </ul>
            </div>
        </div>
        </nav>

        <!-- Log in y dashboard -->
        <div class="containerLogin">
            @if (Route::has('login'))
                <div class="containerLogin">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="textoLogin">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="textoLogin">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="textoLogin">Register</a>
                        @endif
                    @endauth
                </div>
            @endif  
        </div>
    </body>
</html>
