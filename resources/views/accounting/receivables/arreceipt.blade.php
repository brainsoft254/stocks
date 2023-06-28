@extends('utilmaster')

@section('util-content')

	<div class="row">

		<div class="col-md-12">

		     <div class="row">

		        <div class="col-md-9">

				     <div class="box box-solid box-primary">

				        <div class="box-header">

				          <h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> New Debtor Invoice</strong></h3>

				          <span class="ui-alert col-md-12"></span>

				        </div>

				        <div class="box-body">

							<div class="tab-content">

			        			<div class="tab-pane active" id="tab_master">

			        			<br/>

						        	<form class="form-arreceipt" action="{{route('arreceipt.store')}}" method="POST">

									{{csrf_field()}}

						   				<div class = "row">

							   				<div class = "col-md-12">	

							   					<div class="col-md-4">

								   					<div class="form-group {{ $errors->has('rdate') ? ' has-error' : '' }}">

								   						<div class="input-group">

								   						    <span class="input-group-addon info">Date</span>

								   							<input type="text" name="rdate" id="rdate" class="form-control" value ="" placeholder="Select Date by clicking here" />

								   						</div>

								   					</div>	

							   					</div>

							   					<div class="col-md-4">

								   					<div class="form-group {{ $errors->has('rtype') ? ' has-error' : '' }}" id="status-group">

								   						<div class="input-group">

								   						    <span class="input-group-addon">Type?</span>

								   							<select class="form-control" name="rtype" id="rtype">

								   								<option value="0" selected ="selected">Receipt Invoice</option>

								   								<option value="1">Direct Receipting</option>

								   							</select>

								   						</div>

								   					</div>

							   					</div>

						   					</div>

						   				</div>

						   				<div class = "row">

						   					<div class = "col-md-12">

						   						<div class = "col-md-5"><!-- code -->

								   					<div class="form-group {{ $errors->has('clientcode') ? ' has-error' : '' }}" id="accountfc-group">

								   						<div class="input-group">

								   						    <span class="input-group-addon info">Client</i></span>

								   						    <select class="form-control" name ="clientcode" id ="clientcode">

								   								<option value="-1" selected="selected">--Select client code--</option>

																	@foreach($debtors as $debtor)

																		<option value="{{$debtor->code}}">{{$debtor->code}}</option>

																	@endforeach

								   						    </select>

								   						</div>

								   					</div>

						   						</div>

						   						<div class = "col-md-7"><!-- description -->

								   					<div class="form-group {{ $errors->has('clientname') ? ' has-error' : '' }}" id="clientname-group">

								   						<div class="input-group">

								   						    <span class="input-group-addon info">Name</i></span>

								   						    <select class="form-control" name ="clientname" id ="clientname">

								   								<option value="-1" selected="selected">--Select client Name--</option>

																	@foreach($debtors as $debtor)

																		<option value="{{$debtor->name}}">{{$debtor->name}}</option>

																	@endforeach

								   						    </select>

								   						</div>

								   					</div>

						   						</div>

						   					</div>

						   				</div>
						   				<div class ="row">
						   					<div class ="col-md-12">
						   						<div class ="col-md-4">
							   						<div class="input-group">
							   						    <span class="input-group-addon primary"><i class="fa fa-money"></i></span>
							   							<input type="text" name="amount" id="amount" class="form-control" value="" placeholder="KES" >
							   						</div>
						   						</div>
						   					</div>
						   				</div>
						   				<div class="row">
						   					<div class="col-md-12">
						   					</div>
						   				</div>
					   					<div class ="row">
					   						<div class ="col-md-12">
					   							<div class="col-md-12">
					   								<textarea type="text" name="rmks" id="rmks" class="form-control" value ="" placeholder="Enter some Remarks"></textarea>
					   							</div>
					   						</div>	
					   					</div>

						   			 	<div class="row"> 

						   			 	   <div class="col-md-12"> 

							   			 	   <div class="col-md-12"> 

							   			 	   <table class="table-arinvoice" id="arinvoice-ui" cellpadding="2">

							   			 	   		<thead>

							   			 	   			<tr>
							   			 	   				<td class="text-center"><span class="text-center">Invno</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Invdate</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Outstanding</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Paid</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Remarks</span></td>
							   			 	   				<td></td>
							   			 	   			</tr>
							   			 	   		</thead>
							   			 	   		<tbody class="ui-rct-details">
							   			 	   		</tbody>
						   			 	   		</table>

							   			 	   </div>
						   			 	   </div>

						   			 	</div>
						   			 	<div class ="row">
						   			 		<div class "col-md-12">
						   			 			<div class ="col-md-12">
							   			 			<div class="col-md-4">
							   			 			</div>
							   			 			<div class="col-md-8">
								   						<div class="input-group">
								   						    <span class="input-group-addon primary">Due</span>
								   							<input type="text" name="tdue" id="tdue" class="form-control" value="0.00" placeholder="KES" readonly>
								   						    <span class="input-group-addon primary">Paid</span>
								   							<input type="text" name="tpaid" id="tpaid" class="form-control" value="0.00" placeholder="KES" readonly >
								   						    <span class="input-group-addon primary">Balcf</span>
								   							<input type="text" name="balcf" id="balcf" class="form-control" value="0.00" placeholder="KES" readonly >
								   						</div>
							   			 			</div>
						   			 			</div>
						   			 		</div>
						   			 	</div>

						   			 	<br/>

						   				<div class="row">

						   					<div class="col-md-12">

							   					<div class="col-md-6">

							   						<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save Receipt</button>

							   					</div>

						   					</div>

						   				</div>

				   					</form>



			        			</div>

			        		</div>

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

			

			function setDate(){

				var now = new Date();

				var day = ("0" + now.getDate()).slice(-2);

				var month = ("0" + (now.getMonth() + 1)).slice(-2);

				var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

				$('#rdate').val(today);

			}

			setDate();
			initRows();


			$(function () {

				$('#rdate').datepicker({format:'yyyy-mm-dd'});

			});



			$(document).on("change","#clientcode",function(event){

				if ($(event.target).is('#clientcode')) {

					var selIdx=$(this).prop('selectedIndex');

					$('#clientname option:eq('+selIdx+')').prop('selected',true).trigger('change');
					getInvoices();	
				}

			});



			$(document).on("change","#clientname",function(event){

				if ($(event.target).is('#clientname')) {

					var selIdx=$(this).prop('selectedIndex');

					$('#clientcode option:eq('+selIdx+')').prop('selected',true).trigger('change');
					getInvoices();	
				}

			});


			$(document).on("blur",".paid",function(){

				var rid=$(this).attr('id').split('_')[1];

				var t_amount=parseInt($('#amount_'+rid).val());

				$("#total_"+rid).val(t_amount);

			});

		    function getInvoices(){
		    	if($('#clientcode').val()!='-1'){
		    	var urli='/get_outstanding_arbills/'+$('#clientcode').val();
					$.ajax({
						url:urli,
						type:'GET',
						dataType:'html',
						complete:function(xhr){
							var uts=JSON.parse(xhr.responseText);

							if(uts.length>0){
								var str="";
								var y=1;
								for (i in uts){
								str+='<tr>'+
									'<td><input type="text" name="invno_" class="form-control rct-details"  id="invno_"  value="'+uts[i].invno+'" readonly></td>'+
									'<td><input type="text" name="invdate" class="form-control rct-details"  id="invdate_"  value="'+uts[i].invdate+'" readonly></td>'+
									'<td><input type="text" name="due_" class="form-control rct-details text-right"  id="due_"  value="'+uts[i].due+'" readonly></td>'+
									'<td><input type="text" name="paid_" class="form-control rct-details text-right"  id="paid_"  value="'+uts[i].due+'"></td>'+
									'<td><input type="text" name="remarks_" class="form-control rct-details text-center"  id="remarks_"  value="'+uts[i].remarks+'" readonly></td>'+
								'</tr>'
								y+=1;
								}
							$('.ui-rct-details').html(str);
/*							getTotal();
							$('#amount_in').val('');
							$('#balcf').val('0.00');
							$('#towords').html('');

*/							}else{
								initRows();
								//getTotal();
							}
						}
					});
				}else{
					swal('Select Client Code','Client Code Missing !','error');
				}
		    }

    function initRows(){
    	var str_='<tr>'+
			'<td><input type="text" name="invno" class="form-control"  id="invno_"  value="" readonly></td>'+
			'<td><input type="text" name="invdate" class="form-control"  id="invdate_"  value="" readonly></td>'+
			'<td><input type="text" name="outstanding" class="form-control"  id="outstanding_"  value="" readonly></td>'+
			'<td><input type="text" name="paid" class="form-control"  id="paid_"  value="" readonly></td>'+
			'<td><input type="text" name="remarks" class="form-control"  id="remarks_"  value="" readonly></td>'+
		'</tr>';	
		$('.ui-rct-details').html(str_);
    }


		    function resetModalFormErrors() {

		        $('.form-group').removeClass('has-error');

		        $('.form-group').find('.help-block').remove();

		        $('.ui-alert').html('');

		    }



		    $('form.form-arreceipt').on('submit', function(submission) {

		        

		        submission.preventDefault();

		        	

		        var blank_cnts=0;



		        if($("#rmks").val()==""){

					blank_cnts+=1;

					swal('Remarks','Put some Remarks','error');

					return;

		        }

		        if($("#duedate").val()==""){

					blank_cnts+=1;

					swal('Duedate','Due Date is a must','error');

					return;

		        }



		        if($("#invdate").val()==""){

					blank_cnts+=1;

					swal('Invoice date','Date is a must','error');

					return;

		        }



				$('.code').each(function(){

					

					if(this.value==""){

						$(this).addClass('blank-error');

						var _id=$(this).attr('id').split('_')[1];

						blank_cnts+=1;

					}

					

				});



				$('.amount').each(function(){

					

					if(this.value==""){

						$(this).addClass('blank-error');

						var _id=$(this).attr('id').split('_')[1];

						blank_cnts+=1;

					}

					

				});



				$('.vat').each(function(){

					

					if(this.value==""){

						$(this).addClass('blank-error');

						var _id=$(this).attr('id').split('_')[1];

						blank_cnts+=1;

					}

					

				});



				if(blank_cnts>0){

					swal('Blank Entry','Remove blank record and try again','error');

					return;

				}



				var v_tamount=(isNaN(parseFloat($('#tamount').val().replace(/\,/g,'')))) ? 0  : parseFloat($('#tamount').val().replace(/\,/g,''));

				var v_tvat=(isNaN(parseFloat($('#tvat').val().replace(/\,/g,'')))) ? 0 : parseFloat($('#tvat').val().replace(/\,/g,''));



				if(v_tamount==0){

					$('.ui-alert').html('Enter some amount'); 

					swal('No Amount','Enter some amount to continue','error');

					$('.tamount-group').addClass('has-error');

					return;

				}





				

				if(blank_cnts>0){$('.ui-alert').html(blank_str+"You have some blank record.\r\ncheck both account code,amount and comments").show();return;}



		        var form   = $(this),

		            url    = form.attr('action'),

		            submit = form.find('[type=submit]');





		            var data        = form.serialize(),

		               contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';

		          



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

		                $('form.form-arreceipt')[0].reset();

		                $(".ui-alert").html("<p class='text-success col-md-12'><i class='fa fa-frown fa-fw'></i>  "+response.responseText+"</p>").fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );

		            	// Reset submit.

		                if (submit.is('button')) {

		                    submit.html(submitOriginal);

		                } else if (submit.is('input')) {

		                    submit.val(submitOriginal);

		                }

		            }

		                //location.reload();

		                

		            }

		        });

		    });



		    // Reset errors when opening modal.

		    $('.form-arreceipt').click(function() {

		        resetModalFormErrors();

		    });

		});

	</script>

@stop