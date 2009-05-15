<?php /** $Id: default.php 8497 2007-08-21 19:05:27Z hackwar $ */ defined( '_JEXEC' ) or die(); ?>
<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php if ($this->category->title) :
	echo $this->params->get('page_title').' - '.$this->category->title;
else :
	echo $this->params->get('page_title');
endif; ?>
</div>
<?php endif; ?>
<div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php if ($this->category->image || $this->category->description) : ?>
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php if ($this->params->get('image') != -1 && $this->params->get('image') != '') : ?>
		<img src="images/stories/<?php echo $this->params->get('image'); ?>" align="<?php echo $this->params->get('image_align'); ?>" hspace="6" alt="<?php echo JText::_( 'Members' ); ?>" />
	<?php elseif ($this->category->image) : ?>
		<img src="images/stories/<?php echo $this->category->image; ?>" align="<?php echo $this->category->image_position; ?>" hspace="6" alt="<?php echo JText::_( 'Members' ); ?>" />
	<?php endif; ?>
	<?php echo $this->category->description; ?>
	</div>
<?php endif; ?>
<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
</script>
<form action="<?php echo htmlentities($this->action); ?>" method="post" name="adminForm">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tbody>
		<tr>
<!--			<td width="5" align="right" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
				<?php echo JText::_('Num'); ?>
			</td>
-->
			<td width="5" align="center" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
				<?php echo JHTML::_('grid.sort',  'Number', 'cd.number', $this->lists['order_Dir'], $this->lists['order'] ); ?>
<!--				<?php echo JText::_('Number'); ?>-->
			</td>
			<td height="20" align="center" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
				<?php echo JHTML::_('grid.sort',  'Name', 'cd.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</td>
<!--			<?php if ( $this->params->get( 'show_fax' ) ) : ?>
				<td height="20" width="15%" class="sectiontableheader<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
					<?php echo JText::_( 'Fax' ); ?>
				</td>
			<?php endif; ?>
-->
		</tr>
	<?php echo $this->loadTemplate('items'); ?>
</tbody>
</table>

<input type="hidden" name="option" value="com_club" />
<input type="hidden" name="catid" value="<?php echo $this->category->id;?>" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>
</div>