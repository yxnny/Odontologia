<?php
    $doc=$_POST['MedDocumento'];
    session_star();

    $_SESSION['MedDocumento']=$doc;

    $consulta="SELECT * FROM Medicos WHERE MedIdentificacion='$doc'";
    $result=mysqli_query( $consulta);

    $filas=mysli_num_rows($resultado);

    if($filas){
        
}