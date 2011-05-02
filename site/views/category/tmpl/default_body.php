<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item):
?>
  <tr class="row<?php echo $i % 2; ?>">
    <td>
      <?php echo $item->member_number; ?>
    </td>
    <td>
      <a href="<?php echo JRoute::_('index.php?option=com_club&view=member&id='.(int) $item->member_id); ?>">
      <?php echo $this->escape($item->member_name); ?></a>
    </td>
  </tr>
<?php endforeach; ?>
