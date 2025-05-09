<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
    <b>Documentacion Proyecto Final Programación IV</b>
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

## Vista Crear Materiales

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-6e385a99.jpg](https://i.postimg.cc/SQLPd4JR/Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-6e385a99.jpg)](https://postimg.cc/hhjM4H8R)

En la pantalla de crear materiales, se presentan varios campos para el registro de un nuevo material. El primero es Nombre del material, donde se ingresa el nombre del artículo que se desea registrar. A continuación, se encuentra el campo de Descripción del material, destinado a brindar una breve descripción relacionada con el material ingresado. 

Seguidamente, está el campo de Cantidad disponible, en el cual se especifica la cantidad de unidades que estarán disponibles. Luego, el campo de Precio por unidad permite asignar el valor individual del material. 

Finalmente, se encuentran dos botones: Crear y Cancelar. El botón Crear guarda la información ingresada y la registra en la tabla correspondiente, haciéndola visible en el apartado de materiales. Por otro lado, el botón Cancelar limpia todos los campos, eliminando cualquier dato ingresado previamente.

## Vista editar un Material 

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-2556e319.jpg](https://i.postimg.cc/qMJpXjMf/Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-2556e319.jpg)](https://postimg.cc/G9f0bPyz)

Esta es la vista es para editar el material doonde el usuario podra editar un material si asI lo desea podra cambiar o escoger otro nombre para un producto, podra editar la cantidad que se desea haya en stock, cambiar si desea cambiar el precio a cada material por unidad y tambien aportar un apequeña descripción al material que se este editando.

## Vista del Carrito

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-96494a4b.jpg](https://i.postimg.cc/j2q4vGFn/Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-96494a4b.jpg)](https://postimg.cc/cgj3L5Zd)

Esta Pantalla es un desgloce de todos los materiales que se encuentren en stock dentro del sistema y tambien los materiales que el usuario desee crear en el momento antes de pasar al detalle de pedido para eso en la pantalla hay un boton llamado "New Item" que redirigira al usuario a la vista de materiales para crear un nuevo pedido.

Esta vista cuenta con la tabla donde se encuentra el desgloce con el nombre del material, la cantidad que el usuario desea ingresar y el precio total dependiendo de la cantidad de materiales, de igual forma cada linea al final cuenta con una accion de editar el producto si es que el usuario ya no se siente conforme con lo que había ingresado anteriormente.

## Vista Editar Material

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-6b3f0d94.jpg](https://i.postimg.cc/QtFTthwb/Imagen-de-Whats-App-2025-04-20-a-las-20-07-46-6b3f0d94.jpg)](https://postimg.cc/R6zFp5M6)

Esta es la vista es para cambiar el material y el usuario lograra entrar cuando presione el boton edit al final de la fila de cada material en la vista del carrito donde se encuentra el desgloce de los materiales seleccionados por el usuario, podra cambiar el material, cambiar la cantidad del material que desea llevary se mostrara el total a pagar de dicho material.

## Vista de Pedidos

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-3b22cb5f.jpg](https://i.postimg.cc/D0HkTds6/Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-3b22cb5f.jpg)](https://postimg.cc/tn3md6Bn)

Esta vista muestra el listado de pedidos realizados por los usuarios dentro del sistema 'Materiales
Don Luis'. Desde aquí se puede acceder a los detalles de cada pedido y crear uno nuevo.
Funcionalidades:
- Visualización de una lista de pedidos, con la fecha de compra y el precio pagado.
- Enlace para ver los detalles de cada pedido.
- Paginación de resultados.
- Botón para crear un nuevo pedido ('New pedidos').
Esta vista se conecta con la base de datos para mostrar los registros filtrados por usuario. Está
protegida por autenticación y solo es accesible si el usuario ha iniciado sesión.

## Vista Crear Pedidos 

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-3a7541c3.jpg](https://i.postimg.cc/VNDhwWPt/Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-3a7541c3.jpg)](https://postimg.cc/FfkpgcRF)

Crear pedidos- En la interfaz para crear pedidos dentro del proyecto, el usuario debe seleccionar un material y verá información como el nombre del material, su descripción, la cantidad disponible en stock y el precio por unidad. Además, deberá ingresar la cantidad que desea pedir y el precio por unidad. Para asegurar la validez de los datos, se establecen reglas: la cantidad debe ser un número entero y mínimo 1, por lo tanto, si el usuario ingresa un número decimal, un texto o un valor menor que 1, el sistema mostrará un mensaje de error indicando que debe ingresar un número entero mayor o igual a uno. De la misma manera, el precio por unidad también debe ser mínimo 1, y si se ingresa un valor menor, se mostrará un mensaje de advertencia correspondiente. Estas validaciones garantizan que los pedidos sean correctos y que no se procesen datos inválidos.

## Vista Detalle de Pedidos

[![Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-65635b07.jpg](https://i.postimg.cc/vT62WRg7/Imagen-de-Whats-App-2025-04-20-a-las-20-07-47-65635b07.jpg)](https://postimg.cc/Zv4LSML0)

En la sección de "Ver Detalles" podemos visualizar la información específica de un pedido realizado por un cliente. Se muestra el correo electrónico del cliente utilizado para ingresar al sistema, así como la fecha del pedido y el total a pagar. Más abajo, en el apartado de tabla, se presentan los materiales incluidos en el pedido. Esta tabla contiene los siguientes campos: nombre del material, que lista los materiales adquiridos; cantidad, que indica cuántas unidades de cada material fueron compradas; y subtotal, que muestra el resultado de multiplicar el precio unitario del material por la cantidad comprada. Por ejemplo, si se compran 2 aceites, se mostrará el precio total de esos dos aceites; si se adquieren 3 unidades de sal, se calculará el total correspondiente solo a esas 3 sales. Finalmente, en el campo de total, se realiza la suma global de todos los subtotales anteriores, representando el monto final del pedido. Como último elemento, se incluye un botón para volver a la lista, el cual permite regresar a la vista general de pedidos.
