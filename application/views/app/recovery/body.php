
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center"><img src="<?= PATH_PUBLIC_IMG."/3e559e16f32c.png" ?>" width="70px"><br>Recuperar Clave</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>olvido su clave?</h4>
          <p>Ingrese su dirección de correo electrónico y le enviaremos instrucciones sobre cómo restablecer su contraseña.</p>
        </div>
        <form id="fmrecovery">
          <div class="form-group">
            <input class="form-control" id="_email" name="_email" type="email" aria-describedby="emailHelp" placeholder="Ingrese Email">
          </div>
          <div class="form-group">
              <div class="col-md-12 text-center" id="loader">
              </div>
            </div>
          <button type="submit" class="btn btn-primary btn-block">Recuperar Clave</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="registrate">No tienes cuenta?</a>
          <a class="d-block small" href="welcome">Ingresar</a>
        </div>
      </div>
    </div>
  </div>