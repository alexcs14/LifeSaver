<div class="top-content7 col-xs-12 col-sm-12 col-md-7 col-lg-8" id="completar3">
  <h2 class="login">Completa tu perfil</h2>
  <div class="col-sm-5 col-sm-offset-1 completar-perfil-3" >
    <form role="form" action="crear" method="post" id="completar" class="r-form">
      <h3 class="text-justify info-title">Información Médica</h3>

        <label class="text-justify">¿Cuenta con carnet de afiliación médica? </label>
          <button type="button" id="si"class="btn btn-info col-lg-2 col-md-2 col-sm-2" data-toggle="modal" data-target="#myModal">SI</button>
          <button type="button" id="no"class="btn btn-info col-lg-2 col-md-2 col-sm-2">NO</button>

      <div class="button-gay col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button type="submit" name="button" id="btnCompletar" class="btn btn-primary completar3 col-lg-6 col-md-6 col-sm-6" >TERMINAR <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
      </div>
    </form>
  </div>
</div>

<!-- Ventana Modal-->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Ingrese el número carnet.</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="sr-only">Número</label>
          <input type="text" class="r-form-Usuario form-control altura" name="data[]" id="" placeholder="Número del carnet." required>
          <button type="submit" name="button" class="btn btn-primary guardar-numero col-lg-4 col-md-4 col-sm-4" > Guardar</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>
</div>
<!--
<div class="col-sm-5 col-sm-offset-1">
  <form role="form" action="crear" method="post" id="completar" class="r-form">
    <h3 class="text-justify info-title">Información Médica</h3>
    <div class="form-group">
      <label class="text-justify">¿Cuenta con carnet de afiliación médica? </label>
      <label for="yes" id="yes" class="radio-inline">
        <input type="checkbox"  name="" required> Si
      </label>
      <label for="no" id="no" class="radio-inline wthree">
        <input type="checkbox" name=""> No
      </label>
    </div>
    <button type="submit" name="button" id="btnCompletar" class="btn btn-primary completar3" >TERMINAR <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
  </form>
</div>
-->
