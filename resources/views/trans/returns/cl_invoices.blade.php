<?php $i=1;?>
@if(count($invoices)>0)
@foreach($invoices as $invoice)
@if($parent)
<tr id="tr_{{$i}}">
	
	<td><input type="radio" name="iradio[]" class="form-control-grid rct-details radioPick"  id="iradio_{{$i}}"   ></td>
	<td style="width:15%"><input type="text" name="invno[]" class="form-control-grid rct-details"  id="invno_{{$i}}"  value="{{$invoice->invno}}" readonly></td>
	<td style="width:15%"><input  type="text" name="invdate[]" class="form-control-grid rct-details"  id="invtype_{{$i}}"  value="{{$invoice->invdate}}" readonly></td>
	<td style="width:40%"><input  type="text" name="lpo[]" class="form-control rct-details"  id="lpo_{{$i}}"  value="{{$invoice->clcode}}-{{Stockspro::getCLientname($invoice->clcode)}}" readonly></td>
	<td style="width:15%"><input type="text" name="amount[]" class="form-control rct-details text-right"  id="amount_{{$i}}"  value="{{$invoice->amount-$invoice->amount_paid}}" readonly></td>
	<!-- <td style="width:20%"><input type="text" name="cramt[]" class="form-control rct-details text-right cramt"  id="cramt_{{$i}}"  value="0.00" ></td> -->
	<td><span class="btn btn-danger btn-xs btnRemove" id="ibtn_{{$i}}" ><i class="fa fa-times"></i></span></td>
</tr>
@else
<tr id="tr_{{$i}}">
	<td><input type="radio" name="iradio[]" class="form-control-grid rct-details radioPick"  id="iradio_{{$i}}"   ></td>
	<td style="width:15%"><input type="text" name="invno[]" class="form-control rct-details"  id="invno_{{$i}}"  value="{{$invoice->invno}}" readonly></td>
	<td style="width:15%"><input type="text" name="invdate[]" class="form-control rct-details"  id="invtype_{{$i}}"  value="{{$invoice->invdate}}" readonly></td>
	<td style="width:25%"><input type="text" name="lpo[]" class="form-control rct-details"  id="lpo_{{$i}}"  value="{{$invoice->lpo}}" readonly></td>
	<td style="width:15%"><input type="text" name="amount[]" class="form-control rct-details text-right"  id="amount_{{$i}}"  value="{{$invoice->amount-$invoice->amount_paid}}" readonly></td>
	<!-- <td style="width:25%"><input type="text" name="cramt[]" class="form-control rct-details text-right cramt"  id="cramt_{{$i}}"  value="0.00" ></td> -->
	<td><span class="btn btn-danger btn-xs btnRemove" id="ibtn_{{$i}}" ><i class="fa fa-times"></i></span></td>
</tr>
@endif
<?php $i+=1; ?>
@endforeach
@else
<tr id="tr_1}">
	<td colspan="6"><span class="alert alert-danger"> No Records Found , Change date range and try Again !</span></td>
</tr>
@endif
