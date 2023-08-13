

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

