![](RackMultipart20230423-1-k7wyo0_html_7a55f69877b36039.png)

**Rodrigo Kraus - Matias Schwerdt**

Universidad Nacional del Sur

Departamento de Ciencias e Ingeniería de Computación

# Proyecto inicial

**Ingeniería de aplicaciones web - 2023**

# IDEA DEL PROYECTO

Se presenta una aplicación web dedicada al registro de gestión de pedidos de productos de un establecimiento de venta de comida. Los clientes podrán realizar pedidos de comida, y los empleados podrán gestionarlos.

**DETALLES DEL PROYECTO FRAMEWORK PHP - LARAVEL:**

Se va a registrar, para cada una de las siguientes entidades:

1. Para cada **PRODUCTO** , su nombre, su precio y el stock restante.

2. Para cada **ORDEN** , el mail de la persona que lo hizo, el precio total, y los items que contenga.

3. Para cada **ITEM** , su cantidad.

4. En una tabla de **CATEGORÍAS DE PRODUCTO** , su nombre y descripción.

Cada cliente podrá hacer un pedido a el establecimiento de comida, en donde se va a generar una orden con los items que la persona haya solicitado, la cual va a consistir de uno o mas productos.

# ENTIDADES ACTUALIZABLES

Se podrán actualizar todas las entidades: products, items, order, product\_category.

Creo que es solamente éstos:

- Products
- Products\_Category

Porque acá estamos en el proyecto de Laravel, osea en la interfaz para los empleados… Creo q tienen q poder editar los productos y las categorias nomas….
 Despues las entidades Items y Pedidos seria solamente en React pq es lo q usan los clientes

# REPORTES

Se pueden generar los siguientes **reportes** :

1. Un reporte que contenga todos los pedidos que haya hecho un cliente.

2. Un reporte con la cantidad de pedidos y dinero ganado por mes.

3. Un reporte que detalle el stock restante de cada producto.

# OBTENCIÓN Y MODIFICACIÓN MEDIANTE API

Se podrán obtener y modificar por API todas las entidades.

Creo que serían nomas éstas :

- Order
- Items

Pq la API es para q React se conecte a ella mepa, entonces es basicamente lo q los clientes van a usar… son solamente sus pedidos y sus items

**DETALLES DEL PROYECTO JAVASCRIPT - REACT/VUE:**

# INFORMACIÓN OBSERVABLE POR EL USUARIO

El usuario podrá ver todos los productos disponibles, con su precio y descripción.

También podrá ver su pedido actual y su historial de pedidos.

# ACCIONES REALIZABLES POR EL USUARIO

El usuario podrá armar su pedido agregando productos a su carrito, para luego decidir si cancelar su compra o confirmar su pedido. Luego podrá consultar el mismo o consultar su historial de pedidos.
