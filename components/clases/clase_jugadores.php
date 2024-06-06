<?php
class Jugadores {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }



    public function getJugadoresEquipo($equipo_id) {
        $stmt = $this->db->prepare("SELECT * FROM Jugadores WHERE equipo_id = :id");
        $stmt->bind_param(":id", $equipo_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function traerJugador($jugador_id){
        $query = "SELECT * FROM Jugadores WHERE jugador_id = $jugador_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    

    public function traerJugadores(){
        $query = "SELECT * FROM Jugadores WHERE 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function traerGoleadores(){
        $query = "SELECT * FROM Jugadores ORDER BY goles DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function traerAsistentes(){
        $query = "SELECT * FROM Jugadores ORDER BY asistencias DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function traerTarjetas(){
        $query = "SELECT *, (tarjetas_amarillas + tarjetas_rojas) AS total_tarjetas FROM Jugadores ORDER BY total_tarjetas DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function traerJugadoresEquipo($id_equipo){
        $query = "SELECT * FROM Jugadores WHERE equipo_id = $id_equipo";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function crear_Jugador($equipo_id,$nombre,$posicion,$numero_camiseta,$fecha_nacimiento,$nacionalidad,$altura,$peso,$goles,$asistencias,$partidos_jugados,$tarjetas_amarillas,$tarjetas_rojas,$imagen_url,$descripcion){
        try {
            $query = "INSERT INTO Jugadores (equipo_id, nombre, posicion, numero_camiseta, fecha_nacimiento, nacionalidad, altura, peso, goles,
            asistencias, partidos_jugados, tarjetas_amarillas, tarjetas_rojas, imagen_url, descripcion)
            VALUES (:equipo, :nombre, :posicion, :camiseta, :fecha, :pais, :altura, :peso, :goles, :asistencias, :partidos, :amarillas, :rojas, :foto,
            :descripcion)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(":equipo", $equipo_id);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":posicion", $posicion);
            $stmt->bindParam(":camiseta", $numero_camiseta);
            $stmt->bindParam(":fecha", $fecha_nacimiento);
            $stmt->bindParam(":pais", $nacionalidad);
            $stmt->bindParam(":altura", $altura);
            $stmt->bindParam(":peso", $peso);
            $stmt->bindParam(":goles", $goles);
            $stmt->bindParam(":asistencias", $asistencias);
            $stmt->bindParam(":partidos", $partidos_jugados);
            $stmt->bindParam(":amarillas", $tarjetas_amarillas);
            $stmt->bindParam(":rojas", $tarjetas_rojas);
            $stmt->bindParam(":foto", $imagen_url);
            $stmt->bindParam(":descripcion", $descripcion);

            $stmt->execute();
            header("location:crear_jugador.php?mensaje=Jugador+creado+con+exito");
            exit;
        } catch (PDOException $error) {
            echo "Error al crear al jugador: " . $error->getMessage();

        }
    }

    public function editar_jugador($jugador_id,$equipo_id,$nombre,$posicion,$numero_camiseta,$fecha_nacimiento,$nacionalidad,$altura,$peso,$goles,$asistencias,$partidos_jugados,$tarjetas_amarillas,$tarjetas_rojas,$imagen_url,$descripcion){
        try {
            if ($imagen_url == null) {
                $sql = "UPDATE Jugadores SET 
                equipo_id = :equipo_id,
                nombre = :nombre,
                posicion = :posicion,
                numero_camiseta = :numero_camiseta,
                fecha_nacimiento = :fecha_nacimiento,
                nacionalidad = :nacionalidad,
                altura = :altura,
                peso = :peso,
                goles = :goles,
                asistencias = :asistencias,
                partidos_jugados = :partidos_jugados,
                tarjetas_amarillas = :tarjetas_amarillas,
                tarjetas_rojas = :tarjetas_rojas,
                descripcion = :descripcion
                WHERE jugador_id = :jugador_id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':equipo_id', $equipo_id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':posicion', $posicion);
            $stmt->bindParam(':numero_camiseta', $numero_camiseta);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':nacionalidad', $nacionalidad);
            $stmt->bindParam(':altura', $altura);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':goles', $goles);
            $stmt->bindParam(':asistencias', $asistencias);
            $stmt->bindParam(':partidos_jugados', $partidos_jugados);
            $stmt->bindParam(':tarjetas_amarillas', $tarjetas_amarillas);
            $stmt->bindParam(':tarjetas_rojas', $tarjetas_rojas);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':jugador_id', $jugador_id);

            $stmt->execute();
            }else{

            $sql = "UPDATE Jugadores SET 
                equipo_id = :equipo_id,
                nombre = :nombre,
                posicion = :posicion,
                numero_camiseta = :numero_camiseta,
                fecha_nacimiento = :fecha_nacimiento,
                nacionalidad = :nacionalidad,
                altura = :altura,
                peso = :peso,
                goles = :goles,
                asistencias = :asistencias,
                partidos_jugados = :partidos_jugados,
                tarjetas_amarillas = :tarjetas_amarillas,
                tarjetas_rojas = :tarjetas_rojas,
                imagen_url = :imagen_url,
                descripcion = :descripcion
                WHERE jugador_id = :jugador_id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':equipo_id', $equipo_id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':posicion', $posicion);
            $stmt->bindParam(':numero_camiseta', $numero_camiseta);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':nacionalidad', $nacionalidad);
            $stmt->bindParam(':altura', $altura);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':goles', $goles);
            $stmt->bindParam(':asistencias', $asistencias);
            $stmt->bindParam(':partidos_jugados', $partidos_jugados);
            $stmt->bindParam(':tarjetas_amarillas', $tarjetas_amarillas);
            $stmt->bindParam(':tarjetas_rojas', $tarjetas_rojas);
            $stmt->bindParam(':imagen_url', $imagen_url);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':jugador_id', $jugador_id);

            $stmt->execute();
            }
            header("location:editar_jugador.php?mensaje=Jugador+editado+con+exito");
        } catch (PDOException $error) {
            echo "Error al editar al jugador: " . $error->getMessage();

        }
    }

    public function eliminarJugador($jugador_id){
        try {
          
            $sql = "DELETE FROM Jugadores WHERE jugador_id = :juga";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":juga", $jugador_id);
            $stmt->execute();
            echo "success";
        } catch (PDOException $e) {
            echo "error";
        }
    }

}

?>