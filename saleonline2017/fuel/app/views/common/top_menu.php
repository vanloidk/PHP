 
<div class="topmenu">
    <!-- logo company !-->
    <div class="navbar-nav" style="float: left;" >
        <a class="logo_animation" href="<?php echo Uri::base() . 'sanpham' ?>"><img width="200px" height="60px" src= <?php echo Uri::base() . "assets/imglogo/logocompany.jpg" ?>></a>
    </div>

    <div class="row" style="width: 99.5%;">
        <div  class="menu-ul-top">
            <div class="row" style="padding-left: 82%;">
                <ul class="navbar-nav">
                    <li>
                        <a href="<?php echo Uri::base() . 'sanpham' ?>">Trang chủ &nbsp|&nbsp&nbsp </a>
                    </li>
                    <li>
                        <a href="<?php echo Uri::base() . 'tintuc' ?>">Tin tức &nbsp|&nbsp&nbsp </a>
                    </li>
                    <li>
                        <a href="<?php echo Uri::base() . 'lienhe' ?>">Liên hệ</a>
                    </li>

                    <li>
                        <a class="logo_animation" href="#" >
                            &nbsp| <img width="20px" height="20px" src="<?php echo Uri::base() ?>assets/imglanguage/vn.png">
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

        <?php
        $count_products = '';
        if (isset($number_carts) && $number_carts > 0) {
            $count_products = (isset($number_carts) ? $number_carts : '');
        }
        ?>

        <!-- informations main!-->
        <div class="menu-ul-top" > 
            <div  class="row" style="padding-left: 60%; float: right; margin-right: 5%; margin-top: -10px;">
                <ul class="navbar-nav">
                    <?php if ($user == null): ?>
                        <li style="padding-right: 10px;">
                            <a href= <?php echo Uri::base() ?>account/login>
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

                    <li   style="padding-left: 10px;">
                        <a href= <?php echo Uri::base() ?>cart/index/> <img width="30px" height="30px" src= "<?php echo Uri::base() . "assets/imglogo/shop02.png" ?>">
                        <p style="color:red; display: inline-block;"><?php echo $count_products; ?> </p></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>
