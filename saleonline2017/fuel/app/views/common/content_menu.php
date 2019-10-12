<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9 col-sm-push-3">
            <div>
                <?php echo isset($content) ? $content : ''; ?>
            </div>

        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="#" class="list-group-item top_menu">DANH MỤC</a>
                <a href="<?php echo Uri::base() ?>products/earring/" class="list-group-item">Bông tai</a>
                <a href="<?php echo Uri::base() ?>products/ring/" class="list-group-item">Nhẫn</a>
                <a href="<?php echo Uri::base() ?>products/necklace/" class="list-group-item">Dây chuyền cổ</a>
                <a href="<?php echo Uri::base() ?>products/bangle/" class="list-group-item">Lắc tay lắc chân</a>
                <a href="<?php echo Uri::base() ?>products/jewelrybox/" class="list-group-item">Hộp đựng trang sức</a>
                <a href="<?php echo Uri::base() ?>products/clock/" class="list-group-item">Đồng hồ</a>
                <a href="<?php echo Uri::base() ?>products/backpack/" class="list-group-item">Ba lô</a>
                <a  href="<?php echo Uri::base() ?>products/handbag/" class="list-group-item">Túi xách</a>
            </div>
        </div><!--/.sidebar-offcanvas-->
    </div><!--/row-->
</div><!--/.container-->
<script >
    $(document).ready(function () {
        $('[data-toggle="offcanvas"]').click(function () {
            $('.row-offcanvas').toggleClass('active')
        });
    });
</script>