<!doctype html>
<html lang="en">
<head>
        <title> BurgerPlanet - Productos </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->product_category_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        

    <!-- Boton agregar producto -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
    Agregar producto
    </button>

    <!-- Modal agregar producto -->
    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="product_category_id">Categoria del producto</label>
                    <select name="product_category_id" id="product_category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear producto</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Boton eliminar producto -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEliminarProducto">
    Eliminar producto
    </button>

    <!-- Modal eliminar producto -->
    <div class="modal fade" id="modalEliminarProducto" tabindex="-1" role="dialog" aria-labelledby="modalEliminarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarProductoLabel">Eliminar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('products.destroy') }}">
                @csrf
                <div class="form-group">
                    <label for="product_id">ID del producto a eliminar:</label>
                    <input type="number" name="product_id" id="product_id" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Eliminar producto</button>
            </form>
        </div>
        </div>
    </div>
    </div>

<!-- Boton modificar producto -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalModificarProducto">
    Modificar producto
    </button>

    <!-- Modal modificar producto -->
    <div class="modal fade" id="modalModificarProducto" tabindex="-1" role="dialog" aria-labelledby="modalModificarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalModificarProductoLabel">Modificar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('products.update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">ID del producto a modificar</label>
                    <input type="number" name="product_id" id="product_id" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Nombre nuevo</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Precio nuevo</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stock">Stock nuevo</label>
                    <input type="number" name="stock" id="stock" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Descripcion nueva</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="product_category_id">Categoria del producto nueva</label>
                    <select name="product_category_id" id="product_category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modificar producto</button>
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