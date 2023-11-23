                            <!-- Server side start -->
                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title">Server side</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Tipo Documento</label>
                                                    <select name="selTipoDocumento" id="selTipoDocumento" class="form-control has-feedback-left" style="height: 40px;">
                                                    <option selected="selected">Seleccionar Documento</option>
                                                    <?php foreach($tipoDocumentos as $value):?>
                                                        <option value="<?php echo $value['idTipoDocumento'];?>"><?php echo $value['doc'];?></option>
                                                    <?php endforeach; ?>    
                                                    </select>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Documento</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Ingrese Documento" name="txtDocumento" required pattern="[0-9]+">
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Nombres</label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Ingrese su Nombre" name="txtNombres" required >
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Apellidos</label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Ingrese su Apellido" name="txtApellidos" required >
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Fecha Nacimiento</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Ingrese Fecha Nacimiento" required name="txtFechaNacimiento">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese una fecha.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Teléfono</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Ingrese # de Teléfono" aria-describedby="inputGroupPrepend" required name="txtTelefono">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese su número de Teléfono
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Dirección</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Ingrese Dirección" aria-describedby="inputGroupPrepend" required name="txtDireccion">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese su Dirección
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Ingrese su Email" aria-describedby="inputGroupPrepend" required name="txtEmail">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese su Dirección
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Género</label>
                                                    <select name="selGenero" id="selGenero" class="form-control has-feedback-left" style="height: 40px;">
                                                        <option selected="selected">Seleccionar Documento</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Usuario</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Ingrese un Usuario" aria-describedby="inputGroupPrepend" required name="txtUsuario">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese su Dirección
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Clave</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Ingrese una Clave" aria-describedby="inputGroupPrepend" required name="txtClave">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese su Dirección
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Rol</label>
                                                    <select name="selRoles" id="selRoles" class="form-control has-feedback-left" style="height: 40px;">
                                                    <option selected="selected">Seleccionar Documento</option>
                                                    <?php foreach($roles as $value):?>
                                                        <option value="<?php echo $value['idRol'];?>"><?php echo $value['tipo'];?></option>
                                                    <?php endforeach; ?>    
                                                    </select>
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
                            </div>
                            <!-- Server side end -->