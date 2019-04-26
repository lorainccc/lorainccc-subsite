<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

//Get custom fields

$last_name = $post->lc_fac_staff_dir_lastname_field;
$first_name = $post->lc_fac_staff_dir_firstname_field;
$title_name = $post->lc_fac_staff_dir_position_field;
$office_loc = $post->lc_fac_staff_dir_office_location_field;
$phone_ext = $post->lc_fac_staff_dir_phone_field;
$email_addr = $post->lc_fac_staff_dir_email_field;
$sched_appt = $post->lc_fac_staff_dir_advisor_schedule_field;

?>
	<div class="row small-up-1 medium-up-7 fac-dir-list">
    <div class="column facdir-content"><?php echo $last_name; ?></div>
    <div class="column facdir-content"><?php echo $first_name; ?></div>
    <div class="column facdir-content"><?php echo $title_name; ?></div>
    <?php if($office_loc <> ''){ ?>
    <div class="column facdir-content"><?php echo $office_loc; ?></div>		
  <?php
  }else{ ?>
    <div class="column facdir-content">&nbsp;</div>
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
  <div class="column facdir-content">&nbsp;</div>
</div>
<!-- #post-## -->
