-- Script de referencia para la BD (opcional si usas migraciones)
CREATE DATABASE IF NOT EXISTS appsalon_mvc_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE appsalon_mvc_php;

-- Tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(60) NOT NULL,
  apellido VARCHAR(60) NOT NULL,
  email VARCHAR(120) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  telefono VARCHAR(15),
  admin TINYINT(1) DEFAULT 0,
  confirmado TINYINT(1) DEFAULT 0,
  token VARCHAR(20),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla servicios
CREATE TABLE IF NOT EXISTS servicios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(60) NOT NULL,
  precio DECIMAL(8,2) NOT NULL,
  descripcion TEXT,
  duracion INT DEFAULT 60,
  activo TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla citas
CREATE TABLE IF NOT EXISTS citas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  usuarioId INT NULL,
  total DECIMAL(10,2) NULL,
  estado ENUM('pendiente','confirmada','completada','cancelada') DEFAULT 'pendiente',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_citas_usuario FOREIGN KEY (usuarioId) REFERENCES usuarios(id) ON DELETE SET NULL
);

-- Tabla intermedia
CREATE TABLE IF NOT EXISTS citasServicios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  citaId INT NOT NULL,
  servicioId INT NOT NULL,
  CONSTRAINT fk_cs_cita FOREIGN KEY (citaId) REFERENCES citas(id) ON DELETE CASCADE,
  CONSTRAINT fk_cs_serv FOREIGN KEY (servicioId) REFERENCES servicios(id) ON DELETE CASCADE
);
