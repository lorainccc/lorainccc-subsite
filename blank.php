<?php
/**
 * Template Name: Blank Template
 *
 * @package LCCC Framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-7542329-2', 'auto', {'allowLinker': true});
  ga('require', 'linker');
  ga('linker:autoLink', ['sites.lorainccc.edu'] );
  ga('send', 'pageview');

</script>
</head>
	
	<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text hide-for-print" href="#content"><?php esc_html_e( 'Skip to content', 'lccc-framework' ); ?></a>
	
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
					<div class="small-12 medium-12 large-12 columns gateway-header hide-for-print">
					<?php the_post_thumbnail(); ?>
					</div>
			<div class="row">
				<div class="small-12 columns">
					<?php while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'noimage' );

										endwhile; // end of the loop. ?>
					</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
		</div>
	
<?php wp_footer(); ?>

</body>
</html>