@extends('stocksmaster') 
@section('content')  
<div class="row">
	<div class="col-md-11">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="fa fa-magic "></i> <strong> Edit Sales Order </strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-order" action="{{route('orders.update',$order->id)}}" method="POST">
					@csrf @method('put')
					<div class="row">
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('refno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success">Ref</span>
									<input type="text" name="refno" class="form-control" value="{{$order->refno}}"  placeholder="Enter Sales Order No.">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('refno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon danger">VoucherNo#</span>
									<input type="text" name="voucherno" class="form-control" value="{{$order->voucherno}}"  placeholder="Enter Sales Order No.">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('trandate') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Date</span>
									<input type="text" name="trandate" value="{{$order->trandate}}" class="form-control trandate" id="trandate" placeholder="Trandate" readonly="">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning">Location</span>
									<select class="form-control" name="location" id="location">
										<option value="-1" selected="selected">--Select Location--</option>
										@foreach($locations as $loc)
										<option value="{{$loc->code}}"  {{($loc->code==$order->location)?'selected':''}}>{{$loc->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('client') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon acct-label info">Client</span>
									<select class="form-control client" name="client" id="client">
										<option value="-1" selected="selected">--Select Client--</option>
										@foreach($clients as $client)
										<option value="{{$client->code}}" {{($client->code==$order->clcode)?'selected':''}} >{{$client->name}}</option>
										@endforeach
									</select>
									<input style="display: none;" type="text" name="vatstat" id="vatstat" value="{{Stockspro::isVatable($order->clcode)}}">
								</div>
							</div>	
						</div>	
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('ordertype') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon acct-label info">Order Type</span>
									<select class="form-control ordertype" name="ordertype" id="ordertype">
                                        <option value='0' {{$order->ordertype==0?'selected':''}}>In stock</option>
                                        <option value='1' {{$order->ordertype>0?'selected':''}}>To be Made</option>
									</select>
								</div>
							</div>	
						</div>
						<div style="display:none;">
							<div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon acct-label info">Sales Discount</span>
									<select class="form-control discount" name="discount" id="discount">
										<option value="0" selected="selected"></option>
									</select>
								</div>
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('depositpaid') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon acct-label danger">Deposit Paid</span>
									<input type="text" class="form-control depositpaid" name ="depositpaid" id ="depositpaid" value="{{$order->depositpaid}}">
								</div>
							</div>	
						</div>
						<div class="col-md-5">
							<div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon danger"><i class="fa fa-bandcamp" aria-hidden="true"></i> Account</span>
									<select class="form-control" name="account" id="account">
										<option value="{{$order->depositacct}}" selected="selected">{{$order->depositacct}}</option>
										@foreach($accounts as $acct)
										<option value="{{$acct->code}}">{{$acct->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Remarks</span>
									<textarea class="form-control" name="remarks" id="remarks" rows=1 style="resize: none;">{{$order->description}}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class = "col-md-12">

							<table class="table-items" style="width:100%;" >
								<thead class="bg-blue">
									<tr>
										<th>Code</th>
										<th>Description</th>
										<th>Uom</th>
										<th class="text-center">Qty</th>
										<th>U/Price</th>
										<th class="text-center">Vat?</th>
										<th class="text-right">Vat</th>
										<th class="text-right">Total</th>
										
									</tr>
								</thead>
								<tbody class="order-body">
									<?php $i=1;?>
									@foreach($order->order_details as $orderd)
									<tr id="tr_{{$i}}" class="line-item">
										<td>
											<select class='form-control-grid select2-selection-grid itemcode col-xs-4' name='itemcode[]' id='itemcode_{{$i}}' style='border-radius:0px !important;width:auto;'>
												

												<option value="{{$orderd->icode}}" selected >{{$orderd->icode}}</option>
												
											</select>
										</td>
										<td>
											<select class='form-control-grid select2-selection-grid description ' name='description[]' id='description_{{$i}}' style='border-radius:0px !important;'>
												
												
												<option value="{{Stockspro::getItemDescrClient($orderd->icode,$order->clcode)}}"  selected>{{Stockspro::getItemDescrClient($orderd->icode,$order->clcode)}}</option>
												
											</select>
											<select class='form-control-grid iprice ' name='iprice[]' id='iprice_{{$i}}' style='display:none;border-radius:0px !important;'>
												
												<option value="{{Stockspro::getClientPrice($orderd->icode,$order->clcode)}}"  selected >{{Stockspro::getClientPrice($orderd->icode,$order->clcode)}}</option>
												
											</select>
                                            <input type='text' style='display:none;' class='form-control iqty' name ='iqty[]' id ='iqty_{{$i}}' value='{{Stockspro::getItemQty($orderd->icode,$order->location)}}'>
										</td>
										<td>
											<select class='form-control-grid uom  col-xs-4' name='uom[]' id='uom_{{$i}}' style='border-radius:0px !important ;width: auto' >
												@foreach($units as $uom)
												<option value="{{$orderd->uom}}" {{$orderd->uom==$uom->code?'selected':''}}>{{$uom->description}}</option>
												@endforeach
											a							</select>
											<select class='form-control-grid factor  col-xs-4' name='factor[]' id='factor_{{$i}}' style='display:none;border-radius:0px !important ;width: auto' >
												@foreach($units as $uom)
												<option value='{{$uom->factor}}' {{$orderd->uom==$uom->code?'selected':''}}>{{$uom->factor}}</option>
												@endforeach
											</select>
										</td>
										<td><input type="text" name="qty[]" id="qty_{{$i}}" class="text-center  form-control-grid qty   " value="{{$orderd->qty}}" ></td>
										<td><input type="text" name="price[]" id="price_{{$i}}" class="form-control-grid price " value="{{$orderd->rate}}" readonly></td>
										<td>
											<select class="form-control-grid vatable  text-danger" name="vatable[]" id="vatable_{{$i}}"'>
												<option value="1" {{$orderd->vat>0?"selected":""}}>yes</option>
												<option value="0" {{$orderd->vat==0?"selected":""}}>No</option>
											</select>
										</td>										
										<td>
											<input type="text" id="vat_{{$i}}" value="{{$orderd->vat}}" name="vat[]" class="vat form-control-grid vat  text-right" value="{{$order->tax}}" readonly="">
										</td>
										<td>
											<input type="text" id="total_{{$i}}" value="{{$orderd->total}}" name="total[]"  value="{{$orderd->total}}" class="total form-control-grid  text-right" readonly="">
										</td>
										<td>
											<!-- <a class="remove btn-danger btn-xs" id="btnremove_0" href="#"><i class="fa fa-timex"></i></a> -->
											<span class='removeLink btn btn-danger btn-xs'  id='remove_{{$i}}'><i class='fa fa-times'></i></span>
										</td>
									</tr>
									<?php $i+=1;?>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<a href="#" class="btn btn-success pull-left " id="btnAddItems" ><i class="fa fa-cart-plus"></i> Add Row</a>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-4 form-group {{ $errors->has('vattotal') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon info">Qty Total</span>
										<input type="text" name="tqty" class="tqty form-control text-right" value="0.00" readonly="" >
									</div>
								</div>
								<div class="col-md-4 form-group {{ $errors->has('vattotal') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon warning">Vat Total</span>
										<input type="text" name="vattotal" class="vattotal form-control text-right" value="{{$order->tax}}" readonly="" >
									</div>
								</div>
								<div class="col-md-4  form-group {{ $errors->has('grosstotal') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon danger">Gross Total</span>
										<input type="text" name="grosstotal" class="grosstotal form-control text-right" value="{{$order->total}}" readonly="" >
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div style="display: none;">
										<span class="input-group-addon danger">VAT RATE (%)</span>
										<input type="text" name="vatrate" class="vatrate form-control text-right" value="{{Stockspro::vatRate()}}" readonly="" >
									</div>
								</div>
                                <?php $balcf=($order->total-$order->depositpaid)?>
								<div class="col-md-6  form-group {{ $errors->has('totaldisc') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon success">Balance Total</span>
										<input type="text" name="balcf" class="balcf form-control text-right" id="balcf" value="{{$balcf}}" readonly="" >
									</div>
									<div style="display: none;">
										<span class="input-group-addon success">Discount Total</span>
										<input type="text" name="totaldisc" class="totaldisc form-control text-right" value="{{$order->discount}}" readonly="" >
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> Save/Update</button>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
</div>
</div>
@stop
@section('page-script')
<script type="text/javascript">
	$(document).ready(function(){

		$('#trandate').datepicker({format:'yyyy-mm-dd'}).datepicker("setDate", new Date());
		//$('.itemcode,.description').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});
		$('.itemcode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.form-order')});
		$('.description').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.form-order')});
		$('.vatable,.uom,.client').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('body')});
		
		getColumnTotal();

		$(document).on("change",".client",function(){
			var selIdx=$(this).prop('selectedIndex');
			$('#vstat option:eq('+selIdx+')').prop('selected',true).change();
			getVatstat($(this).val());
			$('.order-body').html('');
			
		});

		function getVatstat(client)
		{
			var urli="{!!url('isClvatable')!!}";
			$.ajax({
				type: "GET",
				url: urli,
				data: "client="+client,
				cache: false,
				sync:true,
				complete:function(xhr){
					$('#vatstat').val(xhr.responseText);
				}
			});

			
		}		


		$(document).on("change",".itemcode",function(event){
			if($('#client').val()==-1){swal("","Select Client & Try AGain","error");return;}
			if($('#location').val()==-1){swal("","Select Location & Try AGain","error");return;}
			if ($(event.target).is('.itemcode')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#description_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$("#qty_"+iid).val(1);
				var loc=$("#location").val(),
				icode=$(this).val();
				getQty(icode,loc,iid);
				//$('#qty_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
			}
		});
		
		$(document).on("change",".iqty",function(){
			var iid=$(this).attr('id').split('_')[1];
			(parseInt($(this).val())<1)?$('#qty_'+iid).val(0):$('#qty_'+iid).val(1);
			getRowTotal(iid);			
		});
		
		function getQty(item,loc,rid){
            //console.log('item='+item+' loc='+loc+' rid='+rid);
			var urli="{!!url('getQty')!!}";
			$.ajax({
				type: "GET",
				url: urli,
				data: "item="+item+"&loc="+loc,
				cache: false,
				sync:true,
				complete:function(xhr){
					$('#iqty_'+rid).val(xhr.responseText);
				}
			});
		
			
		}
		
		$(document).on("change",".description",function(event){
			if($('#client').val()==-1){swal("","Select Client & Try AGain","error");return;}
			if($('#location').val()==-1){swal("","Select Location & Try AGain","error");return;}
			if ($(event.target).is('.description')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#itemcode_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				var loc=$("#location").val(),
				icode=$('#itemcode_'+iid).val();
				$("#qty_"+iid).val(1);
				//getClientPrice(icode,$('#client').val());
				getQty(icode,loc,iid);
				
			}
		});
		
		
		$(document).on("change",".iprice",function(event){
			var iid=$(this).attr('id').split('_')[1];
			var selIdx=$(this).prop('selectedIndex');
			$('#price_'+iid).val($(this).val()).trigger("change");
			getRowTotal(iid);
		});
		
		$(document).on("change",".uom",function(event){
			if ($(event.target).is('.uom')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#factor_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				getRowTotal(iid);
				
			}
		});
	   
	   $(document).on("change",".discount",function(event){
			if ($(event.target).is('.discount')) {
				getColumnTotal();
			}
		});
		
		
		$(document).on("change",".vatable",function(event){
			if ($(event.target).is('.vatable')) {
				var iid=$(this).attr('id').split('_')[1];
				//var selIdx=$(this).prop('selectedIndex');
				//$('#factor_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				getRowTotal(iid);
				
			}
		});
		
		$(document).on("change",".price",function(event){
			if ($(event.target).is('.price')) {
				var iid=$(this).attr('id').split('_')[1];
				getRowTotal(iid);
				
			}
		});
		
		$(document).on("keyup",'.qty',function(){
			var iid=$(this).attr('id').split('_')[1];
			this.value = this.value.replace(/\D/, 1);
			var aqty=$('#iqty_'+iid).val();
			if((parseInt(this.value)>parseInt(aqty)) && ($("#ordertype").val()==0)){
				swal("","Item has Insufficient Quantities","error");
				this.value=aqty;
			}
		});
		
		$(document).on("keyup",'#depositpaid',function(){
			this.value = this.value.replace(/\D/, 1);
			this.value=(isNaN(this.value.replace(/\,/g,'') || 0)) ? 0 : (this.value.replace(/\,/g,'') || 0);
			calculateBal();
		});
		
		$(document).on("blur",".qty",function(event){
			if ($(event.target).is('.qty')) {
				var iid=$(this).attr('id').split('_')[1];
				if((parseInt($(this).val())>parseInt($("#iqty_"+iid).val())) && ($("#ordertype").val()==0)){
					swal("","Qty Greater than Available","error");
					return;
				}
				var iid=$(this).attr('id').split('_')[1];
				//var selIdx=$(this).prop('selectedIndex');
				//$('#factor_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				
				(isNaN(parseInt($(this).val()))) ?this.value =this.value.replace(/\D/, 1):'';
				
				getRowTotal(iid);  
				
			}
		});
		
		function getRowTotal(rid){
			var vrate=isNaN(parseFloat($('.vatrate').val()))?0:parseFloat($('.vatrate').val());
			var tvrate=parseFloat(vrate)+100;
			var dvrate=parseFloat(vrate)/100;
			
			
			var uom=$('#factor_'+rid).val(),
			qty=isNaN($('#qty_'+rid).val())?0:$('#qty_'+rid).val(),
			uprice=isNaN($('#price_'+rid).val())?0:$('#price_'+rid).val(),
			vatable=$('#vatable_'+rid).val(),
			
			vat=(vatable==1)?(uom*qty*uprice*vrate)/tvrate:0,
			total=uom*qty*uprice;
			var rvat=vat.toFixed(2),
			rtotal=total.toFixed(2);
			
			$('#vat_'+rid).val(vat.toFixed(2));
			$('#total_'+rid).val(rtotal);
			getColumnTotal();
		
		}

		function getColumnTotal()
		{
			var colTotal=0,
			colVat=0,
			colQty=0;

			$('.total').each(function(){
				var col_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
				colTotal+=parseFloat(col_value);
			});
			$('.vat').each(function(){
				var vat_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
				colVat+=parseFloat(vat_value);

			});

			$('.qty').each(function(){
				var qty_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
				colQty+=parseInt(qty_value);

			});

			$('.tqty').val(colQty.toFixed(0));
			$('.vattotal').val(colVat.toFixed(2));
			$('.grosstotal').val(colTotal.toFixed(2));
			//calculateDisc();
			calculateBal();
		}
		function calculateBal()
		{
            var disc=0;
            var grossTotal=$('.grosstotal').val();
			var depopaid=(isNaN($('#depositpaid').val().replace(/\,/g,'') || 0)) ? 0 : ($("#depositpaid").val().replace(/\,/g,'') || 0);
			var balcf =grossTotal-depopaid; 
			$('.balcf').val(balcf.toFixed(2));
		
		}
		
		function calculateDisc()
		{
			var disc=0;
			var grossTotal=$('.grosstotal').val();
			var vatTotal=$('.vattotal').val();
			var discRate=$('#discount').val()*0.01;
			
			if($('#vatstat').val()>0){
				disc=grossTotal*discRate;
			}else{
				disc=(grossTotal-vatTotal)*discRate;
			}
			$('.totaldisc').val(disc.toFixed(2));
		
		}


		function loadAcct(vtype){
	/*		
			
			var opts="<option value='-1' selected='selected'>--Select Account--</option>";
			//console.log(vtype);

			if(vtype==0){
				for(i in accts)
				{
					opts+="<option value='"+accts[i].code+"'>"+accts[i].description+"</option>";
				}
				$('.acct-label').html('Account');
			}else{

				for(i in payables)
				{
					opts+="<option value='"+payables[i].code+"'>"+payables[i].name+"</option>";
				}
				$('.acct-label').html('Supplier');
			}	
			
			$('#acct').html('').append(opts);	*/
			
		}


		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('div.panel-footer').html('');
		}


		$(document).on("click","#btnAddItems",function(event){
			var rows=$('.itemcode').length+1;
			var lastID=$('.itemcode:last').attr('id');

			if (lastID === undefined){lastID=rows;}else{
				lastID=$('.itemcode:last').attr('id').split('_')[1];
			}

			addRow(parseInt(lastID)+1);			
		});

		

		function addRow(rid){

			var items={!!$items!!};
			if($('#client').val()==-1){swal("","Select Client & Try Again","error");return;}

			
			var row="<tr id='tr_"+rid+"' class='line-item'>"+
			"<td>"+
			"<select class='form-control-grid select2-selection-grid itemcode ' name='itemcode[]' id='itemcode_"+rid+"' style='border-radius:0px !important;width:auto;'>"+
			"<option value='-1' selected>--Select Code--</option>";
			for(i in items){
				row+="<option value='"+items[i].code+"'>"+items[i].code+"</option>";
			}
			row+="</select></td>";
			row+="<td><select class='form-control-grid select2-selection-grid description col-xs-8' name='description[]' id='description_"+rid+"' style='border-radius:0px !important;'>";
			row+="<option value='-1' selected>--Select Description--</option>";
			for(i in items){
				row+="<option value='"+items[i].description+"'>"+items[i].description+"</option>";
			}
			row+="</select>";
			row+="<select class='form-control-grid iprice ' name='iprice[]' id='iprice_"+rid+"' style='display:none;border-radius:0px !important;'>"+
			"<option value='0' selected>0</option>";
			for(i in items){
				row+="<option value='"+items[i].sprice+"'>"+items[i].sprice+"</option>";
			}
			row+="</select>";
            row+="<input type='text' style='display:none;' class='form-control iqty' name ='iqty[]' id ='iqty_"+rid+"' value='0'>"+
			"</td>"+
			"<td>"+
			"<select class='form-control-grid uom  col-xs-4' name='uom[]' id='uom_"+rid+"' style='border-radius:0px !important ;width: auto' >"+
			@foreach($units as $uom)
			"<option value='{{$uom->code}}'>{{$uom->description}}</option>"+
			@endforeach
			"</select>"+
			"<select class='form-control-grid factor  col-xs-4' name='factor[]' id='factor_"+rid+"' style='display:none;border-radius:0px !important ;width: auto' >"+
			@foreach($units as $uom)
			"<option value='{{$uom->factor}}'>{{$uom->factor}}</option>"+
			@endforeach
			"</select>"+
			"</td>"+
			"<td><input type='text' name='qty[]' id='qty_"+rid+"' class='text-center form-control-grid qty   ' value='1' ></td>"+
			"<td><input type='text' name='price[]' id='price_"+rid+"' class='form-control-grid price ' value='0' readonly></td>"+
			"<td>"+
			"<select class='form-control-grid vatable  text-danger' name='vatable[]' id='vatable_"+rid+"'>"+
			"<option value='0' selected='selected'>No</option>"+
			"<option value='1' >Yes</option>"+
			"</select>"+
			"</td>"+			
			"<td>"+
			"<input type='text' id='vat_"+rid+"' value='0.00' name='vat[]' class='bg-warning text-right vat form-control-grid vat ' readonly=''>"+
			"</td>"+
			"<td>"+
			"<input type='text' id='total_"+rid+"' value='0.00' name='total[]' class='text-right total form-control-grid ' readonly=''>"+
			"</td>"+
			"<td>"+
			"<span class='removeLink btn btn-danger btn-xs'  id='remove_"+rid+"'><i class='fa fa-times'></i></span>"+
			"</td>"+
			"</tr>";

			$('.order-body').append(row);
			$('.itemcode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.form-order')});
			$('.description').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.form-order')});
			$('.vatable,.uom').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('.form-order')});
			//console.log(items);
			//var uri="/get-new-row?rid="+rid+"&client="+$('#client').val();
			/*$.get(uri,"",function( data){
				   $('.order-body').append(data);
					$('.itemcode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.form-order')});
					$('.description').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.form-order')});
					$('.vatable,.uom').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('.form-order')});
				})*/

				//reloadPrices($('#client').val(),$('#location').val(),rid);
			
			}
			
			function reloadPrices(client,location,rid){
				
				var urli="{!!url('reloadClPrices')!!}";
				$.ajax({
					type: "GET",
					url: urli,
					data: "client="+client+"&location="+location,
					cache: false,
					sync:true,
					complete:function(xhr){
						var vlist=JSON.parse(xhr.responseText);
			       //console.log(vlist.prices);
			       $('#itemcode_'+rid).html('').append(vlist.code);
			       $('#description_'+rid).html('').append(vlist.desc);
			       $('#iprice_'+rid).html('').append(vlist.prices);
			       $('#iqty'+rid).html('').append(vlist.qty);
			   }
			});
			
			}
			
			
			function getItemDescr(itemcode,client){
				var uri="/getItemDescr?item="+itemcode+"&client="+client;
				var v_descr="";
				$.ajax({
					type: "GET",
					url: uri,
					async: false,
					complete:function(xhr){
						v_descr=xhr.responseText;
					}
				});
				return v_descr;
			}

			$(document).on("click",".removeLink",function(){

				if(confirm('Remove Select Row?')){
					if($('.removeLink').length>1){
						var rid=$(this).attr('id').split('_')[1];
						removeRow(rid);
						getColumnTotal();
					}else{
						swal("",'Aleast one line Item Required !',"warning");
					}
				}
			});

			function removeRow(v_rid){
				$('.order-body #tr_'+v_rid).remove();
			}

			$('form.form-order').on('submit', function(submission) {

				submission.preventDefault();

				swal("Update Order Details?", {
					buttons: {
						cancel: "Run away!",
						catch: {
							text: "Proceed!",
							value: "catch",
						},
						default:false
					},
				})
				.then((value) => {
					switch (value) {

						case "defeat":
						return;
						break;

						case "catch":

						$('#acct').prop('disabled', false);
						$('.ptype').prop('disabled',false);
						$('#lpo').prop('disabled', false);
					// Set vars.  1
					var form   = $(this),
					url    = form.attr('action'),
					submit = form.find('[type=submit]');

					var data        = form.serialize(),
					contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';


					// Please wait.
					if (submit.is('button')) {
						var submitOriginal = submit.html();
						submit.html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
						submit.prop('disabled',true);
					} else if (submit.is('input')) {
						var submitOriginal = submit.val();
						submit.val('Please wait...');
						submit.prop('disabled',true);
					}

					// Request.
					$.ajax({
						type: "POST",
						url: url,
						data: data,
						dataType: 'json',
						cache: false,
						contentType: contentType,
						processData: false

						// Response.
					}).always(function(response, status) {
						// Reset errors.
						resetModalFormErrors();

						// Check for errors.
						if (response.status == 422) {
							var err = $.parseJSON(response.responseText);
							$('div.panel-footer').html('');
							// Iterate through errors object.
							$.each(err.errors, function(field, message) {
								// console.error(field+': '+message);
								//handle arrays
								if(field.indexOf('.') != -1) {
									field = field.replace('.', '[');
									//handle multi dimensional array
									for (i = 1; i <= (field.match(/./g) || []).length; i++) {
										field = field.replace('.', '][');
									}
									field = field + "]";
								}
								// var formGroup = $('[name='+field+']', form).closest('.form-group');
								// formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
								$('div.panel-footer').addClass('has-error').append('<p class="help-block">'+message+'</p>');
							});

							// Reset submit.
							if (submit.is('button')) {
								submit.html(submitOriginal);
								submit.prop('disabled',false);
							} else if (submit.is('input')) {
								submit.val(submitOriginal);
								submit.prop('disabled',false);
							}

							// If successful, reload.
						} else {
							if(response.status==500){

								bootbox.dialog({message:response.responseText});
								//$('.ui-alert').html(response.responseText);
								//$('.ui-alert').html("<span class='text-warning'><i class='fa fa-frown fa-fw'></i> Something went Wrong</span>");                   
							}else{  
								//console.log(response.responseText);
								//bootbox.dialog({message:response.responseText});
								swal("",response.responseText,"success");
								$('form.form-order')[0].reset();
								// Reset submit.
								if (submit.is('button')) {
									submit.html(submitOriginal);
									submit.prop('disabled',false);
								} else if (submit.is('input')) {
									submit.val(submitOriginal);
									submit.prop('disabled',false);
								}
							}
							//location.reload();

						}
					});

					break;

					default:
					swal("Got away safely!");
				}
			});
			});

		// Reset errors when opening modal.
		$('.form-order').click(function() {
			resetModalFormErrors();
		});



	});
</script>
@stop