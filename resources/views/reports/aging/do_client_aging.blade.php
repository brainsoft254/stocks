@extends('stocksmaster') 
@section('content')  
	<div class="row">
		<div class ="col-md-12">
			<div class ="row">
				<div class ="col-md-6">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><span class="glyphicon glyphicon-list-alt"> </span><strong> Client Aging Analysis</strong></h3>
                           
				          <span class="ui-alert col-md-12">  </span>
				        </div>
				        <div class="box-body">

				        	<form class="form-print-aging" action ="{{url('print_client_aging_analysis')}}" method ="POST">
								{{csrf_field()}}
				   				<div class="row">
				   					<div class="col-md-12">
					   					<div class ="col-md-10">
						   					<div class="form-group {{ $errors->has('parent.*') ? ' has-error' : '' }}" id="zone-group">
						   						<div class="input-group">
						   						    <span class="input-group-addon primary"><i class="fa fa-cubes fa-fw"></i> Client Type</span>
						   							<select class="form-control parent" name="parent" id="parent" readonly>
						   								<option value="1" selected='selected'>-Parent-</option>
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
							   								<option value="-1" selected="selected">--ALL--</option>
							   								
							   							</select>
							   						</div>
							   					</div>
						   					</div>
					   				</div>
					   			</div>
					   			<div class="row">
					   				<div class ="col-md-12">
					   					<div class="col-md-7 form-group {{ $errors->has('period.*') ? ' has-error' : '' }}" id="period-group">
					   						<div class="input-group">
					   						    <span class="input-group-addon success"><i class="fa fa-tachometer fa-fw"></i> Period</span>
					   							<select class="form-control period" name="period" id="period">
					   								<option value="30" selected="selected">30 Days</option>
					   								<option value="60">60 Days</option>
					   								<option value="90">90 Days</option>
					   							</select>
					   						</div>
					   					</div>
					   					<div class="col-md-5 form-group {{ $errors->has('balance.*') ? ' has-error' : '' }}" id="balance-group">
					   						<div class="input-group">
					   						    <span class="input-group-addon danger"><i class="fa fa-dollar fa-fw"></i> Balance</span>
					   							<input type="text" name="balance" id="balance" class="balance form-control" value="0">
					   						</div>
					   					</div>
					   				</div>
					   			</div>
					   			<hr/>
				   				<div class="row">
				   					<div class"col-md-12">
					   					<div class="col-md-4">
					   						<button class="btn btn-primary has-spinner" id="btnGen" type="submit"><i class="fa fa-print"> </i> Print Statement</button>
					   					</div>
				   						<div class"col-md-8">

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

			    $('.parent,.client').select2({'theme':'bootstrap'});
				get_clients({!!$clients!!},1);
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
					var opts="<option value='-1' selected='selected'>--ALL--</option>";
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

		     swal('PRINT AGING ANALYSIS','Print Client Aging Analysis for:\n\r\t '+$("#client option:selected").text()+'?','info').then((res)=>{
				if(res){
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
							data:strData+'&excel=0',
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
									onEscape:function(){},
								});
								$('.modal-dialog').css('width','90%').css('margin','auto');
							}
						});
				}else{
				
					swal('','you shied :-;','info');
				}

				});


		        //window.location=urli+'/'+$('#zone').val()+'/'+$('#unit').val()+'/'+$('#code').val();

		    });
		});
	</script>	
@stop