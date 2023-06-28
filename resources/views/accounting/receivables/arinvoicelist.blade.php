@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-primary">
				        <div class="box-header">
				          <h3 class="text-primary text-center"><strong>Debtors Invoices List</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				          <a href="{{route('debtor.create')}}" class="btn btn-primary"><i class="fa fa-folder"></i> New Invoice</a>
				        </div>
				        <div class="box-body">
							<table class="table table-striped" style="width:100%;" id="account-table">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>Invno</th>
										<th>Code</th>
										<th>Names</th>
										<th>Date</th>
										<th>Duedate</th>
										<th>Amount</th>
										<th>Paid</th>
										<th>Die</th>
										<th>Remarks</th>
										<th>status</th>
										<th>Options</th>			
									</tr>
								</thead>
								<tbody>

									<?php $i=1;?>
									@foreach ($dinvoices as $dinvoice)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$dinvoice->invno}}</td>
											<td>{{$dinvoice->clientcode}}</td>
											<td>{{$dinvoice->clientname}}</td>
											<td>{{$dinvoice->invdate}}</td>
											<td>{{$dinvoice->duedate}}</td>
											<td>{{$dinvoice->amount}}</td>
											<td>{{$dinvoice->amountpaid}}</td>
											<td>{{$dinvoice->due}}</td>
											<td>{{$dinvoice->remarks}}</td>
											<td>@if($dinvoice->status==1)<span class="label label-success label-as-badge">Posted</span> @else <span class="label label-warning label-as-badge">Unposted</span>  @endif</td>
											<td>
				                                <div class="btn-group">
				                                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                                    Action <span class="caret"></span>
				                                  </button>
				                                  <ul class="dropdown-menu">
				                                    <li><a id="viewLink" href="{{url('postarInvoice/'.$dinvoice->id)}}"><i class="fa fa-check" aria-hidden="true"></i> Post</a></li>
				                                    <li><a id="viewLink" href="{{url('reversearInvoice/'.$dinvoice->id)}}"><i class="fa fa-times" aria-hidden="true"></i> Reverse</a></li>
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
			    function resetModalFormErrors() {
			        $('.form-group').removeClass('has-error');
			        $('.form-group').find('.help-block').remove();
			        $('.ui-alert').html('');
			    }
		});
	</script>
@stop