-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-06-2024 a las 13:02:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zonafutbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calendario`
--

CREATE TABLE `Calendario` (
  `jornada_id` int(11) NOT NULL,
  `numero_jornada` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `equipo_local` int(11) NOT NULL,
  `equipo_visitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Calendario`
--

INSERT INTO `Calendario` (`jornada_id`, `numero_jornada`, `fecha`, `equipo_local`, `equipo_visitante`) VALUES
(1, 1, '2023-08-12 22:00:00', 2, 5),
(2, 1, '2023-08-11 21:30:00', 8, 9),
(3, 1, '2023-08-12 19:00:00', 10, 11),
(4, 2, '2023-08-18 21:30:00', 12, 8),
(5, 2, '2023-08-19 17:00:00', 11, 2),
(6, 3, '2023-08-27 17:00:00', 5, 9),
(7, 11, '2023-10-14 18:30:00', 9, 12),
(8, 14, '2023-11-04 21:00:00', 16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clasificacion`
--

CREATE TABLE `Clasificacion` (
  `clasificacion_id` int(11) NOT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `partidos_jugados` int(11) DEFAULT NULL,
  `partidos_ganados` int(11) DEFAULT NULL,
  `partidos_empatados` int(11) DEFAULT NULL,
  `partidos_perdidos` int(11) DEFAULT NULL,
  `goles_a_favor` int(11) DEFAULT NULL,
  `goles_en_contra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Clasificacion`
--

INSERT INTO `Clasificacion` (`clasificacion_id`, `equipo_id`, `posicion`, `puntos`, `partidos_jugados`, `partidos_ganados`, `partidos_empatados`, `partidos_perdidos`, `goles_a_favor`, `goles_en_contra`) VALUES
(1, 23, NULL, 0, 0, 0, 0, 0, 0, 0),
(2, 16, NULL, 0, 1, 0, 0, 1, 4, 5),
(3, 14, NULL, 0, 0, 0, 0, 0, 0, 0),
(4, 19, NULL, 0, 0, 0, 0, 0, 0, 0),
(5, 20, NULL, 0, 0, 0, 0, 0, 0, 0),
(6, 22, NULL, 0, 0, 0, 0, 0, 0, 0),
(7, 24, NULL, 0, 0, 0, 0, 0, 0, 0),
(8, 2, NULL, 7, 3, 2, 1, 0, 7, 5),
(9, 21, NULL, 0, 0, 0, 0, 0, 0, 0),
(10, 18, NULL, 0, 0, 0, 0, 0, 0, 0),
(11, 7, NULL, 0, 0, 0, 0, 0, 0, 0),
(12, 5, NULL, 0, 1, 0, 0, 1, 0, 1),
(13, 17, NULL, 0, 0, 0, 0, 0, 0, 0),
(14, 25, NULL, 0, 0, 0, 0, 0, 0, 0),
(15, 10, NULL, 0, 1, 0, 0, 1, 0, 1),
(16, 9, NULL, 0, 1, 0, 0, 1, 0, 1),
(17, 8, NULL, 3, 1, 1, 0, 0, 1, 0),
(18, 12, NULL, 0, 0, 0, 0, 0, 0, 0),
(19, 6, NULL, 0, 0, 0, 0, 0, 0, 0),
(20, 11, NULL, 4, 2, 1, 1, 0, 2, 1),
(21, 15, NULL, 0, 0, 0, 0, 0, 0, 0),
(22, 13, NULL, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comentarios`
--

CREATE TABLE `Comentarios` (
  `comentario_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `entidad_tipo` enum('noticia','partido','jugador') DEFAULT NULL,
  `entidad_id` int(11) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `noticia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Comentarios`
--

INSERT INTO `Comentarios` (`comentario_id`, `usuario_id`, `entidad_tipo`, `entidad_id`, `contenido`, `fecha_publicacion`, `noticia_id`) VALUES
(3, 11, NULL, NULL, 'peque cabron quedate', '2024-06-06 17:39:50', 7),
(4, 11, NULL, NULL, 'peque cabron quedate', '2024-06-06 17:40:27', 7),
(5, 16, NULL, NULL, 'ninja que se venga pal sevilla carajo\r\n', '2024-06-06 17:53:47', 7),
(6, 16, NULL, NULL, 'oleee', '2024-06-06 18:00:38', 1),
(7, 13, NULL, NULL, 'becasesee cabrooon', '2024-06-06 18:19:15', 5),
(8, 11, NULL, NULL, 'grande pitu calva de epoca\r\n', '2024-06-06 18:25:51', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipos`
--

CREATE TABLE `Equipos` (
  `equipo_id` int(11) NOT NULL,
  `nombre_equipo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `escudo_url` varchar(255) DEFAULT NULL,
  `fecha_fundacion` date DEFAULT NULL,
  `sede` varchar(255) DEFAULT NULL,
  `entrenador_principal` varchar(100) DEFAULT NULL,
  `estadio_principal` varchar(100) DEFAULT NULL,
  `color_primario` varchar(50) DEFAULT NULL,
  `color_secundario` varchar(50) DEFAULT NULL,
  `pagina_web_oficial` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Equipos`
--

INSERT INTO `Equipos` (`equipo_id`, `nombre_equipo`, `descripcion`, `escudo_url`, `fecha_fundacion`, `sede`, `entrenador_principal`, `estadio_principal`, `color_primario`, `color_secundario`, `pagina_web_oficial`, `twitter`, `tiktok`, `instagram`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(2, 'Elche Club de Fútbol', 'El Elche Club de Fútbol, S. A. D. es un club de fútbol con sede en el municipio español de Elche. Fue fundado el 28 de agosto de 1922 a partir de la fusión de varios clubes ilicitanos. Disputa sus encuentros como local en el Estadio Martínez Valero, con capacidad para 33 732 espectadores. Desde la temporada 2023-24 compite en la Segunda División de España.\n\nEl Elche ha disputado 24 temporadas en Primera División (40 en Segunda), ocupando el 25.ª puesto en la clasificación histórica de Primera División. En la temporada 1958-59 logró su primer ascenso a Primera División, permaneciendo doce temporadas consecutivas y alcanzando un quinto puesto como mejor clasificación en la temporada 1963-64. En la competición nacional de copa —actual Copa del Rey—, alcanzó el subcampeonato de Copa de 1969, enfrentándose en la final disputada en el Estadio Santiago Bernabéu al Athletic Club, cuyo resultado fue de 1-0 favorable a los vascos.', '663bb746e7f5e-Escudo_Elche_CF.png', '1923-01-10', 'Elche', 'Sebastián Beccacece', 'Martínez Valero', '#05642c', '#ffffff', 'https://www.elchecf.es', 'elchecf', 'elchecf', 'elchecf', '2024-05-08 17:32:54', '2024-06-05 18:11:46'),
(3, 'asa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 17:07:43', '2024-05-11 17:07:43'),
(5, 'Racing Club de Ferrol', 'El Racing Club de Ferrol, S.A.D. (conocido como Racing de Ferrol, o simplemente Racing) es un club de fútbol español de la ciudad de Ferrol, provincia de La Coruña, Galicia que compite en Segunda División de España. Fue fundado el 5 de octubre de 1919 a partir de la unión del Racing Club y el Club Ferrol. El equipo disputa sus partidos como local en el Estadio Municipal de A Malata, con capacidad para 11 922 espectadores, y el verde es el color tradicional del uniforme del club.\r\n\r\nEs el equipo que más temporadas ha disputado en Segunda División sin haber logrado nunca el ascenso a Primera, un total de 35 campañas, en las que ha conseguido un subcampeonato en 1940 y tres terceros puestos. Fue subcampeón de la Copa del Rey en 1939 y ha logrado varios campeonatos regionales gallegos.', '664396e9cf80d-ferrol.png', '1919-10-05', 'Ferrol', 'Cristobal Parralo', 'A Malata', '#175438', '#ffffff', 'https://racingclubferrol.net', 'racingferrolsad', 'racingclubferrol', 'racingclubferrolsad', '2024-05-14 16:52:57', '2024-06-05 18:12:05'),
(6, 'SD Amorebieta', 'La Sociedad Deportiva Amorebieta es un club de fútbol de España, de la ciudad de Amorebieta-Echano en la provincia de Vizcaya (País Vasco). Fundada en 1925, en la actualidad juega la Segunda División de España.', '66439aa59bfd2-amorebieta.png', '2002-10-12', 'Amorebieta-Echano', 'Jandro Castro', 'Urritxe', '#3063a8', '#dde96d', 'https://sdamorebieta.eus', 'SDAmorebieta', 'sdamorebieta', 'sdamorebieta', '2024-05-14 17:08:53', '2024-06-05 18:12:21'),
(7, 'Levante Unión Deportiva', 'El Levante Unión Deportiva, S. A. D. es un club de fútbol de la ciudad de Valencia, en España. En 1909 se fundan el Levante Fútbol Club y el Gimnástico Fútbol Club, coincidiendo con la fundación de la Federación Valenciana de Fútbol. Ambos se fusionaron en 1939 con el nombre de Unión Deportiva Levante-Gimnástico, pasando a denominarse Levante Unión Deportiva en 1941. El Levante es considerado como club decano del fútbol valenciano. ​ Actualmente milita en la Segunda División de España. Disputa sus encuentros como local en el Estadio Ciudad de Valencia, que dispone de una capacidad de 26 354 espectadores.\r\n\r\nEn el plano nacional su mejor resultado en Primera División fue la sexta posición en 2011-12, a seis puntos de la tercera plaza. El 2 de febrero de 2020 disputó su partido 500 en la máxima categoría. En la clasificación histórica del fútbol español ocupa el 26.º puesto, habiendo disputado 16 ediciones en la máxima categoría. A nivel internacional ha participado en una ocasión en la Liga Europa de la UEFA en 2012-13, llegando a los octavos de final. En 2023 la Real Federación Española de Fútbol reconoció la denominada Copa Presidente de la República-Copa de la España Libre de 1937 como competición oficial, sumándose al palmarés nacional del club con las ligas de Segunda División de 2003-04 y 2016-17.\r\n\r\nEl equipo toma el nombre de la playa de Levante, donde estaba ubicado su campo de juego a principios del siglo xx, el camp de la platgeta (\"campo de la playita\"). Debido a sus orígenes en el barrio marítimo del Cabañal-Cañamelar, siempre ha sido considerado como el equipo del Cabañal.', '66439b8e9987d-levante.png', '1909-09-09', 'Valencia', 'Felipe Miñambres', 'Ciutat de Valencia', '#001b3f', '#69000f', 'https://www.levanteud.com', 'levanteud', 'levanteud', 'levanteud', '2024-05-14 17:12:46', '2024-06-05 18:12:36'),
(8, 'Real Valladolid Club de Fútbol', 'El Real Valladolid Club de Fútbol, S. A. D. es un club de fútbol español organizado como sociedad anónima deportiva en la ciudad de Valladolid, comunidad autónoma de Castilla y León. Juega en la Segunda División de España. Actualmente el club está presidido por Ronaldo Nazario.\r\n\r\nFue fundado el 20 de junio de 1928, fruto de la fusión del Club Deportivo Español y la Real Unión Deportiva.​ Los colores que identifican al club son el violeta y el blanco, utilizados en forma de rayas verticales en su uniforme titular desde su fundación. Desde 1982 juega como local en el Estadio José Zorrilla, de propiedad municipal, y con capacidad para 27 618 espectadores.\r\n\r\nCuenta en su palmarés con la edición de 1984 de la desaparecida Copa de la Liga, así como con tres campeonatos de Segunda División y cuatro de Tercera.​ Ha sido subcampeón de la Copa del Rey en dos ocasiones (1949-50 y 1988-89), y ha participado en dos ediciones de la Copa de la UEFA (1984-85 y 1997-98) y una de la también desaparecida Recopa de la UEFA (1989-90). Además, también ganó la Copa Federación en la temporada 1952-53 y fue subcampeón en la 1944-45. Su equipo filial, el Real Valladolid Promesas, milita actualmente en la Segunda División RFEF.\r\n\r\nEs el club de fútbol más importante de Castilla y León por palmarés e historia, con un total de 45 temporadas en Primera División, 37 en Segunda y 9 en Tercera. Históricamente, es el decimotercer mejor equipo de España. Dos de sus jugadores se han alzado con el Trofeo Pichichi: Manuel Badenes y Jorge da Silva; y diez han sido internacionales con la selección española.', '66439cc58c17f-584ad354b519ea740933a8d1.png', '1928-06-20', 'Valladolid', 'Paulo Pezzolano', 'José Zorrilla', '#a058ae', '#ffffff', 'https://www.realvalladolid.es', 'realvalladolid', 'realvalladolid', 'realvalladolid', '2024-05-14 17:17:57', '2024-06-05 18:12:47'),
(9, 'Real Sporting de Gijón', 'El Real Sporting de Gijón, S. A. D., más conocido como Sporting de Gijón o simplemente Sporting es un club de fútbol profesional español en la ciudad de Gijón, Asturias. Fue fundado bajo la denominación de Sporting Club Gijonés.\r\n\r\nParticipa desde 2017 en la segunda categoría de la Liga Nacional de Fútbol Profesional, la Segunda División de España, de la cual es líder en su clasificación histórica, si bien está considerado como uno de los clubes referentes del fútbol español y de su máxima categoría de Primera División, en la que ocupa el decimosexto puesto tras sus 42 presencias desde que esta fuera instaurada en 1929. En ella obtuvo como mayor éxito un subcampeonato en la temporada 1978-79, al que suma otros dos (1981 y 1982) del Campeonato de España de Copa, el torneo más antiguo del país. En el apartado internacional suma seis participaciones en la Copa de la UEFA —actual Liga Europa—. Obtuvo otros reconocimientos y títulos menores, entre los que destacan cinco Campeonatos de Liga de Segunda División —mismas que su máximo rival, el Real Oviedo, con quien disputa el derbi asturiano—, además de ser uno de los nueve equipos españoles que nunca han competido en una categoría inferior a la segunda.\r\n\r\nIdentificado por sus colores rojiblancos, y con entidad jurídica de sociedad anónima deportiva (S. A. D.), disputa sus encuentros como local en el estadio El Molinón desde 1913, bajo su originaria denominación de Sporting Gijonés. Organiza desde 1962 el Trofeo Villa de Gijón, y cuenta con 22 912 abonados y 126 peñas oficiales de aficionados.', '66439da622911-584ad35bb519ea740933a8d2.png', '1905-07-01', 'Gijón', 'Miguel Ángel Ramírez', 'El Molinón', '#ff0000', '#ffffff', 'https://www.realsporting.com', 'realsporting', 'realsporting', 'realsporting', '2024-05-14 17:21:42', '2024-06-05 18:13:00'),
(10, 'Real Racing Club de Santander', 'El Real Racing Club de Santander, S. A. D., más conocido como Racing de Santander, Real Racing Club o simplemente Racing, es un club de fútbol español con sede en la ciudad de Santander (Cantabria) que compite actualmente en Segunda División. Fue fundado el 23 de febrero de 1913 como Santander Racing Club.\r\n\r\nSe constituyó legalmente el 14 de junio de ese mismo año. En 1922, el rey Alfonso XIII le concedió el título de «real». Lo que le permite portar la corona en su escudo. Es el único equipo cántabro que ha disputado la Primera División de España, en la que ha permanecido un total de 44 temporadas.', '66439e6900404-584ad3cbb519ea740933a8e0.png', '1913-02-23', 'Santander', 'José Alberto López', 'El Sardinero', '#008000', '#ffffff', 'https://www.realracingclub.es', 'realracingclub', 'realracingclub', 'realracingclub', '2024-05-14 17:24:57', '2024-06-05 18:13:17'),
(11, 'Sociedad Deportiva Eibar', 'La Sociedad Deportiva Eibar, S. A. D. es un club de fútbol español con sede en la ciudad de Éibar en Guipúzcoa, País Vasco. Fue fundado el 30 de noviembre de 1940 y compite actualmente en la Segunda División de España.', '66439f3c39afc-584ad306b519ea740933a8c7.png', '1940-11-30', 'Eibar', 'Joseba Etxeberria', 'Ipurúa', '#1c2e6c', '#c81114', 'https://www.sdeibar.com', 'sdeibar', 'sdeibar', 'sdeibar', '2024-05-14 17:28:28', '2024-06-05 18:11:33'),
(12, 'Real Zaragoza', 'El Real Zaragoza es un club de fútbol español de la ciudad de Zaragoza, en Aragón, que disputa la Segunda División de España y la Copa del Rey. Pese a llevar once temporadas consecutivas en la segunda división, sigue siendo uno de los equipos con más títulos y más importantes en la historia del fútbol español. Fue fundado en 1932, tras el acuerdo de formar un único club que cogiera el testigo del Iberia Sport Club y el Zaragoza Club Deportivo, los dos clubes más importantes de la ciudad. Nacería bajo el nombre de Zaragoza Foot-ball Club y los colores de la Federación Aragonesa de Fútbol, azul y blanco, en su indumentaria principal, como señales de identidad. El origen de dicha idea, de club único y referente en la ciudad, se remonta a 1903, con la creación del Zaragoza Foot-Ball Club, primer club de fútbol fundado en Zaragoza y Aragón. Desde 1992 su entidad jurídica es la de sociedad anónima deportiva.', '6643a0700b991-584ad34cb519ea740933a8d0.png', '1932-03-18', 'Zaragoza', 'Victor Fernández', 'La Romareda', '#ffffff', '#0000de', 'https://www.realzaragoza.com', 'realzaragoza', 'realzaragoza', 'realzaragoza', '2024-05-14 17:33:36', '2024-06-05 18:11:17'),
(13, 'Villarreal Club de Fútbol \"B\"', 'El Villarreal Club de Fútbol “B” es el equipo filial del Villarreal Club de Fútbol, club de fútbol de la ciudad española de Villarreal (Castellón). Fue fundado en 1999 y actualmente juega en la Segunda División de España. Disputa sus partidos en la Ciudad Deportiva del Villarreal, pero en ocasiones ha disputado partidos en La Cerámica, donde juega el primer equipo.', '664f73914514e-584a9b57b080d7616d298779.png', '1999-01-01', 'Villarreal', 'Miguel Álvarez Jurado', 'Ciudad Deportiva del Villarreal', '#ffff00', '#ffff00', 'https://villarrealcf.es/', 'VillarrealCF', 'villarrealcf', 'villarrealcf', '2024-05-23 16:49:21', '2024-05-23 16:49:21'),
(14, 'Burgos Club de Fútbol', 'El Burgos Club de Fútbol, S. A. D. es un club de fútbol español con sede en la ciudad de Burgos, en la comunidad autónoma de Castilla y León. Actualmente juega en la Segunda División de España.\r\n\r\nEl genuino Burgos CF desapareció en 1983, según certifica la sentencia judicial número 502/2001 de 13 septiembre de la Audiencia Provincial de Burgos (Sección 2.ª), siendo fundado el actual Burgos CF en 1985 bajo la denominación de Club Deportivo Burgos Club de Fútbol, aunque no comenzó a competir hasta 1994.\r\n\r\n', '664f744735aa7-584ad7bfb519ea740933a955.png', '1985-08-13', 'Burgos', 'Jon Perez Bolo', 'El Plantío', '#ffffff', '#000000', 'https://www.burgoscf.es/', 'Burgos_CF', 'burgos_cf', 'burgos_cf', '2024-05-23 16:52:23', '2024-05-23 16:52:23'),
(15, 'Sociedad Deportiva Huesca', 'La Sociedad Deportiva Huesca, S. A. D. es un club de fútbol español de la ciudad de Huesca, en Aragón. Fue fundado en 1960 y actualmente juega en la Segunda División Española. Disputa sus partidos de local en el Estadio El Alcoraz, que cuenta con una capacidad para 9128 espectadores.\r\n\r\n', '664f7509c058c-Logo_of_SD_Huesca.svg.png', '1960-03-29', 'Huesca', 'Antonio Hidalgo', 'El Alcoraz', '#e90000', '#0c2065', 'https://www.sdhuesca.es/', 'sdhuesca', 'sdhuesca', 'sdhuesca', '2024-05-23 16:55:37', '2024-05-23 16:55:37'),
(16, 'Albacete Balompié', 'El Albacete Balompié S. A. D. es un club de fútbol español con sede en la ciudad de Albacete, en la comunidad autónoma de Castilla-La Mancha, que juega en la Segunda División.\r\n\r\nFue fundado el 1 de agosto de 1940 (por fusión de Club Deportivo Nacional y Albacete Fútbol Club) con el nombre de Sociedad Deportiva Albacete Fútbol Asociación, y modificó su denominación por la de Albacete Balompié en 1941.\r\n\r\nEl color que identifica al club es el blanco, que aparece en su uniforme titular desde su fundación. Desde 1960 juega como local en el Estadio Carlos Belmonte, de propiedad municipal, con capacidad para 17 524 espectadores.', '664f75bde7f62-584ad82fb519ea740933a962.png', '1939-07-05', 'Albacete', 'Alberto González', 'Carlos Belmonte', '#ffffff', '#000000', 'https://www.albacetebalompie.es/', 'AlbaceteBPSAD', 'albacetebp', 'albacetebp', '2024-05-23 16:58:37', '2024-05-23 16:58:37'),
(17, 'Real Club Deportivo Espanyol', 'El Real Club Deportivo Espanyol de Barcelona, S. A. D. (en catalán y oficialmente: Reial Club Deportiu Espanyol de Barcelona, S. A. D.)​ es un club de fútbol con sede en Barcelona, España. Si bien sus orígenes datan del año 1900 bajo la denominación de Sociedad Española de Foot-ball—,​ fue establecido oficialmente como club de fútbol en Barcelona el 28 de febrero de 1909 tras una reestructuración de diversos clubes deportivos bajo el nombre de Club Deportivo Español. Compite en la Segunda División de España.', '664f769a8d627-584ad3b5b519ea740933a8dd.png', '1900-10-28', 'Barcelona', 'Manolo González', 'RCDE Stadium', '#ffffff', '#0060d5', 'https://www.rcdespanyol.com/', 'rcdespanyol', 'rcdespanyol', 'RCDEspanyol', '2024-05-23 17:02:18', '2024-05-23 17:02:18'),
(18, 'Fútbol Club Cartagena', 'El Fútbol Club Cartagena es un club de fútbol de la ciudad de Cartagena en la Región de Murcia en España, que actualmente juega en la Segunda División de España.\r\n\r\nFue fundado el 25 de julio de 1995 como Cartagonova Fútbol Club y el club es una sociedad anónima deportiva (SAD) desde agosto del año 2010.​ Los colores que identifican al club son el negro y el blanco, utilizados en sus inicios con camiseta lisa blanca y pantalón negro y años más tarde también se han usado en forma de rayas verticales.\r\n\r\nCuenta en su palmarés con cuatro campeonatos de la extinta Segunda División B: (2005/2006), (2008/2009), (2017/2018) y (2019/2020). Además, también cuenta con dos campeonatos de la también extinta Tercera División conseguidos dentro del grupo murciano, el grupo XIII.\r\n\r\n', '664f77d0314c7-584ad4c8b519ea740933a8ff.png', '1995-07-25', 'Cartagena', 'Julian Calero', 'Cartagonova', '#000000', '#ffffff', 'https://www.fccartagena.es/', 'FcCartagena_efs', 'notiene', 'fccartagena', '2024-05-23 17:07:28', '2024-05-23 17:07:28'),
(19, 'Club Deportivo Eldense', 'El Club Deportivo Eldense, S. A. D es un equipo de fútbol español, constituido desde 2021 como una sociedad anónima deportiva. Tiene su origen en la ciudad de Elda, situada en el interior de la provincia de Alicante. Fue fundado en 1921, siendo el club decano de la provincia, tras la desaparición del Alicante C. F. En la actualidad milita en la Segunda División de España, siendo junto con el Elche C. F., uno de los dos únicos equipos de Alicante en la Liga de Fútbol Profesional.', '6651bf69377ce-55135e7c-bfe8-49e2-bbcd-c8551ba28eae-827.png', '1921-09-17', 'Elda', 'Fernando Estévez', 'Nuevo Pepico Amat', '#ff0000', '#00009a', 'https://www.cdeldense.es/', 'CD_Eldense', 'cd_eldense', 'cdeldense', '2024-05-25 10:37:29', '2024-05-25 10:37:29'),
(20, 'Club Deportivo Leganés', 'El Club Deportivo Leganés, S. A. D. es un club de fútbol español con sede en Leganés (Comunidad de Madrid) que actualmente juega en la Segunda División de España.\r\n\r\nLa entidad fue fundada en 1928 y no destacó a nivel nacional hasta que en la temporada 1992-93 logró subir a Segunda División. El debut en la Liga de Fútbol Profesional supuso también la transformación en sociedad anónima deportiva a partir de 1995. El club permaneció en la categoría de plata durante once cursos consecutivos hasta descender en 2003-04. Después de una década en Segunda B, volvió a Segunda en 2014 y dos años más tarde obtuvo el ascenso a Primera División como subcampeón de la edición 2015-16, en la que permaneció cuatro temporadas.', '6651c02f75f69-584ad55fb519ea740933a910.png', '1928-06-23', 'Madrid', 'Borja Jiménez', 'Butarque', '#ffffff', '#0057b7', 'https://www.cdleganes.com/', 'CDLeganes', 'cdleganes', 'cdleganes', '2024-05-25 10:40:47', '2024-05-25 10:40:47'),
(21, 'Futbol Club Andorra', 'El Futbol Club Andorra​ es un club de fútbol andorrano con sede en Andorra la Vieja. Fundado en 1942, desde 1948 participa en el sistema de ligas español. En la temporada 2021-22 se proclamó campeón del Grupo 2 de la Primera División RFEF, con lo que consiguió su ascenso a la Segunda División, siendo el primer club de su país en conseguirlo.', '66520c8b65b70-FC_Andorra_logo_team.png', '1942-10-15', 'Andorra', 'Fernando Costa Pinazo', 'Estadi Nacional', '#0000ff', '#ffdd00', 'https://www.fcandorra.com/', 'fcandorra', 'fcandorra', 'fcandorra', '2024-05-25 16:06:35', '2024-05-25 16:06:35'),
(22, 'Club Deportivo Mirandés', 'El Club Deportivo Mirandés, S. A. D. es un club de fútbol español con sede en la ciudad de Miranda de Ebro (provincia de Burgos). El equipo milita actualmente en la Segunda División de España y ejerce de local en el Estadio Municipal de Anduva, que cuenta con una capacidad de 5759 espectadores.\r\n\r\nLos colores que identifican al club son el rojo y el negro. En sus vitrinas consta dos títulos de liga de Segunda División B en el grupo II, cuatro títulos de liga de Tercera División, una Copa RFEF, dos Copa Castilla y León y el Trofeo Invicto Don Balón entre otros. Alcanzó un gran reconocimiento deportivo en 2012 al clasificarse para las semifinales de la Copa del Rey y ascender a la Segunda División por primera vez. Durante la temporada 2020-21, el presupuesto alcanza los 7,6 millones de € y el número de socios alcanza los 4389.\r\n\r\n', '665210d1d7fb7-584ad6bdb519ea740933a936.png', '1927-05-03', 'Miranda de Ebro', 'Alessio Lisci', 'Anduva', '#ef0000', '#000000', 'https://www.cdmirandes.com/', 'CDMirandes', 'c.d.mirandes', 'c.d.mirandes', '2024-05-25 16:24:49', '2024-05-25 16:24:49'),
(23, 'Agrupación Deportiva Alcorcón', 'La Agrupación Deportiva Alcorcón , S. A. D. es un club de fútbol español situado en la ciudad de Alcorcón, en la Comunidad de Madrid. Fue fundado en 1971 y juega en la Segunda División de España en la temporada 2023-24. ', '665211ef6ec24-8dd0a863-89dc-4f15-a020-115087e3afab-377.png', '1971-07-20', 'Madrid', 'Mehdi Nafti', 'Santo Domingo', '#fff400', '#00008c', 'https://www.adalcorcon.com/', 'Ad_alcorcon', 'ad_alcorcon', 'adalcorcon', '2024-05-25 16:29:35', '2024-06-03 14:12:43'),
(24, 'Club Deportivo Tenerife', 'El Club Deportivo Tenerife es un club de fútbol español de la ciudad de Santa Cruz de Tenerife que compite en la Segunda División. Se fundó el 8 de agosto de 1922, tras la constitución de una directiva presidida por Mario García Cames, manteniendo el mismo campo de juego, futbolistas e indumentaria que su inmediato antecesor, el Tenerife Sporting Club, entidad creada en noviembre de 1912 y que desapareció debido a una crisis. Por otro lado, su terreno de juego es el Estadio Heliodoro Rodríguez López, tras abandonar el Campo de Miraflores en 1925.', '6652135c4c447-584ad639b519ea740933a927.png', '1922-08-08', 'Tenerife', 'Asier Garitano', 'Heliodoro Rodríguez López', '#ffffff', '#0000dd', 'https://www.clubdeportivotenerife.es/', 'CDTOficial', 'cdtoficial', 'CDTOficial', '2024-05-25 16:35:40', '2024-05-25 16:35:40'),
(25, 'Real Oviedo', 'El Real Oviedo, S. A. D. es una sociedad anónima deportiva con sede en Oviedo (Asturias, España). Fue fundada oficialmente como un club de fútbol el 26 de marzo de 1926 como resultado de la fusión de los dos equipos de la ciudad, el Real Stadium Club Ovetense y el Real Club Deportivo Oviedo, bajo el nombre de (Sociedad Deportiva) Real Oviedo Foot-ball Club Actualmente milita en la Segunda División de España.\r\n\r\n', '6660aba0f0742-oviedo.png', '1926-03-26', 'Oviedo', 'Luis Carrión', 'Carlos Tartiere', '#0000dd', '#ffffff', 'https://www.realoviedo.es/', 'RealOviedo', 'notiene', 'realoviedo', '2024-05-25 16:40:59', '2024-06-05 18:17:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EstadisticasEquipos`
--

CREATE TABLE `EstadisticasEquipos` (
  `estadistica_id` int(11) NOT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `partido_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EstadisticasJugadores`
--

CREATE TABLE `EstadisticasJugadores` (
  `estadistica_id` int(11) NOT NULL,
  `jugador_id` int(11) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `partido_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EstadisticasPartidos`
--

CREATE TABLE `EstadisticasPartidos` (
  `estadistica_id` int(11) NOT NULL,
  `partido_id` int(11) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Etiquetas`
--

CREATE TABLE `Etiquetas` (
  `etiqueta_id` int(11) NOT NULL,
  `nombre_etiqueta` varchar(100) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `valor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Etiquetas`
--

INSERT INTO `Etiquetas` (`etiqueta_id`, `nombre_etiqueta`, `noticia_id`, `valor`) VALUES
(11, 'Equipo', 12, 18),
(12, 'Equipo', 13, 25),
(13, 'Equipo', 14, 2),
(14, 'Equipo', 15, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EventosPartido`
--

CREATE TABLE `EventosPartido` (
  `evento_id` int(11) NOT NULL,
  `partido_id` int(11) DEFAULT NULL,
  `tipo_evento` varchar(100) NOT NULL,
  `minuto` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `jugador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Jugadores`
--

CREATE TABLE `Jugadores` (
  `jugador_id` int(11) NOT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `posicion` varchar(50) DEFAULT NULL,
  `numero_camiseta` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `altura` decimal(5,2) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `historial` text DEFAULT NULL,
  `goles` int(11) DEFAULT NULL,
  `asistencias` int(11) DEFAULT NULL,
  `partidos_jugados` int(11) DEFAULT NULL,
  `tarjetas_amarillas` int(11) DEFAULT NULL,
  `tarjetas_rojas` int(11) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `tiktok_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Jugadores`
--

INSERT INTO `Jugadores` (`jugador_id`, `equipo_id`, `nombre`, `posicion`, `numero_camiseta`, `fecha_nacimiento`, `nacionalidad`, `altura`, `peso`, `historial`, `goles`, `asistencias`, `partidos_jugados`, `tarjetas_amarillas`, `tarjetas_rojas`, `imagen_url`, `descripcion`, `twitter_url`, `instagram_url`, `tiktok_url`) VALUES
(1, 2, 'Tete Morente', 'ei', 11, '1996-12-03', 'España', 180.00, 76.00, NULL, 0, 0, 0, 0, 0, '663fb8f09488f-tete.webp', 'Comenzó la temporada 2014-15 jugando en el equipo juvenil del Atlético de Madrid, hasta que el interior zurdo el año siguiente daría el salto al Atlético de Madrid \"B\", realizando una buena temporada en Tercera División.\r\n\r\nLa temporada 2016-17 militó en el C. D. Atlético Baleares en Segunda B disputado 23 partidos en Segunda B, disputando el play-off de ascenso a la categoría de plata.\r\n\r\nEn julio de 2017 firmó por el Club Gimnàstic de Tarragona, siendo el primer fichaje para su debut en la temporada 2017-18 en la Segunda División, firmando un contrato por dos temporadas. En enero de 2019 fue cedido al Club Deportivo Lugo hasta el final de la temporada 2018-19.\r\n\r\nLa temporada 2019-20 la inició en el C. D. Lugo, pero en el mercado de invierno fichó por el Málaga C. F. hasta junio de 2021.\r\n\r\nEl 16 de septiembre de 2020 firmó por el Elche C. F. por cuatro temporadas tras abonar al Málaga C. F. su cláusula de rescisión.  Con el equipo ilicitano tuvo la oportunidad de debutar en Primera División.', NULL, NULL, NULL),
(2, 16, 'Bernabé Barragán', 'por', 1, '1993-02-17', 'España', 189.00, 76.00, NULL, 0, 0, 0, 0, 0, '6652174898545-195404.png', 'Bernabé Barragán Maestre (Los Palacios y Villafranca, provincia de Sevilla, 18 de febrero de 1993), conocido en los medios deportivos como \"Bernabé\", es un futbolista español que juega de guardameta en el Albacete Balompié de la Segunda División de España.', NULL, NULL, NULL),
(3, 16, 'Diego Altube', 'por', 13, '2000-02-21', 'España', 188.00, 87.00, NULL, 0, 0, 0, 0, 0, '665217b96e2a5-d7fc3fd1fa0821eb565d9164eebf422e.png', 'aaa', NULL, NULL, NULL),
(5, 16, 'Jonathan Silva', 'li', 3, '1994-06-28', 'Argentina', 178.00, 72.00, NULL, 0, 0, 0, 0, 0, '6652193f83be7-189453-1445433144.webp', 'aaa', NULL, NULL, NULL),
(6, 16, 'Julio Alonso', 'li', 17, '1998-12-13', 'España', 171.00, 62.00, NULL, 0, 0, 0, 0, 0, '66549db03a2e4-393036.jpg', 'aaa', NULL, NULL, NULL),
(7, 16, 'Alvaro Rodríguez', 'ld', 23, '1994-07-22', 'España', 181.00, 77.00, NULL, 0, 0, 0, 0, 0, '66549e632d614-a3c600856b5879a86c3b6f72f34c7d2e.png', 'aaa', NULL, NULL, NULL),
(8, 16, 'Mohamed Djetei', 'dfc', 2, '1994-08-18', 'Cameŕun', 185.00, 75.00, NULL, 0, 0, 0, 0, 0, '66549ef8795de-2f2357e85bea5a07b5a379ae774d620d.png', 'aaa', NULL, NULL, NULL),
(9, 16, 'Kaiky', 'dfc', 15, '2004-01-11', 'Brasil', 181.00, 76.00, NULL, 0, 0, 0, 0, 0, '66549f546c711-5E6E0444-0F70-D4DF-7815BDB46230FC67.jpeg', 'aaa', NULL, NULL, NULL),
(10, 16, 'Carlos Isaac', 'ld', 22, '1998-04-29', 'España', 184.00, 74.00, NULL, 0, 0, 0, 0, 0, '66549f9996408-437820.png', 'aaa', NULL, NULL, NULL),
(11, 16, 'Cristian Glauder', 'dfc', 24, '1995-10-17', 'España', 183.00, 76.00, NULL, 0, 0, 0, 0, 0, '66549ff27d16b-p421012_t950_2023_1_002_000.jpg', 'aaa', NULL, NULL, NULL),
(12, 16, 'Agus Medina', 'mc', 4, '1994-09-07', 'España', 176.00, 72.00, NULL, 0, 0, 0, 0, 0, NULL, 'aa', NULL, NULL, NULL),
(13, 16, 'Rai Marchán', 'mc', 6, '1993-08-10', 'España', 181.00, 67.00, NULL, 0, 0, 0, 0, 0, NULL, 'aaa', NULL, NULL, NULL),
(14, 16, 'Manu Fuster', 'mco', 10, '1997-10-21', 'España', 169.00, 65.00, NULL, 0, 0, 0, 0, 0, NULL, 'aaa', NULL, NULL, NULL),
(15, 16, 'Lander Olaetxea', 'mc', 19, '1993-04-11', 'España', 179.00, 75.00, NULL, 0, 0, 0, 0, 0, NULL, 'aaa', NULL, NULL, NULL),
(16, 16, 'Juan Antonio Ros', 'mcd', 5, '1996-03-14', 'España', 188.00, 80.00, NULL, 0, 0, 0, 0, 0, NULL, 'aaa', NULL, NULL, NULL),
(17, 16, 'Riki', 'mc', 8, '1997-09-24', 'España', 175.00, 70.00, NULL, 0, 0, 0, 0, 0, NULL, 'aaa', NULL, NULL, NULL),
(18, 16, 'Pacheco', 'mc', 18, '2002-01-02', 'España', 184.00, 72.00, NULL, 0, 0, 0, 0, 0, NULL, 'aa', NULL, NULL, NULL),
(19, 16, 'Samuel Shashoua', 'ei', 20, '1999-05-12', 'Inglaterra', 176.00, 70.00, NULL, 0, 0, 0, 0, 0, NULL, '00', NULL, NULL, NULL),
(20, 16, 'Juanma García', 'ed', 7, '1993-02-19', 'España', 166.00, 64.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(21, 16, 'Fidel', 'ei', 11, '1989-10-26', 'España', 180.00, 74.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(22, 16, 'Escriche', 'dc', 16, '1998-03-23', 'España', 178.00, 75.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(23, 16, 'Higinio Marín', 'dc', 9, '1993-10-18', 'España', 184.00, 74.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(24, 16, 'Pedro Benito', 'dc', 14, '2000-03-26', 'España', 182.00, 78.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(25, 16, 'Alberto Quiles', 'dc', 21, '1995-04-26', 'España', 188.00, 70.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(26, 20, 'Dani Raba', 'ed', 10, '1995-10-29', 'España', 185.00, 76.00, NULL, 0, 0, 0, 0, 0, NULL, '00', NULL, NULL, NULL),
(27, 5, 'Iker Losada', 'mco', 22, '2001-08-01', 'España', 175.00, 70.00, NULL, 1, 0, 1, 0, 0, NULL, '00', NULL, NULL, NULL),
(28, 11, 'Ager Aketxe', 'mco', 10, '1993-12-30', 'España', 174.00, 69.00, NULL, 2, 0, 2, 0, 0, NULL, '0', NULL, NULL, NULL),
(29, 8, 'Jordi Masip', 'por', 1, '1989-01-03', 'España', 180.00, 76.00, NULL, 1, 0, 1, 0, 0, NULL, '0', NULL, NULL, NULL),
(30, 20, 'Dani Jiménez', 'por', 1, '1990-03-04', 'España', 179.00, 72.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(31, 20, 'Diego Conde', 'por', 13, '1998-10-27', 'España', 188.00, 78.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(32, 20, 'Allan Nyom', 'ld', 2, '1988-05-09', 'Camerún', 188.00, 78.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(33, 20, 'Diyaeddine Abzi', 'li', 4, '1998-11-22', 'Canadá', 185.00, 75.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(34, 20, 'Sergio González', 'dfc', 6, '1992-04-19', 'España', 188.00, 81.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(35, 20, 'Jorge Miramón', 'ld', 21, '1989-06-01', 'España', 175.00, 74.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(36, 20, 'Jorge Sáenz', 'dfc', 3, '1996-11-16', 'España', 192.00, 75.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(37, 20, 'Borja López', 'dfc', 5, '1994-02-01', 'España', 192.00, 78.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(38, 20, 'Enric Franquesa', 'li', 15, '1997-02-25', 'España', 174.00, 70.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(39, 20, 'Aritz Arambarri', 'dfc', 22, '1998-01-30', 'España', 186.00, 76.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(40, 20, 'Francisco Portillo', 'mco', 7, '1990-06-12', 'España', 169.00, 60.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(41, 20, 'Juan Cruz', 'ed', 11, '2000-04-24', 'España', 177.00, 72.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(42, 20, 'Yvan Neyou', 'mcd', 17, '1997-01-02', 'Camerún', 180.00, 63.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(43, 20, 'Julián Chicco', 'mcd', 24, '1998-01-12', 'Argentina', 181.00, 79.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(44, 20, 'Hugo Solozobal', 'dfc', 41, '2003-02-06', 'España', 185.00, 70.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(45, 20, 'Luis Perea', 'mc', 8, '1997-08-24', 'España', 192.00, 80.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(46, 20, 'Darko Brasanac', 'mc', 14, '1992-02-11', 'Serbia', 178.00, 73.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(47, 20, 'Iker Undabarrena', 'mcd', 20, '1995-05-17', 'España', 182.00, 76.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(48, 20, 'Seydouba Cissé', 'mc', 15, '2001-02-09', 'Guinea', 177.00, 72.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(49, 20, 'Miguel de la Fuente', 'dc', 9, '1999-09-02', 'España', 180.00, 77.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(50, 20, 'Diego García', 'dc', 19, '2000-04-17', 'España', 186.00, 78.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(51, 20, 'Näis Djouahra', 'ei', 23, '1999-11-22', 'Francia', 171.00, 67.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(52, 20, 'Sydney Osazuwa', 'dc', 29, '2007-04-20', 'España', 175.00, 65.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(53, 20, 'Oscar Ureña', 'ei', 28, '2003-05-30', 'República Dominicana', 180.00, 75.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(54, 8, 'Luis Pérez', 'ld', 2, '1995-02-03', 'España', 173.00, 68.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(55, 8, 'Javi Sánchez', 'dfc', 5, '1997-03-13', 'España', 186.00, 71.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(56, 8, 'Lucas Oliveira', 'dfc', 12, '1996-02-01', 'Brasil', 187.00, 82.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(57, 8, 'Lucas Rosa', 'ld', 22, '2000-04-02', 'Brasil', 176.00, 68.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(58, 8, 'David Torres', 'dfc', 3, '2003-03-04', 'España', 185.00, 72.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(59, 8, 'Enzo Boyomo', 'dfc', 6, '2001-10-06', 'Camerún', 180.00, 70.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(60, 8, 'Sergio Escudero', 'li', 18, '1989-09-01', 'España', 176.00, 65.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(61, 8, 'Cesar Tárrega', 'dfc', 34, '2002-02-25', 'España', 194.00, 80.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(62, 8, 'Victor Meseguer', 'mc', 4, '1999-06-08', 'España', 184.00, 81.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(63, 8, 'Ivan Sánchez', 'mco', 10, '1992-09-22', 'España', 171.00, 64.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(64, 8, 'Stanko Juric', 'mcd', 20, '1996-08-15', 'Croacia', 189.00, 83.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(65, 8, 'Kenedy', 'ei', 24, '1996-02-07', 'Brasil', 182.00, 77.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(66, 8, 'Monchu', 'mc', 8, '1999-09-12', 'España', 173.00, 68.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(67, 8, 'Cesar de la Hoz', 'mc', 16, '1992-03-29', 'España', 179.00, 74.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(68, 8, 'Anuar Tuhami', 'mc', 23, '1995-01-14', 'Marruecos', 173.00, 69.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(69, 8, 'Mamadou Sylla', 'dc', 7, '1994-03-19', 'Senegal', 184.00, 84.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(70, 8, 'Marcos André', 'dc', 9, '1996-10-19', 'Brasil', 184.00, 78.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(71, 8, 'Raul Moro', 'ei', 11, '2002-12-04', 'España', 169.00, 60.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(72, 8, 'Stipe Biuk', 'ei', 17, '2002-12-25', 'Croacia', 170.00, 60.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(73, 8, 'Amath Ndiaye', 'ei', 19, '1996-07-15', 'Senegal', 173.00, 70.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL),
(74, 8, 'Alvaro Negredo', 'dc', 21, '1985-08-19', 'España', 186.00, 71.00, NULL, 0, 0, 0, 0, 0, NULL, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticias`
--

CREATE TABLE `Noticias` (
  `noticia_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `jugador_id` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Noticias`
--

INSERT INTO `Noticias` (`noticia_id`, `titulo`, `contenido`, `imagen_url`, `video_url`, `fecha_publicacion`, `autor`, `equipo_id`, `jugador_id`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(5, 'El Elche CF afronta una crisis: De la cima a la incertidumbre en la tabla de clasificación', '<p>El rendimiento del <strong>Elche CF</strong> ha sufrido un marcado declive en la tabla de clasificación en un corto período de tiempo. En menos de dos meses, el equipo dirigido por<strong> Sebastián Beccacece</strong> ha pasado de estar en posición de ascenso directo a quedar fuera de los puestos de <strong>playoff</strong>. Este descenso en el desempeño se atribuye a cuatro factores principales: el elevado número de goles encajados, la falta de efectividad en la delantera, el agotamiento de la plantilla y las lesiones de jugadores clave.</p><p><br></p><p>La solidez defensiva que caracterizó al Elche al inicio del año ha desaparecido. Durante diez partidos, el equipo solo recibió un gol, pero esta racha se vio interrumpida y desde entonces ha encajado 18 tantos en los últimos nueve encuentros. A su vez, la producción ofensiva del equipo ha disminuido considerablemente, con <strong>solo seis goles marcados </strong>en los últimos siete partidos.</p><p><br></p><p>El Elche ha destacado históricamente por su condición física, pero recientemente ha mostrado signos de fatiga. Jugadores clave como <strong>Mario Gaspar, Bigas, Clerc, Tete Morente, Josan, John, Nico Fernández y Mourad</strong> han acumulado una alta carga de minutos, lo que podría estar afectando su rendimiento.</p><p><br></p><p>Las <strong>lesiones</strong> también han tenido un impacto significativo en el equipo. La falta de sincronización en el tratamiento de las lesiones ha llevado a que algunos jugadores continúen jugando a pesar de sus problemas físicos, lo que ha afectado su rendimiento. La destitución del responsable de los servicios médicos del club refleja la gravedad de la situación.</p>', '665df793da21d-incertidumbre.jpg', NULL, NULL, 'Felipe', NULL, NULL, '2024-05-14 14:58:53', '2024-06-03 17:04:19'),
(7, 'El Sevilla se prepara para un mercado de fichajes agitado: El interés por Peque del Racing de Santander.', '<p>El <strong>Sevilla</strong> está llevando a cabo una estrategia de planificación para el próximo verano, y uno de sus objetivos es fichar a <strong>Peque</strong>, actual jugador del <strong>Racing de Santander</strong>. Peque es un mediapunta que ha demostrado su valía, especialmente esta temporada, donde ha destacado con <strong>18 goles en 39 encuentros.</strong> Además, cuenta con la particularidad de haber sido dirigido por Francisco Javier García Pimienta en el Barça B, lo que añade un elemento de conexión con el nuevo proyecto del Sevilla.</p><p>La cláusula en el contrato de Peque podría facilitar su traspaso al Sevilla. Si el Racing no logra el ascenso, el valor de la cláusula se mantiene en cuatro millones de euros, pero si logran subir a LALIGA EA Sports, la cifra se duplicaría automáticamente, alcanzando los ocho millones de euros. Esta situación ha puesto al jugador \"a tiro\" de los ojos del Sevilla, que ya ha manifestado su interés al representante de Peque, Joaquín Vigueras.</p><p><br></p><p>Sin embargo, el Racing no logró clasificarse para los \'playoffs\' de ascenso tras perder ante el Villarreal B. A pesar de ello, Peque ha demostrado su calidad durante toda la temporada, lo que ha despertado el interés de varios clubes, incluido el Sevilla. La posibilidad de volver a trabajar bajo la dirección de García Pimienta parece atractiva para el jugador, quien busca alcanzar su mejor rendimiento en el fútbol de élite.</p><p><br></p><p><strong>El interés del Sevilla se ha intensificado tras la confirmación de García Pimienta como nuevo entrenador</strong> y el hecho de que la cláusula no alcance los ocho millones de euros, lo que lo convierte en un objetivo prioritario para el club. En resumen, Peque se encuentra en el punto de mira del Sevilla para reforzar su plantilla de cara a la próxima temporada.</p>', '665e0670b1e1d-peque.jpg', NULL, NULL, 'Samba', NULL, NULL, '2024-06-03 18:07:44', '2024-06-03 18:07:44'),
(12, '\"Abelardo Fernández: El Nuevo Timonel del FC Cartagena - Un Impulso hacia el Éxito Deportivo\"', '<p><strong>Abelardo Fernández se une al FC Cartagena como el nuevo entrenador para la temporada 2024-2025</strong>, llegando a un acuerdo este jueves. Este movimiento representa un cambio significativo para el equipo albinegro, ya que Abelardo asume el papel de director técnico en lugar de Julián Calero. El asturiano liderará al equipo desde el banquillo del Cartagonova, marcando así el inicio de una nueva era para el club en la categoría de plata del fútbol español.</p><p><br></p><p><strong>Abelardo</strong> no es ajeno a los desafíos de dirigir equipos en esta división, habiendo acumulado experiencia previa en LaLiga y en la Segunda División. Su llegada al <strong>Cartagena</strong> se ha gestado con el respaldo de un equipo de trabajo bien establecido. <strong>Juan Antonio Morga</strong>, quien ha sido su preparador físico y segundo entrenador en experiencias anteriores en Vitoria y Gijón, lo acompañará en esta nueva aventura. Además, contará con el apoyo de <strong>Paco Imbernón</strong>, un profesional con amplia experiencia en la preparación física y una larga trayectoria vinculada al FC Cartagena.</p><p><br></p><p>Abelardo ha expresado su confianza en el cuerpo técnico propuesto por el club durante las negociaciones previas a su contratación. Esta muestra de confianza refleja su compromiso con el proyecto del Cartagena y su determinación para lograr el éxito en esta nueva etapa.</p><p>La trayectoria de Abelardo en el fútbol no se limita a su faceta como entrenador. Antes de incursionar en los banquillos, tuvo una carrera destacada como futbolista. Comenzó en el <strong>Real Sporting de Gijón, su club de origen</strong>, y luego pasó a formar parte del <strong>FC Barcelona</strong>, donde cosechó numerosos títulos nacionales e internacionales. Además, fue un pilar fundamental en la selección española, con la que logró la medalla de <strong>oro</strong> en los <strong>Juegos Olímpicos de Barcelona 92</strong>.</p><p><br></p><p>En resumen, la llegada de <strong>Abelardo Fernández al FC Cartagena</strong> representa una apuesta ambiciosa por el éxito deportivo. Su vasta experiencia, tanto como jugador como entrenador, lo convierte en un líder capaz de guiar al equipo hacia sus objetivos en la próxima temporada.</p>', '6661fee3c364e-abelardo.webp', NULL, NULL, 'Samba', NULL, NULL, '2024-06-06 18:24:35', '2024-06-06 18:24:35'),
(13, 'En la Búsqueda de la Gloria: El Real Oviedo Encara los \'Playoffs\' con Determinación y Optimismo', '<p><strong>Con la temporada alcanzando su momento más crucial, el Real Oviedo se prepara para los playoffs de ascenso con una mentalidad decidida</strong> y una dosis saludable de optimismo. En este período lleno de expectativas, el equipo considera que la fortaleza mental es tan importante como la preparación física y técnica, y apuesta por la ilusión como un factor clave para contrarrestar la ansiedad.</p><p><br></p><p><strong>Carlos Pomares</strong>, quien ha emergido como una pieza fundamental en la recta final de la temporada, representa el espíritu de superación del equipo. Después de enfrentar meses de escasa participación, Pomares finalmente ha encontrado su mejor momento en el club, demostrando su valía en el terreno de juego y convirtiéndose en un activo importante para el entrenador <strong>Luis Carrión</strong>.</p><p>En medio de la incertidumbre y la presión de los <strong>playoffs</strong>, el <strong>Oviedo</strong> busca concentrarse en el presente, dejando de lado la historia pasada y centrándose en el desafío inmediato. Aunque el ascenso directo se escapó, el equipo mantiene una actitud positiva y confía en su capacidad para alcanzar el éxito en los playoffs.</p><p><br></p><p>La posible participación de <strong>Viti</strong> en el próximo partido brinda un impulso adicional al equipo, mientras que el club se prepara para poner a la venta las entradas liberadas por los socios ausentes. La atmósfera en la ciudad se carga de emoción y expectativas, mientras el equipo y los aficionados se unen en un mismo objetivo: alcanzar la gloria en los playoffs de ascenso del fútbol español.</p>', '66620030bf54e-oviedo.webp', NULL, NULL, 'Samba', NULL, NULL, '2024-06-06 18:30:08', '2024-06-06 18:30:08'),
(14, 'Christian Bragarnik analiza la temporada del Elche: Reconociendo fallos y trazando el camino hacia la reconstrucción', '<p><strong>El propietario del Elche, Christian Bragarnik</strong>, se ha dirigido a los medios y a los aficionados para ofrecer explicaciones sobre la decepcionante temporada que ha experimentado el equipo. Desde un inicio, Bragarnik ha expresado sus disculpas hacia los seguidores franjiverdes, reconociendo que cualquier cosa que pueda decir podría parecer insuficiente, ya que lo que realmente desean los hinchas es ver al equipo ganar. Asimismo, ha asumido toda la responsabilidad por no haber logrado los objetivos deportivos establecidos.</p><p><br></p><p>A pesar de reconocer el fracaso deportivo de la temporada, <strong>Bragarnik ha defendido la existencia de un proyecto sólido en el club</strong>, aunque ha admitido que el año anterior careció de desarrollo y conclusión efectiva.</p><p><br></p><p>En cuanto a su gestión durante los cuatro años y medio que ha estado en el club, Bragarnik ha destacado que tres de esos años fueron positivos en términos de resultados, pero los dos últimos han sido menos exitosos. Aunque el equipo logró establecer <strong>un estilo de juego identificativo</strong>, problemas anímicos afectaron su rendimiento hacia el final de la temporada.</p><p><br></p><p>Uno de los aspectos más criticados ha sido la falta de refuerzos en la posición de <strong>delantero</strong>, a lo que Bragarnik ha respondido admitiendo fallos en la planificación al no contar con suficientes opciones de recambio en el mercado. A pesar de disponer del presupuesto más alto, no se realizó una inversión significativa en jugadores de renombre debido a la dificultad para encontrar los perfiles deseados.</p><p><br></p><p>En relación con los cambios en la dirección deportiva y el cuerpo técnico, Bragarnik ha indicado que se está buscando un <strong>nuevo director deportivo y entrenador</strong> que se ajusten a la visión del club. Sin embargo, ha dejado claro que la última palabra en materia de fichajes seguirá siendo suya. Respecto al <strong>exentrenador Sebastián Beccacece</strong>, se ha elogiado su compromiso, pero no se contempla su regreso sin encontrar un reemplazo adecuado.</p><p><br></p><p>Además, se ha abordado la situación de los conflictos internos que llevaron al <strong>despido</strong> del entrenador de porteros y del jefe de servicios médicos. Bragarnik ha explicado que se llegó a un acuerdo con ellos debido a situaciones conflictivas, pero ha enfatizado que se tomarán medidas para evitar que estos problemas vuelvan a surgir.</p><p><br></p><p>En cuanto a los <strong>proyectos futuros</strong>, Bragarnik ha expresado su esperanza de obtener los permisos para la construcción de la ciudad deportiva en septiembre y ha destacado el trabajo social y en la cantera del club como aspectos positivos que han crecido durante su mandato.</p><p><br></p><p>En resumen, Bragarnik ha asumido la <strong>responsabilidad</strong> por la temporada <strong>decepcionante</strong>, defendiendo la existencia de un proyecto en el club y destacando la búsqueda de un nuevo director deportivo y entrenador para reconstruir el equipo.</p>', '66620666c53ee-brg.webp', NULL, NULL, 'Samba', NULL, NULL, '2024-06-06 18:56:38', '2024-06-06 18:56:38'),
(15, 'Paulo Pezzolano reflexiona sobre la temporada del Real Valladolid: Disculpas, autocrítica y compromiso con el futuro', '<p>Después de varios meses sin conceder entrevistas en España, <strong>Paulo Pezzolano</strong> habló en Radio Marca Valladolid sobre la situación del Real Valladolid tras lograr el ascenso a <strong>LaLiga EA Sports</strong> y abordó la controversia generada por sus comentarios recientes que causaron críticas entre los aficionados.</p><p>El <strong>técnico uruguayo</strong> comenzó pidiendo disculpas por su broma sobre el balcón, explicando que su intención era liberar a los jugadores para que disfrutaran de la celebración: <strong>\"Pido disculpas si a alguien le molestó lo del balcón, la idea era de broma. Lo tenía pensado para liberar a los jugadores y dejar que se disfrutara de la fiesta\"</strong>, dijo Pezzolano. También reconoció que su expresión en Uruguay fue desafortunada y que necesita mejorar en sus ruedas de prensa: \"Yo no estudié para estar delante de un micrófono, soy consciente y pido disculpas. Tengo esa debilidad tremenda, tengo que mejorar sin duda en las ruedas de prensa, a veces digo cosas que no tengo que decir\".</p><p><br></p><p><strong>Pezzolano</strong> también habló sobre el estilo de juego del equipo, reconociendo la necesidad de jugar de manera más atractiva, aunque justificó las tácticas empleadas para asegurar el ascenso: \"Sé que tenemos que cambiar y jugar más lindo, pero no tenía las características para hacerlo. Lo que hicimos era lo mejor para lograr el objetivo. Siempre se pueden mejorar muchas cosas, me gusta el juego de posición\".</p><p><br></p><p>Respecto a su futuro en el club, <strong>Pezzolano</strong> dejó claro su compromiso tras la <strong>renovación automática</strong> que se activó con el ascenso del equipo: <strong>\"Cuando yo firmo un contrato tengo un compromiso con el club y, aunque haya tenido ofertas, lo tengo que cumplir\"</strong>. Añadió que están trabajando en la planificación de la próxima temporada junto con la dirección deportiva y que deben tomar decisiones importantes sobre las opciones de compra: \"Hay que tomar decisiones con las opciones de compra y es cosa de la dirección deportiva. De una posible venta no tengo ni idea\".</p><p><br></p><p>En resumen, Pezzolano se mostró consciente de sus debilidades en la comunicación y comprometido a mejorar, defendió sus decisiones tácticas como necesarias para el éxito del equipo y reafirmó su compromiso con el Real Valladolid de cara a la próxima temporada.,</p>', '66620c11858b1-pezzo.webp', NULL, NULL, 'Samba', NULL, NULL, '2024-06-06 19:20:49', '2024-06-06 19:20:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Portadas`
--

CREATE TABLE `Portadas` (
  `portada_id` int(11) NOT NULL,
  `noticia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Portadas`
--

INSERT INTO `Portadas` (`portada_id`, `noticia_id`) VALUES
(1, 5),
(3, 7),
(4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Resultados`
--

CREATE TABLE `Resultados` (
  `resultado_id` int(11) NOT NULL,
  `equipo_local_id` int(11) DEFAULT NULL,
  `equipo_visitante_id` int(11) DEFAULT NULL,
  `goles_local` int(11) DEFAULT NULL,
  `goles_visitante` int(11) DEFAULT NULL,
  `fecha_partido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Resultados_Jornadas`
--

CREATE TABLE `Resultados_Jornadas` (
  `resultado_id` int(11) NOT NULL,
  `jornada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `correo_electronico` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `equipo_favorito_id` int(11) DEFAULT NULL,
  `rol` enum('admin','usuario') NOT NULL DEFAULT 'usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`usuario_id`, `nombre_usuario`, `nombre_completo`, `correo_electronico`, `contrasena`, `foto_perfil`, `fecha_nacimiento`, `equipo_favorito_id`, `rol`, `fecha_registro`) VALUES
(6, 'josepa', 'El josepa', 'josepa@josepa.com', '$2y$10$wYwenHaB9qCgrLZ27Lk1lucVBPzAg47MUtbr1jDALB4HZIhUOSUYS', NULL, '2002-01-25', NULL, 'usuario', '2024-04-15 19:04:44'),
(11, 'ninja', 'Roberto Miralles', 'ninja@ninja.es', '$2y$10$nzLTTMx/64DIBDVr/B0fa.OsQiJqcvRZCT7K5nDJiQV0K0ML4Lfpi', NULL, '2002-07-02', NULL, 'usuario', '2024-04-23 18:16:09'),
(13, 'Didi', 'Diego Castillo', 'didi@didi.es', '$2y$10$ezluCNlwJKVIPvEhYsP.W.GnBaphXiDE/SeINu1Ty/L3mW7VPRO66', NULL, '2002-08-24', NULL, 'usuario', '2024-04-23 18:57:07'),
(14, 'Samba', 'Fernando García Gil', 'fernandogarcia0022@gmail.com', '$2y$10$.P5vIV/4Uz9VRC4B/lbtturHr9EgBtaV.VDm/fnXpDoFMg/Seb4wi', NULL, '2002-07-23', NULL, 'admin', '2024-04-23 19:20:20'),
(16, 'elrekelo', 'elrekelo', 'elrekelo@gmail.com', '$2y$10$chQodWFSekCj.Mqc8wCqj.67rb3KIAWIKM3on50wlLyEWpuLuYPK.', NULL, '2001-07-23', NULL, 'usuario', '2024-06-06 17:52:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Calendario`
--
ALTER TABLE `Calendario`
  ADD PRIMARY KEY (`jornada_id`);

--
-- Indices de la tabla `Clasificacion`
--
ALTER TABLE `Clasificacion`
  ADD PRIMARY KEY (`clasificacion_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`comentario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  ADD PRIMARY KEY (`equipo_id`);

--
-- Indices de la tabla `EstadisticasEquipos`
--
ALTER TABLE `EstadisticasEquipos`
  ADD PRIMARY KEY (`estadistica_id`),
  ADD KEY `equipo_id` (`equipo_id`),
  ADD KEY `partido_id` (`partido_id`);

--
-- Indices de la tabla `EstadisticasJugadores`
--
ALTER TABLE `EstadisticasJugadores`
  ADD PRIMARY KEY (`estadistica_id`),
  ADD KEY `jugador_id` (`jugador_id`),
  ADD KEY `partido_id` (`partido_id`);

--
-- Indices de la tabla `EstadisticasPartidos`
--
ALTER TABLE `EstadisticasPartidos`
  ADD PRIMARY KEY (`estadistica_id`),
  ADD KEY `partido_id` (`partido_id`);

--
-- Indices de la tabla `Etiquetas`
--
ALTER TABLE `Etiquetas`
  ADD PRIMARY KEY (`etiqueta_id`),
  ADD KEY `fk_noticia_id` (`noticia_id`);

--
-- Indices de la tabla `EventosPartido`
--
ALTER TABLE `EventosPartido`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `partido_id` (`partido_id`),
  ADD KEY `equipo_id` (`equipo_id`),
  ADD KEY `jugador_id` (`jugador_id`);

--
-- Indices de la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  ADD PRIMARY KEY (`jugador_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `Noticias`
--
ALTER TABLE `Noticias`
  ADD PRIMARY KEY (`noticia_id`);

--
-- Indices de la tabla `Portadas`
--
ALTER TABLE `Portadas`
  ADD PRIMARY KEY (`portada_id`),
  ADD KEY `noticia_id` (`noticia_id`);

--
-- Indices de la tabla `Resultados`
--
ALTER TABLE `Resultados`
  ADD PRIMARY KEY (`resultado_id`),
  ADD KEY `equipo_local_id` (`equipo_local_id`),
  ADD KEY `equipo_visitante_id` (`equipo_visitante_id`);

--
-- Indices de la tabla `Resultados_Jornadas`
--
ALTER TABLE `Resultados_Jornadas`
  ADD PRIMARY KEY (`resultado_id`,`jornada_id`),
  ADD KEY `jornada_id` (`jornada_id`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `equipo_favorito_id` (`equipo_favorito_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Calendario`
--
ALTER TABLE `Calendario`
  MODIFY `jornada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Clasificacion`
--
ALTER TABLE `Clasificacion`
  MODIFY `clasificacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `EstadisticasEquipos`
--
ALTER TABLE `EstadisticasEquipos`
  MODIFY `estadistica_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `EstadisticasJugadores`
--
ALTER TABLE `EstadisticasJugadores`
  MODIFY `estadistica_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `EstadisticasPartidos`
--
ALTER TABLE `EstadisticasPartidos`
  MODIFY `estadistica_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Etiquetas`
--
ALTER TABLE `Etiquetas`
  MODIFY `etiqueta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `EventosPartido`
--
ALTER TABLE `EventosPartido`
  MODIFY `evento_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  MODIFY `jugador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `Noticias`
--
ALTER TABLE `Noticias`
  MODIFY `noticia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `Portadas`
--
ALTER TABLE `Portadas`
  MODIFY `portada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Resultados`
--
ALTER TABLE `Resultados`
  MODIFY `resultado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Clasificacion`
--
ALTER TABLE `Clasificacion`
  ADD CONSTRAINT `Clasificacion_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `Equipos` (`equipo_id`);

--
-- Filtros para la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD CONSTRAINT `Comentarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`usuario_id`);

--
-- Filtros para la tabla `EstadisticasEquipos`
--
ALTER TABLE `EstadisticasEquipos`
  ADD CONSTRAINT `EstadisticasEquipos_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `Equipos` (`equipo_id`),
  ADD CONSTRAINT `EstadisticasEquipos_ibfk_2` FOREIGN KEY (`partido_id`) REFERENCES `Calendario` (`jornada_id`);

--
-- Filtros para la tabla `EstadisticasJugadores`
--
ALTER TABLE `EstadisticasJugadores`
  ADD CONSTRAINT `EstadisticasJugadores_ibfk_1` FOREIGN KEY (`jugador_id`) REFERENCES `Jugadores` (`jugador_id`),
  ADD CONSTRAINT `EstadisticasJugadores_ibfk_2` FOREIGN KEY (`partido_id`) REFERENCES `Calendario` (`jornada_id`);

--
-- Filtros para la tabla `EstadisticasPartidos`
--
ALTER TABLE `EstadisticasPartidos`
  ADD CONSTRAINT `EstadisticasPartidos_ibfk_1` FOREIGN KEY (`partido_id`) REFERENCES `Calendario` (`jornada_id`);

--
-- Filtros para la tabla `Etiquetas`
--
ALTER TABLE `Etiquetas`
  ADD CONSTRAINT `fk_noticia_id` FOREIGN KEY (`noticia_id`) REFERENCES `Noticias` (`noticia_id`);

--
-- Filtros para la tabla `EventosPartido`
--
ALTER TABLE `EventosPartido`
  ADD CONSTRAINT `EventosPartido_ibfk_1` FOREIGN KEY (`partido_id`) REFERENCES `Calendario` (`jornada_id`),
  ADD CONSTRAINT `EventosPartido_ibfk_2` FOREIGN KEY (`equipo_id`) REFERENCES `Equipos` (`equipo_id`),
  ADD CONSTRAINT `EventosPartido_ibfk_3` FOREIGN KEY (`jugador_id`) REFERENCES `Jugadores` (`jugador_id`);

--
-- Filtros para la tabla `Jugadores`
--
ALTER TABLE `Jugadores`
  ADD CONSTRAINT `Jugadores_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `Equipos` (`equipo_id`);

--
-- Filtros para la tabla `Portadas`
--
ALTER TABLE `Portadas`
  ADD CONSTRAINT `Portadas_ibfk_1` FOREIGN KEY (`noticia_id`) REFERENCES `Noticias` (`noticia_id`);

--
-- Filtros para la tabla `Resultados`
--
ALTER TABLE `Resultados`
  ADD CONSTRAINT `Resultados_ibfk_1` FOREIGN KEY (`equipo_local_id`) REFERENCES `Equipos` (`equipo_id`),
  ADD CONSTRAINT `Resultados_ibfk_2` FOREIGN KEY (`equipo_visitante_id`) REFERENCES `Equipos` (`equipo_id`);

--
-- Filtros para la tabla `Resultados_Jornadas`
--
ALTER TABLE `Resultados_Jornadas`
  ADD CONSTRAINT `Resultados_Jornadas_ibfk_1` FOREIGN KEY (`resultado_id`) REFERENCES `Resultados` (`resultado_id`),
  ADD CONSTRAINT `Resultados_Jornadas_ibfk_2` FOREIGN KEY (`jornada_id`) REFERENCES `Calendario` (`jornada_id`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`equipo_favorito_id`) REFERENCES `Equipos` (`equipo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
