<?php
    include("Conexion.php");
    $bd= new Conexion();

    $idcategoria = $_POST['idcategoria'];

    if (isset($idcategoria)) {

    	$query="DELETE FROM categoria WHERE IDCategoria='".$idcategoria."';";
    	$res=$bd->query($query);

    	if ($res) {
    	   echo "Eliminado";
		}else{
			$error=$db->getConexion();
			echo "Problemas al insertar - ".$error->error;
		}
    }
?