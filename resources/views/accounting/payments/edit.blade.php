<section class="section">
	<div class="row">
		<div class="col-md-12 ">
			<h3 class="text-default alert alert-info"><span class="fa fa-gift"> </span><strong> Edit Voucher ({{$payment->refno}})</strong></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<span class="ui-alert col-md-12">  </span>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<form class="form-payments" action="{{route('payments.update',$payment->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="ui-client-details">
					<fieldset>
						<div class="row">
							<div class="col-md-4"><!-- first col -->
								<div class="form-group">
									<div class="input-group {{ $errors->has('entrydate') ? ' has-error' : '' }}">
										<div class="input-group">
											<span class="input-group-addon reams-input-addon primary"><i class="fa fa-calendar-o"></i> Entry Date</span>
											<input type="text" name="entrydate" class="form-control entrydate" id="entrydate" value="{{$today}}" placeholder="" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4"><!-- 2nd COl -->
								<div class="form-group">
									<div class="input-group {{ $errors->has('etype') ? ' has-error' : '' }}" id="etype-group">
										<span class="input-group-addon warning">Payment Type</span>
										<select class="form-control etype" name="etype" id="etype">
											<option value="0" selected="selected">Office</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="input-group {{ $errors->has('location') ? ' has-error' : '' }}" id="etype-group">
										<span class="input-group-addon primary">Location</span>
										<select class="form-control location" name="location" id="location">
											<option value="-1" selected="selected">--Select Location--</option>
											@foreach($locations as $loc)
											<option value="{{$loc->code}}">{{$loc->description}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>


						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group {{ $errors->has('payee') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon info"> Payee</span>
										<input type="text" name="payee"  id="payee" class="col-md-6 form-control payee" value="{{$payment->payee}}" placeholder="Enter payee name" >
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="input-group account-group {{ $errors->has('account') ? ' has-error' : '' }}">
										<span class="input-group-addon warning">Account</span>
										<select class="form-control account" name="account" id="account">
											@foreach ($accounts as $act)
											<option value="{{$act->code}}" {{($payment->account==$act->code)?'selected':''}}>{{$act->code}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="input-group {{ $errors->has('pinno') ? ' has-error' : '' }}">
										<span class="input-group-addon primary">Pin No</span>
										<input type="text" id="pinno" name="pinno" class="form-control" value="{{$payment->pinno}}" placeholder="Enter Pinno">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="input-group {{ $errors->has('docno') ? ' has-error' : '' }}">
										<span class="input-group-addon primary">Doc No</span>
										<input type="text" id="docno" name="docno" class="form-control" value="{{$payment->docno}}" placeholder="Enter Document No">
									</div>
								</div>
							</div>

						
							<div class="col-md-4"><!-- first col -->
								<div class="form-group">
									<div class="input-group {{ $errors->has('pdate') ? ' has-error' : '' }}">
										<div class="input-group">
											<span class="input-group-addon reams-input-addon success"><i class="fa fa-calendar-o"></i>Payment Date</span>
											<input type="text" name="pdate" class="form-control pdate" id="pdate" value="{{$today}}" placeholder="" readonly>
										</div>
									</div>
								</div>
							</div>

						</div>	
						<div class="row"> 
							<div class="col-md-8">
								<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon info"> Remarks</span>
										<input type="text" name="remarks"  id="remarks" class="col-md-6 form-control remarks" value="{{$payment->remarks}}" placeholder="Enter Some remarks" >
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="input-group {{ $errors->has('chequeno') ? ' has-error' : '' }}">
										<span class="input-group-addon primary">Cheque No</span>
										<input type="text" id="chequeno" name="chequeno" class="form-control" value="{{$payment->cheque}}" placeholder="Enter Cheque no">
									</div>
								</div>
							</div>
							
						</div> <!-- remarks row -->
						<div class="row">
							<div class="col-md-12">
								<table style="width: 100%; border-collapse:collapse" class="ui-inv-details table-fit">
									<thead>
										<tr>
											<th style="width: 100px;"><input id="th_id" value="#" class="iu-header " readonly></th>
											<th style="width: 300px;"><input id="th_ecode" value="Expense" class="iu-header " readonly></th>
											<th style="width: 400px;"><input id="th_remarks" value="Remarks" class="iu-header " readonly></th>
											<th style="width: 200px;"><input id="th_amount" value="Gross Amount" class="iu-header  text-right" readonly></th>
											<th style="width: 100px;"><input id="th_vat" value="Vatable" class="iu-header  text-right" readonly></th>
										</tr>
									</thead>
									<tbody class="ui-pvc-details">
										<?php $i=1;?>
										@foreach($payments_d as $payt)
										<tr id="tr_{{$i}}">
											<td>
												<input type="text" name="id[]" class="rct-details form-control-grid"  id="id_{{$i}}" value ="{{$i}}" readonly>
											</td>
											<td>
												<select class="form-control-grid rct-details ecode" name="ecode[]" id="ecode_{{$i}}">
													@foreach($expcategs as $expcateg)
													<option value="{{$expcateg->code}}" {{($expcateg->code==$payt->code?'selected':'')}}>{{$expcateg->code}}</option>
													@endforeach
												</select>
											</td>
											<td>
												<input type="text" name="description[]" class="rct-description form-control-grid"  id="description_{{$i}}"  value="{{$payt->description}}">
											</td>
											<td>
												<input type="text" name="amount[]" class="rct-details form-control text-right amount"  id="amount_{{$i}}"  value="{{$payt->total}}">
											</td>
											<td>
												<select class="form-control-grid rct-details" name="vatable[]" id="vatable_{{$i}}">
													<option value="0" {{$payt->vat==0?'selected':''}}>No</option>
													<option value="1" {{$payt->vat>0?'selected':''}}>Yes</option>
												</select>
											</td>
											<td style="padding:0px 4px;">
												<span class="form-group btn btn-xs btn-danger close_tr" id="close_{{$i}}"><i class="fa fa-times fa-2x"></i></span>
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
								<button class="btn btn-success ui-add-row" type="button" id="ui-add-row"><span class="fa fa-plus"></span> Add Row</button> 
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<textarea name="towords"  id="towords" class="text-left form-control" placeholder="" readonly  style="resize:none">{{$payment->towords}}</textarea> 

								</div>
							</div>

							<div class="col-md-4">
								<div class="pull-right form-group {{ $errors->has('total') ? ' has-error' : ''}}">
									<div class="input-group">
										<span class="input-group-addon danger">Total</span>
										<b><input type="text" name="total"  id="total" class="text-right form-control" value="{{$payment->amount}}" placeholder="" readonly></b>
									</div>
								</div>  
							</div>
						</div> 
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary col-md-3"><i class="fa fa-check-square"></i>  Update</button>
							</div>
						</div>
					</fieldset>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" 
		@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
</section>
<style type="text/css">
.bigdrop{
	width: 100% !important;
}    
table.ui-inv-details{
	border-collapse: collapse;
}
#th_id,#th_ecode{
	width: 100%;
}
#th_remarks{
	width: 150%;
}
#th_amount{
	width: 100%;
	text-align: right;
}

input.iu-header{
	background: #5bc0de !important;
	color:#fff;
	border: none;
}

input#th_amount,#amount_{
	background: #d9534f !important;
}
tbody.ui-pvc-details input.rct-details {
	width: 100% !important;
}
tbody.ui-pvc-details input.rct-remarks{
	width: 150% !important;
}
</style>
<script type="text/javascript">
	$(function(){
		$('.account,.etype').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});
		var v_cnt=0;
		$('#pdate').datepicker({format:'yyyy-mm-dd'});

		$(document).on("input", ".amount", function() {
			this.value = this.value.replace(/[^\d\.\-]/g,'');
		});

		$(document).on("blur",".amount",function(){
			if(parseFloat($(this).val())<=0){
				swal('Invalid Amount','Enter Amount Greater than Zero & Try Again','error');$(this).val('');$(this).focus();return;
			}
			get_balcf();
		});


		function get_balcf(){
			var r_total=0;
			$('input.amount').each(function(){
				var col_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
				r_total+=parseFloat(col_value);
			});

			$('#total').val(r_total.toFixed(2));
			var x=number2words($('#total').val());
			/*$('#towords').html(x);*/
			$('#towords').val(x);
		}

		$(document).on('click','.ui-add-row',function(){
			var _id=$('.ecode').length +1;
			addRow(_id);
			_id+1;
		});


		function resetFields(){
			$('.ui-pvc-details').html('');
			$('#total').val('0.00');
			$('#account').val('');
			$('#payee').val('');
			$('#building').val('');
			$('#chequeno').val('');
		}

		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}
		$(document).on("change","#etype",function(){
			if($(this).val()=="0"){
				$("#building-expense").hide();
			}else{
				$("#building-expense").show();
			}
		});

		$(document).on('click','.close_tr',function(){
			var rid=$(this).attr('id').split('_')[1];
			removeRow(rid);
		})

		function removeRow(v_rid,a){
			if(confirm('Remove Select Expense record?')){
				$('.ui-pvc-details #tr_'+v_rid).remove();
			}
		}

		function addRow(vid){
			var tblstr=
			'<tr id="tr_'+vid+'">'+
			'<td><input type="text" name="id[]" class="rct-details form-control-grid"  id="id_'+vid+'" value ="'+vid+'" readonly></td>'+
			'<td><select class="form-control-grid rct-details ecode" name="ecode[]" id="ecode_'+vid+'">'+
			'<option value="" selected="selected">--Select Category--</option>'+
			'@foreach($expcategs as $expcateg)'+
			'<option value="{{$expcateg->code}}">{{$expcateg->code}}</option>'+
			'@endforeach'+
			'</select>'+
			'</td>'+
			'<td><input type="text" name="description[]" class="rct-description form-control-grid"  id="description_'+vid+'"  value=""></td>'+
			'<td><input type="text" name="amount[]" class="rct-details form-control text-right amount"  id="amount_'+vid+'"  value="0"></td>'+
			'<td><select class="form-control-grid rct-details" name="vatable[]" id="vatable_'+vid+'">'+
			'<option value="0" selected="selected">No</option>'+
			'<option value="1">Yes</option>'+
			'</select>'+
			'</td>'+
			'<td style="padding:0px 4px;">'+
			'<span class="form-group btn btn-xs btn-danger close_tr" id="close_'+vid+'"><i class="fa fa-times fa-2x"></i></span>'+
			'</td>'+
			'</tr>';
			$('.ui-pvc-details').append(tblstr);
			$('.ecode').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});
		}

		$('form.form-payments').on('submit', function(submission) {

			submission.preventDefault();

	        // Set vars.  1
	        var form   = $(this),
	        url    = form.attr('action'),
	        submit = form.find('[type=submit]');


	        var data        = form.serialize(),
	        contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';

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
	             	//console.log(errors.errors);
	                // Iterate through errors object.
	                $.each(errors.errors, function(field, message) {
	                	//console.error(field+': '+message);
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
	             $('.ui-alert').html(response.responseText);//.fadeIn( 300 ).delay( 30000 ).fadeOut( 400 );

	         }else{  
	            	//$('.ui-alert').html(response.responseText);
	            	swal("",response.responseText,"success");
	              	//return;
	              	//alert(response.responseText);
	              	$('form.form-payments')[0].reset();

	              	$(".ui-alert").html("<p class='text-default col-md-12'><i class='fa fa-frown fa-fw'></i>  "+response.responseText+"</p>");//.addClass('alert alert-success').fadeIn( 300 ).delay( 30000 ).fadeOut( 400 );
	            	// Reset submit.

	            	if (submit.is('button')) {
	            		submit.html(submitOriginal);
	            	} else if (submit.is('input')) {
	            		submit.val(submitOriginal);
	            	}
	            	/*Reset fields*/
	            	resetFields();
	            }
	            location.reload();

	        }
	    });
	});

	    // Reset errors when opening modal.
	    $('.form-payments').click(function() {
	    	resetModalFormErrors();
	    });

	    function getTotal(){
	    	var r_total=0;
	    	$('input#due_').each(function(){
	    		var col_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
	    		r_total+=parseFloat(col_value);
	    	});

	    	$('#gtotal').val(r_total.toLocaleString());
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
