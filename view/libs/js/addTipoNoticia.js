$(document).ready(function () {
  addTipoNoticia();
});

function addTipoNoticia()
{
  $('#tipoNoticiaFrm').submit(function (e)
  {
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addTipoNoticia",
      "data" : datos
    }).done( function(info) {
      $('#tipoNoticiaTable').html(info);
      $("#tipoNoticiaConf").val("");
    });
  });
}
