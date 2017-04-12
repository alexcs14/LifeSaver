<form action="crear" method="post" data-parsley-validate>
  <h2>Nombres</h2><input type="text" name="data[]" placeholder="Ingrese su nombre" required>
  <h2>Apellidos</h2><input type="text" name="data[]" placeholder="Ingrese sus apellidos" required>
  <h2>Tipo documento </h2>
  <select name="data[]" required>
    <option value="1">C.C</option>
    <option value="2">T.I</option>
    <option value="3">C.E</option>
  </select>
  <h2>Documento de identidad</h2><input type="text" name="data[]" placeholder="# documento" required>
  <h2>Email</h2><input type="email" name="data[]" placeholder="Email" required>
  <h2>Contraseña</h2><input type="password" name="data[]" placeholder="Contraseña" required>
  <h2>Verificar contraseña</h2><input type="password" name="ver" placeholder="Repetir contraseña" required>
  <h2>Sexo</h2>
  <input type="radio" name="data[]" value="1" required>Hombre
  <input type="radio" name="data[]" value="2" required>Mujer
  <button type="submit" name="button">Registrar</button>
</form>
