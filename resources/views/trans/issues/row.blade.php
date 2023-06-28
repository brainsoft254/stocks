

<tr id='tr_{{$rid}}' class='line-item'>
	<td>
		<select class='form-control-grid select2-selection-grid itemcode col-xs-6' name='itemcode[]' id='itemcode_{{$rid}}' style='border-radius:0px !important;width:auto;'>
			<option value='-1' selected>--Select Code--</option>
			@foreach($items as $item)
			<option value='{{$item->code}}'>{{$item->code}}</option>
			@endforeach
		</select>
	</td>
	<td>
		<select class='form-control-grid select2-selection-grid description col-xs-8' name='description[]' id='description_{{$rid}}' style='border-radius:0px !important;'>
			<option value='-1' selected>--Select Description--</option>
			@foreach($items as $item)
			<option value='{{trim(Stockspro::getItemDescrClient($item->code,$clientcode))}}'>{{trim(Stockspro::getItemDescrClient($item->code,$clientcode))}}</option>
			@endforeach
		</select>
		<select class='form-control-grid iprice col-xs-6' name='iprice[]' id='iprice_{{$rid}}' style='display:none;border-radius:0px !important;'>
			<option value='0' selected>0</option>
			@foreach($items as $item)
			<option value='{{Stockspro::getClientPrice($item->code,$clientcode)}}'>{{Stockspro::getClientPrice($item->code,$clientcode)}}</option>
			@endforeach
		</select>
		<select class='form-control-grid iqty col-xs-6' name='iqty[]' id='iqty_{{$rid}}' style='display:noxne;border-radius:0px !important;'>
			<option value='0' selected>0</option>
			@foreach($items as $item)
			<option value='{{Stockspro::getItemQty($item->code,Auth::user()->station)}}'>{{Stockspro::getItemQty($item->code,Auth::user()->station)}}</option>
			@endforeach
		</select>
	</td>
	<td>
		<select class='form-control-grid uom  col-xs-4' name='uom[]' id='uom_{{$rid}}' style='border-radius:0px !important ;width: auto' >
			@foreach($units as $uom)
			<option value='{{$uom->code}}'>{{$uom->description}}</option>
			@endforeach
		</select>
		<select class='form-control-grid factor  col-xs-4' name='factor[]' id='factor_{{$rid}}' style='display:none;border-radius:0px !important ;width: auto' >
			@foreach($units as $uom)
			<option value='{{$uom->factor}}'>{{$uom->factor}}</option>
			@endforeach
		</select>
	</td>
	<td><input type='text' name='qty[]' id='qty_{{$rid}}' class='text-center form-control-grid qty  col-xs-2 ' value='1' ></td>
	<td><input type='text' name='price[]' id='price_{{$rid}}' class='form-control-grid price col-xs-2' value='0' readonly></td>
	<td>
		<select class='form-control-grid vatable col-xs-6 text-danger' name='vatable[]' id='vatable_{{$rid}}'>
			<option value='1' selected='selected'>yes</option>
			<option value='0' >No</option>
		</select>
	</td>			
	<td>
		<input type='text' id='vat_{{$rid}}' value='0.00' name='vat[]' class='bg-warning text-right vat form-control-grid vat col-xs-2' readonly=''>
	</td>
	<td>
		<input type='text' id='total_{{$rid}}' value='0.00' name='total[]' class='text-right total form-control-grid col-xs-3' readonly=''>
	</td>
	<td>
		<span class='removeLink btn btn-danger btn-xs'  id='remove_{{$rid}}'><i class='fa fa-times'></i></span>
	</td>
</tr>;
