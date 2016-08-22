<!doctype html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <!--[if ie]><meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/><![endif]-->
    <title>
        <?php wp_title( ' - ', true, 'right' ); ?>
        <?php bloginfo('name'); ?>
    </title>
    <?php if ( of_get_option('sc_enablemeta')== '1') { ?>
    <!-- meta -->
    <meta name="description" content="<?php echo of_get_option('sc_metadescription')  ?>">
    <meta name="keywords" content="<?php wp_title(); ?>, <?php echo of_get_option('sc_metakeywords')  ?>" />
    <meta name="revisit-after" content="<?php echo of_get_option('sc_revisitafter')  ?> days" />
    <meta name="author" content="https://kailo.io">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php } ?>
    <?php if ( of_get_option('sc_enablerobot')== '1') { ?>
    <!-- robots -->
    <meta name="robots" content="<?php echo of_get_option('sc_metabots')  ?>" />
    <meta name="googlebot" content="<?php echo of_get_option('sc_metagooglebot')  ?>" />
    <?php } ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/favicon.ico" type="image/x-icon" />
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/images/ico/apple-touch-icon-152x152.png" />
    <!-- Windows 8 Tile Icons -->
    <meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/library/images/icosmalltile.png" />
    <meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/library/images/icomediumtile.png" />
    <meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/library/images/icolargetile.png" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of head -->
    <?php if(of_get_option('sc_css_code') != '') { ?>
    <!-- custom css -->
    <?php load_template( get_template_directory() . '/custom.css.php' );?>
    <!-- custom css -->
    <?php } ?>
    <?php if(of_get_option('sc_customtypography') == '1') { ?>
    <!-- custom typography-->
    <?php if(of_get_option('sc_headingfontlink') != '') { ?>
    <?php echo stripslashes(html_entity_decode(of_get_option('sc_headingfontlink')));?>
    <!-- custom typography -->
    <?php } ?>
    <?php load_template( get_template_directory() . '/custom.typography.css.php' );?>
    <?php } ?>
    <noscript> JavaScript je vypnutý
        <style>
        .modal {
            display: initial;
            position: inherit;
        }
        </style>
    </noscript>
</head>

<body <?php body_class(); ?>>
    <!-- START HEADER -->
    <header role="banner" class="clearfix">
        <div class="header container z-depth-0-half">
            <div class="row">
                <div class="col l6">
                    <!-- START LOGO -->
                    <?php if ( !of_get_option('sc_clogo')== '') { ?>
                    <hgroup id="logo-wrapper">
                        <h1><a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                    <img src="<?php echo of_get_option('sc_clogo'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
                                </a></h1>
                    </hgroup>
                    <?php } else { ?>
                    <hgroup id="logo-wrapper">
                        <h1><a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                    <?php if( !of_get_option('sc_clogo_text')== '') {
                                        echo of_get_option('sc_clogo_text');
                                        } else {
                                        bloginfo( 'name' );
                                    } ?>
                                </a></h1>
                        <h5 id="tagline"><?php bloginfo('description'); ?></h5>
                    </hgroup>
                    <?php }?>
                </div>
                <!-- START TOP MENU -->
                <div class="col l6">
                    <div class="topheader resize right-align">
                        <a href="/?page_id=38">Kontakty</a> |
                        <a href="/?page_id=550">Odkazy</a> |
                        <a href="/?page_id=12">Pro média</a> |
                        <a href="http://info.gacr.cz/" target="_blank">Helpdesk</a> |
                        <a href="/faq" target="_blank">FAQ</a> |
                        <a href="https://www.gris.cz" target="_blank">Aplikace</a> |
                        <!-- START FONT RESIZE & LANG -->
                        <!-- <a id="lang-normal">A |</a>
                            <a id="lang-big">A</a> -->
                        <a href="/en">English</a>
                    </div>
                    <!-- END FONT RESIZE & LANG -->
                </div>
                <!-- END TOP MENU -->
            </div>
            <?php if ( !of_get_option('sc_pageheaderurl')== '') { ?>
            <!-- START PAGE HEADER -->
            <img class="intro-img" src="<?php echo of_get_option('sc_pageheaderurl'); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
            <?php }?>
            <!-- END PAGE HEADER -->
            <!-- START MAIN NAV -->
            <!-- END MAIN NAV -->
            <!-- START MOBILE NAV -->
            <?php wp_nav_menu(
                array(
                'menu' => '65',
                'menu_class' => 'side-nav',
                'menu_id' => 'slide-out',
                'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="mobile-header"><p>Menu</p></li>%3$s</ul>',
              )
            );
            ?>
            <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons"></i></a>
            <!-- END MOBILE NAV -->
        </div>
        <div class="container">
            <div class="hide-on-med-and-down white z-depth-0-half">
                <?php ubermenu( 'main' , array( 'theme_location' => 'main_nav' ) ); ?>
            </div>
        </div>
    </header>
    <!-- END HEADER -->
