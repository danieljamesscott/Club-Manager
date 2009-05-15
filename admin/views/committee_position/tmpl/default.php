<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php JHTML::_('behavior.tooltip'); ?>

<?php
	// Set toolbar items for the page
	$edit		= JRequest::getVar('edit',true);
	$text = !$edit ? JText::_( 'New' ) : JText::_( 'Edit' );
	JToolBarHelper::title(   JText::_( 'Committee Position' ).': <small><small>[ ' . $text.' ]</small></small>' );
	JToolBarHelper::save();
	if (!$edit)  {
		JToolBarHelper::cancel();
	} else {
		// for existing items the button is renamed `close`
		JToolBarHelper::cancel( 'cancel', 'Close' );
	}
	JToolBarHelper::help( 'screen.committee_position.edit' );
?>

<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}

		// do field validation
		if (form.position.value == ""){
			alert( "<?php echo JText::_( 'Committee Position item must have a position', true ); ?>" );
// 		} else if (form.catid.value == "0"){
// 			alert( "<?php echo JText::_( 'You must select a category', true ); ?>" );
// 			//		} else if (form.url.value == ""){
// 			//			alert( "<?php echo JText::_( 'You must have a url.', true ); ?>" );
		} else {
			submitform( pressbutton );
		}
	}
</script>
<style type="text/css">
	table.paramlist td.paramlist_key {
		width: 92px;
		text-align: left;
		height: 30px;
	}
</style>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>

		<table class="admintable">
				<tr>
					<td class="key">
						<label for="position">
							<?php echo JText::_( 'Position' ); ?>:
						</label>
					</td>
					<td >
						<input class="inputbox" type="text" name="position" id="position" size="60" maxlength="255" value="<?php echo $this->committee_position->position; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="alias">
							<?php echo JText::_( 'Alias' ); ?>:
						</label>
					</td>
					<td >
						<input class="inputbox" type="text" name="alias" id="alias" size="60" maxlength="255" value="<?php echo $this->committee_position->alias; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Published' ); ?>:
					</td>
					<td>
						<?php echo $this->lists['published']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" class="key">
						<label for="ordering">
							<?php echo JText::_( 'Ordering' ); ?>:
						</label>
					</td>
					<td>
						<?php echo $this->lists['ordering']; ?>
					</td>
				</tr>
				<?php
				if ($this->committee_position->id) {
					?>
					<tr>
						<td class="key">
							<label>
								<?php echo JText::_( 'ID' ); ?>:
							</label>
						</td>
						<td>
							<strong><?php echo $this->committee_position->id;?></strong>
						</td>
					</tr>
					<?php
				}
				?>
	</table>
	</fieldset>

			<fieldset class="adminform">
				<legend><?php echo JText::_( 'Information' ); ?></legend>

				<table class="admintable">
				<tr>
					<td  class="key" valign="top">
						<label for="responsibilities">
							<?php echo JText::_( 'Responsibilities' ); ?>:
						</label>
					</td>
					<td>
						<textarea name="responsibilities" id="responsibilities" rows="5" cols="45" class="inputbox"><?php echo $this->committee_position->responsibilities; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="email">
							<?php echo JText::_( 'Email' ); ?>:
						</label>
					</td>
					<td>
						    <input class="inputbox" type="text" name="email" id="email" size="20" maxlength="50" value="<?php echo $this->committee_position->email; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="level">
							<?php echo JText::_( 'Level' ); ?>:
						</label>
					</td>
					<td>
						    <input class="inputbox" type="text" name="level" id="level" size="2" maxlength="2" value="<?php echo $this->committee_position->level; ?>" />
					</td>
				</tr>
				</table>
			</fieldset>

</div>
<div class="col50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Parameters' ); ?></legend>

		<table class="admintable">
		<tr>
			<td colspan="2">
				<?php 
		//echo $this->params->render();
?>
			</td>
		</tr>
		</table>
	</fieldset>
</div>

<div class="col50">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Description' ); ?></legend>

		<table class="admintable">
		<tr>
			<td>
				<textarea class="text_area" cols="44" rows="9" name="description" id="description"><?php echo $this->committee_position->description; ?></textarea>
			</td>
		</tr>
		</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="c" value="committee_positions" />
<input type="hidden" name="option" value="com_club" />
<input type="hidden" name="cid[]" value="<?php echo $this->committee_position->id; ?>" />
<input type="hidden" name="task" value="" />
</form>