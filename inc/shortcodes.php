<?php
/*****************************************************/
/* Add button shortcode                              */
/*****************************************************/

function sc_button( $atts, $content = null) {
	extract( shortcode_atts( array(
      'link' => '/',
	  'title' => '',
	  'icon' => '' ,
	  'type' => '',
      'class' => '',
      'arrow' => ''
    ), $atts ) );
    
	
	if ($type == 'toggle') {
		$link = 'data-toggle="'.$link.'"';
	} else {
		$link = 'href="'.$link.'"';
	}
    
    if ((strpos($class, 'plain') !== false) || $arrow):
        $arrow = get_icon('arrow right');
    endif;

	if ($icon != "") {
        $icon = get_icon($icon);
        $class .= ' with-icon';
	}
	
   return '<a class="button'.($class != '' ? ' '.$class : '').'" '.$link.'>'.'<span class="title">'.$title.'</span><span class="main-icon">'.$icon.'</span>'.$arrow.'</a>';
}

add_shortcode('button', 'sc_button');

/*****************************************************/
/* Add year shortcode                              */
/*****************************************************/

function sc_year( $atts, $content = null) {

    return date("Y");
 }
 
 add_shortcode('year', 'sc_year');

 /*****************************************************/
/* Get Directions Shortcode                          */
/*****************************************************/

function sc_get_directions( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'address' => 'London'
    ), $atts ) );
	
	$retStr = '<form class="directions" action="https://maps.google.com/maps" method="get" target="_blank"><input id="dir-postcode" name="saddr" type="text" placeholder="Enter Your Postcode" /><input name="daddr" type="hidden" value="'.$address.'" /> <input id="dir-submit" type="submit" value="Go" class="button"/></form>';
	return $retStr;
	
}
add_shortcode('directions', 'sc_get_directions');

/*****************************************************/
/* Obfuscate Email */
/*****************************************************/

function wpcodex_hide_email_shortcode( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}

	return '<a href="mailto:' . antispambot( $content ) . '" onclick="__gaTracker(\'send\', \'event\', \'email\', \'click\');">' . antispambot( $content ) . '</a>';
}
add_shortcode( 'email', 'wpcodex_hide_email_shortcode' );

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


/*****************************************************/
/* Add social icons shortcode            */
/*****************************************************/


function sc_social( $atts, $content = null) {
	extract( shortcode_atts( array(
        'class' => ''
    ), $atts ) );
	
	$fb = get_field('options_facebook', 'options');
	$lin = get_field('options_linkedin', 'options');
	$twit = get_field('options_twitter', 'options');
	$pin = get_field('options_pinterest', 'options');
	$insta = get_field('options_instagram', 'options');
	$youtube = get_field('options_youtube', 'options');

    if ($fb || $lin || $twit || $pin):
    
    $social = '<ul class="social-icons'.($class ? ' '.$class : '').'">';
    
	if ($fb) {
		$social .= '<li><a href="'.$fb.'" target="_blank" class="social-link facebook" rel="noopener noreferrer" aria-label="Facebook">'.get_icon('facebook-square').'</a></li>';
	}
	if ($lin) {
		$social .= '<li><a href="'.$lin.'" target="_blank" class="social-link linkedin" rel="noopener noreferrer" aria-label="Linked In">'.get_icon('linkedin-square').'</a></li>';
	}
	if ($twit) {
		$social .= '<li><a href="'.$twit.'" target="_blank" class="social-link" rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-twitter social"></i></a></li>';
	}	
	if ($pin) {
		$social .= '<li><a href="'.$pin.'" target="_blank" class="social-link" rel="noopener noreferrer" aria-label="Pinterest"><i class="fab fa-pinterest-p social"></i></a></li>';
	}	
	if ($insta) {
		$social .= '<li><a href="'.$insta.'" target="_blank" class="social-link instagram" rel="noopener noreferrer" aria-label="Instagram">'.get_icon('instagram-square').'</a></li>';
	}
	if ($youtube) {
		$social .= '<li><a href="'.$youtube.'" target="_blank" class="social-link youtube" rel="noopener noreferrer" aria-label="YouTube">'.get_icon('youtube-square').'</a></li>';
	}	
    
    $social .= "</ul>";	
    
    else:
        $social = '';

    endif;
    

	return $social;
}

add_shortcode('social-icons', 'sc_social');


/*****************************************************/
/* Show social share buttons
/*****************************************************/

