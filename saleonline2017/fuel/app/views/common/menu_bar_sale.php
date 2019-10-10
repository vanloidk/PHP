<?php $login_port = Session::get('login_port'); ?>

<div class="menubar">
    <nav class="navbar navbar-default">
        <div class="inner-menubar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo Uri::base() . 'account/sale/' ?>">Home</a>
            </div>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Management<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/laptop/' ?>">Information User</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/mobile/' ?>">Products</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/mobile/' ?>">Sales Order</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo Uri::base() . 'products/mobile/' ?>">Invoices</a></li>
                    </ul>
                </li>
            </ul>

            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
    </nav>

</div><!-- /.container-fluid -->
