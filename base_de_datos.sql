CREATE DATABASE zonafutbol CHARACTER SET utf8 COLLATE utf8_general_ci;

USE zonafutbol;

CREATE TABLE Noticias (
    noticia_id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT,
    imagen_url VARCHAR(255),
    video_url VARCHAR(255),
    fecha_publicacion DATETIME,
    autor VARCHAR(100),
    equipo_id INT,
    jugador_id INT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Portadas (
    portada_id INT AUTO_INCREMENT PRIMARY KEY,
    noticia_id INT,
    FOREIGN KEY (noticia_id) REFERENCES Noticias(noticia_id)
);

CREATE TABLE Equipos (
    equipo_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_equipo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    escudo_url VARCHAR(255),
    fecha_fundacion DATE,
    sede VARCHAR(255),
    entrenador_principal VARCHAR(100),
    estadio_principal VARCHAR(100),
    color_primario VARCHAR(50),
    color_secundario VARCHAR(50),
    pagina_web_oficial VARCHAR(255),
    twitter VARCHAR(255),
    tiktok VARCHAR(255),
    instagram VARCHAR(255),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Jugadores (
    jugador_id INT AUTO_INCREMENT PRIMARY KEY,
    equipo_id INT,
    nombre VARCHAR(100) NOT NULL,
    posicion VARCHAR(50),
    numero_camiseta INT,
    fecha_nacimiento DATE,
    nacionalidad VARCHAR(50),
    altura DECIMAL(5,2),
    peso DECIMAL(5,2),
    historial TEXT,
    goles INT,
    asistencias INT,
    partidos_jugados INT,
    tarjetas_amarillas INT,
    tarjetas_rojas INT,
    imagen_url VARCHAR(255),
    descripcion TEXT,
    twitter_url VARCHAR(255),
    instagram_url VARCHAR(255),
    tiktok_url VARCHAR(255),
    FOREIGN KEY (equipo_id) REFERENCES Equipos(equipo_id)
);

CREATE TABLE Clasificacion (
    clasificacion_id INT AUTO_INCREMENT PRIMARY KEY,
    equipo_id INT,
    posicion INT,
    puntos INT,
    partidos_jugados INT,
    partidos_ganados INT,
    partidos_empatados INT,
    partidos_perdidos INT,
    goles_a_favor INT,
    goles_en_contra INT,
    FOREIGN KEY (equipo_id) REFERENCES Equipos(equipo_id)
);

CREATE TABLE Resultados (
    resultado_id INT AUTO_INCREMENT PRIMARY KEY,
    equipo_local_id INT,
    equipo_visitante_id INT,
    goles_local INT,
    goles_visitante INT,
    fecha_partido DATETIME,
    FOREIGN KEY (equipo_local_id) REFERENCES Equipos(equipo_id),
    FOREIGN KEY (equipo_visitante_id) REFERENCES Equipos(equipo_id)
);

CREATE TABLE Calendario (
    jornada_id INT AUTO_INCREMENT PRIMARY KEY,
    numero_jornada INT NOT NULL,
    fecha DATETIME NOT NULL,
    equipo_local VARCHAR(100) NOT NULL,
    equipo_visitante VARCHAR(100) NOT NULL
);

/*resultado_id INT,
    FOREIGN KEY (resultado_id) REFERENCES Resultados(resultado_id);*/


CREATE TABLE Resultados_Jornadas (
    resultado_id INT,
    jornada_id INT,
    PRIMARY KEY (resultado_id, jornada_id),
    FOREIGN KEY (resultado_id) REFERENCES Resultados(resultado_id),
    FOREIGN KEY (jornada_id) REFERENCES Calendario(jornada_id)
);

CREATE TABLE EventosPartido (
    evento_id INT AUTO_INCREMENT PRIMARY KEY,
    partido_id INT,
    tipo_evento VARCHAR(100) NOT NULL,
    minuto INT,
    equipo_id INT,
    jugador_id INT,
    FOREIGN KEY (partido_id) REFERENCES Calendario(jornada_id),
    FOREIGN KEY (equipo_id) REFERENCES Equipos(equipo_id),
    FOREIGN KEY (jugador_id) REFERENCES Jugadores(jugador_id)
);



CREATE TABLE Usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(100) NOT NULL,
    nombre_completo VARCHAR(255) NOT NULL,
    correo_electronico VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    foto_perfil VARCHAR(255), -- Ruta de la foto de perfil (puedes almacenar la imagen en el servidor y guardar aquí la ruta)
    fecha_nacimiento DATE,
    equipo_favorito_id INT,
    rol ENUM('admin', 'usuario') NOT NULL DEFAULT 'usuario',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (equipo_favorito_id) REFERENCES Equipos(equipo_id)
);

CREATE TABLE Comentarios (
    comentario_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    entidad_tipo ENUM('noticia', 'partido', 'jugador') NOT NULL,
    entidad_id INT NOT NULL,
    contenido TEXT,
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(usuario_id)
);

CREATE TABLE EstadisticasJugadores (
    estadistica_id INT AUTO_INCREMENT PRIMARY KEY,
    jugador_id INT,
    tipo VARCHAR(100) NOT NULL,
    valor INT NOT NULL,
    partido_id INT,
    FOREIGN KEY (jugador_id) REFERENCES Jugadores(jugador_id),
    FOREIGN KEY (partido_id) REFERENCES Calendario(jornada_id)
);

CREATE TABLE EstadisticasEquipos (
    estadistica_id INT AUTO_INCREMENT PRIMARY KEY,
    equipo_id INT,
    tipo VARCHAR(100) NOT NULL,
    valor INT NOT NULL,
    partido_id INT,
    FOREIGN KEY (equipo_id) REFERENCES Equipos(equipo_id),
    FOREIGN KEY (partido_id) REFERENCES Calendario(jornada_id)
);

CREATE TABLE EstadisticasPartidos (
    estadistica_id INT AUTO_INCREMENT PRIMARY KEY,
    partido_id INT,
    tipo VARCHAR(100) NOT NULL,
    valor INT NOT NULL,
    FOREIGN KEY (partido_id) REFERENCES Calendario(jornada_id)
);

CREATE TABLE Etiquetas (
    etiqueta_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_etiqueta VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Noticia_Etiqueta (
    noticia_id INT,
    etiqueta_id INT,
    FOREIGN KEY (noticia_id) REFERENCES Noticias(noticia_id),
    FOREIGN KEY (etiqueta_id) REFERENCES Etiquetas(etiqueta_id),
    PRIMARY KEY (noticia_id, etiqueta_id)
);