function sc_art_social_share( $atts, $content = null) {
	extract( shortcode_atts( array(
	  'return' => true,
	  'icons' => '',
	  'share_url' => urlencode(get_permalink()),
	  'share_title' => str_replace( ' ', '%20', get_the_title()),
    ), $atts ) );
    
    
    

	// Get Post Thumbnail for pinterest
	//$art-socialThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.$share_title.'&amp;url='.$share_url.'&amp;via=cftm';
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$share_url;
	//$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$share_url.'&amp;title='.$share_title;
	$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.urlencode(get_permalink()).'&amp;media='.$share_url.'&amp;description='.$share_title;

	//$social_icons .= '<div class="art-social">';
	$social_icons .= '<a class="art-social-link art-social-twitter" href="'. $twitterURL .'" title="Share on Twitter"></a>';
	$social_icons .= '<a class="art-social-link art-social-facebook" href="'.$facebookURL.'" target="_blank" title="Share on Facebook"></a>';
	//$social_icons .= '<a class="art-social-link art-social-linkedin" href="'.$linkedInURL.'" target="_blank"></a>';
    $social_icons .= '<a class="art-social-link art-social-pinterest" href="'.$pinterestURL.'" target="_blank" title="Save on Pinterest"></a>';
	//$social_icons .= '</div>';

	echo $social_icons;
}

add_shortcode('social-share', 'sc_art_social_share');

/*****************************************************/
/* Add phone shortcode */
/*****************************************************/

function aws_phone_sc( $atts, $content = null ) {
	extract( shortcode_atts( array(
    ), $atts ) );

	ob_start();
    echo get_field('options_phone','options');
	$output = ob_get_clean();
	return $output;    
}	
	
add_shortcode('phone', 'aws_phone_sc');

/*****************************************************/
/* Add phone link shortcode */
/*****************************************************/

function aws_phone_link_sc( $atts, $content = null ) {
	extract( shortcode_atts( array(
    ), $atts ) );

	ob_start();
    echo get_field('phone_link_footer','options');
	$output = ob_get_clean();
	return $output;    
}	
	
add_shortcode('phone-link', 'aws_phone_link_sc');


/*****************************************************/
/* Add Accordion */
/*****************************************************/

function sc_accordion( $atts, $content = null) {
	extract( shortcode_atts( array(
        'id' => '',
        'title' => '',
      ), $atts ) );
    
      
    ob_start();

    $accordion_id = $id;

    if ($accordion_id):
        include(locate_template('template-parts/partials/partial-accordion.php'));
    endif;
	?>

	<?php
	$output = ob_get_clean();
	return $output;
}

add_shortcode('faq', 'sc_accordion');
add_shortcode('accordion', 'sc_accordion');


/*****************************************************/
/* Add read more */
/*****************************************************/


function sc_read_more( $atts, $content = null) {
	extract( shortcode_atts( array(
        'moretext' => 'Read more',
        'lesstext' => 'Read Less',
      ), $atts ) );
    
    $rid = 'rm-'.substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 7);
      
    ob_start();
   
    ?>

	<div id="<?= $rid; ?>" class="read-more-wrapper hidden">
        <?= $content; ?>
    </div>    
    <a href="#" class="read-more-toggle" data-moretext="<?= $moretext;?>" data-lesstext="<?= $lesstext;?>"><?= $moretext; ?></i></a>
	
	<?php
	$output = ob_get_clean();
	return $output;
}

add_shortcode('read-more', 'sc_read_more');


/*****************************************************/
/* Add tooltip
/*****************************************************/

function sc_tooltip( $atts, $content = null) {
	extract( shortcode_atts( array(
	  'title' => '',
	  'icons' => '',
    ), $atts ) );
    
    ob_start();
    ?>

    <div class="tooltip">
        <?= $title; ?><i class="fas fa-info-circle"></i>
        <span class="tooltiptext tooltip-top">
            <?= $content; ?>
        </span>
    </div>

    <?php
	$output = ob_get_clean();
	return $output;
}

add_shortcode('tooltip', 'sc_tooltip');



/*****************************************************/
/* Add read more */
/*****************************************************/


function sc_icon( $atts, $content = null) {
	extract( shortcode_atts( array(
        'icon' => '',
      ), $atts ) );
    

    if ($icon):

    ob_start();
   
    echo get_icon($icon);

    $output = ob_get_clean();
    
    return $output;

    else:
        return false;
    endif;
}

add_shortcode('icon', 'sc_icon');


/*****************************************************/
/* Add highlight */
/*****************************************************/


function sc_highlight( $atts, $content = null) {
	extract( shortcode_atts( array(
        'colour' => '#ff9a00',
      ), $atts ) );
    

    ob_start();
    ?>
    
    <span style="color: <?= $colour; ?>"><?= $content; ?></span>

    <?php
    $output = ob_get_clean();
    
    return $output;

}

add_shortcode('highlight', 'sc_highlight');
