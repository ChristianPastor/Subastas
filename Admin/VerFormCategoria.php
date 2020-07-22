<?php 
include ("Conexion.php");

    $bd= new Conexion();

    $idcategoria = $_POST['IDCategoria'];


    if (isset($idcategoria)) {
    	//consulta del cliente a modificar
    	$query="SELECT * FROM categoria WHERE IDCategoria='".$idcategoria."';";
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
    <form  action="" method="post">
        <div class="field">
            <br>
            <h4 class="ui dividing header">Nombre de la categoria</h4>      
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="name" id="name" value="<?php echo $row["Nombre"]; ?> " placeholder="Nombre de la Categoria">

                <input type="text" name="idcategoria" id="idcategoria" value="<?php echo $idcategoria;?>" style="display: none;"/>
            </div>
    
            <input  class="ui basic button" type="submit" name="actualizar" id="actualizar" value="Actualizar">  
        </div>
    </form>



 		<?php

    

		}
    }