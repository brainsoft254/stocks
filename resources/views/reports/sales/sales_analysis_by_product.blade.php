<div class="section">
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('print-product-sales-analysis')}}"  id="btnPrintPdf" class="btn btn-danger"><i class="fa fa-file-pdf-o "></i> Print Pdf</a>
			<a href="{{url('print-product-sales-analysis')}}"  id="btnPrintExcel" class="btn btn-success"><i class="fa fa-file-excel-o "></i> Export to Excel</a>
			<div class="box box-success">
				<div class="box-header">
					<div class="row">
						<div class="col-md-6">
							<h3 class="text-primary"><strong>Sales By Product List</strong></h3>
						</div>
						<div class="col-md-6">
							<table>
								<tr>
									<td colspan="2">CLient: {{($client==-1)?'-ALL-':Stockspro::getClientName($client)}} </td>
									
								</tr>
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
						@foreach($master as $item)
						<tr class="text-primary"><th colspan="7" style="border-bottom: solid 1px red">{{$item->idesc}}</th></tr>
						<thead class="text-primary">
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Invno</th>
								<th>Item</th>
								<th>Lpo</th>
								<th class="text-right">Qty</th>
								<th class="text-right">Total</th>
							</tr>
						</thead>
						
						<tbody>

							<?php $total=0;$i=1; $tqty=0;?>
							@foreach($details as $sale)
								@if($item->icode==$sale->icode)
									<tr>
										<td>{{$i}}</td>
										<td>{{$sale->invdate}}</td>
										<td>{{$sale->invno}}</td>
										<td>{{$sale->icode}}</td>
										<td>{{$sale->lpo}}</td>
										<td class="text-right">{{$sale->qty}}</td>
										<td class="text-right"><strong>{{number_format($sale->total,2)}}</strong></td>
									</tr>
									<?php $total+=$sale->total;$i+=1;$tqty+=$sale->qty;?>
								@endif
							@endforeach
							<tr class="tr_subtotal bg-danger">
								<td colspan="5" class="text-right"><strong>Total: </strong></td>
								<td colspan="1" class="text-right"><strong>{{number_format($tqty,2)}}</strong></td>
								<td colspan="1" class="text-right"><strong>{{number_format($total,2)}}</strong></td>
								
							</tr>
						</tbody>
					@endforeach
					</table>
				</div>
				<div class="box-footer">
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	tr.tr_subtotal td{
		/*border: dotted 1px green;*/
		/*border-bo:  solid 1px red !important;*/

	}
</style>
<script type="text/javascript">
	$(function(){
		$(document).on('click','#btnPrintPdf',function(e){
			e.preventDefault();
			var datastr='&dfrom={!!$dfrom!!}&dto={!!$dto!!}&product={!!$product!!}&location={!!$location!!}&clcode={!!$client!!}';
			var urli=$(this).attr('href')+'?pdf=1'+datastr;
			window.open(urli,'_blank','menubar=0,width=800, height=900'); 
		});

		$(document).on('click','#btnPrintExcel',function(e){
			e.preventDefault();
			var datastr='&dfrom={!!$dfrom!!}&dto={!!$dto!!}&product={!!$product!!}&location={!!$location!!}&clcode={!!$client!!}';
			var urli=$(this).attr('href')+'?excel=1'+datastr;
			/*$.get(urli,"",function(data){
				swal("","Success","success");
			});*/
			window.open(urli,'_blank','menubar=0,width=800, height=900'); 
		});

	})
</script>