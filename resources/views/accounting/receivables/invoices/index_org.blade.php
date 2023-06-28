@extends('stocksmaster') 
@section('content')  
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-primary text-center"><strong>Invoices List</strong></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="{{route('invoices.create')}}" id="btnNew" class="btn btn-primary"><i class="fa fa-magic" disabled></i> New Invoice</a>
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
									<th>Invno</th>
									<th>Trandate</th>
									<th>Clcode</th>
									<th>Clname</th>
									{{-- <th>Location</th> --}}
									<th>LPO</th>
									<th>Vat</th>
									<th>Total</th>
									<th>Paid</th>
									<th>Bal</th>
									<th>Status</th>
									<th class="text-center">Options</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;?>
								@foreach ($invoices as $invoice)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$invoice->invno}}</td>
									<td>{{$invoice->invdate}}</td>
									<td>{{$invoice->clcode}}</td>
									<td>{{Stockspro::getClientName($invoice->clcode)}}</td>
									{{-- <td>{{Stockspro::getLocationName($invoice->location)}}</td> --}}
									<td>{{$invoice->lpo}}</td>
									<td><span class="label label-warning label-as-badge">{{number_format($invoice->vat,2)}}</span></td>
									<td class="text-right"><span class="label label-danger label-as-badge ">
										@if(Stockspro::isVatable($invoice->clcode))
											{{number_format(($invoice->amount+$invoice->vat),2)}}
										@else
											{{number_format($invoice->amount,2)}}
										@endif
									</span></td>
									<td>
										<span class="label label-success label-as-badge">
											{{number_format($invoice->amount_paid,2)}}
										</span>
									</td>
									<td>
										<span class="label label-danger label-as-badge">
											@if(Stockspro::isVatable($invoice->clcode))
												{{number_format((($invoice->amount+$invoice->vat)-($invoice->amount_paid)),2)}}
											@else
												{{number_format(($invoice->amount-$invoice->amount_paid),2)}}
											@endif
										</span>
									</td>
									<td>@if($invoice->status==0)<span class="label label-warning label-as-badge"> Unposted</span> @else <span class="label label-success label-as-badge">Posted</span> @endif</td>
									
									<td  class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">

												<li><a id="viewLink" href="{{route('invoices.show',$invoice->id)}}" idd="{{$invoice->id}}" ><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>
												<!-- <li role="separator" class="divider"></li> -->
												@if($invoice->status==1)
												<!-- <li><a id="reverseLink" href="{{url('reverse-order')}}" idd="{{$invoice->id}}" ><i class="fa fa-mail-reply-all" aria-hidden="true"></i> Reverse</a></li>
												<li role="separator" class="divider"></li> -->
												@endif
												@if($invoice->status==0)
												<li><a id="editLink" href="{{route('orders.edit',$invoice->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
												<li role="separator" class="divider"></li>

												<li><a id="postLink" href="{{url('post-order')}}" idd="{{$invoice->id}}"><i class="fa fa-magic" aria-hidden="true"></i> Post</a></li>
												<li role="separator" class="divider"></li>

												<li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{route('orders.destroy',$invoice->id)}}" idd="{{$invoice->id}}" class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
												@endif
												@if($invoice->locked>0)
												<li role="separator" class="divider"></li>
												<li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="unlockLink" href="{{route('invoices.destroy',$invoice->id)}}" idd="{{$invoice->id}}" class="text-primary"><i class="fa fa-unlock" aria-hidden="true"></i> Unlock</a></li>
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
		$("div#item-table_filter input").css('border','1px red dotted');//('form-control-grid');
		$("a#btnNew").prop('disabled',false);
		$('#item-table').DataTable({"pageLength": 25});

		//$(document).on('click',"a#btnNew",function(e){
			//e.preventDefault();
			/*var btnOriginal = $('#btnNew').html();
			$('#btnNew').html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
			$('#btnNew').prop('disabled',true);*/

			//var alertbox=bootbox.dialog({message:"<i class='fa fa-spinner fa-spin'></i> Please wait..."});
			//var urli=$(this).attr('href');
			//$.get(urli,"",function(data){
				//bootbox.dialog({
					//title:'',
					//message:data,
					//size:'large',
					//backdrop:true,
				//onEscape:function(){/*location.reload();*/},
			//}).find("div.modal-dialog").addClass("largeWidth");
			//}).done(function(){
				//var btnOriginal = this.html();
				/*$('#btnNew').html(btnOriginal);
				$('#btnNew').prop('disabled',false);*/
			/*	alertbox.modal('hide');
			});
		});*/

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
				size: "small",urli
				message: "Post Selectd Order Record {"+v_id+"} ?", 
				callback: function(result){
					/* result is a boolean; true = OK, false = Cancel*/
					if(result){
						var alertbox="";
						$.ajax({
							url:uri,
							method:'get',
							data:"id="+v_id,
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
				message: "Reverse Selectd Order Record {"+v_id+"} ?", 
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

		$(document).on('click','a#unlockLink',function(e){
			e.preventDefault();
			var v_id=$(this).attr('idd');;
			var uri=$(this).attr('href');
			bootbox.confirm({ 
				size: "small",
				message: "Unlock Invoice Record {"+v_id+"} ?", 
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
								//bootbox.dialog({message:xhr.responseText});
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