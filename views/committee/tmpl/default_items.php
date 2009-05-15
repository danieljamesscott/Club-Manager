<?php /** $Id: default_items.php 8497 2007-08-21 19:05:27Z hackwar $ */ defined( '_JEXEC' ) or die(); ?>
<?php foreach($this->items as $item) : ?>
<tr>
<!--	<td align="right" width="5">
		<?php echo $item->count +1; ?>
	</td>
-->
	<td class="sectiontableentry<?php echo $item->odd; ?>">
		<?php echo $item->number; ?>
	</td>
	<td height="20" class="sectiontableentry<?php echo $item->odd; ?>">
		<a href="<?php echo $item->link; ?>" class="category<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
			<?php echo $item->name; ?>
		</a>
	</td>
<!--	<?php if ( $this->params->get( 'show_fax' ) ) : ?>
	<td width="15%" class="sectiontableentry<?php echo $item->odd; ?>">
		<?php echo $item->fax; ?>
	</td>
	<?php endif; ?>
-->
</tr>
<?php endforeach; ?>
