$(document).ready(function () {
  guardarDocumentoPersonalImg();
  newDocumentoPersonalImg();
});

function guardarDocumentoPersonalImg()
{
  $("#DocumentosFrm").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonaDocumento").val(ci);
    var frm = new FormData($("#DocumentosFrm")[0]);

    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=guardarDocumentoPersonal",
      "data" : frm,
      contentType: false,
      processData: false

    }).done( function(info) {

      $('#mensajeDocumento').html(info);
      $(".docum-perso").attr('disabled', 'disabled');
      $('.nameFileImg').html("");

    });

  });
}

function newDocumentoPersonalImg() {
  $('#newDocumento').click(function () {
    $(".docum-perso").removeAttr('disabled');
    $(".docum-perso").val('');
  });
}
