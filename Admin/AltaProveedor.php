<?php 
	include("DashIndex.php");
	include("Conexion.php");
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

    <main  class="mdl-layout__content mdl-color--grey-100">
	
		<div class="ui three item menu">
			<a href="AltaProveedor.php" class="item active"><i class="add circle icon"></i>AGREGAR</a>
		 	<a href="EditProveedores.php" class="item"><i class="refresh icon"></i>EDITAR</a>
		 	<a href="BajaProveedor.php" class="item"><i class="trash icon"></i> ELIMINAR</a>
		</div>

		<div class="ui raised very padded text container segment">
			<h4 class="ui dividing header"> Agregar Nuevo Proveedor</h4> 
			<form class="ui form" action="" method="post">
				<div class="field">
					<label>Nombre del Proveedor: </label>
					<div class="ui left icon input">
					    <i class="user icon"></i>
					    <input type="text" name="name" id="name" placeholder="Ingresar Nombre">
					</div>
		        </div>
		        <div class="field">
		        	<label>Direccion: </label>
					<div class="ui left icon input">
					    <i class="user icon"></i>
					    <input type="text" name="direccion" id="direccion" placeholder="Ingresar Direccion">
					</div>
		        </div>
		        <div class="field">
		        	<label>Correo: </label>
					<div class="ui left icon input">
					    <i class="user icon"></i>
					    <input type="text" name="correo" id="correo" placeholder="Ingresar Correo">
					</div>
		        </div>
		        <div class="field">
		        	<label>Telefono: </label>
					<div class="ui left icon input">
					    <i class="user icon"></i>
					    <input type="text" name="tel" id="tel" placeholder="Ingresar Telefono">
					</div>
		        </div>
		        <div class="field">
		        	<label>Pagina WEB: </label>
					<div class="ui left icon input">
					    <i class="user icon"></i>
					    <input type="text" name="pageweb" id="pageweb" placeholder="Ingresar Pagina WEB">
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
			        <input  class="ui basic button" type="submit" name="action" id="action" value="Agregar">  
		        </div>
			</form>
		</div>
	</main>


<?php 
	$bd= new Conexion();

	if (isset($_POST["action"])) {
		
		$add="INSERT INTO proveedor(Nombre,Direccion,Correo,Telefono,PaginaWeb,IDPais,IDEstado,IDCiudad) VALUES('".$_POST["name"]."', '".$_POST["direccion"]."','".$_POST["correo"]."','".$_POST["tel"]."','".$_POST["pageweb"]."',".$_POST["pais"].",".$_POST["estado"].",".$_POST["ciudad"].")";
		$result=$bd->query($add);

		if ($result) {
			echo "<script> alert('Registro Agregado');</script>";			
		}else {
			echo "<script> alert('Registro NO Agregado');</script>";			

		}
	}

 ?>