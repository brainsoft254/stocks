<?php $i=1;?>
@foreach($invoices as $invoice)
@if($parent)
<tr id="tr_{{$i}}">
	<td style="width:15%"><input type="text" name="invno[]" class="form-control-grid rct-details"  id="invno_{{$i}}"  value="{{$invoice->invno}}" readonly></td>
	<td style="width:15%"><input  type="text" name="invdate[]" class="form-control-grid rct-details"  id="invtype_{{$i}}"  value="{{$invoice->invdate}}" readonly></td>
	<td style="width:40%"><input  type="text" name="lpo[]" class="form-control rct-details"  id="lpo_{{$i}}"  value="{{$invoice->clcode}}-{{Stockspro::getCLientname($invoice->clcode)}}" readonly></td>
	<td style="width:15%"><input type="text" name="amount[]" class="form-control rct-details text-right"  id="amount_{{$i}}"  value="{{$invoice->amount-$invoice->amount_paid}}" readonly></td>
	<td style="width:20%"><input type="text" name="cramt[]" class="form-control rct-details text-right cramt"  id="cramt_{{$i}}"  value="0.00" ></td>
	<td><span class="btn btn-danger btn-xs btnRemove" id="ibtn_{{$i}}" ><i class="fa fa-times"></i></span></td>
</tr>
@else
<tr id="tr_{{$i}}">
	<td style="width:15%"><input type="text" name="invno[]" class="form-control rct-details"  id="invno_{{$i}}"  value="{{$invoice->invno}}" readonly></td>
	<td style="width:15%"><input type="text" name="invdate[]" class="form-control rct-details"  id="invtype_{{$i}}"  value="{{$invoice->invdate}}" readonly></td>
	<td style="width:25%"><input type="text" name="lpo[]" class="form-control rct-details"  id="lpo_{{$i}}"  value="{{$invoice->lpo}}" readonly></td>
	@if(Stockspro::isVatable($invoice->clcode))
	<td style="width:15%"><input type="text" name="amount[]" class="form-control rct-details text-right"  id="amount_{{$i}}"  value="{{($invoice->amount+$invoice->vat)-$invoice->amount_paid}}" readonly></td>
	@else
	<td style="width:15%"><input type="text" name="amount[]" class="form-control rct-details text-right"  id="amount_{{$i}}"  value="{{$invoice->amount-$invoice->amount_paid}}" readonly></td>
	@endif
	<td style="width:25%"><input type="text" name="cramt[]" class="form-control rct-details text-right cramt"  id="cramt_{{$i}}"  value="0.00" ></td>
	<td><span class="btn btn-danger btn-xs btnRemove" id="ibtn_{{$i}}" ><i class="fa fa-times"></i></span></td>
</tr>
@endif
<?php $i+=1; ?>
@endforeach
