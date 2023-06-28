@extends('stocksmaster') 
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class="box  box-primary">
					<div class="box-header">
						<h3 class="text-primary text-center"><strong>Returns List</strong></h3>
						<span class="ui-alert col-md-12"></span>
						<a href="{{route('returns.create')}}" class="btn btn-success"><i class="fa fa-folder"></i> New Stock Return</a>
						<a href="{{url('xreturns')}}" class="btn btn-danger"><i class="fa fa-folder"></i> New Stock Return {WITHOUT INVOICE}</a>
					</div>
					<form class="form-returns">
						<div class="box-body">
							<table class="table table-striped" style="width:100%;" id="client-returns">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>Ref</th>
										<th>Trandate</th>
										<th>Code</th>
										<th>Client Name</th>
										<th class="text-right">Amount</th>
										<th class="text-right">Tax</th>
										<th>Status</th>
										<th>remarks</th>
										<th>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;?>
									@foreach ($returns as $return)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$return->refno}}</td>
										<td>{{$return->trandate}}</td>
										<td>{{$return->clcode}}</td>
										<td>{{Stockspro::getClientName($return->clcode)}}</td>
										<td class="text-right text-primary"><span class="label label-primary"> {{$return->amount}}</span></td>
										<td class="text-right text-primary"><span class="label label-warning"> {{$return->vat}}</span></td>
										<td>@if($return->status==1)<span class="label label-primary"> Posted</span> @else <span class="label label-danger">Unposted</span> @endif</td>
										<td>{{$return->remarks}}</td>
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Action <span class="caret"></span>
												</button>
												<ul class="dropdown-menu dropdown-menu-left">
													@if($return->status==0)
														@if(Auth::user()->role->first()->edt_creditnotes)
															<li><a id="editLink" class="dropdown-item text-default" href="{{route('returns.edit',$return->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
															<li role="separator" class="divider"></li>
														@endif
														@if(Auth::user()->role->first()->del_creditnotes)
															<li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{route('returns.destroy',$return->id)}}" idd="{{$return->id}}" class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
															<li role="separator" class="divider"></li>
														@endif
													@endif
													@if($return->status>0)
														@if(Auth::user()->role->first()->rev_creditnotes)
															<li><a id="reverseLink" class="dropdown-item text-default" href="{{url('post-return')}}" idd="{{$return->id}}"><i class="fa fa-reply-all" aria-hidden="true"></i> Reverse</a></li>
														@endif	
													@else
														@if(Auth::user()->role->first()->approve_creditnotes)
															<li><a id="approveLink" class="dropdown-item text-default" href="{{url('post-return')}}" idd="{{$return->id}}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Post</a></li>
															<li role="separator" class="divider"></li>
														@endif
													@endif
													@if(Auth::user()->role->first()->print_creditnotes)
														<li><a id="viewLink"  class="dropdown-item text-default" href="{{route('returns.show',$return->id)}}"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
													@endif
												</ul>
											</div>
										</td>								
									</tr>	
									@endforeach
								</tbody>
							</table>				        	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('page-script')
<script type="text/javascript">
	$(function(){
		$(document).on('click','.revlink',function(e,id){
			e.preventDefault();
			if(!confirm('Reverse Return ?')){
				return;
			} 
			var v_id = $(this).attr("id").split("_")[1];
			var urli= "{!!url('reversereturn')!!}";
			var v_data="id="+v_id;
			$.ajax({
				type: "get",
				url: urli,
				datatype:'html',
				data:v_data,
				complete:function(xhr){
					swal('Reversed',xhr.responseText,'info'); 
					location.reload();
				}
			});
		});

		$('#client-returns').DataTable({"pageLength": 50});
		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}

		    // Reset errors when opening modal.
		    $('.form-returns').click(function() {
		    	resetModalFormErrors();
		    });


		    $(document).on('click','a#approveLink',function(e){
		    	e.preventDefault();
		    	var v_id=$(this).attr('idd');;
		    	var uri=$(this).attr('href');
				
			// 	bootbox.dialog({message:'Approval Notice has been sent to the admin.\nPlse be Patient while its being Reviewed'}); 
			//    return;

		    	bootbox.confirm({ 
		    		size: "small",
		    		message: "Post Selectd Return Record {"+v_id+"} ?", 
		    		callback: function(result){
		    			/* result is a boolean; true = OK, false = Cancel*/
		    			if(result){
		    				var alertbox="";
		    				$.ajax({
		    					url:uri,
		    					method:'get',
		    					data:"id="+v_id+"&post=1",
		    					cache:false,
		    					beforeSend:function(){
		    						alertbox=bootbox.dialog({message:"<i class='fa fa-spinner fa-spin'></i> Please wait..."});
		    					},
		    					complete:function(xhr){
		    						alertbox.modal('hide');
		    						var resp=$.parseJSON(xhr.responseText);
								//console.log(resp);
								if(resp.flag>0){
									swal("",resp.msg,"success");
								}else{
									swal("",resp.msg,"warning");
								}
								location.reload();
							},

						});

		    			}else{
		    				alert('You Shied !! ;)');
		    			}
		    		}
		    	});
		    });
		    $(document).on('click','a#reverseLink',function(e){
		    	e.preventDefault();
		    	var v_id=$(this).attr('idd');;
		    	var uri=$(this).attr('href');

		    	bootbox.confirm({ 
		    		size: "small",
		    		message: "Reverse Selectd Return Record {"+v_id+"} ?", 
		    		callback: function(result){
		    			/* result is a boolean; true = OK, false = Cancel*/
		    			if(result){
		    				$.ajax({
		    					url:uri,
		    					method:'get',
		    					data:"id="+v_id+"&post=0",
		    					cache:false,
		    					complete:function(xhr){
		    						var resp=$.parseJSON(xhr.responseText);
									//console.log(resp);
									if(resp.flag>0){
										swal("",resp.msg,"success");
									}else{
										swal("",resp.msg,"warning");
									}
									location.reload();
								}
							});

		    			}else{
		    				alert('You Shied !! ;)');
		    			}
		    		}
		    	});

		    });

		    $(document).on('click',"a#viewLink",function(e){
		    	e.preventDefault();
		    	var urli=$(this).attr('href');
		    	$.get(urli,"",function(data){
		    		bootbox.dialog({
		    			title:'',
		    			message:data,
		    			size:'large',
		    			backdrop:true,
		    			onEscape:function(){location.reload();},
		    		}).find("div.modal-dialog").addClass("largeWidth");
		    	});
		    });
		    

		    $(document).on('click','a#deleteLink',function(e){
		    	e.preventDefault();
		    	var v_id=$(this).attr('idd');;
		    	var uri=$(this).attr('href');
		    	bootbox.confirm({ 
		    		size: "small",
		    		message: "Delete Creditnote Record {"+v_id+"} ?", 
		    		callback: function(result){
		    			/* result is a boolean; true = OK, false = Cancel*/
		    			if(result){
		    				var token = $('input[name="_token"]').val();
		    				$.ajax({
		    					url:uri,
		    					method:'POST',
		    					data:{
		    						"_token": token,
		    						"_method": 'DELETE',
		    					},
		    					cache:false,
		    					complete:function(xhr){
		    						swal("",xhr.responseText,"success");
		    						location.reload();
		    					}
		    				});
		    			}else{
		    				alert('You Shied !! ;)');
		    			}
		    		}
		    	});

		    });


		});
	</script>
	@stop