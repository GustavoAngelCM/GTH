$(document).ready(function () {
  addCargosPersona();
});

function addCargosPersona()
{
  $('#cargosPersonalFrm').submit(function (e)
  {
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addCargosPersona",
      "data" : datos
    }).done( function(info) {
      $('#cargosPersonalTable').html(info);
      $("#cargosPersonalConf").val("");
    });
  });
}
