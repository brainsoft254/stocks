
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> New Stock Location</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-location" action="{{route('routesman.update',$route->id)}}" method="POST">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Code</span>
									<input type="text" name="code" class="form-control" value="{{$route->code}}" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
								<div class="input-group">
									<span class="input-group-addon warning">Status</span>
									<select class="form-control" name="status" id="status">
										<option value="1" {{$route->status==1? 'selected' :'' }}>Active</option>
										<option value="0" {{$route->status==0? 'selected' :'' }}>InActive</option>
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
									<input type="text" name="description" class="form-control" value="{{$route->description}}" >
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group {{ $errors->has('rep') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success">Representative</span>
									<select class="form-control" name="rep" id="rep">
										@foreach($staffs as $staff)
											<option value="{{$staff->name}}" {{($route->rep==$staff->name)?'selected':''}}>{{$staff->name}}</option>
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

		$('#status,#atype,#category,#bs').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});

		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}


		$('form.form-location').on('submit', function(submission) {
			
			submission.preventDefault();

			swal("Update Location Details?", {
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
					                	$('form.form-routesman')[0].reset();
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
	    $('.form-routesman').click(function() {
	    	resetModalFormErrors();
	    });



	});
</script>
