@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-primary">
				        <div class="box-header">
				          <h3 class="text-primary text-center"><strong>Bankings List</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				          <a href="{{url('newbanking')}}" class="btn btn-primary"><i class="fa fa-folder"></i> Add Banking</a>
				        </div>
				        <div class="box-body">
							<table class="table table-striped" style="width:100%;" id="account-table">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>Ref</th>
										<th>AccountFrom</th>
										<th>AccountTo</th>
										<th>Amount</th>
										<th>Cheque No</th>
										<th>Remarks</th>
										<th>Status</th>
										<th>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;?>
									@foreach ($bankings as $banking)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$banking->ref}}</td>
											<td>{{$banking->accountfrom}}</td>
											<td>{{$banking->accountto}}</td>
											<td>{{$banking->amount}}</td>
											<td>{{$banking->chequeno}}</td>
											<td>{{$banking->remarks}}</td>
											<td>@if($banking->status==0)<span class="label label-warning label-as-badge">Unposted</span> @else <span class="label label-success label-as-badge">Posted</span>  @endif</td>
											<td>
				                                <div class="btn-group">
				                                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                                    Action <span class="caret"></span>
				                                  </button>
				                                  <ul class="dropdown-menu">
				                                    <li><a id="editLink" href=""><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
				                                    <li><a id="editLink" href=""><i class="fa fa-times" aria-hidden="true"></i> Reverse</a></li>
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
			$(document).on('click',"#use-scaler",function(){
				if($(this).prop("checked")==true){
					$('#rate').val(0);
					$('#rate').prop('readonly',true);
				}else{
					$('#rate').prop('readonly',false);
				}
			});
			$('#account-table').DataTable({"pageLength": 50});
			    function resetModalFormErrors() {
			        $('.form-group').removeClass('has-error');
			        $('.form-group').find('.help-block').remove();
			        $('.ui-alert').html('');
			    }

		    // Reset errors when opening modal.
		    $('.form-account').click(function() {
		        resetModalFormErrors();
		    });



		});
	</script>
@stop