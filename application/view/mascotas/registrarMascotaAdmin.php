<div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title">Server side</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Vacunas</label>
                                                    <select name="selVacuna" id="selVacuna" class="form-control has-feedback-left" style="height: 40px;">
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