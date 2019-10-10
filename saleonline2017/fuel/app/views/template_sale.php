<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta charset="utf-8">
        <title><?php echo isset($title) ? $title : ''; ?> <?php "Depdocla"; ?></title>

        <!-- CSS -->
        <?php echo Asset::render('css'); ?>
        <script>
            var base_url = '<?php echo Uri::base(); ?>';
            var language = JSON.parse('<?php echo $language; ?>');

        </script>
        <script src="http://localhost:8080/saleonline/html/assets/js/ckeditor/config.js" type="text/css">
        </script>
    </head>

    <body>
        <!-- top menu -->
        <div role="navigation">
            <!--            <div class="topmenu" >-->
            <div class="form-group navbar-fixed-top row" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <?php
                //add css
                echo Asset::css(Uri::base() . 'assets/css/font-awesome.css', array(), null, false);
                echo Asset::css(Uri::base() . 'assets/css/font-awesome.min.css', array(), null, false);
                //include file
                require_once 'common/top_menu_sale.php';
                ?>

            </div>
        </div>

        <div class="container_sale" >
            <div class="navbar-left col-lg-2 content-page " >
                <?php
                require_once 'common/left_menu_sale.php';
                ?>
            </div>
            <div class="back">
                <!--box to show error, success, warning message-->
                <?php if (Session::get_flash('success')): ?>
                    <div class="message-area">
                        <div class="alert alert-success " role="alert"><?php echo Security::clean(Session::get_flash('success'), array('htmlentities', 'xss_clean')) ?></div>
                    </div>
                <?php endif; ?>
                <?php if (Session::get_flash('error')): ?>
                    <div class="message-area">
                        <div class="alert alert-danger " role="alert"><?php echo Security::clean(Session::get_flash('error'), array('htmlentities', 'xss_clean')) ?></div>
                    </div>
                <?php endif; ?>

                <?php if (Session::get_flash('warning')): ?>
                    <div class="message-area">
                        <div class="alert alert-warning " role="alert"><?php echo Security::clean(Session::get_flash('warning'), array('htmlentities', 'xss_clean')) ?></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="navbar-right col-md-10" >
                <?php echo isset($content) ? $content : ''; ?>
            </div> <!-- /container -->
        </div>

        <div class="clearfix"></div>
        <!-- footer !-->
        <hr>
-
        <!-- Placed at the end of the document so the pages load faster -->
        <?php echo Asset::render('js'); ?>
    </body>


</html>



