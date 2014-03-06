<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2><?php echo _('Password Reset')?></h2>

		<div>
			<?php echo _('To reset your password, complete this form:')?> {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>