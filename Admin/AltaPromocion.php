<?php 
	 include("DashIndex.php");
	 include("Conexion.php");
?>

<main  class="mdl-layout__content mdl-color--grey-100">
	
	<div class="ui three item menu">
		<a href="AltaPromocion.php" class="item active"><i class="add circle icon"></i>AGREGAR</a>
	 	<a href="EditPromocion.php" class="item"><i class="refresh icon"></i>EDITAR</a>
	 	<a href="BajaPromocion.php" class="item"><i class="trash icon"></i> ELIMINAR</a>
	</div>

	<div class="ui raised very padded text container segment">
		<h4 class="ui dividing header"> Agregar Nueva Promocion</h4> 

		<form class="ui form" action="" method="post">
		
			<div class="field">
				<label> Nombre del Producto</label>
			    <input type="text" name="name" id="name" placeholder="Ingresar Nombre">
			</div>
			<div class="field">
				<label>Fecha de Inicio</label>
			    <input type="date" name="fechaInicio" id="fechaInicio">
			</div>
			<div class="field">
				<label>Fecha Final</label>
			    <input type="date" name="fechaFin" id="fechaFin">
			</div>
			<div class="field">
				<label>Descuento</label>
				<div class="ui left icon input ">

				    <i class="user icon"></i>
				    <input type="text" name="descuento" id="descuento" placeholder="Descuento">
				</div>
			</div>
			<div class="ui form">
				<div class="field">
					<label>Aplicar a </label>
					    <select class="ui dropdown" id="idproducto" name="idproducto">
					        <option value="" disabled selected>SELECCIONAR PRODUCTO</option>
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
			        </div>
			    </div>
			    <br>
			    <br>
		        <button class="ui basic button" id="action" name="action">Agregar</button>
		    

		</form>
	</div>
</main>
	<?php 
		$bd= new Conexion();

		if (isset($_POST["action"])) {
			
			$add="INSERT INTO promocion(Nombre,Inicio,Fin,Descuento,AplicarA) VALUES('".$_POST["name"]."','".$_POST["fechaInicio"]."','".$_POST["fechaFin"]."','".$_POST["descuento"]."',".$_POST["idproducto"].")";

			$result=$bd->query($add);
			if ($result) {
				echo "<script> alert('REGISTRO AGREGADO');</script>";
			}else{
				echo "<script> alert('REGISTRO NO AGREGADO');</script>";

			}
		}


	 ?>
