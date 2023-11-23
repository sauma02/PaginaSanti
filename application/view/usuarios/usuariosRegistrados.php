                    <!-- table info start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Thead info</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-info">
                                                <tr class="text-white">
                                                    <th scope="col">Documento</th>
                                                    <th scope="col">Nombres</th>
                                                    <th scope="col">Apellidos</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Usuario</th>
                                                    <th scope="col">Rol</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($usuario as $value):?>
                                                <tr>
                                                    <th scope="row"><?php echo $value['Documento'];?></th>
                                                    <td><?php echo $value['Nombres'];?></td>
                                                    <td><?php echo $value['Apellidos'];?></td>
                                                    <td><?php echo $value['Email'];?></td>
                                                    <td><?php echo $value['Usuario'];?></td>
                                                    <td><?php echo $value['Descripcion'];?></td>
                                                    <td>
                                                        <?php if($value['Estado'] == 1):?>
                                                            <label class="badge badge-pill badge-success">Activo</label>
                                                        <?php else: ?>
                                                            <label class="badge badge-pill badge-danger" >Inactivo</label>
                                                        <?php endif;?>        
                                                    </td>
                                                    <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-editar" title="Editar" onclick="datoUsuario('<?php echo $value['idUsuario'];?>')"><i class="fa fa-edit"></i></button>

                                                    <button type="button" class="btn btn-warning btn-xs" title="Cambiar Estado" onclick="cambiarEstado('<?php echo $value['idUsuario'];?>')"><i class="fa fa-refresh"></i></button>

                                                    <button type="button" class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarUsuario('<?php echo $value['idUsuario'];?>')"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table info end -->

                    <!-- Large modal start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                                <!-- Large modal -->
                                <div class="modal fade bd-example-modal-lg" id="modal-editar">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate="" method="post">
                                                    <input type="hidden" id="txtIdUsuario" name="txtIdUsuario">
                                                
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
                                                    <input type="text" class="form-control" id="txtDocumento" placeholder="Ingrese Documento" name="txtDocumento" pattern="[0-9]+">
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Nombres</label>
                                                    <input type="text" class="form-control" id="txtNombres" placeholder="Ingrese su Nombre" name="txtNombres">
                                                    <div class="valid-feedback">
                                                        Revisar!
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Apellidos</label>
                                                    <input type="text" class="form-control" id="txtApellidos" placeholder="Ingrese su Apellido" name="txtApellidos">
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
                                                        <input type="date" class="form-control" id="txtFechaNacimiento" aria-describedby="inputGroupPrepend" placeholder="Ingrese Fecha Nacimiento" name="txtFechaNacimiento">
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
                                                        <input type="text" class="form-control" id="txtTelefono" placeholder="Ingrese # de Teléfono" aria-describedby="inputGroupPrepend" name="txtTelefono">
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
                                                        <input type="text" class="form-control" id="txtDireccion" placeholder="Ingrese Dirección" aria-describedby="inputGroupPrepend" name="txtDireccion">
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
                                                        <input type="text" class="form-control" id="txtEmail" placeholder="Ingrese su Email" aria-describedby="inputGroupPrepend" name="txtEmail">
                                                        <div class="invalid-feedback">
                                                            Por favor ingrese su Dirección
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Género</label>
                                                    <select name="selGenero" id="selGenero" class="form-control has-feedback-left" style="height: 40px;">
                                                        <option selected="selected">Seleccionar Documento</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div> -->

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Usuario</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="txtUsuario" placeholder="Ingrese un Usuario" aria-describedby="inputGroupPrepend" name="txtUsuario">
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
                                                        <input type="text" class="form-control" id="txtClave" placeholder="Ingrese una Clave" aria-describedby="inputGroupPrepend" name="txtClave">
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
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" type="submit" name="btnEditar">Actualizar</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Large modal modal end -->