<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

//Get custom fields
global $post;

$post_id = $post->ID;

$last_name = get_post_meta( $post_id, 'lc_fac_staff_dir_lastname_field', true);
$first_name = get_post_meta( $post_id, 'lc_fac_staff_dir_firstname_field', true);

$dept_args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
$dept_list = wp_get_post_terms( $post_id, 'lcdeptdir_deptartments', $dept_args );

$office_loc = get_post_meta( $post_id, 'lc_fac_staff_dir_office_location_field', true);
$phone_ext = get_post_meta( $post_id, 'lc_fac_staff_dir_phone_field', true);
$email_addr = get_post_meta( $post_id, 'lc_fac_staff_dir_email_field', true);
$sched_appt = get_post_meta( $post_id, 'lc_fac_staff_dir_advisor_schedule_field', true);

?>
	<div class="row small-up-1 medium-up-6 fac-dir-list">
    <div class="column facdir-content"><?php echo $last_name; ?></div>
    <div class="column facdir-content"><?php echo $first_name; ?></div>
    <div class="column facdir-content">
    <?php
        foreach($dept_list as $dept){
          if($dept->name <> ''){
          echo $dept->name . '<br/>';
          }						
        }
    ?>
    </div>
    <?php if($office_loc <> ''){ ?>
    <div class="column facdir-content" style="width:125px;"><?php echo $office_loc; ?></div>		
  <?php
  }else{ ?>
    <div class="column facdir-content" style="width:125px;">&nbsp;</div>
  <?php
  }
  ?>
  <div class="column facdir-content">
  <?php 
          if(strlen($phone_ext) == 4){
              echo '<a href="tel:(440) 366-' . $phone_ext .'">(440) 366-' . $phone_ext . '</a>';
            }else{
              echo $phone_ext;
            }
      ?>
  </div>
  <div class="column facdir-content"><?php echo '<a href="mailto:' . $email_addr . '">' . $email_addr . '</a>';?></div>
</div>
<!-- #post-## -->
