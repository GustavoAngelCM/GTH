$(document).ready(function () {
  addCargos();
});

function addCargos()
{
  $('#cargosFrm').submit(function (e)
  {
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addCargos",
      "data" : datos
    }).done( function(info) {
      $('#cargosTable').html(info);
      $("#cargosConf").val("");
    });
  });
}
