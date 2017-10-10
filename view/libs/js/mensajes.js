$(document).ready( function () {
  notificacionFelicitar();
  verContactosPersonal();
});

function verContactosPersonal()
{
  $.ajax({
    "method" : "POST",
    "url" : "index.php?modo=listaContactosPersonal",
    "data" : 1
  }).done( function(info) {
    // var datos = JSON.parse(info);
    // console.log(datos[0].valueOf());
    $('#contenido-Mensajes').html(info);
  });
}

function notificacionFelicitar()
{
  $('.felicitarPersonal').submit(function (e) {
    e.preventDefault();
    var dato = $(this).serialize();
    var name = dato.split('&nombreCumpleanero=')[1];
    var id = dato.split('&')[1].split('idCumpleanero=')[1];
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=felicitarPersonal",
      "data" : dato
    }).done( function(info) {
      $('#cumple-'+id+'').modal('toggle');
      alertify.set('notifier','position', 'top-right');
      if (info == "1")
      {
        alertify.success("Felicitacion Enviada a: "+name);
      }
      else
      {
        if (info == "2")
        {
          alertify.error("No se puede nviar el mensaje de felicitación a: "+name);
        }
        else
        {
          alertify.error("Ya has Felicitado a: "+name);
        }
      }

    });

  });
}
