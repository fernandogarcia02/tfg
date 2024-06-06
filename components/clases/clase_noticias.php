<?php

class Noticias {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function obtenerNoticia($id) {
        $query = "SELECT * FROM Noticias WHERE noticia_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerNoticiaObj($id) {
        $query = "SELECT * FROM Noticias WHERE noticia_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function traerNoticias(){
        try {
            $query = "SELECT * FROM Noticias WHERE 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $noticias = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $noticias;

        } catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error al traer las noticias: " . $e->getMessage();
        }
    }

    public function traerNoticiasEquipo($equipo_id){
        try {
            $query = "SELECT * FROM Etiquetas WHERE nombre_etiqueta = 'Equipo' AND valor = :equipo";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":equipo", $equipo_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }  catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error al traer las noticias: " . $e->getMessage();
        }
    }

    public function traerNoticiasJugador($jugador_id){
        try {
            $query = "SELECT * FROM Etiquetas WHERE nombre_etiqueta = 'Jugador' AND valor = :jugador";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":jugador", $jugador_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }  catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error al traer las noticias: " . $e->getMessage();
        }
    }

    public function crearNoticia($titulo, $contenido, $imagen_url, $video_url, $autor,$opcionese,$opcionesj,$portada, $equipo_id = null, $jugador_id = null) {
       try{
       
        $query = "INSERT INTO Noticias (titulo, contenido, imagen_url, video_url, autor, equipo_id, jugador_id) 
                    VALUES (:titulo, :contenido, :imagen_url, :video_url, :autor, :equipo_id, :jugador_id)";
            $stmt = $this->db->prepare($query);

            
            if (empty($equipo_id)) {
                $equipo_id = null;
            }
            if (empty($jugador_id)) {
                $jugador_id = null;
            }

            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':contenido', $contenido);
            $stmt->bindParam(':imagen_url', $imagen_url);
            $stmt->bindParam(':video_url', $video_url);
            $stmt->bindParam(':autor', $autor);
            $stmt->bindParam(':equipo_id', $equipo_id);
            $stmt->bindParam(':jugador_id', $jugador_id);
            
            $stmt->execute();

            $noticia_id = $this->db->lastInsertId();

            if (!empty($opcionese)) {
                $query = "INSERT INTO Etiquetas (nombre_etiqueta, noticia_id, valor)
                            VALUES (:nombre, :noticia, :valor)";
                
                foreach ($opcionese as $key => $value) {
                    $stmt = $this->db->prepare($query);

                    $stmt->bindValue(':nombre', "Equipo");
                    $stmt->bindParam(':noticia', $noticia_id);
                    $stmt->bindParam(':valor', $value);

                    $stmt->execute();
                }
            }

            if (!empty($opcionesj)) {
                $query = "INSERT INTO Etiquetas (nombre_etiqueta, noticia_id, valor)
                            VALUES (:nombre, :noticia, :valor)";
                
                foreach ($opcionesj as $key => $value) {
                    $stmt = $this->db->prepare($query);

                    $stmt->bindValue(':nombre', "Jugador");
                    $stmt->bindParam(':noticia', $noticia_id);
                    $stmt->bindParam(':valor', $value);

                    $stmt->execute();
                }
            }

            if($portada){
                $query = "INSERT INTO Portadas (noticia_id)
                    VALUES (:noti)";

                $stmt = $this->db->prepare($query);
                $stmt->bindParam(":noti", $noticia_id);
                $stmt->execute();
            }

            header("location:crear_noticia.php?mensaje=Noticia+creada+con+exito");
            exit;
        }catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error al registrar al usuario: " . $e->getMessage();
        }
    }

    public function editarNoticia($noticia_id,$titulo,$contenido,$autor,$imagen_url,$video_url,$portada){
        try {

            if ($imagen_url == null && $video_url == null) {
                $sql = "UPDATE Noticias SET titulo = :titulo, contenido = :contenido, autor = :autor WHERE noticia_id = :noti";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":titulo",$titulo);
            $stmt->bindParam(":contenido",$contenido);
            $stmt->bindParam(":autor",$autor);
            $stmt->bindParam(":noti",$noticia_id);
            $stmt->execute();

            if ($portada) {
                $query = "SELECT * FROM Portadas WHERE noticia_id = $noticia_id";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                $por = $stmt->fetch();
                if (!$por) {
                    $query = "INSERT INTO Portadas (noticia_id)
                    VALUES (:noti)";

                $stmt = $this->db->prepare($query);
                $stmt->bindParam(":noti", $noticia_id);
                $stmt->execute();
                }
            }
            }else{
            $sql = "UPDATE Noticias SET titulo = :titulo, contenido = :contenido, imagen_url = :img, video_url = :vid, autor = :autor WHERE noticia_id = :noti";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":titulo",$titulo);
            $stmt->bindParam(":contenido",$contenido);
            $stmt->bindParam(":img",$imagen_url);
            $stmt->bindParam(":vid",$video_url);
            $stmt->bindParam(":autor",$autor);
            $stmt->bindParam(":noti",$noticia_id);
            $stmt->execute();

            if ($portada) {
                $query = "SELECT * FROM Portadas WHERE noticia_id = $noticia_id";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                $por = $stmt->fetch();
                if (!$por) {
                    $query = "INSERT INTO Portadas (noticia_id)
                    VALUES (:noti)";

                $stmt = $this->db->prepare($query);
                $stmt->bindParam(":noti", $noticia_id);
                $stmt->execute();
                }
            }
        }

            header("location:editar_noticia.php?mensaje=Noticia+editada+con+exito");

        } catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error al editar la noticia: " . $e->getMessage();
        }
    }
    

    public function eliminarNoticia($noticia_id){
        try {
            $sql = "DELETE FROM Etiquetas WHERE noticia_id = :noti";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":noti", $noticia_id);
            $stmt->execute();



            $sql = "DELETE FROM Noticias WHERE noticia_id = :noti";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":noti", $noticia_id);
            $stmt->execute();
            echo "success";
        } catch (PDOException $e) {
            echo "error";
        }
    }

    public function traerPortada(){
        try {
            $sql = "SELECT * FROM Portadas ORDER BY portada_id DESC LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $port = $stmt->fetch(PDO::FETCH_OBJ);

            $sql = "SELECT * FROM Noticias WHERE noticia_id = :noticia";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":noticia", $port->noticia_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo "error". $e;
        }
    }

    public function traerNoticiasInd(){
        try {
            $portada = self::traerPortada();
            $sql = "SELECT * FROM Noticias WHERE noticia_id != :noti ORDER BY noticia_id DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam("noti",$portada->noticia_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo "error". $e;
        }
    }

    public function traerComentarios($noticia_id){
        try {
            $sql = "SELECT * FROM Comentarios WHERE noticia_id = :noti";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":noti", $noticia_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo "error". $e;
        }
    }

    public function crearComentario($usuario_id, $contenido, $noticia_id){
        try {
            $query = "INSERT INTO Comentarios (usuario_id, noticia_id, contenido)
                            VALUES (:usuario, :noticia, :contenido)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":usuario", $usuario_id);
            $stmt->bindParam(":noticia" , $noticia_id);
            $stmt->bindParam(":contenido", $contenido);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "error". $e;
        }
    }

    
}

?>