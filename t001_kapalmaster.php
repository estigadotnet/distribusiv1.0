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
<?php if ($t001_kapal->Diproses->Visible) { // Diproses ?>
		<tr id="r_Diproses">
			<td class="<?php echo $t001_kapal->TableLeftColumnClass ?>"><?php echo $t001_kapal->Diproses->caption() ?></td>
			<td <?php echo $t001_kapal->Diproses->cellAttributes() ?>>
<span id="el_t001_kapal_Diproses">
<span<?php echo $t001_kapal->Diproses->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_Diproses" class="custom-control-input" value="<?php echo $t001_kapal->Diproses->getViewValue() ?>" disabled<?php if (ConvertToBool($t001_kapal->Diproses->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_Diproses"></label></div></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>