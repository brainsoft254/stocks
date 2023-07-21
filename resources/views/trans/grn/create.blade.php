
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="fa fa-magic "></i> <strong> New Goods Received Note</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-grn" action="{{route('grn.store')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
								<fieldset class="the-fieldset-success">
									<legend class="the-legend-success">&mdash;Receive Mode&mdash;</legend>
									<div class="form-radio abc-radio abc-radio-success col-xs-6">
										<input type="radio" id="purchases" value="0" name="receivemode" checked class="receivemode">
										<label for="purchases">Purchases</label>
									</div>
									<div class="form-radio abc-radio abc-radio-success col-xs-6">
										<input type="radio" id="opstock" value="1" name="receivemode" class="receivemode">
										<label for="opstock"> Opening Stock </label>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
								<fieldset class="the-fieldset">
									<legend class="the-legend">&mdash;Purchase Type&mdash;</legend>
									<div class="form-radio abc-radio abc-radio-primary col-xs-6">
										<input type="radio" id="cash" value="0" class="ptype" name="ptype" checked>
										<label for="cash">Cash</label>
									</div>
									<div class="form-radio abc-radio abc-radio-primary col-xs-6"">
										<input type="radio" id="credit" value="1" class="ptype" name="ptype">
										<label for="credit"> Credit </label>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('refno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success">Ref</span>
									<input type="text" name="refno" class="form-control" value="-AUTO-" readonly="" >
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('trandate') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Date</span>
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
										<option value="{{$loc->code}}" >{{$loc->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('lpo') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning">LPO</span>
									<select class="form-control" name="lpo" id="lpo">
										<option value="-1" selected="selected">--Select LPO--</option>
									</select>
								</div>
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon acct-label info">Account</span>
									<select class="form-control" name="acct" id="acct">
										<option value="-1" selected="selected">--Select Acct--</option>
										@foreach($accounts as $account)
										<option value="{{$account->code}}" >{{$account->description}}</option>
										@endforeach
									</select>
								</div>
							</div>	
						</div>	
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Remarks</span>
									<textarea class="form-control" name="remarks" id="remarks" rows=1 style="resize: none;"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon danger">VAT RATE (%)</span>
								<input type="text" name="vatrate" class="vatrate form-control text-right" value="{{Stockspro::vatRate()}}" readonly="" >
							</div>						
						</div>
					</div>
					<div class="row">
						<div class = "col-md-12">

							<table class="table-items" style="width:100%;" >
								<thead class="bg-primary">
									<tr>
										<th>Code</th>
										<th>Description</th>
										<th>Uom</th>
										<th class="text-center">Qty</th>
										<th>U/Price</th>
										<th>Vat?</th>
										<th class="text-right">Vat</th>
										<th class="text-right">Total</th>
										
									</tr>
								</thead>
								<tbody class="grn-body">
									<tr id="tr_0" class="line-item">
										<td>
											<select class='form-control select2-selection-grid itemcode col-xs-4' name='itemcode[]' id='itemcode_0' style='border-radius:0px !important;width:auto;'>
												<option value='-1' selected>--Select Code--</option>
												@foreach($items as $item)
												<option value="{{$item->code}}">{{$item->code}}</option>
												@endforeach
											</select>
										</td>
										<td>
											<select class='form-control select2-selection-grid description col-xs-6' name='description[]' id='description_0' style='border-radius:0px !important;'>
												<option value='-1' selected>--Select Description--</option>
												@foreach($items as $item)
												<option value="{{$item->description}}">{{$item->description}}</option>
												@endforeach
											</select>
											<select class='form-control iprice col-xs-6' name='iprice[]' id='iprice_0' style='display:none;border-radius:0px !important;'>
												<option value='-1' selected>0</option>
												@foreach($items as $item)
												<option value="{{$item->bprice}}">{{$item->bprice}}</option>
												@endforeach
											</select>
										
										</td>
										<td>
											<select class='form-control uom  col-xs-4' name='uom[]' id='uom_0' style='border-radius:0px !important ;width: auto' >
												@foreach($units as $uom)
												<option value="{{$uom->code}}">{{$uom->description}}</option>
												@endforeach
											</select>
											<select class='form-control factor  col-xs-4' name='factor[]' id='factor_0' style='display:none;border-radius:0px !important ;width: auto' >
												@foreach($units as $uom)
												<option value='{{$uom->factor}}'>{{$uom->factor}}</option>
												@endforeach
											</select>
										</td>
										<td><input type="text" name="qty[]" id="qty_0" class="text-center  form-control qty  " value="1" ></td>
										<td><input type="text" name="price[]" id="price_0" class="form-control price " value="0"></td>
										<td>
											<select class="form-control vatable col-xs-6 text-danger" name="vatable[]" id="vatable_0">
												<option value="1">yes</option>
												<option value="0" selected="selected">No</option>
											</select>
										</td>
										<td>
											<input type="text" id="vat_0" value="0.00" name="vat[]" class="vat form-control  text-right" readonly="">
										</td>
										<td>
											<input type="text" id="total_0" value="0.00" name="total[]" class="total form-control  text-right" readonly="">
										</td>
										<td>
											<!-- <a class="remove btn-danger btn-xs" id="btnremove_0" href="#"><i class="fa fa-timex"></i></a> -->
											<span class='removeLink btn btn-danger btn-xs'  id='remove_0'><i class='fa fa-times'></i></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<a href="#" class="btn btn-success pull-left " id="btnAddItems"><i class="fa fa-cart-plus"></i> Add Row</a>
						</div>
						<div class="col-md-8">
							<div class="col-md-4 form-group {{ $errors->has('vattotal') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon info">Qty Total</span>
									<input type="text" name="tqty" class="tqty form-control text-right" value="0.00" readonly="" >
								</div>
							</div>
							<div class="col-md-4 form-group {{ $errors->has('vattotal') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning">Vat Total</span>
									<input type="text" name="vattotal" class="vattotal form-control text-right" value="0.00" readonly="" >
								</div>
							</div>
							<div class="col-md-4  form-group {{ $errors->has('grosstotal') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon danger">Gross Total</span>
									<input type="text" name="grosstotal" class="grosstotal form-control text-right" value="0.00" readonly="" >
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

<script type="text/javascript">
	$(function(){

		$('#trandate').datepicker({format:'yyyy-mm-dd'}).datepicker("setDate", new Date());
		//$('.itemcode,.description').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});
		$('.itemcode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.modal')});
		$('.description').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.modal')});
		$('.vatable,.uom').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('.modal')});

		$(document).on("change",".ptype",function(){
			loadAcct($(this).val());
		});

		$(document).on("change",".receivemode",function(){
			if($(this).val()==1){
				$('#acct').html('<option value="CAPITAL" selected>CAPITAL</option>').prop('disabled',true);
				$('#lpo').html('<option value="opstock" selected>Opening Stock</option>').prop('disabled',true);
				$('.ptype').prop('disabled',true);
			}else{
				$('#acct').prop('disabled', false);
				$('.ptype').prop('disabled',false);
				$('#lpo').prop('disabled', false);
				loadAcct(0);
			}
		});

		$(document).on("change",".itemcode",function(event){
			if ($(event.target).is('.itemcode')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#description_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
			}
		});

		$(document).on("change",".description",function(event){
			if ($(event.target).is('.description')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#itemcode_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				
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

			this.value = this.value.replace(/\D/, 1);
		});

		$(document).on("blur",".qty",function(event){
			if ($(event.target).is('.qty')) {
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

			console.log(vrate,tvrate,dvrate);				

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

		}

		function loadAcct(vtype){
			var accts={!!$accounts!!}
			var payables={!!$suppliers!!}
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
			
			$('#acct').html('').append(opts);	
			
		}


		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('div.panel-footer').html('');
		}

		
		$(document).on("click","#btnAddItems",function(event){
			console.log($('.itemcode').length);
			var _id = $('.itemcode').length + 1;
			addRow(_id);
			_id + 1;
			// var rows=$('.itemcode').length+1;
			// var lastID=$('.itemcode:last').attr('id');
			
			// if (lastID === undefined){lastID=rows;}else{
			// 	lastID=$('.itemcode:last').attr('id').split('_')[1];
			// }
			
			// addRow(parseInt(lastID)+1);			
		});
		
		function addRow(rid){
			
			var row="<tr id='tr_"+rid+"' class='line-item'>"+
			"<td>"+
			"<select class='form-control select2-selection-grid itemcode col-xs-4' name='itemcode[]' id='itemcode_"+rid+"' style='border-radius:0px !important;width:auto;'>"+
			"<option value='-1' selected>--Select Code--</option>"+
			@foreach($items as $item)
			"<option value='{{$item->code}}'>{{$item->code}}</option>"+
			@endforeach
			"</select>"+
			"</td>"+
			"<td>"+
			"<select class='form-control select2-selection-grid description col-xs-6' name='description[]' id='description_"+rid+"' style='border-radius:0px !important;'>"+
			"<option value='-1' selected>--Select Description--</option>"+
			@foreach($items as $item)
			"<option value='{{trim($item->description)}}'>{{trim($item->description)}}</option>"+
			@endforeach
			"</select>"+
			"<select class='form-control iprice col-xs-6' name='iprice[]' id='iprice_"+rid+"' style='display:none;border-radius:0px !important;'>"+
			"<option value='0' selected>0</option>"+
			@foreach($items as $item)
			"<option value='{{$item->bprice}}''>{{$item->bprice}}</option>"+
			@endforeach
			"</select>"+
			
			"</td>"+
			"<td>"+
			"<select class='form-control uom  col-xs-4' name='uom[]' id='uom_"+rid+"' style='border-radius:0px !important ;width: auto' >"+
			@foreach($units as $uom)
			"<option value='{{$uom->code}}'>{{$uom->description}}</option>"+
			@endforeach
			"</select>"+
			"<select class='form-control factor  col-xs-4' name='factor[]' id='factor_"+rid+"' style='display:none;border-radius:0px !important ;width: auto' >"+
			@foreach($units as $uom)
			"<option value='{{$uom->factor}}'>{{$uom->factor}}</option>"+
			@endforeach
			"</select>"+
			"</td>"+
			"<td><input type='text' name='qty[]' id='qty_"+rid+"' class='text-center form-control qty  col-xs-2 ' value='1' ></td>"+
			"<td><input type='text' name='price[]' id='price_"+rid+"' class='form-control price col-xs-2' value='0' readonly></td>"+
			"<td>"+
			"<select class='form-control vatable col-xs-6 text-danger' name='vatable[]' id='vatable_"+rid+"'>"+
			"<option value='1'>yes</option>"+
			"<option value='0' selected='selected'>No</option>"+
			"</select>"+
			"</td>"+
			"<td>"+
			"<input type='text' id='vat_"+rid+"' value='0.00' name='vat[]' class='bg-warning text-right vat form-control vat col-xs-2' readonly=''>"+
			"</td>"+
			"<td>"+
			"<input type='text' id='total_"+rid+"' value='0.00' name='total[]' class='text-right total form-control col-xs-3' readonly=''>"+
			"</td>"+
			"<td>"+
			"<span class='removeLink btn btn-danger btn-xs'  id='remove_"+rid+"'><i class='fa fa-times'></i></span>"+
			"</td>"+
			"</tr>";

			$('.grn-body').append(row);
			$('.itemcode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.modal')});
			$('.description').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.modal')});
			$('.vatable,.uom').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('.modal')});

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
			$('.grn-body #tr_'+v_rid).remove();
		}

		$('form.form-grn').on('submit', function(submission) {

			submission.preventDefault();

			swal("Save Grn Details?", {
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
					                	$('form.form-grn')[0].reset();
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
	    $('.form-grn').click(function() {
	    	resetModalFormErrors();
	    });



	});
</script>
