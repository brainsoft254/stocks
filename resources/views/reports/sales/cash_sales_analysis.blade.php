<div class="section">
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('print-pos-analysis')}}"  id="btnPrintPdf" class="btn btn-danger"><i class="fa fa-file-pdf-o "></i> Print Pdf</a>
			<a href="{{url('print-pos-analysis')}}"  id="btnPrintExcel" class="btn btn-success"><i class="fa fa-file-excel-o "></i> Export to Excel</a>
			<div class="box box-primary">
				<div class="box-header">
					<div class="row">
						<div class="col-md-6">
							<h3 class="text-primary"><strong>Cash Sales List</strong></h3>
						</div>
						<div class="col-md-6">
							<table>
								<tr>
									<td colspan="2">Period </td>
									
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
                                <th>Rno</th>
                                <th>Date</th>
                                <th>Item</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th class="text-right">@</th>
                                <th class="text-right">Amount</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i = 1;
                            $total = 0;$qty = 0; ?>
							@foreach($sales as $sale)
							<tr>
                                <td class="text-left" style="text-align: center!important;">
                                    {{ $i }}</td>
                                <td class="text-left" style="text-align: left!important;">
                                    {{ $sale->rno }}</td>
                                <td class="text-left" style="text-align: left!important;">
                                    {{ $sale->trandate }}</td>
                                <td class="text-left" style="text-align: center!important;">
                                    {{ $sale->itemcode }}</td>
                                <td class="text-left"
                                    style="text-align: left!important;">
                                    {{ Str::title(Stockspro::getItemDescr($sale->itemcode)) }}</td>
                                <td class="text-right"
                                    style="text-align: right!important;">
                                    {{ $sale->iqty }}</td>
                                <td class="text-left" style="text-align: right!important;">
                                    {{ number_format($sale->isprice, 0) }}</td>
                                <td class="text-left" style="text-align: right!important;">
                                    {{ number_format($sale->paid, 0) }}</td>
							</tr>
                            <?php $i += 1;
                                $total += $sale->paid;$qty += $sale->iqty; ?>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5" class="text-right"><strong>Total: </strong></td>
								<td class="text-right"><strong>{{number_format($qty,2)}}</strong></td>
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