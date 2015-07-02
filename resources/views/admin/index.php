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

            <?php include_once "footer.php" ?>
        </div><!-- ./wrapper -->
    </body>
</html>