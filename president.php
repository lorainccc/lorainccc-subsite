<?php
/**
 * Template Name: LCCC President
 *
 * @package LCCC Framework
 */

get_header(); ?>
<div class="row page-content">
<div class="small-12 columns nopadding show-for-small-only"><!--Begin Mobile Side Menu -->
 <div class="small-12 medium-12 large-12 columns nopadding">
  <div class="row show-for-small-only sub-mobile-menu-row hide-for-print" style="background:#000;">
   <div class="small-2 columns" style="padding-top: 0.5rem;padding-left: 1.625rem;"> <span data-responsive-toggle="sub-responsive-menu" data-hide-for="medium">
     <button class="menu-icon" type="button" data-toggle></button>
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
<div class="medium-4 large-4 columns hide-for-small-only hide-for-print">
	<div class="small-12 medium-12 large-12 columns sidebar-widget">
	<?php	if ( has_nav_menu( 'left-nav' ) ) : ?>
	 <div class="small-12 medium-12 large-12 columns sidebar-menu-header">
   <h3><?php echo bloginfo('the-title'); ?></h3>
  </div>
 <div id="secondary" class="medium-12 columns secondary nopadding">
		<?php if ( has_nav_menu( 'left-nav' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'left-nav',
					) );
				?>
			</nav><!-- .main-navigation -->
				<?php endif; ?>
		<?php endif; ?>
  <?php if ( is_active_sidebar( 'lccc-badges-sidebar' ) ) { ?>
			<div class="small-12 medium-12 large-12 columns hide-for-print">
			<?php dynamic_sidebar( 'lccc-badges-sidebar' ); ?>
			</div>
	<?php } ?>
	</div>
	</div>
 	<!--<div class="small-12 medium-12 large-12 columns">
				<?php //if ( is_active_sidebar( 'lccc-events-sidebar' ) ) { ?>
							<?php //dynamic_sidebar( 'lccc-events-sidebar' ); ?>
				<?php //} ?>
	</div>-->
	</div>
	<div class="small-12 medium-8 large-8 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();

				 get_template_part( 'template-parts/content', 'page' );

			     endwhile; // end of the loop. ?>

		</main><!-- #main -->
  <section class="section-divider">
  <h2>Upcoming Events</h2>
  <?php
   $presidentevents = '';
   $domain = 'http://' . $_SERVER['SERVER_NAME'];
   // ID of the President Category in MyLCCC (Production is 51)
   $catId = 51;
   $presidentevents = new Endpoint( $domain . '/mylccc/wp-json/wp/v2/lccc_events?event_categories=' . $catId . '&per_page=3');
   
   $multi = new MultiBlog( 1 );
   $multi->add_endpoint ( $presidentevents );
   
   $event_posts = $multi->get_posts();
   if (empty($event_posts)){
    echo 'No Posts Found!';
   }else{
    
    foreach ( $event_posts as $event_post ){
     echo '<div class="row">';
      echo ' <div class="small-12 medium-12 large-1 columns calendar-small">';
      $date = date_create($event_post->event_end_date);
      $post_month = date_format($date, 'm');
      echo ' <p class="month">'.$event_post->event_start_date_month.'</p>';
      echo ' <p class="day">'.$event_post->event_start_date_day.'</p>';
      echo ' </div>';
      echo ' <div class="small-12 large-11 columns">';
     ?>
     <a href="<?php echo $event_post->link; ?>"><?php echo $event_post->title->rendered; ?></a><?php

      echo ' <p>' . $event_post->excerpt->rendered . '</p>' ;
      echo '</div>';
     echo '</div>';
    }
    
   }   
   
   ?>
  </section>
  <!-- Begin Social Media Grid -->
  <section class="section-divider">
  <h2>Connect with the President</h2>
   <div class="row">
    <?php if ( is_active_sidebar( 'lccc-president-twitter-sidebar' ) ) { ?>
    <div class="small-12 columns">
    <?php dynamic_sidebar( 'lccc-president-twitter-sidebar' ); ?>
    </div>
  <?php } ?>  
   </div>
  <div class="row">
   <div class="small-12">
    &nbsp;
   </div>
  </div>
  <div class="row small-up-1 medium-up-2 large-up-4">
    <div class="column column-block small-centered">
     <a href="https://www.facebook.com">
      <div style="background: #0055a5; width: 100px; height: 100px; padding:15px; border-radius: 50px; margin:0 auto;">
      <img src="/wp-content/themes/lorainccc-subsite/images/icons/facebook_white.svg" border="0" />
     </div>
     </a>
    </div>
    <div class="column column-block small-centered">
     <a href="https://www.twitter.com">
       <div style="background: #0055a5; width: 100px; height: 100px; padding:15px; border-radius: 50px; margin:0 auto;">
        <img src="/wp-content/themes/lorainccc-subsite/images/icons/twitter_white.svg" border="0" />
       </div>
      </a>
    </div>
    <div class="column column-block small-centered">
     <a href="https://www.instagram.com">
      <div style="background: #0055a5; width: 100px; height: 100px; padding:15px; border-radius: 50px; margin:0 auto;">
       <img src="/wp-content/themes/lorainccc-subsite/images/icons/instagram_white.svg" border="0" />
      </div>
     </a>
    </div>
    <div class="column column-block small-centered">
     <a href="/president/blog" title="Follow the president's blog">
      <div style="background: #0055a5; width: 100px; height: 100px; padding:20px 8px 0 10px; border-radius: 50px; margin:0 auto;">
       <img src="/wp-content/themes/lorainccc-subsite/images/icons/lccc_white.svg" border="0" />
      </div>
     </a>
    </div>
  </div>
  <!-- End Social Media Grid -->
  </section>
  <section class="section-divider">
  <!-- Start Blog Post List -->
  <?php
   $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
   );
  $the_query = new WP_Query( $args );
  
  if ( $the_query->have_posts() ){
   while( $the_query->have_posts() ){
    $the_query->the_post();
     echo '<div class="row">';
     echo ' <div class="small-12 columns">';
     echo '  <h2>' . get_the_title() . '</h2>';
     echo '  <p>' . get_the_excerpt() . '</p>';
     echo ' </div>';
     echo '</div>';
    }
  }
  ?>  
  <p style="text-align:center;"><a class="button" href="blog/">View all posts</a></p>
  </section>
  <!-- End Blog Post List -->
  <!-- Begin In the News Section -->
  <section class="section-divider">
   <div class="row">
    <?php if ( is_active_sidebar( ' lccc-president-in-news' ) ) { ?>
			<div class="small-12 columns">
			<?php dynamic_sidebar( ' lccc-president-in-news' ); ?>
       </div>
	<?php } ?>  
    </div>
   </section>
  <!-- End In the News Section -->
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
