<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHtml::_('behavior.tooltip');

$user           = JFactory::getUser();
$userId         = $user->get('id');
?>

<div id="club_member">
<div id="club_member_top">
<div id="club_member_head">
<h2><?php echo JText::_('COM_CLUB_MEMBER_PLAYER_PROFILE'); echo $this->item->name; ?></h3>
</div> <!-- /club_member_head -->
<div id="club_member_left" style="width:50%;float:left;">

<?php if ( $this->item->picture_html ) : ?>
<?php echo $this->item->picture_html; ?>
<?php endif; ?>

<ul>
<?php if ( $this->item->number ) : ?>
<li>
  <?php echo JText::_('COM_CLUB_MEMBER_NUMBER_LABEL'); echo $this->item->number; ?>
</li>
<?php endif; ?>
<?php if ( $this->item->name ) : ?>
<li>
  <?php echo JText::_('COM_CLUB_MEMBER_NAME_LABEL'); echo $this->item->name; ?>
</li>
<?php endif; ?>
</ul>
</div> <!-- /club_member_left -->
<div id="club_member_right" style="width:50%;float:right;">

<table width="100%" style="border-style:none">
<?php if ( $this->item->nicknames ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_NICKNAMES_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->nicknames; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->position ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_POSITION_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->position; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->dob ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_DOB_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->dob; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->residence ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_RESIDENCE_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->residence; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->home_town ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_HOME_TOWN_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->home_town; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->nationality ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_NATIONALITY_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->nationality; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->fave_player ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_FAVE_PLAYER_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->fave_player; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->height_weight ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_HEIGHT_WEIGHT_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->height_weight; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->joining_date ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_JOINING_DATE_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->joining_date; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->leaving_date ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_LEAVING_DATE_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->leaving_date; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->school_attending ) : ?>
<tr>

<td>
  <?php echo JText::_('COM_CLUB_MEMBER_SCHOOL_ATTENDING_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->school_attending; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->graduating_class ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_GRADUATING_CLASS_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->graduating_class; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->gpa ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_GPA_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->gpa; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->sat_act ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_SAT_ACT_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->sat_act; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->level_rating ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_LEVEL_RATING_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->level_rating; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->decision_makers ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_DECISION_MAKERS_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->decision_makers; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->conference ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_CONFERENCE_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->conference; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->item->first_name || $this->item->middle_name || $this->item->last_name) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_MEMBER_NAME_LABEL'); ?>
</td>
<td>
  <?php echo $this->item->first_name . " " .  $this->item->middle_name . " " . $this->item->last_name; ?>
</td>
</tr>
<?php endif; ?>

</table>
</div> <!-- /club_member_right -->
</div> <!-- /club_member_top -->

<div id="club_member_middle1" style="clear:both">
<div id="club_member_left" style="width:50%;float:left;">

<?php if ( $this->item->club_history ) : ?>
<h3><?php echo JText::_('COM_CLUB_MEMBER_CLUB_HISTORY_LABEL'); ?></h3>
<?php echo $this->item->club_history; ?>
<?php endif; ?>

</div> <!-- /club_member_left -->
<div id="club_member_right" style="width:50%;float:right;">

<?php if ( $this->item->about ) : ?>
<h3><?php echo JText::_('COM_CLUB_MEMBER_ABOUT_LABEL'); ?></h3>
<?php echo $this->item->about; ?>
<?php endif; ?>

</div> <!-- /club_member_right -->
</div> <!-- /club_member_middle1 -->

<div id="club_member_middle2" style="clear:both">
<div id="club_member_left" style="width:50%;float:left;">

<?php if ( $this->item->honours ) : ?>
<h3><?php echo JText::_('COM_CLUB_MEMBER_HONOURS_LABEL'); ?></h3>
<?php echo $this->item->honours; ?>
<?php endif; ?>

</div> <!-- /club_member_left -->
<div id="club_member_right" style="width:50%;float:right;">

<?php if ( $this->item->quote ) : ?>
<h3><?php echo JText::_('COM_CLUB_MEMBER_QUOTE_LABEL'); ?></h3>
<?php echo $this->item->quote; ?>
<?php endif; ?>

</div> <!-- /club_member_right -->
</div> <!-- /club_member_middle2 -->

<div id="club_member_bottom" style="clear:both">
<div id="club_member_left" style="width:50%;float:left;">

<?php if ( $this->item->travel_schedule ) : ?>
<h3><?php echo JText::_('COM_CLUB_MEMBER_TRAVEL_SCHEDULE_LABEL'); ?></h3>
<?php echo $this->item->travel_schedule; ?>
<?php endif; ?>

</div> <!-- /club_member_left -->

<div id="club_member_right" style="width:50%;float:right;">

<?php if ( $this->item->hobbies ) : ?>
<h3><?php echo JText::_('COM_CLUB_MEMBER_HOBBIES_LABEL'); ?></h3>
<?php echo $this->item->hobbies; ?>
<?php endif; ?>

</div> <!-- /club_member_right -->
</div> <!-- /club_member_bottom -->

<div id="club_member_footer" style="clear:both">
<br/><br/>
<small><?php echo JText::_("COM_CLUB_DESIGNED_BY")?><a href="http://danieljamesscott.org">http://danieljamesscott.org</a></small>
</div> <!-- /club_member_footer -->
