<?php 
//heredar del modelo principal
require_once("mdlPersona.php");

//heredamos la clase
class mdlUsuario extends mdlPersona{
    private $idUsuario;
    private $usuario;
    private $clave;
    private $idRol;
    private $estado;

    //crear el método para fijar los datos
    public function __SET($atributo, $valor){
        $this->$atributo = $valor;
    }

    //crear el método para reclamar los datos cuando sean necesarios
    public function __GET($atributo){
        return $this->$atributo;
    }

    //método para la validación del usuario
    public function validarUsuario(){
        $sql = "SELECT P.Documento, P.Nombres, P.Apellidos,U.idUsuario, U.Usuario, R.Descripcion, U.idRol FROM personas AS P INNER JOIN tiposdocumentos AS TD ON P.idTipoDocumento = TD.idTipoDocumento INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON U.idRol = R.idRol WHERE U.Usuario = ? AND U.Clave = ? AND U.idRol = 1 AND U.Estado = 1";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->usuario);
        $stm->bindParam(2, $this->clave);
        
        $stm->execute();
        //crear una variable que retornará los datos
        $user = $stm ->fetch(PDO::FETCH_ASSOC);
        return $user;
        
    }
    public function validarUsuarioNoAdmin(){
        $sql = "SELECT P.Documento, P.Nombres, P.Apellidos,U.idUsuario, U.Usuario, R.Descripcion, U.idRol FROM personas AS P INNER JOIN tiposdocumentos AS TD ON P.idTipoDocumento = TD.idTipoDocumento INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON U.idRol = R.idRol WHERE U.Usuario = ? AND U.Clave = ? AND U.idRol = 2 AND U.Estado = 1";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->usuario);
        $stm->bindParam(2, $this->clave);
        
        $stm->execute();
        //crear una variable que retornará los datos
        $user = $stm ->fetch(PDO::FETCH_ASSOC);
        return $user;
        
    }

    //método para registrar usuarios
    public function registrarUsuario(){
        //consulta
        $sql = "INSERT INTO usuarios(Usuario, Clave, idPersona, idRol, Estado) VALUES (?,?,?,?,?)";

        $estado = 1;

        //vamos a enviar los parámetros
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->usuario);
        $stm->bindParam(2, $this->clave);
        $stm->bindParam(3, $this->idPersona);
        $stm->bindParam(4, $this->idRol);
        $stm->bindParam(5, $estado);

        $result = $stm->execute();
        return $result;
    }
    public function registrarUsuarioNoAdmin(){
        //consulta
        $sql = "INSERT INTO usuarios(Usuario, Clave, idPersona, idRol, Estado) VALUES (?,?,?,?,?)";

        $estado = 1;
        $idRol = 2;

        //vamos a enviar los parámetros
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->usuario);
        $stm->bindParam(2, $this->clave);
        $stm->bindParam(3, $this->idPersona);
        $stm->bindParam(4, $idRol);
        $stm->bindParam(5, $estado);

        $result = $stm->execute();
        return $result;
    }

    //método para listar o ver los usuarios registrados
    public function listarUsuarios(){
        //consulta
        $sql = "SELECT P.idPersona, P.Documento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, P.Género, P.FechaNacimiento, U.idUsuario, U.Usuario, U.Estado, R.Descripcion FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol = U.idRol";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        $user = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    //método para filtar usuario
    public function usuarioId($id){
        //consulta
        $sql = "SELECT P.idPersona, P.Documento, P.idTipoDocumento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, P.Género, P.FechaNacimiento, U.idUsuario, U.Usuario, U.Clave, U.Estado, U.idRol, R.Descripcion FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol = U.idRol WHERE idUsuario = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //método para listar o ver los roles registrados
    public function listarRoles(){
        //consulta
        $sql = "SELECT idRol, Descripcion AS tipo, Estado FROM roles";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //método para cambiar el estado
    public function cambiarEstado($id){
        //consulta
        $sql = "UPDATE usuarios SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE idUsuario = ?";

        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query->execute();
    }

    //eliminar usuarios
    public function eliminarUsuario($id){
        //consulta
        $sql = "DELETE U, P FROM usuarios AS U INNER JOIN personas AS P WHERE P.idPersona = U.idPersona AND U.idUsuario = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query->execute();
    }

    //modificar los usuarios
    public function modificarUsuario(){
        //consulta
        $sql = "UPDATE personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona SET P.idTipoDocumento = ?, P.Documento = ?, P.Nombres = ?, P.Apellidos = ?, P.Telefono = ?, P.Direccion = ?, P.Género = ?, P.Email = ?, U.Usuario = ?, U.Clave = ?, U.idRol = ? WHERE U.idUsuario = ?";

        $stm = $this->db->prepare($sql);
        $stm -> bindParam(1, $this->idTipoDocumento);
        $stm -> bindParam(2, $this->documento);
        $stm -> bindParam(3, $this->nombres);
        $stm -> bindParam(4, $this->apellidos);
        $stm -> bindParam(5, $this->telefono);
        $stm -> bindParam(6, $this->direccion);
        $stm -> bindParam(7, $this->genero);
        $stm -> bindParam(8, $this->email);
        $stm -> bindParam(9, $this->usuario);
        $stm -> bindParam(10, $this->clave);
        $stm -> bindParam(11, $this->idRol);
        $stm -> bindParam(12, $this->idUsuario);

        //respuesta
        $result = $stm->execute();
        return $result;
    }
}
?>