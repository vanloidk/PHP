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
        <div style="padding: 1px" class="navbar">
            <?php
            //add css
            echo Asset::css(Uri::base() . 'assets/css/font-awesome.css', array(), null, false);
            echo Asset::css(Uri::base() . 'assets/css/font-awesome.min.css', array(), null, false);

            // menu top
            echo "<div>";
            require_once 'common/top_menu.php';
            //require_once 'common/menu_bar_user.php';
            echo "</div>";
            ?>

            <!-- button responsive !-->
            <div   >

                <div class="container  navbar-inverse">
                    <div class="navbar-header" style="overflow-x: hidden !important;">
                        <button type = "button"  aria-controls="navbarToggler" class ="navbar-toggle collapsed" data-toggle ="collapse" data-target = "#navbarToggler">

                            <span class = "sr-only">Toggle navigation</span>
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                            <span class = "icon-bar"></span>
                        </button>
                    </div>
                </div>


                <!-- menu bar !-->
                <?php
                echo "<div  class='navbar-collapse collapse' id='navbarToggler'>";
                require_once 'common/menu_bar.php';
                echo "</div>";
                //$controller = strtolower(substr(Request::active()->controller, 11));
                //$action     = Request::active()->action;
                //echo $controller; exit();
                if (($controller == "account_visitor" || $controller == "account_user" || $controller == "product") && $action = "index") {
                    echo "<div>";
                    require_once 'common/banner_slider.php';
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div style="margin-top: -20px;">
            <?php
            require_once 'common/menu_info.php';
            ?>
        </div>
        <?php
        $cssContent = "content-customize";
        if (preg_match('/products_/', $controller)) {
            $cssContent = "container_m_customer";
        }
        ?>

        <div class="<?php echo $cssContent ?>">
            <?php
            if ($cssContent == "content-customize") {
                require_once 'common/content.php';
            } else {
                require_once 'common/content_menu.php';
            }
            ?>

        </div>

        <div>
            <!-- smooth-scrolling-of-move-up -->
            <script type="text/javascript">
                $(document).ready(function () {

                    //        var defaults = {
                    //            containerID: 'toTop', // fading element id
                    //            containerHoverID: 'toTopHover', // fading element hover id
                    //            scrollSpeed: 1200,
                    //            easingType: 'linear'
                    //        };

                    $().UItoTop({easingType: 'easeOutQuart'});

                });
            </script>
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



