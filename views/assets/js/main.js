//---------------CREAR USUARIO
$("#frm_registrar").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()){
    jsonObj = [];
    $("input[name=data]").each(function(){
      structure = {}
      structure = $(this).val();
      jsonObj.push(structure);
    });
  $.post("crear",{datauser:jsonObj},function(data){
    var data = JSON.parse(data);
    if (data[0]==true) {
      document.location.href=data[1];
    }else{
      alert(data[1]);
    }
  });
  }
});
//-------------------- VALIDAR QUE EL CORREO NO EXISTA EN USUARIO

$("#pas_registro").focus(function(){
  $("#ema_registro").siblings("span").remove();
  var email = $("#ema_registro").val();
  $.post("validar-email",{email:email},function(data){
          var data = JSON.parse(data);
          if(data[0] == false){
            $("#ema_registro").siblings("label").after("<span class='error'>"+data[1]+"</span>");
            $("#btn_registrar").attr("disabled",true);
          }else{
            $("#btn_registrar").attr("disabled",false);
          }
      })
});



$("#ema_registro").focus(function(){
  $(this).siblings("span").remove();
  $("#btn_registrar").attr("disabled",false);
});
//-------------------- VALIDAMOS QUE EL CORREO EXISTA PARA LOGUEARSE
$("#pas_login").focus(function(){
  $("#ema_login").siblings("span").remove();
  var email = $("#ema_login").val();
  $.post("validar-usuario",{email:email},function(data){
    var data = JSON.parse(data);
    if(data[0] == false){
      $("#ema_login").siblings("label").after("<span class='error'>"+data[1]+"</span>");
      $("#btn_login").attr("disabled",true);
    }else{
      $("#btn_login").attr("disabled",false);
    }
  })
});



$("#ema_login").focus(function(){
  $(this).siblings("span").remove();
  $("#btn_login").attr("disabled",false);
});

//---------------------------- LOGUEO

$("#frm_login").submit(function(e){
  e.preventDefault();
  if($(this).parsley().isValid()){
    var datalogin=[$("#ema_login").val(),
    $("#pas_login").val()];
    $.post("login",{datalogin:datalogin},function(data){
      var data = JSON.parse(data);

      if(data[0] == true){
        document.location.href=data[1];
        localStorage.setItem("Esto no es un token",data[2]);
      }else{
        alert(data[1]);
      }
    });
  }
});

// $("#txtemail").keyup(function(){
//   var valor = $("#txtemail").val();
//   alert("Campo: "+valor);
//   $("#txtpass").focus(function(){
//     alert("final"+valor);
//   })
// });


//Correo existente - Registro

$("#password").focus(function(){
  var email = $("#emailRegis").val();
  $.post("valCorreo",{email:email},function(data){
    var data = JSON.parse(data);
    $("#emailRegis").after("<span class='exis'>"+data[0]+"</span>");
    if(data[1] == false){
      $("span.exis").show();
      $("btnRegister").attr("disabled",true);
    }else{
      $("span.exis").hide();
      $("btnRegister").attr("disabled",false);
    }
  })
})

// -- Fin -- //

// -- Fin -- //


// Validar contraseña (numeros, mayusculas, etc.)

$("#password").keyup(function(){
  var data = $("#password").val();
  var cant = data.length;
  if((cant<8)||(cant>16)){
    $("#password").siblings("span.error").show();
    $("#btnRegister").attr("disabled",true);
  }else{
    $("#password").siblings("span.error").hide();
    $("#btnRegister").attr("disabled",false);
  }
  $("#password").siblings(".pas").after("<span class='error'>La contraseña debe ser mayor de 8 y menor a 16 caracteres</span>").remove();
});
// -- Fin -- //

//Contraseñas diferentes
$("#verify").keyup(function(){
  var pas = $("#password").val();
  var ver = $("#verify").val();
    if(ver != pas){
      var msn = "Las contraseñas no coinciden";
      $("#verify").siblings("span.error2").show();
      $("#btnRegister").attr("disabled",true);
    }else{
      $("#verify").siblings("span.error2").hide();
      $("#btnRegister").attr("disabled",false);
    }
    $("#verify").siblings(".veri").after("<span class='error2'>"+msn+"</span>").remove()
  });
  // -- Fin -- //






