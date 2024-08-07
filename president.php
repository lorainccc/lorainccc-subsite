<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: LCCC President
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package LCCC Framework
 */

get_header();
?>
<div class="row page-content">
<div class="small-12 columns nopadding show-for-small-only"><!--Begin Mobile Side Menu -->
 <div class="small-12 medium-12 large-12 columns nopadding">
  <div class="row show-for-small-only sub-mobile-menu-row hide-for-print" style="background:#000;">
   <div class="small-2 columns" style="padding-top: 0.5rem;padding-left: 1.625rem;"> <span data-responsive-toggle="sub-responsive-menu" data-hide-for="medium">
     <button class="menu-icon" type="button" data-toggle>Toggle Sidebar Menu</button>
     </span> </div>
   <div class="small-10 columns nopadding hide-for-print">
    <h3 class="sub-mobile-menu-header" style="padding-top: 6px;
   padding-left: 8px;color:#ffffff ;"><?php echo bloginfo('the-title'); ?></h3></div>
  </div>
  <div id="sub-responsive-menu" class="show-for-small-only hide-for-print">
   <ul class="vertical menu" data-drilldown data-parent-link="true">

    <?php     
    
    wp_nav_menu(array(
        'container' => false,
        'menu' => __( 'Drill Menu', 'textdomain' ),
        'menu_class' => 'vertical menu',
        'theme_location' => 'left-nav',
        'menu_id' => 'sub-mobile-primary-menu', //Recommend setting this to false, but if you need a fallback...
        'fallback_cb' => 'lc_drill_menu_fallback',
        'walker' => new lc_drill_menu_walker(),
           ));
                    ?>

   </ul>
  </div>
 </div>
</div><!--End Mobile Side Menu -->
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
<div class="small-12 medium-8 large-8 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
   <?php 
 if(get_option('lc_blog_archive_title') != ''){?>
   <h1><?php echo get_option('lc_blog_archive_title'); ?></h1>
 <?php } ?>
		<?php while ( have_posts() ) : the_post();

				 get_template_part( 'template-parts/content', 'blog');

			     endwhile; // end of the loop. ?>
   
   <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
   <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

  </main><!-- #main -->
	</div><!-- #primary -->
</div>
<div class="small-12 medium-4 large-4 columns">
	<?php
 //Jetpack Sharing Buttons
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 ?>
</div>
<?php  
      get_footer(); ?>