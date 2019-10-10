<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel">

        <!-- !-->
        <div class="panel-heading panel-menu-left">
            <span style="padding-left: 30%;">Category</span>
        </div>


        <!-- Products !-->
        <div class="panel-heading" role="tab" id="headingOne">
            <a  data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Products</a>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a  href="<?php echo Uri::base() . 'products/laptop/' ?>">Laptop</a>
                    </li>
                    <li class="">
                        <a  href="<?php echo Uri::base() . 'products/mobile/' ?>">Mobile</a>
                    </li>
                </ul>
            </div>
        </div>

          <!--Software!-->
        <div class="panel-heading" role="tab" id="headingfour">
            <a href="<?php echo Uri::base() . 'products/shoe/' ?>">Shoe</a>
        </div>
          
        <!--Software!-->
        <div class="panel-heading" role="tab" id="headingfour">
            <a href="<?php echo Uri::base() . 'products/software/' ?>">Software</a>
        </div>

        <!-- !-->
        <div class="panel-heading" role="tab" id="headingtwo">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                Components
            </a>
        </div>

        <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/monitoring/' ?>">Monitoring</a>
                    </li>
                    <li class="">
                        <a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/printer/' ?>">Printer</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>