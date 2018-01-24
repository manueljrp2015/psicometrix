<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header text-center"><img src="<?= PATH_PUBLIC_IMG."/3e559e16f32c.png" ?>" width="60px"><br>Panel Administración</div>
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
          <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Intereses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab"  data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" disabled>Registrados</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <br>
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form id="fminte">
                  <div class="form-group">
                    <label for="_inter">Nuevo Interes</label>
                    <input type="text" class="form-control" id="_inter" name="_inter" aria-describedby="emailHelp" placeholder="Interes">
                  </div>
                  <div class="col-md-12 text-center" id="loader">
                  </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Interes</button>
                </form>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Interese</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Interese</th>
                    <th>#</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    foreach ($listinterests as $key => $value) {
                    ?>
                    <tr>
                      <td><?= sprintf("%05d", $value->id) ?></td>
                      <td><?= $value->_interests ?></td>
                      <td style="text-align: center;"><a href="javascript: void(0)" onclick="deleteInterest(<?= $value->id ?>)"  class="btn btn-danger">Eliminar</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                 <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombres</th>
                      <th>Email</th>
                      <th>Creado</th>
                    </tr>
                  </thead>
                  <tfoot>
                  <tr>
                    <th>Nombres</th>
                     <th>Email</th>
                      <th>Creado</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    foreach ($listregister as $key => $value) {
                    ?>
                    <tr>
                      <td><?= $value->_firtsname." ".$value->_lastname ?></td>
                      <td style="text-align: right;"><?= $value->_email ?></td>
                      <td style="text-align: center;"><?= $value->_createAt ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>