<?php
    require_once 'conexion.php';

    $MedDocumento2 = $_POST["MedDocumento2"];
//echo $MedDocumento2;
    $conexion = new Conexion();
    $conexion ->abrir();
    
    $sql = "SELECT * from medicos where MedIdentificacion=$MedDocumento2";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $conexion->cerrar();

    $fila=$result->fetch_object();
    ?>

                    <table>
                        <tr>
                            <td>Documento:</td>
                            <td>
                                <input type="number" name="MedDocumento2" id="MedDocumento2" value="<?php echo $fila->MedIdentificacion;?>" readonly>  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nombres:</td>
                            <td>
                                <input type="text" name="MedNombres2" id="MedNombres2" value="<?php echo $fila->MedNombres;?>" >
                            </td>
                        </tr>
                        <tr>
                            <td>Apellidos:</td>
                            <td>
                                <input type="text" name="MedApellidos2" id="MedApellidos2" value="<?php echo $fila->MedApellidos;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Especialidad: </td>
                            <td>
                                <input type="text" name="MedEspecialidad2" id="MedEspecialidad2" value="<?php echo $fila->MedEspecialidad;?>" >
                            </td>
                        </tr>

                    </table>
   

