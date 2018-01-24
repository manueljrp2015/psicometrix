
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header text-center"><img src="<?= PATH_PUBLIC_IMG."/3e559e16f32c.png" ?>" width="60px"><br>Registrate</div>
      <div class="card-body">
        <form id="fmregister">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="_fname">Nombres</label>
                <input class="form-control" id="_fname" name="_fname" type="text" aria-describedby="nameHelp" placeholder="Nombres">
              </div>
              <div class="col-md-6">
                <label for="_lname">Apellidos</label>
                <input class="form-control" id="_lname" name="_lname" type="text" aria-describedby="nameHelp" placeholder="Apellidos">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="_email">Email</label>
            <input class="form-control" id="_email" name="_email" type="email" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="_k2">Clave</label>
                <input class="form-control" id="_k1" name="_k1" type="password" placeholder="Clave">
              </div>
              <div class="col-md-6">
                <label for="_k2">Repita Clave</label>
                <input class="form-control" id="_k2" name="_k2" type="password" placeholder="Repita Clave">
              </div>
              <div class="col-md-12 text-center" id="loader">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Registrese</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="welcome">Ingresar</a>
          <a class="d-block small" href="recuperar-clave">olvido su clave?</a>
        </div>
      </div>
    </div>
  </div>