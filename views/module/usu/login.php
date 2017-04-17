<div class="top-content">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 text">
        <h1>LifeSaver</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 show-forms">
        <span class="show-register-form active">Iniciar Sesión</span>
      </div>
    </div>
    <div class="row register-form">
      <div class="col-sm-4 col-sm-offset-1">
        <form role="form" action="inicio" method="post" id="frmLogin" class="r-form" data-parsley-validate>
          <div class="form-group">
            <label class="sr-only">Usuario</label>
            <input type="email" class="r-form-Usuario form-control" name="data[]" id="txtemail" placeholder="Email" required>
            <label for="txtemail"></label>
          </div>
          <div class="form-group">
            <label class="sr-only">Contraseña</label>
            <input type="password" class="r-form-Contraseña form-control" name="data[]" id="txtpass" placeholder="Contraseña" required>
            <label for="txtpass"></label>
          </div>
          <button type="submit" name="button" id="btnLogin" class="btn btn-primary" style="margin: 15px;">INICIAR SESION</button>
        </form>
        <a href="recover">¿Olvidaste tu contraseña?</a><br>
        <div class="form-group">
          <span>¿No posees cuenta?</span><a href="registro">Registrarse aquí</a>
        </div>
      </div>
      <div class="col-sm-6 forms-right-icons">
        <div class="row">
          <div class="col-sm-10">
            <h3>Acá va un texto que todavia no se me ocurre :v</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
