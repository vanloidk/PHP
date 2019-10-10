<div class="menubar row">
    <nav id="form-group">

        <div class="inner-menubar">
            <div id="ab"  >
                <ul class="nav navbar-nav" id="mn_home" style="padding-left: 6%;">
                    <li>
                        <a  class="pdleft" style="text-align: center;" href="<?php echo Uri::base() . 'product' ?>">HÀNG BÁN CHẠY</a>
                    </li>
                </ul>
            </div>

            <div  id="mn_saleoff" ondblclick="mnSaleOffClick()">

                <ul class="nav navbar-nav">

                    <li class="dropdown">

                        <a href="<?php echo Uri::base() . 'product/saleoff/' ?>" class="dropdown-toggle pdleft" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo __('menubar.lbl_sale'); ?>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu"  style="background: rgb(243, 120, 165);">
                            <li role="presentation">
                                <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/clockSaleOff/'; ?>"><?php echo __('menubar.lbl_clock'); ?></a>
                            </li>
                            <li role="presentation">
                                <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/ringSaleOff/'; ?>"><?php echo __('menubar.lbl_ring'); ?></a>
                            </li>
                            <li role="presentation">
                                <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/earringSaleOff/'; ?>"><?php echo __('menubar.lbl_earring'); ?></a>
                            </li>

                            <li role="presentation" >
                                <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/necklaceSaleOff/'; ?>"><?php echo __('menubar.lbl_necklace'); ?></a>
                            </li>
                            <li role="presentation" >
                                <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/bangleSaleOff/'; ?>"><?php echo __('menubar.lbl_Bangles'); ?></a>
                            </li>
                            <li role="presentation" >
                                <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/jewelrySaleOff/'; ?>"><?php echo __('menubar.lbl_jewelry_box'); ?></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- shoe !-->
            <div  id="mn_jewelry" ondblclick="mnJewelryClick()">
                <ul class="nav navbar-nav">
                    <li >
                        <a href="<?php echo Uri::base() . 'products/' ?>" class="dropdown-toggle pdleft" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo __('menubar.lbl_jewelry'); ?>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" style="background: rgb(243, 120, 165);">
                            <li role="presentation"  style="background: red;"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/clock/'; ?>"><?php echo __('menubar.lbl_clock'); ?></a></li>
                            <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/ring/'; ?>"><?php echo __('menubar.lbl_ring'); ?></a></li>
                            <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/earring/'; ?>"><?php echo __('menubar.lbl_earring'); ?></a></li>

                            <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/necklace/'; ?>"><?php echo __('menubar.lbl_necklace'); ?></a></li>
                            <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/bangle/'; ?>"><?php echo __('menubar.lbl_Bangles'); ?></a></li>
                            <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/jewelrybox/'; ?>"><?php echo __('menubar.lbl_jewelry_box'); ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Brand and toggle get grouped for better mobile display -->
            <!--            <div >
                            <ul class="nav navbar-nav">
                                <li class="dropdown active" id="mn_product">
                                    <a href="#" class="dropdown-toggle pdleft" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo __('menubar.lbl_boy'); ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/laptop/' ?>"><?php echo __('menubar.lbl_shirt'); ?></a></li>
                                        <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/mobile/' ?>"><?php echo __('menubar.lbl_shoe'); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div >
                            <ul class="nav navbar-nav">
                                <li class="dropdown active" id="mn_product">
                                    <a href="#" class="dropdown-toggle pdleft" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo __('menubar.lbl_children'); ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/laptop/' ?>"><?php echo __('menubar.lbl_shirt'); ?></a></li>
                                        <li role="presentation"> <a class="navbar-brand pdleft" href="<?php echo Uri::base() . 'products/mobile/' ?>"><?php echo __('menubar.lbl_shoe'); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>-->
            <div id="mn_accessories" ondblclick="mnaccessoriesClick()">
                <ul class="nav navbar-nav" id="component">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle pdleft" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo __('menubar.lbl_accessories'); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" style="background: rgb(243, 120, 165);">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/backpack/' ?>" class="navbar-brand pdleft">
                                    <?php echo __('menubar.lbl_backpack'); ?>
                                </a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/handbag/' ?>" class="navbar-brand pdleft">
                                    <?php echo __('menubar.lbl_hand_bag'); ?>
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div>

                <form   role="search" class="input_search" action="<?php echo Uri::base() . 'product/search/' ?>" method="post">
                    <ul class="nav navbar-nav">
                        <li style="width: 350px;">
                            <input type="text" value="" placeholder="Tìm sản phẩm của bạn......" name="txt_search" class="form-control"/>
                        </li>
                        <li style="padding-left: 5px;">
                            <button type="submit" class="btn btn-primary" style="background: #c12e2a;"> Search</button>
                        </li>
                    </ul>
                </form>

            </div>

        </div>
    </nav> <!-- /.container-fluid -->
</div>

<script type="text/javascript">


    function mnSaleOffClick() {
        // var url_saleoff = ;
        window.location.href = "<?php echo Uri::base() . 'products/saleoff/' ?>";
    }
    function mnJewelryClick() {
        window.location.href = "<?php echo Uri::base() . 'products/jewelry/' ?>";
    }
    function mnaccessoriesClick() {
        window.location.href = "<?php echo Uri::base() . 'products/accessorie/' ?>";
    }


</script>