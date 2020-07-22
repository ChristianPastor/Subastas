<?php
   //CLASE CONEXION
    class Conexion{
    //ATRIBUTO PRIVADO 
    private $conn = null;
    
    //FUNCION DONDE SE HACE LA CONECION HACIA LA BASE DE DATOS QUE SE LE DE.
    public function __construct(){
    
        //ATRIBUTOS QUE SE LE DAN  SOBRE LA BASE DE DATOS , TALES COMO ROOT, PASSWORD Y EL NOMBRE DE LA
        //BASE DE DATOS A DODNE SE QUIERA CONECTAR
        $this->conn = new mysqli("localhost", "username", "password", "namebasedata");
        
      //EN CASO DE ENCONTRARSE CON UN  ERROR EN LA CONEXCION,
        //SE MOSTRARA UN MENSAJE EN DONDE SE INDIQUE QUE DE LO QUE OCURRIO

        if ($this->conn->connect_errno) {
            echo "Error MySQLi: ". $this->conn->connect_error;
            exit();
        }
        $this->conn->set_charset("utf8");
    }

   //METODO PARA CERRA LA BASE DE DATOS, DEPENDIENDO SI
  //QUIERN INVOCAR A ESTE METODO SE EJECUATRA LA ACCION 

    public function __destruct(){
        $this->CloseDB();
    }

    public function getConexion(){
        return $this->conn;
    }
        
    public function select($qry){
        $result = $this->conn->query($qry);
        return $result;
    }
    
    public function query($qry){
        if(!$this->conn->query($qry)){
            return false;
        }else{
            return true;
        }
        return null;
    }
 
    public function CloseDB(){
        $this->conn->close();
    }
 
}//Fin clase


?>  

