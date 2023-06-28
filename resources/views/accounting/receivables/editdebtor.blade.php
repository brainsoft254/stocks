@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-6">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><i class="glyphicon glyphicon-user"></i> <strong> New Debtor</strong></h3>
	                        <div class="box-tools pull-right">
							      <a href="{{url('debtorslist')}}" data-toggle="tooltip" data-placement="bottom" title="Go Back" class="btn btn-default">
							      <i class="glyphicon glyphicon-chevron-left"></i></a>
							</div>
				          <span class="ui-alert col-md-12"></span>
				        </div>
				        <div class="box-body">
		        			<br/>
				        	<form class="form-debtor" action="{{route('debtor.update',$debtor->id)}}" method="POST">
							{{csrf_field()}}
							{{ method_field('PUT') }}
			   					<div class="row">
				   					<div class="col-md-12">
					   					<div class="col-md-7">
						   					<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
						   						<div class="input-group">
						   						    <span class="input-group-addon">Code</span>
						   							<input type="text" name="code" class="form-control" value ="{{$debtor->code}}" readonly >
						   						</div>
						   					</div>
					   					</div>
					   					<div class="col-md-5">
						   					<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
						   						<div class="input-group">
						   						    <span class="input-group-addon">Active?</span>
						   							<select class="form-control" name="status" id="status">
						   								<option value="1" {{$debtor->status==1? 'selected' : ''}}>Yes</option>
						   								<option value="0" {{$debtor->status==0? 'selected' : ''}}>No</option>
						   							</select>
						   						</div>
						   					</div>
					   					</div>
				   					</div>
				   				</div>
			   					<div class="row">
				   					<div class="col-md-12">
					   					<div class="col-md-12">
						   					<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
						   						<div class="input-group">
						   						    <span class="input-group-addon">Name</i></span>
						   							<input type="text" name="description" class="form-control" value ="{{$debtor->name}}" >
						   						</div>
						   					</div>
					   					</div>
				   					</div>
				   				</div>
				   				<div class="row">
				   					<div class="col-md-12">
				   						<div class = "col-md-7">
						   					<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
						   						<div class="input-group">
						   						    <span class="input-group-addon">Address</i></span>
						   							<input type="text" name="address" class="form-control" value ="{{$debtor->address}}" >
						   						</div>
						   					</div>
					   					</div>
				   						<div class = "col-md-5">
						   					<div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
						   						<div class="input-group">
						   						    <span class="input-group-addon">City</i></span>
						   							<input type="text" name="city" class="form-control" value ="{{$debtor->city}}" >
						   						</div>
						   					</div>
					   					</div>
				   					</div>
			   					</div>
				   				<div class="row">
				   					<div class="col-md-12">
				   						<div class = "col-md-12">
						   					<div class="form-group {{ $errors->has('telphone') ? ' has-error' : '' }}">
						   						<div class="input-group">
						   						    <span class="input-group-addon">Tel</i></span>
						   							<input type="text" name="tel" class="form-control" value ="{{$debtor->tel}}" >
						   						</div>
						   					</div>
					   					</div>
				   					</div>
			   					</div>
				   				<div class="row">
				   					<div class="col-md-12">
				   						<div class = "col-md-12">
						   					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						   						<div class="input-group">
						   						    <span class="input-group-addon">Email</i></span>
						   							<input type="text" name="email" class="form-control" value ="{{$debtor->tel}}" >
						   						</div>
						   					</div>
					   					</div>
				   					</div>
			   					</div>
				   				<div class="row">
				   					<div class="col-md-12">
				   						<div class = "col-md-12">
						   					<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
						   						<div class="input-group">
						   						    <span class="input-group-addon">Remarks</i></span>
						   							<textarea type="text" name="remarks" class="form-control">{{$debtor->remarks}}</textarea>
						   						</div>
						   					</div>
					   					</div>
				   					</div>
			   					</div>
			   					<hr/>
				   				<div class="row">
				   					<div class="col-md-12">
					   					<div class="col-md-6">
					   						<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save/Update</button>
					   					</div>
				   					</div>
				   				</div>
		   					</form>
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
			    function resetModalFormErrors() {
			        $('.form-group').removeClass('has-error');
			        $('.form-group').find('.help-block').remove();
			        $('.ui-alert').html('');
			    }

		    $('form.form-debtor').on('submit', function(submission) {
		        
		        submission.preventDefault();
		        alert('after default');
				if($('#status').val()<0){
					$('.ui-alert').html('Select valid status'); 
					$('#status-group').addClass('has-error');	
					return;
				};

		        // Set vars.  1
		        var form   = $(this),
		            url    = form.attr('action'),
		            submit = form.find('[type=submit]');


		            var data        = form.serialize(),
		               contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';
		          	alert(url);

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
		                $(".ui-alert").html("<p class='text-success col-md-12'><i class='fa fa-frown fa-fw'></i>  "+response.responseText+"</p>").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
		            	// Reset submit.
		                if (submit.is('button')) {
		                    submit.html(submitOriginal);
		                } else if (submit.is('input')) {
		                    submit.val(submitOriginal);
		                }
		            }
		                window.location="/debtorslist";
		            }
		        });
		    });
		    // Reset errors when opening modal.
		    $('.form-debtor').click(function() {
		        resetModalFormErrors();
		    });
		});
	</script>
@stop