<?php
include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

include('../../layout/admin/sesion.php');
include('../../layout/admin/datos_sesion_user.php');
?>

<?php include ('../../layout/admin/parte1.php');?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registro de un nuevo prestamo</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header">
                    LLene la información con mucho cuidado
                </div>
                <div class="card-body">
                    <form action="controller_create.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombres</label><span style="color: red;"> <b>*</b></span>
                                    <input type="text" name="nombre" class="form-control" placeholder="Escribe el nombre completo" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Carrera</label> <span style="color: red;"> <b>*</b></span>
                                    <select name="carrera" id="" class="form-control">
                                        <option value="informatica">Informatica</option>
                                        <option value="administracion">Administracion</option>
                                        <option value="contabilidad">Contabilidad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Matricula</label><span style="color: red;"> <b>*</b></span>
                                    <input type="number" name="matricula" class="form-control" required>
                                </div>
                            </div>
                        </div>

                      

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Libro que solicita</label><span style="color: red;"> <b>*</b></span>
                                    <input type="text" name="libro" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Observaciones del libro</label><span style="color: red;"> <b>*</b></span>
                                    <input type="text" name="observacion" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <center>
                                    <a href="<?php echo $URL."/admin/";?>" class="btn btn-default btn-block">Cancelar</a>
                                </center>
                            </div>
                            <div class="col-md-4">
                               <center>
                                   <button type="submit" onclick="return confirm('Asegurece de llenar la información correcta');" class="btn btn-primary btn-block">Registrar prestamo</button>
                               </center>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include ('../../layout/admin/parte2.php');?>
