<?php
include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

include('../../layout/admin/sesion.php');
include('../../layout/admin/datos_sesion_user.php');

$id_get = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM tb_libros WHERE id_libro = '$id_get' ");
$query->execute();
$libros = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($libros as $libro){
    $id_libro = $libro ['id_libro'];
    $codigo = $libro['codigo'];
    $area =  $libro['area'];
    $titulo = $libro['titulo'];
    $autor =  $libro['autor'];
    $numero =  $libro['numero'];
    $ficha =  $libro['ficha'];
    $editorial =  $libro['editorial'];
    $formato =  $libro['formato'];
    $ejemplares =  $libro['ejemplares'];
    $observaciones =  $libro['observaciones'];
}

?>

<?php include ('../../layout/admin/parte1.php');?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Eliminacion del libro</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header" style="background-color:#FF0000; color:#ffffff">
                  ¿Esta seguro de eliminar este registro?
                </div>
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
                    
                <div class="card-body">
                    <form action="controller_delete.php" method="post">
                        
                    <div class="row">
                    <div class="col-md-1">
                            <div class="form-group">
                                <label for="">No. de Libro</label>
                                
                                <input type="text" class="form-control" value="<?php  echo $id_libro; ?>" disabled>
                                <input type="text" name="codigo" class="form-control" value="<?php  echo $id_libro; ?>" hidden>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Area</label><span style="color: red;"> <b>*</b></span >
                                <table>
                                    <tr>
                                        <td>
                                            <select name="area" id="" class="form-control"   disabled>
                                            <option value="<?php echo $area; ?>"><?php echo $area; ?></option>
                                            
                                             <option value="<?php echo $area; ?>" disabled><?php echo $area; ?> </option>



                                            <?php
                                            
                                            ?>

                                            </select>
                                        </td>
                                       
                                    </tr>
                                </table>                               
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="">Autor</label><span style="color: red;"> <b>*</b></span>
                                <table>
                                    <tr>
                                        <td>
                                            <select name="autor" id="" class="form-control"   disabled>
                                            <option value="<?php echo $autor; ?>"><?php echo $autor; ?></option>


                                         

                                            </select>
                                        </td>
                                        
                                    </tr>
                                </table> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Editorial</label><span style="color: red;"> <b>*</b></span>
                                 <table>
                                    <tr>
                                        <td>
                                            <select name="editorial" id="" class="form-control" disabled >
                                            <option value="<?php echo $editorial; ?>"><?php echo $editorial; ?></option>

   </select>
                                        </td>
                                        
                                    </tr>
                                </table>      
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group"  >
                                <label for="">Titulo</label> <span style="color: red;"> <b>*</b></span>
                                <input type="text" class="form-control" value="<?php  echo $titulo; ?>" disabled >
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <label for="">No. Adquisicion</label>
                                <input type="text" class="form-control" value="<?php  echo $numero; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""> No. Ficha</label>
                                <input type="text" class="form-control" value="<?php  echo $ficha; ?>" disabled>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Formato</label>
                                <select name="formato" id="" class="form-control" disabled>
                                    <option value="Fisico">FISICO</option>
                                    <option value="Digital">DIGITAL</option>

                                </select>

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Ejemplares</label>
                                <input type="text" class="form-control" value="<?php  echo $ejemplares; ?>"  disabled>
                            </div>
                        </div>
                        <div class="col-md-10">
                        <div class="form-group">
                                <label for="">Observaciones</label><span style="color: red;"> <b>*</b></span>
                                <input type="text" class="form-control" value="<?php  echo $observaciones; ?>" disabled >
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
                                   <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este registro?');" 
                                   class="btn btn-danger btn-block">Eliminar libro</button>
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

<!-- Button trigger modal -->


<!-- Modal del area -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="controller_area.php" method="post">
        <div class="row">
            <div class="from-group"></div>
            <label for="">Nombre del area</label>
            <input type="text" class="form-control" name="area">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar area</button>
      </div>
      </form>

    </div>
  </div>
</div>




<!-- Modal del editorial -->
<div class="modal fade" id="exampleModal_editorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de editorial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="controller_editorial.php" method="post">
        <div class="row">
            <div class="from-group"></div>
            <label for="">Nombre de la editorial</label>
            <input type="text" class="form-control" name="editorial">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar editorial</button>
      </div>
      </form>

    </div>
  </div>
</div>





<!-- Modal del autor -->
<div class="modal fade" id="exampleModal_autor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="controller_autor.php" method="post">
        <div class="row">
            <div class="from-group"></div>
            <label for="">Nombre del autor|autora</label>
            <input type="text" class="form-control" name="autor">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar autor|autora</button>
      </div>
      </form>

    </div>
  </div>
</div>