//Recuperar contraseña - email

// $("#btnRecover").mouseenter(function(){
//   $.post("emailreco",function(data){
//     var ver = JSON.parse(data);
//     if(ver[1] == false){
//       alert(data[0]);
//       $("#btnRecover").attr("disabled",true);
//     }else{
//       $("#btnRecover").attr("disabled",false)
//     }
//   })
// })

//email
$("#docu").focus(function(){
  var email=$("#recoveremail").val();
  $.post("recover/email",{email:email},function(data){
    $("span.error").remove();
    var verify = JSON.parse(data);
    $("#recoveremail").after("<span class='error'>"+verify[0]+"</span>");
    if(verify[1]==false){
      $("span.error").show();
      $("#btnRecover").attr("disabled",true);
    }else{
      $("span.error").hide();
      $("#btnRecover").attr("disabled",false);
    }
  })
})


//Mensaje
$("#formreco").submit(function(){
  var email = $("#recoveremail").val();
  $.post("enviar",{email:email},function(data){
    document.location.href = "login";
    alert("Hemos enviado un mensaje a: "+email+" para verificar la cuenta");
  })
})

// -- fin -- //

//documento
// $("#docu").focus(function(){
//   var email=$("#recoveremail").val();
//   var documento = $("#docu").val();
//   $.post("recover/email",{email:email,documento:documento},function(data){
//     $("span.error").remove();
//     var verify = JSON.parse(data);
//     $("#recoveremail").after("<span class='error'>"+verify[0]+"</span>");
//     if(verify[1]==false){
//       $("span.error").show();
//       $("#btnRecover").attr("disabled",true);
//     }else{
//       $("span.error").hide();
//       $("#btnRecover").attr("disabled",false);
//     }
//   })
// })
// -- fin -- //

//nueva Contraseña

$("#newpass").keyup(function(){
  var password = $("#pass").val();
  var nueva = $("#newpass").val();
  $("span.error").remove();
  if(password != nueva){
    $("span.error").show();
    $("#newpass").after("<span class='error'>Las contraseñas no coinciden</span>");
    $("#buttonnew").attr("disabled",true);
  }else{
    $("span.error").hide();
    $("#buttonnew").attr("disabled",false);
  }
});

//nueva contraseña
$("#pass").keyup(function(){
  $("span.error").remove();
  var password = $("#pass").val();
  var tamaño = password.length;
  if((tamaño<8)|(tamaño>16)){
    $("span.error").show();
    $("#pass").after("<span class='error'>La contraseña debe tener entre 8 y 16 caracteres</span>");
    $("#buttonnew").attr("disabled",true);
  }else{
    $("span.error").hide();
    $("buttonnew").attr("disabled",false);
  }
})

$(function() {
    var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}

	var accordion = new Accordion($('#accordion'), false);
});

//Verificar email
$("#pass").focus(function(){
  $("span.error").remove();
  var email = $("#emailre").val();
  $.post("change",{email:email},function(data){
    var data = JSON.parse(data);
    if(data[1] == false){
      $("span.error").show();
      $("#emailre").after("<span class='error'>"+data[0]+"</span>");
      $("#buttonnew").attr("disabled",true);
    }else{
      $("span.error").hide();
      $("#buttonnew").attr("disabled",false);
    }
  })
})




//------------------------------------PANTALLA PRINCIPAL USUARIO---------------------------------//

$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});


//-======================================Contacto========================================//

function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}


// ================================Transición Completar Perfil===============================//

var completar2 = document.getElementById('completar2');
var completar3 = document.getElementById('completar3');

function abrircompletar2() {
  this.completar2.style.transform = "translateX(450px)";
  this.completar2.style.transition = "0.5s";
}
function abrircompletar3() {
  this.completar3.style.transform = "translateX(450px)";
  this.completar3.style.transition = "0.5s";
}
