# Proyecto-Integrador-4M

LA CARPETA DEL PROYECTO DEBE LLAMARSE IGUAL A GITHUB PARA EVITAR ERRORES EN BUSQUEDA DE ARCHIVOS

------------IMPORTANTE-----------
para el envio de correos:
checar en consola 
composer --version

Si no está instalado, descargar el  https://getcomposer.org/

Ir a la carpeta del proyecto
cd C:\xampp\htdocs\Proyecto-Integrador-4M

instalar lo que se va a ejecutar sin modificar el .json y .lock
composer install --no-scripts --no-dev

listo, espero les funcione a ustedes porque la carpeta ya esta creada que es la de vendor
---------------------------------------------------------
Deben configurar sus llaves de acceso y sus cuentas en envio_correo.php porque probablemente les negara el acceso por la seguridad de google
correo y llave de acceso por aplicacion no la contraseña normal
--------------------------------------------------------------

Pasos para lo del .nev
1. Abrir la terminal del proyecto y instalar lo siguiente: composer require vlucas/phpdotenv
2. Crear un archivo .env en la raiz del proyecto (en el caso de que cree una carpeta abril la terminal del proyecto y poner touch .env)
3. En el archivo .env cololar los siguientes datos:
    DB_HOST=localhost
    DB_USER=root
    DB_PASS="ContraseñaSiTienes"
    DB_NAME=PetClub
    DB_PORT=3306

    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=TUCORREO 
    MAIL_PASSWORD="TUCLABE"
    MAIL_FROM_NAME="PetClub!"

4. El conexion.php y enviar_correo.php ya estan modificados para que automaticamente use el .env
5. En el caso de que no tengas agregado el .env al .gitignore agregalo, porque si no lo agregas, nada va a jalar
6. YA ES TODO

