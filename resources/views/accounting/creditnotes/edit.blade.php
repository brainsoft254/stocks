@extends('stocksmaster') 
@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="box  box-primary">
			<div class="box-header">
				<h3 class="text-primary"><span class="glyphicon glyphicon-knight"></span><strong> Edit Credit Note [{{$creditnote->refno}}]</strong></h3>
				<div class="box-tools pull-right">
					<a href="{{url('creditnotes')}}" data-toggle="tooltip" data-placement="bottom" title="Go Back" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
				</div>
				<hr style="border-top:solid 1px #ccc">
			</div>
			<div class="box-body">
				<form class="form-credits" action="{{route('creditnotes.update',$creditnote->id)}}" method="POST">
					@csrf @method('PUT')
					<div class="row">
						<div class="col-md-4 form-group {{ $errors->has('refno') ? ' has-error' : '' }}" id="refno-group">
							<div class="input-group">
								<span class="input-group-addon warning"><i class="glyphicon glyphicon-dashboard"></i> RefNo</span>
								<input type="text" class="form-control" name="refno" value="{{$creditnote->refno}}" readonly>
							</div>
						</div>
						<div class="col-md-4 form-group {{ $errors->has('trandate') ? ' has-error' : '' }}">
							<div class="input-group">
								<span class="input-group-addon primary"><i class="fa fa-calendar"></i></span>
								<input type="text" name="trandate" id="trandate" class="form-control" value="{{$creditnote->trandate}}" placeholder="" readonly>
							</div>
						</div>
						<div class="col-md-4 form-group">
							<div class="input-group">
								<span class="input-group-addon danger"><i class="fa fa-magic"> Client Type</i></span>
								<select class="form-control cltype" name="cltype" id="cltype">
									<option value="1" {{($creditnote->cltype==1?'selected=selected': '')}}>Parent</option>
									<option value="0" {{($creditnote->cltype==0?'selected=selected': '')}} >Child</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 form-group {{ $errors->has('clcode') ? ' has-error' : '' }}" id="clcode-group">
							<div class="input-group">
								<span class="input-group-addon success"><i class="fa fa-user"> Client</i></span>
								<select class="form-control clcode" name="clcode" id="clcode">
									<option value="-1" selected="selected">--Select Client Name--</option>
									@foreach($clients as $client)
									<option value="{{$client->code}}" {{($client->code==$creditnote->clcode?'selected=selected': '')}} >{{$client->name}}</option>
									@endforeach
								</select>
							</div>
						</div>	
						<div class="col-md-4 form-group {{ $errors->has('location') ? ' has-error' : '' }}" id="location-group">
							<div class="input-group">
								<span class="input-group-addon success"><i class="fa fa-user"> Location</i></span>
								<select class="form-control location" name="location" id="location">
									<option value="-1" selected="selected">--Select Location--</option>
									@foreach($locations as $loc)
									<option value="{{$loc->code}}" {{($loc->code==$creditnote->location?'selected=selected': '')}} >{{$loc->description}}</option>
									@endforeach
								</select>
							</div>
						</div>	

					</div>						
					<div class="row">
						<div class="col-md-4 form-group {{ $errors->has('dfrom') ? ' has-error' : '' }}">
							<div class="input-group">
								<span class="input-group-addon warning"><i class="fa fa-calendar"></i> Period From</span>
								<input type="text" name="dfrom" id="dfrom" class="form-control" value="{{Stockspro::getToday()}}" placeholder="" readonly>
							</div>
						</div>
						<div class="col-md-4 form-group {{ $errors->has('dto') ? ' has-error' : '' }}">
							<div class="input-group">
								<span class="input-group-addon warning"><i class="fa fa-calendar"></i> Period To</span>
								<input type="text" name="dto" id="dto" class="form-control" value="{{Stockspro::getToday()}}" placeholder="" readonly>
							</div>
						</div>
						<div class="col-md-4 form-group " >
							<a href="#" class="btn btn-primary" id="btnInvoices"><i class="fa fa-search"></i> Get Invoices</a>
						</div>				   					  	

					</div>

					<div class="row">	
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Remarks</span>
									<textarea type="text" name="remarks"  id="remarks" class="form-control" style="resize: none">{{$creditnote->remarks}}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="ui-inv-details table-reponsive" style="width:100%">
								<thead>
									<tr>
										<th style="width:10%"><input  id="th_invno" value="Invno" class="iu-header form-control" readonly></th>
										<th style="width:10%"><input id="th_invndate" value="Inv Date" class="iu-header form-control" readonly></th>
										<th style="width:40%"><input id="th_remarks" value="Remarks" class="iu-header form-control" readonly></th>
										<th style="width:10%"><input id="th_invamnt" value="InvAmnt" class="iu-header form-control text-right" readonly></th>
										<th style="width:10%"><input id="th_cramnt" value="CrAmnt" class="iu-header form-control text-right" readonly></th>
									</tr>
								</thead>
								<tbody class="inv-details">

									<?php $i=1;?>
									@foreach($invoices as $invoice)
									@if($creditnote->parent)
									<tr id="tr_{{$i}}">
										<td style="width:15%"><input type="text" name="invno[]" class="form-control-grid rct-details"  id="invno_{{$i}}"  value="{{$invoice->invno}}" readonly></td>
										<td style="width:15%"><input  type="text" name="invdate[]" class="form-control-grid rct-details"  id="invtype_{{$i}}"  value="{{$invoice->invdate}}" readonly></td>
										<td style="width:40%"><input  type="text" name="lpo[]" class="form-control rct-details"  id="lpo_{{$i}}"  value="{{$invoice->rmks}}" readonly></td>
										<td style="width:15%"><input type="text" name="amount[]" class="form-control rct-details text-right"  id="amount_{{$i}}"  value="{{$invoice->invamnt}}" readonly></td>
										<td style="width:20%"><input type="text" name="cramt[]" class="form-control rct-details text-right cramt"  id="cramt_{{$i}}"  value="{{$invoice->cramt}}" ></td>
										<td><span class="btn btn-danger btn-xs btnRemove" id="ibtn_{{$i}}" ><i class="fa fa-times"></i></span></td>
									</tr>
									@else
									<tr id="tr_{{$i}}">
										<td style="width:15%"><input type="text" name="invno[]" class="form-control rct-details"  id="invno_{{$i}}"  value="{{$invoice->invno}}" readonly></td>
										<td style="width:15%"><input type="text" name="invdate[]" class="form-control rct-details"  id="invtype_{{$i}}"  value="{{$invoice->invdate}}" readonly></td>
										<td style="width:25%"><input type="text" name="lpo[]" class="form-control rct-details"  id="lpo_{{$i}}"  value="{{$invoice->rmks}}" readonly></td>
										<td style="width:15%"><input type="text" name="amount[]" class="form-control rct-details text-right"  id="amount_{{$i}}"  value="{{$invoice->invamnt}}" readonly></td>
										<td style="width:25%"><input type="text" name="cramt[]" class="form-control rct-details text-right cramt"  id="cramt_{{$i}}"  value="{{$invoice->cramnt}}" ></td>
										<td><span class="btn btn-danger btn-xs btnRemove" id="ibtn_{{$i}}" ><i class="fa fa-times"></i></span></td>
									</tr>
									@endif
									<?php $i+=1; ?>
									@endforeach

								</tbody>				   							
							</table>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-8 form-group">
							<!-- <span class="text-warning" name ="towords" id="towords"></span> -->
							<input type="text" name="towords"  id="towords" class="text-left form-control" placeholder="" readonly>					   					
						</div>
						<div class="col-md-4 pull-right form-group">
							<div class="row">
								<div class="col-md-12">
									<div class="pull-right form-group {{ $errors->has('code') ? ' has-error' : '' }}">
										<div class="input-group">
											<span class="input-group-addon danger">Total Credit</span>
											<input type="text" name="gtotal"  id="gtotal" class="text-right form-control" value="{{$creditnote->amount}}" placeholder="" readonly>
										</div>
									</div>	
								</div>
							</div>					   						
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success col-md-3"><i class="fa fa-check-square"></i> Save/Post</button>
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

		$(document).on("click",'.btnRemove',function(){
			if(confirm('Remove Select Row?')){
				var rid=$(this).attr('id').split('_')[1];
				removeRow(rid);
				getColumnTotal();
			}
		});

		$(document).on("change","#cltype",function(){
			var clients={!!$clients!!};
			var clopts="<option value='-1' selected=selected>--Select Client--</option>"
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

		function removeRow(v_rid){
			$('.inv-details #tr_'+v_rid).remove();
		}

		$(document).on('blur','.cramt',function(){
			
			getColumnTotal();
		})

		function getColumnTotal()
		{
			var colTotal=0,
			colVat=0,
			colQty=0;

			$('.cramt').each(function(){
				var col_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
				colTotal+=parseFloat(col_value);
			});

			console.log(colTotal);
			$('#gtotal').val(colTotal.toFixed(2));

		}


		$(document).on('click','#btnInvoices',function(){
			if($('#clcode').val()==-1){swal("","Select Client","warning");return;}
			var clcode=$('#clcode').val(),
			parent=$('.cltype').val(),
			dfrom=$('#dfrom').val(),
			dto=$('#dto').val(),
			urli="{!!url('get-cl-invoices')!!}";
			var v_data="client="+clcode+'&parent='+parent+'&dfrom='+dfrom+'&dto='+dto;

			$.ajax({
				url:urli,
				type:'GET',
				dataType:'html',
				data:v_data,
				complete:function(res){
					$('.inv-details').html(res.responseText);
					getTotal();
				}
			});
		});
		//initRows();
				var v_NameChanged = false;//variable to check if event triggered by name so as to  load units/meterno belonging to a client
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
						swal('Blank',"Credit Amount Cant Be blank / Zero & Try Again",'error');
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
		    		swal('Select Client Code','Client Code Missing !','error');
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