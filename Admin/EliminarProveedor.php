<?php
    include("Conexion.php");
    $bd= new Conexion();
    
    $idproveedor = $_POST['idproveedor'];

    if (isset($idproveedor)) {

    	$query="DELETE FROM proveedor WHERE IDProveedor='".$idproveedor."';";
    	$res=$bd->query($query);

    	if ($res) {
    	   echo "Eliminado";
		}else{
			$error=$db->getConexion();
			echo "Problemas al insertar - ".$error->error;
		}
    }
?