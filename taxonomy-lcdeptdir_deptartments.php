<?php
/**
 * 
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
get_header(); ?>
<a name="#top">
<div class="row page-content">
	<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
	</div>
		
	<div class="small-12 medium-12 large-12 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php

        $departmentlist = get_terms( array(
            'taxonomy' => 'lcdeptdir_deptartments',
            'orderby' => 'name',
            'hide_empty' => true,
            )
        );

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$directory_display = get_option( 'lc_dept_directory_display', '' );

		if ( get_query_var($taxonomy) ){
			$facdir_vars = array(
				'post_type' 		=> 'faculty_staff_dir',
				'posts_per_page' 	=> -1,
				'meta_key' 			=> 'lc_fac_staff_dir_lastname_field',
				'orderby'			=> 'meta_value',
				'order' 			=> 'ASC',
				'tax_query' => array(
						array(
							'taxonomy' 	=> 'lcdeptdir_deptartments',
							'field'		=> 'slug',
							'terms'		=>	get_query_var($taxonomy),
						),
				),
			);
		}
		

		$facdir_query = new WP_Query( $facdir_vars );
	
		$selectedDepartment = "/mylccc/lcdeptdir_deptartments/" . get_query_var($taxonomy);
		
		echo '<div class="row">';
        echo '<div class="small-12 medium-6 columns">By Department: <select name="lc_department_name" id="lc_department_name" class="postform" style="width:360px;" onchange="location = this.options[this.selectedIndex].value;">';
		echo '<option value="" id=""> -- Please select a department to continue -- </option>';
        foreach ( $departmentlist as $department ) {
			$dept_path = "/mylccc/lcdeptdir_deptartments/" . $department->slug;
            echo '<option value=' . $dept_path . '" id="' . $department->slug . '"', $selectedDepartment == $dept_path ? 'selected="selected"' : '', '">' . $department->name . '</option>';
        }
        echo '</select>';
        echo '</div>';
        echo '<div class="small-12 medium-6 columns text-right"><a href="/mylccc/faculty_staff_dir/">View Directory by Employee</a> | <a href="/faculty-and-staff/administration/department-telephone-directory/" target="_blank">View Department Directory</a></div>';
        echo '</div>';
        
        if($directory_display == 'List'){
			
			echo '<div class="row">';
			echo ' <div class="small-12 columns">&nbsp;</div>';
			echo '</div>';
			echo '<div class="row medium-up-5 facdir-header hide-for-small-only">';
			echo ' <div class="columns facdir-heading" style="width:150px;">Last Name</div>';
			echo ' <div class="columns facdir-heading" style="width:150px;">First Name</div>';
			echo ' <div class="columns facdir-heading" style="width:400px;">Position Title</div>';
			echo ' <div class="columns facdir-heading" style="width:125px; padding:5px;">Office Location</div>';
			echo ' <div class="columns facdir-heading">Phone Number</div>';
			echo '</div>';

		}
        if($directory_display == 'Photo'){
		echo '<div class="row">';
        echo '	<div class="small-12 columns" style="padding:0 60px;">';
        }
		while ( $facdir_query->have_posts() ) : $facdir_query->the_post();

		if($directory_display == 'Photo'){

			get_template_part( 'template-parts/content', 'facdirectoryphoto' );

		}elseif($directory_display == 'List'){
			
			get_template_part( 'template-parts/content', 'facdirectorytax' );

		}else{

			get_template_part( 'template-parts/content', 'facdirectorytax' );

		}
        endwhile; // end of the loop. 
        if($directory_display == 'Photo'){
        ?>
			</div>
		</div>
        <?php
        }
        ?>
		<div class="row">
			<div class="small-12 columns">
				&nbsp;
			</div>
		</div>
        <div class="row">
			<div class="small-7 columns">
				<a href="/mylccc/online-employee-directory-request/">Click here to request a change or addition to the Faculty/Staff Directory</a>
			</div>
            <div class="small-5 columns text-right">
                <a href="#top">Return to Top</a>
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