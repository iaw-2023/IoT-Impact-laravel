<!doctype html>
<html lang="en">
<head>
        <title> BurgerPlanet - Categorias de productos </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
        <img src="https://i.ibb.co/pdbcDkX/logo-sin-bp.png" alt="Logo" class="navbar-logo">
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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    <!-- Boton agregar categoria -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
    Agregar categoria de producto
    </button>

    <!-- Modal agregar categoria -->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarCategoriaLabel">Agregar categoria de producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre de la categoria nueva</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Crear categoria de producto</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Boton eliminar categoria -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminarCategoria">
    Eliminar categoria de producto
    </button>

    <!-- Modal eliminar categoria -->
    <div class="modal fade" id="modalEliminarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarCategoriaLabel">Agregar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('categories.destroy') }}">
                @csrf
                <div class="form-group">
                    <label for="product_category_id">ID del producto a eliminar:</label>
                    <input type="number" name="product_category_id" id="product_category_id" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Eliminar categoria de producto</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Boton modificar categoria -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalModificarCategoria">
    Modificar categoria de producto
    </button>

    <!-- Modal modificar categoria -->
    <div class="modal fade" id="modalModificarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalModificarCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalModficiarCategoriaLabel">Modificar categoria de producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('categories.update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">ID de la categoria a modificar</label>
                    <input type="number" name="category_id" id="category_id" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Nombre de la categoria nueva</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Modificar categoria de producto</button>
            </form>
        </div>
        </div>
    </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




</body>
</html>