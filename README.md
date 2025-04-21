<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
    <b>Documenacion Proyecto Final Programación IV</b>
</p>

Este es el Proyecto Final de Programación IV, aquí se detallara y explicara la funcionalidad de la aplicación.
Es una aplicacion basada en Inventario de Materiales y contiene lo siguiente un login, un registro de usuario, un dashboard, una sección para crear el material que el usuario desea crear, una sección de pedidos donde se registraran todos los pedidos que el usuario haya ingresado con su repectivo detalle de pedido.

Esta es una aplicacion desarrollada con las siguientes tecnologías [Laravel](https://laravel.com/docs/11.x) como framework principal, [Filament](https://filamentphp.com/docs/3.x/panels/installation) como libreria asociada a Laravel y [Docker](https://www.docker.com/) para montar el proyecto en contenedores donde tambien se integra mysql como gestor de base de datos.

## Vista de Iniciar Sesión (Login)

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-c6ae6808.jpg](https://i.postimg.cc/HkD65PtH/Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-c6ae6808.jpg)](https://postimg.cc/N5D8vDVP)

Este módulo forma parte del sistema 'Materiales Don Luis' y  permite a los usuarios registrarse o iniciar sesión de manera segura utilizando Laravel.
En esta vista , el usuario puede ingresar su correo electrónico y contraseña para acceder al sistema. También se ofrece la opción de 'Recordarme'.

## Vista de Registro de Usuario (Sing Up)

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-d1012f45.jpg](https://i.postimg.cc/pVSGVdhm/Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-d1012f45.jpg)](https://postimg.cc/LhzBN2VS)

Esta pantalla permite al usuario crear una nueva cuenta proporcionando su nombre, correo electrónico contraseña y repetir contraseña, el sistema valida los datos antes de registrarlo.

## Vista del Dashboard (Panel de Control)

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-41e81c47.jpg](https://i.postimg.cc/ZKtTB4Xq/Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-41e81c47.jpg)](https://postimg.cc/JtxwSVrw)

Sirve como una vista principal o resumen del sistema. Es lo primero que los usuarios ven cuando inician sesión en el panel administrativo, y su función principal es mostrar información clave o accesos rápidos de forma visual y resumida. En este caso nos muestra quien esta registrado, edit  materiales- En esta interfaz podemos editar los materiales, los cuales después podemos guardarlos cambios y podemos borrar. Crear pedidos- En la interfaz para crear pedidos dentro del proyecto, el usuario debe seleccionar un material y verá información como el nombre del material, su descripción, la cantidad disponible en stock y el precio por unidad. Además, deberá ingresar la cantidad que desea pedir y el precio por unidad. Para asegurar la validez de los datos, se establecen reglas: la cantidad debe ser un número entero y mínimo 1, por lo tanto, si el usuario ingresa un número decimal, un texto o un valor menor que 1, el sistema mostrará un mensaje de error indicando que debe ingresar un número entero mayor o igual a uno. De la misma manera, el precio por unidad también debe ser mínimo 1, y si se ingresa un valor menor, se mostrará un mensaje de advertencia correspondiente. Estas validaciones garantizan que los pedidos sean correctos y que no se procesen datos inválidos.

## Vista de Materiales

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-6aa6c857.jpg](https://i.postimg.cc/Y2Q5Pgyp/Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-6aa6c857.jpg)](https://postimg.cc/rzFZ0dkb)

En el apartado de materiales se presentan los siguientes elementos: Nombre, Descripción, Cantidad disponible y Precio por unidad. Cada uno de estos campos puede ser editado individualmente, permitiendo modificar los registros según sea necesario. Además, se incluye una opción para agregar materiales al carrito, y como funcionalidad final, se dispone de un botón para registrar o crear un nuevo material. 

## Crear Materiales



## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
