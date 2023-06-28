
<div class="row" style=" z-index: 9999999;">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> Attach Items to Client</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-items" action="{{route('clitems.update',$item->id)}}" method="POST">
					@csrf @method('PUT')
					<div class="row">
						<div class = "col-md-4">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon primary">Item Code</span>
									<input type="text" name="itemcode" class="form-control" value="{{$item->itemcode}}" readonly>
								</div>
							</div>
						</div>
						<div class = "col-md-8">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon primary">Description</span>
									<input type="text" name="description" class="form-control" value="{{$item->description}}">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class = "col-md-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon success">Item Category</span>
									<input type="text" name="category" class="form-control" value="{{Stockspro::getItemCategory($item->itemcode)}}" readonly>
								</div>
							</div>
						</div>
						<div class = "col-md-4">
							<div class="form-group">
								<div class="input-group" >
									<span class="input-group-addon warning">Selling price</span>
									<input type="text" name="price" class="form-control" value="{{$item->price}}" required>
								</div>
							</div>
						</div>
					</div>
					<br/>

					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary pull-right" ><i class="fa fa-floppy-o"></i> Save/Update</button>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer">
			</div>
		</div>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
	$(function(){


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
				icon:"warning",
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
					             	$('div.panel-footer').addClass('has-error').html('');
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
					                  
					                  var formGroup = $('[class='+field+']', form).closest('.form-group');
					                  formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
					                    //$('.'+field).css('border','solid 1px red');

					                    //$('div.panel-footer').addClass('has-error').append('<p class="help-block">'+message+'</p>');

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
					                	//bootbox.dialog({message:response.responseText});
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
					    swal("Shied!","Got away safely!","info");
					}
				});
			});

	    // Reset errors when opening modal.
	    $('.form-items').click(function() {
	    	resetModalFormErrors();
	    });



	});
</script>
