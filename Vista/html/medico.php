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
            <li><a href="index.php">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li ><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li ><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
            <li class="activa"><a href="index.php?accion=medico">Medicos</a> </li>
            
        </ul>

        <div id="contenido">
            <h2>Medicos</h2>
            
            <button class="consulta" type="button" onclick="mostrarFormularioMedico()" >Agregar</button>
            <div id=medico></div>
            <div id="frmMedicos" title="Agregar Nuevo Medico" >
                <form id="agregarMedico">
                    <table>
                        <tr>
                            <div class="form-group">
                                <label for="frmidentificacion" class="form-label"> Documento: </label> 
                                
                                <input type="number" id="frmidentificacion" maxlength="6" name="frmidentificacion" class="form-crontrol" placeholder="Numero de Documento" required onkeyup="validarDocumento();"><div id="resultadoDocumento" style="color: red"> </div>
                                

                            </div>
                            <!-- <td>Documento</td>
                            <td>
                                <input type="number" name="MedDocumento" id="MedDocumento" >
                            </td> -->
                        </tr>
                        <tr id="ocultarMedicoN">
                            <td>Nombres:</td>
                            <td>
                                <input type="text" name="MedNombres" id="MedNombres" placeholder="Ingrese sus Nombres" >
                            </td>
                        </tr>
                        <tr id="ocultarMedicoA">
                            <td>Apellidos:</td>
                            <td>
                                <input type="text" name="MedApellidos" id="MedApellidos" placeholder="Ingrese sus Apellidos" >
                            </td>
                        </tr>
                        <tr id="ocultarMedicoE">
                            <td>Especialidad:</td>
                            <td>
                                <input type="text" name="MedEspecialidad" id="MedEspecialidad" placeholder="Ingrese su Especialidad">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
            <?php
                if($result->num_rows > 0){
            ?>
            <table>
                <tr>
                    <th>Documento</th><th>Nombres</th><th>Apellidos</th><th>Especialidad</th>
                </tr>
                <?php
                    while($fila=$result->fetch_object()){
                ?>
                <tr>
                    <td><?php echo $fila->MedIdentificacion;?></td>
                    <td><?php echo $fila->MedNombres;?></td>
                    <td><?php echo $fila->MedApellidos;?></td>
                    <td><?php echo $fila->MedEspecialidad;?></td>
                    
                    <!-- <td><a href="index.php?accion=verMedico&numero=<?php echo $fila->MedIdentificacion;?>">Editar</a></td> 
                     -->

                    <td><input class="editar" type="button" value="Editar" onclick="mostrarFormularioMedicoEditar(<?php echo $fila->MedIdentificacion;?>)"></td>
                    
                    
                    
                    <td><input class="eliminar" type="button" value="Eliminiar" onclick="confirmarEliminar1(<?php echo $fila->MedIdentificacion;?>)"></td> 
                </tr>
                
                <?php
                    }
                ?>
                
                </table>
            <?php
                }
                else {
            ?>
            <p>El Medico no se encuentra asignadas</p>
            <?php
                }
            ?>
            <!-- FORMULARIO PARA EDITAR -->
            <div id=medicoEditar></div>
            <div id="frmMedicoEditar" title="Agregar Nuevo Medico" >
                <form id="editarMedicoE"  method="post" >
                <div id="resultadoDocumento2"></div>
                </form>

            </div>
        </div>

    </div>

</body>
</html>