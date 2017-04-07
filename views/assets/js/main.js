//Validamos que el correo exista

$("#txtpass").focus(function(){
  $("#txtemail").siblings("span").remove();
  var email = $("#txtemail").val();
  $.post("acceso/validar",{email:email},function(data){
          var data = JSON.parse(data);
          $("#txtemail").siblings("label").after("<span class='error'>"+data[0]+"</span>");
          if(data[1] == false){
            $("#btnLogin").attr("disabled",true);
          }else{
            $("#btnLogin").attr("disabled",false);
          }
      })
});

$("#txtemail").focus(function(){
  $(this).siblings("span").remove();
});
// -- Fin -- //


// Validar contraseña (numeros, mayusculas, etc.)

// $("#verify").keyup(function(){
//
//   })
// });

// -- Fin -- //


//Contraseñas diferentes

$("#verify").keyup(function(){
  var pas = $("#password").val();
  var ver = $("#verify").val();
    if(ver != pas){
      var msn = "Las contraseñas no coinciden";
      $("#verify").siblings(".veri").show();
      $("#btnRegister").attr("disabled",true);
    }else{
      $("#verify").siblings(".veri").hide();
      $("#btnRegister").attr("disabled",false);
    }
    $("#verify").siblings("label").after("<span class='error'>"+msn+"</span>").remove()
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
