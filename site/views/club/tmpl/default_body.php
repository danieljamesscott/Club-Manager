<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
  <tr class="row<?php echo $i % 2; ?>">
    <td>
      <a href="<?php echo JRoute::_('index.php?option=com_club&view=category&id='.(int) $item->category_id); ?>">
      <?php echo $this->escape($item->category_name); ?></a>
    </td>
    <td>
       <?php echo $item->category_coach; ?>
    </td>
    <td>
       <?php echo $item->category_trainer; ?>
    </td>
    <td>
       <?php echo $item->category_manager; ?>
    </td>
  </tr>
<?php endforeach; ?>
