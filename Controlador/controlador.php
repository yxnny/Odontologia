<?php
    class Controlador {
        public function verPagina($ruta){
            require_once $ruta;
        }
        public function agregarCita($doc,$med,$fec,$hor,$con){
            $cita = new Cita(null, $fec, $hor, $doc, $med, $con, "Solicitada","Ninguna");
            $gestorCita = new GestorCita();
            $id = $gestorCita->agregarCita($cita);
            $result = $gestorCita->consultarCitaPorId($id);
            require_once 'Vista/html/confirmarCita.php';
        }
        public function consultarCitas($doc){
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarCitasPorDocumento($doc);
            require_once 'Vista/html/consultarCitas.php';
        }



        public function cancelarCitas($doc){
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarCitasPorDocumento($doc);
            require_once 'Vista/html/cancelarCitas.php';
        }
        
        public function consultarPaciente($doc){
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarPaciente($doc);
            require_once 'Vista/html/consultarPaciente.php';
        }

        public function agregarPaciente($doc,$nom,$ape,$fec,$sex){
            $paciente = new Paciente($doc, $nom, $ape, $fec, $sex);
            $gestorCita = new GestorCita();
            $registros = $gestorCita->agregarPaciente($paciente);
            if($registros > 0){ echo "Se insertó el paciente con exito";
            } else {
            echo "Error al grabar el paciente";
            }
        }
        public function confirmarCancelarCita($cita){
            $gestorCita = new GestorCita();
            $registros = $gestorCita->cancelarCita($cita);
            if($registros > 0){
                echo "La cita se ha cancelado con éxito";
            } else {
                echo "Hubo un error al cancelar la cita";
            }
        }
        
        public function cargarAsignar(){
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarMedicos();
            $result2 = $gestorCita->consultarConsultorios();
            require_once 'Vista/html/asignar.php';
        }

        public function consultarHorasDisponibles($medico,$fecha){
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarHorasDisponibles($medico,$fecha);
            require_once 'Vista/html/consultarHoras.php';
        }
        //// Agregar medico:d
        public function agregarMedico($doc,$nom,$ape,$esp){
            $medico = new Medico ($doc, $nom, $ape, $esp);
            $gestorCita = new GestorCita();
            $registros = $gestorCita->agregarMedico($medico);
            // if($registros > 0){ echo "Se insertó el Medico con exito";
            // } else {
            // echo "Error al grabar el Medico";
            // }
        }
        public function verCita($cita){
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarCitaPorId($cita);
            require_once 'Vista/html/confirmarCita.php';
        }

        public function cargarMedicos(){
            $gestorCita = new GestorCita();
            $result = $gestorCita->consultarMedicos();
            require_once 'Vista/html/medico.php';
        }


        ///Mostrar medico
        // public function verMedico($ConsultarMedico){
        //     $gestorCita = new GestorCita();
        //     $result = $gestorCita->consultarMedicoPorId($ConsultarMedico);
        //     require_once 'Vista/html/editarMedico.php';
        // }
        

        /// Editar medico
        public function editarMedico($doc,$nom,$ape,$esp){
            $medico = new ConsultarMedico ($doc, $nom, $ape, $esp);
            $gestorCita = new GestorCita();
            $registros = $gestorCita->EditarDatoMedico($medico);
            
            // if($registros > 0){ echo "Se insertó el Medico con exito";
            // } else {
            // echo "Error al grabar el Medico";
            // }
        }
        
        
        /// Eliminar
        public function confirmarEliminar1($doc){
            $gestorCita = new GestorCita();
            $registros = $gestorCita->eliminarDatosMedicos($doc);
            if($registros > 0){
                echo "El Medico se ha Eliminado con éxito";
            } else {
                echo "Hubo un error al cancelar la cita";
            }
        }


        /// GENERAR PDF
        public function generarReportePdf($url,$doc){
            
            $gestorCita = new GestorCita();
            $result = $gestorCita->generarReportePdf($doc);
            require_once $url;
            
        }
        
    }
?>