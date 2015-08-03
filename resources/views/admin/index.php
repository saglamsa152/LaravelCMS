<!DOCTYPE html>
<html>
    <head>
        <?php include_once "head.php" ?>
    </head>
    <?php if (!$skin = UserMeta::getMeta(Auth::user()->id, 'themeSkin')) $skin = 'skin-blue';?>
    <body class="<?= $skin ?>">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php include_once "header.php" ?>

            <?php include_once "leftSide.php" ?>

            <?php include_once "rightSide/" . $rightSide . ".php" ?>
	        <footer class="main-footer">
		        <div class="pull-right hidden-xs">
			        <b>Version</b> 2.0
		        </div>
		        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
	        </footer>
        </div><!-- ./wrapper -->
        <?php include_once "footer.php" ?>
    </body>
</html>