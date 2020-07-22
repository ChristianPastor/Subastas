<?php
 include("DashIndex.php");
 include("Conexion.php");
?>

<main  class="mdl-layout__content mdl-color--grey-100">
	
	<div class="ui three item menu">
		<a href="" class="item active"><i class="add circle icon"></i>AGREGAR</a>
	 	<a href="EditCategorias.php" class="item"><i class="refresh icon"></i>EDITAR</a>
	 	<a href="BajaCategoria.php" class="item"><i class="trash icon"></i> ELIMINAR</a>
	</div>

	<div class="ui raised very padded text container segment">
		<h4 class="ui dividing header"> Agregar Nueva Categoria</h4>    
		<br>  
		<center>
			<form class="iu form" action="" method="post">

				<div class="field">
					<div class="ui left icon input">
					    <i class="user icon"></i>
					    <input type="text" name="name" id="name" placeholder="Nombre de la Categoria               ">
					</div>
					<br>
					<br>
				
					<button class="ui basic button" id="action" name="action">Agregar</button>
		        </div>
			</form>
		</center>
	</div>
		<?php 

			$bd= new Conexion();

			if (isset($_POST["action"])) {

				$nombre=$_POST["name"];

				$add="INSERT INTO categoria(nombre) VALUES('".$nombre."')";
				$result=$bd->query($add);

				if ($result) {
					echo "<script> alert('REGISTRO AGREGADO'); </script>";
				}else{
					echo "<script> alert('REGISTRO NO AGREGADO'); </script>";

				}
			}
		 ?>

</main>

