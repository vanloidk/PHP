<div class="row topmenu">

    <div class="inner-topmenu">
        <div style="padding-top: 10px; padding-right: 1.5%; padding-bottom: 8px;" class="row menu-ul-top">
            <ul class="navbar-nav navbar-right" >
                <li>
                    <a href="<?php echo Uri::base() . 'product' ?>">Trang chủ &nbsp|&nbsp&nbsp </a>
                </li>
                <li>
                    <a href="<?php echo Uri::base() . 'news' ?>">Tin tức &nbsp|&nbsp&nbsp </a>
                </li>
                <li>
                    <a href="<?php echo Uri::base() . 'contact/' ?>">Liên hệ</a>
                </li>
            </ul>
        </div>

        <?php
        $count_products = '';
        if (isset($number_carts) && $number_carts > 0) {
            $count_products = (isset($number_carts) ? $number_carts : '');
        }
        ?>
        <!-- logo company !-->
        <div class="navbar-form navbar-left">
            <a class="logo_animation" href="<?php echo Uri::base() . 'product/' ?>"><img width="80px" height="40px" src= <?php echo Uri::base() . "assets/imglogo/logocompany.jpg" ?>></a>
        </div>

        <!-- informations main!-->
        <div class="menu-ul-top">
            <ul class="navbar-nav navbar-right">
                <?php if ($user == null): ?>
                    <li style="padding-right: 10px;">
                        <a href= <?php echo Uri::base() ?>account/user/login/>
                        <i class="glyphicon glyphicon-log-in"></i>
                        <?php echo __('menu.lbl_login'); ?>
                        </a>
                    </li>

                    <li>
                        <a href= <?php echo Uri::base() ?>account/user/register/>
                        <i class="fa fa-fw fa-user"></i>
                        <?php echo __('menu.lbl_register'); ?>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($user != null): ?>
                    <li class="dropdown">
                        <a href= <?php echo Uri::base() ?> class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <?php echo $user['username'] ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a  href= <?php echo Uri::base() ?>account/user/edit>
                                    <i class="fa fa-fw fa-user"></i>
                                    <?php echo "Thông tin"; ?>
                                </a>
                            </li>
                            <li>
                                <a href= <?php echo Uri::base() ?>base/change_password>
                                    <i class="fa fa-pencil-square-o"></i>
                                    <?php echo __('menu.lbl_change_pass'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a  href= <?php echo Uri::base() ?>base/logout><i class="fa fa-fw fa-power-off"></i> <?php echo __('menu.lbl_logout'); ?></a>
                            </li>
                        </ul>

                    </li>
                <?php endif; ?>

                <li style="padding-right: 40px; padding-left: 10px;">
                    <a href= <?php echo Uri::base() ?>cart/index/> <img width="30px" height="30px" src= "<?php echo Uri::base() . "assets/imglogo/shop02.png" ?>">
                    <p style="color:red; display: inline-block;"><?php echo $count_products; ?> </p></a>
                </li>
                <li>
                    <a class="logo_animation" href="#" >
                        <img width="20px" height="20px" src="<?php echo Uri::base() ?>assets/imglanguage/vn.png">
                    </a>
                </li>
                <li style="padding-left: 2px;">
                    <a href="#">
                        <img width="20px" height="20px" src="<?php echo Uri::base() ?>assets/imglanguage/en.png">
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
