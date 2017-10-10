$(document).ready(function () {
  enviarDatosUsuario();
});

function enviarDatosUsuario() {
  $("#frmUsuario1").on("submit", function(e) {
    e.preventDefault();

    var ci = $("#ciNit").val();
    $("#ciPerson").val(ci);

    var frm = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=usuarioInsertar",
      "data" : frm
    }).done( function(info) {

     if (info == "1")
     {
       var usuario = $('#nombreUsuario').val();
       var contra = $('#contrasena').val();

       $("#usuarioResp").val(usuario);
       $("#contraResp").val(contra);

       $("#modalUsuarioCreado").modal();
     }
     else
     {
       if (info == "0")
       {
         $("#mensajeUsu").html("<p style='color:red'>Error al guardar, es posible que el usuario exista o la cuenta ya este vinculada</p>");
         $("#mesajePersona").html("");
         $("#ciNit").removeAttr("disabled");
       }
       else
       {
         $("#mensajeUsu").html(info);
         $("#mesajePersona").html("");
         $("#ciNit").removeAttr("disabled");
       }
     }
    });
  });
}
