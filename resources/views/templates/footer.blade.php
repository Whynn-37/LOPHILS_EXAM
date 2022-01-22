<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#">Terry.io</a>.</strong> All rights
    reserved.
</footer>

<script src="../node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
<script src="../node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/admin-lte/dist/js/adminlte.min.js"></script>
<script src="../node_modules/admin-lte/dist/js/demo.js"></script>
<script src="../node_modules/axios/dist/axios.min.js"></script>
<script src="../node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../node_modules/admin-lte/plugins/toastr/toastr.min.js"></script>
<script>
    const _TOKEN = $('#csrf-token').attr('content');
    var base_url = "{{ url('/') }}";
</script>