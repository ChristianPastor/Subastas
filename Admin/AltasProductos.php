<?php

	 include("DashIndex.php");
	 include("Conexion.php");

 ?>
<main  class="mdl-layout__content mdl-color--grey-100">
	<div class="ui three item menu">
		<a href="AltasProductos.php" class="item active"><i class="add circle icon"></i>AGREGAR</a>
	 	<a href="EditProducto.php" class="item"><i class="refresh icon"></i>EDITAR</a>
	 	<a href="BajaProducto.php" class="item"><i class="trash icon"></i> ELIMINAR</a>
	</div>

	<div class="ui raised very padded text container segment">
		<h4 class="ui dividing header"> Agregar Nueva Categoria</h4>    
		<br>  
		<form class="ui large form" action="" method="post" enctype="multipart/form-data">
			<div class="ui stacked segment">
				<div class="field">
					<label>Nombre del Producto: </label>
		            <div class="ui left icon input">
			            <i class="user icon"></i>
			            <input type="text" name="name" id="name" placeholder="Ingresar Nombre ">
	 	            </div>
			    </div>
			    <div class="field">
			    	<label>Descripcion: </label>
			        <div class="ui left icon input">
			            <i class="user icon"></i>
			            <input type="text" name="descripcion" id="descripcion" placeholder="Ingresar una Descripcion">
			        </div>
			    </div>

			    <div class="field">
			    	<label>Precio: </label>
			        <div class="ui left icon input">
			            <i class="user icon"></i>
			            <input type="text" name="precio" id="precio" placeholder="Precio">
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
			            <input type="file" name="imagen" id="imagen" placeholder="Imagen">
			        </div>
			    </div>
			    <div class="field">
			    	<label>Unidades en Reserva</label>
			        <div class="ui left icon input">
			            <i class="user icon"></i>
			            <input type="text" name="reserva" placeholder="Unidades en reserva">
			        </div>
			    </div>
			    <div class="field">
			   		<label>Unidades en Inventario</label>
			        <div class="ui left icon input">
			            <i class="user icon"></i>
			            <input type="text" name="inventario" id="inventario" placeholder="Unidades en Inventario">
			        </div>
			    </div>
			    <div class="field">
			    	<label>Codigo: </label>
			        <div class="ui left icon input">
			            <i class="user icon"></i>
			            <input type="text" name="codigo" id="codigo" placeholder="Codigo">
			        </div>
			    </div>
			    <div class="field">
			    	 	<label>Codigo: </label>
			        <div class="ui left icon input">
			            <i class="user icon"></i>
			            <input type="text" name="iva" id="iva" placeholder="Iva">
			        </div>
			    </div>
			    <center>
			        <button class="ui basic button" id="action" name="action">Agregar</button>
			    </center>

		    </div>			
	    </form>	
	</div>
</main>
			
			<?php 
			
				$bd= new Conexion();

				if (isset($_POST["action"])) {

					$sql="INSERT INTO producto(Nombre,Descripcion,Precio,IDCategoria,IDMedida,Imagen,UnidadesReserva,UnidadesInventario,Codigo,Iva) VALUES('".$_POST["name"]."','".$_POST["descripcion"]."',".$_POST["precio"].",".$_POST["categoria"].",".$_POST["medida"].",'".$_POST["imagen"]."',".$_POST["reserva"].",".$_POST["inventario"].",'".$_POST["codigo"]."',".$_POST["iva"].");";

					$result=$bd->query($sql);
					if ($result) {
						echo "<script>
						alert('REGISTRO AGREGADO');	
						</script>";
					}else{
						echo "<script>
						alert('ERROR AL REGISTRAR');
						</script>";
					}
				}
			 ?>
