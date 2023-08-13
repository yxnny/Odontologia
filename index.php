<?php 
    require_once 'Controlador/Controlador.php';
    require_once 'Modelo/GestorCita.php';
    require_once 'Modelo/Cita.php';
    require_once 'Modelo/Paciente.php';
    require_once 'Modelo/Medico.php';
    require_once 'Modelo/Conexion.php';
    require_once 'Modelo/ConsultarMedico.php';

    $controlador = new Controlador();

    if( isset($_GET["accion"])){
        if($_GET["accion"] == "asignar"){
            $controlador->cargarAsignar();
        }
        if($_GET["accion"] == "consultar"){
            $controlador->verPagina('Vista/html/consultar.php');
        }
        if($_GET["accion"] == "cancelar"){
            $controlador->verPagina('Vista/html/cancelar.php');
        }
        if($_GET["accion"] == "medico"){
            $controlador->cargarMedicos();
        }
        if($_GET["accion"] == "guardarCita"){
        $controlador->agregarCita(
            $_POST["asignarDocumento"],
            $_POST["medico"], 
            $_POST["fecha"], 
            $_POST["hora"],
            $_POST["consultorio"]);
        }
        elseif($_GET["accion"] == "consultarCita"){
            $controlador->consultarCitas($_GET["consultarDocumento"]);
        }
        elseif($_GET["accion"] == "cancelarCita"){
            $controlador->cancelarCitas($_GET["cancelarDocumento"]);
        }
        elseif($_GET["accion"] == "consultarPaciente"){
            $controlador->consultarPaciente($_GET["documento"]);
        }
        elseif($_GET["accion"] == "ingresarPaciente"){
            $controlador->agregarPaciente(
            $_GET["PacDocumento"],
            $_GET["PacNombres"],
            $_GET["PacApellidos"],
            $_GET["PacNacimiento"],
            $_GET["PacSexo"]
            );
        }
        elseif($_GET["accion"] == "ingresarMedico"){
            $controlador->agregarMedico(
            $_GET["frmidentificacion"],
            $_GET["MedNombres"],
            $_GET["MedApellidos"],
            $_GET["MedEspecialidad"],
            );
        } 
        elseif($_GET["accion"] == "consultarHora"){
        $controlador->consultarHorasDisponibles($_GET['medico'], $_GET['fecha']);
        }
        elseif($_GET["accion"] == "verCita"){
            $controlador->verCita($_GET["numero"]);
        } /// EDITAR MEDICO
        elseif($_GET["accion"] == "verMedico"){
            ///duda de ese "numero"
            $controlador->verMedico($_GET["numero"]);
        }///duda
        
         /// editar
        elseif($_GET["accion"] == "modificarMedico"){
            $controlador->editarMedico(
            $_GET["MedDocumento2"],
            $_GET["MedNombres2"],
            $_GET["MedApellidos2"],
            $_GET["MedEspecialidad2"],
            );
            
        } ///Eliminar
        elseif($_GET["accion"] == "confirmarEliminar1"){
            $controlador->confirmarEliminar1($_GET["MedIdentificacion"]);
        }///Comparar documento Medico
        // elseif($_GET["accion"] == "consultarMedico"){
        //     $controlador->consultarMedico($_GET["MedIdentificacion"]);
        // }
        elseif($_GET["accion"] == "confirmarCancelar"){
            $controlador->confirmarCancelarCita($_GET["numero"]);
        }
        /// REPORTE PDFF
        elseif($_GET["accion"] == "generarReportePdf"){
            $controlador->generarReportePdf(
            "Reporte/reporte.php",
            $_GET['val']);
            
        }

    }else {
        $controlador->verPagina('Vista/html/inicio.php');
    }
    
?>

