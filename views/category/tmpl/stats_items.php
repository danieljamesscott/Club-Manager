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
	<td height="20" class="sectiontableentry<?php echo $item->odd; ?>">
		<?php echo $item->games; ?>
	</td>
	<td height="20" class="sectiontableentry<?php echo $item->odd; ?>">
		<?php echo $item->goals; ?>
	</td>
	<td height="20" class="sectiontableentry<?php echo $item->odd; ?>">
		<?php echo $item->assists; ?>
	</td>
	<td height="20" class="sectiontableentry<?php echo $item->odd; ?>">
		<?php 
	if($item->games == 0) {
	  echo "-";
	} else {
	  echo $item->goals/$item->games;
	}
        ?>
	</td>
</tr>
<?php endforeach; ?>
