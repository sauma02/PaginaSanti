<?php
//crear la clase para heredar del controlador
class usuarioController extends Controller{
    //atributos
    private $modeloU;
    private $modeloM;

    //crear el constructor
    public function __construct(){
        //instaciar los modelos
        $this->modeloU= $this->loadModel("mdlUsuario");
        $this->modeloM= $this->loadModel("mdlMascota");
        
    }
   

    //método para iniciar sesión
    public function iniciar(){
        
        $error = false;
        if(isset($_POST['btnIngresar'])){
            $this->modeloU->__SET('usuario', $_POST['txtUsuario']);
            $this->modeloU->__SET('clave', $_POST['txtClave']);
            $_POST=[];

            //llamamos al método de validación del modelo
            $validar = $this->modeloU->validarUsuario();
            $validar2 = $this->modeloU->validarUsuarioNoAdmin();

            //revisar la validación
            if($validar == true){
                $_SESSION['SESSION INICIADA'] = true;
                $error = false;

                $_SESSION['Nombres'] = $validar['Nombres'];
                $_SESSION['idUsuario'] = $validar['idUsuario'];
                $_SESSION['Apellidos'] = $validar['Apellidos'];
                $_SESSION['Documento'] = $validar['Documento'];
                $_SESSION['Usuario'] = $validar['Usuario'];
                $_SESSION['Descripcion'] = $validar['Descripcion'];
                //después de la validación cargar el admin
              
                $admin = require APP . 'view/home/indexAdmin.php';
                echo $admin;
                exit();
            }else if($validar2 == true){
                $_SESSION['SESSION INICIADA'] = true;
                $error = false;
                $_SESSION['Nombres'] = $validar2['Nombres'];
                $_SESSION['idUsuario'] = $validar2['idUsuario'];
                $_SESSION['Apellidos'] = $validar2['Apellidos'];
                $_SESSION['Documento'] = $validar2['Documento'];
                $_SESSION['Usuario'] = $validar2['Usuario'];
                $_SESSION['Descripcion'] = $validar2['Descripcion'];
            
                $usuario = require APP . 'view/home/indexUsuario.php';
                echo $usuario;
                exit();
             
            
            }else{
                echo "error2";
                
                return false;
            }
        }else{
        
            require APP . 'view/usuarios/login.php';
            
        }
       
        
        
        
       
    }

    public function principal(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/principal.php';
        require APP . 'view/_templates/footer.php'; 
    }

    //método para cerrar la sesión
    public function cerrarSesion(){
        if(isset($_SESSION['SESION INICIADA'])){
            session_destroy();
        }
        header("Location:".URL."home/index");
        exit();
    }

    //método para listar o ver los usuarios
    public function listarUsuarios(){
        if(isset($_POST['btnEditar'])){
            $this -> modeloU -> __SET('idTipoDocumento', $_POST['selTipoDocumento']);
            $this -> modeloU -> __SET('documento', $_POST['txtDocumento']);
            $this -> modeloU -> __SET('nombres', $_POST['txtNombres']);
            $this -> modeloU -> __SET('apellidos', $_POST['txtApellidos']);
            $this -> modeloU -> __SET('telefono', $_POST['txtTelefono']);
            $this -> modeloU -> __SET('direccion', $_POST['txtDireccion']);
            // $this -> modeloU -> __SET('genero', $_POST['selGenero']);
            $this -> modeloU -> __SET('email', $_POST['txtEmail']);
            $this -> modeloU -> __SET('usuario', $_POST['txtUsuario']);
            $this -> modeloU -> __SET('clave', $_POST['txtClave']);
            $this -> modeloU -> __SET('idRol', $_POST['selRoles']);
            $this -> modeloU -> __SET('idUsuario', $_POST['txtIdUsuario']);

            //variable que nos enviará los datos para editar
            $update = $this->modeloU->modificarUsuario();

            //aquí irá la validación para una alert con la libreria sweetalert

        }
        //crear variables para llamar los métodos del modelo
        $usuario = $this->modeloU->listarUsuarios();
        $roles = $this -> modeloU->listarRoles();
        $tipoDocumentos = $this->modeloU->listarTipoDocumento();

        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/usuariosRegistrados.php';
        require APP . 'view/_templates/footer.php';
    }

    //método para registrar las personas y usuarios
    public function registrarUsuario(){
        if(isset($_POST['btnGuardar'])){
            $this->modeloU->__SET('idTipoDocumento', $_POST['selTipoDocumento']);
            $this->modeloU->__SET('documento', $_POST['txtDocumento']);
            $this->modeloU->__SET('nombres', $_POST['txtNombres']);
            $this->modeloU->__SET('apellidos', $_POST['txtApellidos']);
            $this->modeloU->__SET('fechaNacimiento', $_POST['txtFechaNacimiento']);
            $this->modeloU->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloU->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloU->__SET('email', $_POST['txtEmail']);
            $this->modeloU->__SET('genero', $_POST['selGenero']);

            $persona = $this->modeloU->registrarPersonas();

            if($persona == true){
                $ultimoId = $this->modeloU->ultimoIdPersona();
                foreach($ultimoId as $value){
                    $ultimoIdValue = $value['ultimoIdPersona'];
                }
            }

            //los datos para la tabla usuarios
            $this->modeloU->__SET('idPersona', $ultimoIdValue);
            $this->modeloU->__SET('usuario', $_POST['txtUsuario']);
            $this->modeloU->__SET('clave', $_POST['txtClave']);
            $this->modeloU->__SET('idRol', $_POST['selRoles']);

            //variable para traer el método registrar del modelo
            $usuario = $this->modeloU->registrarUsuario();

            //aquí se agregará el código para el sweetalert2
            if($persona == true && $usuario == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."usuarioController/listarUsuarios");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrió un Error',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."usuarioController/registrarUsuario");
                    exit();
            }
        }

