<?php
    require_once 'conexion.php';
    $frmidentificacion = $_POST["frmidentificacion"];
    $conexion = new Conexion();
    $conexion ->abrir();
    if ($frmidentificacion!=""){
        $sql = "SELECT * FROM Medicos where MedIdentificacion='$frmidentificacion'";

        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        if($result->num_rows==1){ ?>

            <div class="alert alert-danger alert-dismissable"> 
                <button class="close" data-dimiss="alert">&times; </button>
                <strong>ERROR</strong> Usuario ya se encuentra registrado. <br>
                Por favor ingrese otro documento.
            </div>
            
            <script>
                document.getElementById('ocultarMedicoN').style.display="none";
                document.getElementById('ocultarMedicoA').style.display="none";
                document.getElementById('ocultarMedicoE').style.display="none";
            </script>
        <?php
        }else {?>
            <script>
                document.getElementById('ocultarMedicoN').style.display="block";
                document.getElementById('ocultarMedicoA').style.display="block";
                document.getElementById('ocultarMedicoE').style.display="block";
            </script>
            <?php
        }
    }
        
?>