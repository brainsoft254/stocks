@extends('stocksmaster') 
@section('content')  
<div class="row">
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-primary text-center"><strong>Stock Packing Units List</strong></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="{{route('units.create')}}" id="btnNew" class="btn btn-primary"><i class="fa fa-folder"></i> New Unit</a>
					</div>
				</div>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table row-border compact stripe hover" style="width:100%;" id="location-table">
							<thead class="text-success bg-primary" >
								<tr>
									<th>#</th>
									<th>Code</th>
									<th>Description</th>
									<th>Factor</th>
									<th>Status</th>
									<th class="text-center">Options</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;?>
								@foreach ($units as $unit)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$unit->code}}</td>
									<td>{{$unit->description}}</td>
									<td>{{$unit->factor}}</td>
									<td>@if($unit->status==0) <span class="text-danger">InActive</span> @else <span class="text-success">Active</span> @endif</td>
									<td class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a id="editLink" href="{{route('units.edit',$unit->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
												<li role="separator" class="divider"></li>

												<li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{route('units.destroy',$unit->id)}}" idd="{{$unit->id}}" class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
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
	$(document).ready(function(){

		$('#location-table').DataTable({"pageLength": 50});

		$(document).on('click',"a#btnNew",function(e){
			e.preventDefault();
			$(this).prop('disabled',true);
			var urli=$(this).attr('href');
			$.get(urli,"",function(data){
				bootbox.dialog({
					title:'',
					message:data,
					size:'medium',
					backdrop:true,
					onEscape:function(){location.reload();},
				});
			});
		});

		$(document).on('click',"a#editLink",function(e){
			e.preventDefault();
			var urli=$(this).attr('href');
			$.get(urli,"",function(data){
				bootbox.dialog({
					title:'',
					message:data,
					size:'medium',
					backdrop:true,
					onEscape:function(){location.reload();},
				});
			});
		});
		$(document).on('click','a#deleteLink',function(e){
			e.preventDefault();
			var v_id=$(this).attr('idd');;
			var uri=$(this).attr('href');
			bootbox.confirm({ 
				size: "small",
				message: "Delete Unit Record {"+v_id+"} ?", 
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