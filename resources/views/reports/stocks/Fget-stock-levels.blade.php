@extends('stocksmaster') 
@section('content')            
<div class="row">
	<div class ="col-md-12">
		<div class ="row">
			<div class ="col-md-5">
				<div class="box box-solid box-primary">
					<div class="box-header">
						<h3 class="text-default"><span class="glyphicon glyphicon-list-alt"> </span><strong> Generate Stock Levels</strong></h3>

						<span class="ui-alert col-md-12">  </span>
					</div>
					<div class="box-body">

						<form class="form-print-levels" action ="{{url('print-stock-levels')}}" method ="POST">
							{{csrf_field()}}
							<div class="row">

								<div class ="col-md-10">
									<div class="form-group {{ $errors->has('name.*') ? ' has-error' : '' }}" id="name-group">
										<div class="input-group">
											<span class="input-group-addon warning"><i class="fa fa-compass fa-fw"></i> Location</span>
											<select class="form-control location" name="location" id="location">
												<option value="ALL" selected="selected">--ALL--</option>
												@foreach($locations as $loc)
												<option value="{{$loc->code}}">{{$loc->description}}</option>
												@endforeach
											</select>
										</div>
									</div>							   					
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class"col-md-12">
									<div class"col-md-8">
									</div>
									<div class="col-md-4">
										<button class="btn btn-primary " id="btnGen"><i class="fa fa-print"> </i> Print Levels</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="box-footer">
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
			</div>

		</div>
	</div>
</div>
@stop

@section('page-script')
<script type="text/javascript">
	$(function(){



		$('form.form-print-levels').on('submit', function(submission) {
			submission.preventDefault();

			if($('.location').val()==-1){swal('Invalid Location Info','Select Location  & Try Again','error');return;}

			if(!confirm('Print Stock Levels '+$('#location').val()+'?')){
				return;
			}

			var form   = $(this),
			urli    = form.attr('action'),
			submit = form.find('[type=submit]');

		        // Please wait.
		        if (submit.is('button')) {
		        	var submitOriginal = submit.html();
		        	submit.html('Please wait...');
		        } else if (submit.is('input')) {
		        	var submitOriginal = submit.val();
		        	submit.val('Please wait...');
		        }

		        var strData=$('.form-print-levels').serialize();

		        $.ajax({
		        	url:urli,
		        	type:'GET',
		        	data:strData+'&pdf=0',
		        	dataType:'html',
		        	complete:function(data){

						// Reset submit.
						if (submit.is('button')) {
							submit.html(submitOriginal);
						} else if (submit.is('input')) {
							submit.val(submitOriginal);
						}

						bootbox.dialog({
							title:'Client Statement',
							message:data.responseText,
							size:'large',
							backdrop:true,
							onEscape:true,
						});
					}
				});


		        //window.location=urli+'/'+$('#zone').val()+'/'+$('#unit').val()+'/'+$('#code').val();

		    });
	});
</script>	
@stop