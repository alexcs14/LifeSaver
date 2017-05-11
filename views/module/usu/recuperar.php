  <form class="r-form" action="recover/email" method="post">
    <label>email</label><input type="email" name="email" placeholder="Email" id="recoveremail" required>
    <label>Tipo de documento</label><select required>
      <option value="1">C.C</option>
      <option value="2">T.I</option>
      <option value="3">C.E</option>
    </select>
    <label>Documento de identidad</label><input type="text" name ="documento" placeholder="Documento" id="docu" required>
    <button type="submit" name="button" class="btn btn-default" id="btnRecover">Enviar</button>
  </form>
