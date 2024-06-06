<?php
class Usuarios{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }


    public function registrarUsuario($nombre,$correo,$hash_contrasena,$fecha_nacimiento,$username){
        try {

            $stmt = $this->db->prepare("SELECT * FROM Usuarios WHERE nombre_usuario = :usuario");
            $stmt->bindParam(":usuario",$username);
            $stmt->execute();
            $usuario_existente = $stmt->fetch();

            if($usuario_existente){
                header("Location: registrarse.php?error=Este+usuario+ya+existe");
                exit;
            }

            $stmt = $this->db->prepare("SELECT * FROM Usuarios WHERE correo_electronico = :correo");
            $stmt->bindParam(":correo",$correo);
            $stmt->execute();
            $correo_existente = $stmt->fetch();

            if ($correo_existente) {
                header("Location: registrarse.php?error=Este+correo+ya+está+asociado+a+una+cuenta");
                exit;
            }
            

            // Preparar la consulta SQL para insertar un nuevo usuario
            $sql = "INSERT INTO Usuarios (nombre_completo,nombre_usuario, correo_electronico, contrasena, fecha_nacimiento) 
                    VALUES (:nombre,:username, :correo, :contrasena, :fecha_nacimiento)";
            $stmt = $this->db->prepare($sql);
    
            // Bind de los parámetros
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":correo", $correo);
            $stmt->bindParam(":contrasena", $hash_contrasena);
            $stmt->bindParam(":fecha_nacimiento", $fecha_nacimiento);
            $stmt->bindParam(":username", $username);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            session_start();
    
            //$_SESSION['username'] = $username;
    
            // Redirigir al usuario a una página de éxito
            header("Location: inicio_sesion.php?exito=El+usuario+se+ha+registrado+correctamente%2c+Por+favor+inicie+sesi%c3%b3n%3a");
            exit;
        } catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error al registrar al usuario: " . $e->getMessage();
        }
    }

    public function comprobarLog($usuario,$contrasena){
        $stmt = $this->db->prepare("SELECT * FROM Usuarios WHERE nombre_usuario = :usuario");
        $stmt->bindParam(":usuario",$usuario);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        if ($resultado) {
            $pass = $resultado->contrasena;
            if (password_verify($contrasena,$pass)) {
                $_SESSION['username'] = $usuario;
                $_SESSION['usuario_id'] = $resultado->usuario_id;
                if ($resultado->rol == 'usuario') {
                    header("location: index.php");
                    exit;
                }else{
                    $_SESSION['admin'] = true;
                    header("location: pages/areaAdmin.php");
                    exit;
                }
                 
                 
            }else{
                header("location: inicio_sesion.php?error=La+contraseña+introducida+no+es+correcta");
            }
        }else {
            header("location: inicio_sesion.php?error=El+usuario+ingresado+no+existe");
            exit;
        }
    }

    public function traerUsuario($usuario){
        try {
            $sql = "SELECT * FROM Usuarios WHERE usuario_id = $usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }catch (PDOException $e) {
            // Manejar cualquier error de la base de datos
            echo "Error " . $e->getMessage();
        }
    }
    
        
}

?>