<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/admin_assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/admin_assets/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin_assets/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/admin_assets/dist/js/demo.js');?>"></script>
<script src="<?php echo base_url('assets/admin_assets/operations.js');?>"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>