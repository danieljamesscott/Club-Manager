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
        <?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'categorymembers.', $canCheckin); ?>
      <?php endif; ?>
      <a href="<?php echo JRoute::_('index.php?option=com_club&task=categorymember.edit&id='.(int) $item->id); ?>">
      <?php echo $this->escape($item->category_name . ' - ' . $item->member_name); ?></a>
    </td>
  </tr>
<?php endforeach; ?>