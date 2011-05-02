<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHtml::_('behavior.tooltip');

$user           = JFactory::getUser();
$userId         = $user->get('id');
?>

<div id="club_category">
<div id="club_category_top">
<div id="club_category_head">
<h2><?php echo JText::_('COM_CLUB_CATEGORY_INFORMATION'); echo $this->items[0]->name; ?></h2>
</div> <!-- /club_category_head -->
<div id="club_category_left" style="width:50%;float:left;">

<?php if ( $this->items[0]->picture ) : ?>
<?php echo $this->items[0]->picture; ?>
<?php endif; ?>

</div> <!-- /club_category_left -->
<div id="club_category_right" style="width:50%;float:right;">

<table width="100%" style="border-style:none">

<?php if ( $this->items[0]->trainer ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_CATEGORY_TRAINER_LABEL'); ?>
</td>
<td>
  <?php echo $this->items[0]->trainer; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->items[0]->coach ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_CATEGORY_COACH_LABEL'); ?>
</td>
<td>
  <?php echo $this->items[0]->coach; ?>
</td>
</tr>
<?php endif; ?>

<?php if ( $this->items[0]->manager ) : ?>
<tr>
<td>
  <?php echo JText::_('COM_CLUB_CATEGORY_MANAGER_LABEL'); ?>
</td>
<td>
  <?php echo $this->items[0]->manager; ?>
</td>
</tr>
<?php endif; ?>

</table>

</div> <!-- /club_category_right -->
</div> <!-- /club_category_top -->

<div id="club_member_bottom" style="clear:both">
<br/><br/>

<table class="category">
  <thead><?php echo $this->loadTemplate('head');?></thead>
<!--  <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>-->
  <tbody><?php echo $this->loadTemplate('body');?></tbody>
</table>
</div> <!-- /club_category_bottom -->
<div id="club_member_footer" style="clear:both">
<br/><br/>
<small><?php echo JText::_("COM_CLUB_DESIGNED_BY")?><a href="http://danieljamesscott.org">http://danieljamesscott.org</a></small>
</div> <!-- /club_footer -->
</div> <!-- /club_category -->
