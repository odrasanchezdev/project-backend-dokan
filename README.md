# Do-Kan: Gestor de tareas multiusuario

## Descripción
> El tema central del proyecto, es la aplicación del desarrollo Backend. Con un "ToDo" personalizado para cada usuario. Implementa una arquitectura MVC, con persistencia de datos en MySQL.
> 
> La aplicación ofrece en un INDEX como punto de entrada, un sistema de inicio de sesión con validación frontend de correo y contraseña, y una funcionalidad de registro de usuarios que exige una contraseña de al menos 8 caracteres y su confirmación. La opción de "Recuperar contraseña" permite actualizar la clave en la base de datos, solicitando también un mínimo de 8 caracteres.
>
> Dentro de la aplicación, cada usuario autenticado puede crear, editar y eliminar sus propias tareas. Finalmente, se incluye una función de cierre de sesión para garantizar la seguridad.

<br>
<br>

## Estado del repositorio 📊️
<div align="center" style="display: inline_block">
<img src="https://img.shields.io/badge/Estado-Actualizado-071739?style=for-the-badge" />
<img src="https://img.shields.io/badge/Pruebas-Unitarias-071739?style=for-the-badge" />
<img src="https://img.shields.io/badge/Mantenimiento-Limitado%20a%20soporte-E3C39D?style=for-the-badge" />
</div>
<br>
<br>

## Tecnologías utilizadas 🔨
<div align="center" style="display: inline_block">
<img alt="CSS3" src="https://img.shields.io/badge/CSS-1572B6?&style=for-the-badge" />
<img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge" />
<img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge" />
<img alt="MYSQL" src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge" />
<img alt="Bootstrap" src="https://img.shields.io/badge/Bootstrap-563D7C?&style=for-the-badge" />
</div>
<br>

### Notas importantes ⚠
  - Los documentos cuentan con comentarios, observaciones y fórmulas en español (*The programs include comments, observations, and explanatory formulas written primarily in Spanish to help clarify the code and its purpose*).
<br>
<br>

## Instalación y configuración 🚀
<b>1️⃣ Requisitos</b>
1. XAMPP instalado (incluye Apache, PHP y MySQL).
2. Navegador web (Chrome, Firefox, etc.).

<b>2️⃣ Configuración del entorno</b>
1. Clona este repositorio: `git clone https://github.com/odrasanchezdev/project-backend-dokan`
2. Añade esta carpeta a htdocs en XAMPP:
``` C:\xampp\htdocs\mi_todolist ```
3. Inicia los servicios de Apache y MySQL desde el Panel de Control de XAMPP.
4. Abre http://localhost/phpmyadmin en tu navegador.
5. Crea una nueva base de datos, usando los querys que se encuentran en el archivo kanban.sql.
6. Importa el archivo database.sql incluido en el proyecto.

<b>3️⃣ Configuración del proyecto</b>
1. Abre el archivo de configuración (```conexion.php```) y actualiza los datos de conexión si es necesario:
```
$host = "YOURHOST";
$user = "YOURUSER";
$pass = "YOURPASS";
$db   = "dokan";
```
2. Guarda los cambios.

<b>4️⃣ Ejecución</b>
1. En tu navegador, visita:  ``` http://localhost/src/ ```
2. Regístrate o inicia sesión para usar la aplicación.
3. Agrega, edita o elimina tus tareas en la lista.

<br>
<br>


## Demo y documentación visual 🎬

Enlace a Behance: [Do-Kan by Odra Sanchez](https://www.behance.net/gallery/251835421/Do-Kan-Task-manager)

Enlace a video DEMO: [Do-Kan](https://www.canva.com/design/DAHOaDx1YiQ/_ilX1NKUSa0NO3yXm4FKXA/watch)

<br>
<br>

## Soporte ⚙
Si tienes alguna pregunta, encuentras un error en alguno de los documentos o deseas sugerir una mejora, ¡no dudes en abrir un issue en este repositorio! Me encantaría recibir tus comentarios.

* ¿Encontraste un error? Abre un issue y describe el problema.
* ¿Tienes una sugerencia? Abre un issue y comparte tu idea.

Acercate a mis redes sociales para atender tus dudas y sugerencias en la sección de [Contacto](#contacto-)
<br>
<br>

## Licencia ✅
Se permite el uso, copia y distribución de este proyecto, siempre y cuando se mantenga la atribución original y no se sublicencie. No se permite su distribución, modificación o uso comercial sin permiso expreso del autor.

Copyright (c) 2025 at Odra Sanchez. Enlace del perfil:
<div align="center" style="display: inline_block">
  
<a href="https://github.com/odrasanchezdev">![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)</a>
</div>
<br>

## Contacto 🌐
Si tienes alguna pregunta o sugerencia, no dudes en contactarme:
<div align="center" style="display: inline_block;">
  
 <a href="https://www.linkedin.com/in/odrasanchez/">![LinkedIn](https://img.shields.io/badge/-LinkedIn-004e89?style=for-the-badge)</a>
 <a href="https://odrasanchezdev.netlify.app/links/index.html">![LinkTree](https://img.shields.io/badge/-Linktree-071739?style=for-the-badge)</a>
 <a href="https://www.instagram.com/odrasanchezdev/">![Instagram](https://img.shields.io/badge/-Instagram-9f175b?style=for-the-badge)</a>
 <a href="https://ko-fi.com/odrasanchez">![Ko-fi](https://img.shields.io/badge/-Ko--fi-f45b69?style=for-the-badge)</a> 
</div>
