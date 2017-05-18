//Validamos que el correo exista

$("#txtpass").focus(function(){
  $("#txtemail").siblings("span").remove();
  var email = $("#txtemail").val();
  $.post("acceso/validar",{email:email},function(data){
          var data = JSON.parse(data);
          if(data[1] == false){
            $("#txtemail").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            $("#btnLogin").attr("disabled",true);
          }else{
            $("#btnLogin").attr("disabled",false);
          }
      })
});



$("#txtemail").focus(function(){
  $(this).siblings("span").remove();
});

// $("#txtemail").keyup(function(){
//   var valor = $("#txtemail").val();
//   alert("Campo: "+valor);
//   $("#txtpass").focus(function(){
//     alert("final"+valor);
//   })
// });

//Usuario creado con exito

$("#crea").submit(function(){
  $.post("crear",function(data){
    if(data == true){
      alert("El usuario ha sido creado con exito, hemos enviado un mensaje a "+email+" para verificar la cuenta");
    }
  })
})

// -- Fin -- //

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



//Inicio de sesion si el usuario existe

$("#frmLogin").submit(function(e){
  e.preventDefault();
  if($(this).parsley().isValid()){
    var email=$("#txtemail").val();
    var pass=$("#txtpass").val();
    $.post("validacion",{email:email, pass:pass},function(data){
      var data = JSON.parse(data);

      if(data[0] == true){
        document.location.href="inicio";
      }else{
        alert(data[1]);
      }
    })
    }
});
// -- Fin -- //
$("#frmRegister").submit(function(){
  alert("Usuario registrado con exito");
})


// Correo existente, Registro



// -- Fin -- //



//-------------------------------------------------PERFIL------------------------------------------//
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
