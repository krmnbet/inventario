<?php
   require('common.php');

require("models/general.php");

class General extends Common
{
	public $GeneralModel;
	
	function __construct()
	{
		
		$this->GeneralModel = new GeneralModel();
		$this->GeneralModel->connect();
	}

	function __destruct()
	{
		
		$this->GeneralModel->close();
	}
	
	function acceso(){
		$ok = $this->GeneralModel->acceso($_REQUEST['usuario'],$_REQUEST['clave']);
		if($ok!=0){
			$this->inicio();
		}else{
			echo "<script> 
				alert('Usuario/clave Incorrecto, intente de nuevo');
				window.location='../index.php';			 
			</script>";
		}
	}
	function inicio(){
		$menus  = $this->GeneralModel->menu();
		require("views/menu.php");
	}
	
}

?>