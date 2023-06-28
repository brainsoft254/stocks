
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> Edit Stock Item</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-items" action="{{route('items.update',$item->id)}}" method="POST">
					@csrf
					@method('put')

					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Code</span>
									<input type="text" name="code" class="form-control" value="{{$item->code}}" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
								<div class="input-group">
									<span class="input-group-addon primary">Active?</span>
									<select class="form-control" name="status" id="status">
										<option value="1" {{$item->status==1?'selected': ''}}>Yes</option>
										<option value="0" {{$item->status==0?'selected': ''}}>No</option>
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
									<input type="text" name="description" class="form-control" value="{{$item->description}}" >
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
										@foreach($categories as $category)
										<option value = "{{$category->code}}" {{$item->category==$category->code?'selected': ''}} >{{$category->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}" id="barcode-group">
								<div class="input-group">
									<span class="input-group-addon danger">Item Barcode</span>
									<input type="text" name="barcode" class="form-control" value="{{$item->barcode}}" >
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('bprice') ? ' has-error' : '' }}" id="bprice-group">
								<div class="input-group">
									<span class="input-group-addon success">Buying Price</span>
									<input type="text" name="bprice" class="form-control" value="{{$item->bprice}}" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('direct') ? ' has-error' : '' }}" id="direct-group">
								<div class="input-group">
									<span class="input-group-addon success">Selling Price</span>
									<input type="text" name="sprice" class="form-control" value="{{$item->sprice}}" >
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
										@foreach($uoms as $uom)
										<option value= "{{$uom->code}}" {{$item->uom==$uom->code?'selected': ''}} >{{$uom->code}}</option>
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
										<option value="1" {{$item->vatable==1?'selected': ''}}>Yes</option>
										<option value="0" {{$item->vatable==0?'selected': ''}}>No</option>
									</select>
								</div>
							</div>
						</div>						

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('forpurchase') ? ' has-error' : '' }}" id="direct-group">
								<div class="form-check abc-checkbox abc-checkbox-primary">
									<input class="form-check-input" name="forpurchase" id="forpurchase" type="checkbox" {{ $item->forpurchase>0 ?  'checked' : "" }}>
									<label class="form-check-label text-primary " for="forpurchase">
										For Purchase
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('forsale') ? ' has-error' : '' }}" id="direct-group">
								<div class="form-check abc-checkbox abc-checkbox-primary">
									<input class="form-check-input" name="forsale" id="forsale" type="checkbox" {{ $item->forsale>0 ?  'checked' : "" }}>
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
										@foreach($accounts as $account)
										<option value = "{{$account->code}}" {{$item->acct_cog==$account->code?'selected': ''}} >{{$account->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('rol') ? ' has-error' : '' }}" id="bprice-group">
								<div class="input-group">
									<span class="input-group-addon danger">Re-order Level</span>
									<input type="text" name="rol" class="form-control" value="{{$item->rol}}" >
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
										@foreach($accounts as $account)
										<option value = "{{$account->code}}" {{$item->acct_income==$account->code?'selected': ''}}>{{$account->description}}</option>
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
										@foreach($accounts as $account)
										<option value = "{{$account->code}}" {{$item->acct_inventory==$account->code?'selected': ''}}>{{$account->description}}</option>
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

		$('#status,#acct_income,#category,#acct_inventory,#acct_cog').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});

		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}


		$('form.form-items').on('submit', function(submission) {
			
			submission.preventDefault();

			swal("Update Item Details?", {
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
