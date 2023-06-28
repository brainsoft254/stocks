@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-8">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> New Banking</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				        </div>
				        <div class="box-body">
							<div class="tab-content">
			        			<div class="tab-pane active" id="tab_master">
			        			<br/>
						        	<form class="form-banking" action="{{url('addbanking')}}" method="GET">
									{{csrf_field()}}
					   					<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-7">
								   					<div class="form-group {{ $errors->has('ref') ? ' has-error' : '' }}">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Ref</span>
								   							<input type="text" name="ref" class="form-control" placeholder="Auto" readonly/>
								   						</div>
								   					</div>
							   					</div>
							   					<div class="col-md-5">
								   					<div class="form-group {{ $errors->has('chequeno') ? ' has-error' : '' }}" id="status-group">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Cheque No</span>
								   						    <input class="text" name ="chequeno" id="chequeno" />
								   						</div>
								   					</div>
							   					</div>
						   					</div>
						   				</div>
					   					<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-7">
								   					<div class="form-group {{ $errors->has('accountfc') ? ' has-error' : '' }}" id="accountfc-group">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Account From</i></span>
								   						    <select class="form-control" name ="accountfc" id ="accountfc">
								   								<option value="-1" selected="selected">--Select account Type--</option>
																	@foreach($accounts as $account)
																		<option value="{{$account->code}}">{{$account->code}}</option>
																	@endforeach
								   						    </select>
								   						</div>
								   					</div>
							   					</div>
							   					<div class="col-md-5">
								   					<div class="form-group {{ $errors->has('accountfd') ? ' has-error' : '' }}" id="accountfd-group">
								   						<div class="input-group">
								   						    <span class="input-group-addon info"></span>
								   						    <select class="form-control" name ="accountfd" id ="accountfd">
								   								<option value="-1" selected="selected">--Select account Description--</option>
																	@foreach($accounts as $account)
																		<option value="{{$account->description}}">{{$account->description}}</option>
																	@endforeach
								   						    </select>
								   						</div>
								   					</div>
							   					</div>
						   					</div>
						   				</div>
						   				<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-7">
								   					<div class="form-group {{ $errors->has('accounttc') ? ' has-error' : '' }}" id="accounttc-group">
								   						<div class="input-group">
								   						    <span class="input-group-addon info">Account To</i></span>
								   						    <select class="form-control" name ="accounttc" id ="accounttc">
								   								<option value="-1" selected="selected">--Select account To--</option>
																	@foreach($accounts as $account)
																		<option value="{{$account->code}}">{{$account->code}}</option>
																	@endforeach
								   						    </select>
								   						</div>
								   					</div>
							   					</div>
							   					<div class="col-md-5">
								   					<div class="form-group {{ $errors->has('accounttd') ? ' has-error' : '' }}" id="accounttd-group">
								   						<div class="input-group">
								   						    <span class="input-group-addon info"></span>
								   						    <select class="form-control" name ="accounttd" id ="accounttd">
								   								<option value="-1" selected="selected">--Select account Description--</option>
																	@foreach($accounts as $account)
																		<option value="{{$account->description}}">{{$account->description}}</option>
																	@endforeach
								   						    </select>
								   						</div>
								   					</div>
							   					</div>
						   					</div>
					   					</div>
					   					<div class ="row">
					   						<div class ="col-md-12">
					   							<div class="col-md-12">
								   					<div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}" id="amount-group">
						   								<div class ="input-group">
						   									<span class="input-group-addon info">Amount</span>
						   									<input type ="text" name ="amount" id ="amount" value="" placeholder="KES"/>
						   								</div>
					   								</div>
					   							</div>
					   						</div>	
					   					</div>
					   					<div class ="row">
					   						<div class="col-md-12">
						   						<div class="col-md-12">
												   <input type="text" name="towords"  id="towords" class="text-left form-control" placeholder="" readonly/>
												</div>
											</div>
					   					</div>
					   					<hr/>
					   					<div class ="row">
					   						<div class ="col-md-12">
					   							<div class="col-md-12">
					   								<textarea type="text" name="remarks" id="remarks" class="form-control" placeholder="Enter some Remarks"></textarea>
					   							</div>
					   						</div>	
					   					</div>
					   					<hr/>
						   				<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-6">
							   						<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save Banking</button>
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
			alert('script');
			//$('#accountfc,#accountfd,#accounttc,#accounttd').select2();

			$(document).on("change","#accountfc",function(event){
			alert('accountfc');
				 if ($(event.target).is('#accountfc')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#accountfd option:eq('+selIdx+')').prop('selected',true).change();
				}
			});

			$(document).on("change","#accountfd",function(event){
				if ($(event.target).is('#accountfd')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#accountfc option:eq('+selIdx+')').prop('selected',true).trigger('change');
				}
			});

			$(document).on("change","#accounttc",function(event){

				 if ($(event.target).is('#accounttc')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#accounttd option:eq('+selIdx+')').prop('selected',true).change();
				}
			});

			$(document).on("change","#accounttd",function(event){
				if ($(event.target).is('#accounttd')) {
					var selIdx=$(this).prop('selectedIndex');
					$('#accounttc option:eq('+selIdx+')').prop('selected',true).trigger('change');
				}
			});

			$(document).on("input", "#amount", function() {
			    this.value = this.value.replace(/[^\d\.\-]/g,'');
			});

			$(document).on("change","#amount",function(){
				var x=number2words($(this).val());
				/*$('#towords').html(x);*/
				$('#towords').val(x);
			});

		    function resetModalFormErrors() {
		        $('.form-group').removeClass('has-error');
		        $('.form-group').find('.help-block').remove();
		        $('.ui-alert').html('');
		    }

		    $('form.form-banking').on('submit', function(submission) {
		        
		        submission.preventDefault();
				if($('#accountfc').val()==$('#accounttc').val()){
						$('.ui-alert').html('You cannot transfer to the same account'); 
						$('#accounttc-group').addClass('has-error');	
						return;
					};
		        // Set vars.  1
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
		            type: "GET",
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
		              	alert(response.responseText);
		                $('form.form-banking')[0].reset();
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
		    $('.form-zone').click(function() {
		        resetModalFormErrors();
		    });


			function number2words(amount) {
			    var words = new Array();
			    words[0] = '';
			    words[1] = 'One';
			    words[2] = 'Two';
			    words[3] = 'Three';
			    words[4] = 'Four';
			    words[5] = 'Five';
			    words[6] = 'Six';
			    words[7] = 'Seven';
			    words[8] = 'Eight';
			    words[9] = 'Nine';
			    words[10] = 'Ten';
			    words[11] = 'Eleven';
			    words[12] = 'Twelve';
			    words[13] = 'Thirteen';
			    words[14] = 'Fourteen';
			    words[15] = 'Fifteen';
			    words[16] = 'Sixteen';
			    words[17] = 'Seventeen';
			    words[18] = 'Eighteen';
			    words[19] = 'Nineteen';
			    words[20] = 'Twenty';
			    words[30] = 'Thirty';
			    words[40] = 'Forty';
			    words[50] = 'Fifty';
			    words[60] = 'Sixty';
			    words[70] = 'Seventy';
			    words[80] = 'Eighty';
			    words[90] = 'Ninety';
			    amount = amount.toString();
			    var atemp = amount.split(".");
			    var number = atemp[0].split(",").join("");
			    var n_length = number.length;
			    var words_string = "";
			    if (n_length <= 9) {
			        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
			        var received_n_array = new Array();
			        for (var i = 0; i < n_length; i++) {
			            received_n_array[i] = number.substr(i, 1);
			        }
			        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
			            n_array[i] = received_n_array[j];
			        }
			        for (var i = 0, j = 1; i < 9; i++, j++) {
			            if (i == 0 || i == 2 || i == 4 || i == 7) {
			                if (n_array[i] == 1) {
			                    n_array[j] = 10 + parseInt(n_array[j]);
			                    n_array[i] = 0;
			                }
			            }
			        }
			        value = "";
			        for (var i = 0; i < 9; i++) {
			            if (i == 0 || i == 2 || i == 4 || i == 7) {
			                value = n_array[i] * 10;
			            } else {
			                value = n_array[i];
			            }
			            if (value != 0) {
			                words_string += words[value] + " ";
			            }
			            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
			                words_string += "Crores ";
			            }
			            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
			                words_string += "Hundred ";
			            }
			            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
			                words_string += "Thousand ";
			            }
			            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
			                words_string += "Hundred and ";
			            } else if (i == 6 && value != 0) {
			                words_string += "Hundred ";
			            }
			        }
			        words_string = words_string.split("  ").join(" ");
			    }
			    return words_string;
			}
		});
	</script>
@stop