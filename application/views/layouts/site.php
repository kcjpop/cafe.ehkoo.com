<!doctype html>
<html lang="en">
<head>
    <title>cafe.ehkoo.com - Homepage</title>
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
                        <li><a href="<?php echo URL::base() ?>" title="">Home</a></li>
                        <li><a href="<?php echo URL::to('cafe') ?>" title="">Browse</a></li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="flag flag-<?php echo $settings['default_language'] ?>"></i> English<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
<?php if(isset($languages)) :
foreach($languages as $obj) :
?>
                            <li><a href="<?php echo URL::to_action('language@change', array($obj['code'])) ?>"><i class="flag flag-<?php echo $obj['code'] ?>"></i> <?php echo $obj['name'] ?></a></li>
<?php endforeach;
endif; ?>
                        </ul>
                        </li>
                    </ul>
                    <form class="navbar-search pull-right" method="get" action="<?php echo URL::to('cafe/search') ?>">
                        <input class="search-query" name="q" placeholder="Looking for a cafe...">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="main_content" class="container">
        <?php echo $content ?>
    </div>

    <footer class="container">
        <div class="row">
            <div class="span6">
                <p>cafe.ehkoo.com &copy; 2013 An Cao Luu Bao</p>
            </div>
            <div class="span6 text-right">
                <p>A small project of Self-studied in ICT course</p>
            </div>
        </div>
    </footer>
</body>
</html>