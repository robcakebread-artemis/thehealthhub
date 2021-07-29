<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AWS_Custom_Theme
 */

$email = antispambot( get_field('options_email','options') );
$phone_mobile_link = ( get_field('phone_mobile_link','options') );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?= get_field('options_top_header_code','options'); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" crossorigin="use-credentials" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <?php gravity_form_enqueue_scripts(2,true) ?>

    <?php wp_head(); ?>
    <?= get_field('options_custom_header_code','options'); ?>
</head>

<?php
$header = 'header';

$hero = false;
if( have_rows('layout') ):
    while ( have_rows('layout') ) : the_row();
        if( get_row_layout() == 'nwgju' ):
            $hero = true;
            break;
        endif;
    endwhile;
    reset_rows();
endif;

if ((is_single() || is_home()) && !is_singular('casestudy')):
    $hero = true;
endif;

if (!$hero): 
    $body_classes .= ' no-hero';
else:
    $body_classes .= ' with-hero';
endif;
?>
<body <?php body_class($body_classes); ?>>
<?php
    if(!isset($_COOKIE['aws-cookie-consent'])) :
        include(locate_template('template-parts/partials/partial-cookie-consent.php'));
    endif;
?>
<?= get_field('options_custom_body_code','options'); ?>

<div id="off-canvas" class="off-canvas">
	<?php include(locate_template('off-canvas.php')); ?>
</div>
<div id="page" class="site">

    <?php
        if ($header):
            include(locate_template('template-parts/header/'.$header.'.php'));
        endif;

        if (!get_field('hide_breadcrumb')):
            include(locate_template('template-parts/partials/partial-breadcrumbs.php'));
        endif;
    ?>
	<div id="content" class="site-content">

