



<?php $rid=1;?>
@foreach($details as $det)
<tr id='tr_{{$rid}}' class='line-item'>
	<td>
		<select class='form-control-grid select2-selection-grid itemcode col-xs-6' name='itemcode[]' id='itemcode_{{$rid}}' style='border-radius:0px !important;width:auto;'>
			<option value='{{$det->icode}}'>{{$det->icode}}</option>
		</select>
	</td>
	<td>
		<select class='form-control-grid select2-selection-grid description col-xs-8' name='description[]' id='description_{{$rid}}' style='border-radius:0px !important;'>
			<option value='{{$det->description}}'>{{$det->description}}</option>
		</select>
		<select class='form-control-grid iprice col-xs-6' name='iprice[]' id='iprice_{{$rid}}' style='display:none;border-radius:0px !important;'>
			<option value='{{$det->rate}}'>{{$det->rate}}</option>
		</select>
		<select class='form-control-grid iqty col-xs-6' name='iqty[]' id='iqty_{{$rid}}' style='display:none;border-radius:0px !important;'>
			<option value='{{$det->qty}}'>{{$det->qty}}</option>
		</select>
	</td>
	<td>
		<select class='form-control-grid uom  col-xs-4' name='uom[]' id='uom_{{$rid}}' style='border-radius:0px !important ;width: auto' >
			<option value='{{$det->uom}}'>{{$det->uom}}</option>
		</select>
		<select class='form-control-grid factor  col-xs-4' name='factor[]' id='factor_{{$rid}}' style='display:none;border-radius:0px !important ;width: auto' >
			<option value='{{Stockspro::getFactor($det->uom)}}'>{{Stockspro::getFactor($det->uom)}}</option>
		</select>
	</td>
	<td><input type='text' name='qty[]' id='qty_{{$rid}}' class='text-center form-control-grid qty  col-xs-2 ' value='{{$det->qty}}' ></td>
	<td><input type='text' name='price[]' id='price_{{$rid}}' class='form-control-grid price col-xs-2' value='{{$det->rate}}' readonly></td>
	<td>
		<input type='text' id='total_{{$rid}}' value='{{$det->total}}' name='total[]' class='text-right total form-control-grid col-xs-3' readonly=''>
	</td>
	<td>
		<span class='removeLink btn btn-danger btn-xs'  id='remove_{{$rid}}'><i class='fa fa-times'></i></span>
	</td>
</tr>;
<?php  $rid+=1; ?>
@endforeach
