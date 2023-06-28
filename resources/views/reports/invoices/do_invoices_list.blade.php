@extends('stocksmaster') 
@section('content')  
	<div class="row">
		<div class ="col-md-12">
			<div class ="row">
				<div class ="col-md-6">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><span class="glyphicon glyphicon-list-alt"> </span><strong> Print Invoices List</strong></h3>
                           
				          <span class="ui-alert col-md-12">  </span>
				        </div>
				        <div class="box-body">

				        	<form class="form-print-aging" action ="{{url('print-invoice-listing')}}" method ="POST">
								{{csrf_field()}}
				   				<div class="row">
				   					<div class="col-md-12">
					   					<div class ="col-md-6">
						   					<div class="form-group {{ $errors->has('parent.*') ? ' has-error' : '' }}" id="zone-group">
						   						<div class="input-group">
						   						    <span class="input-group-addon primary"><i class="fa fa-cubes fa-fw"></i> Client Type</span>
						   							<select class="form-control parent" name="parent" id="parent" readonly>
						   								<option value="-1" selected="selected">-Select Client Type-</option>
						   								<option value="1">-Parent-</option>
						   								<option value="0">-Child-</option>
						   							</select>
						   						</div>
						   					</div>
						   				</div>

					   				</div>
					   			</div>
					   			<div class="row">
				   					<div class ="col-md-12">
					   					<div class ="col-md-12">
							   					<div class="form-group {{ $errors->has('client.*') ? ' has-error' : '' }}" id="zone-group">
							   						<div class="input-group">
							   						    <span class="input-group-addon warning"><i class="fa fa-thermometer fa-fw"></i>Client(s)</span>
							   							<select class="form-control client" name="client" id="client" readonly>
							   								<option value="-1" selected="selected">--Select Client--</option>
							   								
							   							</select>
							   						</div>
							   					</div>
						   					</div>
					   				</div>
					   			</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('datefrom') ? ' has-error' : '' }}">
											<div class="input-group">
												<span class="input-group-addon warning"><i class="fa fa-calendar-times-o"></i> Date From</span>
												<input type="text" name="datefrom" class="form-control datefrom" id="datefrom" placeholder="Date From" value="{{$dfrom}}">
											</div>
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('dateto') ? ' has-error' : '' }}">
											<div class="input-group">
												<span class="input-group-addon warning"><i class="fa fa-calendar-times-o"></i> Date To</span>
												<input type="text" name="dateto" class="form-control dateto" id="dateto" placeholder="Date To" value="{{$dto}}" readonly="">
											</div>
										</div>
										
									</div>
					   			</div>
					   			<hr/>
				   				<div class="row">
				   					<div class="col-md-12">
					   					<div class="col-md-4">
					   						<button class="btn btn-primary has-spinner" id="btnGen" type="submit"><i class="fa fa-print"> </i> Print List</button>
					   					</div>
				   						<div class="col-md-8">

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
				$('#datefrom').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom",autoclose: true,}).datepicker("setDate", Date.today().add(-1).months());
				$('#dateto').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom",autoclose: true,}).datepicker("setDate", Date.today());

			    $('.parent,.client').select2();

			    $(document).on("change","#parent",function(){
					var clients={!!$clients!!};
					console.log($(this).val());
					if($(this).val()>0){
						get_clients(clients,1);
					}else{
						get_clients(clients,0);
					}
				});

				function get_clients(_clients,v_type)
				{
					$('.clients').html('');
					var opts="<option value='-1' selected='selected'>--Select Client--</option>";
					console.log(v_type);
					for(i in _clients){
						if(_clients[i].parent==v_type){
							opts+="<option value='"+_clients[i].code+"'>"+_clients[i].name+"</option>";
						}
					}

					console.log(opts);

					$('.client').html(opts);
				}




  			
			$('form.form-print-aging').on('submit', function(submission) {
		        submission.preventDefault();

		        if($('.balance').val()<0 || $('.balance').val()=="" ){swal('Invalid Balance Amount','Enter Valid Amount & Try Again','error'); $('.balance').val('0');return;}
		        if($('.period').val()<0 || $('.period').val()=="" ){swal('Invalid Period','Select Valid Period & Try Again','error');return;}

		        if(!confirm('Print Client Aging Analysis for '+$('#zone').val()+'?')){
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

		        var strData=$('.form-print-aging').serialize();
                //$('#btnGen').buttonLoader('start');
		        $.ajax({
					url:urli,
					type:'GET',
					data:strData+'&pdf=0',
					dataType:'html',
					complete:function(data){

						// Reset submit.
						//$('#btnGen').buttonLoader('stop');
		                if (submit.is('button')) {
		                    submit.html(submitOriginal);
		                    submit.prop('disabled',false);
		                } else if (submit.is('input')) {
		                    submit.val(submitOriginal);
		                }
                         
						bootbox.dialog({
							title:'Client Aging Analysis',
							message:data.responseText,
							size:'large',
							backdrop:true,
							//onEscape:function(){location.reload();},
						});
					}
				});


		        //window.location=urli+'/'+$('#zone').val()+'/'+$('#unit').val()+'/'+$('#code').val();

		    });
		});
	</script>	
@stop