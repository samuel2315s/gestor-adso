# 📋 Gestor ADSO

Sistema web desarrollado con **Laravel y PHP** para la gestión de información relacionada con el programa de formación **Análisis y Desarrollo de Software (ADSO)**.

Este documento explica paso a paso cómo instalar las herramientas necesarias, crear y configurar el proyecto, conectar la base de datos MySQL, ejecutar las migraciones y poner en funcionamiento el servidor local.

---

## 📌 1. Información general del proyecto

**Nombre:** Gestor ADSO  
**Tipo de aplicación:** Aplicación web  
**Framework:** Laravel  
**Lenguaje de programación:** PHP  
**Base de datos:** MySQL  
**Entorno de desarrollo:** Visual Studio Code y XAMPP  
**Sistema operativo:** Windows  
**Control de versiones:** Git

### 🎯 Propósito

Gestor ADSO tiene como propósito servir como una aplicación web para organizar y administrar información mediante una base de datos relacional.

El proyecto utiliza Laravel para estructurar el código, gestionar las rutas y facilitar las operaciones con la base de datos. Las migraciones permiten definir y crear las tablas de manera organizada, facilitando el mantenimiento y la evolución del sistema.

> **Nota:** Las funcionalidades específicas del gestor dependerán de los módulos, modelos, controladores y migraciones que se desarrollen durante el proyecto.

---

## 🛠️ 2. Herramientas y versiones verificadas

Las siguientes versiones fueron verificadas directamente en el equipo mediante los comandos correspondientes.

| Herramienta | Versión verificada | Comando |
|---|---|---|
| PHP | 8.2.12 (CLI) | `php -v` |
| Composer | 2.10.3 | `composer -V` |
| Laravel Framework | 12.69.3 | `php artisan --version` |
| Git | 2.55.0.windows.3 | `git --version` |
| Visual Studio Code | Editor de código | — |
| XAMPP | Entorno local | — |

**¿Para qué sirve cada herramienta?**

- **PHP:** lenguaje de programación utilizado para desarrollar la lógica del sistema.
- **Composer:** administrador de dependencias de PHP; permite instalar las bibliotecas que necesita Laravel.
- **Laravel:** framework que proporciona una estructura para desarrollar aplicaciones web.
- **Git:** herramienta para registrar cambios y controlar las versiones del código.
- **Visual Studio Code:** editor utilizado para escribir y modificar los archivos del proyecto.
- **XAMPP:** entorno local que proporciona servicios como Apache, MySQL/MariaDB y herramientas de administración como phpMyAdmin.

**Importante:** Las versiones indicadas corresponden a las verificadas en el equipo. Al crear un proyecto nuevo, la versión de Laravel instalada puede variar según las versiones disponibles y las restricciones de Composer.

---

## 📋 3. Requisitos previos

Antes de comenzar, se debe comprobar que las herramientas estén instaladas y funcionen correctamente.

### Paso 1. Abrir la consola

En Windows, se puede utilizar CMD o PowerShell.

Para abrir CMD:

1. Presionar `Windows + R`.
2. Escribir `cmd`.
3. Presionar `Enter`.

### Paso 2. Verificar PHP

Ejecutar:

```cmd
php -v
```

La salida debe indicar PHP 8.2.12 o la versión que se encuentre instalada.

PHP permite ejecutar los comandos de Laravel desde la consola.

### Paso 3. Verificar Composer

Ejecutar:

```cmd
composer -V
```

Debe aparecer la versión de Composer instalada.

Si el comando no se reconoce, se debe comprobar la instalación de Composer y que su ubicación esté agregada a la variable de entorno `PATH`.

### Paso 4. Verificar Git

Ejecutar:

```cmd
git --version
```

Este comando permite comprobar que Git está disponible para el control de versiones.

### Paso 5. Verificar Laravel

Este comando debe ejecutarse dentro de la carpeta de un proyecto Laravel:

```cmd
php artisan --version
```

Si todavía no se ha creado el proyecto, se debe continuar con el siguiente apartado y ejecutar el comando después de la instalación.

---

## 🚀 4. Crear el proyecto Laravel

### Paso 1. Ir a la carpeta Documentos

