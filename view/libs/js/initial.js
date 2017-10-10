$(document).ready(function($) {
  $(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    $(this).removeClass("btn-default").addClass("btn-primary");
  });
  $('.datepicker').datepicker({
    clearBtn: true,
    language: "es"
  });
  $("#controls-left").hide();
  $("#cursos").hide();
  $("#titulos").hide();
  $("#documentos").hide();
  $('#listoAll').hide();
  listoShow();
  inputNumber();
  inputLetra();
  inputNumberFloat();
  inputfecha();
  visorDocument();
  felicitacion();
  $('.componentePersonal').hide();
  cargarImagenLogo();
  mensajeriaHide();
  $('#cerrar-mensaje').hide();
  manual();
});

function manual()
{
  $('#manual-usuario-admin').click(function () {
    alertify.YoutubeDialog || alertify.dialog('YoutubeDialog',function(){
    var iframe;
    return {
        // dialog constructor function, this will be called when the user calls alertify.YoutubeDialog(videoId)
        main:function(videoId){
            //set the videoId setting and return current instance for chaining.
            return this.set({
                'videoId': videoId
            });
        },
        // we only want to override two options (padding and overflow).
        setup:function(){
            return {
                options:{
                    //disable both padding and overflow control.
                    padding : !1,
                    overflow: !1,
                }
            };
        },
        // This will be called once the DOM is ready and will never be invoked again.
        // Here we create the iframe to embed the video.
        build:function(){
            // create the iframe element
            iframe = document.createElement('iframe');
            iframe.frameBorder = "no";
            iframe.width = "100%";
            iframe.height = "100%";
            // add it to the dialog
            this.elements.content.appendChild(iframe);

            //give the dialog initial height (half the screen height).
            this.elements.body.style.minHeight = screen.height * .5 + 'px';
        },
        // dialog custom settings
        settings:{
            videoId:undefined
        },
        // listen and respond to changes in dialog settings.
        settingUpdated:function(key, oldValue, newValue){
            switch(key){
               case 'videoId':
                    iframe.src = "https://www.youtube.com/embed/" + newValue + "?enablejsapi=1";
                    //https://www.youtube.com/embed/2dOzolBWARc
                break;
            }
        },
        // listen to internal dialog events.
        hooks:{
            // triggered when the dialog is closed, this is seperate from user defined onclose
            onclose: function(){
                iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}','*');
            },
            // triggered when a dialog option gets update.
            // warning! this will not be triggered for settings updates.
            onupdate: function(option,oldValue, newValue){
                switch(option){
                    case 'resizable':
                        if(newValue){
                            this.elements.content.removeAttribute('style');
                            iframe && iframe.removeAttribute('style');
                        }else{
                            this.elements.content.style.minHeight = 'inherit';
                            iframe && (iframe.style.minHeight = 'inherit');
                        }
                    break;
                }
            }
        }
    };
});
//show the dialog
alertify.YoutubeDialog('dhizIMsl97A').set({frameless:true});
  });

  $('#manual-usuario-all').click(function () {
    alertify.YoutubeDialog || alertify.dialog('YoutubeDialog',function(){
    var iframe;
    return {
        // dialog constructor function, this will be called when the user calls alertify.YoutubeDialog(videoId)
        main:function(videoId){
            //set the videoId setting and return current instance for chaining.
            return this.set({
                'videoId': videoId
            });
        },
        // we only want to override two options (padding and overflow).
        setup:function(){
            return {
                options:{
                    //disable both padding and overflow control.
                    padding : !1,
                    overflow: !1,
                }
            };
        },
        // This will be called once the DOM is ready and will never be invoked again.
        // Here we create the iframe to embed the video.
        build:function(){
            // create the iframe element
            iframe = document.createElement('iframe');
            iframe.frameBorder = "no";
            iframe.width = "100%";
            iframe.height = "100%";
            // add it to the dialog
            this.elements.content.appendChild(iframe);

            //give the dialog initial height (half the screen height).
            this.elements.body.style.minHeight = screen.height * .5 + 'px';
        },
        // dialog custom settings
        settings:{
            videoId:undefined
        },
        // listen and respond to changes in dialog settings.
        settingUpdated:function(key, oldValue, newValue){
            switch(key){
               case 'videoId':
                    iframe.src = "https://www.youtube.com/embed/" + newValue + "?enablejsapi=1";
                    //https://www.youtube.com/embed/2dOzolBWARc
                break;
            }
        },
        // listen to internal dialog events.
        hooks:{
            // triggered when the dialog is closed, this is seperate from user defined onclose
            onclose: function(){
                iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}','*');
            },
            // triggered when a dialog option gets update.
            // warning! this will not be triggered for settings updates.
            onupdate: function(option,oldValue, newValue){
                switch(option){
                    case 'resizable':
                        if(newValue){
                            this.elements.content.removeAttribute('style');
                            iframe && iframe.removeAttribute('style');
                        }else{
                            this.elements.content.style.minHeight = 'inherit';
                            iframe && (iframe.style.minHeight = 'inherit');
                        }
                    break;
                }
            }
        }
    };
});
//show the dialog
alertify.YoutubeDialog('_SP_8AuxRD4').set({frameless:true});
  });
}

