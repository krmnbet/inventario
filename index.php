<html>
	<head>
		
	<link href="libraries/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/diseno.css" rel="stylesheet">
	<link href="libraries/bootstrap/dist/js/bootstrap.min.js" rel="stylesheet">
	<script src="libraries/jquery.min.js"></script>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<style>
		
		</style>
<div class="container">
	<form id="formempleados" action="ajax.php?c=Catalogos&f=almacenaEmpleado<?php echo $funcion;?>" method="post">
<div id="divlogin_container" align="center">
		<br><br>
<div id="divlogin">
		 <input
            	class="form-control"
            	placeholder="Escriba su usuario"
            	type="text"
            	id="txtusuario"
            	name="txtusuario">
         
            <br /><br />
			<input
            	class="form-control"
            	placeholder="Contraseña"
         		type="password"
         		AUTOCOMPLETE="off"
         		id="txtclave">
         	<br /><br />
           
            <input
            	type="submit"
            	id="btnsubmit"
            	name="btnsubmit"
            	value="Iniciar"><br><br>
			<a href="javascript:new();" class="footerlink" style="text-align: center">Registrar nuevo usuario</a>
            <br /><br />
          </div>
	</div>
</div>
	</body>
</html>