# Examen U2 SIS047 — API REST de Carreras y Estudiantes

Proyecto preparado para Laravel + MySQL. Contiene migraciones, modelos, controladores CRUD, seeders, rutas API y colección de Postman.

## Importante
Este paquete contiene el código de la aplicación para copiarlo dentro de un proyecto Laravel NUEVO. No incluye `vendor/` ni el framework de Laravel. Debes crear el proyecto con Composer y luego copiar/sobrescribir estos archivos.

## 1. Crear proyecto nuevo
En PowerShell o CMD:

```bash
composer create-project laravel/laravel examen_u2_torres
cd examen_u2_torres
php artisan install:api
```

Copia las carpetas `app`, `database`, `routes` y `postman` de este paquete dentro de la carpeta del proyecto Laravel recién creado, aceptando combinar archivos.

## 2. Configurar MySQL
Crea la base de datos en MySQL:

```sql
CREATE DATABASE examen_u2_torres CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Configura el archivo `.env` con tus credenciales reales:

```env
APP_NAME="Examen U2 API"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=examen_u2_torres
DB_USERNAME=root
DB_PASSWORD=
```

No publiques contraseñas reales en GitHub.

## 3. Migrar y cargar datos
```bash
php artisan migrate:fresh --seed
php artisan serve
```

## 4. Probar
Importa `postman/Examen_U2_Carreras_Estudiantes.postman_collection.json` en Postman.
Usa `Accept: application/json` en las solicitudes y `Content-Type: application/json` cuando envíes JSON.

URL base: `http://127.0.0.1:8000`

## 5. Commits solicitados por el examen
El examen exige mínimo 6 commits descriptivos. Hazlos durante el desarrollo, no todos al final. Ejemplo de secuencia:

```bash
git init
git add .
git commit -m "Configura proyecto Laravel y MySQL"
git add database/migrations
git commit -m "Crea migraciones de carreras y estudiantes"
git add app/Models
git commit -m "Agrega modelos y relaciones"
git add database/seeders
git commit -m "Carga datos de prueba"
git add app/Http/Controllers routes/api.php
git commit -m "Implementa CRUD REST y endpoint de relación"
git add postman README.md
git commit -m "Agrega colección Postman y documentación"
```

Para entregar en GitHub, crea un repositorio público y sigue las instrucciones de GitHub para conectar y subirlo. No se incluye un repositorio remoto porque debe ser tuyo.

## Endpoints
- `GET /api/carreras`
- `GET /api/carreras/{id}`
- `POST /api/carreras`
- `PUT /api/carreras/{id}`
- `DELETE /api/carreras/{id}` (409 si tiene estudiantes)
- `GET /api/estudiantes`
- `GET /api/estudiantes/{id}`
- `POST /api/estudiantes`
- `PUT /api/estudiantes/{id}`
- `DELETE /api/estudiantes/{id}`
- `GET /api/carreras/{id}/estudiantes`

## Sustentación
Debes poder explicar las migraciones, las claves primarias/foráneas, `$fillable`, `hasMany`, `belongsTo`, validación, códigos HTTP, eager loading y los commits. Revisa y prueba el proyecto en tu equipo antes de entregarlo.