        //variables para traer los demás métodos necesarios
        $roles = $this->modeloU->listarRoles();
        $tipoDocumentos = $this->modeloU->listarTipoDocumento();

        require APP . 'view/_templates/header.php';
        require APP . 'view/usuarios/registrarUsuario.php';
        require APP . 'view/_templates/footer.php';
    }
    public function registrarUsuarioNoAdmin(){
        if(isset($_POST['btnGuardar'])){
            $this->modeloU->__SET('idTipoDocumento', $_POST['selTipoDocumento']);
            $this->modeloU->__SET('documento', $_POST['txtDocumento']);
            $this->modeloU->__SET('nombres', $_POST['txtNombres']);
            $this->modeloU->__SET('apellidos', $_POST['txtApellidos']);
            $this->modeloU->__SET('fechaNacimiento', $_POST['txtFechaNacimiento']);
            $this->modeloU->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloU->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloU->__SET('email', $_POST['txtEmail']);
            $this->modeloU->__SET('genero', $_POST['selGenero']);

            $persona = $this->modeloU->registrarPersonas();

            if($persona == true){
                $ultimoId = $this->modeloU->ultimoIdPersona();
                foreach($ultimoId as $value){
                    $ultimoIdValue = $value['ultimoIdPersona'];
                }
            }

            //los datos para la tabla usuarios
            $this->modeloU->__SET('idPersona', $ultimoIdValue);
            $this->modeloU->__SET('usuario', $_POST['txtUsuario']);
            $this->modeloU->__SET('clave', $_POST['txtClave']);
            $this->modeloU->__SET('idRol', $_POST['selRoles']);

            //variable para traer el método registrar del modelo
            $usuario = $this->modeloU->registrarUsuarioNoAdmin();

            //aquí se agregará el código para el sweetalert2
            if($persona == true && $usuario == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."home/index");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrió un Error',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."usuarioController/registrarUsuarioNoAdmin");
                    exit();
            }
            
        }

        //variables para traer los demás métodos necesarios
        $roles = $this->modeloU->listarRoles();
        $tipoDocumentos = $this->modeloU->listarTipoDocumento();

        
        require APP . 'view/usuarios/registrarUsuarioNoAdmin.php';
        
    }
    public function registrarMascota(){
        if(isset($_POST['btnGuardar'])){
            $this->modeloM->__SET('idVacunas', $_POST['selVacuna']);
            $this->modeloM->__SET('nombre', $_POST['txtNombre']);
            $this->modeloM->__SET('raza', $_POST['txtRaza']);
            $this->modeloM->__SET('tamaño', $_POST['txtTamaño']);
            $this->modeloM->__SET('peso', $_POST['txtPeso']);
            $this->modeloM->__SET('edad', $_POST['txtEdad']);
            $this->modeloM->__SET('sexo', $_POST['txtSexo']);
            $this->modeloM->__SET('fecha', $_POST['txtFecha']);

            $mascota = $this->modeloM->registrarMascota();

            if($mascota == true){
                $ultimoId = $this->modeloM->ultimoIdMascota();
                foreach($ultimoId as $value){
                    $ultimoIdValue = $value['ultimoIdMascota'];
                }
            }


            //aquí se agregará el código para el sweetalert2
            if($mascota == true && $usuario == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."home/index");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrió un Error',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."usuarioController/registrarMascota");
                    exit();
            }
        }
        

        //variables para traer los demás métodos necesarios
        $usuario = $this->modeloU->listarUsuario();
        $vacunas = $this->modeloM->listarVacunas();

        
        require APP . 'view/mascotas/registrarMascota.php';
        
    }
    public function registrarMascotaAdmin(){
        if(isset($_POST['btnGuardar'])){
            $this->modeloM->__SET('idVacuna', $_POST['selVacuna']);
            $this->modeloM->__SET('nombre', $_POST['txtNombre']);
            $this->modeloM->__SET('raza', $_POST['txtRaza']);
            $this->modeloM->__SET('tamaño', $_POST['txtTamaño']);
            $this->modeloM->__SET('peso', $_POST['txtPeso']);
            $this->modeloM->__SET('edad', $_POST['txtEdad']);
            $this->modeloM->__SET('sexo', $_POST['txtSexo']);
            $this->modeloM->__SET('fecha', $_POST['txtFecha']);

            $mascota = $this->modeloM->registrarMascota();

            if($mascota == true){
                $ultimoId = $this->modeloM->ultimoIdMascota();
                foreach($ultimoId as $value){
                    $ultimoIdValue = $value['ultimoIdMascota'];
                }
            }


            //aquí se agregará el código para el sweetalert2
            if($mascota == true && $usuario == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."home/index");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrió un Error',
                    showConfirmButton: false,
                    timer:1500})";

                    header("Location: ".URL."usuarioController/registrarMascotaAdmin");
                    exit();
            }
      
        }
        

        //variables para traer los demás métodos necesarios
        $usuario = $this->modeloU->listarUsuarios();
        $vacunas = $this->modeloM->listarVacunas();

        
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/mascotas/registrarMascotaAdmin.php';
        require APP . 'view/_templates/footer.php';
    }
    


    //función para traer el ID
    public function datoUsuario(){
        //crear una variable para controlar
        $usuario = $this->modeloU->usuarioId($_POST['id']);
        echo json_encode($usuario);
    }

    //función para cambiar estado
    public function cambiarEstado(){
        $estado = $this->modeloU->cambiarEstado($_POST['id']);
        echo 1;
    }

    //función para eliminar
    public function eliminarUsuario(){
        $estado = $this->modeloU->eliminarUsuario($_POST['id']);
        echo 1;
    }
}
?>