@extends('stocksmaster') 
@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="box  box-primary">
			<div class="box-header">
				<h3 class="text-primary"><span class="glyphicon glyphicon-knight"></span><strong> New Stock Return {WITHOUT INVOICE}</strong><span class="ui-marker"></span></h3>
				<div class="box-tools pull-right">
					<a href="{{url('returns')}}" data-toggle="tooltip" data-placement="bottom" title="Go Back" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
				</div>
				<hr style="border-top:solid 1px #ccc">
			</div>
			<div class="box-body">
				<form class="form-credits" action="{{route('returns.store')}}" method="POST">
					@csrf
					<div class="ui-cl-invoices">
						<div class="row">
							<div class="col-md-4 form-group {{ $errors->has('refno') ? ' has-error' : '' }}" id="refno-group">
								<div class="input-group">
									<span class="input-group-addon warning"><i class="glyphicon glyphicon-dashboard"></i> RefNo</span>
									<input type="text" class="form-control" name="refno" value="-AUTO-" readonly>
								</div>
							</div>
							<div class="col-md-4 form-group {{ $errors->has('trandate') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa-calendar"></i></span>
									<input type="text" name="trandate" id="trandate" class="form-control" value="{{Stockspro::getToday()}}" placeholder="" readonly>
								</div>
							</div>
							<div class="col-md-4 form-group {{ $errors->has('crinvno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon danger"><i class="fa fa-clone"></i> Doc No#</span>
									<input type="text" name="crinvno" id="crinvno" class="form-control" value="" placeholder="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<div class="input-group">
									<span class="input-group-addon danger"><i class="fa fa-magic"> clcode Type</i></span>
									<select class="form-control cltype" name="cltype" id="cltype">
										<option value="-1" selected="selected">-Select clcode Type-</option>
										<option value="1">Parent</option>
										<option value="0" >Child</option>
									</select>
								</div>
							</div>
							<div class="col-md-4"><input type="text" name="rtype" id="rtype" class="form-control" value="0" placeholder="" readonly="" style="display:none;"></div>
							<div class="col-md-4 form-group">
								<div class="input-group">
									<span class="input-group-addon warning"><i class="fa fa-magic"> Return Type</i></span>
									<select class="form-control rtmode" name="rtmode" id="rtmode">
										<option value="-1">--Select Return Type--</option>
										<option value="0">Normal</option>
										<option value="1">Breakage</option>
										<!-- <option value="2">Replacement</option> -->
									</select>
								</div>
							</div>
						</div>	
						<div class="row">					
							<div class="col-md-8 form-group {{ $errors->has('clcode') ? ' has-error' : '' }}" id="clcode-group">
								<div class="input-group">
									<span class="input-group-addon success"><i class="fa fa-user"> clcode</i></span>
									<select class="form-control clcode" name="clcode" id="clcode">
										<option value="-1" selected="selected">--Select client Name--</option>
										@foreach($clients as $client)
										<option value="{{$client->code}}" >{{$client->name}}</option>
										@endforeach
									</select>
									<input style="display: none;" type="text" name="vatstat" id="vatstat" value="0">
								</div>
							</div>	
							
							<div class="col-md-4 form-group {{ $errors->has('location') ? ' has-error' : '' }}" id="location-group">
								<div class="input-group">
									<span class="input-group-addon success"><i class="fa fa-user"> Location</i></span>
									<select class="form-control location" name="location" id="location">
										<option value="-1" selected="selected">--Select Location--</option>
										@foreach($locations as $loc)
										<option value="{{$loc->code}}" {{$loc->code==Auth::user()->station?'selected':''}} >{{$loc->description}}</option>
										@endforeach
									</select>
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-md-12 form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa-code"></i> Remarks</span>
									<input type="text" name="remarks" id="remarks" class="form-control" value="" placeholder="Enter Some Remarks">
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
											<th>U/rate</th>
											<th>Vat?</th>
											<th class="text-right">Vat</th>
											<th class="text-right">Total</th>
										</tr>
									</thead>
									<tbody class="return-body">

									</tbody>
								</table>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-4">
								<a href="#" class="btn btn-success pull-left " id="btnAddItems" ><i class="fa fa-cart-plus"></i> Add Row</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<!-- <a href="#" class="btn btn-success pull-left " id="btnAddItems" ><i class="fa fa-cart-plus"></i> Add Row</a> -->
							</div>
							<div class="col-md-8">
								<div class="col-md-4 form-group {{ $errors->has('vattotal') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon info">Qty Total</span>
										<input type="text" name="tqty" class="tqty form-control text-right" value="0.00" readonly="" >
									</div>
								</div>
								<div class="col-md-4 form-group {{ $errors->has('gvat') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon warning">Vat Total</span>
										<input type="text" name="gvat" class="gvat form-control text-right" value="0.00" readonly="" >
									</div>
								</div>
								<div class="col-md-4  form-group {{ $errors->has('gtotal') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon danger">Gross Total</span>
										<input type="text" name="gtotal" class="gtotal form-control text-right" value="0.00" readonly="" >
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
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('page-style')
<style type="text/css">
	table.ui-inv-details{
		border-collapse: collapse;
	}
	input.iu-header{
		background: #5bc0de !important;
		color:#fff;
		border: none;
	}
	input.iu-header-sm{
		background: #5bc0de !important;
		color:#fff;
		border: none;
		width:auto !important;
	}
	input#th_cramnt{
		background: #d9534f !important;
	}
	tbody.ui-rct-details input.rct-details {
		/*width: auto;*/
		border-bottom: 1px solid #ccc;
		border-right: 1px dotted #ccc;
	}
	input.rct-details-sm{
		width: 10% !important;
		border-bottom: 1px solid #ccc;
		border-right: 1px dotted #ccc;
	}
