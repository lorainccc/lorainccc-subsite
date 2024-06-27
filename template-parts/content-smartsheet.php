<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" role="presentation">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			$smartsheet_emebd_url = get_post_meta( $post->ID, 'lc_smartsheet_embed_url_field', true );
			$smartsheet_iframe_height = get_post_meta( $post->ID, 'lc_smartsheet_embed_height_field', true );
			$smartsheet_iframe_width = get_post_meta( $post->ID, 'lc_smartsheet_embed_width_field', true );
			$smartsheet_field_name = rawurlencode(get_post_meta( $post->ID, 'lc_smartsheet_field_name_field', true ));
			$page_url = $_GET['siteurl'];

			if($page_url != ""){
				echo '<iframe width="' . $smartsheet_iframe_width . '" height="' . $smartsheet_iframe_height . '" frameborder="0" src="' . $smartsheet_emebd_url . '?' . $smartsheet_field_name . '=' . $page_url .'"></iframe>';
			}else{
				echo '<iframe width="' . $smartsheet_iframe_width . '" height="' . $smartsheet_iframe_height . '" frameborder="0" src="' . $smartsheet_emebd_url . '"></iframe>';
			}

	// Display the Shared Content Feed
  
   $sharedcontentsiteurl = get_post_meta( $post->ID, 'lc_shared_content_site_url_field', true );
   $sharedcontentpostslug = get_post_meta( $post->ID, 'lc_shared_content_post_slug_field', true );
    
     if ($sharedcontentsiteurl != ''){
        
    $contenturl = trailingslashit( 'https://' . $_SERVER['SERVER_NAME'] . '/' . $sharedcontentsiteurl ) . 'wp-json/wp/v2/posts?slug=' . $sharedcontentpostslug;
    echo $contenturl;
    $sharedcontenturl = new lcEndPoints( $contenturl );
    
    $sharedcontent = new lcContent( 1 );
    $sharedcontent->lc_add_endpoint ( $sharedcontenturl );
    $sharedposts = $sharedcontent->lc_get_posts();
        if(empty($sharedposts)){
		   echo 'No Posts Found!';
	   }
    
    foreach ( $sharedposts as $post ){
     echo $post->content->rendered;
    }
   }
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lorainccc' ),
				'after'  => '</div>',
			) );
		?>
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
</article><!-- #post-## -->
