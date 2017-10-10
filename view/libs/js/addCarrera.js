$(document).ready(function () {
  addCarrera();
});

function addCarrera()
{
  $('#carreraFrm').submit(function (e)
  {
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addCarrera",
      "data" : datos
    }).done( function(info) {
      $('#carreraTable').html(info);
      $("#carreraConf").val("");
    });
  });
}
