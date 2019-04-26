<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

//Get custom fields


$title_name = $post->lc_fac_staff_dir_position_field;
$office_loc = $post->lc_fac_staff_dir_office_location_field;
$phone_ext = $post->lc_fac_staff_dir_phone_field;
$email_addr = $post->lc_fac_staff_dir_email_field;
$sched_appt = $post->lc_fac_staff_dir_advisor_schedule_field;

$title = $post->lcdeptdir_positiontype[0];

?>

<article id="post-<?php echo $post->ID; ?>" <?php post_class( 'fac-dir' ); ?>>
	<div class="entry-content facdir">
        <?php
        
        if( $post->better_featured_image ){
				echo '<img src="' . $post->better_featured_image . '">';
		} else {
			echo "<img src='" . get_stylesheet_directory_uri() . "/images/icons/facdir-no-photo.jpg' alt='placeholder image'/>";
		}
		
		?>
		<footer class="facdir-footer">
				<?php echo '<span class="facdir-entry-title">' . $post->title->rendered . '</span>'; ?>
				<span class="facdir-addtl-info">
					<p><?php 
							echo $title_name . '<br/>';
						
						if($phone_ext <> ''){
							if(strlen($phone_ext) == 4){
								echo '<a href="tel:440366' . $phone_ext .'">(440) 366-' . $phone_ext . '</a>';
							}else{
								echo $phone_ext;
							}
						}
						if($office_loc <> ''){
							echo ' | '. $office_loc .'<br/>';
						}else{
							echo '<br/>';
						}

					 echo '<a href="mailto:' . $email_addr . '">' . $email_addr . '</a>'; 
						if ($sched_appt != ''){
							echo '<br/>';
							echo '<a href="' . $sched_appt . '" target="_blank">Schedule an appointment</a>';
                        }
					?>
					</p>
				</span>
		</footer>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'lorainccc' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
	<?php endif; ?>
</article><!-- #post-## -->
