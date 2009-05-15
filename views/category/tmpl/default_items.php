<?php defined( '_JEXEC' ) or die(); ?>
<?php foreach($this->items as $item) : ?>
<tr>
	<td class="sectiontableentry<?php echo $item->odd; ?>">
		<?php echo $item->number; ?>
	</td>
	<td height="20" class="sectiontableentry<?php echo $item->odd; ?>">
		<a href="<?php echo $item->link; ?>" class="category<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
			<?php echo $item->name; ?>
		</a>
	</td>
</tr>
<?php endforeach; ?>
