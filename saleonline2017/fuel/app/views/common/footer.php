
<!--<div >
    <div >
        <p style="text-align: center; padding-top: 5px;">
            Copyright © 2016 - Bản quyền thuộc về shop depdocla.com.
        </p>
    </div>

</div>-->


<div class="row cssfooter">

    <!-- thong tin cua shop !-->
    <div class="col-lg-3 footer-01">
        <div>
            <div class="footer-title">
                SHOP ĐẸP ĐỘC LẠ
            </div>
            <p style="color: darkgray;">Địa Chỉ: Etown 1, lầu 4 ,364 Cong Hoa, P.14, Q. Tân Bình thành phố hcm
                Điện thoại: 0969463379<br>
                Email: gonti@gmail.com<br>
                Website: www.depdocla.com.vn</p>
        </div>
    </div>
    <!-- huong dan !-->
    <div class="col-lg-3 footer-01" >
        <div class="footer-title">
            Hướng dẫn mua hàng
        </div>
        <div style="color: darkgray;">

            <ul style="color: darkgray;">
                <li>
                    <a href="#">
                        Chính Sách Đổi Trả
                    </a>
                </li>
                <li>
                    <a href="#">
                        Chính Sách Vận Chuyển
                    </a>
                </li>
                <li>
                    <a href="#">
                        Chính Sách Bảo Hành
                    </a>
                </li>
                <li>
                    <a href="#">
                        Hướng Dẫn Mua Hàng
                    </a>
                </li>
                <li><a href="<?php echo Uri::base() . 'contact' ?>">Liên hệ</a></li>
            </ul>
        </div>
    </div>
    <!-- fan like !-->
    <div class="col-lg-3 footer-01" >
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="message" data-width="250" data-height="150" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
                <a href="https://www.facebook.com/facebook">
                    Facebook
                </a>
            </blockquote>
        </div>
    </div>

    <!--thong ke truy cap !-->
    <div   class="col-lg-3">
        <div >
            <div class="footer-title">
                Thống Kế
            </div>
            <div style="color: darkgray;">
                <div >
                    <img src="<?php echo Uri::base() . "assets/imgstatic/icon_online.png" ?>" alt="Icon">
                    đang online: <?php echo $user_online; ?>
                </div>
                <div>
                    <img src="<?php echo Uri::base() . "assets/imgstatic/icon_week.png" ?>" alt="Icon">
                    tuần: 50
                </div>
                <div>
                    <img src="<?php echo Uri::base() . "assets/imgstatic/icon_month.png" ?>" alt="Icon">
                    tháng: 150
                </div>
                <div>
                    <img src="<?php echo Uri::base() . "assets/imgstatic/icon_ttl.png" ?>" alt="Icon">
                    năm: 400
                </div>
            </div>
        </div>
    </div>
</div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>