<?php
/**
 * The template for displaying all pages.
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
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
<div class="small-12 medium-8 large-8 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
   <?php 
		the_archive_title( '<h1 class="page-title">', '</h1>' );
  ?>
		<?php while ( have_posts() ) : the_post();

				 get_template_part( 'template-parts/content', 'blog');

			     endwhile; // end of the loop. ?>
   
   <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
   <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

  </main><!-- #main -->
	</div><!-- #primary -->
</div>
<div class="small-12 medium-4 large-4 columns">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
				<?php } ?>

</div>
<?php 
 
      get_footer(); ?>