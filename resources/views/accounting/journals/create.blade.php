@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-10">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> New Journal</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				        </div>
				        <div class="box-body">
							<div class="tab-content">
			        			<div class="tab-pane active" id="tab_master">
			        			<br/>
						        	<form class="form-journal" action="{{url('addjournal')}}" method="GET">
									{{csrf_field()}}
					   					<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-3">
								   					<div class="form-group {{ $errors->has('ref') ? ' has-error' : '' }}">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Ref</span>
								   							<input type="text" name="ref" class="form-control" placeholder="Auto" readonly/>
								   						</div>
								   					</div>
							   					</div>
							   					<div class="col-md-4">
								   					<div class="form-group {{ $errors->has('jdate') ? ' has-error' : '' }}">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Date</span>
								   							<input type="text" name="jdate" id="jdate" class="form-control" placeholder="Select Date by clicking here" />
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
					   					<hr/>
					   					<div class = "col-md-12">
            							<legend class="text-primary">Select Account to Pass Journal</legend>
            							</div>
						   			 	<div class="row"> 
						   			 	   <div class="col-md-12"> 
							   			 	   <div class="col-md-12"> 
							   			 	   <table class="table-journals" id="journal-ui" cellpadding="2">
							   			 	   		<thead>
							   			 	   			<tr>
							   			 	   				
							   			 	   				<td class="text-center"><span class="text-center">Code</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Description</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Debit</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Credit</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Comments</span></td>
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
											   								@foreach($accounts as $account)
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
											   								@foreach($accounts as $account)
											   									<option value="{{$account->description}}">{{$account->description}}</option>
											   								@endforeach
											   							</select>
											   						</div>
											   					</div>
											   				</td>
											   				<td>
											   					<div class="form-group {{ $errors->has('debit') ? ' has-error' : '' }}" id="debit-group">
											   						<div class="input-group">
											   							<input type="text" name="debit[]" class="form-control debit text-right" value ="0" id="debit_1">
											   						</div>
											   					</div>
											   				</td>
											   				<td>
											   					<div class="form-group {{ $errors->has('credit') ? ' has-error' : '' }}" id="credit-group">
											   						<div class="input-group">
											   							<input type="text" name="credit[]" class="form-control credit text-right" value ="0" id="credit_1">
											   						</div>
											   					</div>
											   				</td>
											   				<td>
											   					<div class="form-group {{ $errors->has('comments') ? ' has-error' : '' }}" id="comments-group">
											   						<div class="input-group">
											   							<input type="text" name="comments[]" class="form-control" value ="" id="comments_1">
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
						   						<div class = "col-md-4">
						   						</div>
							   					<div class="col-md-6">
							   					   <div class="col-md-6">
									   					<div class="pull-right form-group {{ $errors->has('tdebit') ? ' has-error' : '' }}">
									   						<div class="input-group">
									   						    <span class="input-group-addon danger">Debits</span>
									   							<input type="text" name="tdebit"  id="tdebit" class="text-right form-control" value="0.00" placeholder="" readonly>
									   						</div>
									   					</div>	
								   					</div>
									   				<div class="col-md-6">				   			
									   					<div class="pull-right form-group {{ $errors->has('tcredit') ? ' has-error' : '' }}">
									   						<div class="input-group">
									   						    <span class="input-group-addon warning">Credits</span>
									   							<input type="text" name="tcredit"  id="tcredit" class="text-right text-danger form-control" value="0.00" placeholder="" readonly>
									   						</div>
									   					</div>					   						
								   					</div>					   						
							   					</div>
							   					<div class = "col-md-2">
							   					</div>	
							   			 	</div>
						   			 	</div>
						   			 	<br/>
						   			 	<div class="row">
						   			 		<div class="col-md-12">
							   			 		<div class="col-md-6">
							   			 			<button class="btn btn-success ui-add-row" type="button"><span class="fa fa-plus"></span> Add new Row</button> 
							   			 		</div>
						   			 		</div>
						   			 	</div>
						   			 	<br/>
						   				<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-6">
							   						<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save Journal Entry</button>
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
				$('#jdate').datepicker({format:'yyyy-mm-dd'});
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
		    		if(confirm('Remove Select Journal?')){
			    		$('#journal-ui #tr_'+v_rid).remove();
			    	}	
			    }
		    }
			$(document).on("blur",".debit",function(){
				var rid=$(this).attr('id').split('_')[1];
				var t_debit=parseInt($('#debit_'+rid).val());
				if(t_debit>0){
					$('#credit_'+rid).val(0);
				}
				getdebit();
				getcredit();
			});

			$(document).on("blur",".credit",function(){
				var rid=$(this).attr('id').split('_')[1];
				var t_credit=parseInt($('#credit_'+rid).val());
				if(t_credit>0){
					$('#debit_'+rid).val('0');
				}
				getcredit();
				getdebit();
			});


			function getdebit(v_id){
				//var t_debit=parseInt($('#debit_'+v_id).val());
					var r_total=0;
					$('input.debit').each(function(){
						var col_value=(isNaN($(this).val())) ? 0 : $(this).val();
						r_total+=parseInt(col_value);
					});
					var gdebit=(isNaN(r_total)) ? '0.00' : r_total;
					$('#tdebit').val(gdebit);
			}

			function getcredit(v_id){
					var r_total=0;
					$('input.credit').each(function(){
						var col_value=(isNaN($(this).val())) ? 0 : $(this).val();
						r_total+=parseInt(col_value);
					});
					var gcredit=(isNaN(r_total)) ? '0.00' : r_total;
					$('#tcredit').val(gcredit);
			}

		    function resetModalFormErrors() {
		        $('.form-group').removeClass('has-error');
		        $('.form-group').find('.help-block').remove();
		        $('.ui-alert').html('');
		    }

		    $('form.form-journal').on('submit', function(submission) {
		        
		        submission.preventDefault();
		        	
		        var blank_cnts=0;

		        if($("#remarks").val()==""){
					blank_cnts+=1;
					swal('Remarks','Put some Journal Remarks','error');
					return;
		        }

				$('.code').each(function(){
					
					if(this.value==""){
						$(this).addClass('blank-error');
						var _id=$(this).attr('id').split('_')[1];
						blank_cnts+=1;
					}
					
				});

				$('.comments').each(function(){
					
					if(this.value==""){
						$(this).addClass('blank-error');
						var _id=$(this).attr('id').split('_')[1];
						blank_cnts+=1;
					}
					
				});

				$('.debit').each(function(){
					
					if(this.value==""){
						$(this).addClass('blank-error');
						var _id=$(this).attr('id').split('_')[1];
						blank_cnts+=1;
					}
					
				});

				$('.credit').each(function(){
					
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

				var v_tdebit=(isNaN(parseFloat($('#tdebit').val().replace(/\,/g,'')))) ? 0  : parseFloat($('#tdebit').val().replace(/\,/g,''));
				var v_tcredit=(isNaN(parseFloat($('#tcredit').val().replace(/\,/g,'')))) ? 0 : parseFloat($('#tcredit').val().replace(/\,/g,''));

				if(v_tdebit==0){
					$('.ui-alert').html('Enter some debit entries'); 
					swal('No Debits','Debits must equal to Credits','error');
					$('.tdebit-group').addClass('has-error');
					return;
				}

				if(v_tcredit==0){
					$('.ui-alert').html('Enter some credit entries'); 
					swal('No Credits','Debits must equal to Credits','error');
					$('.tcredit-group').addClass('has-error');
					return;
				}

				if(v_tdebit!=v_tcredit){
					$('.ui-alert').html('Double entry standards not met'); 
					swal('Unbalanced Journal','Debits must equal to Credits','error');
					$('.tdebit-group').addClass('has-error');
					return;
				}
				
				if(blank_cnts>0){$('.ui-alert').html(blank_str+"You have some blank journal record.\r\ncheck both account code,amount and comments").show();return;}

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
		            type: "GET",
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
		                $('form.form-journal')[0].reset();
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
		    $('.form-journal').click(function() {
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
		   								'@foreach($accounts as $account)'+
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
		   								'@foreach($accounts as $account)'+
		   									'<option value="{{$account->description}}">{{$account->description}}</option>'+
		   								'@endforeach'+
		   							'</select>'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td>'+
		   					'<div class="form-group {{ $errors->has("debit") ? " has-error" : "" }}" id="debit-group">'+
		   						'<div class="input-group">'+
		   							'<input type="text" name="debit[]" class="form-control debit  text-right" value ="0" id="debit_'+vid+'">'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td>'+
		   					'<div class="form-group {{ $errors->has("credit") ? " has-error" : "" }}" id="credit-group">'+
		   						'<div class="input-group">'+
		   							'<input type="text" name="credit[]" class="form-control credit  text-right" value ="0" id="credit_'+vid+'">'+
		   						'</div>'+
		   					'</div>'+
		   				'</td>'+
		   				'<td>'+
		   					'<div class="form-group {{ $errors->has("comments") ? " has-error" : "" }}" id="comments-group">'+
		   						'<div class="input-group">'+
		   							'<input type="text" name="comments[]" class="form-control" id="comments_'+vid+'">'+
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

				var v_accounts={!!$accounts!!};
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