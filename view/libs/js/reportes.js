var Datos = {
        labels : ['1', 'a', 'a', 'a', 'a'],
        datasets : [
            {
                data : [0, 0, 0, 0, 0, 0]
            }
        ]
    }
var Opciones = {
    responsive: true,
    title: {
        display: true,
        text: 'Reporte Personal UAB'
    }
}

var Barra;

$(document).ready(function () {
  $('.selectpicker').selectpicker('refresh');
  $('#graficoCanvas').hide();
  $('#closeCanvas').hide();
  $('#linkReportCanvas').hide();
  listaPersonalReporte();
  cantidadPersonalReporte();
  hideShowCanvas();
  clickReport();
  cantidadTipoPersonal();
  listadoUsuarioRep();
  var URLactual = window.location;
  // console.log(URLactual);
  var element = URLactual.toString().split('Administrador/');
  // var elementAsis = URLactual.toString().split('Asistente/');
  if ("Reportes.html" == element[1]) {
    var contexto = document.getElementById('graficoCanvas').getContext('2d');
    Barra = new Chart(contexto, {
        type: 'bar',
        data: Datos,
        options: Opciones
    });
  }
  // if ("Reportes.html" == elementAsis[1]) {
  //   var contexto = document.getElementById('graficoCanvas').getContext('2d');
  //   Barra = new Chart(contexto, {
  //       type: 'bar',
  //       data: Datos,
  //       options: Opciones
  //   });
  // }
});

function listadoUsuarioRep()
{
  $('#usuarioListaFrm').on("submit", function (e) {
    e.preventDefault();
    var tipo = $('#usuarioLista').val();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=listadoUsuario",
      "data" : "tipoPersonal="+tipo
    }).done( function(info) {
      $('#reporteGenerado').html(info);
    });
  });
}

function listaPersonalReporte()
{
  $('#reportePersonalListado').on("submit", function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    var tipo = $('#tipoPersonalReporte').val();
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=listadoPersonal",
      "data" : datos+"&tipoPersonal="+tipo
    }).done( function(info) {
      $('#reporteGenerado').html(info);
    });
  });
}

function clickReport()
{
  $('#linkReportCanvas').click(function () {
    $('#graficoCanvas').get(0).toBlob(function (blob) {
      saveAs(blob, "grafico.png");
    });
  });
}

function hideShowCanvas()
{
  $('#closeCanvas').click(function () {
    $('#graficoCanvas').hide(1500);
    $('#tableReprtes').show(1500);
    $('#closeCanvas').hide(1500);
    $('#linkReportCanvas').hide(1500);
  });
}

function cantidadPersonalReporte()
{
  $('#reporteGrapBoton').click(function (e) {
    e.preventDefault();
    $('#graficoCanvas').html("");
    var tipoTiulo = $('#tipoTituloProfesionalReporte').val();
    var sexo = $('#sexoReporte').val();
    var datitos = "tipoTituloProfesional="+tipoTiulo+"&sexo="+sexo;
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=cantidadPersonal",
      "data" : datitos,
      success: function(info) {
        var valores = eval(info);

        var i   = valores[0];
        var s   = valores[1];
        var e   = valores[2];
        var t   = valores[3];
        var f  = valores[4];

        var DatosRep = {
                labels : ['INGENIERIA', 'SALUD', 'EDUCACION', 'TEOLOGIA', 'FCEA'],
                datasets : [
                    {
                      backgroundColor: ['orange', 'rgba(66, 134, 7, 0.9)', 'rgba(17, 102, 194, 0.87)', 'rgb(28, 89, 73)', 'rgb(21, 85, 194)'],
                      borderColor: ['black', 'white', 'white', 'rgb(227, 218, 168)', 'rgb(231, 218, 42)'],
                      borderWidth: 4,
                      label: 'Facultades',
                      data : [i, s, e, t, f, 0]
                    }
                ]
            }

        Barra.data = DatosRep;

        Barra.update();

        $('#tableReprtes').hide(1500);
        $('#graficoCanvas').show(1500);
        $('#closeCanvas').show(1500);
        $('#linkReportCanvas').show(1500);
      }
    });
  });

}

function cantidadTipoPersonal()
{
  $('#reporteCantidad').submit(function (e) {
    e.preventDefault();
    $('#graficoCanvas').html("");
    var tipoTitulo = $('#tipoTituloProfesionalReporteTipo').val();
    var datitos = "tipoTituloProfesional="+tipoTitulo;
    $.ajax({
      "method" : "POST",
      "url" : "index.php?modo=cantidadTipoPersonal",
      "data" : datitos,
      success: function(info) {
        console.log(info);
        var valores = eval(info);

        var paM   = valores[0];
        var paF   = valores[1];
        var ppM   = valores[2];
        var ppF   = valores[3];
        var pM  = valores[4];
        var pF = valores[5];
        var psM = valores[6];
        var psF = valores[7];

        var DatosRep = {
                labels : ['P. Academico', 'P. de Planta', 'Profesores', 'P. de Servicios'],
                datasets : [
                    {
                      backgroundColor: 'rgb(48, 131, 217)',
                      borderColor: 'rgb(20, 63, 102)',
                      borderWidth: 4,
                      label: 'Masculino',
                      data : [paM, ppM, pM, psM, 0]
                    },
                    {
                      backgroundColor: 'rgb(247, 25, 232)',
                      borderColor: 'rgb(122, 9, 118)',
                      borderWidth: 4,
                      label: 'Femenino',
                      data : [paF, ppF, pF, psF, 0]
                    }
                ]
            }

        Barra.data = DatosRep;

        Barra.update();

        $('#tableReprtes').hide(1500);
        $('#graficoCanvas').show(1500);
        $('#closeCanvas').show(1500);
        $('#linkReportCanvas').show(1500);
      }
    });

  });
}
