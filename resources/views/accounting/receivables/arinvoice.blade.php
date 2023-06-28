@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-9">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> New Debtor Invoice</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				        </div>
				        <div class="box-body">
							<div class="tab-content">
			        			<div class="tab-pane active" id="tab_master">
			        			<br/>
						        	<form class="form-arinvoice" action="{{route('debtor.store')}}" method="POST">
									{{csrf_field()}}
					   					<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-3">
								   					<div class="form-group {{ $errors->has('ref') ? ' has-error' : '' }}">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Invno</span>
								   							<input type="text" name="invno" class="form-control" placeholder="Auto" readonly/>
								   						</div>
								   					</div>
							   					</div>
						   					</div>
						   				</div>
						   				<div class = "row">
							   				<div class = "col-md-12">	
							   					<div class="col-md-4">
								   					<div class="form-group {{ $errors->has('invdate') ? ' has-error' : '' }}">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Date</span>
								   							<input type="text" name="invdate" id="invdate" class="form-control" value ="" placeholder="Select Date by clicking here" />
								   						</div>
								   					</div>	
							   					</div>
							   					<div class="col-md-4">
								   					<div class="form-group {{ $errors->has('duedate') ? ' has-error' : '' }}">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Date</span>
								   							<input type="text" name="duedate" id="duedate" class="form-control" value ="" placeholder="Select Due Date by clicking here" />
								   						</div>
								   					</div>	
							   					</div>
						   					</div>
						   				</div>
						   				<div class = "row">
						   					<div class = "col-md-12">
						   						<div class = "col-md-5"><!-- code -->
								   					<div class="form-group {{ $errors->has('clientcode') ? ' has-error' : '' }}" id="accountfc-group">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Client</i></span>
								   						    <select class="form-control" name ="clientcode" id ="clientcode">
								   								<option value="-1" selected="selected">--Select client code--</option>
																	@foreach($debtors as $debtor)
																		<option value="{{$debtor->code}}">{{$debtor->code}}</option>
																	@endforeach
								   						    </select>
								   						</div>
								   					</div>
						   						</div>
						   						<div class = "col-md-7"><!-- description -->
								   					<div class="form-group {{ $errors->has('clientname') ? ' has-error' : '' }}" id="clientname-group">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Name</i></span>
								   						    <select class="form-control" name ="clientname" id ="clientname">
								   								<option value="-1" selected="selected">--Select client Name--</option>
																	@foreach($debtors as $debtor)
																		<option value="{{$debtor->name}}">{{$debtor->name}}</option>
																	@endforeach
								   						    </select>
								   						</div>
								   					</div>
						   						</div>
						   					</div>
						   				</div>
					   					<div class ="row">
					   						<div class ="col-md-12">
					   							<div class="col-md-12">
					   								<textarea type="text" name="remarks" id="remarks" class="form-control" value ="" placeholder="Enter some Remarks"></textarea>
					   							</div>
					   						</div>	
					   					</div>
					   					<div class = "col-md-12">
            								<legend class="text-primary">Select Revenue Centres</legend>
            							</div>
						   			 	<div class="row"> 
						   			 	   <div class="col-md-12"> 
							   			 	   <div class="col-md-12"> 
							   			 	   <table class="table-arinvoice" id="arinvoice-ui" cellpadding="2">
							   			 	   		<thead>
							   			 	   			<tr>
							   			 	   				
							   			 	   				<td class="text-center"><span class="text-center">Code</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Description</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Amount</span></td>
							   			 	   				<td class="text-right"><span class="text-center">Vatable?</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Vat</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Total</span></td>
							   			 	   				<td></td>
							   			 	   			</tr>
							   			 	   		</thead>
							   			 	   		<tbody id="tbl-ui">
							   			 	   			<tr id="tr_1">
							   			 	   				<td>
											   					<div class="form-group {{ $errors->has('code.*') ? ' has-error' : '' }}" id="code-group">
											   						<div class="input-group">
											   						    <span class="input-group-addon">1</span>
											   							<select class="form-control code" name="code[]" id="code_1">
											   								<option value="" selected="selected">--Select Account Code--</option>
											   								@foreach($glaccounts as $account)
											   									<option value="{{$account->code}}">{{$account->code}}</option>
											   								@endforeach
											   							</select>
											   						</div>
											   					</div>						   			 	   					
							   			 	   				</td>
							   			 	   				<td>
											   					<div class="form-group {{ $errors->has('description.*') ? ' has-error' : '' }}" id="description-group">
											   						<div class="input-group">
											   							<select class="form-control description" name="description[]" id="description_1">
											   								<option value="" selected="selected">--Select Account Description--</option>
											   								@foreach($glaccounts as $account)
											   									<option value="{{$account->description}}">{{$account->description}}</option>
											   								@endforeach
											   							</select>
											   						</div>
											   					</div>
											   				</td>
											   				<td>
											   					<div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}" id="amount-group">
											   						<div class="input-group">
											   							<input type="text" name="amount[]" class="form-control amount text-right" value ="0" id="amount_1">
											   						</div>
											   					</div>
											   				</td>
											   				<td>
											   					<div class="form-group {{ $errors->has('vatable') ? ' has-error' : '' }}" id="vatable-group">
											   						<div class="input-group">
											   							<select name="vatable[]" class="form-control vatable text-center" id="vatable_1" value ="0" selected="selected">
											   								<option value="0">No</option>
											   								<option value="1">Yes</option>
											   							</select>
											   						</div>
											   					</div>
											   				</td>
											   				<td>
											   					<div class="form-group {{ $errors->has('vat') ? ' has-error' : '' }}" id="vat-group">
											   						<div class="input-group">
											   							<input type="text" name="vat[]" class="form-control vat text-right" value ="0" id="vat_1" readonly>
											   						</div>
											   					</div>
											   				</td>
											   				<td>
											   					<div class="form-group {{ $errors->has('total') ? ' has-error' : '' }}" id="total-group">
											   						<div class="input-group">
											   							<input type="text" name="total[]" class="form-control total text-right" value ="0" id="total_1" readonly>
											   						</div>
											   					</div>
											   				</td>
											   				<td style="padding:0px 4px;">
											   				  <div class="form-group">
																<span class="btn btn-xs btn-danger close_tr" id="close_1"><i class="fa fa-close"></i></span>
															   </div>
											   				</td>
							   			 	   			</tr>
							   			 	   		</tbody>
							   			 	     </table>
							   			 	   </div>
						   			 	   </div>
						   			 	</div>
						   			 	<div class ="row">
						   					<div class="col-md-12">
							   			 		<div class="col-md-6">
							   			 			<button class="btn btn-success ui-add-row" type="button"><span class="fa fa-plus"></span> Add new Row</button> 
							   			 		</div>
							   					<div class="col-md-6">
									   				<div class="col-md-6">				   			
									   					<div class="pull-right form-group {{ $errors->has('tvat') ? ' has-error' : '' }}">
									   						<div class="input-group">
									   						    <span class="input-group-addon warning">VAT</span>
									   							<input type="text" name="tvat"  id="tvat" class="text-right text-danger form-control" value="0.00" placeholder="" readonly>
									   						</div>
									   					</div>					   						
								   					</div>	
							   					   <div class="col-md-6">
									   					<div class="pull-right form-group {{ $errors->has('tamount') ? ' has-error' : '' }}">
									   						<div class="input-group">
									   						    <span class="input-group-addon danger">Total</span>
									   							<input type="text" name="tamount"  id="tamount" class="text-right form-control" value="0.00" placeholder="" readonly>
									   						</div>
									   					</div>	
								   					</div>
								   				</div>
							   			 	</div>
						   			 	</div>
						   			 	<br/>
						   				<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-6">
							   						<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save Debtor Invoice</button>
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
@stop
@section('page-script')
	<script type="text/javascript">
		$(function(){
			
			function setDate(){
				var now = new Date();
				var day = ("0" + now.getDate()).slice(-2);
				var month = ("0" + (now.getMonth() + 1)).slice(-2);
				var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
				$('#jdate').val(today);
			}
			setDate();

			$(function () {
				$('#invdate').datepicker({format:'yyyy-mm-dd'});
			});

			$(function () {
				$('#duedate').datepicker({format:'yyyy-mm-dd'});
			});
			
			$(document).on("change","#clientcode",function(event){
				if ($(event.target).is('#clientcode')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#clientname option:eq('+selIdx+')').prop('selected',true).trigger('change');
				}
			});

			$(document).on("change","#clientname",function(event){
				if ($(event.target).is('#clientname')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#clientcode option:eq('+selIdx+')').prop('selected',true).trigger('change');
				}
			});

			$(document).on("change",".code",function(event){
				if ($(event.target).is('.code')) {
				 	var i=$(this).attr('id').split('_')[1];
					var selIdx=$(this).prop('selectedIndex');
					$('#description_'+i+' option:eq('+selIdx+')').prop('selected',true).trigger('change');
				}
			});

			$(document).on("change",".description",function(event){
				 if ($(event.target).is('.description')) {
				 	var i=$(this).attr('id').split('_')[1];
					var selIdx=$(this).prop('selectedIndex');
					$('#code_'+i+' option:eq('+selIdx+')').prop('selected',true).change();
				}
			});


			$('.ui-add-row').click(function(){
				var _id=$('.code').length +1;
				addRow(_id);
				_id+1;
			});

		    $(document).on('click','.close_tr',function(){
				var rid=$(this).attr('id').split('_')[1];
	    		removeRow(rid);
		    })

		    function removeRow(v_rid){
		    	if(v_rid>2){
		    		if(confirm('Remove Select record?')){
			    		$('#arinvoice-ui #tr_'+v_rid).remove();
			    	}	
			    }
		    }

			$(document).on("blur",".amount",function(){
				var rid=$(this).attr('id').split('_')[1];
				var t_amount=parseInt($('#amount_'+rid).val());
				$("#total_"+rid).val(t_amount);
				getamount();
				getvat();
			});

			$(document).on("change",".vatable",function(event){
				var vatAmt=0;
				var TotalAmt =parseInt($('#amount_'+i).val());
				 if ($(event.target).is('.vatable')) {
				 	var i=$(this).attr('id').split('_')[1];
				 	if(parseInt($('#amount_'+i).val())>0){
				 		if($('#vatable_'+i).val()==1){
				 			var totalAmt=parseInt($('#amount_'+i).val());
				 			vatAmt=parseInt(totalAmt*16/100);
				 			TotalAmt=totalAmt+vatAmt;
				 		}
				 	}
		 			$('#vat_'+i).val(vatAmt);
		 			$('#total_'+i).val(TotalAmt);
				getamount();
				getvat();
				}
			});
			
			$(document).on("blur",".total",function(){
				var rid=$(this).attr('id').split('_')[1];
				var t_amount=parseInt($('#total_'+rid).val());
				getamount();
				getvat();
			});

			function getamount(v_id){
				//var t_debit=parseInt($('#debit_'+v_id).val());
					var r_total=0;
					$('input.total').each(function(){
						var col_value=(isNaN($(this).val())) ? 0 : $(this).val();
						r_total+=parseInt(col_value);
					});
					var gamount=(isNaN(r_total)) ? '0.00' : r_total;
					$('#tamount').val(gamount);
			}

			function getvat(v_id){
					var r_total=0;
					$('input.vat').each(function(){
						var col_value=(isNaN($(this).val())) ? 0 : $(this).val();
						r_total+=parseInt(col_value);
					});
					var gvat=(isNaN(r_total)) ? '0.00' : r_total;
					$('#tvat').val(gvat);
			}

		    function resetModalFormErrors() {
		        $('.form-group').removeClass('has-error');
		        $('.form-group').find('.help-block').remove();
		        $('.ui-alert').html('');
		    }

		    $('form.form-arinvoice').on('submit', function(submission) {
		        
		        submission.preventDefault();
		        	
		        var blank_cnts=0;

		        if($("#remarks").val()==""){
					blank_cnts+=1;
					swal('Remarks','Put some Remarks','error');
					return;
		        }
		        if($("#duedate").val()==""){
					blank_cnts+=1;
					swal('Duedate','Due Date is a must','error');
					return;
		        }

		        if($("#invdate").val()==""){
					blank_cnts+=1;
					swal('Invoice date','Date is a must','error');
					return;
		        }

				$('.code').each(function(){
					
					if(this.value==""){
						$(this).addClass('blank-error');
						var _id=$(this).attr('id').split('_')[1];
						blank_cnts+=1;
					}
					
				});

				$('.amount').each(function(){
					
					if(this.value==""){
						$(this).addClass('blank-error');
						var _id=$(this).attr('id').split('_')[1];
						blank_cnts+=1;
					}
					
				});

				$('.vat').each(function(){
					
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

				var v_tamount=(isNaN(parseFloat($('#tamount').val().replace(/\,/g,'')))) ? 0  : parseFloat($('#tamount').val().replace(/\,/g,''));
				var v_tvat=(isNaN(parseFloat($('#tvat').val().replace(/\,/g,'')))) ? 0 : parseFloat($('#tvat').val().replace(/\,/g,''));

				if(v_tamount==0){
					$('.ui-alert').html('Enter some amount'); 
					swal('No Amount','Enter some amount to continue','error');
					$('.tamount-group').addClass('has-error');
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
		                $('form.form-arinvoice')[0].reset();
		                $(".ui-alert").html("<p class='text-success col-md-12'><i class='fa fa-frown fa-fw'></i>  "+response.responseText+"</p>").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
		            	// Reset submit.
		                if (submit.is('button')) {
		                    submit.html(submitOriginal);
		                } else if (submit.is('input')) {
		                    submit.val(submitOriginal);
		                }
		            }
		                //location.reload();
		                
		            }
		        });
		    });

		    // Reset errors when opening modal.
		    $('.form-arinvoice').click(function() {
		        resetModalFormErrors();
		    });
		    function addRow(vid){
				var tblstr=
						'<tr id="tr_'+vid+'">'+
		 	   				'<td>'+
		   					'<div class="form-group {{ $errors->has("code.*") ? " has-error" : "" }}" id="code-group">'+
		   						'<div class="input-group">'+
		   						    '<span class="input-group-addon">'+vid+'</span>'+
		   							'<select class="form-control code" name="code[]" id="code_'+vid+'">'+
		   								'<option value="" selected="selected">--Select Account Code--</option>'+
		   								'@foreach($glaccounts as $account)'+
		   									'<option value="{{$account->code}}">{{$account->code}}</option>'+
		   								'@endforeach'+
		   							'</select>'+
		   						'</div>'+
		   					'</div>'+				   			 	   					
		 	   				'</td>'+
		 	   				'<td>'+
		   					'<div class="form-group {{ $errors->has("description.*") ? " has-error" : "" }}" id="description-group">'+
		   						'<div class="input-group">'+
		   							'<select class="form-control description" name="description[]" id="description_'+vid+'">'+
		   								'<option value="" selected="selected">--Select Account Description--</option>'+
		   								'@foreach($glaccounts as $account)'+
		   									'<option value="{{$account->description}}">{{$account->description}}</option>'+
		   								'@endforeach'+
		   							'</select>'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td>'+
		   					'<div class="form-group {{ $errors->has("amount") ? " has-error" : "" }}" id="amount-group">'+
		   						'<div class="input-group">'+
		   							'<input type="text" name="amount[]" class="form-control amount  text-right" value ="0" id="amount_'+vid+'">'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td>'+
		   					'<div class="form-group {{ $errors->has("vatable") ? " has-error" : "" }}" id="vatable-group">'+
		   						'<div class="input-group">'+
		   							'<select name="vatable[]" class="form-control vatable text-center" id="vatable_'+vid+'" value="0" selected="selected">'+
		   								'<option value="0">No</option>'+
		   								'<option value="1">Yes</option>'+
		   								'</select>'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td>'+
		   					'<div class="form-group {{ $errors->has("vat") ? " has-error" : "" }}" id="vat-group">'+
		   						'<div class="input-group">'+
		   							'<input type="text" name="vat[]" class="form-control vat  text-right" value ="0" id="vat_'+vid+'" readonly>'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td>'+
		   					'<div class="form-group {{ $errors->has("total") ? " has-error" : "" }}" id="total-group">'+
		   						'<div class="input-group">'+
		   							'<input type="text" name="total[]" class="form-control total  text-right" value ="0" id="total_'+vid+'" readonly>'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td style="padding:0px 4px;">'+
		   				  '<div class="form-group">'+
							'<span class="btn btn-xs btn-danger close_tr" id="close_'+vid+'"><i class="fa fa-close"></i></span>'+
						   '</div>'+
		   				'</td>'+
				'</tr>';
					
				$('#tbl-ui').append(tblstr);

				var v_accounts={!!$glaccounts!!};
				var v_opts_code="<option value='' selected='selected'>--Select Code--</option>";
				var v_opts_descr="<option value='' selected='selected'>--Select Description--</option>";
				for(i in v_accounts){
					v_opts_code+="<option value='"+v_accounts[i].code+"'>"+v_accounts[i].code+"</option>";
					v_opts_descr+="<option value='"+v_accounts[i].description+"'>"+v_accounts[i].description+"</option>";
				}
				$('#code'+vid).html(v_opts_code);
				$('#description'+vid).html(v_opts_descr);
				$('.code,.description').select2();
				
			}
		});
	</script>
@stop