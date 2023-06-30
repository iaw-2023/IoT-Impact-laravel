# Deploy en una Raspberry Pi

### Requisitos previos
#### Paquetes de PHP instalados

- php-common
- php-curl
- php-fpm
- php-mysql
- php-pgsql
- php8.1-common
- php8.1-curl
- php8.1-mbstring
- php8.1-xml
- php8.2-cli
- php8.2-common
- php8.2-curl
- php8.2-fpm
- php8.2-gd
- php8.2-mbstring
- php8.2-mysql
- php8.2-opcache
- php8.2-pgsql
- php8.2-readline
- php8.2-xml
- php8.2-zip

---

### Descargamos el proyecto e ingresamos en él

``` 
git clone https://github.com/iaw-2023/IoT-Impact-laravel
cd IoT-Impact-laravel
``` 

### Instalamos dependencias de Composer:
``` 
composer install
``` 

### Creamos archivo con las variables entorno
``` 
cp .env.example .env
``` 

### Generamos la clave de la aplicación
Se guardará en la variable de entorno "APP_KEY"
``` 
php artisan key:generate
``` 

### Variables de entorno: APP
``` 
APP_NAME="Burger Planet"
APP_ENV=production
APP_DEBUG=false
``` 

### Variables de entorno: MAIL
A continuación se muestra un ejemplo de las variables de entorno para configurar un servidor de mail.
``` 
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=iot.impact.iaw@gmail.com
MAIL_PASSWORD=<contraseña>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="iot.impact.iaw@gmail.com"
MAIL_FROM_NAME="Burger Planet"
``` 


### Variables de entorno: base de datos

#### Motor de base de datos REMOTO

Para el siguiente ejemplo, usamos el motor de base de datos PostgreSQL alojado en [Supabase](https://supabase.com/).
``` 
DB_CONNECTION=pgsql
DB_HOST=<link generado en Supabase>
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=<clave generada en Supabase>
``` 

#### Motor de base de datos LOCAL
Si quisieramos usar un motor de base de datos de forma **local** en la raspi, deberiamos realizar los siguientes pasos:
1. Instalar un motor de base de datos, como por ejemplo MySQL.
2. Recordar que debemos tener instalado el paquete ```php8.2-mysql``` para poder realizar la conexión de PHP a MySQL.
3. Crear la base de datos, para eso ejecutamos lo siguiente en la consola:
```
mysql -u root -p
CREATE DATABASE burgerplanet;
exit;
```

4. En el archivo .env deberiamos setear las siguientes variables de entorno:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=burgerplanet
DB_USERNAME=root      // o el usuario que consideremos apropiado
DB_PASSWORD=<clave de root>
```

### Migraciones
Una vez que tenemos configurada la base de datos, debemos generar la estructura de la base de datos. Ésto lo logramos con el siguiente comando:
```
php artisan migrate
```

### Datos (opcional)
Para cargar datos de prueba (seeders) en la base de datos, ejecutamos el siguiente comando:
```
php artisan db:seed
```

### Instalamos dependencias y buildeamos
``` 
npm install
npm run build
``` 

### Permisos
Permitimos que el servidor web pueda acceder y escribir en la caché
```
sudo chown -R $USER:www-data storage                     
sudo chown -R $USER:www-data bootstrap/cache
chmod -R 775 storage                                     
chmod -R 775 bootstrap/cache

```

### Nginx
Usamos Nginx para exponer la web. La configuración base se puede obtener del siguiente [link](https://laravel.com/docs/10.x/deployment).
En caso de necesitar un certificado SSL, podemos usar [Certbot](https://certbot.eff.org/). La configuración final de Nginx es la siguiente:

``` 
server {

    server_name admin-burger-planet.chewer.net;
    root /home/wecher/Git/IoT-Impact-laravel/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;
 
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
 
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
 
    error_page 404 /index.php;
 
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
 
    location ~ /\.(?!well-known).* {
        deny all;
    }
}

``` 

### DNS (gratis)
Se puede obtener un DNS gratuito en https://www.noip.com/ o en https://www.cloudflare.com/.
Vinculamos el DNS con la IP pública del de proveedor de internet de la raspberry.
Así mismo, la raspberry debe tener IP local fija, y el router redirigiendo las solicitudes del puerto 443 hacia ella.

### CI/CD
Ahora debemos automatizar el deploy. Cada push en la rama **deploy** actualizará el deploy de la raspi. Para ello, necesitamos realizar los siguientes pasos para configurar un webhook:

En la raspi instalamos el siguiente paquete https://github.com/adnanh/webhook y agregamos lo siguiente al archivo hooks.yml:

``` 
- id: github/admin-burger-planet
  execute-command: "/home/wecher/Git/IoT-Impact-laravel/deploy.sh"
  command-working-directory: "/home/wecher/Git/IoT-Impact-laravel"
  response-message: "OK"
  pass-arguments-to-command:
    - source: payload
      name: repository.name
  trigger-rule:
    and:
      - match:
          type: payload-hmac-sha1
          secret: <CONTRASEÑA>
          parameter:
            source: header
            name: X-Hub-Signature
      - match:
          type: value
          value: "refs/heads/deploy"
          parameter:
            source: payload
            name: ref
``` 

Recordar setear la contraseña en esa configuración.
Con esa configuración, acabamos de crear un endpoint, al cual se puede acceder con el siguiente link:
https:// < DNS > /github/admin-burger-planet

Cada vez que se llame a ese endpoint, se ejecutará el siguiente [script](https://github.com/iaw-2023/IoT-Impact-laravel/blob/deploy/deploy.sh)


En los settings del repo, vamos a la pestaña **Webhook**, agregamos el link y la siguiente configuracion:
- "Content type" debe ser de tipo "applicaction/json".
- La clave secreta debe ser la que elegimos en la configuración del archivo hooks.yml.
- SSL verification: enable
- Seteamos que llame al endpoint en cada evento push


Listo, siguiendo estos pasos, cada vez que haya un cambio en la rama **deploy**, se actualizará el deploy de la raspi.



