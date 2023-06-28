
<?php $i=1;?>
@foreach($invoices as $invoice)

$due=$vatExc>0?(($invoice->amount+$invoice->vat)-$invoice->paid):($invoice->amount-$invoice->paid);

<tr id='id_{{$i}}'>
	<td style='width:12% !important'>
		<input type='text'  name='invno[]' id='qty_"+i+"' class='text-center form-control-grid invno' value='{{$invoice->invno}}' readonly>
	</td>
	<td style='width:10% !important'>
		<input type='text' name='invdate[]' id='invdate_{{$i}}' class='text-center form-control-grid invdate  col-xs-2 ' value='{{$invoice->invdate}}' readonly>
	</td>
	<td style='width:15% !important'>
		<input type='text' name='lpo[]' id='lpo_{{$i}}' class='text-center form-control-grid lpo  col-xs-2 ' value='{{$invoice->lpo}}' readonly>
	</td>
	<td style='width:35% !important'>
		<input type='text' name='clname[]' id='clname_{{$i}}' class='text-left form-control-grid clname col-xs-2' value='{{$invoice->clname}}' readonly >
	</td>
	<td style='width:35% !important;display:none'>
		<input type='text' name='clcodex[]' id='clcodex_{{$i}}' class='text-left form-control-grid clcodex col-xs-2' value='{{$invoice->clcode}}' readonly style='display:none'>
	</td>
	<td style='width:15% !important' >
		<input type='text' name='due[]' id='due_{{$i}}' class='text-right form-control-grid due  col-xs-2 bg-primary' value='{{$due}}' readonly>
	</td>
	<td style='width:20% !important'>
		<input type='text' name='paid[]' id='paid_{{$i}}' class='text-right form-control-grid paid  col-xs-2 ' value='0.00'>
	</td>
	<td>
		<div class='form-check abc-checkbox abc-checkbox-warning input-group-addon danger'>
			<label class="form-check-label" for="paycheck_{{$i}}">
				Pay?
			</label>
			<input name="paycheck[]" class="form-check-input paycheck" id="paycheck_{{$i}}"  type="checkbox" >
		</div>
	</td>
	<td  style='display:none;'>
		<input id='payme_{{$i}}' name='payme[]' type='text' value='0' class='text-right form-control-grid payme' style='display:none;'>
	</td>
	
</tr>
<?php $i++;?>
@endforeach