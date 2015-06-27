
<!-- jQuery UI 1.10.3 -->
<?=Html::script('assets/admin/js/jquery-ui-1.10.3.min.js')?>
<!-- Bootstrap -->
<?=Html::script('assets/admin/js/bootstrap.min.js')?>
<!-- Morris.js charts -->
<?=Html::script('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')?>
<?=Html::script('assets/admin/js/plugins/morris/morris.min.js')?>
<!-- Sparkline -->
<?=Html::script('assets/admin/js/plugins/sparkline/jquery.sparkline.min.js')?>
<!-- jvectormap -->
<?=Html::script('assets/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>
<?=Html::script('assets/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>
<!-- fullCalendar -->
<?=Html::script('assets/admin/js/plugins/fullcalendar/lib/moment.min.js')?>
<?=Html::script('assets/admin/js/plugins/fullcalendar/fullcalendar.min.js')?>
<?=Html::script('assets/admin/js/plugins/fullcalendar/lang-all.js')?>
<!-- jQuery Knob Chart -->
<?=Html::script('assets/admin/js/plugins/jqueryKnob/jquery.knob.js')?>
<!-- daterangepicker -->
<?=Html::script('assets/admin/js/plugins/daterangepicker/daterangepicker.js')?>
<!-- Bootstrap WYSIHTML5 -->
<?=Html::script('assets/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>
<!-- iCheck -->
<?=Html::script('assets/admin/js/plugins/iCheck/icheck.min.js')?>
<!-- DATA TABES SCRIPT -->
<?=Html::script('assets/admin/js/plugins/datatables/jquery.dataTables.min.js')?>
<?=Html::script('assets/admin/js/plugins/datatables/dataTables.bootstrap.js')?>
<!-- CK Editor -->
<?=Html::script('assets/admin/js/plugins/ckeditor/ckeditor.js')?>
<!--TinyMCE -->
<?=Html::script('assets/admin/js/plugins/tinymce/tinymce.min.js')?>
<!-- InputMask -->
<?=Html::script('assets/admin/js/plugins/input-mask/jquery.inputmask.js')?>
<?=Html::script('assets/admin/js/plugins/input-mask/jquery.inputmask.date.extensions.js')?>
<?=Html::script('assets/admin/js/plugins/input-mask/jquery.inputmask.extensions.js')?>
<!-- slimScroll -->
<?=Html::script('assets/admin/js/plugins/slimScroll/jquery.slimscroll.min.js')?>
<!-- mini-upload-form (assets/admin/js/plugins) -->

	<!-- jQuery File Upload Dependencies -->
	<?=Html::script('assets/admin/js/plugins/mini-upload-form/assets/js/jquery.ui.widget.js')?>
	<?=Html::script('assets/admin/js/plugins/mini-upload-form/assets/js/jquery.iframe-transport.js')?>
	<?=Html::script('assets/admin/js/plugins/jquery-file-upload/js/jquery.fileupload.js')?>

	<!-- Our main JS file -->
	<?=Html::script('assets/admin/js/plugins/mini-upload-form/assets/js/script.js')?>
<!--/ mini-upload-form (assets/admin/js/plugins) -->
<!-- Custom Js-->
<?=Html::script('assets/admin/js/custom.js')?>
<?=Html::script('assets/admin/js/gettext.php')?>
<?=Html::script('assets/admin/js/ajax.js')?>

<!-- Typeahead -->
<?=Html::script('assets/admin/js/plugins/typeahead/bloodhound.min.js')?>
<?=Html::script('assets/admin/js/plugins/typeahead/typeahead.jquery.js')?>
<!-- /Typeahead -->
<!-- AdminLTE App -->
<?=Html::script('assets/admin/js/AdminLTE/app.js')?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) todo Silinecek -->
<?=Html::script('assets/admin/js/AdminLTE/dashboard.js')?>

<!-- ajax post işlemlerinde csrf işlemi otomatik yapılacak -->
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>