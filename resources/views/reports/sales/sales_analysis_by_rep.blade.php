

<div class="section">
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('print-sales-analysis')}}"  id="btnPrintPdf" class="btn btn-danger"><i class="fa fa-file-pdf-o "></i> Print Pdf</a>
			<a href="{{url('print-sales-analysis')}}"  id="btnPrintExcel" class="btn btn-success"><i class="fa fa-file-excel-o "></i> Export to Excel</a>
			<div class="box box-success">
				<div class="box-header">
					<div class="row">
						<div class="col-md-6">
							<h3 class="text-primary"><strong>Sales By SalesRep/Route List</strong></h3>
						</div>
						<div class="col-md-6">
							<table>
								<tr>
									<td colspan="2">Priod </td>
									
								</tr>
								<tr>
									<td>From: </td>
									<td>{{$dfrom}}</td>
								</tr>
								<tr>
									<td>To: </td>
									<td>{{$dto}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="box-body">
                @foreach($staffs as $staff)
					@foreach($routes as $route)
						@if($route->rep==$staff->rep && $route->route==$staff->route)
						<table class="table table-responsive">
							<thead class="text-primary">
								<tr>
								<td colspan=7><span class="font-weight-bold">{{$staff->rep}}-{{$route->route}}</span></td>
								</tr>
								<tr>
									<th class="bg-primary">#</th>
									<th class="bg-primary">Invno</th>
									<th class="bg-primary">Invdate</th>
									<th class="bg-primary">ClCode</th>
									<th class="bg-primary">ClName</th>
									<th class="text-right bg-primary">Amount</th>
									<th class="bg-primary">Route</th>
									
								</tr>
							</thead>
							<tbody>
								<?php $total=0;$i=1;?>
										@foreach($details as $sale)
							
											@if($sale->route==$route->route && $sale->rep==$route->rep && $sale->rep==$staff->rep )
												<tr>
													<td>{{$i}}</td>
													<td>{{$sale->invno}}</td>
													<td>{{$sale->invdate}}</td>
													<td>{{$sale->clcode}}</td>
													<td>{{Stockspro::getClientName($sale->clcode)}}</td>
													<td class="text-right"><strong>{{number_format($sale->amount,2)}}</strong></td>
													<td>{{$sale->route}}</td>
												</tr>
												<?php $total+=$sale->amount;$i+=1;?>
										@endif
										@endforeach
									@endif
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td colspan="5" class="text-right"><strong>Total: </strong></td>
									<td colspan="1" class="text-right"><strong>{{number_format($total,2)}}</strong></td>
									<td></td>
								</tr>
							</tfoot>
                        @endforeach
					</table>
				</div>
				<div class="box-footer">
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$(document).on('click','#btnPrintPdf',function(e){
			e.preventDefault();
			var datastr='&dfrom={!!$dfrom!!}&dto={!!$dto!!}';
			var urli=$(this).attr('href')+'?pdf=1'+datastr;
			window.open(urli,'_blank','menubar=0,width=800, height=900'); 
		});

		$(document).on('click','#btnPrintExcel',function(e){
			e.preventDefault();
			var datastr='&dfrom={!!$dfrom!!}&dto={!!$dto!!}';
			var urli=$(this).attr('href')+'?excel=1'+datastr;
			/*$.get(urli,"",function(data){
				swal("","Success","success");
			});*/
			window.open(urli,'_blank','menubar=0,width=800, height=900'); 
		});

	})
</script>