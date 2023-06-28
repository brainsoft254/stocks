@extends('stocksmaster') 
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class="box  box-primary">
					<div class="box-header">
						<h3 class="text-primary text-center"><strong>Credit Note  List</strong></h3>
						<span class="ui-alert col-md-12"></span>
						<a href="{{route('creditnotes.create')}}" class="btn btn-success"><i class="fa fa-folder"></i> New Credit Note</a>
					</div>
					<form class="form-creditnotes">
						<div class="box-body">
							<table class="table table-striped" style="width:100%;" id="zones-credits">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>Ref</th>
										<th>Trandate</th>
										<th>Code</th>
										<th>Client Name</th>
										<th class="text-right">Amount</th>
										<th>Status</th>
										<th>remarks</th>
										<th>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;?>
									@foreach ($creditnotes as $creditnote)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$creditnote->refno}}</td>
										<td>{{$creditnote->trandate}}</td>
										<td>{{$creditnote->clcode}}</td>
										<td>{{Stockspro::getClientName($creditnote->clcode)}}</td>
										<td class="text-right text-primary"><span class="label label-primary"> {{$creditnote->amount}}</span></td>
										<td>@if($creditnote->status==1)<span class="label label-primary"> Posted</span> @else <span class="label label-danger">Unposted</span> @endif</td>
										<td>{{$creditnote->remarks}}</td>
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Action <span class="caret"></span>
												</button>
												<ul class="dropdown-menu dropdown-menu-left">
													@if($creditnote->status==0)
													<li><a id="editLink" class="dropdown-item text-default" href="{{route('creditnotes.edit',$creditnote->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
													<li role="separator" class="divider"></li>
														@if(Auth::user()->role->first()->del_creditnotes)
															<li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{route('creditnotes.destroy',$creditnote->id)}}" idd="{{$creditnote->id}}" class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
															<li role="separator" class="divider"></li>
														@endif
													@endif
													@if($creditnote->status>0)
													
														@if(Auth::user()->role->first()->rev_creditnotes)
															<li><a id="reverseLink" class="dropdown-item text-default" href="{{url('post-creditnote')}}" idd="{{$creditnote->id}}"><i class="fa fa-reply-all" aria-hidden="true"></i> Reverse</a></li>
														@endif
													@else
														@if(Auth::user()->role->first()->approve_creditnotes)
															<li><a id="approveLink" class="dropdown-item text-default" href="{{url('post-creditnote')}}" idd="{{$creditnote->id}}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Post</a></li>
															<li role="separator" class="divider"></li>
														@endif
													@endif
													@if(Auth::user()->role->first()->print_creditnotes)
														<li><a id="viewLink"  class="dropdown-item text-default" href="{{route('creditnotes.show',$creditnote->id)}}"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
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
			if(!confirm('Reverse creditnote ?')){
				return;
			} 
			var v_id = $(this).attr("id").split("_")[1];
			var urli= "{!!url('reversecreditnote')!!}";
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

		$('#zones-credits').DataTable({"pageLength": 50});
		function resetModalFormErrors() {
			$('.form-group').removeClass('has-error');
			$('.form-group').find('.help-block').remove();
			$('.ui-alert').html('');
		}

		    // Reset errors when opening modal.
		    $('.form-creditnotes').click(function() {
		    	resetModalFormErrors();
		    });


		    $(document).on('click','a#approveLink',function(e){
		    	e.preventDefault();
		    	var v_id=$(this).attr('idd');;
		    	var uri=$(this).attr('href');
            //    bootbox.dialog({message:'Approval Notice has been sent to the admin.\nPlse be Patient while its being Reviewed'}); 
			//    return;
		    	bootbox.confirm({ 
		    		size: "small",
		    		message: "Post Selectd Creditnote Record {"+v_id+"} ?", 
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
		    		message: "Reverse Selectd Creditnote Record {"+v_id+"} ?", 
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