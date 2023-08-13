<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Vista/css/estilos.css">
    <link rel="stylesheet" href="Vista/css/estilos.css">
    <script type="text/javascript" src="Vista/jquery/jquery.js"></script>
    

    <script src="Vista/jquery/jquery-ui-1.13.2/jquery-ui.js" type="text/javascript"></script>
    <link href="Vista/jquery/jquery-ui-1.13.2/jquery-ui.min.css"rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="Vista/js/script.js"></script>
    <script type="text/javascript" src="Vista/js/scriptMedico.js"></script>
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li class="activa"><a href="index.php">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
            <li ><a href="index.php?accion=medico">Medicos</a> </li>
        </ul>
        <div id="contenido">
            <?php $fila = $result->fetch_object();?>
            <h2>Información Cita</h2>
            <table>
                <tr>
                    <th colspan="2">Datos del Paciente</th>
                </tr>
                <tr>
                    <td>Documento</td>
                    <td><?php echo $fila->PacIdentificacion;?></td>
                </tr >
                <tr>
                    <td>Nombre</td>
                    <td><?php echo $fila->PacNombres . " " . $fila->PacApellidos;?></td>
                </tr>
                <tr>
                    <th colspan="2">Datos del Médico</th>
                </tr>
                <tr>
                    <td>Documento</td>
                    <td><?php echo $fila->MedIdentificacion;?></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><?php echo $fila->MedNombres . " " . $fila->MedApellidos;?></td>
                </tr>
                <tr>
                    <th colspan="2">Datos de la Cita</th>
                </tr>
                <tr>
                    <td>Número</td>
                    <td><?php echo $fila->CitNumero;?></td>
                    </tr>
                <tr>
                    <td>Fecha</td>
                    <td><?php echo $fila->CitFecha;?></td>
                </tr>
                <tr>
                    <td>Hora</td>
                    <td><?php echo $fila->CitHora;?></td>
                </tr>
                <tr>
                    <td>Número de Consultorio</td>
                    <td><?php echo $fila->ConNombre;?></td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td><?php echo $fila->CitEstado;?></td>
                </tr>
                <tr>
                    <td>Observaciones</td>
                    <td><?php echo $fila->CitObservaciones;?></td>
                </tr>
                
            </table>
            <div>
                <a href="index.php?accion=generarReportePdf&val=<?php echo $fila->PacIdentificacion;?>" target="_blank"> 
                    <button>Descargar PDF</button>

                </a>
            </div>

            
        </div>
    </div>
    
</body>
</html>