/*.ui-inv-details .btnInsert{
	display:none!important;
	}*/
	/*tbody.ui-rct-details input {display: block; padding: 1; margin: 0; border: 0; width: 100%;}*/
	tbody.ui-rct-details #invno_,#amount_,#due_{
		width:100%;
	}
	#invtype_{width: 200px;}
</style>
@stop
@section('page-script')
<script type="text/javascript">
	$(function(){
		$('.clcode').select2({theme:'bootstrap',closeOnSelect: true,width:'100%',dropdownParent: $('.box-body')});
		$('#dfrom,#dto,#trandate').datepicker({format:'yyyy-mm-dd',autoClose:true});

		$(document).on("click",'.removeLink',function(){
			if(confirm('Remove Selected Row?')){
				var rid=$(this).attr('id').split('_')[1];
				removeRow(rid);
				getColumnTotal(rid);
			}
		});


		$(document).on("change","#cltype",function(){
			var clients={!!$clients!!};
			var clopts="<option value='-1' selected=selected>--Select clcode--</option>"
			for(i in clients){
				if($(this).val()>0){
					if(clients[i].parent>0){
						clopts+="<option value='"+clients[i].code+"'>"+clients[i].name+"</option>";
					}
				}else{
					if(clients[i].parent<1){
						clopts+="<option value='"+clients[i].code+"'>"+clients[i].name+"</option>";
					}
				}
			}

			$('.clcode').html('').append(clopts);
			
		});




		$(document).on("change",".clcode",function(){
			var selIdx=$(this).prop('selectedIndex');
			$('#vstat option:eq('+selIdx+')').prop('selected',true).change();
			getVatstat($(this).val());
			$('.order-body').html('');
			
		});

		

		function getVatstat(clcode)
		{
			var urli="{!!url('isClvatable')!!}";
			$.ajax({
				type: "GET",
				url: urli,
				data: "clcode="+clcode,
				cache: false,
				sync:true,
				complete:function(xhr){
					$('#vatstat').val(xhr.responseText);
				}
			});

			
		}		


		$(document).on("change",".icode",function(event){
			if ($(event.target).is('.icode')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#idesc_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#irate_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iqty_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				var loc=$("#location").val(),
				icode=$(this).val();
				//console.log("loc={!!"+loc+"!!} code="+icode);
				//getclcoderate(icode,$('#clcode').val());
				getQty(icode,loc,iid);
				$('#qty_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
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

		function getclcoderate(item,clcode,rid){
			var urli="{!!url('getItemPrice')!!}";
			$.ajax({
				type: "GET",
				url: urli,
				data: "item="+item+"&clcode="+clcode,
				cache: false,
				sync:true,
				complete:function(xhr){
					$('#rate_'+rid).val(xhr.responseText);
				}
			});
		}

		$(document).on("change",".idesc",function(event){
			if ($(event.target).is('.idesc')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#icode_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#iqty_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#irate_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				var loc=$("#location").val(),
				icode=$('#icode_'+iid).val();
				//getclcoderate(icode,$('#clcode').val());
				getQty(icode,loc,iid);
				
			}
		});

		$(document).on("change",".irate",function(event){
			var iid=$(this).attr('id').split('_')[1];
			var selIdx=$(this).prop('selectedIndex');
			$('#rate_'+iid).val($(this).val()).trigger("change");
			
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

		$(document).on("change",".rate",function(event){
			if ($(event.target).is('.rate')) {
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
			console.log('avq='+AvailableQty+"Acq="+ActualQty);
			if(ActualQty>AvailableQty){
				swal("","Item has Insufficient Quantities","error");
				$('#qty_'+rid).addClass('has-error');
			}
		}

		function getRowTotal(rid){
			//checkQty(rid);
			var uom=$('#factor_'+rid).val(),
			qty=isNaN($('#qty_'+rid).val())?0:$('#qty_'+rid).val(),
			urate=isNaN($('#rate_'+rid).val())?0:$('#rate_'+rid).val(),
			vatable=$('#vatable_'+rid).val(),
			clVatexc=$('#vatstat').val(),
			vat=(clVatexc>0)?(uom*qty*urate*0.16):((vatable==1)?(uom*qty*urate*16)/116:0),
			total=uom*qty*urate;
			var rvat=vat.toFixed(2),
			rtotal=total;

			
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
			$('.gvat').val(colVat.toFixed(2));
			$('.gtotal').val(colTotal.toFixed(2));

		}

		$(document).on("click","#btnAddItems",function(event){

			if($('.clcode').val()==-1){
				swal("","Select clcode & Try Again","error");
				return;
			}
			var rows=$('.icode').length+1;
			var lastID=$('.icode:last').attr('id');

			if (lastID === undefined){lastID=rows;}else{
				lastID=$('.icode:last').attr('id').split('_')[1];
			}

			addRow(parseInt(lastID)+1);			
		});



		function addRow(rid,loadQty=false){
			if($('#clcode').val()==-1){swal("","Select clcode & Try AGain","error");return;}
			if($('#location').val()==-1){swal("","Select Location & Try AGain","error");return;}
			var row="<tr id='tr_"+rid+"' class='line-item'>"+
			"<td>"+
			"<select class='form-control-grid select2-selection-grid icode col-xs-5' name='icode[]' id='icode_"+rid+"' style='border-radius:0px !important;width:auto;'>"+
			"<option value='-1' selected>--Select Code--</option>"+
			"</select>"+
			"</td>"+
			"<td>"+
			"<select class='form-control-grid select2-selection-grid idesc col-xs-8' name='idesc[]' id='idesc_"+rid+"' style='border-radius:0px !important;'>"+
			"<option value='-1' selected>--Select Description--</option>"+
			"</select>"+
			"<select class='form-control-grid irate col-xs-6' name='irate[]' id='irate_"+rid+"' style='display:none;border-radius:0px !important;'>"+
			"<option value='0' selected>0</option>"+
			"</select>"+
			"<select class='form-control-grid iqty col-xs-6' name='iqty[]' id='iqty_"+rid+"' style='display:none;border-radius:0px !important;'>"+
			"<option value='0' selected>0</option>"+

			"</select>"+	
			"</td>"+
			"<td>"+
			"<select class='form-control-grid uom  ' name='uom[]' id='uom_"+rid+"' style='border-radius:0px !important ;width: auto' >"+
			@foreach($units as $uom)
			"<option value='{{$uom->code}}'>{{$uom->description}}</option>"+
			@endforeach
			"</select>"+
			"<select class='form-control-grid factor  ' name='factor[]' id='factor_"+rid+"' style='display:none;border-radius:0px !important ;width: auto' >"+
			@foreach($units as $uom)
			"<option value='{{$uom->factor}}'>{{$uom->factor}}</option>"+
			@endforeach
			"</select>"+
			"</td>"+
			"<td><input type='text' name='qty[]' id='qty_"+rid+"' class='text-center form-control-grid qty   ' value='1' ></td>"+
			"<td><input type='text' name='rate[]' id='rate_"+rid+"' class='form-control-grid rate ' value='0' readonly></td>"+
			"<td>"+
			"<select class='form-control-grid vatable col-xs-6 text-danger' name='vatable[]' id='vatable_"+rid+"'>"+
			"<option value='1' selected='selected'>yes</option>"+
			"<option value='0' >No</option>"+
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

			$('.return-body').append(row);

			//console.log( $('#clcode').val());

			reloadPrices($('#clcode').val(),$('#location').val(),rid);
			$('.icode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.form-credits')});
			$('.idesc').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.form-credits')});
			$('.vatable,.uom').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('.form-credits')});
			

		}



		/*function reloadrates(clcode,location,rid){

			var urli="{!!url('reloadClPrices')!!}";
			$.ajax({
				type: "GET",
				url: urli,
				data: "clcode="+clcode+"&location="+location,
				cache: false,
				sync:true,
				complete:function(xhr){
					var vlist=JSON.parse(xhr.responseText);
			        console.log(vlist);
			       $('#icode_'+rid).html('').append(vlist.code);
			       $('#idesc_'+rid).html('').append(vlist.desc);
			       $('#irate_'+rid).html('').append(vlist.prices);
			       $('#iqty'+rid).html('').append(vlist.qty);
			   }
			});
			
		}*/

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
			       $('#icode_'+rid).html('').append(vlist.code);
			       $('#idesc_'+rid).html('').append(vlist.desc);
			       $('#irate_'+rid).html('').append(vlist.prices);
			       $('#iqty'+rid).html('').append(vlist.qty);

			   }
			});
			
		}


		function removeRow(v_rid){
			$('.return-body #tr_'+v_rid).remove();
		}


		//initRows();
				var v_NameChanged = false;//variable to check if event triggered by name so as to  load units/meterno belonging to a clcode
				var zoneChange=false;
				var v_cnt=0;
				var r_total=0;


				function resetModalFormErrors() {
					$('.form-group').removeClass('has-error');
					$('.form-group').find('.help-block').remove();
					$('.ui-alert').html('');
				}


				$('form.form-credits').on('submit', function(submission) {

					submission.preventDefault();

					if($('#remarks').val()==""){
						swal('Blank',"Enter some remarks & Try Again",'error');
						$('#remarks').focus();
						return;
					}

					if($('#gtotal').val()=="" || $('#gtotal').val()==0){
						swal('Blank',"Select altleast one item & Try Again",'error');
						$('#gtotal').focus();
						return;
					}

		        // Set vars.  1
		        var form   = $(this),
		        url    = form.attr('action'),
		        submit = form.find('[type=submit]');


		        var data        = form.serialize(),
		        contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';

		        /*alert(data);*/
		        // Please wait.
		        if (submit.is('button')) {
		        	var submitOriginal = submit.html();
		        	submit.html('Please wait...');
		        } else if (submit.is('input')) {
		        	var submitOriginal = submit.val();
		        	submit.val('Please wait...');
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


		             	var errors = $.parseJSON(response.responseText);

		                // Iterate through errors object.
		                $.each(errors.errors, function(field, message) {
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
		                    
		                    var formGroup = $("[name='"+field+"']", form).closest('.form-group');
		                    formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
		                 //   $('.ui-alert').append(message+"<br/>").addClass('alert alert-danger');
		             });

		                // Reset submit.
		                if (submit.is('button')) {
		                	submit.html(submitOriginal);
		                } else if (submit.is('input')) {
		                	submit.val(submitOriginal);
		                }

		            // If successful, reload.
		        } else {
		        	if(response.status==500){
		        		bootbox.dialog({message:response.responseText});              
		        	}else{  

		        		bootbox.dialog({message:response.responseText});

		        		$('form.form-credits')[0].reset();
		        		$('.inv-items-body').html('');
		        		$('.inv-details').html('');
		            	// Reset submit.
		            	if (submit.is('button')) {
		            		submit.html(submitOriginal);
		            	} else if (submit.is('input')) {
		            		submit.val(submitOriginal);
		            	}
		            	/*Reset fields*/
		            	//resetFields();
		            }
		            //location.reload();

		        }
		    });
		});

		    // Reset errors when opening modal.
		    $('.form-credits').click(function() {
		    	resetModalFormErrors();
		    });

		    function getTotal(){
		    	$('input#due_').each(function(){
		    		var col_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
		    		r_total+=parseFloat(col_value);
		    	});

		    	$('#gtotal').val(r_total.toLocaleString());
		    }

		    function getInvoices(){
		    	if($('#clcode').val()!='-1'){
		    		var urli="{!!url('get_invoices')!!}";

		    		var v_data="zone="+$('#zone').val()+
		    		"&unit="+$('#unit').val()+
		    		"&clcode="+$('#clcode').val();
		    		$.ajax({
		    			url:urli,
		    			type:'GET',
		    			data:v_data,
		    			dataType:'html',
		    			complete:function(xhr){
		    				var uts=JSON.parse(xhr.responseText);

		    				if(uts.length>0){
		    					var str="";
		    					var y =1;
		    					for (i in uts){
		    						str+='<tr>'+
		    						'<td><input type="text" name="invno_" class="form-control rct-details"  id="invno_"  value="'+uts[i].invno+'" readonly></td>'+
		    						'<td><input type="text" name="invtype" class="form-control rct-details"  id="invtype_"  value="'+uts[i].invtype+'" readonly></td>'+
		    						'<td><input type="text" name="amount" class="form-control rct-details text-right"  id="amount_"  value="'+uts[i].amount+'" readonly></td>'+
		    						'<td><input type="text" name="due" class="form-control rct-details text-right"  id="due_"  value="'+uts[i].due+'" readonly></td>'+
		    						'</tr>'
		    					}
		    					//$('.ui-rct-details').html(str);
		    					getTotal();
		    					$('#amount_in').val('');
		    					$('#credits').val('0.00');
		    					$('#towords').html('');

		    				}else{
		    					initRows();
		    					getTotal();
		    				}
		    			}
		    		});
		    	}else{
		    		swal('Select clcode Code','clcode Code Missing !','error');
		    	}
		    }

		    function initRows(){
		    	var str_='<tr>'+
		    	'<td><input type="text" name="invno_" class="rct-details"  id="invno_"  value="" readonly></td>'+
		    	'<td><input type="text" name="invtype" class="rct-details"  id="invtype_"  value="" readonly></td>'+
		    	'<td><input type="text" name="amount" class="rct-details text-right"  id="amount_"  value="" readonly></td>'+
		    	'<td><input type="text" name="amount_paid" class="rct-details text-right"  id="due_"  value="0" readonly></td>'+
		    	'</tr>';	
		    	$('.ui-rct-details').html(str_);
		    }

		    function number2words(amount) {
		    	var words = new Array();
		    	words[0] = '';
		    	words[1] = 'One';
		    	words[2] = 'Two';
		    	words[3] = 'Three';
		    	words[4] = 'Four';
		    	words[5] = 'Five';
		    	words[6] = 'Six';
		    	words[7] = 'Seven';
		    	words[8] = 'Eight';
		    	words[9] = 'Nine';
		    	words[10] = 'Ten';
		    	words[11] = 'Eleven';
		    	words[12] = 'Twelve';
		    	words[13] = 'Thirteen';
		    	words[14] = 'Fourteen';
		    	words[15] = 'Fifteen';
		    	words[16] = 'Sixteen';
		    	words[17] = 'Seventeen';
		    	words[18] = 'Eighteen';
		    	words[19] = 'Nineteen';
		    	words[20] = 'Twenty';
		    	words[30] = 'Thirty';
		    	words[40] = 'Forty';
		    	words[50] = 'Fifty';
		    	words[60] = 'Sixty';
		    	words[70] = 'Seventy';
		    	words[80] = 'Eighty';
		    	words[90] = 'Ninety';
		    	amount = amount.toString();
		    	var atemp = amount.split(".");
		    	var number = atemp[0].split(",").join("");
		    	var n_length = number.length;
		    	var words_string = "";
		    	if (n_length <= 9) {
		    		var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
		    		var received_n_array = new Array();
		    		for (var i = 0; i < n_length; i++) {
		    			received_n_array[i] = number.substr(i, 1);
		    		}
		    		for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
		    			n_array[i] = received_n_array[j];
		    		}
		    		for (var i = 0, j = 1; i < 9; i++, j++) {
		    			if (i == 0 || i == 2 || i == 4 || i == 7) {
		    				if (n_array[i] == 1) {
		    					n_array[j] = 10 + parseInt(n_array[j]);
		    					n_array[i] = 0;
		    				}
		    			}
		    		}
		    		value = "";
		    		for (var i = 0; i < 9; i++) {
		    			if (i == 0 || i == 2 || i == 4 || i == 7) {
		    				value = n_array[i] * 10;
		    			} else {
		    				value = n_array[i];
		    			}
		    			if (value != 0) {
		    				words_string += words[value] + " ";
		    			}
		    			if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
		    				words_string += "Crores ";
		    			}
		    			if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
		    				words_string += "Hundred ";
		    			}
		    			if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
		    				words_string += "Thousand ";
		    			}
		    			if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
		    				words_string += "Hundred and ";
		    			} else if (i == 6 && value != 0) {
		    				words_string += "Hundred ";
		    			}
		    		}
		    		words_string = words_string.split("  ").join(" ");
		    	}
		    	return words_string;
		    }

		});
	</script>
	@stop