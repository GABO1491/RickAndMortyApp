# 🛸 Rick & Morty Characters App

Esta es una aplicación desarrollada en Laravel que consume la [API pública de Rick and Morty](https://rickandmortyapi.com), permite guardar personajes en una base de datos, consultarlos, ver detalles adicionales y editarlos desde una interfaz estilizada con diseño sci-fi.

---

## 👨‍💻 Funcionalidades principales

1. **Consumo de API externa**  
   Se consultan hasta 100 personajes desde `https://rickandmortyapi.com/api/character`.  
   En la vista principal se muestran:
   - `id`
   - `name`
   - `status`
   - `species`
   - `image`
   - Botón **Detalles**

2. **Vista Detalle**  
   Muestra campos adicionales:
   - `type`
   - `gender`
   - `origin.name`
   - `origin.url`
   - Imagen más grande

3. **Guardar en base de datos**  
   Botón para guardar los primeros 100 personajes consumidos localmente usando un modelo `Character`.

4. **Vista de personajes guardados**  
   Tabla paginada con opción de ver, editar y actualizar personajes.

---

## 📦 Instalación del proyecto

### 1. Clona el repositorio

```bash
git clone https://github.com/TU-USUARIO/RickAndMortyApp.git
cd RickAndMortyApp
2. Instala dependencias
bash
composer install
npm install && npm run dev
3. Crea el archivo de entorno
bash
cp .env.example .env
Edita en .env la configuración de base de datos:

env
DB_DATABASE=rickdb
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
4. Ejecuta las migraciones
bash
php artisan migrate
5. Inicia el servidor local
bash
php artisan serve
🧪 Script SQL para base de datos (SQL Server)
sql
IF NOT EXISTS (SELECT name FROM sys.databases WHERE name = 'rickdb')
BEGIN
    CREATE DATABASE rickdb;
END;
GO

USE rickdb;
GO

IF OBJECT_ID('dbo.characters', 'U') IS NULL
BEGIN
    CREATE TABLE dbo.characters (
        id BIGINT NOT NULL PRIMARY KEY,
        name NVARCHAR(255) NOT NULL,
        status NVARCHAR(255),
        species NVARCHAR(255),
        type NVARCHAR(255),
        gender NVARCHAR(255),
        origin_name NVARCHAR(255),
        origin_url NVARCHAR(255),
        image NVARCHAR(255),
        created_at DATETIME NULL,
        updated_at DATETIME NULL
    );
END;
GO
⚙️ Funciones disponibles
GET /characters → Muestra personajes almacenados

GET /characters/{id} → Detalles de un personaje

GET /characters/fetch → Consume API y guarda hasta 100 registros

GET /characters/{id}/edit → Edita personaje

🎨 Extras
Interfaz inspirada en Rick and Morty

Fondo temático, botones animados y diseño responsive

Tipografía digital y elementos flotantes con personalidad

📸 Capturas de pantalla

### Vista principal
![Vista principal](https://raw.githubusercontent.com/GABO1491/RickAndMortyApp/public/screenshots/vista-principal.png)
![Vista principal](https://raw.githubusercontent.com/GABO1491/RickAndMortyApp/main/public/screenshots/vista-principal_1.png)

### Detalle del personaje
![Detalle del personaje](https://raw.githubusercontent.com/GABO1491/RickAndMortyApp/main/public/screenshots/detalle-personaje.png)

### Formulario de edición
![Formulario editar](https://raw.githubusercontent.com/GABO1491/RickAndMortyApp/main/public/screenshots/editar-personaje.png)

📫 Autor
Desarrollado por Marcos Framework: Laravel 10+ Estilo visual: Personalizado con estética interdimensional API: rickandmortyapi.com
