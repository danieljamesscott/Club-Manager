<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php JHTML::_('behavior.tooltip'); ?>

<?php
	// Set toolbar items for the page
	$edit		= JRequest::getVar('edit',true);
	$text = !$edit ? JText::_( 'New' ) : JText::_( 'Edit' );
	JToolBarHelper::title(   JText::_( 'Member' ).': <small><small>[ ' . $text.' ]</small></small>' );
	JToolBarHelper::save();
	if (!$edit)  {
		JToolBarHelper::cancel();
	} else {
		// for existing items the button is renamed `close`
		JToolBarHelper::cancel( 'cancel', 'Close' );
	}
	JToolBarHelper::help( 'screen.member.edit' );
?>

<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}

		// do field validation
		if (form.name.value == ""){
			alert( "<?php echo JText::_( 'Member item must have a title', true ); ?>" );
		} else if (form.catid.value == "0"){
			alert( "<?php echo JText::_( 'You must select a category', true ); ?>" );
			//		} else if (form.url.value == ""){
			//			alert( "<?php echo JText::_( 'You must have a url.', true ); ?>" );
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
						<label for="name">
							<?php echo JText::_( 'Name' ); ?>:
						</label>
					</td>
					<td >
						<input class="inputbox" type="text" name="name" id="name" size="60" maxlength="255" value="<?php echo $this->member->name; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="alias">
							<?php echo JText::_( 'Alias' ); ?>:
						</label>
					</td>
					<td >
						<input class="inputbox" type="text" name="alias" id="alias" size="60" maxlength="255" value="<?php echo $this->member->alias; ?>" />
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
					<td class="key">
						<label for="catid">
							<?php echo JText::_( 'Category' ); ?>:
						</label>
					</td>
					<td>
						<?php echo $this->lists['catid'];?>
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="user_id">
							<?php echo JText::_( 'Linked to User' ); ?>:
						</label>
					</td>
					<td >
						<?php echo $this->lists['user_id'];?>
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
				if ($this->member->id) {
					?>
					<tr>
						<td class="key">
							<label>
								<?php echo JText::_( 'ID' ); ?>:
							</label>
						</td>
						<td>
							<strong><?php echo $this->member->id;?></strong>
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
					<td class="key">
					<label for="number">
						<?php echo JText::_( 'Member Number' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="number" id="number" size="10" maxlength="10" value="<?php echo $this->member->number; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
					<label for="position">
						<?php echo JText::_( 'Member\'s Position' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="position" id="position" size="40" maxlength="100" value="<?php echo $this->member->position; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
					<label for="dob">
						<?php echo JText::_( 'Date of Birth' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="dob" id="dob" size="30" maxlength="100" value="<?php echo $this->member->dob; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
					<label for="leaving_date">
						<?php echo JText::_( 'Leaving Date' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="leaving_date" id="leaving_date" size="30" maxlength="100" value="<?php echo $this->member->leaving_date; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
					<label for="joining_date">
						<?php echo JText::_( 'Joining Date' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="joining_date" id="joining_date" size="30" maxlength="100" value="<?php echo $this->member->joining_date; ?>" />
					</td>
				</tr>

				<tr>
					<td class="key">
						<label for="residence">
							<?php echo JText::_( 'Residence' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="residence" id="residence" size="40" maxlength="100" value="<?php echo $this->member->residence; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="nicknames">
							<?php echo JText::_( 'Nicknames' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="nicknames" id="nicknames" size="40" maxlength="200" value="<?php echo $this->member->nicknames; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="nationality">
							<?php echo JText::_( 'Nationality' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="nationality" id="nationality" size="40" maxlength="50" value="<?php echo $this->member->nationality; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="hometown">
							<?php echo JText::_( 'Hometown' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="hometown" id="hometown" size="40" maxlength="200" value="<?php echo $this->member->hometown; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="fave_player">
							<?php echo JText::_( 'Favourite Player' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="fave_player" id="fave_player" size="40" maxlength="200" value="<?php echo $this->member->fave_player; ?>" />
					</td>
				</tr>


				<tr>
					<td class="key">
						<label for="height_weight">
							<?php echo JText::_( 'Height/Weight' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="height_weight" id="height_weight" size="40" maxlength="200" value="<?php echo $this->member->height_weight; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="school_attending">
							<?php echo JText::_( 'School Attending' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="school_attending" id="school_attending" size="40" maxlength="200" value="<?php echo $this->member->school_attending; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="graduating_class">
							<?php echo JText::_( 'Graduating Class' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="graduating_class" id="graduating_class" size="40" maxlength="200" value="<?php echo $this->member->graduating_class; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="gpa">
							<?php echo JText::_( 'GPA' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="gpa" id="gpa" size="40" maxlength="200" value="<?php echo $this->member->gpa; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="sat_act">
							<?php echo JText::_( 'SAT/ACT' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="sat_act" id="sat_act" size="40" maxlength="200" value="<?php echo $this->member->sat_act; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="level_rating">
							<?php echo JText::_( 'Level/Rating' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="level_rating" id="level_rating" size="40" maxlength="200" value="<?php echo $this->member->level_rating; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="decision_makers">
							<?php echo JText::_( 'Decision Makers' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="decision_makers" id="decision_makers" size="40" maxlength="200" value="<?php echo $this->member->decision_makers; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="travel_schedule">
							<?php echo JText::_( 'Travel Schedule' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="travel_schedule" id="travel_schedule" size="40" maxlength="200" value="<?php echo $this->member->travel_schedule; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="hobbies">
							<?php echo JText::_( 'Hobbies' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="hobbies" id="hobbies" size="40" maxlength="200" value="<?php echo $this->member->hobbies; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="conference">
							<?php echo JText::_( 'Conference of Interest' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="conference" id="conference" size="40" maxlength="200" value="<?php echo $this->member->conference; ?>" />
					</td>
				</tr>


				<tr>
					<td class="key">
						<label for="first_name">
							<?php echo JText::_( 'First Name' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="first_name" id="first_name" size="20" maxlength="20" value="<?php echo $this->member->first_name; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="middle_name">
							<?php echo JText::_( 'Middle Name' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="middle_name" id="middle_name" size="20" maxlength="20" value="<?php echo $this->member->middle_name; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="surname">
							<?php echo JText::_( 'Surname' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="surname" id="surname" size="20" maxlength="20" value="<?php echo $this->member->surname; ?>" />
					</td>
				</tr>
				<tr>
					<td  class="key" valign="top">
						<label for="clubhistory">
							<?php echo JText::_( 'Club History' ); ?>:
						</label>
					</td>
					<td>
						<textarea name="clubhistory" id="clubhistory" rows="5" cols="45" class="inputbox"><?php echo $this->member->clubhistory; ?></textarea>
					</td>
				</tr>
				<tr>
					<td  class="key" valign="top">
						<label for="honours">
							<?php echo JText::_( 'Honours' ); ?>:
						</label>
					</td>
					<td>
						<textarea name="honours" id="honours" rows="5" cols="45" class="inputbox"><?php echo $this->member->honours; ?></textarea>
					</td>
				</tr>
				<tr>
					<td  class="key" valign="top">
						<label for="about">
							<?php echo JText::_( 'About' ); ?>:
						</label>
					</td>
					<td>
						<textarea name="about" id="about" rows="5" cols="45" class="inputbox"><?php echo $this->member->about; ?></textarea>
					</td>
				</tr>
				<tr>
					<td  class="key" valign="top">
						<label for="quote">
							<?php echo JText::_( 'Quote' ); ?>:
						</label>
					</td>
					<td>
						<textarea name="quote" id="quote" rows="5" cols="45" class="inputbox"><?php echo $this->member->quote; ?></textarea>
					</td>
				</tr>

				<tr>
					<td class="key">
						<label for="email_to">
							<?php echo JText::_( 'E-mail' ); ?>:
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" name="email_to" id="email_to" size="30" maxlength="30" value="<?php echo $this->member->email_to; ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="picture">
							<?php echo JText::_( 'Picture' ); ?>:
						</label>
					</td>
					<td >
						<?php echo $this->lists['picture']; ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<script language="javascript" type="text/javascript">
						if (document.forms.adminForm.image.options.value!=''){
							jsimg='../images/members/' + getSelectedValue( 'adminForm', 'picture' );
						} else {
							jsimg='../images/M_images/blank.png';
						}
						document.write('<img src=' + jsimg + ' name="imagelib" width="100" height="100" border="2" alt="<?php echo JText::_( 'Preview' ); ?>" />');
						</script>
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
				<?php echo $this->params->render(); ?>
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
				<textarea class="text_area" cols="44" rows="9" name="description" id="description"><?php echo $this->member->description; ?></textarea>
			</td>
		</tr>
		</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_club" />
<input type="hidden" name="cid[]" value="<?php echo $this->member->id; ?>" />
<input type="hidden" name="task" value="" />
</form>