
<div class="row" style=" z-index: 9999999;">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-default"><i class="glyphicon glyphicon-tower"></i> <strong> Attach Items to Client</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form-items" action="{{route('clitems.store')}}" method="POST">
					@csrf
					<div class="row">
						<div class = "col-md-4">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon primary">Client Code</span>
									<select class="form-control" name="clcode" id="clcode">
										<option value="-1" selected="selected">--Select Client Code --</option>
										@foreach($clients as $client)
										<option value = "{{$client->code}}">{{$client->code}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class = "col-md-8">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon primary">Name</span>
									<select class="form-control" name="clname" id="clname">
										<option value="-1" selected="selected">--Select Client Name --</option>
										@foreach($clients as $client)
										<option value = "{{$client->name}}">{{$client->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class = "col-md-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon success">Item Category</span>
									<select class="form-control" name="category" id="category">
										<option value="-1" selected="selected">--ALL--</option>
										@foreach($categories as $category)
										<option value = "{{$category->code}}">{{$category->description}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class = "col-md-4">
							<div class="form-group">
								<div class="input-group" style="display: none;">
									<span class="input-group-addon warning">Sprice</span>
									<select class="form-control" name="sprice" id="sprice">
										<option value="-1" selected="selected">--Select Price --</option>
										@foreach($items as $item)
										<option value = "{{$item->sprice}}">{{$item->sprice}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>

					<hr/>
					<div class="row">
						<div class="col-md-12">
							<table class="itable" style="border-collapse: collapse; width: 100%" colspacing=0>
								<thead class="bg-primary">
									<tr>
										<th>ItemCode</th>
										<th>Description</th>
										<th>Price</th>
										<!-- <th></th> -->
									</tr>
								</thead>
								<tbody id="tbody">
								</tbody>  
							</table>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-12">
							<a href="#" class="btn btn-success pull-left " id="btnAddItems"><i class="fa fa-cart-plus"></i> Add Selectd Item</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary pull-right" ><i class="fa fa-floppy-o"></i> Save/Update</button>
						</div>
					</div>
				</form>
			</div>
			<div class="panel-footer">
			</div>
		</div>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
	$(function(){

		$('#clcode,#clname,#category,.itemcode,.description').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});

		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}


		$(document).on("change","#clcode",function(event){
			if ($(event.target).is('#clcode')) {
				var selIdx=$(this).prop('selectedIndex');
				$('#clname option:eq('+selIdx+')').prop('selected',true).change();
			}
		});

		$(document).on("change","#clname",function(event){
			if ($(event.target).is('#clname')) {
				var selIdx=$(this).prop('selectedIndex');
				$('#clcode option:eq('+selIdx+')').prop('selected',true).change();
			}
		});

		$(document).on("change",".itemcode",function(event){
			if ($(event.target).is('.itemcode')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#description_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#sprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
			}
		});

		$(document).on("change",".description",function(event){
			if ($(event.target).is('.description')) {
				var iid=$(this).attr('id').split('_')[1];
				var selIdx=$(this).prop('selectedIndex');
				$('#itemcode_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
				$('#sprice_'+iid+' option:eq('+selIdx+')').prop('selected',true).change();
			}
		});

		$(document).on("change",".sprice",function(event){
			var iid=$(this).attr('id').split('_')[1];
			var selIdx=$(this).prop('selectedIndex');
			$('#price_'+iid).val($(this).val());
		});
		

		$(document).on("change","#category",function(event){
			loadCategoryItems(0);			
		});

		$(document).on("click","#btnAddItems",function(event){
			var rows=$('.itemcode').length+1;
			var lastID=$('.itemcode:last').attr('id');

			if (lastID === undefined){lastID=rows;}else{
				lastID=$('.itemcode:last').attr('id').split('_')[1];
			}

			attachItems(parseInt(lastID)+1);			
		});

		$(document).on("click",".removeLink",function(){
			
			if(confirm('Remove Select Row?')){
				if($('.removeLink').length>1){
					var rid=$(this).attr('id').split('_')[1];
					removeRow(rid);
				}else{
					alert('Aleast one line Item Required !');
				}
			}
		});

		function removeRow(v_rid){
			$('#tbody #tr_'+v_rid).remove();
		}



		function loadCategoryItems(rid){
			var optCode="<option value='-1'>--Select Item Code--</option>";
			var optDesc="<option value='-1'>--Select Item Desc--</option>";
			var optSprice="<option value='-1'>--Select Item Price--</option>";
			var items={!!$items!!};

			for(i in items){
				if($('#category').val()!=-1){
					if(items[i].category==$('#category').val()){
						optCode+="<option value='"+items[i].code+"'>"+items[i].code+"</option>";
						optDesc+="<option value='"+items[i].description+"'>"+items[i].description+"</option>";
						optSprice+="<option value='"+items[i].sprice+"'>"+items[i].sprice+"</option>";
					}
				}else{
					optCode+="<option value='"+items[i].code+"'>"+items[i].code+"</option>";
					optDesc+="<option value='"+items[i].description+"'>"+items[i].description+"</option>";
					optSprice+="<option value='"+items[i].sprice+"'>"+items[i].sprice+"</option>";

				}
			}

			$('#itemcode_'+rid).html('').append(optCode);
			$('#description_'+rid).html('').append(optDesc);
			$('#sprice_'+rid).html('').append(optSprice);

		}


		function attachItems(r_id){
			var items={!!$items!!};
			var irow="<tr id='tr_"+r_id+"'>"+
			"<td>"+
			"<select class='form-control-grid select2-selection-grid itemcode' name='itemcode[]' id='itemcode_"+r_id+"' style='border-radius:0px !important'>"+
			"</select>"+
			"</td>"+
			"<td>"+
			"<select class='form-control-grid select2-selection-grid description' name='description[]' id='description_"+r_id+"' style='border-radius:0px !important'>"+
			"</select>"+
			"<select class='form-control-grid select2-selection-grid sprice' name='sprice[]' id='sprice_"+r_id+"' style='display:none; border-radius:0px !important'>"+
			"</select>"+
			"</td>"+
			"<td><input type='text' id='price_"+r_id+"' name='price[]' class='form-control-grid'></td>"+
			"<td><a href='#' class='removeLink btn btn-danger btn-xs'  id='remove_"+r_id+"'><i class='fa fa-times'></i></span></td>"+
			"</tr>";

			$('#tbody').append(irow);
			loadCategoryItems(r_id);
		}


		$('form.form-items').on('submit', function(submission) {

			submission.preventDefault();

			swal("Save Item Details?", {
				buttons: {
					cancel: "Run away!",
					catch: {
						text: "Proceed!",
						value: "catch",
					},
					default:false
				},
				icon:"warning",
			})
			.then((value) => {
				switch (value) {

					case "defeat":
					return;
					break;

					case "catch":
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
					             	$('div.panel-footer').addClass('has-error').html('');
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
					                  
					                    //var formGroup = $('[class='+field+']', form).closest('.form-group');
					                  //  formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
					                    //$('.'+field).css('border','solid 1px red');

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
					        		$('.ui-alert').html(response.responseText);
					                    //$('.ui-alert').html("<span class='text-warning'><i class='fa fa-frown fa-fw'></i> Something went Wrong</span>");                   
					                }else{  
					                	//bootbox.dialog({message:response.responseText});
					                	swal("",response.responseText,"success");
					                	$('form.form-items')[0].reset();
					                // Reset submit.
					                if (submit.is('button')) {
					                	submit.html(submitOriginal);
					                	submit.prop('disabled',false);
					                } else if (submit.is('input')) {
					                	submit.val(submitOriginal);
					                	submit.prop('disabled',false);
					                }
					            }
					                //location.reload();
					                
					            }
					        });

					    break;

					    default:
					    swal("Shied!","Got away safely!","info");
					}
				});
});

	    // Reset errors when opening modal.
	    $('.form-items').click(function() {
	    	resetModalFormErrors();
	    });



	});
</script>
