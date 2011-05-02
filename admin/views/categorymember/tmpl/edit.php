<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_club&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="categorymember-form" class="form-validate" >
  <fieldset class="adminform">
    <legend><?php echo JText::_( 'COM_CLUB_CATEGORYMEMBER_DETAILS' ); ?></legend>
    <ul class="adminformlist">
<?php foreach($this->form->getFieldset() as $field): ?>
  <li><?php echo $field->label;echo $field->input;?></li>
<?php endforeach; ?>
    </ul>
  </fieldset>
  <div>
    <input type="hidden" name="task" value="categorymember.edit" />
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>
