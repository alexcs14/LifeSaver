<form id ="crea" action="crear" method="post" data-parsley-validate>
  <h3>Nombres</h3><input type="text" name="data[]" placeholder="Ingrese su nombre" required>
  <h3>Apellidos</h3><input type="text" name="data[]" placeholder="Ingrese sus apellidos" required>
  <h3>Tipo documento </h3>
  <select name="data[]" required>
    <option value="1">C.C</option>
    <option value="2">T.I</option>
    <option value="3">C.E</option>
  </select>
  <h3>Documento de identidad</h3><input type="text" name="data[]" placeholder="# documento" required>
  <h3>Email</h3><input type="email" name="data[]" placeholder="Email" id="emailRegis" required>
  <h3>Contraseña</h3><input type="password" name="data[]" placeholder="Contraseña" id="password" required>
  <label for="password" class="pas"></label>
  <h3>Verificar contraseña</h3><input type="password" name="ver" placeholder="Repetir contraseña" id="verify" required>
  <label for="verify" class="veri"></label>
  <h3>Fecha de nacimiento</h3><input type="date" name="data[]">
  <h3>Sexo</h3>
  <input type="radio" name="data[]" value="1" required>Hombre
  <input type="radio" name="data[]" value="2" required>Mujer
  <button type="submit" name="button" class="btn btn-default" id="btnRegister">Registrar</button>
</form>
<a href="login" class="btn btn-default">Atras</a>
