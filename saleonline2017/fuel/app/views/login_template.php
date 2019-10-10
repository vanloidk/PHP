<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title><?php echo isset($title) ? $title : ''; ?> <?php echo "Depdocla"; ?></title>

        <!-- CSS -->
        <?php echo Asset::render('css'); ?>


    </head>

    <body class="body-login">


        <div class="logincontent">
            <!-- message errors !-->
            <div class="row">
                <?php if (Session::get_flash('success')): ?>
                    <div class="message-area">
                        <div class="alert-danger" role="alert"><?php echo Session::get_flash('success') ?></div>
                    </div>
                <?php endif; ?>
                <?php if (Session::get_flash('error')): ?>
                    <div class="message-area">
                        <div class="alert-danger" role="alert"><?php echo Session::get_flash('error') ?></div>
                    </div>
                <?php endif; ?>

            </div>

            <?php echo $content; ?>

        </div> <!-- /contents -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php echo Asset::render('js'); ?>
    </body>
</html>