En CMD, ejecutar:

```cmd
cd %USERPROFILE%\Documents
```

Este comando abre la carpeta Documentos del usuario de Windows.

### Paso 2. Crear el proyecto

Ejecutar:

```cmd
composer create-project laravel/laravel gestor-adso
```

Composer descargará Laravel e instalará sus dependencias dentro de una nueva carpeta llamada `gestor-adso`.

Se debe esperar hasta que termine el proceso.

### Paso 3. Ingresar a la carpeta del proyecto

```cmd
cd gestor-adso
```

### Paso 4. Comprobar la versión de Laravel

```cmd
php artisan --version
```

La versión registrada durante la verificación del equipo fue Laravel Framework 12.69.3.

Si aparece otra versión, se debe comprobar la versión instalada antes de continuar.

### Paso 5. Abrir el proyecto en Visual Studio Code

Desde la carpeta del proyecto, ejecutar:

```cmd
code .
```

El punto indica que se abrirá la carpeta actual.

Si el comando `code` no está disponible, se puede abrir Visual Studio Code y seleccionar **Archivo → Abrir carpeta**, eligiendo la carpeta `gestor-adso`.

---

## ⚙️ 5. Configurar las variables de entorno

Laravel utiliza el archivo `.env` para almacenar la configuración local de la aplicación, incluida la conexión con la base de datos.

### Paso 1. Comprobar el archivo `.env`

En la raíz del proyecto, verificar que exista el archivo:

```text
gestor-adso/.env
```

Este archivo normalmente se genera durante la creación del proyecto.

Si no existe, en CMD ejecutar:

```cmd
copy .env.example .env
php artisan key:generate
```

Si el archivo ya existe, no es necesario copiarlo nuevamente.

### Paso 2. Configurar la aplicación

Abrir `.env` en Visual Studio Code y comprobar los siguientes parámetros:

```env
APP_NAME="Gestor ADSO"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
```

La clave `APP_KEY` debe generarse con el comando `php artisan key:generate`. No se debe reemplazar por un texto inventado.

### Paso 3. Configurar la base de datos

En el mismo archivo `.env`, establecer los parámetros de conexión:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_adso
DB_USERNAME=root
DB_PASSWORD=
```

Estos valores corresponden a una configuración local habitual de XAMPP. Si MySQL utiliza otra contraseña, puerto o usuario, se deben ajustar de acuerdo con la configuración real del equipo.

**Importante:** El archivo `.env` contiene información de configuración que puede ser sensible. No se deben publicar contraseñas ni claves reales en GitHub.

---

## 🗄️ 6. Crear la base de datos MySQL

### Paso 1. Iniciar XAMPP

1. Abrir el panel de control de XAMPP.
2. Iniciar el servicio MySQL.
3. Comprobar que el servicio esté funcionando.

Apache solo necesita iniciarse si se va a utilizar phpMyAdmin mediante el servidor web de XAMPP.

### Paso 2. Abrir phpMyAdmin

Abrir el navegador e ingresar a:

`http://localhost/phpmyadmin`

### Paso 3. Crear la base de datos

En phpMyAdmin:

1. Seleccionar la opción para crear una nueva base de datos.
2. Escribir `gestor_adso` como nombre.
3. Seleccionar una intercalación compatible con `utf8mb4`, por ejemplo `utf8mb4_unicode_ci`.
4. Crear la base de datos.

También se puede ejecutar la siguiente sentencia SQL:

