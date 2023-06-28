@extends('stocksmaster') 
@section('content')             
<div class ="row">
	<div class ="col-md-6">
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="text-warning text-center"><span class="fa fa-pie-chart"> </span><strong> Print Route Sales Analysis</strong></h3>
				<span class="ui-alert col-md-12">  </span>
			</div>
			<div class="box-body">
				<form class="form-print-stat" action ="{{url('print-rep-sales-analysis')}}" method ="GET">
					@csrf
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
					<br/>
					<div class="row">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon warning"><i class="fa fa-bell"> Sales Rep</i></span>
								<select class="form-control" name ="client" id ="client">
									<option value="-1" selected="selected">--ALL--</option>
									@foreach($staffs as $staff)
									<option value="{{$staff->name}}">{{$staff->name}}</option>
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

@stop

@section('page-script')
<script type="text/javascript">
	$(function(){

			    $('.client').select2();
			    $('#client').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('.box-body')});

			    $('#dfrom').datepicker({format:'yyyy-mm-dd'});
			    $('#dto').datepicker({format:'yyyy-mm-dd' });


			    $('form.form-print-stat').on('submit', function(submission) {
			    	submission.preventDefault();


			    	var startDate=new Date($('#dfrom').val());
			    	var endDate=new Date($('#dto').val());
			    	if(startDate>endDate){swal('Invalid Date Range','Start Date Cant be Greater than End Date','error');return;}

			    	if(!confirm('Print Sales Analysis ?')){
			    		return;
			    	}

			    	var form   = $(this),
			    	urli    = form.attr('action'),
			    	submit = form.find('[type=submit]');

		        // Please wait.
		        if (submit.is('button')) {
					
		        	var submitOriginal = submit.html();
		            submit.html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
		            submit.prop('disabled',true);
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

		                if (submit.is('button')) {
		                    submit.html(submitOriginal);
		                    submit.prop('disabled',false);
		                } else if (submit.is('input')) {
		                    submit.val(submitOriginal);
		                }

						bootbox.dialog({
							title:'Sales Analysis',
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