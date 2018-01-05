<?php

get_header();
?>
<div class="row">
	<div class="small-12 columns">
		<h1><?php printf( esc_html__( 'Search Results for: %s', 'lorainccc' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</div>
</div>
<div class="row">
	<div class="small-12 columns">
<?php	

 while ( have_posts() ) : the_post();

		switch_to_blog($post->blog_id);
	 
		get_template_part( 'template-parts/content', 'search' );
  
		restore_current_blog();
		
 endwhile; // end of the loop.
?>
	</div>
</div>
	<?php
get_footer();

?>