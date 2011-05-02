<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<table class="category">
  <thead><?php echo $this->loadTemplate('head');?></thead>
  <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
  <tbody><?php echo $this->loadTemplate('body');?></tbody>
</table>
<br/><br/>
<small><?php echo JText::_("COM_CLUB_DESIGNED_BY")?><a href="http://danieljamesscott.org">http://danieljamesscott.org</a></small>