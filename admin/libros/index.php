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
                    <h1 class="m-0">Listado de Libros</h1>
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
                            Libro
                        </div>
                        <div class="card-body">

                            <script>
                                $(document).ready(function() {
                                    $('#tabla-1').DataTable( {
                                        "pageLength": 5,
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Libros",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                            "infoFiltered": "(Filtrado de _MAX_ total Libros)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Libros",
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
                                    <th>Codigo</th>
                                    <th>Area</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>No. Adquisicion</th>
                                    <th>No. Ficha</th>
                                    <th>Formato</th>
                                    <th>Ejemplares</th>
                                    <th>Observaciones</th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                $query = $pdo->prepare('SELECT * FROM tb_libros WHERE estado = "1" ');
                                $query->execute();
                                $libros = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($libros as $libro){
                                    $id_libro= $libro['id_libro'];
                                    $codigo = $libro ['codigo'];
                                    $area = $libro['area'];
                                    $titulo = $libro['titulo'];
                                    $autor= $libro['autor'];
                                    $editorial = $libro['editorial'];
                                    $numero= $libro['numero'];
                                    $ficha= $libro['ficha'];
                                    $formato = $libro['formato'];
                                    $ejemplares = $libro['ejemplares'];
                                    $observaciones = $libro['observaciones'];
                                    $contador = $contador + 1;
                                    ?>
                                    <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $codigo; ?></td>
                                    <td><?php echo $area; ?></td>
                                    <td><?php echo $titulo; ?></td>
                                    <td><?php echo $autor; ?></td>
                                    <td><?php echo $editorial; ?></td>
                                    <td><?php echo $numero; ?></td>
                                    <td><?php echo $ficha; ?></td>
                                    <td><?php echo $formato; ?></td>
                                    <td><?php echo $ejemplares; ?></td>
                                    <td><?php echo $observaciones; ?></td>
                                    
                                        <td>
                                            <center>
                                                <a href="edit.php?id=<?php echo $id_libro;?>" class="btn btn-success btn-sm">Editar <i class="fas fa-pen"></i></a>
                                                <a href="delete.php?id=<?php echo $id_libro;?>" class="btn btn-danger btn-sm">Borrar <i class="fas fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
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
