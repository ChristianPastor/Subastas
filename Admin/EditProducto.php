<?php 
     include("DashIndex.php");
     include("Conexion.php");
?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
	<script>
        $(document).ready(function(){
            //Cada que el usuario teclee algo en el input buscar entra esta funcion
            $("#buscar").keyup(function() {
                //Traemos lo que se encuentra en el input
                var textoBusqueda = $("#buscar").val();
                //si esta vacio entra al else
                if (textoBusqueda != "") {
                    //metodo post de ajax jquery donde se manda lo que esta en el input buscar para que el archivo ajax lo utilize
                    $.post("BuscarProducto.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                        //funcion success donde desplego en el div resultadoBusqueda lo que me regresa el archivo ajax
                        $("#resultadoBusqueda").html(mensaje);
                    }); 
                }else { 
                    ("#resultadoBusqueda").html("<br><p></p>");
                }
            });            
        });

        //Funcion para mostrar el formulario del cliente que seleccione el usuario en la busqueda
        function mostrarForm(id) {
                //Recivo el id del cliene y lo paso a una variable
                var idproducto = id;
                //Con un metodo ajax tipo post mando el id para que se ejecute el archivo
                $.post("VerFormProducto.php", {IDProducto: idproducto}, function(mensaje){
                    //Desplego el resultado del archivo ajax
                    $("#formulario").html(mensaje);
                });
            }
       
    </script>

    <main  class="mdl-layout__content mdl-color--grey-100">
        <div class="ui three item menu">
            <a href="AltasProductos.php" class="item "><i class="add circle icon"></i>AGREGAR</a>
            <a href="EditProducto.php" class="item active"><i class="refresh icon"></i>EDITAR</a>
            <a href="BajaProducto.php" class="item"><i class="trash icon"></i> ELIMINAR</a>
        </div>

        <div class="ui raised very padded text container segment">
            <h4 class="ui dividing header"> Buscar Producto</h4>    
            <br>  
        	<form  action="" method="post">
        		<center><div class="ui large icon input">
                    <input type="text"  name="buscar" id="buscar" placeholder="Buscar...">
                    <i class="inverted circular search link icon"></i>
                </div>
                
                <div id="resultadoBusqueda"></div>
                </center>
            </form>
        	<div id="formulario"></div>
        </div>
    </main>

	<?php 
		$bd = new Conexion();

		if (isset($_POST["actualizar"])) {

			$add="UPDATE producto SET Nombre='".$_POST["name"]."', Descripcion='".$_POST["descripcion"]."', Precio=".$_POST["precio"].", IDCategoria=".$_POST["categoria"].", IDMedida=".$_POST["medida"].", Imagen='".$_POST["imagen"]."',UnidadesReserva=".$_POST["reserva"].",UnidadesInventario=".$_POST["inventario"].",Codigo='".$_POST["codigo"]."',Iva=".$_POST["iva"]." WHERE IDProducto='".$_POST["idproducto"]."';";

			$result=$bd->query($add);

			if ($result) {
				echo "<script> alert('REGISTRO ACTUALIZADO');</script>";
			}
		}
 	?>