<?php $login_port = Session::get('login_port'); ?>
<ul>

</ul>
<table>
    <tr>
    <ul class="nav navbar-nav navbar-right">
        <li><?php echo Html::anchor('base/change_password', '<span class="glyphicon glyphicon-user"></span> ' . __('account.password')) ?></li>
        <li><?php echo Html::anchor('base/logout', '<span class="glyphicon glyphicon-log-out"></span> ' . __('menu.logout')) ?></li>
    </ul>
</tr>
<tr width = "200px" height = "80%">

</tr>
</table>
