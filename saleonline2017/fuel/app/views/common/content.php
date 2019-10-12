<div class="container_customer">
    <div class="back">
        <!--box to show error, success, warning message-->
        <?php if (Session::get_flash('success')): ?>
            <div class="message-area">
                <div class="alert alert-success " role="alert"><?php echo Security::clean(Session::get_flash('success'), array('htmlentities', 'xss_clean')) ?></div>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="message-area">
                <div class="alert alert-danger " role="alert"><?php echo Security::clean(Session::get_flash('error'), array('htmlentities', 'xss_clean')) ?></div>
            </div>
        <?php endif; ?>

        <?php if (Session::get_flash('warning')): ?>
            <div class="message-area">
                <div class="alert alert-warning " role="alert"><?php echo Security::clean(Session::get_flash('warning'), array('htmlentities', 'xss_clean')) ?></div>
            </div>
        <?php endif; ?>
    </div>
    <div class="navbar-right col-md-12">
        <?php
        echo isset($content) ? $content : '';
        ?>
    </div> <!--/container -->
</div>