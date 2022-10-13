***********************************
Credenciales para inicio de sesion
correo:elpais@elpais.com
password:password
***********************************

Instalacion
*****
version del php 8.1
*****
************
1. Clonar proyecto
2. Por consola adentro de la carpeta del proyecto ejecutar el comando "composer i o composer install" para instalar dependencias
3. Por consola adentro de la carpeta del proyecto ejecutar el comando "npm i o npm install" para instalar dependencias
4. Dentro de los archivos raiz del proyecto, copiar el archivo ".env.example" y a la copia cambiarle el nombre a ".env"
    4.1 Dentro del archivo ".env" buscamos la constante "DB_DATABASE" y como valor le asignamos el nombre "tareas_app" el cual sera el nombre de la base de datos que             debes crear en tu motor de bases de datos mysql. Ej: DB_DATABASE=tareas_app
5. Por consola adentro de la carpeta del proyecto, ejecutamos el comando php artisan key:generate
6. Ejecutar las migraciones con el comando php artisan migrate por consola
7. Ejecutar el servidor con php artisan serve por consola
8. Probar y ser felices
************
