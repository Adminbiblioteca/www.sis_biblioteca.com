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
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Prestamos</h1>
                    <?php
                    if(isset($_SESSION['msj'])){
                        $respuesta = $_SESSION['msj']; ?>
                        <script>
                            Swal.fire(
                                'Exito!',
                                '<?php echo $respuesta; ?>',
                                'success'
                            )
                        </script>
                    <?php
                        unset($_SESSION['msj']);
                    }
                    ?>
                    <br>
                    <div class="card card-blue">
                        <div class="card-header">
                            Prestamo
                        </div>
                        <div class="card-body">

                            <script>
                                $(document).ready(function() {
                                    $('#tabla-1').DataTable( {
                                        "pageLength": 5,
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Prestamos",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                            "infoFiltered": "(Filtrado de _MAX_ total Prestamos)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Prestamos",
                                            "loadingRecords": "Cargando...",
                                            "processing": "Procesando...",
                                            "search": "Buscador:",
                                            "zeroRecords": "Sin resultados encontrados",
                                            "paginate": {
                                                "first": "Primero",
                                                "last": "Ultimo",
                                                "next": "Siguiente",
                                                "previous": "Anterior"
                                            }
                                        }
                                    });
                                } );
                            </script>

                            <div class="table-responsive">
                                <table id="tabla-1" class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Alumno</th>
                                    <th>Carrera</th>
                                    <th>Matricula</th>
                                    <th>Libro</th>
                                    <th>Fecha de prestamo</th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                $query = $pdo->prepare('SELECT * FROM tb_prestamos WHERE estado = "1" ');
                                $query->execute();
                              $prestamos = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($prestamos as $prestamo){
                                        $id_prestamo = $prestamo['id_prestamo'];
                                        $nombre = $prestamo['nombre'];
                                        $carrera = $prestamo['carrera'];
                                        $matricula = $prestamo['matricula'];
                                        $libro = $prestamo['libro'];
                                        $observacion= $prestamo['observacion'];

                                   
                                        $contador = $contador + 1;
                                     
                                    ?>
                                    <tr>

                                  <!-- ... Código anterior ... -->

<tr id="fila-<?php echo $id_prestamo; ?>">
    <td><?php echo $id_prestamo; ?></td>
    <td><?php echo $nombre; ?></td>
    <td><?php echo $carrera; ?></td>
    <td><?php echo $matricula; ?></td>
    <td><?php echo $libro; ?></td>
    <td><?php echo $observacion; ?></td>
    <td>
        <center>
            <button id="btn-<?php echo $id_prestamo; ?>" class="btn btn-danger btn-sm" onclick="toggleDevolucion(<?php echo $id_prestamo; ?>)">
                El libro se prestó
            </button>
        </center>
    </td>
</tr>

<script>
    function toggleDevolucion(idPrestamo) {
        var boton = document.getElementById('btn-' + idPrestamo);

        // Cambiar el color del botón a verde
        boton.classList.remove('btn-danger');
        boton.classList.add('btn-success');

        // Cambiar el texto del botón
        boton.textContent = 'El libro ya se devolvió';

        // Aquí puedes agregar acciones adicionales si es necesario
        // ...

        // También puedes realizar una petición AJAX para actualizar el estado en la base de datos
        actualizarEstadoEnBaseDeDatos(idPrestamo);
    }

    function actualizarEstadoEnBaseDeDatos(idPrestamo) {
        // Realizar una petición AJAX para actualizar el estado en la base de datos
        // Aquí deberías implementar tu lógica AJAX para enviar la actualización al servidor

        // Ejemplo con jQuery
        $.ajax({
            url: 'actualizar_estado.php',
            type: 'POST',
            data: { id_prestamo: idPrestamo, nuevo_estado: 'devuelto' },
            success: function (response) {
                // Manejar la respuesta del servidor si es necesario
                console.log(response);
            },
            error: function (error) {
                // Manejar errores si es necesario
                console.error(error);
            }
        });
    }
</script>

<!-- ... Resto del código ... -->






                                   


                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                            </div>


                            
                        </div>
                    </div>



                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include ('../../layout/admin/parte2.php');?>
