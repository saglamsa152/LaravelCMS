<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- content ends -->
	</div><!--/#content.span10-->
<?php } ?>
</div><!--/fluid-row-->
<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>

	<hr>

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<footer>
		<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> <?php echo date('Y') ?></p>
		<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
	</footer>
<?php } ?>

</div><!--/.fluid-container-->

<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
{{ HTML::script('assets/admin/js/jquery-1.7.2.min.js') }}
<!-- jQuery UI -->
{{ HTML::script('assets/admin/js/jquery-ui-1.8.21.custom.min.js') }}
<!-- transition / effect library -->
{{ HTML::script('assets/admin/js/bootstrap-transition.js') }}
<!-- alert enhancer library -->
{{ HTML::script('assets/admin/js/bootstrap-alert.js') }}
<!-- modal / dialog library -->
{{ HTML::script('assets/admin/js/bootstrap-modal.js') }}
<!-- custom dropdown library -->
{{ HTML::script('assets/admin/js/bootstrap-dropdown.js') }}
<!-- scrolspy library -->
{{ HTML::script('assets/admin/js/bootstrap-scrollspy.js') }}
<!-- library for creating tabs -->
{{ HTML::script('assets/admin/js/bootstrap-tab.js') }}
<!-- library for advanced tooltip -->
{{ HTML::script('assets/admin/js/bootstrap-tooltip.js') }}
<!-- popover effect library -->
{{ HTML::script('assets/admin/js/bootstrap-popover.js') }}
<!-- button enhancer library -->
{{ HTML::script('assets/admin/js/bootstrap-button.js') }}
<!-- accordion library (optional, not used in demo) -->
{{ HTML::script('assets/admin/js/bootstrap-collapse.js') }}
<!-- carousel slideshow library (optional, not used in demo) -->
{{ HTML::script('assets/admin/js/bootstrap-carousel.js') }}
<!-- autocomplete library -->
{{ HTML::script('assets/admin/js/bootstrap-typeahead.js') }}
<!-- tour library -->
{{ HTML::script('assets/admin/js/bootstrap-tour.js') }}
<!-- library for cookie management -->
{{ HTML::script('assets/admin/js/jquery.cookie.js') }}
<!-- calander plugin -->
{{ HTML::script('assets/admin/js/fullcalendar.min.js') }}
<!-- data table plugin -->
{{ HTML::script('assets/admin/js/jquery.dataTables.min.js') }}

<!-- chart libraries start -->
{{ HTML::script('assets/admin/js/excanvas.js') }}
{{ HTML::script('assets/admin/js/jquery.flot.min.js') }}
{{ HTML::script('assets/admin/js/jquery.flot.pie.min.js') }}
{{ HTML::script('assets/admin/js/jquery.flot.stack.js') }}
{{ HTML::script('assets/admin/js/jquery.flot.resize.min.js') }}
<!-- chart libraries end -->

<!-- select or dropdown enhancer -->
{{ HTML::script('assets/admin/js/jquery.chosen.min.js') }}
<!-- checkbox, radio, and file input styler -->
{{ HTML::script('assets/admin/js/jquery.uniform.min.js') }}
<!-- plugin for gallery image view -->
{{ HTML::script('assets/admin/js/jquery.colorbox.min.js') }}
<!-- rich text editor library -->
{{ HTML::script('assets/admin/js/jquery.cleditor.min.js') }}
<!-- notification plugin -->
{{ HTML::script('assets/admin/js/jquery.noty.js') }}
<!-- file manager library -->
{{ HTML::script('assets/admin/js/jquery.elfinder.min.js') }}
<!-- star rating plugin -->
{{ HTML::script('assets/admin/js/jquery.raty.min.js') }}
<!-- for iOS style toggle switch -->
{{ HTML::script('assets/admin/js/jquery.iphone.toggle.js') }}
<!-- autogrowing textarea plugin -->
{{ HTML::script('assets/admin/js/jquery.autogrow-textarea.js') }}
<!-- multiple file upload plugin -->
{{ HTML::script('assets/admin/js/jquery.uploadify-3.1.min.js') }}
<!-- history.js for cross-browser state change on ajax -->
{{ HTML::script('assets/admin/js/jquery.history.js') }}
<!-- application script for Charisma demo -->
{{ HTML::script('assets/admin/js/charisma.js') }}

</body>
</html>
