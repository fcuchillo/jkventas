<html>
<?php
//if (isset($this->session->userdata["session_user"])) {
//    redirect('login/authentication','refresh');
//}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ENDES | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Session</p>
    <!--<form action="Usuario/login" method="POST" name="frmLogeoUsuario">-->
    <form action="Encuesta/Cobertura/index" method="POST" name="frmLogeoUsuario">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" required="true" value=""><span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Contraseña" name="clave" id="clave" required="true" value=""><span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Aceptar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="assets/content/js/sha1.js"></script>
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });

  function acceder() {
    var tokenPass = sha1(<?=$this->session->userdata['tokenSession']['tokenSessionPass']; ?> + $('#clave').val());
    $('#clave').val(tokenPass);
    return true;
  }

</script>
</body>
</html>
