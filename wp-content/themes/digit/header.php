<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:400,700%7CRoboto:300,400,500,700,900%7CMontserrat:700" rel="stylesheet">
<link href="<?=get_site_url();?>/css/all.min.css?v=5ff01c" rel="stylesheet">

<!-- Theme Styling -->
<link href="<?=get_site_url();?>/css/theme.css" rel="stylesheet">
<link href="<?=get_site_url();?>/css/theme-responsive.css" rel="stylesheet">
<link href="<?=get_site_url();?>/css/theme-overrides.css" rel="stylesheet">
<link href="<?=get_site_url();?>/css/theme-color-10.css" rel="stylesheet">
<link href="<?=get_site_url();?>/css/custom.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?=get_site_url();?>/js/scripts.min.js?v=5ff01c"></script>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script type="text/javascript">
var url = <?php echo get_site_url(); ?>;
</script>
</head>
<div id="menu">
    <!-- Primary Menu Start -->
    <nav id="primaryMenu" class="navbar">
        <div class="container">
            <div id="primaryNavbar" class="reset-padding">
                <!-- Primary Menu Links Start -->
                <ul class="primary-menu-links nav navbar-nav">
                    <li class="hidden-xs"><span>Welcome To Digit Software Solutions</span></li>
                    <li><span class="phone"><i class="fa fa-phone"></i>+91 95588-47447</span></li>
                    <li><span class="email"><i class="fa fa-envelope"></i>info@digitsoftsol.com</span></li>
                </ul>
                <!-- Primary Menu Links End -->
                
                <!-- Primary Social Links Start -->
                <ul class="primary-social-menu-links nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
                <!-- Primary Social Links End -->
            </div>
        </div>
    </nav>
    <!-- Primary Menu End -->

    <!-- Secondary Menu Start -->
    <nav id="secondaryMenu" class="navbar" data-sticky="true">
        <div class="container">
            <div class="navbar-header">
                <!-- Logo Start -->
                <a href="<?=get_site_url();?>" class="navbar-brand">
                    <img src="<?=get_site_url();?>/images/logo.png" alt="Digit Software Solution" class="img-responsive" />
                </a>
                <!-- Logo End -->
            </div>
            <!-- Secondary Menu Links Start -->
            <div id="secondaryNavbar" class="navbar-right reset-padding hidden-sm hidden-xs">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'secondary-menu-links nav navbar-nav' ) ); ?>
            </div>
            <!-- Secondary Menu Links End -->
        </div>
    </nav>
    <!-- Secondary Menu End -->
    
    <!-- Off-Canvas Menu Start -->
    
    
    <div class="off-canvas-menu-overlay"></div>
    <!-- Off-Canvas Menu End -->
</div>
