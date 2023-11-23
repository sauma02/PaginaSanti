<?php
class mdlPersona{
    //atributos
    public $idPersona;
    public $documento;
    public $idTipoDocumento;
    public $nombres;
    public $apellidos;
    public $telefono;
    public $direccion;
    public $email;
    public $fechaNacimiento;
    public $genero;
    public $db;

    //crear el método para fijar los datos
    public function __SET($atributo, $valor){
        $this->$atributo = $valor;
    }

    //crear el método para reclamar los datos cuando sean necesarios
    public function __GET($atributo){
        return $this->$atributo;
    }

    //crear la conexión 
    public function __construct($db){
        try{
            $this->db = $db;
        }catch(PDOException $e){
            exit("Error al conectar a la base de datos");
        }
    }

    //método para registrar personas
    public function registrarPersonas(){
        //variable consulta
        $sql = "INSERT INTO personas(Documento, Nombres, Apellidos, Email, Telefono, Direccion, Género, FechaNacimiento, idTipoDocumento) VALUES (?,?,?,?,?,?,?,?,?)";

        //crear la variable para preparar la consulta y enviar
        $stm = $this->db->prepare($sql);
        $stm -> bindParam(1, $this->documento);
        $stm -> bindParam(2, $this->nombres);
        $stm -> bindParam(3, $this->apellidos);
        $stm -> bindParam(4, $this->email);
        $stm -> bindParam(5, $this->telefono);
        $stm -> bindParam(6, $this->direccion);
        $stm -> bindParam(7, $this->genero);
        $stm -> bindParam(8, $this->fechaNacimiento);
        $stm -> bindParam(9, $this->idTipoDocumento);
        $resultado = $stm->execute();
        return $resultado;
    }
    

    //función para retornar el id de la última persona registrada
    public function ultimoIdPersona(){
        $sql = "SELECT MAX(idPersona) AS ultimoIdPersona FROM personas";
        $query =$this->db->prepare($sql);
        $query->execute();
        $ultimoId = $query->fetchAll(PDO::FETCH_ASSOC);
        return $ultimoId;
    }

    //método para poder ver los datos de la tabla documento
    public function listarTipoDocumento(){
        $sql = "SELECT idTipoDocumento, Descripcion AS doc FROM tiposdocumentos";
        $query = $this->db->prepare($sql);
        $query -> execute();
        $doc = $query->fetchAll(PDO::FETCH_ASSOC);
        return $doc;
    }
}
?>