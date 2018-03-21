
<link rel="stylesheet" href="<?= PATH_PUBLIC_PLUGINS . "/select2/css/select2.min.css" ?>">
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Perfil
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="wall"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Perfil</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Actualiza tus datos!</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form role="form" id="fmprofiles">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="_fname">Nombre</label>
                                    <input class="form-control" id="_fname" name="_fname" placeholder="Nombre"
                                           type="text" value="<?= ucwords($this->session->userdata("fname")) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="_lname">Apellido</label>
                                    <input class="form-control" id="_lname" name="_lname" placeholder="Apellido"
                                           type="text" value="<?= ucwords($this->session->userdata("lname")) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="_email">Email</label>
                                    <input class="form-control" id="_email" name="_email" placeholder="Email"
                                           type="email" value="<?= $this->session->userdata("email") ?>">
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="_email">Cuando Cumples?</label>
                                            <input class="form-control" id="_email" name="_email" placeholder="Email"
                                                   type="email" value="<?= $this->session->userdata("email") ?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Genero?</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">Hombre</option>
                                                <option>Mujer</option>
                                                <option>Transgenero</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="_country">De que pais eres?</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                <?php

                                                foreach ($getCountry as $key => $country):
                                                ?>
                                                <option selected="selected" value="<?= $country->id ?>"><?= $country->_country ?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <dt>Quieres Comprtir tus redes sociales?</dt>

                                <div class="form-group">
                                    <label for="_facebook">Facebook</label>
                                    <input class="form-control" id="_facebook" name="_facebook" placeholder="Apellido"
                                           type="text" value="">
                                </div>

                                <div class="form-group">
                                    <label for="_instagram">Instagram</label>
                                    <input class="form-control" id="_instagram" name="_instagram" placeholder="Apellido"
                                           type="text" value="">
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cambia tu Clave!</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form role="form" id="fmrenewpass">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="_key">Clave anterior</label>
                                    <input class="form-control" id="_key" name="_key" placeholder="Clave anterior"
                                           type="password">
                                </div>
                                <div class="form-group">
                                    <label for="_nkey">Nueva Clave</label>
                                    <input class="form-control" id="_nkey" name="_nkey" placeholder="Nueva Clave"
                                           type="password">
                                </div>
                                <div class="form-group">
                                    <label for="_rkey">Repita Clave</label>
                                    <input class="form-control" id="_rkey" name="_rkey" placeholder="Repita Clave"
                                           type="password">
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>

        <script src="<?= PATH_PUBLIC_JS . "/app/app.profile.js" ?>"></script>
    </section>
</div>