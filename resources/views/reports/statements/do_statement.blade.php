@extends('stocksmaster') 
@section('content')             
<div class="row">
	<div class ="col-md-12">
		<div class ="row">
			<div class ="col-md-6">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="text-primary text-center"><span class="fa fa-bar-chart"> </span><strong> Print Client Statement</strong></h3>
						<span class="ui-alert col-md-12">  </span>
					</div>
					<div class="box-body">
						<form class="form-print-stat" action ="{{url('print-client-statement')}}" method ="POST">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group {{ $errors->has('cltype') ? ' has-error' : '' }}">
										<div class="input-group">
											<span class="input-group-addon acct-label success"><i class="fa fa-tags"></i> Client Type</span>
											<select class="form-control cltype" name="cltype" id="cltype">
												<option value="1" selected="selected">Parent</option>
												<option value="0">Child</option>
											</select>
										</div>
									</div>	
								</div>
								<div class="col-md-6">
									
										<div class="form-check abc-checkbox abc-checkbox-primary" id="with_parent_check" style="display: none">
					                        <input class="form-check-input" name="with_parent" id="with_parent" type="checkbox">
					                        <label class="form-check-label" for="with_parent">
					                            Include Parent Sales
					                        </label>
					                    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group {{ $errors->has('client') ? ' has-error' : '' }}">
										<div class="input-group">
											<span class="input-group-addon acct-label danger"><i class="fa fa-users"></i> Client</span>
											<select class="form-control client" name="client" id="client">
												<option value="-1" selected="selected">--Select Client--</option>
												@foreach($clients as $client)
												<option value="{{$client->code}}" >{{$client->name}}</option>
												@endforeach
											</select>
										</div>
									</div>	
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group {{ $errors->has('datefrom') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-calendar"></i> From </span>
										<input type="text" name="dfrom" data-provide="datepicker" class="form-control" value="{{$dfrom}}" placeholder="" id="dfrom" >
									</div>
								</div>
								<div class="col-md-6 form-group {{ $errors->has('dateto') ? ' has-error' : '' }}">
									<div class="input-group">
										<span class="input-group-addon primary"><i class="fa fa-calendar"></i> To </span>
										<input type="text" name="dto" data-provide="datepicker" class="form-control" value="{{$dto}}" placeholder="" id="dto" >
									</div>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-8">
								</div>
								<div class="col-md-4">
									<button class="btn btn-primary " id="btnGen"><i class="fa fa-print"> </i> Print Statement</button>
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

			    $('.cltype,.client').select2();

			    $('#dfrom').datepicker({format:'yyyy-mm-dd'});
			    $('#dto').datepicker({format:'yyyy-mm-dd' });

			    if($(".cltype").val()>0){
			    		$('#with_parent_check').show();
			    	}else{
			    		$('#with_parent_check').hide();
			    }

			    $(document).on("change",".cltype",function(){
			    	
			    	if($(this).val()>0){
			    		$('#with_parent_check').show();
			    	}else{
			    		$('#with_parent_check').hide();
			    	}
			     });

			    $('form.form-print-stat').on('submit', function(submission) {
			    	submission.preventDefault();

			    	var startDate=new Date($('#dfrom').val());
			    	var endDate=new Date($('#dto').val());
			    	if(startDate>endDate){swal('Invalid Date Range','Start Date Cant be Greater than End Date','error');return;}

			    	if(!confirm('Print Client Statement ?')){
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

		        var strData=$('.form-print-stat').serialize();

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
							title:'Cleint Statement',
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