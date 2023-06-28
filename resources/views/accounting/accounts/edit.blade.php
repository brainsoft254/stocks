
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> New Account</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-accounts" action="{{route('accounts.update',$account->id)}}" method="POST">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Code</span>
									<input type="text" name="code" value="{{$account->code}}" class="form-control" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
								<div class="input-group">
									<span class="input-group-addon warning">Active?</span>
									<select class="form-control" name="status" id="status">
										<option value="1" {{$account->status==1? 'selected': ''}}>Yes</option>
										<option value="0" {{$account->status==0? 'selected': ''}} >No</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success">Description</span>
									<input type="text" name="description" value="{{$account->description}}" class="form-control" placeholder="Enter account description" >
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class = "col-md-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon warning">Type</span>
									<select class="form-control" name="atype" id="atype">
										<option  value = "Bank" {{$account->atype=='Bank'? 'selected': ''}}>Bank</option>
										<option value = "Cash" {{$account->atype=='Cash'? 'selected': ''}}>cash</option>
										<option value ="Asset" {{$account->atype=='Asset'? 'selected': ''}}>Asset</option>
										<option value ="Debtors" {{$account->atype=='Debtors'? 'selected': ''}}>Debtors</option>
										<option value ="Liability" {{$account->atype=='Liability'? 'selected': ''}}>Liability</option>
										<option value ="Income" {{$account->atype=='Income'? 'selected': ''}}>Income</option>
										<option value ="Expense" {{$account->atype=='Expense'? 'selected': ''}}>Expense</option>
										<option value ="Capital" {{$account->atype=='Capital'? 'selected': ''}}>Capital</option>
									</select>
								</div>
							</div>
						</div>
						<div class = "col-md-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon danger">Category</span>
									<select class="form-control" name="category" id="category">
										<option value = "Cash at Bank" {{$account->atype=='Cash at Bank'? 'selected': ''}}>Cash at Bank</option>
										<option value = "Cash In Hand" {{$account->atype=='Cash In Hand'? 'selected': ''}}>cash In Hand</option>
										<option value ="Current Assets" {{$account->atype=='Current Assets'? 'selected': ''}}>Current Assets</option>
										<option value ="Fixed Assets" {{$account->atype=='Fixed Assets'? 'selected': ''}}>Fixed Assets</option>
										<option value ="Trade & Other Receivables" {{$account->atype=='Trade & Other Receivables'? 'selected': ''}}>Trade & Other Receivables</option>
										<option value ="Land and Buildings" {{$account->atype=='Land and Buildings'? 'selected': ''}}>Land and Buildings</option>
										<option value ="Office Equipment" {{$account->atype=='Office Equipment'? 'selected': ''}}>Office Equipment</option>
										<option value ="Current Liability" {{$account->atype=='Current Liability'? 'selected': ''}}>Current Liability</option>
										<option value ="Long Term Liability" {{$account->atype=='Long Term Liability'? 'selected': ''}}>Long Term Liability</option>
										<option value ="Trade & Other Payables" {{$account->atype=='Trade & Other Payables'? 'selected': ''}}>Trade & Other Payables</option>
										<option value ="Other Incomes" {{$account->atype=='Other Incomes'? 'selected': ''}}>Other Incomes</option>
										<option value ="Expense" {{$account->atype=='Expense'? 'selected': ''}}>Expense</option>
										<option value ="Provisions" {{$account->atype=='Provisions'? 'selected': ''}}>Provisions</option>
										<option value ="Reserves" {{$account->atype=='Reserves'? 'selected': ''}}>Reserves</option>
										<option value ="Capital" {{$account->atype=='Capital'? 'selected': ''}}>Capital</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('bs') ? ' has-error' : '' }}" id="status-group">
								<div class="input-group">
									<span class="input-group-addon success">bs item?</span>
									<select class="form-control" name="bs" id="bs">
										<option value="0" {{$account->bs==0? 'selected': ''}}>No</option>
										<option value="1" {{$account->bs==1? 'selected': ''}}>Yes</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('direct') ? ' has-error' : '' }}" id="direct-group">
								<div class="input-group">
									<span class="input-group-addon success">Direct?</span>
									<select class="form-control" name="direct" id="direct">
										<option value="0" {{$account->direct==0? 'selected': ''}}>No</option>
										<option value="1" {{$account->direct==1? 'selected': ''}}>Yes</option>
									</select>
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
		</div>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
	$(function(){

		$('#status,#atype,#category,#bs').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});

		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}


		$('form.form-accounts').on('submit', function(submission) {
			
			submission.preventDefault();

			swal("Update Account Details?", {
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
					        // Set vars.  1
					        var form   = $(this),
					        url    = form.attr('action'),
					        submit = form.find('[type=submit]');

					        var data     = form.serialize(),
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
					                    var formGroup = $('[name='+field+']', form).closest('.form-group');
					                    formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
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
					        		$('.ui-alert').html(response.responseText);
					                    //$('.ui-alert').html("<span class='text-warning'><i class='fa fa-frown fa-fw'></i> Something went Wrong</span>");                   
					                }else{  
					                	swal("",response.responseText,"success");
					                	$('form.form-accounts')[0].reset();
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
	    $('.form-accounts').click(function() {
	    	resetModalFormErrors();
	    });



	});
</script>
