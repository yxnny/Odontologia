<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Vista/css/estilos.css">
    <script type="text/javascript" src="Vista/jquery/jquery.js"></script>
    <script type="text/javascript" src="Vista/js/script.js"></script>
</head>

<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
                
        </div>
        <ul id="menu">
            <li><a href="index.php">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li class="activa"><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
            <li ><a href="index.php?accion=medico">Medicos</a> </li>
        </ul>

        <div id="contenido">
            <h2>Consultar Cita</h2>
            <form action="index.php?accion=consultarCita" method="post" id="frmconsultar">
    
                <div colspan="2">
                    <label>Documento del Paciente:</label>
                    <input class="control" type="text" name="consultarDocumento" id="consultarDocumento">
                    <input type="button"  class="consulta" name="consultarConsultar" value="Consultar" id="consultarConsultar" onclick="consultarCita()">
                </div>

                <div colspan="2">
                    <div id="paciente2"></div>
                </div>
            
            </form>
        </div>
    </div>

</body>
</html>