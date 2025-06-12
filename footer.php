<footer class="main-footer">
  <div class="pull-right hidden-xs">
  </div>
  <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">Aplikasi Perminyakan</a>.</strong> All rights reserved.
</footer>
<div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
<!-- include summernote css/js-->
<style>
    table{background:#fff;}
</style>
<script src="<?php echo $baseUrl;?>/themes/js/app.min.js"></script>
<script>
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip(); // Aktifkan semua tooltip
  $('.datepicker').datepicker({          // Aktifkan datepicker
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
});
</script>

  </body>
</html>
    