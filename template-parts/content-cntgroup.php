<?php
/**
 * Template part for displaying page content in content-group.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */
global $post;

$lcEnableContentGroupDisplay = get_post_meta( $post->ID, 'lc_microsite_enable_content_group_display' , true);
$lcCategoryToShow = get_post_meta( $post->ID, 'lc_microsite_grouping_category' , true);


if( $lcEnableContentGroupDisplay == 1 ):

?>
<div class="small-12 medium-12 large-12 columns">
	<?php 

		if( $lcCategoryToShow != ''){

				$cntgroupargs=array(
					'post_type' => 'content_group',
					'post_status' => 'publish',
					'category_name' => $lcCategoryToShow,
					'orderby'=> 'title',
					'order' =>'asc',
					);	

			}else{

				$cntgroupargs=array(
					'post_type' => 'content_group',
					'post_status' => 'publish',
					'orderby'=> 'title',
					'order' =>'asc',
					);	

			}
			$content_group = new WP_Query($cntgroupargs);
		
			if ( $content_group->have_posts() ) :
					while ( $content_group->have_posts() ) : $content_group->the_post();
				?>
						<section class="row gateway-links">
									<div class="small-12 medium-3 large-3 columns">										
												<?php the_post_thumbnail(); ?>		
									</div>
									<div class="small-12 medium-9 large-9 columns gtwymenu-content">
											<?php the_title('<h2>','</h2>' );?>
											<?php the_content('<p>','</p>'); ?>
							</div>
						</section>
				<?php							
					endwhile;
			
			endif;

	?>
</div>
<?php

endif;

?>
