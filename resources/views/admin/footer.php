<!-- jQuery UI 1.11.2 -->
<?=Html::script('http://code.jquery.com/ui/1.11.2/jquery-ui.min.js')?>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
<?=Html::script('assets/bootstrap/js/bootstrap.min.js')?>
<!-- Morris.js charts  KALDIRILDI
<?=Html::script('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')?>
<?=Html::script('assets/admin/plugins/morris/morris.min.js')?>
-->
<!-- Sparkline -->
<?=Html::script('assets/admin/plugins/sparkline/jquery.sparkline.min.js')?>
<!-- jvectormap -->
<?=Html::script('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>
<?=Html::script('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>
<!-- jQuery Knob Chart -->
<?=Html::script('assets/admin/plugins/jqueryKnob/jquery.knob.js')?>
<!-- daterangepicker -->
<?=Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js')?>
<?=Html::script('assets/admin/plugins/daterangepicker/daterangepicker.js')?>
<!-- datepicker -->
<?=Html::script('assets/admin/plugins/datepicker/bootstrap-datepicker.js')?>
<!-- Slimscroll -->
<?=Html::script('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')?>
<!-- FastClick -->
<?=Html::script('assets/admin/plugins/fastclick/fastclick.min.js')?>
<!-- AdminLTE App -->
<?=Html::script('assets/admin/js/app.min.js')?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) todo Silinecek -->
<?=Html::script('assets/admin/js/pages/dashboard.js')?>

<!-- AdminLTE for demo purposes -->
<?=Html::script('assets/admin/js/demo.js')?>

<!-- fullCalendar -->
<?=Html::script('assets/admin/plugins/fullcalendar/lib/moment.min.js')?>
<?=Html::script('assets/admin/plugins/fullcalendar/fullcalendar.min.js')?>
<?=Html::script('assets/admin/plugins/fullcalendar/lang-all.js')?>
<!-- iCheck -->
<?=Html::script('assets/admin/plugins/iCheck/icheck.min.js')?>
<!-- DATA TABES SCRIPT -->
<?=Html::script('assets/admin/plugins/datatables/jquery.dataTables.min.js')?>
<?=Html::script('assets/admin/plugins/datatables/dataTables.bootstrap.js')?>
<!-- CK Editor -->
<?=Html::script('assets/admin/plugins/ckeditor/ckeditor.js')?>
<!-- InputMask -->
<?=Html::script('assets/admin/plugins/input-mask/jquery.inputmask.js')?>
<?=Html::script('assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')?>
<?=Html::script('assets/admin/plugins/input-mask/jquery.inputmask.extensions.js')?>

<!-- mini-upload-form (assets/admin/js/plugins) -->

	<!-- jQuery File Upload Dependencies -->
	<?=Html::script('assets/admin/plugins/mini-upload-form/assets/js/jquery.ui.widget.js')?>
	<?=Html::script('assets/admin/plugins/mini-upload-form/assets/js/jquery.iframe-transport.js')?>
	<?=Html::script('assets/admin/plugins/jquery-file-upload/js/jquery.fileupload.js')?>

	<!-- Our main JS file -->
	<?=Html::script('assets/admin/plugins/mini-upload-form/assets/js/script.js')?>
<!--/ mini-upload-form (assets/admin/js/plugins) -->
<!-- Custom Js-->
<?=Html::script('assets/admin/js/custom.js')?>
<?=Html::script('assets/admin/js/gettext.php')?>
<?=Html::script('assets/admin/js/ajax.js')?>

<!-- Typeahead -->
<?=Html::script('assets/admin/plugins/typeahead/bloodhound.min.js')?>
<?=Html::script('assets/admin/plugins/typeahead/typeahead.jquery.js')?>
<!-- /Typeahead -->

<!-- ajax post işlemlerinde csrf işlemi otomatik yapılacak -->
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>