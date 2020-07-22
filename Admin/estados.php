<?php
include ("Conexion.php");
    $bd= new Conexion();
    
if(!empty($_POST["id_pais"])){

    $id_pais=$_POST["id_pais"];
    $qry="select IDEstado, Nombre from estado where IDPais='".$id_pais."';";
    $rows=$bd->select($qry);
?>
    
<?php
    foreach($rows as $estado) {
?>
    <option value="<?php echo $estado["IDEstado"]; ?>"><?php echo $estado["Nombre"]; ?></option>
<?php
    }
}
?>