function consultarPaciente() {
    var url = "index.php?accion=consultarPaciente&documento=" + $("#asignarDocumento").val();
    $("#paciente").load(url, function () {
    });

}


$(document).ready(function () {
    $("#frmPaciente").dialog({
        autoOpen: false,
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Insertar": insertarPaciente,
            "Cancelar": cancelar
        }
    });
});

function mostrarFormulario() {
    documento = "" + $("#asignarDocumento").val();
    $("#PacDocumento").attr("value", documento);
    $("#frmPaciente").dialog('open');
}


function insertarPaciente() {
    ///Comparacion formulario agregar paciente
    if (($("#PacDocumento").val() == "") || ($("#PacNombres").val() == "")  ||  ($("#PacApellidos").val() == "") || ($("#PacNacimiento").val() == "") || ($("#PacSexo").val() == "") ) {
        alert("Debe llenar todos los campos");
    }else{
        queryString = $("#agregarPaciente").serialize();
        url = "index.php?accion=ingresarPaciente&" + queryString;
        $("#paciente").load(url);
        $("#frmPaciente").dialog('close');
    }

}
function cancelar() {
    $(this).dialog('close');
}

function cargarHoras() {
    if (($("#medico").val() == "") || ($("#fecha").val() == "")) {
        $("#hora").html("<option value='' selected='selected'>--Selecione la hora </option> ");
    } else {
        queryString = "medico=" + $("#medico").val() + "&fecha=" + $("#fecha").val();
        url = "index.php?accion=consultarHora&" + queryString;
        $("#hora").load(url);
    }
}

function seleccionarHora() {
    if ($("#medico").val() == "") {
        alert("Debe seleccionar un médico");
    } else if ($("#fecha").val() == "") {
        alert("Debe seleccionar una fecha");
    }
}

function consultarCita() {
    url = "index.php?accion=consultarCita&consultarDocumento=" + $("#consultarDocumento").val();
    $("#paciente2").load(url);
}

function cancelarCita() {
    url = "index.php?accion=cancelarCita&cancelarDocumento=" + $("#cancelarDocumento").val();
    $("#paciente3").load(url);
}

function confirmarCancelar(numero) {
    if (confirm("Esta seguro de cancelar la cita " + numero)) {
        $.get("index.php", { accion: 'confirmarCancelar', numero: numero }, function (mensaje) {
            alert(mensaje);
            // window.location = 
        });
    }
    $("#cancelarConsultar").trigger("click");
}






