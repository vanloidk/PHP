<div class="menubar row">
    <nav id="form-group">

        <div class="inner-menubar">
            <div >
                <ul class="nav navbar-nav" id="mn_home">
                    <li>
                        <a  class="pdleft" href="<?php echo Uri::base() . 'product' ?>">HÀNG BÁN CHẠY</a>
                    </li>
                </ul>
            </div>

            <div  id="mn_saleoff" ondblclick="mnSaleOffClick()">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo Uri::base() . 'product/saleoff/' ?>" class="dropdown-toggle pdleft" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo __('menubar.lbl_sale'); ?>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu"  style="background: #f20000;">
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

                        <ul class="dropdown-menu" style="background:#f20000;">
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

            <div id="mn_accessories" ondblclick="mnaccessoriesClick()">
                <ul class="nav navbar-nav" id="component">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle pdleft" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo __('menubar.lbl_accessories'); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" style="background: #f20000;">
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

            <div  class="nav navbar-right">

                <form role="search"  class="input_search" action="<?php echo Uri::base() . 'product/search/' ?>" method="post">
                    <ul class="nav navbar-nav">
                        <li>
                            <input style="margin-right: 350px;" type="text" value="" placeholder="Tìm kiếm sản phẩm......" name="txt_search" class="form-control"/>
                        </li>
                        <li >
                            <button type="submit" class="btn" style="background: #f97777;">
                                <span class="glyphicon glyphicon-search"></span> Search
                            </button>

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