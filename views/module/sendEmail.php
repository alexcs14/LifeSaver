
    <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST"  >
      <h1> Envio de correos con estilos!! </h1>
      <strong><?php echo $msg;  ?></strong>
      <table>
        <tr>
          <td>Nombre del destinatario: </td>
          <td><input type="text" name="nombre" ></td>
        </tr>
        <tr>
          <td>Email del destinatario</td>
          <td><input type="text" name="email" value=""></td>
        </tr>
        <tr>
          <td>Adjunta archivo</td>
          <td><input type="file" name="adjunto" value=""></td>
        </tr>
        <tr>
          <td>Mensaje</td>
          <td><textarea name="mensaje" cols="30" rows="10"></textarea></td>
        </tr>
      </table>
      <input type="hidden" name="phpmailer" value="">
      <input type="submit" value="Enviar email">
    </form>
