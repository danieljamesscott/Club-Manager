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
<h2><?php echo JText::_('COM_CLUB_CATEGORY_INFORMATION'); echo $this->data->name; ?></h3>
</div> <!-- /club_member_head -->
<div id="club_member_left" style="width:50%;float:left;">

<?php if ( $this->data->picture ) : ?>
<?php echo $this->data->picture; ?>
<?php endif; ?>

</div> <!-- /club_member_left -->
<div id="club_member_right" style="width:50%;float:right;">

<table width="100%" style="border-style:none">

<?php if ( $this->data->trainer ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_CATEGORY_TRAINER_LABEL'); ?>
</td>
<td>
  <?php echo $this->data->trainer; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->data->coach ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_CATEGORY_COACH_LABEL'); ?>
</td>
<td>
  <?php echo $this->data->coach; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->data->manager ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_CATEGORY_MANAGER_LABEL'); ?>
</td>
<td>
  <?php echo $this->data->manaager; ?>
</td>
</tr>
<?php endif; ?>

</table>

</div> <!-- /club_member_right -->
</div> <!-- /club_member_top -->

<table class="category">
  <thead><?php echo $this->loadTemplate('head');?></thead>
  <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
  <tbody><?php echo $this->loadTemplate('body');?></tbody>
</table>
<br/><br/>
<small><?php echo JText::_("COM_CLUB_DESIGNED_BY")?><a href="http://danieljamesscott.org">http://danieljamesscott.org</a></small>