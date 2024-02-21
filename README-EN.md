[![en](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/rodrikraus/IoT-Impact-laravel/blob/main/README-EN.md)
[![es](https://img.shields.io/badge/lang-es-yellow.svg)](https://github.com/rodrikraus/IoT-Impact-laravel/blob/main/README-ES.md)

## PROJECT IDEA

A web application dedicated to the registration of product order management of a food sales establishment is presented. Customers will be able to place food orders, and employees will be able to manage them.

![Entity Relationship Diagram](docs/entity-relationship-diagram.png)



## DETAILS OF THE PHP FRAMEWORK PROJECT - LARAVEL:    

It will be registered, for each of the following entities:
- For each **PRODUCT**, its name, description, price and stock.
- For each **ORDER**, the email of the person who placed it, the total price, and the items it contains.
- For each **ITEM**, its quantity.
- For each **PRODUCT CATEGORIES**, its name.

Each customer will be able to place an order at the food establishment, where an order will be generated with the items that the person has requested, which will consist of one or more products.



### UPDATABLE ENTITIES
- Products
- Products_Category

### REPORTS

The following **reports** can be generated:
- A report that contains all the orders that a customer has made.
- A report with the number of orders and money earned per month.
- A report that details the remaining stock of each product.

### OBTAIN AND MODIFY USING API

The following entities can be obtained and modified via API:
- Order
- Items

Additionally, using some filtering mechanism, the following entities can be obtained via API:
- Products
- Products_Category



### Extras:

#### Useful commands:
In the root folder of the project:


``` 
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan migrate
php artisan db:seed
php artisan serve
```
#### Docker
En la carpeta [db-setup-docker](db-setup-docker/) se encuentra el archivo [docker-compose.yml](db-setup-docker/docker-compose.yml), el cual levanta PostgreSQL y pgAdmin.


