<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$episodes_args = array(
  'post_type' => 'lccc_podcasts',
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'paged' => $paged
  );
  $episodes = new WP_Query($episodes_args);
					if ( $episodes->have_posts() ) :
        while ( $episodes->have_posts() ) : $episodes->the_post();

  $post_id = get_the_ID();
  $linkvalue = get_post_meta( $post_id, 'lc_podcasts_link_field', true );
  $linklabel = get_post_meta( $post_id, 'lc_podcasts_link_label_field', true );

    if ( $linkvalue == '' ) {
        $linkvalue = get_permalink($post_id);
    }

  $titleId = get_the_title();
  $titleId = strtolower( str_replace( ' ', '_', $titleId ) );

    ?>
        <section class="row programpaths">
											<div class="small-12 medium-3 large-3 columns">
                                                <a href="<?php echo get_permalink($post_id); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); ?></a>
											</div>
											<div class="small-12 medium-9 large-9 columns gtwymenu-content">
													<a href="<?php echo get_permalink($post_id); ?>"><h2 id="<?php echo $titleId; ?>"><?php the_title();?></h2></a>
													<?php the_content('<p>','</p>'); ?>
                                                    <a href="<?php echo $linkvalue; ?>" class="programpathlinks"><?php echo $linklabel; ?></a>
									</div>
								</section>

    <?php
        endwhile;
        ?>
        <div class="row">
        <div class="small-6 columns text-left">
          <?php previous_posts_link('Previous', $episodes->max_num_pages) ?>
        </div>
        <div class="small-6 columns text-right">
          <?php next_posts_link('Next', $episodes->max_num_pages) ?>
        </div>
      </div>
      <?php
					endif;
 wp_reset_query();

?>