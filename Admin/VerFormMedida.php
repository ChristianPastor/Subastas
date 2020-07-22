<?php 
    include ("Conexion.php");

    $bd= new Conexion();

    $idmedida = $_POST['IDMedida'];


    if (isset($idmedida)) {
    
    	$query="SELECT * FROM medida WHERE IDMedida='".$idmedida."';";
    
    	$resultado=$bd->select($query);
    	$filas = mysqli_num_rows($resultado);

    	$row = mysqli_fetch_array($resultado);
    	if ($filas === 0) {
    		$error=$bd->getConexion();
    		echo "Fallo la consulta - ".$error;
    	}else{

 ?>
    <form  action="" method="post">
        <div class="field">
            <label>Nombre de la Medida</label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="name" id="name" value="<?php echo $row["Nombre"]; ?> " placeholder="Nombre de la Categoria">
                <input type="text" name="idmedida" id="idmedida" value="<?php echo $idmedida;?>" style="display: none;"/>
            </div>
    
            <input  class="ui basic button" type="submit" name="actualizar" id="actualizar" value="Actualizar">  
        </div>
    </form>



 		<?php

    

		}
    }