
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> New Stock Item</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-items" action="{{route('items.store')}}" method="POST" novalidate >
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Code</span>
									<input type="text" name="code" class="form-control" value="{{Stockspro::get_settings()->ispos>0?'AUTO':''}}" placeholder="Enter account code" {{Stockspro::get_settings()->ispos>0?'readonly':''}} >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
								<div class="input-group">
									<span class="input-group-addon primary">Active?</span>
									<select class="form-control" name="status" id="status">
										<option value="1" selected="selected">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Description</span>
									<input type="text" name="description" class="form-control" placeholder="Enter account description" >
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class = "col-md-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon warning">Category</span>
									<select class="form-control" name="category" id="category">
										<option value="-1" selected="selected">--Select Item Category --</option>
										@foreach($categories as $category)
										<option value = "{{$category->code}}">{{$category->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}" id="barcode-group">
								<div class="input-group">
									<span class="input-group-addon danger">Item Barcode</span>
									<input type="text" name="barcode" class="form-control" placeholder="Enter Item Barcode" >
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('bprice') ? ' has-error' : '' }}" id="bprice-group">
								<div class="input-group">
									<span class="input-group-addon success">Buying Price</span>
									<input type="text" name="bprice" class="form-control" placeholder="Enter Buying Price" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('direct') ? ' has-error' : '' }}" id="direct-group">
								<div class="input-group">
									<span class="input-group-addon success">Selling Price</span>
									<input type="text" name="sprice" class="form-control" placeholder="Enter Selling Price" >
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('uom') ? ' has-error' : '' }}" id="direct-group">
								<div class="input-group">
									<span class="input-group-addon info">Unit Of Measure</span>
									<select class="form-control" name="uom" id="uom">
										<option value="-1" selected="selected">--Select Unit of Measure--</option>
										@foreach($uoms as $uom)
										<option value= "{{$uom->code}}">{{$uom->code}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('vatable') ? ' has-error' : '' }}" id="status-group">
								<div class="input-group">
									<span class="input-group-addon warning">Vatable?</span>
									<select class="form-control" name="vatable" id="vatable">
										<option value="1" selected="selected">Yes</option>
										<option value="0">No</option>
									</select>
								</div>
							</div>
						</div>						
					
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('forpurchase') ? ' has-error' : '' }}" id="direct-group">
								<div class="form-check abc-checkbox abc-checkbox-primary">
									<input class="form-check-input" name="forpurchase" id="forpurchase" type="checkbox">
									<label class="form-check-label text-primary " for="forpurchase">
										For Purchase
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('forsale') ? ' has-error' : '' }}" id="direct-group">
								<div class="form-check abc-checkbox abc-checkbox-primary">
									<input class="form-check-input" name="forsale" id="forsale" type="checkbox">
									<label class="form-check-label text-success" for="forsale">
										For Sale
									</label>
								</div>
							</div>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('acct_cog') ? ' has-error' : '' }}" id="direct-group">
								<div class="input-group">
									<span class="input-group-addon info">COG Account</span>
									<select class="form-control" name="acct_cog" id="acct_cog">
										<option value="{{Stockspro::get_settings()->cog}}" selected="selected">{{Stockspro::get_settings()->cog}}</option>
										@foreach($accounts as $account)
										<option value = "{{$account->code}}">{{$account->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('rol') ? ' has-error' : '' }}" id="bprice-group">
								<div class="input-group">
									<span class="input-group-addon danger">Re-order Level</span>
									<input type="text" name="rol" class="form-control" placeholder="Enter Rol Qty" >
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('acct_income') ? ' has-error' : '' }}" id="direct-group">
								<div class="input-group">
									<span class="input-group-addon info">Income Account</span>
									<select class="form-control" name="acct_income" id="acct_income">
										<option value="{{Stockspro::get_settings()->stocks}}" selected="selected">{{Stockspro::get_settings()->stocks}}</option>
										@foreach($accounts as $account)
										<option value = "{{$account->code}}">{{$account->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('acct_inventory') ? ' has-error' : '' }}" id="direct-group">
								<div class="input-group">
									<span class="input-group-addon  info">Inventory Account</span>
									<select class="form-control" name="acct_inventory" id="acct_inventory">
										<option value="{{Stockspro::get_settings()->revenue}}" selected="selected">{{Stockspro::get_settings()->revenue}}</option>
										@foreach($accounts as $account)
										<option value = "{{$account->code}}">{{$account->description}}</option>
										@endforeach
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
		
		//$('#status,#acct_income,#category,#acct_inventory,#acct_cog').select2({theme:'bootstrap',width:'100%',dropdownParent: $('body')});

		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}


		$('form.form-items').on('submit', function(submission) {
			
			submission.preventDefault();

			swal("Save Item Details?", {
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

					        if (form.find('[type=file]').length) {
		                    // If found, prepare submission via FormData object.
			                    var input       = form.serializeArray(),
			                    data        = new FormData($(this)[0]),
			                    contentType = false;

                			}
			                // If no file input found, do not use FormData object (better browser compatibility).
			                else {
			                	var data        = form.serialize(),
			                	contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
			                }


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
					                	$('form.form-items')[0].reset();
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
	    $('.form-items').click(function() {
	    	resetModalFormErrors();
	    });



	});
</script>
