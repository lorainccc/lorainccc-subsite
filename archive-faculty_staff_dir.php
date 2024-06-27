<?php
/**
 * 
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */get_header(); ?>
<div class="row page-content">
	<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
	</div>
		
	<div class="small-12 medium-12 large-12 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$directory_display = get_option( 'lc_dept_directory_display', '' );

		$args = array(
			'post_type' 		=> 'faculty_staff_dir',
			'posts_per_page' 	=> 20,
			'paged'				=> $paged,
			'meta_key' 			=> 'lc_fac_staff_dir_lastname_field',
			'orderby'			=> 'meta_value',
			'order'				=> 'ASC',
			
		);

		$the_query = new WP_Query( $args );
	
		$taxonomy = 'lcdeptdir_alphabet';

		// save the terms that have posts in an array as a transient
		if ( false === ( $alphabet = get_transient( 'lc_archive_alphabet' ) ) ) {
			// It wasn't there, so regenerate the data and save the transient
			$terms = get_terms($taxonomy);

			$alphabet = array();
			if($terms){
				foreach ($terms as $term){
					$alphabet[] = $term->slug;
				}
			}
			set_transient( 'lc_archive_alphabet', $alphabet, 86400 );
		} 
		
		echo '<div class="row">';
		echo ' <div class="small-12 columns text-center">';
		echo '  <ul class="facdir-alpha-index">';
		foreach (range('a', 'z') as $char) {
			$current = ($char == get_query_var($taxonomy)) ? "current-alpha-character" : "alpha-character";
			
			if( in_array( $char, $alphabet ) ){				
				echo '<li class="az-characters ' . $current .'"><a href="' . get_term_link( $char, $taxonomy) .'">' . strtoupper($char) . '</a></li>';
			}else {
				echo '<li class="az-characters ' . $current .'">' . strtoupper($char) .'</li>';
			}
		}
		echo '  </ul>';
		echo ' </div>';
		echo '</div>';
		echo '<div class="row">';
		echo ' <div class="small-12 columns text-center">';
		echo '<a href="/mylccc/lcdeptdir_deptartments/academic-and-learner-services/">View Directory by Department</a>';
		echo ' </div>';
		echo '</div>';


		if($directory_display == 'List'){

			echo '<div class="row">';
			echo ' <div class="small-12 columns">&nbsp;</div>';
			echo '</div>';
			echo '<div class="row medium-up-5 facdir-header hide-for-small-only">';
			echo ' <div class="columns facdir-heading" style="width:150px;">Last Name</div>';
			echo ' <div class="columns facdir-heading" style="width:150px;">First Name</div>';
			echo ' <div class="columns facdir-heading" style="width:400px;">Department</div>';
			echo ' <div class="columns facdir-heading" style="width:125px; padding:5px;">Office Location</div>';
			echo ' <div class="columns facdir-heading">Phone Number</div>';
			echo '</div>';

		}

		if($directory_display == 'Photo'){
			echo '<div class="row">';
			echo '	<div class="small-12 columns" style="padding:0 60px;">';
		}
		while ( $the_query->have_posts() ) : $the_query->the_post();

		if($directory_display == 'Photo'){

			get_template_part( 'template-parts/content', 'facdirectoryphoto' );

		}elseif($directory_display == 'List'){
			
			get_template_part( 'template-parts/content', 'facdirectory' );

		}else{

			get_template_part( 'template-parts/content', 'facdirectory' );

		}
		endwhile; // end of the loop. 
		if($directory_display == 'Photo'){?>
			</div>
		</div>
		<?php
		}
		?>
		<div class="row">
			<div class="small-6 columns text-left">
				<?php previous_posts_link('Previous', $facdir_query->max_num_pages) ?>
			</div>
			<div class="small-6 columns text-right">
				<?php next_posts_link('Next', $facdir_query->max_num_pages) ?>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<a href="/mylccc/online-employee-directory-request/">Click here to request a change or addition to the Faculty/Staff Directory</a>
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