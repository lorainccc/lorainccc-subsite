<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

 $lcHideH1Headline = get_post_meta( $post->ID, 'lc_microsite_hide_h1_headline' , true);

if( $lcHideH1Headline == 1 ){
	/*echo '<div class="row page-content">';
		echo '<div class="small-12 medium-12 large-12 columns">';
		echo '&nbsp;';
		echo '</div>';
	echo '</div>';*/
} else {
	echo '<div class="row page-content">';
		echo '<div class="small-12 medium-12 large-12 columns">';
			echo '<header class="entry-header" role="presentation">';
				    the_title( '<h1 class="entry-title">', '</h1>' );
			echo '</header><!-- .entry-header -->';
		echo '</div>';
	echo '</div>';
}
?>
	<div class="row page-content">
		<div class="small-12 medium-12 large-12 columns">
<?php
			the_content();


			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lorainccc' ),
				'after'  => '</div>',
			) );
		?>
		</div>
	</div>
</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'lorainccc' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
	<?php endif; ?>

