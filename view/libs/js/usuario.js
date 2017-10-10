$(document).ready(function () {
  cambiarDTOUsuario();
});

function cambiarDTOUsuario()
{
  $('#editarUsuarioFRM').submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var elements = datos.split('&');
    var a = elements[0].split('=');
    var b = elements[1].split('=');
    var c = elements[2].split('=');
    var d = elements[3].split('=');
    var e = elements[4].split('=');
    var f = elements[5].split('=');
    var g = elements[6].split('=');
    var mensaje;
    if (b[1] == g[1])
    {
      if (c[1] == d[1])
      {
        if ((a[1] == f[1])&&(c[1] == g[1]))
        {
          mensaje = '<div class="alert alert-warning" role="alert">'
              +'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'
              +'<span class="sr-only">Error:</span>'
              +'  No se ha realizado Ningun Cambio... '
            +'</div>';
          $('#mensajeErrUsuario').html(mensaje);
        }
        else
        {
          $.ajax({
            "method" : "POST",
            "url" : "index.php?modo=updateUsuario",
            "data" : datos
          }).done( function(info) {
            if (info == '1')
            {
              mensaje = '<div class="panel panel-success">'
                  +'<div class="panel-heading">'
                    +'<div class="text-center">'
                      +'<h3>Edicion de Datos de Usuario Exitosa</h3>'
                    +'</div>'
                  +'</div>'
                  +'<div class="panel-body">'
                    +'<div class="text-center">'
                      +'<h3 style="color:green"><strong>'
                      +'Los Datos de usuario se han modificado Exitosamente</strong></h3>'
                      +'<p style="color:green">Por su seguridad en estos momentos su session caducara y podra <strong>INICIAR SESSION</strong> con el nuevo <strong>USUARIO</strong> y <strong>CONTRASEÑA</strong> en <strong>15 segundos.</strong></p>'
                      +'<h2 style="color:red; font-weight: bold;" class="timerCount"></h2>'
                    +'</div>'
                  +'</div>'
                +'</div>';
                $('#usuarioUpdateTrue').html(mensaje);
                for (var time=15; time>0; time--)
                {
                    (function(index) {
                        setTimeout(function() {
                          switch (index) {
                            case 0:
                              $('.timerCount').html(16);
                              break;
                            case 1:
                              $('.timerCount').html(15);
                              break;
                            case 2:
                              $('.timerCount').html(14);
                              break;
                            case 3:
                              $('.timerCount').html(13);
                              break;
                            case 4:
                              $('.timerCount').html(12);
                              break;
                            case 5:
                              $('.timerCount').html(11);
                              break;
                            case 6:
                              $('.timerCount').html(10);
                              break;
                            case 7:
                              $('.timerCount').html(9);
                              break;
                            case 8:
                              $('.timerCount').html(8);
                              break;
                            case 9:
                              $('.timerCount').html(7);
                              break;
                            case 10:
                              $('.timerCount').html(6);
                              break;
                            case 11:
                              $('.timerCount').html(5);
                              break;
                            case 13:
                              $('.timerCount').html(4);
                              break;
                            case 14:
                              $('.timerCount').html(3);
                              break;
                            case 15:
                              $('.timerCount').html(2);
                              break;
                            case 16:
                              $('.timerCount').html(1);
                              break;
                          }
                          if (index == 15)
                          {
                            window.location.href = "../../";
                          }
                        }, time * 1000);
                    })(time);
                }
            }
            else
            {
              mensaje = '<div class="alert alert-warning" role="alert">'
                  +'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'
                  +'<span class="sr-only">Error:</span>'
                  +'  El Nombre de Usuario Ya Existe... '
                +'</div>';
              $('#mensajeErrUsuario').html(mensaje);
            }
          });
        }
      }
      else
      {
        mensaje = '<div class="alert alert-danger" role="alert">'
            +'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'
            +'<span class="sr-only">Error:</span>'
            +'  Las Contraseñas no coinciden... '
          +'</div>';
        $('#mensajeErrUsuario').html(mensaje);
      }
    }
    else
    {
      mensaje = '<div class="alert alert-danger" role="alert">'
          +'<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'
          +'<span class="sr-only">Error:</span>'
          +'  La Contraseña Actual no es la ingresada... '
        +'</div>';
      $('#mensajeErrUsuario').html(mensaje);
    }
  });
}
