$(document).ready(function () {
  registrarNuevaTablaMeritos();
  verTablaMeritosEnLista();
});

function verTablaMeritosEnLista()
{
  $(".verTablaMeritos").submit(
    function (e)
    {
      e.preventDefault();
      var datos = $(this).serialize();
      $.ajax({
        "method" : "POST",
        "url" : "index.php?modo=verTablaMeritos",
        "data" : datos
      }).done(function (info) {
        $("#contenidoTablaMeritosModal").modal();
        $("#contenidoTablaMeritos").html(info);
      });
    }
  );
}

function registrarNuevaTablaMeritos() {
  $("#frmRegistrarNuevaTablaMerito").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url : "index.php?modo=RegistrarNuevaTablaMeritos",
      data: new FormData($(this)[0]),//el "FormData es para obtner todos los datos del formulario incluidos archivos."
      async: false,
      contentType: false,
      cache: false,
      processData:false,
    }).done( function(info) {
      var resp = info.length;
      if (resp>150)
      {
        $("#contenidoTablaMeritos").html(info);
        $('body').addClass("modal-open");
        $('body').css("padding-right", "16px");
        $("#contenidoTablaMeritosModal").addClass("in");
        $("#contenidoTablaMeritosModal").css("display", "block");
        $("#contenidoTablaMeritosModal").css("padding-right", "16px");
        $("#fondoModal").addClass("modal-backdrop fade in");
      }
      else
      {
        $("#mesajePersona").html(info);
      }

    });

  });
}
