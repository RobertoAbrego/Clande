CREATE DATABASE clande;
USE clande;



CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    rol ENUM('administrador','editor','lector') DEFAULT 'lector'
);

CREATE TABLE reparaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100),
    vehiculo VARCHAR(100),
    problema TEXT,
    estado VARCHAR(50),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO usuarios(nombre_usuario, password_hash, rol)
VALUES
(
    'admin',
    '$2y$10$EPOITtMH2vxoHlcUAxcXRO.OA3a0igP6N1QfphmAQWRNu3DvxvJL6',
    'administrador'
),
(
    'editor',
    '$2y$10$Pj4i4VC9rtFqxt3BSkn9UeviqpTnQB80/A6pY0lIPJnVWEmvwM1U6',
    'editor'
),
(
    'lector',
    '$2y$10$GsXvUglg7TT1tVsrDARVqOdVqGhhL5cBO32.3ZLyafeGudLyBPUZC',
    'lector'
);