$(document).ready(function () {
  addFacultad();
});

function addFacultad()
{
  $('#facultadFrm').submit(function (e)
  {
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=addFacultad",
      "data" : datos
    }).done( function(info) {
      $('#facultadTable').html(info);
      $("#facultadConf").val("");
    });
  });
}
