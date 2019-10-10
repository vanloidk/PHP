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
        <div style="padding: 1px" role="navigation" class="navbar">
            <?php
            //add css
            echo Asset::css(Uri::base() . 'assets/css/font-awesome.css', array(), null, false);
            echo Asset::css(Uri::base() . 'assets/css/font-awesome.min.css', array(), null, false);

            // menu top
            echo "<div class='navbar-collapse'>";
            require_once 'common/top_menu.php';
            //require_once 'common/menu_bar_user.php';
            echo "</div>";
            ?>

            <!-- button responsive !-->
            <div  role ="navigation" id = "nav-top" >
                <!--<div class = "topmenu" > -->
                <!--                <div class="container  navbar-inverse">
                                    <div class="navbar-header" style="overflow-x: hidden !important;">
                                        <button type = "button"  class ="navbar-toggle" data-toggle ="collapse" data-target = ".navbar-collapse">
                                            <span class = "sr-only">Toggle navigation</span>
                                            <span class = "icon-bar"></span>
                                            <span class = "icon-bar"></span>
                                            <span class = "icon-bar"></span>
                                        </button>
                                    </div>
                                </div>-->

                <!-- menu bar !-->
                <?php
                echo "<div  class='navbar-collapse'>";
                require_once 'common/menu_bar.php';
                echo "</div>";
                //$controller = strtolower(substr(Request::active()->controller, 11));
                //$action     = Request::active()->action;

                if (($controller == "account_visitor" || $controller == "account_user" || $controller == "product") && $action = "index") {
                    echo "<div>";
                    require_once 'common/banner_slider.php';
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="container" style="margin-top: -20px;">
            <?php
            require_once 'common/menu_info.php';
            ?>
        </div>


        <div  class="container_customer">
            <!--            <div class="navbar-left col-lg-2 content-page" >
            <?php
// require_once 'common/left_menu_visitor.php';
            ?>
                        </div>-->
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
            <div class="navbar-right col-md-11">
                <?php echo isset($content) ? $content : ''; ?>
            </div> <!-- /container -->
        </div>
        <!-- Placed at the end of the document so the pages load faster -->
        <?php echo Asset::render('js'); ?>
    </body>

    <!-- footer !-->
    <hr>
    <div>
        <footer>
            <?php
            require_once 'common/footer.php';
            ?>
        </footer>
    </div>
</html>



