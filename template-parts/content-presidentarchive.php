<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */


?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

	<?php the_post_thumbnail(); ?>

	<header class="entry-header">
		<?php	
				the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
		?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

</article><!-- #post-## -->
