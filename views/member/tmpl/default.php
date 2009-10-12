<?php defined( '_JEXEC' ) or die(); ?>
<?php if ( $this->params->get( 'show_page_title' ) && !$this->member->params->get( 'popup' ) ) : ?>
<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php echo $this->params->get( 'page_title' ); ?>
</div>
<?php endif; ?>
<table width="100%" cellpadding="1" cellspacing="1" border="0" class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php if ( $this->member->name ) : ?>
<tr>
<th width="50%" class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php echo $this->member->name; ?>
</th>
<th width="50%">
</th>
</tr>
<?php endif; ?>
<tr>
<td align="left" valign="top">
<!--<?php if ( $this->member->picture ) : ?>-->
<!-- Image must be 250x209 -->
<!--<img src="images/members/<?php echo $this->member->picture; ?>" align="middle" alt="<?php echo $this->member->name; ?> picture" width='250' height='209' />-->
<?php echo $this->member->picture; ?>
<!--<?php endif; ?>-->
<ul>
<?php if ( $this->member->number ) : ?>
<li>
   <?php echo JText::_("NUMBER") . $this->member->number; ?>
</li>
<?php endif; ?>
<?php if ( $this->member->name ) : ?>
<li>
   <?php echo JText::_("NAME") . $this->member->name; ?>
</li>
<?php endif; ?>
<?php if ( $this->member->email_to ) : ?>
<li>
   <?php echo JText::_("EMAIL") . $this->member->email_to; ?>
</li>
<?php endif; ?>
</ul>
</td>
<td>
<table  width="100%" cellpadding="0" cellspacing="0" border="0">
<tbody>
<?php if ( $this->member->nicknames ) : ?>
<tr>
	<td>
   <?php echo JText::_("NICKNAMES"); ?>
	</td>
        <td>
		<?php echo $this->member->nicknames; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->position ) : ?>
<tr>
	<td>
   <?php echo JText::_("POSITION"); ?>
	</td>
	<td>
		<?php echo $this->member->position; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->dob ) : ?>
<tr>
	<td>
   <?php echo JText::_("DOB"); ?>
	</td>
	<td>
		<?php echo $this->member->dob; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->residence ) : ?>
<tr>
	<td>
   <?php echo JText::_("CURRESIDENCE"); ?>
	</td>
	<td>
		<?php echo $this->member->residence; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->hometown ) : ?>
<tr>
	<td>
   <?php echo JText::_("HOMETOWN"); ?>
	</td>
	<td>
		<?php echo $this->member->hometown; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->nationality ) : ?>
<tr>
	<td>
   <?php echo JText::_("NATIONALITY"); ?>
	</td>
	<td>
		<?php echo $this->member->nationality; ?>
	</td>
</tr>
<?php endif; ?>


<?php if ( $this->member->fave_player ) : ?>
<tr>
	<td>
   <?php echo JText::_("FAVEPLAYER"); ?>
	</td>
	<td>
		<?php echo $this->member->fave_player; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->height_weight ) : ?>
<tr>
	<td>
   <?php echo JText::_("HEIGHTWEIGHT"); ?>
	</td>
	<td>
		<?php echo $this->member->height_weight; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->school_attending ) : ?>
<tr>
	<td>
   <?php echo JText::_("SCHOOL"); ?>
	</td>
	<td>
		<?php echo $this->member->school_attending; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->graduating_class ) : ?>
<tr>
	<td>
   <?php echo JText::_("CLASS"); ?>
	</td>
	<td>
		<?php echo $this->member->graduating_class; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->gpa ) : ?>
<tr>
	<td>
   <?php echo JText::_("GPA"); ?>
	</td>
	<td>
		<?php echo $this->member->gpa; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->sat_act ) : ?>
<tr>
	<td>
   <?php echo JText::_("SATACT"); ?>
	</td>
	<td>
		<?php echo $this->member->sat_act; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->level_rating ) : ?>
<tr>
	<td>
   <?php echo JText::_("LEVEL"); ?>
	</td>
	<td>
		<?php echo $this->member->level_rating; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->decision_makers ) : ?>
<tr>
	<td>
   <?php echo JText::_("DECISIONMAKERS"); ?>
	</td>
	<td>
		<?php echo $this->member->decision_makers; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->travel_schedule ) : ?>
<tr>
	<td>
   <?php echo JText::_("SCHEDULE"); ?>
	</td>
	<td>
		<?php echo $this->member->travel_schedule; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->hobbies ) : ?>
<tr>
	<td>
   <?php echo JText::_("HOBBIES"); ?>
	</td>
	<td>
		<?php echo $this->member->hobbies; ?>
	</td>
</tr>
<?php endif; ?>

<?php if ( $this->member->conference ) : ?>
<tr>
	<td>
   <?php echo JText::_("CONFERENCEINTEREST"); ?>
	</td>
	<td>
		<?php echo $this->member->conference; ?>
	</td>
</tr>
<?php endif; ?>
</tbody>
</table>
	</td>
	</tr>
<tr>
<td>
<?php if ( $this->member->clubhistory ) : ?>
<h3><?php echo JText::_("CLUBHISTORY"); ?></h3>
		<?php echo nl2br($this->member->clubhistory); ?>
<br/>
<?php endif; ?>
</td>
<td>
<?php if ( $this->member->about ) : ?>
<h3><?php echo JText::_("ABOUT"); ?></h3>
		<?php echo nl2br($this->member->about); ?>
<br/>
<?php endif; ?>
</td>
</tr>
<tr>
<td>
<?php if ( $this->member->honours ) : ?>
<h3><?php echo JText::_("HONOURS"); ?></h3>
		<?php echo nl2br($this->member->honours); ?>
<?php endif; ?>
</td>
<td>
<?php if ( $this->member->quote ) : ?>
<h3><?php echo JText::_("QUOTE"); ?></h3>
		<?php echo nl2br($this->member->quote); ?>
<?php endif; ?>
</td>
</tr>
<tr>
<td>
<?php if ( $this->member->description ) : ?>
<h3><?php echo JText::_("DESCRIPTION"); ?></h3>
		<?php echo nl2br($this->member->description); ?>
<?php endif; ?>
</td>
<td/>
</tr>
</table>

<br />
<small><?php echo JText::_("DESIGNEDBY")?><a href="http://danieljamesscott.org">http://danieljamesscott.org</a></small>
