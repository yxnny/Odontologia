<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Vista/css/estilos.css">
    <script type="text/javascript" src="Vista/jquery/jquery.js"></script>
    

    <script src="Vista/jquery/jquery-ui-1.13.2/jquery-ui.js" type="text/javascript"></script>
    <link href="Vista/jquery/jquery-ui-1.13.2/jquery-ui.min.css"rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="Vista/js/script.js"></script>
    
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
                
        </div>
        <ul id="menu">
            <li><a href="index.php">inicio</a> </li>
            <li class="activa"><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
            <li ><a href="index.php?accion=medico">Medicos</a> </li>
        </ul>

        <div id="contenido">
            <h2>Asignar cita</h2>
            <h3> Déjanos tus datos y nos contactaremos contigo</h3>
            <form id="frmasignar" action="index.php?accion=guardarCita" method="post">
                
                <div>
                    <label>Documento del Paciente:</label>
                    <input type="number" class="control" name="asignarDocumento" id="asignarDocumento" required>
                    <input type="button" value="Consultar" class="consulta" name="asignarConsultar" id="asignarConsultar" onclick="consultarPaciente()">
                </div>
                <div colspan="2">
                    <div id="paciente"></div>
                </div>
                <div>
                    <label>Médico:</label>
                    <select class="control" id="medico" name="medico" onchange="cargarHoras()"  required>
                                
                        <option value="" selected="selected" >Selecione el Médico </option>
                            <?php
                                while( $fila = $result->fetch_object())
                                    {
                            ?>
                            <option value = <?php echo $fila->MedIdentificacion; ?> >
                                <?php echo $fila->MedIdentificacion . " " . $fila->MedNombres ." ". $fila->MedApellidos; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
                <div>
                    <label>Fecha:</label>
                    <input class="control" type="date" id="fecha" name="fecha" onblur="cargarHoras()" required>
                </div>
                <div>
                    <label>Hora:</label>
                    <select class="control" id="hora" name="hora" onmousedown="seleccionarHora()" required>
                        <option value="" selected="selected">Seleccione la hora</option>
                    </select>
                </div>
                <div>

                    <label>Consultorio:</label>
                    <select class="control" id="consultorio" name="consultorio" required>
                        <option value="" selected="selected">Seleccione el Consultorio</option>
                        <?php
                            while( $fila = $result2->fetch_object()) 
                                {
                        ?>
                        <option value = <?php echo $fila->ConNumero; ?> >
                            <?php echo $fila->ConNumero . " - " . $fila->ConNombre ; ?> 
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div colspan="2">
                    <input  type="submit" class="botons" name="asignarEnviar" value="Enviar"  id="asignarEnviar" >
                </div>
                
            </form>

            <div id="frmPaciente" title="Agregar Nuevo Paciente">
                <form id="agregarPaciente">
                    <table>
                        <tr>
                            <td>Documento</td>
                            <td>
                                <input type="text" name="PacDocumento" id="PacDocumento" >
                            </td>
                        </tr>
                        <tr>
                            <td>Nombres</td>
                            <td>
                                <input type="text" name="PacNombres" id="PacNombres" >
                            </td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td>
                                <input type="text" name="PacApellidos" id="PacApellidos" >
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td>
                                <input type="date" name="PacNacimiento" id="PacNacimiento" >
                            </td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td>
                                <select id="PacSexo" name="PacSexo">
                                    <option value=""
                                    selected="selected">--Selecione el sexo ---</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>      
        </div>

        
    </div>
</body>
</html>