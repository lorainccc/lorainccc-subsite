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
        <div class="row">
        <div class="small-8 columns">  
        <?php

            global $post;

            $post_id = $post->ID;

            $title_args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
            $title_list = wp_get_post_terms( $post_id, 'lcdeptdir_positiontype', $title_args );

            $dept_args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
            $dept_list = wp_get_post_terms( $post_id, 'lcdeptdir_deptartments', $dept_args );

            $office_loc = get_post_meta( $post_id, 'lc_fac_staff_dir_office_location_field', true);
            $phone_ext = get_post_meta( $post_id, 'lc_fac_staff_dir_phone_field', true);
            $email_addr = get_post_meta( $post_id, 'lc_fac_staff_dir_email_field', true);
            $sched_appt = get_post_meta( $post_id, 'lc_fac_staff_dir_advisor_schedule_field', true);

            the_title( '<h1>', '</h1>' );
            
            foreach($title_list as $title){
                if($title->name <> ''){
                echo '<h2>' . $title->name . '</h2>';
                }
            }

            if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; endif;
        ?>
        </div>

            <div class="small-4 columns text-center">
            <?php
            if( has_post_thumbnail() ){
				the_post_thumbnail();
		    } else {
			    echo "<img src='" . get_stylesheet_directory_uri() . "/images/icons/facdir-no-photo.jpg' style='width:250px; border: 1px solid #999; padding: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,.5);margin:0 auto 20px auto;' alt='placeholder image'/>";
            }
            ?>
            <p style="text-align:left;">
                <b>Office Location:</b> <?php echo $office_loc;?> <br/>
                <b>Phone Extension:</b> <?php echo '<a href="(440) 366-' . $phone_ext .'">(440) 366-' . $phone_ext . '</a>';?> <br/>
                <b>Email Address:</b> <?php echo '<a href="' . $email_addr .'">' . $email_addr . '</a>';?> <br/>
            </p>
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