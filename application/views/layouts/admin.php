<!doctype html>
<html lang="en">
<head>
    <title>cafe.ehkoo.com - Browse</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo Asset::styles() ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <?php echo Asset::scripts() ?>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="row">
                    <ul class="nav">
                        <li><a href="<?php echo URL::to_action('admin.dashboard') ?>" title="">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="<?php echo URL::to_action('admin.setting') ?>" class="dropdown-toggle" data-toggle="dropdown">Setting<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo URL::to_action('admin.setting') ?>?tab=general">General</a></li>
                                <li><a href="<?php echo URL::to_action('admin.setting') ?>?tab=language">Laguages</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav pull-right">
                        <li><a href="<?php echo URL::base() ?>" title="">Home page</a></li>
                        <li><a href="<?php echo URL::to_action('auth.logout') ?>" title="">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="main_content">
        <?php echo $content ?>
    </div>

    <!-- /container -->
</body>
</html>

