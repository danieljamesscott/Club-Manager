<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
<th width="5">
    <?php echo JText::_('COM_CLUB_CATEGORY_ID_LABEL'); ?>
</th>
<th width="20">
    <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
</th>
<th>
    <?php echo JText::_('COM_CLUB_CATEGORY_NAME_LABEL'); ?>
</th>
<th>
    <?php echo JText::_('COM_CLUB_CATEGORY_COACH_LABEL'); ?>
</th>
<th>
    <?php echo JText::_('COM_CLUB_CATEGORY_TRAINER_LABEL'); ?>
</th>
<th>
    <?php echo JText::_('COM_CLUB_CATEGORY_MANAGER_LABEL'); ?>
</th>
</tr>
