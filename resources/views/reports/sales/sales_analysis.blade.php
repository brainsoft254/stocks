<div class="section">
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('print-sales-analysis')}}"  id="btnPrintPdf" class="btn btn-danger"><i class="fa fa-file-pdf-o "></i> Print Pdf</a>
			<a href="{{url('print-sales-analysis')}}"  id="btnPrintExcel" class="btn btn-success"><i class="fa fa-file-excel-o "></i> Export to Excel</a>
			<div class="box box-primary">
				<div class="box-header">
					<div class="row">
						<div class="col-md-6">
							<h3 class="text-primary"><strong>Sales List</strong></h3>
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
					<table class="table table-responsive">
						<thead class="text-primary">
							<tr>
								<th>#</th>
								<th>TranDate</th>
								<th>InvNo</th>
								<th>CLient</th>
								<th class="text-right">Amount</th>
								<th>OrderNo</th>
							</tr>
						</thead>
						<tbody>
							<?php $total=0;$i=1;?>
							@foreach($sales as $sale)
							<tr>
								<td>{{$i}}</td>
								<td>{{$sale->invdate}}</td>
								<td>{{$sale->invno}}</td>
								<td>{{Stockspro::getClientName($sale->clcode)}}</td>
								<td class="text-right"><strong>{{number_format($sale->amount,2)}}</strong></td>
								<td>{{$sale->lpo}}</td>
							</tr>

							<?php $total+=$sale->amount;$i+=1;?>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" class="text-right"><strong>Total: </strong></td>
								<td colspan="1" class="text-right"><strong>{{number_format($total,2)}}</strong></td>
								<td></td>
							</tr>
						</tfoot>
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