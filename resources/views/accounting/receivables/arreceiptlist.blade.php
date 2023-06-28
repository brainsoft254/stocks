@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-primary">
				        <div class="box-header">
				          <h3 class="text-primary text-center"><strong>Debtors Receipts List</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				          <a href="{{route('arreceipt.create')}}" class="btn btn-primary"><i class="fa fa-folder"></i> New Receipt</a>
				        </div>
				        <div class="box-body">
							<table class="table table-striped" style="width:100%;" id="account-table">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>rno</th>
										<th>Code</th>
										<th>Client Name</th>
										<th>Account</th>
										<th>Cheque</th>
										<th>rdate</th>
										<th class="text-right">Amount</th>
										<th class="text-right">due</th>
										<th class="text-right">balcf</th>
										<th>Options</th>		
									</tr>
								</thead>
								<tbody>

									<?php $i=1;?>
									@foreach ($arreceipts as $darreceipt)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$darreceipt->rno}}</td>
											<td>{{$darreceipt->clientcode}}</td>
											<td>{{$darreceipt->clientname}}</td>
											<td>{{$darreceipt->account}}</td>
											<td>{{$darreceipt->chequeno}}</td>
											<td>{{$darreceipt->rdate}}</td>
											<td class="text-right">{{$darreceipt->amount}}</td>
											<td class="text-right">{{$darreceipt->totaldue}}</td>
											<td class="text-right">{{$darreceipt->balcf}}</td>
											<td>
				                                <div class="btn-group">
				                                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                                    Action <span class="caret"></span>
				                                  </button>
				                                  <ul class="dropdown-menu">
				                                    <li><a id="viewLink" href="{{url('printarReceipt/'.$darreceipt->id)}}"><i class="fa fa-check" aria-hidden="true"></i> Post</a></li>
				                                    <li><a id="viewLink" href="{{url('reversearReceipt/'.$darreceipt->id)}}"><i class="fa fa-times" aria-hidden="true"></i> Reverse</a></li>
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
			$('#account-table').DataTable({"pageLength": 50});
		});
	</script>
@stop