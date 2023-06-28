@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-primary">
				        <div class="box-header">
				          <h3 class="text-primary text-center"><strong>Debtors List</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				          <a href="{{url('newdebtor')}}" class="btn btn-primary"><i class="fa fa-folder"></i> Add Debtor</a>
				        </div>
				        <div class="box-body">
							<table class="table table-striped" style="width:100%;" id="account-table">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>code</th>
										<th>names</th>
										<th>status</th>
										<th>address</th>
										<th>city</th>
										<th>Tel</th>
										<th>Email</th>
										<th>Remarks</th>
										<th>Options</th>			
									</tr>
								</thead>
								<tbody>

									<?php $i=1;?>
									@foreach ($debtors as $debtor)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$debtor->code}}</td>
											<td>{{$debtor->name}}</td>
											<td>@if($debtor->status==1)<span class="label label-success label-as-badge">Active</span> @else <span class="label label-warning label-as-badge">Inactive</span>  @endif</td>
											<td>{{$debtor->address}}</td>
											<td>{{$debtor->city}}</td>
											<td>{{$debtor->tel}}</td>
											<td>{{$debtor->email}}</td>
											<td>{{$debtor->remarks}}</td>
											<td>
				                                <div class="btn-group">
				                                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                                    Action <span class="caret"></span>
				                                  </button>
				                                  <ul class="dropdown-menu">
				                                    <li><a id="viewLink" href="{{url('editdebtor/'.$debtor->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
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