$(document).ready(function () {
    enviarCursoPersonal();
    newCurso();
});

function enviarCursoPersonal()
{
  $("#CursosFrm").on("submit", function(e) {
    e.preventDefault();
    var ci = $("#ciNit").val();
    $("#ciPersonaCurso").val(ci);
    var texto = "";
    if( $('#participante-ponente').prop('checked') )
    {
      texto = "Ponente";
      $('#religionInstCurso').val(texto);
    }
    else
    {
      texto = "Participante";
      $('#religionInstCurso').val(texto);
    }
    var frm = new FormData($("#CursosFrm")[0]);
    // console.log( $(this).serialize() );
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=personalCursos",
      "data" : frm,
      contentType: false,
      processData: false

    }).done( function(info) {

      $('#mensajeCursosPersonal').html(info);
      $(".inputCursoBk").attr('disabled', 'disabled');
      $('.nameFileImg').html("");

    });

  });
}

function newCurso() {
  $('#newCurso').click(function () {
    $(".inputCursoBk").removeAttr('disabled');
    $(".inputCursoBk").val('');
  });
}
