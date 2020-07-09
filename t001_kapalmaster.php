<?php
namespace PHPMaker2020\p_distribusi;
?>
<?php if ($t001_kapal->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t001_kapalmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t001_kapal->Nama->Visible) { // Nama ?>
		<tr id="r_Nama">
			<td class="<?php echo $t001_kapal->TableLeftColumnClass ?>"><?php echo $t001_kapal->Nama->caption() ?></td>
			<td <?php echo $t001_kapal->Nama->cellAttributes() ?>>
<span id="el_t001_kapal_Nama">
<span<?php echo $t001_kapal->Nama->viewAttributes() ?>><?php echo $t001_kapal->Nama->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>