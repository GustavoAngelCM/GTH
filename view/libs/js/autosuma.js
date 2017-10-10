$(document).ready(function () {
  calcular_total();
  totalReady();
});

function totalReady()
{
  var totalInp = $('.puntaje').serializeArray();
  var total = 0;
  var aux = 0;
  // console.log(totalInp);

  $.each(totalInp, function(i, field){
    aux = field.value
    total =  parseFloat(aux) + parseFloat(total);
  });
  // console.log(total);

  $('#puntajeTotal').val(total);
}

function calcular_total()
{
	$(".puntaje").keyup(
    function sumar(){
    	var totalInp = $('.puntaje').serializeArray();
    	var total = 0;
      var aux = 0;
      // console.log(totalInp);

      $.each(totalInp, function(i, field){
        aux = field.value
        total =  parseFloat(aux) + parseFloat(total);
      });
      // console.log(total);

    	$('#puntajeTotal').val(total);
    }
	);

  $(".puntaje").mouseleave(
    function ()
    {
      var valor = $(this).val();
      console.log(valor);
      if (valor == "")
      {
        $(this).val("0");
      }
      totalReady();
    }
  );

}
