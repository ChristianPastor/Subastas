<?php 
include ("Conexion.php");

    $bd= new Conexion();

    $idproveedor = $_POST['IDProveedor'];

    if (isset($idproveedor)) {
    
    	$query="SELECT * FROM proveedor WHERE IDProveedor='".$idproveedor."';";
    	//ejecutamos la consulta para recivir el resultset
    	$resultado=$bd->select($query);
    	//verificamos el numero de filas que nos arrojo
    	$filas = mysqli_num_rows($resultado);
    	//y lo pasamos como arreglo a ala variable cliente
    	$row = mysqli_fetch_array($resultado);

    	//verificamos que contenga algo, si no mandamos un error
    	if ($filas === 0) {
    		$error=$bd->getConexion();
    		echo "Fallo la consulta - ".$error;
    	}else{



 ?>
 <script>

        $(document).ready(function(){
              $("#pais").change(function(){
                var idp = $("#pais").val(); 
               // first dropdown value is stored   
                            
                $.ajax({
                    type: "POST",
                    url: "estados.php",
                    data:{id_pais:idp},
                    success: function(data){
                        $('#estado').html(data);
                    }
                });
            });
            
            $("#estado").change(function(){
                var id = $("#estado").val(); 
               // first dropdown value is stored              
                   
                $.ajax({
                    type: "POST",
                    url: "ciudad.php",
                    data:{id_estado:id},
                    success: function(data){
                        $('#ciudad').html(data);
                    }
                });
            });
            
            
        });
    </script>

    <form class="ui form" action="" method="post">
        <div class="field">

        <div class="field">
                <label> Nombre del Proovedor: </label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="name" id="name" value="<?php echo $row["Nombre"]; ?>"  placeholder="Nombre del Proveedor">
            </div>
        </div>
        <div class="field">
        <label>Direccion: </label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="direccion" id="direccion" value="<?php echo $row["Direccion"]; ?> "  placeholder="Direccion">
            </div>
        </div>
        <div class="field">
        <label>Correo: </label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="correo" id="correo" value="<?php echo $row["Correo"]; ?> "  placeholder="Correo">
            </div>
        </div>
        <div class="field">
            <label>Telefono: </label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="tel" id="tel" value="<?php echo $row["Telefono"]; ?> "  placeholder="Telefono">
            </div>
        </div>
        <div class="field">
        <label>Descuento</label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="pageweb" id="pageweb" value="<?php echo $row["PaginaWeb"]; ?> "  placeholder="Pagina WEB">
            </div>
        </div>
        <div class="field">
            <label>Pais: </label>
            <select name="pais" id="pais">
                <option value="">Selecciona un pais...</option>
                 <?php  
                    //SE HACE UNA NUEVA CONEXION HACI LA BASE DE DATOS PARA OBTENER LOS DATOS DE LOS PAISES
                    $bd=new Conexion;
                    //SE REALIZA UNA CONSULTA PARA OBTENER LOS PAISES DE LA TABLA PAISES 
                    $estados = $bd->select("select * from pais");
                    //
                    if ($estados->num_rows > 0) {

                    while ($row = $estados->fetch_assoc()) {
                        $pais = $row["Nombre"];
                        $id_pais= $row["IDPais"];
                        echo "<option value='$id_pais'>$pais</option>";
                                            }
                    }else{
                        echo "<option value='s/c'>No existen estados aun</option>";
                    }
                ?>

            </select>
            <label for="estado">Estado:</label>
            <select name="estado" id="estado">
                <option value="s/r" >Selecciona un estado...</option>
            </select>
            <label for="ciudad">Ciudad:</label>
            <select name="ciudad" id="ciudad">
                <option value="s/r">Selecciona un ciudad...</option>
            </select><br>

           
            <input type="text" name="idproveedor" id="idproveedor" value="<?php echo $idproveedor;?>" style="display: none;"/>
        
            <input  class="ui basic button" type="submit" name="actualizar" id="actualizar" value="Actualizar">  
        </div>
    </form>



 		<?php

		}
    }