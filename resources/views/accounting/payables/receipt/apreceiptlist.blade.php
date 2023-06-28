@extends('stocksmaster') 
@section('content')    
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-primary">
				        <div class="box-header">
				          <h3 class="text-primary text-center"><strong>Creditors Receipts List</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				          <a href="#" link-url= "{{url('payable-receipt')}}" class="btn btn-primary" id="btnNew"><i class="fa fa-folder"></i> New Receipt</a>
				        </div>
				        <div class="box-body">
							<table class="table table-striped" style="width:100%;" id="account-table">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>rno</th>
										<th>Code</th>
										<th>Supplier Name</th>
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
									@foreach ($apreceipts as $apreceipt)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$apreceipt->rno}}</td>
											<td>{{$apreceipt->scode}}</td>
											<td>{{$apreceipt->sname}}</td>
											<td>{{$apreceipt->account}}</td>
											<td>{{$apreceipt->chequeno}}</td>
											<td>{{$apreceipt->rdate}}</td>
											<td class="text-right">{{$apreceipt->amount}}</td>
											<td class="text-right">{{$apreceipt->totaldue}}</td>
											<td class="text-right">{{$apreceipt->balcf}}</td>
											<td>
				                                <div class="btn-group">
				                                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                                    Action <span class="caret"></span>
				                                  </button>
				                                  <ul class="dropdown-menu">
				                                    <li><a id="viewLink" href="{{url('printapReceipt/'.$apreceipt->id)}}"><i class="fa fa-check" aria-hidden="true"></i> Post</a></li>
				                                    <li><a id="viewLink" href="{{url('reverseapReceipt/'.$apreceipt->id)}}"><i class="fa fa-times" aria-hidden="true"></i> Reverse</a></li>
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

	  $(document).on('click',"a#btnNew",function(e){
        e.preventDefault();
        var urli=$(this).attr('link-url');
        $.get(urli,"",function(data){
           bootbox.dialog({
               title:'',
               message:data,
               size:'large',
               backdrop:true,
               onEscape:true,
           });
       });
    });

	</script>
@stop