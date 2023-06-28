@extends('stocksmaster') 
@section('content')  
<div class="section">
<div class ="row">
	<div class ="col-md-7">
		<div class="panel panel-primary">
			<div class="panel-heading">
                <h3 class="text-white text-left"><span class="fa fa-pie-chart"> </span><strong> Print Client Balances</strong></h3>
				<span class="ui-alert col-md-12">  </span>
			</div>
			<div class="panel-body">
				<form class="form-print-stat" action ="{{url('print-client-balances')}}" method ="GET">
					@csrf
					<div class="row">
						<div class="col-md-10 form-group {{ $errors->has('asatdate') ? ' has-error' : '' }}">
							<div class="input-group">
								<span class="input-group-addon primary"><i class="fa fa-calendar"></i> As At ?</span>
								<input type="text" name="asatdate" data-provide="datepicker" class="form-control" value="{{$asAtDate}}" placeholder="" id="asatdate" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon success"><i class="fa fa-bell"> Client Type</i></span>
								<select class="form-control" name ="cltype" id ="cltype">
									<option value="1" selected="selected">Parent</option>
									<option value="0">Child</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon warning"><i class="fa fa-magic"> Report Type</i></span>
								<select class="form-control" name ="summary" id ="summary">
									<option value="1" selected="selected">Summary</option>
									<option value="0" >Detailed</option>
								</select>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon success"><i class="fa fa-bell"> Client</i></span>
								<select class="form-control" name ="client" id ="client">
									<option value="-1" selected="selected">--ALL--</option>
									@foreach($clients as $client)
									<option value="{{$client->code}}">{{$client->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>					
					<hr/>
					<div class="row">
						<div class="col-md-8">
						</div>
						<div class="col-md-4">
							<button class="btn btn-primary " id="btnGen" type="submit"><i class="fa fa-print"> </i> Print Report</button>
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

@stop

@section('page-script')
<script type="text/javascript">
	$(function(){

			    $('.client').select2();
			    $('#client').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('.panel-body')});

			    $('#asatdate').datepicker({format:'yyyy-mm-dd'});


			    $('form.form-print-stat').on('submit', function(submission) {
			    	submission.preventDefault();


			    	// var startDate=new Date($('#dfrom').val());
			    	// var endDate=new Date($('#dto').val());
			    	// if(startDate>endDate){swal('Invalid Date Range','Start Date Cant be Greater than End Date','error');return;}

			    	if(!confirm('Print Client Balances ?')){
			    		return;
			    	}

			    	var form   = $(this),
			    	urli    = form.attr('action'),
			    	submit = form.find('[type=submit]');

		        // Please wait.
		        if (submit.is('button')) {
		        	var submitOriginal = submit.html();
		        	submit.html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Please wait...');
					submit.attr('disabled',true);
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
							submit.attr('disabled',false);
						} else if (submit.is('input')) {
							submit.val(submitOriginal);
						}

						bootbox.dialog({
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