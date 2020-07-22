
<?php 
	include("Conexion.php");

	$bd= new Conexion();

	 $idproducto = $_POST['idproducto'];

    if (isset($idproducto)) {

    	$query="DELETE FROM producto WHERE IDProducto='".$idproducto."';";
    	$res=$bd->query($query);

    	if ($res) {
    	   echo "Eliminado";
		}else{
			$error=$db->getConexion();
			echo "Problemas al insertar - ".$error->error;
		}
    }
 ?>