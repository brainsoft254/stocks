@extends('stocksmaster') 
@section('content')  
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-primary text-center"><strong>Goods Received List</strong></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="{{route('grn.create')}}" id="btnNew" class="btn btn-primary"><i class="fa fa-magic" disabled></i> New Grn</a>
					</div>
				</div>
			</div>

			<div class="box-body">

				<div class="row">
					<div class="col-md-12">
						<table class="table  compact row-border hover" style="width:100%;" id="item-table">
							<thead class="text-success bg-primary">
								<tr>
									<th>#</th>
									<th>Refno</th>
									<th>Trandate</th>
									<th>Lpo</th>
									<th>Location</th>
									<th>Trantype</th>
									<th>Vat</th>
									<th>Total</th>
									<th>Qty</th>
									<th>Status</th>
									<th class="text-center">Options</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;?>
								@foreach ($grns as $grn)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$grn->refno}}</td>
									<td>{{$grn->trandate}}</td>
									<td>{{$grn->lpo}}</td>
									<td>{{Stockspro::getLocationName($grn->location)}}</td>
									
									<td>{{($grn->trantype)?'Opening Stock':'Purchases'}}</td>
									<td><span class="label label-primary label-as-badge">{{$grn->vat}}</span></td>
									<td><span class="label label-danger label-as-badge">{{$grn->total}}</span></td>
									<td><span class="label label-danger label-as-badge">{{$grn->qty}}</span></td>
									<td>@if($grn->status==0)<span class="label label-warning label-as-badge"> Unposted</span> @else <span class="label label-success label-as-badge">Posted</span> @endif</td>
									
									<td  class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a id="viewLink" href="{{route('grn.show',$grn->id)}}"><i class="fa fa-search" aria-hidden="true"></i> View</a></li>
												<li role="separator" class="divider"></li>
												@if($grn->status==1)

												<li><a id="reverseLink" href="{{url('reverse-grn')}}" idd="{{$grn->id}}" ><i class="fa fa-mail-reply-all" aria-hidden="true"></i> Reverse</a></li>
												<li role="separator" class="divider"></li>
												@endif
												@if($grn->status==0)
												<li><a id="editLink" href="{{route('grn.edit',$grn->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
												<li role="separator" class="divider"></li>

												<li><a id="postLink" href="{{url('post-grn')}}" idd="{{$grn->id}}"><i class="fa fa-magic" aria-hidden="true"></i> Post</a></li>
												<li role="separator" class="divider"></li>

												<li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{route('grn.destroy',$grn->id)}}" idd="{{$grn->id}}" class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
												@endif
											</ul>
										</div>
									</td>								
								</tr>	
								@endforeach
							</tbody>
						</table>				        	
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
		$("a#btnNew").prop('disabled',false);
		$('#item-table').DataTable({"pageLength": 25});

		$(document).on('click',"a#btnNew",function(e){
			e.preventDefault();
			var urli=$(this).attr('href');
			$.get(urli,"",function(data){
				bootbox.dialog({
					title:'',
					message:data,
					size:'large',
					backdrop:true,
				onEscape:function(){/*location.reload();*/},
			}).find("div.modal-dialog").addClass("largeWidth");
			});
		});

		$(document).on('click',"a#editLink",function(e){
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
		$(document).on('click','a#postLink',function(e){
			e.preventDefault();
			var v_id=$(this).attr('idd');;
			var uri=$(this).attr('href');

			bootbox.confirm({ 
				size: "small",
				message: "Post Selectd Grn Record {"+v_id+"} ?", 
				callback: function(result){
					/* result is a boolean; true = OK, false = Cancel*/
					if(result){
						$.ajax({
							url:uri,
							method:'get',
							data:"id="+v_id,
							cache:false,
							complete:function(xhr){
								var resp=$.parseJSON(xhr.responseText);
								//console.log(resp);
									if(resp.flag>0){
										swal("",resp.msg,"success");
									}else{
										swal("",resp.msg,"warning");
									}
							}
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
				message: "Reverse Selectd Grn Record {"+v_id+"} ?", 
				callback: function(result){
					/* result is a boolean; true = OK, false = Cancel*/
					if(result){
						$.ajax({
							url:uri,
							method:'get',
							data:"id="+v_id,
							cache:false,
							complete:function(xhr){
									var resp=$.parseJSON(xhr.responseText);
									//console.log(resp);
									if(resp.flag>0){
										swal("",resp.msg,"success");
									}else{
										swal("",resp.msg,"warning");
									}
							}
						});

					}else{
						alert('You Shied !! ;)');
					}
				}
			});

		});

		$(document).on('click','a#deleteLink',function(e){
			e.preventDefault();
			var v_id=$(this).attr('idd');;
			var uri=$(this).attr('href');
			bootbox.confirm({ 
				size: "small",
				message: "Delete item Record {"+v_id+"} ?", 
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