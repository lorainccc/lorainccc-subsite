<?php
/**
 * 
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
$directory_display = get_option( 'lccc_fac_staff_directory_display', '' );

get_header(); ?>
<div class="row page-content">
	<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
	</div>
		
	<div class="small-12 medium-12 large-12 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php 

		$directory_display = get_option( 'lccc_dept_directory_display', '' );

		$facdir_query = new WP_Query( $facdir_vars );
	
		if($directory_display == 'List'){
			echo '<div class="row">';
			echo ' <div class="small-12 columns text-center">';
			foreach (range('A', 'Z') as $char) {
				//echo $char . "\n";
			}
			echo ' </div>';
			echo '</div>';
			echo '<div class="row">';
			echo ' <div class="small-12 columns">&nbsp;</div>';
			echo '</div>';
			echo '<div class="row medium-up-6 facdir-header hide-for-small-only">';
			echo ' <div class="columns facdir-heading">Last Name</div>';
			echo ' <div class="columns facdir-heading">First Name</div>';
			echo ' <div class="columns facdir-heading">Department</div>';
			echo ' <div class="columns facdir-heading" style="width:125px; padding: 5px;">Office Location</div>';
			echo ' <div class="columns facdir-heading">Phone Number</div>';
			echo ' <div class="columns facdir-heading">Email</div>';
			echo '</div>';

		}

				while ( have_posts() ) : the_post();

				if($directory_display === 'Photo'){

				 get_template_part( 'template-parts/content', 'facdirectoryphoto' );

				}elseif($directory_display === 'List'){

				 get_template_part( 'template-parts/content', 'facdirectory' );

				}else{

			     get_template_part( 'template-parts/content', 'facdirectory' );

				}

			     endwhile; // end of the loop. ?>
<!--			</ul>-->
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
 //Jetpack Sharing Buttons
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 ?>
</div>
<?php get_footer(); ?>