<?php

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

?>
<div class="profile-edit<?php echo $this->pageclass_sfx?>">
   <h1>EDIT PROFILE</h1>

<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_club&task=profile.save'); ?>" method="post" class="form-validate">
  <?php foreach ($this->form->getFieldsets() as $group => $fieldset):// Iterate through the form fieldsets and display each one.?>
  <?php $fields = $this->form->getFieldset($group);?>
<?php if (count($fields)):?>
    <fieldset>
       <?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.?>
       <legend><?php echo JText::_($fieldset->label); ?></legend>
       <?php endif;?>
       <dl>
       <?php foreach ($fields as $field):// Iterate through the fields in the set and display them.?>
         <?php if ($field->hidden):// If the field is hidden, just display the input.?>
           <?php echo $field->input;?>
         <?php else:?>
           <dt>
           <?php echo $field->label; ?>
           <?php if (!$field->required && $field->type!='Spacer'): ?>
             <span class="optional"><?php echo JText::_('COM_CLUB_OPTIONAL'); ?></span>
           <?php endif; ?>
           </dt>
           <dd><?php echo $field->input; ?></dd>
         <?php endif;?>
       <?php endforeach;?>
       </dl>
    </fieldset>
<?php endif;?>
<?php endforeach;?>

<div>
<button type="submit" class="validate"><span><?php echo JText::_('JSUBMIT'); ?></span></button>
<?php echo JText::_('COM_CLUB_OR'); ?>
<a href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>

<input type="hidden" name="option" value="com_club" />
<input type="hidden" name="task" value="profile.save" />
<?php echo JHtml::_('form.token'); ?>
</div>
</form>
</div>
