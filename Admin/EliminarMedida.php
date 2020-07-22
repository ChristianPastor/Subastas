<?php
    include("Conexion.php");
    $bd= new Conexion();
    
    $idmedida = $_POST['idmedida'];

    if (isset($idmedida)) {

    	$query="DELETE FROM medida WHERE IDMedida='".$idmedida."';";
    	$res=$bd->query($query);

    	if ($res) {
    	   echo "Eliminado";
		}else{
			$error=$db->getConexion();
			echo "Problemas al insertar - ".$error->error;
		}
    }
?