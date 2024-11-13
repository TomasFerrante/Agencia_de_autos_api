-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 03:51:37
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
-- Base de datos: `db_agencia_autos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `ID` int(11) NOT NULL,
  `ID_Vehiculo` int(11) NOT NULL,
  `Fecha_de_entrega` date NOT NULL,
  `Fecha_de_vencimiento` date NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alquileres`
--

INSERT INTO `alquileres` (`ID`, `ID_Vehiculo`, `Fecha_de_entrega`, `Fecha_de_vencimiento`, `Precio`) VALUES
(9, 2, '2024-10-09', '2024-10-17', 9600),
(10, 5, '2024-10-09', '2024-10-10', 9000),
(13, 6, '2024-10-02', '2024-10-16', 3000),
(14, 1, '2024-10-11', '2024-10-25', 4500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `Id` int(11) NOT NULL,
  `Titulo` text NOT NULL,
  `Comentario` text NOT NULL,
  `Valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`Id`, `Titulo`, `Comentario`, `Valoracion`) VALUES
(1, 'Muy buen auto!!!!', 'El Toyota Corolla 2017 que alquilé estaba impecable, con una pintura brillante y un interior bien cuidado, casi como si fuera nuevo. Su diseño sencillo pero elegante lo hace lucir moderno', 4),
(3, 'Testing 2', 'Testeo del put', 2),
(5, 'Nuevo Titulo Editado', 'Nuevo Comentario Editado', 5),
(6, 'Testeo', 'Creando reseña nueva', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Usuario` varchar(250) NOT NULL,
  `Contraseña` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Usuario`, `Contraseña`) VALUES
(2, 'webadmin', '$2y$10$coasoo4/KT2t88RTP6WHEeYHQ1YFNRsEydcMIwsL.84TWMLaIaHmm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `ID_Vehiculo` int(11) NOT NULL,
  `Patente` varchar(45) NOT NULL,
  `Modelo` varchar(45) NOT NULL,
  `Marca` varchar(45) NOT NULL,
  `Año_de_Modelo` year(4) NOT NULL,
  `Color` varchar(40) NOT NULL,
  `Imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`ID_Vehiculo`, `Patente`, `Modelo`, `Marca`, `Año_de_Modelo`, `Color`, `Imagen`) VALUES
(1, 'WET784', 'Corsa', 'Chevrolet', '2011', 'Gris', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQD_I820zEB6Aju3Lde_is6WHtNVPHZtGnffA&s'),
(2, 'AD652FG', 'Cronos', 'Fiat', '2022', 'Gris', 'https://cdn.motor1.com/images/mgl/gZjbE/s1/lanzamiento-fiat-cronos-s-design-ii-2022.jpg'),
(5, 'AC-345-FP', 'Corolla', 'Toyota', '2017', 'Blanco', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOP88qtc-3oSLow_KfQmCEsG2SvhNVnd2bJg&s'),
(6, 'AA-234-BB', 'Amarok', 'Volkswagen', '2017', 'Azul', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlfqqNm_agW2fTwSn9NQPeqTP9riPABJ4E1A&s');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
