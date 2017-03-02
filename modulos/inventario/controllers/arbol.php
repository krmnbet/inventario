<?php
require('common.php');//Carga la funciones comunes top y footer
require("models/arbol.php");

class Arbol extends Common
{
	public $ArbolModel;

	function __construct(){
	$this->ArbolModel = new ArbolModel();
	$this->ArbolModel->connect();
	}

	function __destruct()
	{
		//Se destruye el objeto que instancia al modelo que se va a utilizar
		$this->ArbolModel->close();
	}

	function index()
	{
			$inputMask = $this->ArbolModel->getMask();
			$accountMode = $this->ArbolModel->getAccountMode();
			$accounts = $this->ArbolModel->getAccounts();
			$coins = $this->ArbolModel->fillSelect("coin_id","description","cont_coin");
			$nature = $this->ArbolModel->fillSelect("nature_id","description","cont_nature");
			$status = $this->ArbolModel->fillSelect('status_id','description','cont_account_status');
			$classification = $this->ArbolModel->fillSelect("classification_id","description","cont_classification");
			$type = $this->ArbolModel->fillSelect("type_id","description",'cont_main_type');
			$oficial = $this->ArbolModel->oficial();
			$tipo_niveles = $this->ArbolModel->getAccountMode();
			//$subcuentade = $this->ArbolModel->fillSelect("account_id","CONCAT('( ',manual_code,' ) ',description)","cont_accounts","main_account != 3 ORDER BY account_code");
			$tipoinstancia = $this->ArbolModel->tipoinstancia();
			require('views/arbol/index.php');
	}

	function subcuentas()
	{
		$where = '';
		if($_POST['idcuenta'])
		{
			$account_code = $this->ArbolModel->datosCuenta($_POST['idcuenta']);
			$account_code = $account_code['account_code'];
			$where = "AND account_code NOT LIKE '$account_code.%'";
		}
		$subcuentade = $this->ArbolModel->fillSelect("account_id","CONCAT('( ',manual_code,' ) ',description)","cont_accounts","main_account != 3 AND removed = 0 $where AND account_code != '1' AND account_code != '2' AND account_code != '4' ORDER BY account_code");
		echo $subcuentade;
	}

	function guardaCuenta()
	{
		echo $this->ArbolModel->guardar($_POST['numero'],$_POST['nombre'],$_POST['nombre_idioma'],$_POST['subcuentade'],$_POST['naturaleza'],$_POST['moneda'],$_POST['clasificacion'],$_POST['digito'],$_POST['estatus'],$_POST['idcuenta']);	
	}

	function eliminarCuenta()
	{
		echo $this->ArbolModel->eliminarCuenta($_POST['idcuenta']);	
	}

	function datosCuenta()
	{
		$datos = $this->ArbolModel->datosCuenta($_POST['idCuenta']);
		echo json_encode($datos);
	}

}
?>
