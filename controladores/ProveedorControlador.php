<?php

class ProveedorControlador extends ControladorBase{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $proveedor= new Proveedor();

        $allProveedores = $proveedor->getTodo();

        $this->view("Proveedor", array(
            "allProveedores"  => $allProveedores,
            "JJ"              => "JJ saluda desde MVC"
        ));
    } 

    public function registro(){
        
        if(isset($_POST["idProveedor"])){

            $proveedor = new Proveedor();

            $proveedor->setIdProveedor($_POST["idProveedor"]);
            $proveedor->setProveedor($_POST["proveedor"]);
            $proveedor->setTelefono($_POST["telefono"]);
            $proveedor->setDireccion($_POST["direccion"]);
            $save=$proveedor->guardar();
        }
        $this->redirect("Proveedor", "index");
    }

    public function borrar(){
        if(isset($_GET["idProveedor"])){ 
            $id=(int)$_GET["idProveedor"];
             
            $proveedor=new Proveedor();
            $proveedor->deleteById($id); 
        }
        $this->redirect();
    }

}
?>