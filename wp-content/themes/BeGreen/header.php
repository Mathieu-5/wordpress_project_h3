<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>BeGreen - <?php the_title() ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="wp-content/themes/begreen/css/bootstrap.css" />
    <link rel="stylesheet" href="wp-content/themes/begreen/css/reset.css" />
    <link rel="stylesheet" href="wp-content/themes/begreen/css/style.css" />
    <link rel="stylesheet" href="wp-content/themes/begreen/css/animate.css" />
    <link rel="stylesheet" href="wp-content/themes/begreen/css/owl.carousel.css" />
    <link rel="stylesheet" href="wp-content/themes/begreen/css/magnific-popup.css" />
    <!-- Google Web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Font icons -->
    <link rel="stylesheet" href="wp-content/themes/begreen/icon-fonts/font-awesome-4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="wp-content/themes/begreen/icon-fonts/essential-regular-fonts/essential-icons.css" />
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body class="diag">
    <!-- LOADER 
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div> -->


<nav>
    <div class="row">
        <div class="container">
            <div class="logo">
                <img src="wp-content/uploads/2018/11/BeGreen.png" alt="">
            </div>
            <div class="responsive"><i data-icon="m" class="icon"></i></div>
            <ul class="nav-menu">
            <?php // SYNTAXE : wp_nav_menu( array $args = array() )
$args=array(
    'theme_location' => 'header', // nom du slug
    'menu' => 'header_fr', // nom à donner cette occurence du menu
    'menu_class' => 'smoothScroll', // class à attribuer au menu
    'menu_id' => 'menu_id' // id à attribuer au menu
    // voir les autres arguments possibles sur le codex
);
wp_nav_menu($args);
?>
            </ul>
        </div>
    </div>
</nav>