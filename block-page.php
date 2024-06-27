<?php
/**
 * Template Name: Block Page Template
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
get_header(); ?>
<div class="small-12 medium-12 large-12 columns gateway-header hide-for-print">
	<?php the_post_thumbnail(); ?>
</div>

<div class="row page-content">
	<div class="small-12 medium-12 large-12 columns breadcrumb-container">
	<?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
	</div>
</div>
<?php while ( have_posts() ) : the_post();

get_template_part( 'template-parts/content', 'block' );

endwhile; // end of the loop. ?>

</main><!-- #main -->


</div>
<?php get_footer(); ?>
