<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header text-center"><img src="<?= PATH_PUBLIC_IMG."/3e559e16f32c.png" ?>" width="60px"><br>Juego de Intereses</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <strong>
            Hola, <?= $this->session->userdata("fname") ?>
            <input type="hidden" value="<?= $this->session->userdata("id") ?>" id="hidden-u">
            </strong>
          </div>
          <div class="col-md-4 text-right">
            <a href="shutdown/session" class="btn btn-outline-dark"><i class="fa fa-lock" aria-hidden="true"></i> Cerrar</a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-4">
            <strong>Cuales son tu intereses?</strong>
            <br>
            <form id="fminterest">
              <?php
              $i = 1;
              foreach ($listinterests as $key => $value) {
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?= $value->id ?>" id="_interest<?= $i ?>" name="_interest[]">
                <label class="form-check-label" for="_interest<?= $i ?>">
                  <?= $value->_interests ?>
                </label>
              </div>
              <?php
              $i++;
              }
              ?>
              <div class="form-group" style="margin-top: 15px;">
                <button type="submit" class="btn btn-outline-primary btn-block" id="cl"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
              </div>
              <div class="form-group">
                <div class="col-md-12 text-center" id="loader">
                </div>
              </div>
            </div>
          </form>
          <div class="col-8">
            <div class="card mb-3">
              <div class="card-header">
              <i class="fa fa-bell-o"></i>Tus intereses</div>
              <div class="list-group list-group-flush small ">
                <a class="list-group-item list-group-item-action" href="#">
                  <div class="media">
                    <div class="media-body itemsi">
                      
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="card mb-3">
              <div class="card-header">
              <i class="fa fa-bell-o"></i> Ellos Comparten intereses contigo</div>
              <div class="list-group list-group-flush small items">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>