<?php
	include("Conexion.php");
    $bd= new Conexion();

    $consultaBusqueda = $_POST['valorBusqueda'];

    //Declaramos el mensaje que tomará jQuery
    $mensaje="";

	if(isset($consultaBusqueda)){
		$query="SELECT IDMedida,Nombre FROM medida WHERE Nombre LIKE '%".$consultaBusqueda."%';";
		$resultado=$bd->select($query);

		//Obtiene la cantidad de filas que hay en la consulta
		$filas = mysqli_num_rows($resultado);

		//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		if ($filas === 0) {
			$mensaje = "<p>NO HAY RESULTADOS CON ESE NOMBRE</p>";
		} else {
			//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($resultado)) {
				$nombre = $resultados['Nombre'];
				//Salida
				$mensaje .= '
				<br><a  onclick="mostrarForm('.$resultados["IDMedida"].')" >'.$nombre .'</a>';

			};//Fin while $resultados

		}; //Fin else $filas

	};//Fin isset $consultaBusqueda

	//Devolvemos el mensaje que tomará jQuery
	echo $mensaje;

?>