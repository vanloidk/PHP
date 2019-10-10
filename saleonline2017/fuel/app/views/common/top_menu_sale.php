<div class="row menubar-sale">
    <div>
        <ul class="nav navbar-nav" style="padding-left: 10px;">
            <li>
                <a href=<?php echo Uri::base() ?>account/sale/index class="restart_animation_  pdleft">
                    <img id="img_animation_" src= <?php echo Uri::base() . "assets/imglogo/logocompany.jpg" ?> border="0" width="70" height="40"/>
                    Quản lý bán hàng
                </a>
            </li>
        </ul>
    </div>

    <div>
        <ul class="nav navbar-nav navbar-right" style="padding-right: 2.5%;">
            <li class="dropdown">
                <a href= "<?php echo Uri::base() ?>" class="dropdown-toggle pdleft" data-toggle="dropdown" ><i class="fa fa-user"></i> <?php echo $user['username'] ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a  href= <?php echo Uri::base() ?>base/change_password><i class="fa fa-fw fa-user"></i> Change pass</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a  href= <?php echo Uri::base() ?>base/logout><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>

            </li>

        </ul>
    </div>
</div>
