@extends('stocksmaster') 
@section('content')    
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-primary">
				        <div class="box-header">
				          <h3 class="text-primary text-center"><strong>Payables / Creditor Invoices List</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				          <a href="{{url('payable-invoice')}}" id="btnNew"  class="btn btn-primary"><i class="fa fa-folder"></i> New Invoice</a>
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
											<td>{{$dinvoice->scode}}</td>
											<td>{{$dinvoice->sname}}</td>
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
				                                    <li><a id="postLink" href="{{url('postapInvoice/'.$dinvoice->id)}}"><i class="fa fa-check" payt_id="{{$dinvoice->id}}" aria-hidden="true"></i> Post</a></li>
				                                    <li><a id="viewLink" href="{{url('reverseapInvoice/'.$dinvoice->id)}}"><i class="fa fa-times" aria-hidden="true"></i> Reverse</a></li>
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

        $(document).on('click',"a#btnNew",function(e){
            e.preventDefault();
            var urli=$(this).attr('href');
            $.get(urli,"",function(data){
               bootbox.dialog({
					//title:'',
					message:data,
					size:'large',
					backdrop:true,
					onEscape:function(){
                      location.reload();
                  }
              });
           });
        });

      $(document).on('click','#postLink',function(e){
        e.preventDefault();
        var v_id=$(this).attr('payt_id');;
        var uri=$(this).attr('href');

        bootbox.confirm({ 
          size: "small",
          message: "Post Selectd Invoice Record {"+v_id+"} ?", 
          callback: function(result){
            /* result is a boolean; true = OK, false = Cancel*/
            if(result){
              var alertbox="";
              $.ajax({
                url:uri,
                method:'get',
                data:"id="+v_id+'&post=1',
                cache:false,
                beforeSend:function(){
                  alertbox=bootbox.dialog({message:"<i class='fa fa-spinner fa-spin'></i> Please wait..."});
                },
                complete:function(xhr){
                  alertbox.modal('hide');
                  swal("",xhr.responseText,"success");
              },

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