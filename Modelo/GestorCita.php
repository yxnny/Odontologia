<?php
    class GestorCita {
        public function agregarCita(Cita $cita){
            $conexion = new Conexion();
            $conexion->abrir();
            $fecha = $cita->obtenerFecha();
            $hora = $cita->obtenerHora();
            $paciente = $cita->obtenerPaciente();
            $medico = $cita->obtenerMedico();
            $consultorio = $cita->obtenerConsultorio();
            $estado = $cita->obtenerEstado();
            $observaciones = $cita->obtenerObservaciones();
            $sql = "INSERT INTO Citas VALUES ( null,'$fecha','$hora', '$paciente','$medico','$consultorio','$estado','$observaciones')";
            $conexion->consulta($sql);
            $citaId = $conexion->obtenerCitaId();
            $conexion->cerrar();
            return $citaId ;
        }
        public function consultarCitaPorId($id){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "SELECT pacientes.* , medicos.*, consultorios.*, citas.*"
            . "FROM Pacientes as pacientes, Medicos as medicos, Consultorios
            as consultorios ,citas "
            . "WHERE citas.CitPaciente = pacientes.PacIdentificacion "
            . " AND citas.CitMedico = medicos.MedIdentificacion "
            . " AND citas.CitNumero = $id";
            $conexion->consulta($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result ;
        }
    
        public function consultarCitasPorDocumento($doc){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "SELECT * FROM citas " . "WHERE CitPaciente = '$doc' ";
            $conexion->consulta($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result ;
        }
    
        public function consultarPaciente($doc){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "SELECT * FROM Pacientes WHERE PacIdentificacion = '$doc' ";
            $conexion->consulta($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result ;
        }
    
        public function agregarPaciente(Paciente $paciente){
            $conexion = new Conexion();
            $conexion->abrir();
            $identificacion = $paciente->obtenerIdentificacion();
            $nombres = $paciente->obtenerNombres();
            $apellidos = $paciente->obtenerApellidos();
            $fechaNacimiento = $paciente->obtenerFechaNacimiento();
            $sexo = $paciente->obtenerSexo();
            $sql = "INSERT INTO Pacientes VALUES (
            '$identificacion','$nombres','$apellidos',"
            . "'$fechaNacimiento','$sexo')";
            $conexion->consulta($sql);
            $filasAfectadas = $conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $filasAfectadas;
        }
    
        public function consultarMedicos(){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "SELECT * FROM Medicos ";
            $conexion->consulta($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result ;
        }

        public function consultarHorasDisponibles($medico,$fecha){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "SELECT hora FROM horas WHERE hora NOT IN ( SELECT CitHora FROM citas WHERE CitMedico = '$medico' AND CitFecha = '$fecha' AND CitEstado = 'Solicitada')";
            $conexion->consulta($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result ;
        }
        public function consultarConsultorios(){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "SELECT * FROM consultorios ";
            $conexion->consulta($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result ;
        }
        public function cancelarCita($cita){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "UPDATE citas SET CitEstado = 'Cancelada' ". " WHERE CitNumero = $cita ";
            $conexion->consulta($sql);
            $filasAfectadas = $conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $filasAfectadas;
        }
        //// agregar medico
        public function agregarMedico(Medico $medico){
            $conexion = new Conexion();
            $conexion->abrir();
            $identificacion = $medico->obtenerIdentificacion();
            $nombres = $medico->obtenerNombres();
            $apellidos = $medico->obtenerApellidos();
            $especialidad = $medico->obtenerEspecialidad();
            $sql = "INSERT INTO Medicos VALUES ('$identificacion','$nombres','$apellidos', '$especialidad')";
            $conexion->consulta($sql);
            $filasAfectadas = $conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $filasAfectadas;
        }
        ///Mostrar medico
        // public function consultarMedicoPorId($id){
        //     $conexion = new Conexion();
        //     $conexion->abrir();
        //     ///corregir
        //     $sql = "SELECT * from medicos where MedIdentificacion=$id";
        //     $conexion->consulta($sql);
        //     $result = $conexion->obtenerResult();
        //     $conexion->cerrar();
        //     return $result ;
            
            
        // }
        
        public function EditarDatoMedico(ConsultarMedico $medico){
            $conexion = new Conexion();
            $conexion->abrir();
            $identificacion = $medico->obtenerIdentificacion();
            $nombres = $medico->obtenerNombres();
            $apellidos = $medico->obtenerApellidos();
            $especialidad = $medico->obtenerEspecialidad();

            $sql = "UPDATE Medicos SET MedNombres='$nombres', MedApellidos ='$apellidos', MedEspecialidad= '$especialidad' where MedIdentificacion=$identificacion";
            $conexion->consulta($sql);
            $filasAfectadas = $conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $filasAfectadas;
        }

        ///Eliminar
        
        public function eliminarDatosMedicos($id){
            $conexion = new Conexion();
            $conexion->abrir();
            $sql = "DELETE from Medicos where MedIdentificacion='$id'";
            $conexion->consulta($sql);
            $filasAfectadas = $conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $filasAfectadas;

        }

        public function generarReportePdf($id){
            $conexion = new Conexion();
            $conexion->abrir();

            $sql= "SELECT PacIdentificacion, PacNombres, PacApellidos,PacFechaNacimiento, PacSexo, MedIdentificacion, MedNombres, MedApellidos, MedEspecialidad, ConNumero,CitNumero, CitFecha,CitHora	FROM citas JOIN medicos on citas.CitMedico=medicos.MedIdentificacion join pacientes on citas.CitPaciente=pacientes.PacIdentificacion JOIN consultorios on citas.CitConsultorio=consultorios.ConNumero where PacIdentificacion='$id'";
            $conexion->consulta($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result ;
        }
      

    }

    
?>