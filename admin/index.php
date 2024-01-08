<?php
include ($_SERVER['DOCUMENT_ROOT'].'/www.sis_biblioteca.com/app/config/config.php');
include ($_SERVER['DOCUMENT_ROOT'].'/www.sis_biblioteca.com/app/config/conexion.php');

include($_SERVER['DOCUMENT_ROOT'].'/www.sis_biblioteca.com/layout/admin/sesion.php');
include($_SERVER['DOCUMENT_ROOT'].'/www.sis_biblioteca.com/layout/admin/datos_sesion_user.php');

// Cerrar sesión al presionar el botón
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cerrar_sesion"])) {
    // Destruir la sesión
    session_destroy();

    // Redireccionar al formulario de inicio de sesión o a donde desees
    header("Location: /www.sis_biblioteca.com/login/controller_cerrar_sesion.php");
    exit();
}
?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/www.sis_biblioteca.com/layout/admin/parte1.php');?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bienvenido</h1>                                     


                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <table class="table table-hover table-bordered table-striped" style="background-color: #ffffff">
                        <thead>
                        <tr>
                            <td><b>Nombres</b></td>
                            <td><?php echo $sesion_nombres;?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th><b>Apellido</b></th>
                            <td><?php echo $sesion_apellidos;?></td>
                        </tr>
                        <tr>
                            <th><b>Matricula</b></th>
                            <td><?php echo $sesion_ci;?></td>
                        </tr>
                        <tr>
                            <th><b>Celular</b></th>
                            <td><?php echo $sesion_celular;?></td>
                        </tr>
                        <tr>
                            <th><b>Cargo</b></th>
                            <td><?php echo $sesion_cargo;?></td>
                        </tr>
                        <tr>
                            <th><b>Email</b></th>
                            <td><?php echo $email_sesion;?></td>
                        </tr>                        
                    </table>
                </div>


               
                <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center mt-4">
                                <table class="table table-hover table-bordered table-striped" style="background-color: #ffffff">
                                    <!-- Datos del usuario -->

                                    

                                </table>
                                <form action="" method="post">

                                    <button type="submit" name="cerrar_sesion" class="btn btn-danger">Cerrar Sesión</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/www.sis_biblioteca.com/layout/admin/parte2.php');?>