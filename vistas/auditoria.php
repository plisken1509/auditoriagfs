<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript">
    function agregarEvidencia(){
    alert("star2");
    var cliente=document.getElementById("archivo[]").value;
    alert("star");
    }
  </script>
</head>
<?php
include_once "navbar.php";
include_once "../conexion/conexion.php";
$query="select * from asignacion a inner join comedor c on a.comId=c.id";
$enviar=mysqli_query($db,$query);


?>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">GOURMET FOOD SERVICE</h1>
            <h2 class="display-4 mb-5">SISTEMA DE AUDITORIA</h2>    
        </div>
    </header>

    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <h4 class="section-secondary-title mt-5">Auditoria</h4>
        <div class="">
                <label>Comedor:</label>
                <center><select class="form-control" style=" width:150px">
                    <option value="0">Seleccione</option>
                    <?php  
                        $ver=mysqli_fetch_array($enviar);
                        do{
                           echo"<option value='".$ver['comId']."'>".$ver['nombre']."</option>"; 
                        }while ($ver=mysqli_fetch_array($enviar));
                    ?>
                </select></center><br>   
        
        
       <?php
            $aid=$_REQUEST['id'];
            $query2="select * from categoria";
            $enviar2=mysqli_query($db,$query2);  
            $ver2=mysqli_fetch_array($enviar2);

            do{
                $nombre=$ver2["nombre"];
                $id=$ver2["id"];
                $descripcion=$ver2["descripcion"];
                echo'<div class="alert alert-danger" role="alert">'.
                        $nombre.' '.$descripcion.'%
                    </div>
                <table class="table table-striped" style="">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pregunta</th>
                        <th scope="col">Cumple</th>
                        <th scope="col">Observacion</th>
                        <th scope="col">Evidencia</th>
                    </tr>
                    </thead>
                
                    '; 
            $query3="select * from pregunta where catid=".$id;
            $enviar3=mysqli_query($db,$query3);  
            $ver3=mysqli_fetch_array($enviar3);

            do{

                echo '<tbody>
               
               <tr>
               <th scope="row" style="color:white;">'.$ver3['id'].'</th>
               <td style="color:white;">'.$ver3['descripcion'].'</td>
               
               <form name="form'.$ver3['id'].'" id="form1" method="post" action="guardarEvidencias.php" enctype="multipart/form-data">
               <td style="color:white;"><select id="cumple" name="cumple" class="form-control">
               <option value="0">Seleccione</option>
               <option value="si">SI</option>
               <option value="no">NO</option>
               </select></td>
               <td style="color:white;"><input type="text" name="observacion" id="observacion" class="form-control"></td>
               <td style="color:white;">
               
                            <center>
                            <input type="hidden" class="form-control"style="width:200px;" name="id" value="'.$ver3['id'].'">
                            <input type="hidden" class="form-control"style="width:200px;" name="aid" value="'.$aid.'">
                            <section id="pregunta'.$ver3['id'].'">
                                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="" style="width:200px;">
                                </section>';
                                $query30="select * from preguntasvisita where preId=".$ver3['id']." and visId=$aid";
                                $enviar30=mysqli_query($db,$query30);  
                                $ver30=mysqli_num_rows($enviar30);
                                if ($ver30>0) {
                                  echo '<h5>Respuesta Guardada</h5>';
                                }else{
                                  echo '<button type="submit" class="btn btn-primary" style="white-space: nowrap;">Guardar</button>';
                                }
                      echo'
                            </center>                            
                            </form>
                            </td>
               </tr>
               </tbody>';
            }while($ver3=mysqli_fetch_array($enviar3));
            echo'</table>';
           }while ($ver2=mysqli_fetch_array($enviar2));
        ?> 
        </div>
    </div>

<?php
include_once "footer.php"
?> 