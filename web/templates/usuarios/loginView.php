<?php require_once 'web/over/header.php'?>

  <body class="text-center" style="background-image: url(web/img/arquitectura.jpg);width:100%;background-repeat:no-repeat;background-size:cover;backgrount-position:center center">

      <div class="error_login">
            Usuario o password equivocados
      </div>


      <div class="card fijo" style="width: 400px;margin:100px auto; -webkit-box-shadow: 0px 0px 39px -8px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 39px -8px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 39px -8px rgba(0,0,0,0.75);">
        <div class="card-body">
            <img src="web/img/logo.png" style="padding:30px;width:200px">
           <form class="form-signin" action="" id="formlg">
              <label for="inputEmail" class="sr-only">Usuario</label>
              <input type="text" id="inputEmail" class="form-control" placeholder="Email address" name="usuario" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
              <div class="checkbox mb-3">
              </div>
              <input class="btn btn-lg btn-primary btn-block" type="submit" id="btn-login" value="login">
              <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
            </form>
        </div>
      </div>


      <script src="web/ajax/login/login.js"></script>
      <script src="web/ajax/login/pruebas.js"></script>

  </body>
</html>
