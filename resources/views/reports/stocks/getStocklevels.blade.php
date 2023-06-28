@extends('reams-main') 
@section('content')              
	<div class="row">
		<div class ="col-md-12">
			<div class ="row">
				<div class ="col-md-6">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><span class="glyphicon glyphicon-list-alt"> </span><strong> Client Statement</strong></h3>
                           
				          <span class="ui-alert col-md-12">  </span>
				        </div>
				        <div class="box-body">

				        	<form class="form-print-stat" action ="{{url('print-client_statement')}}" method ="POST">
								{{csrf_field()}}
			   					<div class="row">
				   					<div class="col-md-12">
				   						<div class ="col-md-8">
						   					<div class="form-group {{ $errors->has('name.*') ? ' has-error' : '' }}" id="name-group">
						   						<div class="input-group">
						   							<span class="input-group-addon primary"><i class="fa fa-user fa-fw"></i> Client</span>
						   							<select class="form-control clname" name="clname" id="clname">
						   								<option value="-1" selected="selected" placeholder ="selec Clientname">--Select Clientname--</option>
						   								@foreach($customers as $customer)
						   									<option value="{{$customer->name}}">{{$customer->name}}</option>
						   								@endforeach
						   							</select>
						   						</div>
						   					</div>							   					
					   					</div>
				   						<div class ="col-md-4">
						   					<div class="form-group {{ $errors->has('code.*') ? ' has-error' : '' }}" id="code-group">
						   						<div class="input-group">
						   							<span class="input-group-addon primary"><i class="fa fa-user fa-fw"></i></span>
						   							<select class="form-control clcode" name="code" id="clcode">
						   								<option value="-1" selected="selected" placeholder ="select clientcode">--Select Code--</option>
						   								@foreach($customers as $customer)
						   									<option value="{{$customer->code}}">{{$customer->code}}</option>
						   								@endforeach
						   							</select>
						   						</div>
						   					</div>							   					
					   					</div>							   					

					   				</div>

				   				</div>
				   				<div class="row">
				   					<div class="col-md-12">
					   					<div class ="col-md-6">
						   					<div class="form-group {{ $errors->has('zone.*') ? ' has-error' : '' }}" id="zone-group">
						   						<div class="input-group">
						   						    <span class="input-group-addon success"><i class="fa fa-cubes fa-fw"></i> Zone</span>
						   							<select class="form-control zone" name="zone" id="zone" readonly>
						   								<option value="ALL" selected="selected">--ALL--</option>
						   								@foreach($zones as $zone)
						   									<option value="{{$zone->name}}">{{$zone->name}}</option>
						   								@endforeach
						   							</select>
						   						</div>
						   					</div>
						   				</div>
					   					<div class ="col-md-6">
						   					<div class="form-group {{ $errors->has('unit.*') ? ' has-error' : '' }}" id="unit-group">
						   						<div class="input-group">
						   						    <span class="input-group-addon success"><i class="fa fa-underline fa-fw"></i> Unit</span>
						   							<select class="form-control unit" name="unit" id="unit">
						   								<option value="ALL" selected="selected">--ALL--</option>
						   								@foreach($units as $unit)
						   									<option value="{{$unit->ucode}}">{{$unit->ucode}}</option>
						   								@endforeach
						   							</select>
						   							<select class="form-control zone_" name="zone_" id="zone_" style="display:none">
						   								<option value="ALL" selected="selected">--ALL--</option>
						   								@foreach($units as $unit)
						   									<option value="{{$unit->zone}}">{{$unit->zone}}</option>
						   								@endforeach
						   							</select>
						   							
						   						</div>
						   					</div>
						   				</div>
					   				</div>
					   			</div>
					   			<div class="row">
					   				<div class ="col-md-12">
					   					<div class ="col-md-6">
						   					<div class="form-group {{ $errors->has('meterno.*') ? ' has-error' : '' }}" id="meterno-group">
						   						<div class="input-group">
						   						    <span class="input-group-addon warning"><i class="fa fa-tachometer fa-fw"></i> MeterNo</span>
						   							<select class="form-control meterno" name="meterno" id="meterno">
						   								<option value="ALL" selected="selected">ALL</option>
						   								@foreach($units as $unit)
						   									<option value="{{$unit->meterno}}">{{$unit->meterno}}</option>
						   								@endforeach
						   							</select>
						   						</div>
						   					</div>
						   				</div>
					   				</div>
					   			</div>
					   			<div class="row">
					   				<div class ="col-md-12">
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
					   			</div>
					   			<hr/>
				   				<div class="row">
				   					<div class"col-md-12">
				   						<div class"col-md-8">

				   						</div>
					   					<div class="col-md-4">
					   						<button class="btn btn-primary " id="btnGen"><i class="fa fa-print"> </i> Print Statement</button>
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

			    $('.meterno,.clcode,.clname,.zone,.unit').select2();

			    $('#dfrom').datepicker({format:'yyyy-mm-dd'});
			    $('#dto').datepicker({format:'yyyy-mm-dd' });
                


			    var units={!!$units!!};
			    var item = units.find(item => item.clcode === 'CL00005');
			    
			    for(i=0;i<=item.length;i++){
			    	alert(item[i].zone);
			    }

  				if($('#zone').val()<0){
					swal("Error","select valid zone","error");
    			     return;
				};
  				if($('#code').val()<0){
					swal("Error","select valid clientcode","error");
    			     return;
				};
				$(document).on("change","#zone",function(){
/*					getUnits($(this).val());
*/				});
				$(document).on("change",".clcode",function(event){

					 if ($(event.target).is('.clcode')) {
					 	var selIdx=$(this).prop('selectedIndex');
						$('.clname option:eq('+selIdx+')').prop('selected',true).change();
						getUnits($(this).val());
					}
				});

				$(document).on("change",".clname",function(event){

					if ($(event.target).is('.clname')) {
						var selIdx=$(this).prop('selectedIndex');
						$('.clcode option:eq('+selIdx+')').prop('selected',true).trigger('change');
						getUnits($('.clcode').val());
					}
				});

				$(document).on("change",".unit",function(event){
					
					if ($(event.target).is('.unit')) {
						var selIdx=$(this).prop('selectedIndex');
						$('.meterno option:eq('+selIdx+')').prop('selected',true).trigger('change');
						$('.zone_ option:eq('+selIdx+')').prop('selected',true).trigger('change');
						$('.clcode_ option:eq('+selIdx+')').prop('selected',true).trigger('change');
					}
					if($(event.currentTarget).is('.unit')){
						var selIdx=$(this).prop('selectedIndex');
						$('.zone_ option:eq('+selIdx+')').prop('selected',true).trigger('change');
/*						$('.clcode_ option:eq('+selIdx+')').prop('selected',true).trigger('change');
*/					}
				});

				$(document).on("change",".meterno",function(event){
					if ($(event.target).is('.meterno')) {
						var selIdx=$(this).prop('selectedIndex');
						$('.unit option:eq('+selIdx+')').prop('selected',true).trigger('change');
					}
				});

				$(document).on("change",".zone_",function(event){
						var zv=$(this).val();
						$('.zone').val(zv).trigger('change');
				});
				$(document).on("change",".clcode_",function(event){
						var cv=$(this).val();
						//$(this)
						var selIdx=$('.clcode').val(cv).prop('selectedIndex');//.trigger('change');
						$('.clcode option:eq('+selIdx+')').prop('selected',true).trigger('change');
					
						//alert(selIdx);
				});



			    function getUnits(v_clode){
					var v_url= "{!!url('get_customer_units')!!}";
					$.ajax({
						url:v_url,
						type:'GET',
						dataType:'html',
						data:'clcode='+v_clode+'&zone=ALL',
						
						complete:function(v_data){
							//alert(v_data.responseText);
							var uts=JSON.parse(v_data.responseText);

							var unit_opts="<option value='ALL' selected='selected'>--ALL--</option>";
							var meter_opts="<option value='ALL' selected='selected'>--ALL--</option>";
							var zone_opts="<option value='ALL' selected='selected'>--ALL--</option>";
							for (i in uts){
								
								unit_opts+='<option value="'+uts[i].ucode+'">'+uts[i].ucode+'</option>';
								meter_opts+='<option value="'+uts[i].meterno+'">'+uts[i].meterno+'</option>';
								zone_opts+='<option value="'+uts[i].zone+'">'+uts[i].zone+'</option>';
							}
                            
							$('#unit,#meterno,#zone_').html('');
							$('#unit').html(unit_opts);
							$('#meterno').html(meter_opts);
							$('#zone_').html(zone_opts);
						}
					});
			    }

			
			$('form.form-print-stat').on('submit', function(submission) {
		        submission.preventDefault();

		        if($('.clname').val()==-1){swal('Invalid Client Info','Select Client Details & Try Again','error');return;}
		        if($('.clcode').val()==-1){swal('Invalid Client Info','Select Client Details & Try Again','error');$('.clcode').focus();return;}
		        if($('.zone').val()=='ALL'){swal('Invalid Zone','Select Zone & Try Again','error');$('.zone').focus();return;}

		        var startDate=new Date($('#dfrom').val());
                var endDate=new Date($('#dto').val());
                if(startDate>endDate){swal('Invalid Date Range','Start Date Cant be Greater than End Date','error');return;}

		        if(!confirm('Print Client Statement for '+$('#clname').val()+'?')){
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