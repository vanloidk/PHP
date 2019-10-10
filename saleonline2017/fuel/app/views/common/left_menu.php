<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel">

        <!-- !-->
        <div class="panel-heading panel-menu-left">
            <span style="padding-left: 30%;">Menu</span>
        </div>
        
        <!-- !-->
        <div class="panel-heading" >
            <a href="<?php echo Uri::base() . 'account/user/index/' ?>">
                Account Summary</a>
        </div>

        <!-- !-->
        <div class="panel-heading" role="tab" id="headingOne">
            <a  data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Payments</a>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="/secure/account/MyAccount/OrderTracking/">
                            Manage Saved Cards</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- !-->
        <div class="panel-heading" role="tab" id="headingtwo">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                Order Tracking
            </a>
        </div>

        <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'account/orderTracking/' ?>">
                            All Orders</a>
                    </li>
                    <li class="">
                        <a href="<?php echo Uri::base() . 'account/orderTracking/' ?>">
                            Reserved Items</a>
                    </li>
                    <li class="">
                        <a href="<?php echo Uri::base() . 'account/orderTracking/' ?>">
                            Returned Items</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- !-->
        <div class="panel-heading" role="tab" id="headingthree">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                Change Details</a>
        </div>
        <div id="collapsethree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingthree">
            <ul class="subMenu" style="">

                <li class="">
                    <a href="<?php echo Uri::base() ?>account/updateSignInDetails">
                        Sign In Details</a>
                </li>
                <li class="">
                    <a href="<?php echo Uri::base() ?>account/communications">
                        Contact Details</a>
                </li>
                <li class="">
                    <a href="<?php echo Uri::base() ?>account/Addresses/ChangeAddress">
                        Change Billing Address</a>
                </li>
            </ul>
        </div>

        <!-- !-->
        <div class="panel-heading" role="tab" id="headingfour">
            <a href="<?php echo Uri::base() . 'account/addresses/' ?>">
                Delivery Addresses</a>
        </div>
    </div>

</div>