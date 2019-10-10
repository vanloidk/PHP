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
    </head>

    <body>
        <!-- top menu -->
        <div role="navigation">
            <!--            <div class="topmenu" >-->
            <div class="form-group" >
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

                if (Session::get('login_port') == USER_PORT) {
                    echo "<div class='navbar-fixed-top'>";
                    require_once 'common/top_menu.php';
                    //require_once 'common/menu_bar_user.php';
                    echo "</div>";
                    echo "<div style='padding-top:60px;'>";
                    require_once 'common/menu_bar.php';
                    require_once 'common/banner_slider.php';
                    echo "</div>";
                } elseif (Session::get('login_port') == SALE_PORT) {
                    require_once 'common/top_menu_sale.php';
                    // require_once 'common/menu_bar_sale.php';
                } else {
                    require_once 'common/top_menu_admin.php';
                }
                ?>

            </div>
        </div>

        <?php
        $height_top_menu = 0;
        if (Session::get('login_port') == USER_PORT) {
            $height_top_menu = "80px;";
        }
        ?>

        <div class="container_customer" style="padding-bottom: <?php echo $height_top_menu; ?>" >
            <div class="navbar-left col-lg-2 content-page" >
                <?php
                if (Session::get('login_port') == USER_PORT) {
                    require_once 'common/left_menu_visitor.php';
                } elseif (Session::get('login_port') == SALE_PORT) {
                    require_once 'common/left_menu_sale.php';
                } else {
                    require_once 'common/left_menu_admin.php';
                }
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

            <div>
                <?php
                require_once 'common/footer.php';
                ?>
            </div>
        </div>
        <!-- Placed at the end of the document so the pages load faster -->
        <?php echo Asset::render('js'); ?>
    </body>
</html>



