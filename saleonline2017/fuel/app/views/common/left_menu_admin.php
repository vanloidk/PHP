<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">

        <div>
            <a href="#" class="restart_animation_"><img id="img_animation" src="<?php echo Uri::base() ?>assets/img/animation.jpg" border="0" width="50" height="36"> Menu</a>
        </div>

        <!-- Roles !-->
        <div class="panel-heading" role="tab" id="headingone">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseone" aria-expanded="true" aria-controls="collapseone">
                Roles
            </a>
        </div>
        <div id="collapseone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'role/index/' ?>">
                            List Roles</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Account !-->
        <div class="panel-heading" id="headingfive">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                Accounts
            </a>
        </div>

        <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'account/admin/index/' ?>">
                            Thành Viên Quản Trị</a>
                    </li>
                    <li class="">
                        <a href="<?php echo Uri::base() . 'account/admin/index/' ?>">
                            Khách Hàng</a>
                    </li>
                    <li class="">
                        <a href="<?php echo Uri::base() . 'account/admin/index/' ?>">
                            Của hàng</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Permission Account!-->
        <div class="panel-heading" role="tab" id="headingtwo">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                Account Permissions
            </a>
        </div>

        <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'actions/index/' ?>">
                            Permissions</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Group !-->
        <div class="panel-heading" role="tab" id="headingthree">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                Groups</a>
        </div>
        <div id="collapsethree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingthree">
            <ul class="subMenu" style="">

                <li class="">
                    <a href="<?php echo Uri::base() ?>group/">
                        List groups</a>
                </li>
            </ul>
        </div>

        <!--Permission Group !-->
        <div class="panel-heading" role="tab" id="headingfour">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                Group Permissions </a>
        </div>

        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
            <ul class="subMenu" style="">

                <li class="">
                    <a href="<?php echo Uri::base() ?>group/">
                        Permissions</a>
                </li>
            </ul>
        </div>
    </div>

</div>