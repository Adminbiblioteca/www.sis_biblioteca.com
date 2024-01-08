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
                    <h1 class="m-0">Registro de un nuevo libro</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header" style="background-color: #0c84ff; color:#ffffff">
                    Llene la información con mucho cuidado
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
                    <form action="controller_create.php" method="post">
                        
                    <div class="row">
                    <div class="col-md-1">
                            <div class="form-group">
                                <label for="">No. de Libro</label>
                                <?php 
                                $contador_id = 0;
                                $cons_id = $pdo->prepare('SELECT * FROM tb_libros WHERE estado = "1" ');
                                $cons_id->execute();
                                $ids = $cons_id->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($ids as $id){
                                    $contador_id = $contador_id + 1 ;
                                  }
                                  $contador_id = $contador_id +1 ;
                                ?>
                                <input type="text" class="form-control" value="<?php  echo $contador_id; ?>" disabled>
                                <input type="text" name="codigo" class="form-control" value="<?php  echo $contador_id; ?>" hidden>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Area</label><span style="color: red;"> <b>*</b></span>
                                <table>
                                    <tr>
                                        <td>
                                            <select name="area" id="" class="form-control"  >

                                            <?php 
                                            $cons_area = $pdo->prepare('SELECT * FROM tb_areas WHERE estado = "1" ');
                                            $cons_area->execute();
                                            $areas = $cons_area->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($areas as $area){
                                                $id_area= $area['id_area'];
                                                $area = $area['area'];
                                            ?>
                                             <option value="<?php echo $area; ?>"><?php echo $area; ?></option>



                                            <?php
                                            }
                                            ?>

                                            </select>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-primary"
                                         data-toggle="modal" data-target="#exampleModal">
                                            +
                                        </button>
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
                                            <select name="autor" id="" class="form-control"   >

                                            <?php 
                                            $cons_autor = $pdo->prepare('SELECT * FROM tb_autores WHERE estado = "1" ');
                                            $cons_autor->execute();
                                            $autores = $cons_autor->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($autores as $autor){
                                                $id_autor= $autor['id_autor'];
                                                $autor = $autor['autor'];
                                            ?>
                                             <option value="<?php echo $autor; ?>"><?php echo $autor; ?></option>



                                            <?php
                                            }
                                            ?>

                                            </select>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-primary"
                                         data-toggle="modal" data-target="#exampleModal_autor">
                                            +
                                        </button>
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
                                            <select name="editorial" id="" class="form-control" >

                                            <?php 
                                            $cons_editorial = $pdo->prepare('SELECT * FROM tb_editorial WHERE estado = "1" ');
                                            $cons_editorial->execute();
                                            $editoriales = $cons_editorial->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($editoriales as $editorial){
                                                $id_editorial= $editorial['id_editorial'];
                                                $editorial = $editorial['editorial'];
                                            ?>
                                             <option value="<?php echo $editorial; ?>"><?php echo $editorial; ?></option>



                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-primary"
                                         data-toggle="modal" data-target="#exampleModal_editorial">
                                            +
                                        </button>
                                        </td>
                                    </tr>
                                </table>      
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Titulo</label> <span style="color: red;"> <b>*</b></span>
                                <input type="text" class="form-control" name="titulo" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <label for="">No. Adquisicion</label>
                                <input type="number" class="form-control" name="numero">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""> No. Ficha</label>
                                <input type="number" class="form-control" name="ficha">
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Formato</label>
                                <select name="formato" id="" class="form-control" >
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
                                <input type="number" class="form-control" name="ejemplares" >
                            </div>
                        </div>
                        <div class="col-md-10">
                        <div class="form-group">
                                <label for="">Observaciones</label><span style="color: red;"> <b>*</b></span>
                                <input type="text" class="form-control" name="observaciones" >
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
                                   <button type="submit" onclick="return confirm('Asegurece de llenar la información correcta');" class="btn btn-primary btn-block">Registrar libro</button>
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
