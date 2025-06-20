-- Crear base de datos si no existe
IF NOT EXISTS (SELECT name FROM sys.databases WHERE name = 'rickdb')
BEGIN
    CREATE DATABASE rickdb;
END;
GO

USE rickdb;
GO

-- Crear tabla characters
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
