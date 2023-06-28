@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-12">
				     <div class="box box-primary">
				        <div class="box-header">
				          <h3 class="text-primary text-center"><strong>Journal List</strong></h3>
				          <span class="ui-alert col-md-12"></span>
				          <a href="{{url('newjournal')}}" class="btn btn-primary"><i class="fa fa-folder"></i> Add Journal</a>
				        </div>
				        <div class="box-body">
							<table class="table table-striped" style="width:100%;" id="account-table">
								<thead class="text-success">
									<tr>
										<th>#</th>
										<th>Ref</th>
										<th>Jdate</th>
										<th>Debit</th>
										<th>Credit</th>
										<th>Remarks</th>
										<th>Status</th>
										<th>Options</th>
									</tr>
								</thead>
								<tbody>

									<?php $i=1;?>
									@foreach ($journals as $journal)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$journal->ref}}</td>
											<td>{{$journal->jdate}}</td>
											<td>{{$journal->tdebit}}</td>
											<td>{{$journal->tcredit}}</td>
											<td>{{$journal->remarks}}</td>
											<td>@if($journal->status==0)<span class="label label-warning label-as-badge">Unposted</span> @else <span class="label label-success label-as-badge">Posted</span>  @endif</td>
											<td>
				                                <div class="btn-group">
				                                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                                    Action <span class="caret"></span>
				                                  </button>
				                                  <ul class="dropdown-menu">
				                                    <li><a id="viewLink" href="{{url('viewJournal/'.$journal->id)}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
				                                    <li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{url('reverseJournal/'.$journal->id)}}" class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Reverse</a></li>
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

		    // Reset errors when opening modal.
		    $('.form-account').click(function() {
		        resetModalFormErrors();
		    });



		});
	</script>
@stop