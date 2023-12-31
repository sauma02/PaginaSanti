<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Material Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="<?php echo URL;?>login/dist/style.css">
<link rel="shortcut icon" type="image/png" href="<?php echo URL;?>admin/srtdash/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo URL;?>admin/srtdash/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?php echo URL;?>admin/srtdash/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="<?php echo URL; ?>css/sweetalert2.min.css">
    <script>
        const url="<?php echo URL; ?>";
    </script>

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Material Login Form</h1><span>Pen <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Registrar Mascota</h1>
    <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Vacunas</label>
                                                    <select name="selTipoDocumento" id="selTipoDocumento" class="form-control has-feedback-left" style="height: 40px;">
                                                    <option selected="selected">Seleccione una opcion</option>
                                                    <?php foreach($vacunas as $value):?>
                                                        <option value="<?php echo $value['idVacuna'];?>"><?php echo $value['vacunas'];?></option>
                                                    <?php endforeach; ?>    
                                                    </select>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Nombre</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Ingrese el nombre" name="txtNombre" required pattern="[0-9]+">
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Raza</label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Ingrese la Raza" name="txtRaza" required >
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Edad</label>
                                                    <input type="number" class="form-control" id="validationCustom02" placeholder="Ingrese la Edad" name="txtEdad" required >
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Peso</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="number" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Ingrese el peso" required name="txtPeso">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese el peso.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Tamaño</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Ingrese el tamaño" aria-describedby="inputGroupPrepend" required name="txtTamaño">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese el tamaño de su mascota
                                                        </div>
                                                    </div>
                                                </div>

                                         


                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Sexo</label>
                                                    <select name="selSexo" id="selSexo" class="form-control has-feedback-left" style="height: 40px;">
                                                        <option selected="selected">Seleccionar Documento</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Asignar Fecha</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Ingrese la fecha de la cita" required name="txtFechaCita">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese una fecha.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Usuario</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input readonly="true" type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Ingrese la fecha de la cita" required name="txtUsuario">
                                                        
                                                    </div>
                                                </div>
                         

                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                                                    <label class="form-check-label" for="invalidCheck">
                                                        Acepto los Términos y condiciones
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        Debes aceptar antes de enviar.
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" name="btnGuardar">Registrar</button>
                                        </form>
  </div>
</div>
<!-- Portfolio--><a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="https://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
