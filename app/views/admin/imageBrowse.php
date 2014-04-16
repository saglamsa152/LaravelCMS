<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<!--Mini ajax file upload -->
	<?= HTML::style( 'assets/admin/css/mini-ajax-upload-style.css' ) ?>
	<?= HTML::style( 'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' ) ?>
	<!--/Mini Ajax file upload-->
	<?= HTML::script( 'assets/admin/js/jquery-1.7.2.min.js' ) ?>
</head>

<body class="content">
<?php
// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'];
// Optional: instance name (might be used to load a specific configuration file or anything else).
$CKEditor = $_GET['CKEditor'];
// Optional: might be used to provide localized messages.
$langCode = $_GET['langCode'];

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
$url = URL::to( 'uploads/1397596570_548156_4615489031879_1919016353_n.jpg.jpg' );
// Usually you will only assign something here if the file could not be uploaded.
$message = '';

echo "<script type='text/javascript'>function tmm(){window.opener.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');}</script>";
?>

<?php echo Form::open( array(
		'role'    => 'form',
		'method'  => 'post',
		'action'  => 'AdminController@postMiniAjaxUpload',
		'id'      => 'upload',
		'enctype' => 'multipart/form-data'

) )?>

<div id="drop">
	Drop Here

	<a>Browse</a>
	<?php echo Form::file( 'upl', array( 'multiple' ) ) ?>
</div>

<ul>
	<!-- The file uploads will be shown here -->
</ul>

<?php echo Form::close() ?>
<button onclick="tmm()">Tamam</button>

<!-- Mini Ajax file upload-->
<!-- JavaScript Includes -->
<?= HTML::script( 'assets/admin/js/jquery.knob.js' ) ?>

<!-- jQuery File Upload Dependencies -->
<?= HTML::script( 'assets/admin/js/jquery.ui.widget.js' ) ?>
<?= HTML::script( 'assets/admin/js/jquery.iframe-transport.js' ) ?>
<?= HTML::script( 'assets/admin/js/jquery.fileupload.js' ) ?>

<!-- Our main JS file -->
<?= HTML::script( 'assets/admin/js/script.js' ) ?>
<!--/Mini Ajax file upload-->
</body>
</html>



