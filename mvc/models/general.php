<?php
require("connection_sqli_manual.php"); // funciones mySQLi

class GeneralModel extends Connection{
	
	function acceso($user,$clave){
		$sql = $this->query("SELECT * FROM usuarios where usuario='$user' and clave='$clave';");
		if($sql->num_rows>0){
			return $sql->fetch_object();
		}else{
			return 0;
		}
	}
	
	
	function menu(){
		$sql = $this->query("SELECT * FROM menu;");
		return $sql;
	}
	function submenus($idmenu){
		$sql = $this->query("SELECT * FROM submenu where idsubmenu=$idmenu;");
		return $sql;
	}
}
?>