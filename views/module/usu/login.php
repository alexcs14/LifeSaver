<div class="container">
  <h2>INICIAR SESION</h2>
  <form action="inicio" method="post" id="frmLogin" data-parsley-validate>
    <p>
      BIENVENIDO
    </p>
    <div class="">
      <input class="center" type="email" class="validate" name="data[]" id="txtemail" placeholder="Email" required>
      <label for="txtemail"></label>
    </div>
    <div class="">
      <input class="center" type="password" class="validate" name="data[]" id="txtpass" placeholder="Contraseña" required>
      <label for="txtpass"></label>
    </div>
    <a href="recover">¿Olvidaste tu contraseña?</a><br>
    <button type="submit" name="button" id="btnLogin" class="btn btn-primary" style="margin: 15px;">INICIAR SESION</button>
  </form>
  <a href="registro">Registrarse</a>
</div>
