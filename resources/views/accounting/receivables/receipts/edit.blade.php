@extends('stocksmaster') 
@section('content')  
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="fa fa-magic "></i> <strong> New Receipt </strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-receipt" action="{{route('receipts.store')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('rno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success"><i class="fa fa-key" aria-hidden="true"></i> Rno</span>
									<input type="text" name="rno" class="form-control" value=""  placeholder="SYSGEN" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('trandate') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa-calendar" aria-hidden="true"></i> Date</span>
									<input type="text" name="trandate" class="form-control trandate" id="trandate" placeholder="Trandate" readonly="">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning">Location</span>
									<select class="form-control" name="location" id="location">
										<option value="-1" selected="selected">--Select Location--</option>
										@foreach($locations as $loc)
										<option value="{{$loc->code}}" {{$loc->code==Auth::user()->station?"selected":''}}>{{$loc->description}}</option>
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
									<span class="input-group-addon acct-label info"><i class="fa fa-user"></i> Client</span>
									<select class="form-control client" name="client" id="client">
										<option value="-1" selected="selected">--Select Client--</option>
										@foreach($clients as $client)
										<option value="{{$client->code}}" >{{$client->name}}</option>
										@endforeach
									</select>
								</div>
							</div>	
						</div>	
						<div class="col-md-3">
							<div class="form-check abc-checkbox abc-checkbox-primary">
								<input class="form-check-input" id="parent_check" type="checkbox">
								<label class="form-check-label" for="parent_check">
									Parent Client?
								</label>
							</div>
						</div>
						<div class="col-md-3">

							<div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success"><i class="fa fa-bandcamp" aria-hidden="true"></i> Account</span>
									<select class="form-control" name="account" id="account">
										<option value="-1" selected="selected">--Select Account--</option>
										@foreach($accounts as $acct)
										<option value="{{$acct->code}}">{{$acct->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('datefrom') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning"><i class="fa fa-calendar-times-o"></i> Date From</span>
									<input type="text" name="datefrom" class="form-control datefrom" id="datefrom" placeholder="Date From" >
								</div>
							</div>
							
						</div>
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('dateto') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning"><i class="fa fa-calendar-times-o"></i> Date To</span>
									<input type="text" name="dateto" class="form-control dateto" id="dateto" placeholder="Date To" readonly="">
								</div>
							</div>
							
						</div>
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('refno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon info">Other Ref</span>
									<input type="text" name="refno"  id="refno" class="col-md-6 form-control" value="" placeholder="Enter Refno" >
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('bankdate') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa-calendar" aria-hidden="true"></i> Value Date</span>
									<input type="text" name="bankdate" class="form-control bankdate" id="bankdate" placeholder="Value Date" readonly="">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group {{ $errors->has('amount') ? ' has-error' : '' }}">
									<span class="input-group-addon danger"><i class="fa fa-dollar" aria-hidden="true"></i> Amount In</span>
									<input type="text" id="amount" name="amount" class="form-control amount" value="" placeholder="0.00">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group {{ $errors->has('wtax') ? ' has-error' : '' }}">
									<span class="input-group-addon success"> 
										<div class="form-check abc-checkbox abc-checkbox-warning">
											<input class="form-check-input" id="wtax_check" type="checkbox" >
											<label class="form-check-label" for="wtax_check">
												Wtax ({{$settings->wtax*100}} %)
											</label>
										</div>
									</span>
									<input type="text" id="wtax" name="wtax" class="form-control" value="0.00" placeholder="0.00" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group {{ $errors->has('chequeno') ? ' has-error' : '' }}">
									<span class="input-group-addon info">Cheque No</span>
									<input type="text" id="chequeno" name="chequeno" class="form-control" value="" placeholder="Enter Cheque no">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Remarks</span>
									<textarea class="form-control" name="remarks" id="remarks" rows=1 style="resize: none;"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class = "col-md-12">

							<table class="table-items" style="width:100%;" >
								<thead class="bg-primary">
									<tr>
										<th>InvNo</th>
										<th>Invdate</th>
										<th>Lpo</th>
										<th class="text-left">Source</th>
										<th class="text-right">Due</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody class="invoice-body">
									
								</tbody>
							</table>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<!-- <a href="#" class="btn btn-success pull-left " id="btnAddItems" ><i class="fa fa-cart-plus"></i> Add Row</a> -->
						</div>
						<div class="col-md-8">
							<div class="col-md-4 form-group {{ $errors->has('totaldue') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning">Total Due</span>
									<input type="text" name="totaldue" class="totaldue form-control text-right" value="0.00" readonly="" >
								</div>
							</div>
							<div class="col-md-4 form-group {{ $errors->has('totalpaid') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success">Total Paid</span>
									<input type="text" name="totalpaid" class="totalpaid form-control text-right" value="0.00" readonly="" >
								</div>
							</div>
							<div class="col-md-4  form-group {{ $errors->has('totalcf') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon danger">Total C/F</span>
									<input type="text" name="totalcf" class="totalcf form-control text-right" value="0.00" readonly="" >
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
	$(function(){

		$('#trandate').datepicker({format:'yyyy-mm-dd'}).datepicker("setDate", new Date());

		var dnow=new Date();
		var vday=dnow.getDate();
		var vmth=(dnow.getMonth()-1)+1;
		var vyr=dnow.getFullYear();
		var vfdate=vyr+'-'+vmth+'-'+1;

		
		//console.log(Date.today().toString("yyyy-MM-dd"));
	
		$('#datefrom').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom"}).datepicker("setDate", Date.today().add(-1).months());
		$('#dateto').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom"}).datepicker("setDate", Date.today());
		$('#bankdate').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom"}).datepicker("setDate", Date.today());
		//$('.itemcode,.description').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});
		$('.itemcode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.invoice-body')});
		$('.description').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.invoice-body')});
		$('.vatable,.uom,.client').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('body')});

		$(document).on("change",".client",function(){
			$('.invoice-body').html('');
			loadInvoices();
		});

		$(document).on("change","#datefrom",function(){
			$('.invoice-body').html('');
			loadInvoices();
		});
		$(document).on("change","#dateto",function(){
			$('.invoice-body').html('');
			loadInvoices();
		});

		$(document).on("change","#wtax_check",function(){
			if($(this).prop("checked")){
				var wtr={!!$settings->wtax!!};

				var amtpaid=(isNaN($("#amount").val().replace(/\,/g,'') || 0)) ? 0 : ($("#amount").val().replace(/\,/g,'') || 0);
				var wtax=amtpaid*wtr;
				$('#wtax').val((isNaN(wtax) ? 0 : (wtax)));
			}else{
				$('#wtax').val('0.00');
			}
		});

		$(document).on("change","#amount",function(){
			if($("#wtax_check").prop("checked")){
				var wtr={!!$settings->wtax!!};

				var amtpaid=(isNaN($("#amount").val().replace(/\,/g,'') || 0)) ? 0 : ($("#amount").val().replace(/\,/g,'') || 0);
				var wtax=amtpaid*wtr;
				$('#wtax').val((isNaN(wtax) ? 0 : (wtax)));
			}
			getColumnTotal();
		});


		$(document).on("change",".itemcode",function(event){
			if ($(event.target).is('.itemcode')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#description_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iqty_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				var loc=$("#location").val(),
				icode=$(this).val();
				//console.log("loc={!!"+loc+"!!} code="+icode);
				getQty(icode,loc,iid);
				$('#qty_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				//var iqty="{{Stockspro::getItemQty("+{!!icode!!}}+","+{!!loc!!}+")}}";
				/*console.log(iqty);
				$('#iqty_'+iid).val(iqty);*/
			}
		});

		$(document).on("change",".iqty",function(){
			var iid=$(this).attr('id').split('_')[1];
			(parseInt($(this).val())<1)?$('#qty_'+iid).val(0):$('#qty_'+iid).val(1);
			
		});

		function getQty(item,loc,rid){
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

		$(document).on("click","#parent_check",function(event){
			loadClients($(this).prop("checked"));
		});

		function loadClients(parent){
			var clients={!!$clients!!};
			var opts='<option value="-1" selected="selected">--Select Client--</option>';
			if(parent){
				for(i in clients){
					if(clients[i].parent==1){
						opts+='<option value="'+clients[i].code+'" >'+clients[i].name+'</option>';
					}
				}
			}else{
				for(i in clients){
					if(clients[i].parent==0){
						opts+='<option style="color:red;" value="'+clients[i].code+'" >'+clients[i].name+'</option>';
					}
				}

			}
			$('#client').html('').append(opts);
			
		}

		$(document).on("change",".description",function(event){
			if ($(event.target).is('.description')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#itemcode_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iqty_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				var loc=$("#location").val(),
				icode=$(this).val();
				getQty(icode,loc,iid);
				
			}
		});

		$(document).on("change",".iprice",function(event){
			var iid=$(this).attr('id').split('_')[1];
			var selIdx=$(this).prop('selectedIndex');
			$('#price_'+iid).val($(this).val()).trigger("change");
			
		});

		$(document).on("change",".uom",function(event){
			if ($(event.target).is('.uom')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#factor_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				getRowTotal(iid);
				
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
			if(parseInt(this.value)>parseInt(aqty)){
				swal("","Item has Insufficient Quantities","error");
				this.value=aqty;
			}
		});

		$(document).on("blur",".qty",function(event){
			if ($(event.target).is('.qty')) {
				var iid=$(this).attr('id').split('_')[1];
				if(parseInt($(this).val())>parseInt($("#iqty_"+iid).val())){
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

		function checkQty(rid){
			var AvailableQty=isNaN(parseInt($('#iqty_'+rid).val()))?0:parseInt($('#iqty_'+rid).val()),
			ActualQty=isNaN(parseInt($('#qty_'+rid).val()))?0:parseInt($('#qty_'+rid).val());
			
			if(ActualQty>AvailableQty){
				swal("","Item has Insufficient Quantities","error");
				$('#qty_'+rid).addClass('has-error');
			}
		}

		function getRowTotal(rid){
			//checkQty(rid);
			var uom=$('#factor_'+rid).val(),
			qty=isNaN($('#qty_'+rid).val())?0:$('#qty_'+rid).val(),
			uprice=isNaN($('#price_'+rid).val())?0:$('#price_'+rid).val(),
			vatable=$('#vatable_'+rid).val(),
			vat=(vatable==1)?(uom*qty*uprice*16)/116:0,
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
			amtpaid=(isNaN($("#amount").val().replace(/\,/g,'') || 0)) ? 0 : ($("#amount").val().replace(/\,/g,'') || 0),
			cf=0;

			$('.due').each(function(){
				var iid=$(this).attr('id').split('_')[1];
				
				if($('#paycheck_'+iid).prop("checked")){
					var col_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
					colTotal+=parseFloat(col_value);
				}
			});

			$('.totaldue').val(colTotal.toFixed(2));
			$('.totalpaid').val(amtpaid);

			$('.totalcf').val((colTotal-amtpaid).toFixed(2));



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

		function loadInvoices(){

			var items={!!$invoices!!};
			
			if($('#client').val()==-1){swal("","Select Client & Try Again","error");return;}

			var rows="";
			var startDate=Date.parse($('#datefrom').val()).toString("yyyy-MM-dd"),endDate=Date.parse($('#dateto').val()).toString("yyyy-MM-dd");

			for(i in items){
				if($('#client').val()==($('#parent_check').prop("checked")?items[i].parent:items[i].clcode)){
					var iDate=Date.parse(items[i].invdate).toString("yyyy-MM-dd");
					if(DateBetween(iDate,startDate,endDate)){
					
						rows+="<tr id='id_"+i+"'>"+

						"<td style='width:10% !important'>"+
						"<input type='text'  name='invno[]' id='qty_"+i+"' class='text-center form-control-grid invno' value='"+items[i].invno+"' readonly>"+
						"</td>"+
						"<td style='width:10% !important'>"+
						"<input type='text' name='invdate[]' id='invdate_"+i+"' class='text-center form-control-grid invdate  col-xs-2 ' value='"+items[i].invdate+"' readonly>"+
						"</td>"+
						"<td style='width:15% !important'>"+
						"<input type='text' name='lpo[]' id='lpo_"+i+"' class='text-center form-control-grid lpo  col-xs-2 ' value='"+items[i].lpo+"' readonly>"+
						"</td>"+
						"<td style='width:40% !important'>"+
						"<input type='text' name='clname[]' id='clname_"+i+"' class='text-left form-control-grid clname col-xs-2' value='"+items[i].clname+"' readonly>"+
						"</td>"+
						"<td style='width:20% !important'>"+
						"<input type='text' name='due[]' id='due_"+i+"' class='text-right form-control-grid due  col-xs-2 ' value='"+$.number(items[i].due,2)+"' readonly>"+
						"</td>"+
						"<td  style='display:none;'>"+
						"<input id='payme_"+i+"' name='payme[]' type='text' value='0' class='text-right form-control-grid payme' style='display:none;'>"+
						"</td>"+
						"<td>"+
						"<div class='form-check abc-checkbox abc-checkbox-warning input-group-addon danger'>"+
						'<input name="paycheck[]" class="form-check-input paycheck" id="paycheck_'+i+'"  type="checkbox" >'+
						'<label class="form-check-label" for="paycheck_'+i+'">'+
						"Pay?"+
						"</label>"+
						"</div>"+
						"</td>"+
						"</tr>";
					}
				}
			}

			$(".invoice-body").html(rows);
			

		}

		$(document).on("click",'.paycheck',function(){
			var iid=$(this).attr('id').split('_')[1];
			console.log(iid);
			if($(this).prop("checked")){$("#payme_"+iid).val(1);}else{$("#payme_"+iid).val(0);}
			getColumnTotal();
		});

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

		function DateBetween(checkDate,startDate,endDate){
			var check=Date.parse(checkDate).toString("yyyy-MM-dd");
			var from=Date.parse(startDate).toString("yyyy-MM-dd");
			var to=Date.parse(endDate).toString("yyyy-MM-dd");
			//console.log(from+">="+check+"<="+to);
			//if((check <= to && check >= from)) {
			if((check >= from && check <= to)){
				return true;
			}else{
				return false;
			}
		}

		function removeRow(v_rid){
			$('.invoice-body #tr_'+v_rid).remove();
		}

		$('form.form-receipt').on('submit', function(submission) {

			submission.preventDefault();

			swal("Save Receipt Details?", {
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
					                	console.error(field+': '+message);
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
					                	bootbox.dialog({message:response.responseText});
					                	//swal("",response.responseText,"success");
					                	$('form.form-receipt')[0].reset();
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
	    $('.form-receipt').click(function() {
	    	resetModalFormErrors();
	    });
	});
</script>
@stop