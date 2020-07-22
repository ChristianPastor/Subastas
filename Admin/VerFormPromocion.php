<?php 
    include ("Conexion.php");

    $bd= new Conexion();

    $idpromocion = $_POST['IDPromo'];


    if (isset($idpromocion)) {
    
    	$query="SELECT * FROM promocion WHERE IDPromo='".$idpromocion."';";
    
    	$resultado=$bd->select($query);
    	$filas = mysqli_num_rows($resultado);

    	$row = mysqli_fetch_array($resultado);
    	if ($filas === 0) {
    		$error=$bd->getConexion();
    		echo "Fallo la consulta - ".$error;
    	}else{

 ?>
 
    <form class="ui form" action="" method="post">
        <h4 class="ui dividing header">Actualizar datos</h4>
        <div class="field">
            <label>Nombre del Producto: </label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="name" id="name"  value="<?php echo $row["Nombre"]; ?> " placeholder="Nombre del Producto">
            </div>
        </div>
        <div class="field">
            <label>Fecha de Inicio: </label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="date" name="fechaInicio"  value="<?php echo $row["Inicio"]; ?> " id="fechaInicio">
            </div>
        </div>
        <div class="field">
            <label>Fecha Final:</label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="date" name="fechaFin"  value="<?php echo $row["Fin"]; ?> " id="fechaFin">
            </div>
        </div>
        <div class="field">
            <label>Descuento:</label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="descuento" id="descuento"  value="<?php echo $row["Descuento"]; ?> " placeholder="Descuento">
            </div>
        </div>
            <div class="field">
                <label>Aplicar a:</label>
                <select id="idproducto" name="idproducto">
                    <option  value="" disabled selected>SELECCIONAR PRODUCTO</option>
                    <?php  
                        $bd= new Conexion();
                        $consulta=$bd->select("SELECT * FROM producto");
                        if($consulta->num_rows>0){
                                   
                            while($row= $consulta->fetch_assoc()){
                                $nombre=$row["Nombre"];
                                $id=$row["IDProducto"];
                                echo "<option value='$id'>$nombre</option>";
                            }
                                    
                        }
                    ?>
                </select>
                 <input type="text" name="idpromocion" id="idpromocion" value="<?php echo $idpromocion;?>" style="display: none;"/>
            </div>
            <input  class="ui basic button" type="submit" name="actualizar" id="actualizar" value="Actualizar">  
        </div>
    </form>



 		<?php

    

		}
    }