<?php
class Equipos {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getEquipo($equipo_id) {
        $stmt = $this->db->prepare("SELECT * FROM Equipos WHERE equipo_id = :id");
        $stmt->bindParam(":id", $equipo_id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function traerEquipos(){
        $query = "SELECT * FROM Equipos WHERE 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
        
    }
    
    public function crear_Equipo($nombre,$descripcion,$escudo,$fecha,$sede,$entrenador,$estadio,$colorp,$colors,$pagina,$twitter,$tiktok,$instagram){
        try {
            $query = "INSERT INTO Equipos (nombre_equipo, descripcion, escudo_url, fecha_fundacion, sede, entrenador_principal, estadio_principal, color_primario,
            color_secundario, pagina_web_oficial, twitter, tiktok, instagram)
            VALUES (:nombre, :descripcion, :escudo, :fecha, :sede, :entrenador, :estadio, :colorp, :colors, :pagina, :twitter, :tiktok, :instagram)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->bindParam(":escudo", $escudo);
            $stmt->bindParam(":fecha", $fecha);
            $stmt->bindParam(":sede", $sede);
            $stmt->bindParam(":entrenador", $entrenador);
            $stmt->bindParam(":estadio", $estadio);
            $stmt->bindParam(":colorp", $colorp);
            $stmt->bindParam(":colors", $colors);
            $stmt->bindParam(":pagina", $pagina);
            $stmt->bindParam(":twitter", $twitter);
            $stmt->bindParam(":tiktok", $tiktok);
            $stmt->bindParam(":instagram", $instagram);

            $stmt->execute();
            header("location:crear_equipo.php?mensaje=Equipo+creado+con+exito");
            exit;
        } catch (PDOException $error) {
            echo "Error al crear el equipo: " . $error->getMessage();

        }
    }

    public function editar_Equipo($equipo_id,$nombre,$descripcion,$escudo,$fecha,$sede,$entrenador,$estadio,$colorp,$colors,$pagina,$twitter,$tiktok,$instagram){
        try {
            if ($escudo == null) {
                $sql = "UPDATE Equipos SET 
                    nombre_equipo = :nombre_equipo, 
                    descripcion = :descripcion,
                    fecha_fundacion = :fecha_fundacion, 
                    sede = :sede, 
                    entrenador_principal = :entrenador_principal, 
                    estadio_principal = :estadio_principal, 
                    color_primario = :color_primario, 
                    color_secundario = :color_secundario, 
                    pagina_web_oficial = :pagina_web_oficial, 
                    twitter = :twitter, 
                    tiktok = :tiktok, 
                    instagram = :instagram 
                    WHERE equipo_id = :id_equipo";

                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':nombre_equipo', $nombre);
                    $stmt->bindParam(':descripcion', $descripcion);
                    
                    $stmt->bindParam(':fecha_fundacion', $fecha);
                    $stmt->bindParam(':sede', $sede);
                    $stmt->bindParam(':entrenador_principal', $entrenador);
                    $stmt->bindParam(':estadio_principal', $estadio);
                    $stmt->bindParam(':color_primario', $colorp);
                    $stmt->bindParam(':color_secundario', $colors);
                    $stmt->bindParam(':pagina_web_oficial', $pagina);
                    $stmt->bindParam(':twitter', $twitter);
                    $stmt->bindParam(':tiktok', $tiktok);
                    $stmt->bindParam(':instagram', $instagram);
                    $stmt->bindParam(':id_equipo', $equipo_id);

                    $stmt->execute();
            }else{
                $sql = "UPDATE Equipos SET 
                    nombre_equipo = :nombre_equipo, 
                    descripcion = :descripcion,
                    escudo_url = :escudo_url,    
                    fecha_fundacion = :fecha_fundacion, 
                    sede = :sede, 
                    entrenador_principal = :entrenador_principal, 
                    estadio_principal = :estadio_principal, 
                    color_primario = :color_primario, 
                    color_secundario = :color_secundario, 
                    pagina_web_oficial = :pagina_web_oficial, 
                    twitter = :twitter, 
                    tiktok = :tiktok, 
                    instagram = :instagram 
                    WHERE equipo_id = :id_equipo";

                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(':nombre_equipo', $nombre);
                    $stmt->bindParam(':descripcion', $descripcion);
                    $stmt->bindParam(':escudo_url',$escudo);
                    $stmt->bindParam(':fecha_fundacion', $fecha);
                    $stmt->bindParam(':sede', $sede);
                    $stmt->bindParam(':entrenador_principal', $entrenador);
                    $stmt->bindParam(':estadio_principal', $estadio);
                    $stmt->bindParam(':color_primario', $colorp);
                    $stmt->bindParam(':color_secundario', $colors);
                    $stmt->bindParam(':pagina_web_oficial', $pagina);
                    $stmt->bindParam(':twitter', $twitter);
                    $stmt->bindParam(':tiktok', $tiktok);
                    $stmt->bindParam(':instagram', $instagram);
                    $stmt->bindParam(':id_equipo', $equipo_id);

                    $stmt->execute();
            }

            header("location:editar_equipo.php?mensaje=Equipo+editado+con+exito");
        } catch (PDOException $error) {
            echo "Error al editar el equipo: " . $error->getMessage();

        }
    }


