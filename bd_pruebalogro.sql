-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 18:24:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_pruebalogro`
--
CREATE DATABASE IF NOT EXISTS `bd_pruebalogro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_pruebalogro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ubicacion` varchar(150) NOT NULL,
  `estado` varchar(20) DEFAULT 'pendiente',
  `ciudadano` varchar(100) NOT NULL,
  `telefono_ciudadano` varchar(15) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`id`, `titulo`, `descripcion`, `ubicacion`, `estado`, `ciudadano`, `telefono_ciudadano`, `fecha_registro`) VALUES
(2, 'Vandalismo en parque', 'Grafitis realizados en las paredes del parque', 'Parque Los Olivos', 'en proceso', 'Luis Torres', '912345678', '2024-10-30 10:22:26'),
(3, 'Basura acumulada', 'Acumulación de basura en la calle principal', 'Calle Mayor 45', 'pendiente', 'Ana Ramírez', '923456789', '2024-10-30 10:22:26'),
(4, 'Maltrato animal', 'Perro abandonado en condiciones deplorables', 'Avenida Lima 123', 'resuelta', 'Clara Gutiérrez', '934567890', '2024-10-30 10:22:26'),
(6, 'Bache en carretera', 'Hueco grande que afecta el tránsito de vehículos', 'Avenida del Sol', 'pendiente', 'María López', '956789012', '2024-10-30 10:22:26'),
(7, 'Fuga de agua', 'Fuga de agua en la esquina de la avenida', 'Esquina Avenida y Calle 5', 'en proceso', 'Pedro Martínez', '967890123', '2024-10-30 10:22:26'),
(8, 'Obstrucción de acera', 'Autos estacionados bloqueando el paso peatonal', 'Calle 12', 'resuelta', 'Sofía García', '978901234', '2024-10-30 10:22:26'),
(9, 'Fallo en alumbrado', 'Poste de luz no funciona en la esquina', 'Esquina Calle 9 y 10', 'pendiente', 'José Fernández', '989012345', '2024-10-30 10:22:26'),
(10, 'Contaminación de río', 'Derrame de residuos en el río local', 'Río Chillón', 'pendiente', 'Elena Rojas', '900123456', '2024-10-30 10:22:26'),
(11, 'Venta de alcohol a menores', 'Venta ilegal de alcohol a menores en la tienda', 'Tienda de Barrio', 'en proceso', 'Luis García', '911234567', '2024-10-30 10:22:26'),
(12, 'Acoso en espacio público', 'Persona reporta acoso en el parque', 'Parque Primavera', 'pendiente', 'Andrea Mendoza', '922345678', '2024-10-30 10:22:26'),
(13, 'Perro agresivo', 'Perro suelto que ha atacado a transeúntes', 'Callejón sin salida', 'resuelta', 'Ramiro Soto', '933456789', '2024-10-30 10:22:26'),
(14, 'Escombros en la calle', 'Escombros abandonados en plena vía pública', 'Callejón del Norte', 'pendiente', 'Nora Vázquez', '944567890', '2024-10-30 10:22:26'),
(15, 'Tala ilegal de árboles', 'Árboles talados sin permiso en la plaza', 'Plaza Principal', 'en proceso', 'Pablo Ruiz', '955678901', '2024-10-30 10:22:26'),
(16, 'Personas sin mascarilla', 'Personas incumpliendo medidas sanitarias', 'Centro Comercial', 'pendiente', 'Patricia Ortiz', '966789012', '2024-10-30 10:22:26'),
(17, 'Incendio forestal', 'Pequeño incendio en la zona forestal', 'Bosque Municipal', 'resuelta', 'Oscar Chávez', '977890123', '2024-10-30 10:22:26'),
(18, 'Venta de productos ilegales', 'Venta de productos sin regulación', 'Mercado San Juan', 'pendiente', 'Inés Peña', '988901234', '2024-10-30 10:22:26'),
(19, 'Calle bloqueada', 'Obras de construcción sin señalización adecuada', 'Avenida Principal', 'en proceso', 'Miguel Palacios', '999012345', '2024-10-30 10:22:26'),
(20, 'Contaminación sonora', 'Vehículo con alto volumen de música', 'Calle 8', 'pendiente', 'Ángela Quispe', '910123456', '2024-10-30 10:22:26'),
(21, 'Fallo de semáforo', 'Semáforo no funciona en intersección', 'Intersección Avenida Perú', 'pendiente', 'Fabiola García', '931234567', '2024-10-30 10:22:26'),
(22, 'Vehículo abandonado', 'Carro abandonado en la calle por más de 3 meses', 'Calle La Mar 150', 'en proceso', 'Hugo Díaz', '941234567', '2024-10-30 10:22:26'),
(23, 'Agua estancada', 'Acumulación de agua estancada que atrae mosquitos', 'Calle 13', 'pendiente', 'Silvia Pérez', '951234567', '2024-10-30 10:22:26'),
(24, 'Fuga de gas', 'Se percibe olor a gas en el edificio', 'Edificio Los Pinos', 'resuelta', 'Tomás Ríos', '961234567', '2024-10-30 10:22:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