function felicitacion()
{
  $.ajax({
    "method" : "POST",
    "url" : "index.php?modo=verificacionFelicitacion",
    "data" : 1
  }).done( function(info) {
    // console.log(info);
    var obj = eval(info);
    var contenidoMod = "";
    if(obj != "")
    {
      if (obj[0]['primerNombre'] != "")
      {
        contenidoMod+='<center><img src="../libs/multimedia/img/design/greeting-cards.gif" alt="image" class="img-responsive img-rounded" /></center><br /><hr /><div style="background:white; margin-right:150px; margin-left:150px;padding:10px; border-radius:10px;"> <ul class="list-group">';

        for (var i = 0; i < obj.length; i++)
        {
          if (obj[i]['idTipoUsuario'] == '1' || obj[i]['idTipoUsuario'] == '2')
          {
            contenidoMod += "<li class='list-group-item efec active' style='cursor:pointer;border: 4px solid white; border-radius:10px;'><h4 class='list-group-item-heading'> <i class='fa fa-envelope'></i> "+obj[i]['contenido']+"</h4><input type='hidden' class='cumpleId' name='cumpleId[]' value='"+obj[i]['idMensaje']+"' /> <p class='list-group-item-text'> <i class='fa fa-user'></i> ("+obj[i]['usuario']+") Administracion  </p> </li>";
          }
          else
          {
            contenidoMod += "<li class='list-group-item efec active' style='cursor:pointer;border: 4px solid white; border-radius:10px;'><h4 class='list-group-item-heading'> <i class='fa fa-envelope'></i> "+obj[i]['contenido']+"</h4><input type='hidden' class='cumpleId' name='cumpleId[]' value='"+obj[i]['idMensaje']+"' /> <p class='list-group-item-text'> <i class='fa fa-user'></i> "+obj[i]['primerNombre']+" "+obj[i]['segundoNombre']+" "+obj[i]['apellidoPaterno']+" "+obj[i]['apellidoMaterno']+" </p> </li>";
          }
        }

        contenidoMod+="</ul></div><hr /><h3><center>Te desea(n) un Feliz Cumpleaños!!</center></h3>";

        alertify.confirm('Felicitaciones', contenidoMod, function(){
          var datos = $('.cumpleId').serialize();
          console.log(datos);
          $.ajax({
            "method" : "POST",
            "url" : "index.php?modo=felicitacionEnd",
            "data" : datos
          }).done(function (info) {
            // $('#respMensajeFin').html(info);  //Crear el div
          });
          alertify.success('Feliz Cumpleaños');
        }
                    , function(){ alertify.error('Feliz Cumpleaños')});
      }
    }


  });
}

function mensajeriaHide()
{
  $('#abrir-mensaje').click(function () {
    $('#abrir-mensaje').hide();
    $('#cerrar-mensaje').show();
    $('#mensajeria-float').css('display','block');
  });
  $('#cerrar-mensaje').click(function () {
    $('#cerrar-mensaje').hide();
    $('#abrir-mensaje').show();
    $('#mensajeria-float').css('display','none');
  });
}

function listoShow()
{
  var ciPrepare = $('#ciPersonalDetalle').val();
  if (ciPrepare != '1')
  {
    $('#listoAll').show();
  }
}

function cargarImagenLogo()
{
  var foto = $('#fotoPerfil').val();
  var res = foto.split("wamp64/www/PersonalUAB/view/")[1];
  if (foto != "") {
    $('.img-fotoPersonal').removeAttr('src');
    $('.img-fotoPersonal').attr('src','../'+res);
  }
}

function visorDocument()
{
  $('.click-titulos').click(function () {
    $("#controls-left").show(1500);
    $("#controls-center").hide(1500);
    $("#titulos").show(1500);
    $("#cursos").hide(1500);
    $("#documentos").hide(1500);
  });
  $('.click-cursos').click(function () {
    $("#controls-left").show(1500);
    $("#controls-center").hide(1500);
    $("#cursos").show(1500);
    $("#titulos").hide(1500);
    $("#documentos").hide(1500);
  });
  $('.click-documentos').click(function () {
    $("#controls-left").show(1500);
    $("#controls-center").hide(1500);
    $("#documentos").show(1500);
    $("#cursos").hide(1500);
    $("#titulos").hide(1500);
  });
}

function inputfecha()
{
  $('.datepicker').keypress(function (key) {
    if (true)
        return false;
  });
}

function inputNumberFloat() {
  $('.solo-numero-float').on('input', function () {
    this.value = this.value.replace(/[^._0-9]/g,'');
  });
}

function inputNumber() {
  $('.solo-numero').on('input', function () {
    this.value = this.value.replace(/[^0-9]/g,'');
  });
}

function inputLetra() {
  $('.solo-letra').keypress(function (key) {
    if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
        && (key.charCode < 65 || key.charCode > 90) //letras minusculas
        && (key.charCode != 45) //retroceso
        && (key.charCode != 241) //ñ
         && (key.charCode != 209) //Ñ
        //  && (key.charCode != 32) //espacio
         && (key.charCode != 225) //á
         && (key.charCode != 233) //é
         && (key.charCode != 237) //í
         && (key.charCode != 243) //ó
         && (key.charCode != 250) //ú
         && (key.charCode != 193) //Á
         && (key.charCode != 201) //É
         && (key.charCode != 205) //Í
         && (key.charCode != 211) //Ó
         && (key.charCode != 218) //Ú
        )
        return false;
  });
}
