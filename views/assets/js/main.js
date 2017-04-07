//Validamos que el correo exista

$("#txtpass").focus(function(){
  $("#txtemail").siblings("span").remove();
  var email = $("#txtemail").val();
  $.post("index.php?c=usu&a=validar",{email:email},function(data){
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


$("#password").keyup(function(){
  regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,18}[^'\s]/
});

//Contraseñas diferentes

$("#verify").keyup(function(){
  var pas = $("#password").val();
  var ver = $("#verify").val();
    if(ver != pas){
      var msn = "Las contraseñas no coinciden";
      $("#verify").siblings("span").show();
      $("#btnRegister").attr("disabled",true);
    }else{
      $("#verify").siblings("span").hide();
      $("#btnRegister").attr("disabled",false);
    }
    $("#verify").siblings("label").after("<span class='error'>"+msn+"</span>").remove()
  });

//Inicio de sesion si el usuario existe

$("#frmLogin").submit(function(e){
  e.preventDefault();
  if($(this).parsley().isValid()){
    var email=$("#txtemail").val();
    var pass=$("#txtpass").val();
    $.post("index.php?c=usu&a=userAut",{email:email, pass:pass},function(data){
      var data = JSON.parse(data);

      if(data[0] == true){
        document.location.href="index.php?c=main&a=inicio";
      }else{
        alert(data[1]);
      }
    })
    }
});
