Sistema de Reparaciones Electrónicas

Este es un sistema web que desarrollé para gestionar el ingreso de clientes, diagnóstico de dispositivos, asignación de precios y actualización de estados. Todo el acceso está protegido por login y uso de sesiones, así que solo pueden ingresar los usuarios autenticados.

Funcionalidades

Inicio de sesión con validación de sesión activa

Ingreso de nuevos clientes y dispositivos

Registro de formularios de reparación

Asignar diagnóstico y precio final a una reparación

Control del estado del dispositivo

Borrado lógico de formularios

Alertas con JavaScript y mensajes en pantalla

Interfaz limpia con Bootstrap

Estructura del proyecto

Proyecto/ ├── Controlador/ (Controladores del sistema: Index, Usuario, Reparaciones) ├── Modelo/ │ ├── Entidades/ (Clases como Usuario.php, Cliente.php, etc.) │ ├── Metodos/ (Métodos para interactuar con la base de datos: UsuarioM.php, ClienteM.php...) │ └── Conexion.php (Clase para conexión con la base de datos) ├── Vista/ (Frontend: Login, ingreso cliente, formularios...) │ └── Estilos/ (Estilos CSS como Bootstrap) ├── JS/ (JavaScript para búsquedas y validaciones) └── index.php (Archivo principal que enruta las acciones)

Requisitos

PHP 8 o superior

Servidor local tipo XAMPP

MySQL

Navegador web

Cómo usarlo

Clonar el repositorio: git clone https://github.com/Tonysk8cr/P1G5P3.git

Importar la base de datos usando el archivo SCRIPT SQL que viene incluido.

Copiar la carpeta en htdocs de XAMPP o en la ubicación que tengas configurada para el servidor local.

Sobre el inicio de sesión

Para ingresar al sistema hay que iniciar sesión con un usuario registrado en la base de datos. La verificación de sesión se hace al inicio de cada vista protegida. Si alguien intenta acceder sin haber iniciado sesión, lo redirige al formulario de login con una alerta.

Nota: Las contraseñas actualmente se comparan como texto plano, pero se puede mejorar fácilmente usando password_hash() y password_verify() para mayor seguridad.

Comentarios finales

Este proyecto lo hice con estructura MVC desde cero, sin frameworks. La idea es que sea fácil de escalar y se le puedan agregar más funcionalidades como control de roles, generación de reportes o integración con APIs.
