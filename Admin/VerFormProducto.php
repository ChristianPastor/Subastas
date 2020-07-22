<?php 
    include ("Conexion.php");

    $bd= new Conexion();

    $idproducto = $_POST['IDProducto'];


    if (isset($idproducto)) {
    
    	$query="SELECT * FROM producto WHERE IDProducto='".$idproducto."';";
    
    	$resultado=$bd->select($query);
    	$filas = mysqli_num_rows($resultado);

    	$rowss = mysqli_fetch_array($resultado);
    	if ($filas === 0) {
    		$error=$bd->getConexion();
    		echo "Fallo la consulta - ".$error;
    	}else{

 ?>
            <br>
            <h4 class="ui dividing header" align="center"> Actualizar datos</h4>    
            <form class="ui form" action="" method="post">
                <div class="ui stacked segment">
                <div class="field">
                    <label>Nombre del Producto: </label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="name" id="name"  value="<?php echo $rowss["Nombre"]; ?> " placeholder="Nombre del Producto">
                    </div>
                </div>

                <div class="field">
                    <label>Descripcion: </label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="descripcion" id="descripcion"  value="<?php echo $rowss["Descripcion"]; ?> " placeholder="Descripcion">
                    </div>
                </div>

                <div class="field">
                    <label>Precio: </label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="precio" id="precio"  value="<?php echo $rowss["Precio"]; ?> " placeholder="Precio">
                    </div>
                </div>

                <div class="field">
                    <label>Categoria: </label>
                    <select id="categoria" name="categoria">
                        <option value="" disabled selected>SELECCIONAR CATEGORIA</option>
                            <?php  
                                $bd= new Conexion();
                                $consulta=$bd->select("SELECT * FROM categoria");
                                if($consulta->num_rows>0){
                                        
                                    while($row= $consulta->fetch_assoc()){
                                        $nombre=$row["Nombre"];
                                        $id=$row["IDCategoria"];
                                        echo "<option value='$id'>$nombre</option>";
                                    }
                                       
                                }
                            ?>
                    </select>
                </div>
                <div class="field">
                    <label>Medida: </label>
                    <select id="medida" name="medida">
                        <option value="" disabled selected>SELECCIONAR MEDIDA</option>
                            <?php  
                                $bd= new Conexion();
                                $consulta=$bd->select("SELECT * FROM medida");
                                if($consulta->num_rows>0){
                                        
                                    while($row= $consulta->fetch_assoc()){
                                        $nombre=$row["Nombre"];
                                        $id=$row["IDMedida"];
                                        echo "<option value='$id'>$nombre</option>";
                                    }
                                      
                                }
                           ?>
                    </select>
                </div>

                <div class="field">
                    <label>Imagen</label>
                    <div class="ui left icon input">
                         <i class="user icon"></i>
                       <input type="text" name="imagen" id="imagen"  value="<?php echo $rowss["Imagen"]; ?> " placeholder="Imagen">
                    </div>
                </div>

                <div class="field">
                    <label>Unidades en Reserva</label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="reserva"  value="<?php echo $rowss["UnidadesReserva"]; ?> " placeholder="Unidades en reserva">
                    </div>
                </div>
                <div class="field">
                    <label>Unidades en Inventario</label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="inventario" id="inventario"  value="<?php echo $rowss["UnidadesInventario"]; ?> " placeholder="Unidades en Inventario">
                    </div>
                </div>
                <div class="field">
                    <label>Codigo: </label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="codigo" id="codigo"  value="<?php echo $rowss["Codigo"]; ?> " placeholder="Codigo">
                    </div>
                </div>
                <div class="field">
                    <label>Codigo: </label>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="iva" id="iva"  value="<?php echo $rowss["Iva"]; ?> " placeholder="Iva">
                    </div>
                </div>
                <div>
                     <input type="text" name="idproducto" id="idproducto" value="<?php echo $idproducto;?>" style="display: none;"/>
                </div>
                <center>
                <input  class="ui basic button" type="submit" name="actualizar" id="actualizar" value="Actualizar">  </center>
       
            </form>
            </div>
 		<?php
		}
    }