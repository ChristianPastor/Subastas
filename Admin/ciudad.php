<?php
include ("Conexion.php");
    $bd= new Conexion();

if(!empty($_POST["id_estado"])){
    $id_estado=$_POST["id_estado"];
    $qry="select IDCiudad, Nombre from ciudad where IDEstado='".$id_estado."';";
    $rows=$bd->select($qry);
?>

<?php
	foreach($rows as $muni) {
?>
	<option value="<?php echo $muni["IDCiudad"]; ?>"><?php echo $muni["Nombre"]; ?></option>
<?php
	}
}
?>

