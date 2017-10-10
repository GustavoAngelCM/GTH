$(document).ready(function () {
  enviarDatos();
  verBloquear();
  enterValidar();
  enterValidarInput();
});

function enterValidarInput()
{
  $("#usuario-key").keypress(function(e) {
    if (e.which == 13) {
      e.preventDefault();
      var frm = $('#LoginPersonal').serialize();
      console.log( frm );
      $.ajax({
        "method" : "POST",
        "url" : "index.php?modo=CampLlenos",
        "data" : frm
      }).done( function(info) {
        $("#mensaje").html("");
        switch (info) {
          case '1':
            window.location.href = "view/Administrador/";
            break;

          case '2':
            window.location.href = "view/Asistente/";
            break;

          case '3':
            window.location.href = "view/PersonalAcademico/";
            break;

          case '4':
            window.location.href = "view/PersonalDePlanta/";
            break;

          case '5':
            window.location.href = "view/Profesor/";
            break;

          case '6':
            window.location.href = "view/PersonalDeServicio/";
            break;

          default:
            $("#mensaje").addClass("alert");
            $("#mensaje").addClass("alert-danger");
            $("#mensaje").addClass("alert-dismissable");
            $("#mensaje").append(info);
            parpa();
            function parpa() {
               $('#mensaje').fadeIn(500).delay(250).fadeOut(300, parpa)
               setTimeout("$('#mensaje').stop(true,true).css('opacity', 1)", 4000);
            }
            break;
        }

      });
    }
  });
}

function enterValidar()
{
  $("#contrasena").keypress(function(e) {
    if (e.which == 13) {
      e.preventDefault();
      var frm = $('#LoginPersonal').serialize();
      console.log( frm );
      $.ajax({
        "method" : "POST",
        "url" : "index.php?modo=CampLlenos",
        "data" : frm
      }).done( function(info) {
        $("#mensaje").html("");
        switch (info) {
          case '1':
            window.location.href = "view/Administrador/";
            break;

          case '2':
            window.location.href = "view/Asistente/";
            break;

          case '3':
            window.location.href = "view/PersonalAcademico/";
            break;

          case '4':
            window.location.href = "view/PersonalDePlanta/";
            break;

          case '5':
            window.location.href = "view/Profesor/";
            break;

          case '6':
            window.location.href = "view/PersonalDeServicio/";
            break;

          default:
            $("#mensaje").addClass("alert");
            $("#mensaje").addClass("alert-danger");
            $("#mensaje").addClass("alert-dismissable");
            $("#mensaje").append(info);
            parpa();
            function parpa() {
               $('#mensaje').fadeIn(500).delay(250).fadeOut(300, parpa)
               setTimeout("$('#mensaje').stop(true,true).css('opacity', 1)", 4000);
            }
            break;
        }

      });
    }
  });
}

function verBloquear()
{
  var conteo = 0;

  $("#verPass").click(function() {
      if(conteo == 0)
      {
        conteo = 1;
        $('#contrasena').removeAttr("type", "password");
        $("#contrasena").prop("type", "text");
      }
      else
      {
        conteo = 0;
        $('#contrasena').removeAttr("type", "text");
        $("#contrasena").prop("type", "password");
      }
  });
}

function enviarDatos() {
  $("#LoginPersonal").on("submit", function(e) {
    e.preventDefault();
    var frm = $(this).serialize();
    console.log( frm );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=CampLlenos",
      "data" : frm
    }).done( function(info) {
      $("#mensaje").html("");
      switch (info) {
        case '1':
          window.location.href = "view/Administrador/";
          break;

        case '2':
          window.location.href = "view/Asistente/";
          break;

        case '3':
          window.location.href = "view/PersonalAcademico/";
          break;

        case '4':
          window.location.href = "view/PersonalDePlanta/";
          break;

        case '5':
          window.location.href = "view/Profesor/";
          break;

        case '6':
          window.location.href = "view/PersonalDeServicio/";
          break;

        default:
          $("#mensaje").addClass("alert");
          $("#mensaje").addClass("alert-danger");
          $("#mensaje").addClass("alert-dismissable");
          $("#mensaje").append(info);
          parpa();
          function parpa() {
             $('#mensaje').fadeIn(500).delay(250).fadeOut(300, parpa)
             setTimeout("$('#mensaje').stop(true,true).css('opacity', 1)", 4000);
          }
          break;
      }

    });

  });
}
