<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item):
$canCheckin = $this->user->authorise('core.manage', 'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
?>
  <tr class="row<?php echo $i % 2; ?>">
    <td>
       <?php echo $item->id; ?>
    </td>
    <td>
      <?php echo JHtml::_('grid.id', $i, $item->id); ?>
    </td>
    <td>
      <?php if ($item->checked_out) : ?>
        <?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'categories.', $canCheckin); ?>
      <?php endif; ?>
      <a href="<?php echo JRoute::_('index.php?option=com_club&task=category.edit&id='.(int) $item->id); ?>">
      <?php echo $this->escape($item->name); ?></a>
      <p class="smallsub">
      <?php echo JText::sprintf('JGLOBAL_LIST_ALIAS', $this->escape($item->alias));?></p>
    </td>
    <td>
       <?php echo $item->coach; ?>
    </td>
    <td>
       <?php echo $item->trainer; ?>
    </td>
    <td>
       <?php echo $item->manager; ?>
    </td>
  </tr>
<?php endforeach; ?>