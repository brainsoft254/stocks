@extends('utilmaster')
@section('util-content')
	<div class="row">
		<div class="col-md-12">
		     <div class="row">
		        <div class="col-md-10">
				     <div class="box box-solid box-primary">
				        <div class="box-header">
				          <h3 class="text-default"><i class="glyphicon glyphicon-eye-open"></i> <strong> Journal Entry Record</strong></h3>
  	                          <div class="box-tools pull-right">
							      <a href="{{url('journallist')}}" data-toggle="tooltip" data-placement="bottom" title="Go Back" class="btn btn-default">
							      <i class="glyphicon glyphicon-chevron-left"></i></a>
							  </div>

				          <span class="ui-alert col-md-12"></span>
				        </div>
				        <div class="box-body">
							<div class="tab-content">
			        			<div class="tab-pane active" id="tab_master">
			        			<br/>
						        	<form class="form-journal">
									{{csrf_field()}}
					   					<div class="row">
						   					<div class="col-md-12">
							   					<div class="col-md-3">
							   						<div class="input-group">
							   						    <span class="input-group-addon info">Ref</span>
							   							<input type="text" name="ref" class="form-control" value = "{{$journal->ref}}" readonly/>
							   						</div>
							   					</div>
							   					<div class="col-md-4">
							   						<div class="input-group">
							   						    <span class="input-group-addon info">Date</span>
							   							<input type="text" name="jdate" id="jdate" class="form-control" value ="{{$journal->jdate}}" />
							   						</div>
							   					</div>
						   					</div>
						   				</div>
					   					<div class ="row">
					   						<div class ="col-md-12">
					   							<div class="col-md-12">
					   								<textarea type="text" name="remarks" id="remarks" class="form-control" >{{$journal->remarks}}</textarea>
					   							</div>
					   						</div>	
					   					</div>
					   					<hr/>
					   					<div class = "col-md-12">
            							<legend class="text-primary">List of journals affected</legend>
            							</div>
						   			 	<div class="row"> 
						   			 	   <div class="col-md-12"> 
							   			 	   <div class="col-md-12"> 
							   			 	   <table class="table table-striped"  cellpadding="10" >
							   			 	   		<thead>
							   			 	   			<tr>
							   			 	   				
							   			 	   				<td class="text-left"><span class="text-left">#</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Code</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Description</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Debit</span></td>
							   			 	   				<td class="text-right"><span class="text-right">Credit</span></td>
							   			 	   				<td class="text-center"><span class="text-center">Comments</span></td>
							   			 	   				<td></td>
							   			 	   			</tr>
							   			 	   		</thead>
							   			 	   		<tbody id="tbl-ui">
							   			 	   		<?php $i=1;?>	
							                        @foreach($journal_d as $jd)
							                        <tr>
							                            <td class = "text-left"><span class ="text-left">{{$i++}}</span></td>
							                            <td class = "text-center"><span class ="text-center">{{ $jd->code }}</span></td>
							                            <td class = "text-center"><span class ="text-center">{{ $jd->description }}</span></td>
							                            <td class = "text-right"><span class ="text-right">{{ number_format($jd->debit,2) }}</span></td>
							                            <td class = "text-right"><span class ="text-right">{{ number_format($jd->credit,2) }}</span></td>
							                            <td class = "text-center"><span class ="text-center">{{ $jd->comments }}</span></td>
							                        </tr>
							                        @endforeach
							   			 	   		</tbody>
							   			 	     </table>
							   			 	   </div>
						   			 	   </div>
						   			 	</div>
						   			 	<div class ="row">
						   					<div class="col-md-12">
						   						<div class = "col-md-4">
						   						</div>
							   					<div class="col-md-6">
							   					   <div class="col-md-6">
								   						<div class="input-group">
								   						    <span class="input-group-addon danger">Debits</span>
								   							<input type="text" name="tdebit"  id="tdebit" class="text-right form-control" value="{{$journal->tdebit}}" placeholder="" readonly>
								   						</div>
								   					</div>
									   				<div class="col-md-6">				   			
								   						<div class="input-group">
								   						    <span class="input-group-addon warning">Credits</span>
								   							<input type="text" name="tcredit"  id="tcredit" class="text-right text-danger form-control" value="{{$journal->tcredit}}" placeholder="" readonly>
								   						</div>
								   					</div>					   						
							   					</div>
							   					<div class = "col-md-2">
							   					</div>	
							   			 	</div>
						   			 	</div>
						   			 	<br/>
				   					</form>

			        			</div>
			        		</div>
				        </div>
				     </div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('page-script')
	<script type="text/javascript">
	</script>
@stop