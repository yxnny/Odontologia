<?php
    if($result->num_rows > 0){
?>
<table id="infPaciente">
    <tr>
        <th>Documento</th><th>Nombre Completo</th><th>Sexo</th>
    </tr>
    <?php
        while($fila=$result->fetch_object()){
    ?>
    <tr>
        <td><?php echo $fila->PacIdentificacion;?></td>
        <td><?php echo $fila->PacNombres . " ". $fila->PacApellidos;?></td>
        <td><?php echo $fila->PacSexo;?></td>
        <!-- <td>Ver</td> -->
    </tr>
<?php
    }
?>
</table>
<?php
    }
    else {
?>
<p>El paciente no existe en la base de datos.</p>
<input class="agregarPaciente" type="button" name="ingPaciente" id="ingPaciente" value="Ingresar Paciente" onclick="mostrarFormulario()">
<?php
    }
?>
