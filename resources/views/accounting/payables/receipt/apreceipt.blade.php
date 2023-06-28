	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> Payment Vourcher</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				        </div>
				        <div class="box-body">
							<div class="tab-content">
			        			<div class="tab-pane active" id="tab_master">
			        			<br/>
						        	<form class="form-arreceipt" action="{{url('save-payable-receipt')}}" method="POST">
									{{csrf_field()}}
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-4"><!-- first col -->
												<div class="form-group">
													<div class="input-group {{ $errors->has('pdate') ? ' has-error' : '' }}">
														<div class="input-group">
															<span class="input-group-addon reams-input-addon"><i class="fa fa-calendar-o"></i> Date</span>
															<input type="text" name="pdate" class="form-control pdate" id="pdate" value="{{$today}}" placeholder="" readonly>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4"><!-- 2nd COl -->
												<div class="form-group">
													<div class="input-group {{ $errors->has('account') ? ' has-error' : '' }}" id="etype-group">
														<span class="input-group-addon warning">Account</span>
														<select class="form-control account" name="account" id="account">
															<option value="-1" selected="selected">--select Account--</option>
															@foreach($accounts as $account)
															<option value="{{$account->code}}">{{$account->code}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>

					   				<div class = "row">
					   					<div class = "col-md-12">
					   						<div class = "col-md-5"><!-- code -->
							   					<div class="form-group {{ $errors->has('scode') ? ' has-error' : '' }}" id="accountfc-group">
							   						<div class="input-group">
							   						    <span class="input-group-addon info">Supplier</i></span>
							   						    <select class="form-control scode" name ="scode" id ="scode">
							   								<option value="-1" selected="selected">--Select Supplier code--</option>
																@foreach($creditors as $creditor)
																	<option value="{{$creditor->code}}">{{$creditor->code}}</option>
																@endforeach
							   						    </select>
							   						</div>
							   					</div>
					   						</div>
					   						<div class = "col-md-7"><!-- description -->
							   					<div class="form-group {{ $errors->has('sname') ? ' has-error' : '' }}" id="sname-group">
							   						<div class="input-group">
							   						    <span class="input-group-addon info">Name</i></span>
							   						    <select class="form-control" name ="sname" id ="sname">
							   								<option value="-1" selected="selected">--Select Supplier Name--</option>
																@foreach($creditors as $creditor)
																	<option value="{{$creditor->name}}">{{$creditor->name}}</option>
																@endforeach
							   						    </select>
							   						</div>
							   					</div>
					   						</div>
					   					</div>
					   				</div>
					   				<div class ="row">
					   					<div class ="col-md-12">
					   						<div class ="col-md-4">
						   						<div class="input-group">
						   						    <span class="input-group-addon primary"><i class="fa fa-money"></i></span>
						   							<input type="text" name="amount" id="amount" class="form-control" value="" placeholder="KES" >
						   						</div>
					   						</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="input-group {{ $errors->has('chequeno') ? ' has-error' : '' }}">
														<span class="input-group-addon">Cheque No</span>
														<input type="text" id="chequeno" name="chequeno" class="form-control" value="" placeholder="Enter Cheque no">
													</div>
												</div>
											</div>
					   					</div>
					   				</div>
				   					<div class ="row">
				   						<div class ="col-md-12">
				   							<div class="col-md-12">
				   								<textarea type="text" name="remarks" id="remarks" class="form-control remarks" value ="" placeholder="Enter some Remarks"></textarea>
				   							</div>
				   						</div>	
				   					</div>
					   			 	<div class="row"> 
					   			 	   <div class="col-md-12"> 
						   			 	   <div class="col-md-12"> 
						   			 	   <table class="table-arinvoice" id="arinvoice-ui" cellpadding="2">
						   			 	   		<thead>
						   			 	   			<tr>
						   			 	   				<td class="text-center"><span class="text-center">Invno</span></td>
						   			 	   				<td class="text-center"><span class="text-center">Invdate</span></td>
						   			 	   				<td class="text-right"><span class="text-right">Outstanding</span></td>
						   			 	   				<td class="text-right"><span class="text-right">Remarks</span></td>
						   			 	   				<td></td>
						   			 	   			</tr>
						   			 	   		</thead>
						   			 	   		<tbody class="ui-rct-details">
						   			 	   		</tbody>
					   			 	   		</table>
						   			 	   </div>
					   			 	   </div>
					   			 	</div>
									<div class="row"> <!-- remarks row -->
										<div class="col-md-12">
											<div class="col-md-12">
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon">In words</span>
														<input type="text" name="towords"  id="towords" class="text-left form-control" placeholder="" readonly>	
													</div>
												</div>
											</div>
										</div>
									</div> <!-- remarks row -->
						   			 	<div class ="row">
						   			 		<div class ="col-md-12">
						   			 			<div class ="col-md-12">
							   			 			<div class="col-md-4">
							   			 			</div>
							   			 			<div class="col-md-8">
								   						<div class="input-group">
								   						    <span class="input-group-addon primary">Due</span>
								   							<input type="text" name="tdue" id="tdue" class="form-control" value="0.00" placeholder="KES" readonly>
								   						    <span class="input-group-addon primary">Balcf</span>
								   							<input type="text" name="balcf" id="balcf" class="form-control" value="0.00" placeholder="KES" readonly >
								   						</div>
							   			 			</div>
						   			 			</div>
						   			 		</div>
						   			 	</div>
						   			 	<br/>
						   				<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-6">
							   						<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save Receipt</button>
							   					</div>
						   					</div>
						   				</div>
				   					</form>
			        			</div>
			        		</div>
				        </div>
				        <div class="box-footer">
				          @if ($errors->any())
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
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			initRows();
			$(function () {
				$('#pdate').datepicker({format:'yyyy-mm-dd'});
			});
			$(document).on("change","#scode",function(event){
				if ($(event.target).is('#scode')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#sname option:eq('+selIdx+')').prop('selected',true).trigger('change');
					getInvoices();	
				}
			});
			$(document).on("change","#sname",function(event){
				if ($(event.target).is('#sname')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#scode option:eq('+selIdx+')').prop('selected',true).trigger('change');
					getInvoices();	
				}
			});


				$(document).on("input", "#amount", function() {
					this.value = this.value.replace(/[^\d\.\-]/g,'');
				});

				$(document).on("keyup","#amount",function(){
					if(parseFloat($(this).val())<=0){
						swal('Invalid Amount','Enter Amount Greater than Zero & Try Again','error');$(this).val('');$(this).focus();return;
					}
					if(parseFloat($(this).val())>0){
						if($('#scode').val()<0){swal('Invalid Vendor','Select Supplier & Try Again','error');$(this).val('');return;		}
					}

					var x=number2words($(this).val());
					/*$('#towords').html(x);*/
					$('#towords').val(x);
					get_balcf();
				});

				function get_balcf(){
					var v_amt=(isNaN(parseFloat($('#amount').val().replace(/\,/g,'')))) ? 0  : parseFloat($('#amount').val().replace(/\,/g,''));
					var v_tdue=(isNaN(parseFloat($('#tdue').val().replace(/\,/g,'')))) ? 0 : parseFloat($('#tdue').val().replace(/\,/g,''));

					var cf=v_tdue-v_amt;
					$('#tdue').val(v_tdue.toFixed(2));

					$('#balcf').val(cf.toFixed(2));
				}



		    function getInvoices(){
		    	if($('#scode').val()!='-1'){
		    	var urli="{!!url('get_outstanding_apbills')!!}"+"/"+$('#scode').val();
					$.ajax({
						url:urli,
						type:'GET',
						dataType:'html',
						complete:function(xhr){
							var uts=JSON.parse(xhr.responseText);

							if(uts.length>0){
								var str="";
								var y=1;
								for (i in uts){
								str+='<tr>'+
									'<td><input type="text" name="invno_" class="form-control rct-details"  id="invno_"  value="'+uts[i].invno+'" readonly></td>'+
									'<td><input type="text" name="invdate" class="form-control rct-details"  id="invdate_"  value="'+uts[i].invdate+'" readonly></td>'+
									'<td><input type="text" name="due_" class="form-control rct-details text-right due"  id="due_"  value="'+uts[i].due+'" readonly></td>'+
									'<td><input type="text" name="remarks_" class="form-control rct-details text-center"  id="remarks_"  value="'+uts[i].remarks+'" readonly></td>'+
								'</tr>'
								y+=1;
								}
							$('.ui-rct-details').html(str);
							getTotal();
							$('#amount').val('');
							$('#balcf').val('0.00');
							$('#towords').html('');

							}else{
								initRows();
								getTotal();
							}
						}
					});
				}else{
					$('#tdue').val('0.00');
					$('#balcf').val('0.00');
					$('#towords').html('');
					initRows();
					swal('Select Supplier Code','Supplier Code Missing !','error');
				}
		    }
		    function getTotal(){
		    	var r_total=0;
		    	$('input#due_').each(function(){
		    		var col_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
		    		r_total+=parseFloat(col_value);
		    	});

		    	$('#tdue').val(r_total.toLocaleString());
		    }

    function initRows(){
    	var str_='<tr>'+
			'<td><input type="text" name="invno" class="form-control"  id="invno_"  value="" readonly></td>'+
			'<td><input type="text" name="invdate" class="form-control"  id="invdate_"  value="" readonly></td>'+
			'<td><input type="text" name="due" class="form-control due"  id="due_"  value="" readonly></td>'+
			'<td><input type="text" name="remarks" class="form-control"  id="remarks_"  value="" readonly></td>'+
		'</tr>';	
		$('.ui-rct-details').html(str_);
    }


		    function resetModalFormErrors() {

		        $('.form-group').removeClass('has-error');

		        $('.form-group').find('.help-block').remove();

		        $('.ui-alert').html('');

		    }



		    $('form.form-arreceipt').on('submit', function(submission) {
		        submission.preventDefault();
		        var blank_cnts=0;
		        if($("#remarks").val()==""){
					blank_cnts+=1;
					swal('Remarks','Put some Remarks','error');
					return;
		        }

				if($('#amount').val()==0 || $.trim($('#amount').val())==""){
					swal('Invalid Amount',"Enter Valid Amount & Try Again",'error');
					$('#amount').focus();
					return;
				};

				if($('#amount').val() > $('#tdue').val()){
					swal('Invalid Amount',"You cannot Pay more than due",'error');
					$('#amount').focus();
					return;
				}

		        if($("#pdate").val()==""){
					blank_cnts+=1;
					swal('Receipt date','Date is a must','error');
					return;
		        }
				$('.invno').each(function(){
					if(this.value==""){
						$(this).addClass('blank-error');
						var _id=$(this).attr('id').split('_')[1];
						blank_cnts+=1;
					}
				});

				if(blank_cnts>0){
					swal('Blank Entry','Remove blank record and try again','error');
					return;
				}
				var v_tamount=(isNaN(parseFloat($('#amount').val().replace(/\,/g,'')))) ? 0  : parseFloat($('#amount').val().replace(/\,/g,''));
				if(v_tamount==0){
					$('.ui-alert').html('Enter some amount'); 
					swal('No Amount','Enter some amount to continue','error');
					$('.amount-group').addClass('has-error');
					return;
				}
				if(blank_cnts>0){$('.ui-alert').html(blank_str+"You have some blank record.\r\ncheck both account code,amount and comments").show();return;}
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
		                // Iterate through errors object.
		                $.each(errors, function(field, message) {
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
		                    var formGroup = $('[name='+field+']', form).closest('.form-group');
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
		               $('.ui-alert').html(response.responseText);
		                    //$('.ui-alert').html("<span class='text-warning'><i class='fa fa-frown fa-fw'></i> Something went Wrong</span>");                   
		              }else{  
		                $('form.form-arreceipt')[0].reset();
		                $(".ui-alert").html("<p class='text-success col-md-12'><i class='fa fa-frown fa-fw'></i>  "+response.responseText+"</p>").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
		            	// Reset submit.
		                if (submit.is('button')) {
		                    submit.html(submitOriginal);
		                } else if (submit.is('input')) {
		                    submit.val(submitOriginal);
		                }
		            }
		                location.reload();
		            }
		        });
		    });
		    // Reset errors when opening modal.
		    $('.form-arreceipt').click(function() {
		        resetModalFormErrors();
		    });
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
