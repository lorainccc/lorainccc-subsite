<?php
/**
 * @package LCCC Framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php
		$post_id = get_the_ID();
		$linkvalue = get_post_meta( $post_id, 'lc_podcasts_link_field', true );
		$linklabel = get_post_meta( $post_id, 'lc_podcasts_link_label_field', true );

	if( has_post_thumbnail() ){
		echo '<figure style="width: 300px;" class="wp-caption alignright">';
		the_post_thumbnail( 'medium' );
		echo '<figcaption class="wp-caption-text">' . get_post(get_post_thumbnail_id())->post_excerpt . '</figcaption>';
		echo '</figure>';
  	}

  	the_content(); 

 	if( $linkvalue != '' ){
		echo '<br/>';
		echo '<p><a href="' . $linkvalue . '">' . $linklabel . '</a></p>';
	}

  ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lccc-framework' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php lorainccc_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->