
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; <?= date("Y") ?> <a href="http://psicometrix.org/">Psicometrix</a>.</strong> Todos los derechos reservados.
</footer>
</div>


<script src="<?= PATH_PUBLIC_PLUGINS."/bootstrap/dist/js/bootstrap.min.js" ?>"></script>
<script src="<?= PATH_PUBLIC_PLUGINS."/jquery-slimscroll/jquery.slimscroll.min.js" ?>"></script>
<script src="<?= PATH_PUBLIC_PLUGINS."/fastclick/lib/fastclick.js" ?>"></script>
<script src="<?= PATH_PUBLIC_JS."/adminlte.min.js" ?>"></script>
<script src="<?= PATH_PUBLIC_JS."/demo.js" ?>"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
</body>
</html>
