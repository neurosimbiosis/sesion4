Neurosimbiosis
==============

Este proyecto es la base de ejemplo para la
sesión 4 con la comunidad sobre el tema:
Entendiendo los servicios REST.

Youtube
-------

Video publicado: https://www.youtube.com/c/neurosimbiosis

Instalación
-----------

Una vez clonado el proyecto se ejecutan 
los siguientes comandos

~~~bash
# Instalación de dependencias
composer install
# Creación de la base de datos
symfony console doctrine:database:create
# Creación de las tablas
symfony console doctrine:migrations:migrate
# Importación de datos de ejemplo
symfony console doctrine:fixtures:load
# Se inicia el server
symfony server:start -d
~~~
