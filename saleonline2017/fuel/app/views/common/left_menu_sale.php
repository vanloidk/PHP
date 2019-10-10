<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <!-- !-->
        <div class="panel-heading panel-menu-left">
            <span style="padding-left: 30%;">Danh mục</span>
        </div>

        <!-- !-->
        <div class="panel-heading" role="tab" id="headingone">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseone" aria-expanded="true" aria-controls="collapseone">
                Quàn lý đơn đặt hàng</a>
        </div>

        <div id="collapseone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/purch/' ?>">
                            Đơn đặt hàng</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel-heading" role="tab" id="headingtwo">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                Quản lý đơn xuất hàng</a>
        </div>

        <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/ship/' ?>">
                            Đơn xuất hàng</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel-heading" >
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
                Quản lý khách hàng</a>
        </div>

        <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/customer/' ?>">
                            Khách hàng</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- !-->
        <div class="panel-heading" role="tab" id="headingfive">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                Quản lý đơn đặt hàng
            </a>
        </div>

        <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/order/' ?>">
                            Đơn đặt hàng mới</a>
                    </li>
                </ul>

                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/orderaccepted/' ?>">
                            Đơn đặt hàng xác nhận</a>
                    </li>
                </ul>
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/ordertracking/' ?>">
                            Đơn đặt hàng vận chuyển</a>
                    </li>
                </ul>
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/orderpayment/' ?>">
                            Đơn đặt hàng thanh toán</a>
                    </li>
                </ul>
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/Ordercancel/' ?>">
                            Đơn đặt hàng đã hủy</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="panel-heading" >
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsesevent" aria-expanded="true" aria-controls="collapsesevent">
                Quản lý hóa đơn</a>
        </div>
        <div id="collapsesevent" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsevent">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/invoice/index/' ?>">
                            Hóa đơn</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- !-->
        <div class="panel-heading" role="tab" id="headingthree">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                Quản lý sản phẩm</a>
        </div>
        <div id="collapsethree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingthree">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/product/index/' ?>">
                            Phụ kiện</a>
                    </li>
                </ul>

                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/fashion/' ?>">
                            Thời trang</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Quan ly tin tuc!-->
        <div class="panel-heading" role="tab" id="headingseven">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="true" aria-controls="collapseseven">
                Quản lý tin tức</a>
        </div>
        <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsenven">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/news/index/' ?>">
                            Tin tức công ty</a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="panel-heading" role="tab" id="headingfour">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                Quản lý kho</a>
        </div>
        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'sale/inventory/index/' ?>">
                            Kho</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="panel-heading" role="tab" id="headingfour">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="true" aria-controls="collapsenine">
                Quản lý liên hệ</a>
        </div>
        <div id="collapsenine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnine">
            <div class="panel-body">
                <ul class="subMenu" style="">
                    <li class="">
                        <a href="<?php echo Uri::base() . 'contact/list/' ?>">
                            Danh sách liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>