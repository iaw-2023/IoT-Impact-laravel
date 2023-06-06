<!doctype html>
<html lang="en">
<head>
        <title> BurgerPlanet - Items </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
        <img src="https://i.ibb.co/pdbcDkX/logo-sin-bp.png" alt="Logo" class="navbar-logo">
        <a class="navbar-brand">BurgerPlanet</a>
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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Orden</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio individual</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->order_id }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->individual_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>






</body>
</html>