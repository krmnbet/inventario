<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pruebas de click derecho</title>
    <link rel="stylesheet" href="js/select2/select2.css">
    <link rel="stylesheet" href="css/accountsTree.css">
    <script src='js/jquery.js' type='text/javascript'></script>
    <script src='js/jquery.tinysort.min.js' type='text/javascript'></script>
    <script src='js/select2/select2.js' type='text/javascript'></script>
    <script src='js/jquery.maskedinput.js' type='text/javascript'></script>
    
    <script>
    <?php 
    $tipoinstancia = 1;
    require 'js/arbol.js.php';
    ?>
    function abrir()
    {
        if($("#subircuentas").attr('abierto') == '0')
        {
            $('#subircuentas').show('slow')
            $("#subircuentas").attr('abierto','1')
            $("#abr").text('Cerrar')
        }
        else
        {
            $('#subircuentas').hide('slow')
            $("#subircuentas").attr('abierto','0')
            $("#abr").text('Abrir')
        }
    }

    function validar()
    {
        var extension = $("#layout_cuentas").val()
        extension = extension.split('.')
        if(!$("#layout_cuentas").val() || extension[1] != 'xls')
        {
            alert('Es necesario agregar el layout (descargar el archivo xls) para generar este proceso')
            return false
        }
    }
    </script>
    <style>
     /*#modifica
     {
        position:absolute;
        width:auto;
        height:auto;
        /*left:500px;
        padding:5px;
        float:left;
        z-index:998;
        background-color:white;
     }*/
     #captura td
     {
        height:45px;
     }
     .btnMenu{
        border-radius: 0; 
        width: 100%;
        margin-bottom: 0.3em;
        margin-top: 0.3em;
    }
    .row
    {
        margin-top: 0.5em !important;
    }
    h4, h3{
        background-color: #eee;
        padding: 0.4em;
    }
    .modal-title{
        background-color: unset !important;
        padding: unset !important;
    }
    .nmwatitles, [id="title"] {
        padding: 8px 0 3px !important;
        background-color: unset !important;
    }
    .select2-container{
        width: 100% !important;
    }
    .select2-container .select2-choice{
        background-image: unset !important;
        height: 31px !important;
    }
    .twitter-typeahead{
        width: 100% !important;
    }
    </style>
</head>
<body>
    <div id="spinner"></div>
    <div class="layer"></div>
    <h3 class="nmwatitles text-center">Mi arbol Contable</h3>
    <div class="container-fluid">
        <section>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Buscar:</label>
                        <input type="text" class='form-control nmcatalogbusquedainputtext' id='search'>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <label>&nbsp;</label>
                    <button type='button' class="btn btn-primary btnMenu" id="exportar" onclick="exportar()">Exportar cuentas</button>
                </div>
            </div>
        </section>
        <section>
            <?php
            if($tipoinstancia)
            {
            ?>
                <label style='margin-top:10px;'>Subir cuentas a través de layout.</label>   <button onclick='abrir()' id='abr'>Abrir</button>
                <div style="margin-top:15px;" id='subircuentas' abierto='0'>
                    <a href='Formato_cuentas2.xls'>Descargar Layout</a><br /><br />
                    <form action='index.php?c=Config&f=saveNewAccounts' method='post' name='archivo' enctype="multipart/form-data" id='arch' onsubmit='return validar()'>
                        <input type='file' name='layout_cuentas' id='layout_cuentas' style='margin-bottom:10px;'>
                        <input type='submit' name='cargar' id='cargar' value='Cargar'>
                    </form>
                </div>
            <?php 
            } 
            ?>
        </section>
        <section>
            <div class="row" id="content">
                <div class="col-md-6" id='cont' style="overflow: auto; height: 53vw; margin-bottom: 1em;">
                    <ul></ul>
                </div>
                <div class="col-md-6" id='modifica'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <a id='cerrar' href='javascript:cerrar(0);' class="btn btn-danger btnMenu">Cerrar</a>
                                    <a id='abrir' href='javascript:cerrar(1);' class="btn btn-success btnMenu">Agregar cuenta</a>
                                </div>
                            </div>
                            <div class="row" id='captura'>
                                <div class="col-md-12">
                                    <h4 id='titulo_captura'></h4>
                                    <input type='hidden' id='idcuenta' value='0'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Numero de la cuenta:</label>
                                            <input type="text" class="validate form-control" placeholder="<?php echo $inputMask; ?>" name="accountNumber" id="accountNumber">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nombre de la cuenta:</label>
                                            <input type='text' id='nombre_cuenta' class="validate form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nombre en segundo idioma:</label>
                                            <input type='text' id='nombre_cuenta_idioma' class="validate form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label id='sbcta'>Subcuenta de:</label>
                                            <select class="" id='subcuentade'></select>
                                            <label id='sbcta_label'></label>
                                            <input type='hidden' id='sbcta_hidden'>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Naturaleza:</label>
                                            <select class="" id='nature'><?php echo $nature; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Moneda:</label>
                                            <select class="" id='coins'><?php echo $coins; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Clasificación:</label>
                                            <select class="" id='type'><?php echo $type; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Digito agrupador:</label>
                                            <select class="" id='oficial'>
                                                <option value='0'>Ninguna</option>
                                                <?php echo $oficial; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Estatus:</label>
                                            <select class="" id='status'>
                                                <?php echo $status; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label id='saving'>Guardando...</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label id='mensajes'></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-3">
                                            <button class='btn btn-danger btnMenu' id='eliminar' onclick='eliminar()'>Eliminar</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class='btn btn-primary btnMenu' id='guardar' onclick='guardar()'>Guardar</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class='btn btn-danger btnMenu' id='cancelar' onclick='cancelar()'>Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<div id='blanca' style='background-color:white;position:absolute;top:130px;width:30%;height:100%;font-size:20px;color:green;z-index:999;'>Cargando Información...</div>