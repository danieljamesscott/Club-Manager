<?php defined( '_JEXEC' ) or die(); ?>
<?php if ( $this->params->get( 'show_page_title' ) && !$this->member->params->get( 'popup' ) ) : ?>
<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php echo $this->params->get( 'page_title' ); ?>
</div>
<?php endif; ?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php if ( $this->member->name ) : ?>
<tr>
<td width="50%" class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php echo $this->member->name; ?>
</td>
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
Number: <?php echo $this->member->number; ?>
</li>
<?php endif; ?>
<?php if ( $this->member->name ) : ?>
<li>
Name: <?php echo $this->member->name; ?>
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
Nicknames:
	</td>
        <td>
		<?php echo $this->member->nicknames; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->position ) : ?>
<tr>
	<td>
Position:
	</td>
	<td>
		<?php echo $this->member->position; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->dob ) : ?>
<tr>
	<td>
D.O.B:
	</td>
	<td>
		<?php echo $this->member->dob; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->residence ) : ?>
<tr>
	<td>
Current Residence:
	</td>
	<td>
		<?php echo $this->member->residence; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->hometown ) : ?>
<tr>
	<td>
Hometown:
	</td>
	<td>
		<?php echo $this->member->hometown; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ( $this->member->nationality ) : ?>
<tr>
	<td>
Nationality:
	</td>
	<td>
		<?php echo $this->member->nationality; ?>
	</td>
</tr>
<?php endif; ?>


<?php if ( $this->member->fave_player ) : ?>
<tr>
	<td>
Favourite Player:
	</td>
	<td>
		<?php echo $this->member->fave_player; ?>
	</td>
</tr>
<?php endif; ?>
</tbody>
</table>
	</td>
	<td></td>
	</tr>
<tr>
<td>
<?php if ( $this->member->clubhistory ) : ?>
<h3>Club History</h3>
		<?php echo nl2br($this->member->clubhistory); ?>
<br/>
<?php endif; ?>
</td>
<td>
<?php if ( $this->member->about ) : ?>
<h3>About</h3>
		<?php echo nl2br($this->member->about); ?>
<br/>
<?php endif; ?>
</td>
</tr>
<tr>
<td>
<?php if ( $this->member->honours ) : ?>
<h3>Honours</h3>
		<?php echo nl2br($this->member->honours); ?>
<?php endif; ?>
</td>
<td>
<?php if ( $this->member->quote ) : ?>
<h3>Quote</h3>
		<?php echo nl2br($this->member->quote); ?>
<br/>
<?php endif; ?>
</td>
</tr>
</table>