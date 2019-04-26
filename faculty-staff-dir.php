<?php
/**
 * Template Name: Faculty Staff Directory Template
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
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
			$department_id = get_option( 'lccc_dept_directory_department', '' );

			$domain = 'http://' . $_SERVER['HTTP_HOST'];
			
			$request = wp_remote_get( $domain . '/mylccc/wp-json/wp/v2/lccc_directory?filter[orderby]=lc_fac_staff_dir_lastname_field&order=asc&lcdeptdir_deptartments=' . $department_id . '&per_page=100');

			if( is_wp_error( $request ) ){
			return false;
			}



			$body = wp_remote_retrieve_body( $request );

			$posts = json_decode( $body );
			if(! empty( $posts ) ) {
			
				if($directory_display == 'List'){

					echo '<div class="row">';
					echo ' <div class="small-12 columns">&nbsp;</div>';
					echo '</div>';
					echo '<div class="row medium-up-7 facdir-header hide-for-small-only">';
					echo ' <div class="columns facdir-heading">Last Name</div>';
					echo ' <div class="columns facdir-heading">First Name</div>';
					echo ' <div class="columns facdir-heading">Title</div>';
					echo ' <div class="columns facdir-heading">Office Location</div>';
					echo ' <div class="columns facdir-heading">Phone Number</div>';
					echo ' <div class="columns facdir-heading">Email</div>';
					echo ' <div class="columns facdir-heading">&nbsp;</div>';
					echo '</div>';
		
				}
		
				if($directory_display == 'Photo'){
					echo '<div class="row">';
					echo '	<div class="small-12 columns" style="padding:0 60px;">';
				}
				foreach( $posts as $post ){
					if($directory_display == 'Photo'){
			
						get_template_part( 'template-parts/content', 'rest_facdirectoryphoto' );
			
					}elseif($directory_display == 'List'){
						
						get_template_part( 'template-parts/content', 'rest_facdirectory' );
			
					}else{
			
						get_template_part( 'template-parts/content', 'rest_facdirectory' );
			
					}
				} // end of the loop.
			}
				if($directory_display == 'Photo'){
				 echo '	</div>';
				 echo '</div>';				
				}

			?>
			</div>
		</div>
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