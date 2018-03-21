<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://www.petinsurance.com/images/dog-bone.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Hola, <?= $this->session->userdata("fname") ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navegación</li>
            <li class="treeview">
                <a href="wall">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>