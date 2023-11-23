<?php
class Mascota{
private $idMascota;    
private $nombre;
private $raza;
private $edad;
private $peso;
private $tamaño;
private $vacunas;
private $db;

public function __construct($db) {
    try {
        $this->db=$db;
    } catch (PDOException $e) {
        exit("Error al conectar a la base de datos");
    }
}
public function __SET($atributo, $valor){
    $this->$atributo=$valor;
}
public function __GET($atributo){
    return $this->$atributo;
}
 public function registrarMascota(){
    $sql="INSERT INTO mascota(idMascota, nombre, raza, edad, peso, tamaño, idVacunas, idUsuario)VALUES(NULL,?,?,?,?,?,?,?);";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->nombre);
    $stm->bindParam(2, $this->raza);
    $stm->bindParam(3, $this->edad);
    $stm->bindParam(4, $this->peso);
    $stm->bindParam(5, $this->tamaño);
    $stm->bindParam(6, $this->idVacunas);
    $stm->bindParam(7, $this->idUsuario);
    $resultado = $stm->execute();
    return $resultado;
    
 }
 public function ultimoIdMascota(){
    $sql = "SELECT MAX(idMascota) AS ultimoIdMascota FROM mascotas";
    $query =$this->db->prepare($sql);
    $query->execute();
    $ultimoId = $query->fetchAll(PDO::FETCH_ASSOC);
    return $ultimoId;
}






















}





?>