<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
  * @package AWS_Custom_Theme
 */
$image = get_the_post_thumbnail(get_the_ID(),  'content-width-hero');

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">

        <header class="no-hero-page-header">
            <div class="container">
                <div class="grid">	
                    <div class="col">            
                        <h1><?= the_title(); ?></h1>
                        <?php
                        if ( 'post' === get_post_type() ) :
                            ?>
                            <div class="entry-meta">
                                <?php
                                aws_custom_posted_on();
                                ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>                        
                    </div>
                </div>
            </div>
        </header>              
    </div>
    <section class="<?= ($image ? ' with-image' : ''); ?>">
        <div class="container">
            <div class="grid">	
                <div class="col">	
                    <?= $image; ?>
                    <?= the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</article>

