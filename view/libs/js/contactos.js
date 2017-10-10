$(document).ready(function () {
  changeTabDepartamento();
  regContacto();
  regInstitucion();
});

function regInstitucion()
{
  $('#addInstitucionFrm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    console.log(datos);

    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addInstitucion",
      "data" : datos
    }).done( function(info) {
      if (info == '1') {
        $("#mensajeInstitucion").html("<p style='color:green'><strong>Guardado Exitoso</strong></p>");
        setTimeout(function(){ window.location.href = "Directorio.html"; }, 1500);
      } else {
        $("#mensajeInstitucion").html("<p style='color:orange'><strong>Institucion Existente</strong></p>");
      }

    });

  });
}

function regContacto()
{
  $('#addContactoFrm').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();

    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addContacto",
      "data" : datos
    }).done( function(info) {
      $("#mensajeContacto").html(info);
      setTimeout(function(){ window.location.href = "Directorio.html"; }, 1500);
    });

  });
}

function changeTabDepartamento()
{
  $('.tabClick').click(function (e) {
    e.preventDefault();
    var id = $(this).children('.inputA').val();
    console.log(id);
  });
}
