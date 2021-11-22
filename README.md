# konecta
Prueba Práctica PHP

Este aplicativo se realizo en php con framework laravel, para la ejecución o compilación se deben realizar los siguientes pasos:

1. Clonar este repositorio
2. Se debe tener un programa complementario que se llama composer el cual se puede descargar desde esta url https://getcomposer.org/Composer-Setup.exe
3. Se puede usar cualquier apache sea xamp o xamp server
4. Al clonar este reposotorio, dentro de la carpeta de la misma, abrir la consola sea de windows o la que se use por defecto y ejecutar los siguientes comandos
composer install
cuando finalice, ejecutar el siqguiente comando
php artisan key:generate (este comando se usa para crear una llave que identifica el aplicativo, el cual se encuentra en la raiz del repositorio y es un archivo que se llama .env, si no se encuentra este archivo, se puede copiar o renombrar el archivo .env.example a solo .env)
5. Abrir cualquier navegador y colocar la url del repositorio por lo general es localhost/public/konecta
6. La base de datos de este aplicativo se encuentra en la carpeta database de nombre konecta.sql
7. Los controladores se encuentran en la ruta app/Http/Controllers
8. Los modelos se encuentran en la ruta app/Models
9. Las vistas se encuentran en resources/views
