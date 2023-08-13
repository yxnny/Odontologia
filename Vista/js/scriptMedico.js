$(document).ready(function () {
    $("#frmMedicos").dialog({
        autoOpen: false,
        height: 310,
        width: 460,
        modal: true,
        buttons: {
            "Insertar": insertarMedico,
            "Cancelar": cancelar
        }
    });
});


function mostrarFormularioMedico() {
    $("#frmMedicos").dialog('open');
}

function insertarMedico() {
    ///Comparacion formulario agregar Medicos
    if (($("#frmidentificacion").val() == "") || ($("#MedNombres").val() == "")  ||  ($("#MedApellidos").val() == "") ||  ($("#MedEspecialidad").val() == "") ) {
        alert("Debe llenar todos los campos");
    } 
    else{
        
        queryString = $("#agregarMedico").serialize();
        url = "index.php?accion=ingresarMedico&" + queryString;
        $("#medico").load(url);
        $("#frmMedicos").dialog('close');
    }
    window.location = "index.php?accion=medico";
}
function cancelar() {
    $(this).dialog('close');
}

/// EDITAR medicos

// function EditarMedico(){
//     queryString = $("#editarMedico2").serialize();
//     url = "index.php?accion=modificarMedico&" + queryString;
//     $("#medico2").load(url);
//     window.location = "index.php?accion=medico";
// }


///Eliminar
function confirmarEliminar1(MedIdentificacion) {
    
    if (confirm("Esta seguro quiere eliminar el Medico " + MedIdentificacion)) {
        $.get("index.php", { accion: 'confirmarEliminar1', MedIdentificacion: MedIdentificacion }, function (mensaje) {
            alert(mensaje);
            window.location = "index.php?accion=medico";
        });
    }
    
    $("#cancelarConsultar").trigger("click");
    
}

/// validar documento

function validarDocumento(){
    var frmidentificacion=$("#frmidentificacion").val();
    $.post("Modelo/consultaDocumento.php",{frmidentificacion:frmidentificacion}, function(mensajedoc){
        $("#resultadoDocumento").html(mensajedoc);

    });
}


/// Editar MEDICO con formulario ventana
$(document).ready(function () {
    $("#frmMedicoEditar").dialog({
        autoOpen: false,
        height: 310,
        width: 560,
        modal: true,
        buttons: {
            "Insertar": modificarMedico,
            "Cancelar": cancelar
        }
    });
});


function mostrarFormularioMedicoEditar(MedDocumento2) {
    $.post("Modelo/editarMedico2.php",{MedDocumento2:MedDocumento2}, function(mensajedoc){
        $("#resultadoDocumento2").html(mensajedoc);
        
    });
    $("#frmMedicoEditar").dialog('open');
}

function modificarMedico() {
    ///Comparacion formulario agregar Medicos
    
    queryString = $("#editarMedicoE").serialize();
    url = "index.php?accion=modificarMedico&" + queryString;
    $("#medicoEditar").load(url);
    window.location = "index.php?accion=medico";
    
}
function cancelar() {
    $(this).dialog('close');
}


/// REPORTE PDF CITAS
