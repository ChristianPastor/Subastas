<?php
	include("DashIndex.php");
	include("Conexion.php");
?>

<main  class="mdl-layout__content mdl-color--grey-100">
	
	<div class="ui three item menu">
		<a href="AltaMedidas.php" class="item active"><i class="add circle icon"></i>AGREGAR</a>
	 	<a href="EditMedidas.php" class="item"><i class="refresh icon"></i>EDITAR</a>
	 	<a href="BajaMedidas.php" class="item"><i class="trash icon"></i> ELIMINAR</a>
	</div>
	<div class="ui raised very padded text container segment">
		<h4 class="ui dividing header"> Agregar Nueva Medida</h4>    
		<br> 
		<center>
			<form  action="" method="post">
				<div class="field">
				
					<div class="ui left icon input">
					    <i class="user icon"></i>
					    <input type="text" name="name" id="name" placeholder="Nombre de la Medida">
					</div>
					<dir>
						<button class="ui basic button" id="action" name="action">Agregar</button>
					</dir>
					
				
		        </div>
			</form>
		</center>
	</div>
</main>

	<?php 
		$bd= new Conexion();

		if (isset($_POST["action"])) {
			$nombre=$_POST["name"];

			$add="INSERT INTO medida(nombre) VALUES('".$nombre."')";
			$result=$bd->query($add);

			if ($result) {
				echo "<script> alert('REGISTRO AGREGADO'); </script>";
			}else{
				echo "<script> alert('REGISTRO NO AGREGADO'); </script>";

			}

		}



	 ?>


	
