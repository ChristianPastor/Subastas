<?php
    include("Conexion.php");
    $bd= new Conexion();
    
    $idpromocion = $_POST['idpromocion'];

    if (isset($idpromocion)) {

    	$query="DELETE FROM promocion WHERE IDPromo='".$idpromocion."';";
    	$res=$bd->query($query);

    	if ($res) {
    	   echo "Eliminado";
		}else{
			$error=$db->getConexion();
			echo "Problemas al insertar - ".$error->error;
		}
    }
?