```sql
CREATE DATABASE gestor_adso
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

La base de datos debe llamarse igual que el valor de `DB_DATABASE` configurado en `.env`.

---

## 🔄 7. Ejecutar las migraciones de Laravel

Las migraciones permiten definir la estructura de las tablas de la base de datos mediante archivos de código.

### Paso 1. Comprobar la conexión

Desde la carpeta `gestor-adso`, ejecutar:

```cmd
php artisan migrate:status
```

Si la conexión está configurada correctamente, Laravel podrá consultar el estado de las migraciones.

Si aparece un error de conexión, revisar que MySQL esté iniciado y que las credenciales de `.env` sean correctas.

### Paso 2. Ejecutar las migraciones

```cmd
php artisan migrate
```

Laravel ejecutará las migraciones pendientes y creará las tablas definidas en los archivos de `database/migrations`.

Dependiendo de la estructura del proyecto, estas pueden incluir tablas para usuarios, caché, tareas en cola y otras funcionalidades. Las tablas propias de Gestor ADSO deberán estar definidas en sus respectivas migraciones.

### Paso 3. Comprobar las tablas creadas

Abrir phpMyAdmin, seleccionar la base de datos `gestor_adso` y revisar las tablas disponibles.

Si se agregan nuevas migraciones al proyecto, se puede volver a ejecutar:

```cmd
php artisan migrate
```

Laravel ejecutará las migraciones pendientes sin volver a ejecutar las que ya estén registradas como completadas.

### ⚠️ Reiniciar la base de datos en desarrollo

El siguiente comando elimina las tablas existentes y vuelve a ejecutar todas las migraciones:

```cmd
php artisan migrate:fresh
```

**Precaución:** Este comando puede eliminar los datos almacenados en las tablas. Debe utilizarse únicamente cuando sea necesario reiniciar la estructura de la base de datos y se tenga una copia de seguridad si los datos son importantes.

---

## ▶️ 8. Ejecutar el servidor local

### Paso 1. Abrir la terminal del proyecto

En Visual Studio Code, seleccionar **Terminal → Nueva terminal**.

Comprobar que la terminal esté ubicada en la carpeta `gestor-adso`.

### Paso 2. Iniciar Laravel

Ejecutar:

```cmd
php artisan serve
```

Si el servidor se inicia correctamente, aparecerá un mensaje similar a:

```text
INFO  Server running on [http://127.0.0.1:8000].
```

### Paso 3. Abrir la aplicación

Ingresar desde el navegador a:

http://127.0.0.1:8000

Laravel mostrará la página inicial disponible en el proyecto. Esto confirma que el servidor está funcionando, pero no significa necesariamente que todos los módulos del gestor estén terminados.

### Paso 4. Detener el servidor

Para detener el servidor local, volver a la terminal donde se está ejecutando y presionar:

```text
Ctrl + C
```

---

## 🧹 9. Solución de problemas frecuentes

### Error 1. `php` no se reconoce como comando

**Posible causa:** PHP no está instalado correctamente o su carpeta no está incluida en `PATH`.

**Solución:**

1. Comprobar la instalación de PHP.
2. Si se utiliza XAMPP, verificar la existencia de `C:\xampp\php\php.exe`.
3. Configurar la variable `PATH` para que incluya la carpeta de PHP, si corresponde.
4. Cerrar y volver a abrir la terminal.
5. Ejecutar `php -v` nuevamente.

### Error 2. `composer` no se reconoce como comando

**Posible causa:** Composer no está instalado o la terminal no encuentra su ejecutable.

**Solución:** Verificar la instalación de Composer y su configuración en la variable de entorno `PATH`.

### Error 3. Error de conexión con MySQL

**Posibles causas:**

- El servicio MySQL está detenido.
- El nombre de la base de datos no coincide.
- El puerto configurado es incorrecto.
- El usuario o la contraseña no son válidos.

**Solución:** Revisar XAMPP, comprobar los parámetros de `.env` y volver a ejecutar `php artisan migrate`.

### Error 4. Error al generar la clave de Laravel

Ejecutar:

```cmd
php artisan key:generate
```

Si el archivo `.env` no existe, crearlo primero a partir de `.env.example`.

### Error 5. Composer informa que OpenSSL ya está cargado

Si aparece un mensaje como:

```text
PHP Warning: Module "openssl" is already loaded
```

Puede existir una configuración duplicada de OpenSSL en el archivo `php.ini` utilizado por PHP.

Se debe comprobar qué archivo de configuración utiliza la consola:

```cmd
php --ini
```

Después, revisar el archivo `php.ini` indicado y buscar las declaraciones de OpenSSL, evitando cargar el mismo módulo dos veces. No se debe desactivar OpenSSL indiscriminadamente, ya que puede ser necesario para Composer.

---

## 📸 10. Evidencias del proceso

Las siguientes capturas deben guardarse en la carpeta `docs/img/` del proyecto.

| Evidencia | Archivo sugerido | Qué debe mostrar |
|---|---|---|
| Versiones instaladas | `versiones.png` | PHP, Composer, Laravel y Git |
| Verificación de Composer | `composer-powershell.png` | Composer funcionando en PowerShell |
| Creación del proyecto | `gestor-adso.png` | Proyecto creado y estructura de carpetas |
| Base de datos | `base-datos.png` | Base de datos y tablas en phpMyAdmin |
| Servidor en ejecución | `servidor.png` | Servidor Laravel iniciado correctamente |

Las imágenes deben agregarse realmente al repositorio para que se visualicen en GitHub.

Ejemplo de inserción en este README:



## 📁 11. Estructura general del proyecto

La estructura puede variar según los módulos que se desarrollen. Una estructura inicial habitual de Laravel es:

```text
gestor-adso/
├── app/
│   ├── Http/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
├── storage/
├── tests/
├── .env
├── .env.example
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

**Descripción de las carpetas principales:**

- `app/`: contiene la lógica principal de la aplicación, incluidos modelos y clases.
- `bootstrap/`: contiene archivos necesarios para iniciar Laravel.
- `config/`: almacena los archivos de configuración.
- `database/migrations/`: define la estructura de las tablas de la base de datos.
- `database/seeders/`: permite insertar datos iniciales o de prueba.
- `public/`: contiene el punto de entrada público y los recursos accesibles públicamente.
- `resources/`: almacena las vistas y otros recursos de la interfaz.
- `routes/`: define las rutas de la aplicación.
- `storage/`: almacena archivos generados, registros y otros recursos internos.
- `tests/`: contiene pruebas automatizadas.
- `.env`: guarda la configuración local del entorno.
- `composer.json`: define las dependencias y la configuración de Composer.
- `composer.lock`: registra las versiones concretas de las dependencias instaladas.

---

## 🌿 12. Control de versiones con Git

Para comprobar el estado del repositorio, ejecutar:

```cmd
git status
```

Si el proyecto todavía no tiene un repositorio Git inicializado, se puede ejecutar:

```cmd
git init
git add .
git commit -m "Inicializar proyecto Gestor ADSO"
```

Antes de agregar archivos al repositorio, comprobar que `.env` esté excluido mediante `.gitignore`. No se deben subir contraseñas, claves privadas ni datos sensibles.

Si el proyecto ya está conectado a un repositorio remoto, se deben seguir las instrucciones de ese repositorio para realizar los commits y subir los cambios.

---

## 👤 13. Información del autor

- **Proyecto:** Gestor ADSO
- **Programa de formación:** Análisis y Desarrollo de Software (ADSO)
- **Usuario del equipo:** `samuv`
- **Ruta local del proyecto:** `C:\Users\samuv\Documents\gestor-adso`
- **Entorno de desarrollo:** Windows, Visual Studio Code y XAMPP

---

## ✅ 14. Lista de comprobación final

Antes de dar por terminado el proceso de instalación, verificar los siguientes puntos:

- [ ] PHP funciona desde la terminal.
- [ ] Composer funciona desde la terminal.
- [ ] Git está instalado y disponible.
- [ ] El proyecto Laravel se creó correctamente.
- [ ] La versión de Laravel se verificó con Artisan.
- [ ] El archivo `.env` está configurado.
- [ ] La clave de la aplicación fue generada.
- [ ] La base de datos `gestor_adso` fue creada.
- [ ] MySQL está funcionando.
- [ ] Las migraciones se ejecutaron correctamente.
- [ ] Las tablas aparecen en phpMyAdmin.
- [ ] El servidor Laravel se inicia correctamente.
- [ ] La aplicación se abre en el navegador.
- [ ] Las evidencias se guardaron en `docs/img/`.
- [ ] El archivo `.env` no se publica en el repositorio.

---

**Documento técnico de instalación y configuración de Gestor ADSO.**

Las versiones documentadas corresponden a las verificaciones realizadas en el equipo del aprendiz. Los comandos y pasos descritos sirven como guía para reproducir la configuración inicial en un entorno local compatible.