    public function eliminarEquipo($equipo_id){
        try {
          
            $sql = "DELETE FROM Equipos WHERE equipo_id = :equi";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":equi", $equipo_id);
            $stmt->execute();
            echo "success";
        } catch (PDOException $e) {
            echo "error";
        }
    }

    public function traerResultado($jid){
        try {
            $query = "SELECT * FROM Resultados_Jornadas WHERE jornada_id = $jid";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result) {
                $query = "SELECT * FROM Resultados WHERE resultado_id = :resultado";
                $stmt = $this->db->prepare($query);

                $stmt->bindParam(":resultado", $result['resultado_id']);

                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }else{
                return false;
            }
        } catch (PDOException $error) {
            echo "Error al crear el equipo: " . $error->getMessage();
        }
    }

    public function traerEquipo($equipo){
        try {
            $query = "SELECT * FROM Equipos WHERE equipo_id = $equipo";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $error) {
            echo "Error al crear el equipo: " . $error->getMessage();
        }
    }
    
    public function traerCalendario(){
        try {
            $query = "SELECT * FROM Calendario";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $caljor = array();
            for ($i=1; $i <= 42 ; $i++) { 
                foreach ($result as $key => $value) {
                    if ($value->numero_jornada == $i) {
                        $caljor[$i][] = $value;
                    }
                }
            }

            return $caljor;
        } catch (PDOException $error) {
            echo "Error al crear el equipo: " . $error->getMessage();
        }
    }

    public function comprobarCalendario($local,$visitante){
        try {
            $query = "SELECT * FROM Calendario WHERE equipo_local = :loc AND equipo_visitante = :visit";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":loc",$local);
            $stmt->bindParam(":visit",$visitante);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $error) {
            echo "Error al crear el equipo: " . $error->getMessage();
        }
    }

    public function crear_Calendario($jornada,$fecha,$local,$visitante){
        try {

            $repetido = self::comprobarCalendario($local,$visitante);

            if ($repetido != false) {
                header("location:crear_calendario.php?error=Partido repetido");
                exit;
            }

            $query = "INSERT INTO Calendario (numero_jornada, fecha, equipo_local, equipo_visitante)
                        VALUES (:jornada, :fecha, :equipolocal, :visitante)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(":jornada", $jornada);
            $stmt->bindParam(":fecha", $fecha);
            $stmt->bindParam(":equipolocal", $local);
            $stmt->bindParam(":visitante", $visitante);

            $stmt->execute();
            header("location:crear_calendario.php?mensaje=Jornada+creada+con+exito");
            exit;

        } catch (PDOException $error) {
            echo "Error al crear la jornada: " . $error->getMessage();
        }
    }

    public function guardarResultado($local_id,$visit_id,$gol_local,$gol_visitante,$jornada){
        try {
            $query = "INSERT INTO Resultados (equipo_local_id, equipo_visitante_id, goles_local, goles_visitante)
                        VALUES (:loc, :visit, :golesloc, :golesvisit)";
            
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(":loc", $local_id);
            $stmt->bindParam(":visit", $visit_id);
            $stmt->bindParam(":golesloc", $gol_local);
            $stmt->bindParam(":golesvisit", $gol_visitante);

            $stmt->execute();

            $lastID = $this->db->lastInsertId();

            $query = "INSERT INTO Resultados_Jornadas (resultado_id, jornada_id)
                        VALUES (:resultado, :jornada)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":resultado",$lastID);
            $stmt->bindParam(":jornada",$jornada);
            $stmt->execute();

        } catch (PDOException $error) {
            echo "Error al crear el resultado: " . $error->getMessage();
        }
    }

    public function clasificacion($local_id,$visit_id,$gol_local,$gol_visitante){
        try {
            $query  = "UPDATE Clasificacion SET puntos = puntos + :puntos, partidos_jugados = partidos_jugados + :pjugados, partidos_ganados = partidos_ganados + :pganados, partidos_empatados = partidos_empatados + :pempatados,
                        partidos_perdidos = partidos_perdidos + :pperdidos, goles_a_favor = goles_a_favor + :favor, goles_en_contra = goles_en_contra + :contra WHERE equipo_id = :equipo";
            $stmt = $this->db->prepare($query);
            $pjugados = 1;
            if ($gol_local > $gol_visitante) {
                $puntos = 3;
                $pganados = 1;
                $pempatados = 0;
                $pperdidos = 0;
            }elseif($gol_local < $gol_visitante){
                $puntos = 0;
                $pganados = 0;
                $pempatados = 0;
                $pperdidos = 1;
            }elseif($gol_local == $gol_visitante){
                $puntos = 1;
                $pganados = 0;
                $pempatados = 1;
                $pperdidos = 0;
            }
            $stmt->bindParam(":puntos", $puntos);
            $stmt->bindParam(":pjugados",$pjugados);
            $stmt->bindParam(":pganados",$pganados);
            $stmt->bindParam(":pempatados",$pempatados);
            $stmt->bindParam("pperdidos",$pperdidos);
            $stmt->bindParam(":favor",$gol_local);
            $stmt->bindParam(":contra",$gol_visitante);
            $stmt->bindParam(":equipo",$local_id);
            $stmt->execute();


            $stmt = $this->db->prepare($query);
            if ($gol_local > $gol_visitante) {
                $puntos = 0;
                $pganados = 0;
                $pempatados = 0;
                $pperdidos = 1;
            }elseif($gol_local < $gol_visitante){
                $puntos = 3;
                $pganados = 1;
                $pempatados = 0;
                $pperdidos = 0;
            }elseif($gol_local == $gol_visitante){
                $puntos = 1;
                $pganados = 0;
                $pempatados = 1;
                $pperdidos = 0;
            }
            $stmt->bindParam(":puntos", $puntos);
            $stmt->bindParam(":pjugados",$pjugados);
            $stmt->bindParam(":pganados",$pganados);
            $stmt->bindParam(":pempatados",$pempatados);
            $stmt->bindParam("pperdidos",$pperdidos);
            $stmt->bindParam(":favor",$gol_visitante);
            $stmt->bindParam(":contra",$gol_local);
            $stmt->bindParam(":equipo", $visit_id);
            $stmt->execute();


            
        } catch (PDOException $error) {
            echo "Error al crear el resultado: " . $error->getMessage();
        }
    }

    public function ordenarClasificacion(){
        try {
            $sql = "SELECT * FROM Clasificacion WHERE 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            for ($i=0; $i < count($result) ; $i++) { 
                for ($j= $i +1; $j < count($result) ; $j++) { 
                    if ($result[$i]->puntos < $result[$j]->puntos) {
                        $tmp = $result[$i];
                        $result[$i] = $result[$j];
                        $result[$j] = $tmp;
                    }elseif($result[$i]->puntos == $result[$j]->puntos){
                        $golesl = $result[$i]->goles_a_favor - $result[$i]->goles_en_contra;
                        $golesv = $result[$j]->goles_a_favor - $result[$j]->goles_en_contra;
                        if ($golesl < $golesv) {
                            $tmp = $result[$i];
                            $result[$i] = $result[$j];
                            $result[$j] = $tmp;
                        }
                    }
                }
            }

            return $result;
        } catch (PDOException $error) {
            echo "Error " . $error->getMessage();
        }
    }

    public function tarjetasAma($jugadores){
        try {
            foreach ($jugadores as $key => $value) {
                $query = "UPDATE Jugadores SET tarjetas_amarillas = tarjetas_amarillas + 1 WHERE jugador_id = $value";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
            }
        } catch (PDOException $error) {
            echo "Error al crear el resultado: " . $error->getMessage();
        }
    }

    public function tarjetasRojas($jugadores){
        try {
            foreach ($jugadores as $key => $value) {
                $query = "UPDATE Jugadores SET tarjetas_rojas = tarjetas_rojas + 1 WHERE jugador_id = $value";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
            }
        } catch (PDOException $error) {
            echo "Error al crear el resultado: " . $error->getMessage();
        }
    }

    public function goles($jugadores, $ngoles){
        try {
            for ($i=0; $i < count($jugadores); $i++) { 
                if(!empty($jugadores[$i])){
                    $sql = "UPDATE Jugadores SET goles = goles + :goles WHERE jugador_id = :jugador";
                    $stmt = $this->db->prepare($sql);
                    $goles = intval($ngoles[$i]);
                    $stmt->bindParam(":goles", $goles);
                    $stmt->bindParam(":jugador",  $jugadores[$i]);
                    $stmt->execute();
                }
            }
        } catch (PDOException $error) {
            echo "Error al crear el resultado: " . $error->getMessage();
        }
    }

    public function asistencias($jugadores, $nasis){
        try {
            for ($i=0; $i < count($jugadores); $i++) { 
                if(!empty($jugadores[$i])){
                    $sql = "UPDATE Jugadores SET asistencias = asistencias + :asis WHERE jugador_id = :jugador";
                    $stmt = $this->db->prepare($sql);
                    $goles = intval($nasis[$i]);
                    $stmt->bindParam(":asis", $goles);
                    $stmt->bindParam(":jugador",  $jugadores[$i]);
                    $stmt->execute();
                }
            }
        } catch (PDOException $error) {
            echo "Error al crear el resultado: " . $error->getMessage();
        }
    }

    public function pjugados($jugadores){
        try {
            foreach ($jugadores as $key => $value) {
                $query = "UPDATE Jugadores SET partidos_jugados = partidos_jugados + 1 WHERE jugador_id = $value";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
            }
        } catch (PDOException $error) {
            echo "Error al crear el resultado: " . $error->getMessage();
        }
    }

    public function TraerJornada($jornada_id){
        try {
            $query = "SELECT * FROM Calendario WHERE jornada_id = $jornada_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $error) {
            echo "Error " . $error->getMessage();
        }
    }

}

?>
