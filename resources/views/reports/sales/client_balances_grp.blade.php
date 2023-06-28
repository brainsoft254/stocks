<?php $total=0;$i=1;?>
<div class="section">
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('print-client-balances')}}"  id="btnPrintPdf" class="btn btn-danger"><i class="fa fa-file-pdf-o "></i> Print Pdf</a>
			<a href="{{url('print-client-balances')}}"  id="btnPrintExcel" class="btn btn-success"><i class="fa fa-file-excel-o "></i> Export to Excel</a>
			<div class="panel">
				<div class="box-header">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-5 text-center">
							<h3 class="text-primary"><strong>Client Balances List </strong></h3>
							<span><strong>As AT : {{$asatdate}}</strong></span>

						</div>
						<div class="col-md-5">
							<table class="tbl-params">
								<tr><td><strong>Client Type:</strong></td><td class="text-primary"><b>{{$client_type}}</b></td></tr>
								<tr><td><b>Report Type:</b></td><td class="text-danger"><b>{{$report_type}}</b></td></tr>
								<tr><td><b>Client:</b></td><td class="text-success"><b>{{$client==-1?'ALL': $client}}: {{$client!=-1?Stockspro::getClientName($client):'*ALL CLIENTS*'}}</b></td></tr>
								<tr><td><b>TOTAL BALANCES:</b></td><td class="text-danger bg-danger text-c"><b>{{number_format($totalBals,2)}}</b></td></tr>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
							<table class="tbl-main p-5">
								<thead class="bg-primary p-">
									<tr>
										<th>#</th>
										<th>Code</th>
										<th>Name</th>
										<th class="text-right">Balance</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($details as $det)
									
									<tr>
										<td>{{$i}}</td>
										<td>{{$det->code}}</td>
										<td>{{$det->name}}</td>
										<td class="text-right"><strong>{{number_format($det->bal,2)}}</strong></td>
									</tr>

									<?php $total+=$det->bal;$i+=1;?>
									@endforeach
								</tbody>
								<tfoot class="text-danger">
									<tr>
										<td colspan="3" class="text-right"><strong>Total: </strong></td>
										<td colspan="1" class="text-right"><strong>{{number_format($total,2)}}</strong></td>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	table.tbl-params td:first-child{
		text-align:right !important;
	}
	.text-c{
		font-size: 18px;
		font-style:bold;
		text-align: center;
	}
	tfoot td{
		border-top:solid 2px #000;
		font-size:18px;
	}
	.tbl-main{
		width: 100%;
		padding: 0px 3px;
	}
	.tbl-main thead th{
		padding: 2px;
	}
	.tbl-main tbody td{
		border-collapse: collapse;
		border-bottom: dotted 1px #000 !important;
		
	}
	.tbl-params td{
		border:#000 1px solid;
		padding:3px;
	}
</style>
<script type="text/javascript">
	$(function(){
		$(document).on('click','#btnPrintPdf',function(e){
			e.preventDefault();
			var datastr='&asatdate={!!$asatdate!!}&parent={!!$parent!!}&summary={!!$summary!!}&client={!!$client!!}';
			var urli=$(this).attr('href')+'?pdf=1'+datastr;
			window.open(urli,'_blank','menubar=0,width=800, height=900'); 
		});

		$(document).on('click','#btnPrintExcel',function(e){
			e.preventDefault();
			var datastr='&asatdate={!!$asatdate!!}';
			var urli=$(this).attr('href')+'?excel=1'+datastr;
			/*$.get(urli,"",function(data){
				swal("","Success","success");
			});*/
			window.open(urli,'_blank','menubar=0,width=800, height=900'); 
		});

	})
</script>