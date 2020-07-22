<?php 
    //include("base.php"); 
    include("DashIndex.php");
    include("Conexion.php");

?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
        $(document).ready(function(){
            //Cada que el usuario teclee algo en el input buscar entra esta funcion
            $("#buscar").keyup(function() {
                //Traemos lo que se encuentra en el input
                var textoBusqueda = $("#buscar").val();
                //si esta vacio entra al else
                if (textoBusqueda != "") {
                    //metodo post de ajax jquery donde se manda lo que esta en el input buscar para que el archivo ajax lo utilize
                    $.post("BuscarCategoria.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                        //funcion success donde desplego en el div resultadoBusqueda lo que me regresa el archivo ajax
                        $("#resultadoBusqueda").html(mensaje);
                    }); 
                }else { 
                    ("#resultadoBusqueda").html("<br><p></p>");
                }
            });            
            
        });
  
        function mostrarForm(id) {
                //Recivo el id del cliene y lo paso a una variable
                var idcategoria = id;
                //Con un metodo ajax tipo post mando el id para que se ejecute el archivo
                var x;
                if (confirm("¿DESEAS ELIMINAR ESTE REGISTRO "+id+"?") == true) {
                    $.post("EliminarCategoria.php", {idcategoria: idcategoria}, function(mensaje){
                        alert("CATEGORIA ELIMINADA");
                    });
                } else {
                    alert("Accion cancelada");
                }
            }
    </script>
       <main  class="mdl-layout__content mdl-color--grey-100">
    
        <div class="ui three item menu">
            <a href="AltaCategorias.php" class="item "><i class="add circle icon"></i>AGREGAR</a>
            <a href="EditCategorias.php" class="item active"><i class="refresh icon"></i>EDITAR</a>
            <a href="BajaCategoria.php" class="item"><i class="trash icon"></i> ELIMINAR</a>
        </div>
        <div class="ui raised very padded text container segment">
            <center>
                <form class="iu form" action="" method="post">
                    <h4 class="ui dividing header">Buscar</h4>             		
                    <div class="ui icon input loading">
                        <input type="text" name="buscar" id="buscar" placeholder=" buscar...">
                        <i class="search icon"></i>
                    </div>
                    <div id="resultadoBusqueda"></div>
                </form>
            </center>

	    <div id="formulario"></div>

    </main>

