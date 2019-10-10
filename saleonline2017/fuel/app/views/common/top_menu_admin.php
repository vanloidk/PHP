<div class="row topmenuadmin">
    <!-- logo company !-->
    <div class="navbar-form navbar-left">
        <a class="logo_animation" href="<?php echo Uri::base() . 'account/user/' ?>"><img width="80px" height="30px" src= <?php echo Uri::base() . "assets/imglogo/logocompany.jpg" ?>></a>
    </div>
    <div class="inner-topmenu">
        <ul class="nav navbar-nav navbar-right" >
            <li class="dropdown">
                <a href= "<?php echo Uri::base() ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user['username'] ?> <b class="caret"></b></a>
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
