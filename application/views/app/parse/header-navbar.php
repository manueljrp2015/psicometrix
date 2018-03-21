<header class="main-header">
    <a href="../../index2.html" class="logo">
        <span class="logo-mini"><b>P</b>TX</span>
        <span class="logo-lg"><b>Psico</b>Metrix</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="https://www.petinsurance.com/images/dog-bone.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= ucwords($this->session->userdata("fname")." ".$this->session->userdata("lname")) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="https://www.petinsurance.com/images/dog-bone.png" class="img-circle" alt="User Image">

                            <p>
                                <?= ucwords($this->session->userdata("fname")." ".$this->session->userdata("lname")) ?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="profile" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="shutdown/session" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>