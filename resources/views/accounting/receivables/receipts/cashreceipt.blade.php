@extends('stocksmaster') 
@section('content')  
@section('css')

<style type="text/css">
    .overflow-visible{
        overflow: visible !important;
    }
    .select2-container--default {
      display: block;
      width: auto !important;
    }
    
    tbody.ui-details {
      /* width: auto; */
      border-bottom: 1px solid #ccc;
      display: table-cell;
      /* border-right: 1px dotted #ccc; */
    }
</style>
@endsection
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="fa fa-magic "></i> <strong> New CASH Receipt </strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-receipt" action="{{url('save-pos-receipt')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-3">
							<div class="form-group {{ $errors->has('rno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success"><i class="fa fa-key" aria-hidden="true"></i> Rno</span>
									<input type="text" name="rno" class="form-control" value=""  placeholder="SYSGEN" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('trandate') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa-calendar" aria-hidden="true"></i> Date</span>
									<input type="text" name="trandate" class="form-control trandate" id="trandate" placeholder="Trandate" readonly="">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning">Location</span>
									<select class="form-control" name="location" id="location">
										<option value="-1" selected="selected">--Select Location--</option>
										@foreach($locations as $loc)
										<option value="{{$loc->code}}" {{$loc->code==Auth::user()->station?"selected":''}}>{{$loc->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group {{ $errors->has('customer') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon acct-label info"><i class="fa fa-user"></i> Customer</span>
                                    <input type="text" class="form-control customer" name ="customer" id ="customer" value ="walkIn" placeholder="Walk In customer">
								</div>
							</div>	
						</div>	
						<div class="col-md-5">
							
							<div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon success"><i class="fa fa-bandcamp" aria-hidden="true"></i> Account</span>
									<select class="form-control" name="account" id="account">
										<option value="-1" selected="selected">--Select Account--</option>
										@foreach($accounts as $acct)
										<option value="{{$acct->code}}">{{$acct->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
                        <div class="col-md-4">
							<div class="form-group">
								<div class="input-group {{ $errors->has('chequeno') ? ' has-error' : '' }}">
									<span class="input-group-addon info">Cheque No</span>
									<input type="text" id="chequeno" name="chequeno" class="form-control" value="" placeholder="Enter Cheque no">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('refno') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon info">Other Ref</span>
									<input type="text" name="refno"  id="refno" class="col-md-6 form-control" value="" placeholder="Enter Refno" >
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('bankdate') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary"><i class="fa fa-calendar" aria-hidden="true"></i> Value Date</span>
									<input type="text" name="bankdate" class="form-control bankdate" id="bankdate" placeholder="Value Date" readonly="">
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
								<div class="input-group">
                                    <span class="input-group-addon danger"><strong>Amount</strong></span>
									<input type="text" style="font-weight:bold;color:red;" class="form-control amount" name="amount" id="amount" value ="" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-md-8" style="display: none;">
							<div class="form-group {{ $errors->has('amtinwords') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Amt in Words</span>
									<input type="text" class="form-control" name="amtinwords" id="amtinwords" readonly>
								</div>
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-md-8">
							<div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon primary">Remarks</span>
									<textarea class="form-control" name="remarks" id="remarks" rows=1 style="resize: none;"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class = "col-md-12">
							<table class="table-items" style="width:100%;" >
								<thead class="bg-primary text-primary">
									<tr>
										<th>#</th>
										<th>Stock Item</th>
										<th class="text-right">Price</th>
										<th class="text-right">Qty</th>
										<th class="text-right">Total</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody class="item-body">
									<tr class ="ui-details" id="tr_1">
										<td style="width: 5%;"><input class="form-control iid" type="text" name="iid[]" id="iid_1" value="1" readonly></td>
										<td style="width: auto;"><select class="form-control scode" name="scode[]" id="scode_1">
											<option value="-1" selected="selected">--Item code--</option>
											@foreach($items as $itemx)
											<option value="{{$itemx->code}}">{{$itemx->code}}-{{$itemx->description}}</option>
											@endforeach
											</select>
										</td>
										<td style="width: auto;"><select class="form-control  iamt" name="iamt[]" id="iamt_1" style="display: none;">
											<option value="-1" selected="selected">0</option>
											@foreach($items as $itemx)
											<option value="{{$itemx->sprice}}">{{$itemx->sprice}}</option>
											@endforeach
											</select>
											<input style ="text-align: right;" class="form-control sprice" type="text" name="sprice[]" id="sprice_1" value="0">
										</td>
										<td style="width: 5%;"><input type="text" style="text-align: center;" name="qty[]" class="form-control qty" id="qty_1" value ="1"></td>
										<td><input type="text" style="text-align: center;" name="total[]" class="form-control total" id="total_1" value ="1" readonly></td>
										<td style="padding:2px 4px;">
											<span class="btn btn-icon btn-danger glow  iclose_tr" id="iclose_1"><i class="fa fa-close fa-fw"></i></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<a href="#" class="btn btn-success pull-left " id="btnAddItems" ><i class="fa fa-cart-plus"></i> Add Row</a>
						</div>
						<div class="col-md-6">
							<div class="col-md-6 form-group {{ $errors->has('totalpaid') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon warning">Pieces</span>
									<input type="text" name="totalqty" class="totalqty form-control text-right" value="0.00" readonly="" >
								</div>
							</div>
							<div class="col-md-6  form-group {{ $errors->has('totalpaid') ? ' has-error' : '' }}">
								<div class="input-group">
									<span class="input-group-addon danger">Total Paid</span>
									<input type="text" name="totalpaid" class="totalpaid form-control text-right" value="0.00" readonly="" >
								</div>
							</div>
						
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> Save/Post</button>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
</div>
</div>
@stop
@section('page-script')
<script type="text/javascript">
	$(function(){
		$('#trandate').datepicker({format:'yyyy-mm-dd'}).datepicker("setDate", new Date());
		var dnow=new Date();
		var vday=dnow.getDate();
		var vmth=(dnow.getMonth()-1)+1;
		var vyr=dnow.getFullYear();
		var vfdate=vyr+'-'+vmth+'-'+1;
		$('[data-toggle="tooltip"]').tooltip();
		//console.log(Date.today().toString("yyyy-MM-dd"));
		$('#datefrom').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom",autoclose: true,}).datepicker("setDate", Date.today().add(-1).months());
		$('#dateto').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom",autoclose: true,}).datepicker("setDate", Date.today());
		$('#bankdate').datepicker({format:'yyyy-mm-dd',orientation:"auto bottom",autoclose: true,}).datepicker("setDate", Date.today());
		//$('.itemcode,.description').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});
		$('.scode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px'});
		$('.description').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'250px',dropdownParent: $('.invoice-body')});
		$('.vatable,.uom,.client').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'100%',dropdownParent: $('body')});
		
		// $('#amount').keypress(function(event) {
		// 	if (event.which < 46 || event.which >= 58 || event.which == 47) {
		// 		event.preventDefault();
		// 	}
		// 	if (event.which == 46 && $(this).val().indexOf('.') != -1) {
		// 		this.value = '';
		// 	}
		// // 	var x = numbersinwords(this.value);
        // // $('#amtinwords').val(x);
		// });
		
		function getColumnTotal()
		{
			var paidTotal=0,
			qtyTotal=0;
			//amtpaid=(isNaN($("#amount").val().replace(/\,/g,'') || 0)) ? 0 : ($("#amount").val().replace(/\,/g,'') || 0);
			$('input.total').each(function(){
				console.log($(this).val());
				var iid=$(this).attr('id').split('_')[1];
                var paid_value=(isNaN($(this).val().replace(/\,/g,'') || 0)) ? 0 : ($(this).val().replace(/\,/g,'') || 0);
                var qty_value=(isNaN($('#qty_'+iid).val().replace(/\,/g,'') || 0)) ? 0 : ($('#qty_'+iid).val().replace(/\,/g,'') || 0);
                //var amtin_value=(isNaN($('#amount').val().replace(/\,/g,'') || 0)) ? 0 : ($('#amount').val().replace(/\,/g,'') || 0);
                paidTotal+=parseFloat(paid_value);
                qtyTotal+=parseFloat(qty_value);
			});
			$('.totalqty').val(qtyTotal.toFixed(2));
			$('.totalpaid').val(paidTotal.toFixed(2));
			}
		
			// $('.scode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px',dropdownParent: $('.invoice-body')});
			
			$(document).on("change", ".scode", function(event) {
				if ($(event.target).is('.scode')) {
					var idx = $(this).attr('id').split('_')[1];
					var selIdx=$(this).prop('selectedIndex');
					$("#iamt_"+idx+" option:eq(" + selIdx + ")").prop('selected', true).change();
					$("#sprice_"+idx).val($("#iamt_"+idx).val());
					var qty_value=(isNaN($("#qty_"+idx).val().replace(/\,/g,'') || 0)) ? 0 : ($("#qty_"+idx).val().replace(/\,/g,'') || 0);
	                var price_value=(isNaN($('#sprice_'+idx).val().replace(/\,/g,'') || 0)) ? 0 : ($("#sprice_"+idx).val().replace(/\,/g,'') || 0);
					var total_value=parseFloat(qty_value)*parseFloat(price_value);
					$("#total_"+idx).val(total_value);
				}
				getColumnTotal();						
	 	   });
		   
		   $(document).on("change", ".qty", function(event) {
				if ($(event.target).is('.qty')) {
					var idx = $(this).attr('id').split('_')[1];
					var selIdx=$(this).prop('selectedIndex');
					// $("#iamt_"+idx+" option:eq(" + selIdx + ")").prop('selected', true).change();
					// $("#sprice_"+idx).val($("#iamt_"+idx).val());
					var qty_value=(isNaN($("#qty_"+idx).val().replace(/\,/g,'') || 0)) ? 0 : ($("#qty_"+idx).val().replace(/\,/g,'') || 0);
	                var price_value=(isNaN($('#sprice_'+idx).val().replace(/\,/g,'') || 0)) ? 0 : ($("#sprice_"+idx).val().replace(/\,/g,'') || 0);
					var total_value=parseFloat(qty_value)*parseFloat(price_value);
					$("#total_"+idx).val(total_value);
						
				}
				getColumnTotal();
	 	   });
		   
		   $(document).on("change", ".sprice", function(event) {
				if ($(event.target).is('.sprice')) {
					var idx = $(this).attr('id').split('_')[1];
					var selIdx=$(this).prop('selectedIndex');
					// $("#iamt_"+idx+" option:eq(" + selIdx + ")").prop('selected', true).change();
					// $("#sprice_"+idx).val($("#iamt_"+idx).val());
					var qty_value=(isNaN($("#qty_"+idx).val().replace(/\,/g,'') || 0)) ? 0 : ($("#qty_"+idx).val().replace(/\,/g,'') || 0);
	                var price_value=(isNaN($('#sprice_'+idx).val().replace(/\,/g,'') || 0)) ? 0 : ($("#sprice_"+idx).val().replace(/\,/g,'') || 0);
					var total_value=parseFloat(qty_value)*parseFloat(price_value);
					$("#total_"+idx).val(total_value);
				}
				getColumnTotal();
	 	   });
			
			function resetModalFormErrors() {
				$('.form-group').removeClass('has-error');
				$('.form-group').find('.help-block').remove();
				$('div.panel-footer').html('');
			//$('.invoice-body').html('');
		}
		$(document).on("click","#btnAddItems",function(event){
			var rows=$('.scode').length+1;
			var lastID=$('.scode:last').attr('id');
			if (lastID === undefined){lastID=rows;}else{
				lastID=$('.scode:last').attr('id').split('_')[1];
			}
			console.log(lastID);
			addRow(parseInt(lastID)+1);			
		});
		function addRow(vid) {
			var tblstr =
				'<tr class ="ui-details" id="tr_'+ vid +'">'+
					'<td style="width: 5%;"><input class="form-control iid" type="text" name="iid[]" id="iid_'+ vid +'" value="'+vid+'" readonly></td>'+
					'<td style="width: 140px!important;"><select class="form-control scode" name="scode[]" id="scode_'+ vid +'">'+
						'<option value="-1" selected="selected">--Item code--</option>'+
						'@foreach($items as $itemx)'+
						'<option value="{{$itemx->code}}">{{$itemx->code}}-{{$itemx->description}}</option>'+
						'@endforeach'+
						'</select>'+
					'</td>'+
					'<td><select class="form-control  iamt" name="iamt[]" id="iamt_'+ vid +'" style="display: none;">'+
						'<option value="-1" selected="selected">0</option>'+
						'@foreach($items as $itemx)'+
						'<option value="{{$itemx->sprice}}">{{$itemx->sprice}}</option>'+
						'@endforeach'+
						'</select>'+
						'<input style ="text-align: right;" class="form-control sprice" type="text" name="sprice[]" id="sprice_'+ vid +'" value="0">'+
					'</td>'+
					'<td style="width: 5%;"><input type="text" style="text-align: center;" name="qty[]" class="form-control qty" id="qty_'+ vid +'" value ="1"></td>'+
					'<td><input type="text" style="text-align: center;" name="total[]" class="form-control total" id="total_'+ vid +'" value ="1" readonly></td>'+
					'<td style="padding:2px 4px;">'+
						'<span class="btn btn-icon btn-danger glow  iclose_tr" id="iclose_'+vid+'"><i class="fa fa-close fa-fw"></i></span>'+
					'</td>'+
				'</tr>';
			$('.item-body').append(tblstr);
			$('.scode').select2({theme:'bootstrap',dropdownAutoWidth : true,width:'140px'});
		}
		
		$(document).on("click",".removeLink",function(){
			if(confirm('Remove Select Row?')){
				if($('.removeLink').length>1){
					var rid=$(this).attr('id').split('_')[1];
					removeRow(rid);
					getColumnTotal();
				}else{
					swal("",'Aleast one line Item Required !',"warning");
				}
			}
		});
        
        $(document).on("focus",'.paid',function(){
			if($(this).val()!=""){
				$(this).select();
			}
		});
        
        function removeRow(v_rid){
            $('.invoice-body #tr_'+v_rid).remove();
        }
        
            $('form.form-receipt').on('submit', function(submission) {
				submission.preventDefault();
				if($('#remarks').val()==""){
					swal('Remarks is required');
					$('#remarks').focus();
					return;
				}
				
				if($('#account').val()=="-1"){
					swal('Select valid Account');
					$('#account').focus();
					return;
				}
				swal("Save Receipt Details?", {
					buttons: {
						cancel: "Run away!",
						catch: {
							text: "Proceed!",	
							value: "catch",
						},
						default:false
					},
				})
				.then((value) => {
					switch (value) {
						case "defeat":
						return;
						break;
						case "catch":
						var wtax_in=0;
						var totalAmtIN=0;
						//var amnt_in=(isNaN($('.amount').val().replace(/\,/g,'') || 0)) ? 0 : ($('.amount').val().replace(/\,/g,'') || 0);
						var totalAllocated=(isNaN($('.totalpaid').val().replace(/\,/g,'') || 0)) ? 0 : ($('.totalpaid').val().replace(/\,/g,'') || 0);
						
/*						if(hasWtax()){
							wtax_in=getWtaxValue();
						}
						*/						
						// totalAmtIN=getTotalPaid();
						// console.log("TA="+parseFloat(totalAllocated)+" AMNT IN="+totalAmtIN);
						// if(parseFloat(totalAllocated)>parseFloat(totalAmtIN)){
						// 	swal("Error","Amount Allocated Greater than Amount Available\n\rCheck & Try Again","error");
						// 	return;
						// }
						
						$('#acct').prop('disabled', false);
						$('.ptype').prop('disabled',false);
						$('#lpo').prop('disabled', false);
					        // Set vars.  1
					        var form   = $(this),
					        url    = form.attr('action'),
					        submit = form.find('[type=submit]');
					        var data        = form.serialize(),
					        contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';
					        // Please wait.
					        if (submit.is('button')) {
					        	var submitOriginal = submit.html();
					        	submit.html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
					        	submit.prop('disabled',true);
					        } else if (submit.is('input')) {
					        	var submitOriginal = submit.val();
					        	submit.val('Please wait...');
					        	submit.prop('disabled',true);
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
					             	var err = $.parseJSON(response.responseText);
					             	$('div.panel-footer').html('');
					                // Iterate through errors object.
					                $.each(err.errors, function(field, message) {
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
					                   // var formGroup = $('[name='+field+']', form).closest('.form-group');
					                   // formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
					                   $('div.panel-footer').addClass('has-error').append('<p class="help-block">'+message+'</p>');
					               });
					                // Reset submit.
					                if (submit.is('button')) {
					                	submit.html(submitOriginal);
					                	submit.prop('disabled',false);
					                } else if (submit.is('input')) {
					                	submit.val(submitOriginal);
					                	submit.prop('disabled',false);
					                }
					            // If successful, reload.
					        } else {
					        	if(response.status==500){
					        		bootbox.dialog({message:response.responseText});
					        		//$('.ui-alert').html(response.responseText);
					                    //$('.ui-alert').html("<span class='text-warning'><i class='fa fa-frown fa-fw'></i> Something went Wrong</span>");                   
					                }else{  
					                	bootbox.dialog({message:response.responseText});
					                	//swal("",response.responseText,"success");
					                	$('form.form-receipt')[0].reset();
					                	$("invoice-body").html('');
					                // Reset submit.
					                if (submit.is('button')) {
					                	submit.html(submitOriginal);
					                	submit.prop('disabled',false);
					                } else if (submit.is('input')) {
					                	submit.val(submitOriginal);
					                	submit.prop('disabled',false);
					                }
					            }
					            location.reload();
					        }
					    });
					    break;
					    default:
					    swal("Got away safely!");
					}
				});
});
	    // Reset errors when opening modal.
	    $('.form-receipt').click(function() {
	    	resetModalFormErrors();
	    });
	});
</script>
@stop