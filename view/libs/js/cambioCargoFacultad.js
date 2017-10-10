$(document).ready(function(){
  $('#cargoPersonalSelect').hide();
  $('#carreraPersonalSelect').hide();
  iniciarCambiosEditar();
  cambiar();
});

function iniciarCambiosEditar()
{

  var tipo = $("#cargoEditarPersonal").val();
  if (tipo != "" && $("#cargoEditarPersonal").length > 0 )
  {
    $('#cargoPersonalSelect').show();
  }
  tipo = $("#cargoPersonal-mobi").val();
  if (tipo != "" && $("#cargoEditarPersonal").length > 0 )
  {
    $('#cargoPersonalSelect').show();
  }

  var carrera = $('#carreraEditarPersonal').val();
  if (carrera != "" && $('#carreraEditarPersonal').length > 0)
  {
    $('#carreraPersonalSelect').show();
  }
  carrera = $('#carrera-mobi').val();
  if (carrera != "" && $('#carreraEditarPersonal').length > 0)
  {
    $('#carreraPersonalSelect').show();
  }
}

function cambiar()
{
  $("#tipoPersonal").change(function()
  {
    var tipo = $("#tipoPersonal").val();

    switch (tipo)
    {
      case '1':
        $('#cargoPersonalSelect').show(700);
        break;
      default:
        $('#cargoPersonalSelect').hide(700);
        $('#carreraPersonalSelect').hide(700);

        $('#cargoPersonal').val(null);
        $('#cargoPersonal-mobi').val(null);
        $('#carrera').val(null);
        $('#carrera-mobi').val(null);
        break;
    }

  });

  $("#tipoUsuario").change(function()
  {
    var tipo = $("#tipoUsuario").val();

    switch (tipo)
    {
      case '3':
        $('#cargoPersonalSelect').show(700);
        break;
      default:
        $('#cargoPersonalSelect').hide(700);
        $('#carreraPersonalSelect').hide(700);

        $('#cargoPersonal').val(null);
        $('#cargoPersonal-mobi').val(null);
        $('#carrera').val(null);
        $('#carrera-mobi').val(null);
        break;
    }
  });

  $("#tipoUsuario-mobi").change(function(){
    var tipo = $("#tipoUsuario-mobi").val();
    switch (tipo) {
      case '3':
        $('#cargoPersonalSelect').show(700);
        break;
      default:
        $('#cargoPersonalSelect').hide(700);

        $('#cargoPersonal').val(null);
        $('#cargoPersonal-mobi').val(null);
        $('#carrera').val(null);
        $('#carrera-mobi').val(null);
        break;
    }
  });

  $("#cargoPersonal").change(function()
  {
    var tipo = $("#cargoPersonal").val();
    switch (tipo)
    {
      case '1':
        $('#carreraPersonalSelect').show(700);
        break;
      default:
        $('#carreraPersonalSelect').hide(700);

        $('#carrera').val(null);
        $('#carrera-mobi').val(null);
        break;
    }
  });

  $("#cargoPersonal-mobi").change(function()
  {
    var tipo = $("#cargoPersonal-mobi").val();

    switch (tipo)
    {
      case '1':
        $('#carreraPersonalSelect').show(700);
        break;
      default:
        $('#carreraPersonalSelect').hide(700);

        $('#carrera').val(null);
        $('#carrera-mobi').val(null);
        break;
    }
  });

}
