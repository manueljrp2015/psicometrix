<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center"><img src="<?= PATH_PUBLIC_IMG."/3e559e16f32c.png" ?>" width="70px"></div>
      <div class="card-body">
        <form id="oauth">
          <div class="form-group">
            <label for="_email">Email</label>
            <input class="form-control" id="_email" name="_email" type="text" aria-describedby="emailHelp" placeholder="Email o usuario">
          </div>
          <div class="form-group">
            <label for="_key">Clave</label>
            <input class="form-control" id="_key" name="_key" type="password" placeholder="Clave">
          </div>
          <div class="form-group">
            </div>
            <div class="form-group">
              <div class="col-md-12 text-center" id="loader">
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="registrate">No tienes cuenta?</a>
            <a class="d-block small" href="recuperar-clave">olvido su clave?</a>
          </div>
           <div class="text-right">
            <a class="btn btn-outline-secondary" id="panel"><i class="fa fa-cogs" aria-hidden="true"></i> Panel</a>
          </div>
        </div>
      </div>
    </div>