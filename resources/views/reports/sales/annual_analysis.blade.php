<?php $total=0;$i=1;?>
<div class="section">
    <div class="row">
        <div class="col-md-12">
            {{-- <a href="{{url('print-client-balances') }}" id="btnPrintPdf"
            class="btn btn-danger"><i class="fa fa-file-pdf-o "></i> Print Pdf</a> --}}
            <a href="{{ url('.$xceluri.') }}" id="btnPrintExcel" class="btn btn-success"><i
                    class="fa fa-file-excel-o "></i> Export to Excel</a>
            <div class="panel">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-5 text-center">
                            <h3 class="text-primary"><strong>Annual Analysis List </strong></h3>


                        </div>
                        <div class="col-md-5">
                            <table class="tbl-params">
                                <tr>
                                    <td><strong>Year:</strong></td>
                                    <td class="text-primary"><b>{{ $period }}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Data Source:</b></td>
                                    <td class="text-danger"><b>{{ $datasource }}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Report Type:</b></td>
                                    <td class="text-success"><b>{{ $rpt_type }}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Client:</b></td>
                                    <td class="text-success"><b>{{ $client }}</b></td>
                                </tr>
                                {{-- <tr><td><b>Total Sales:</b></td><td class="text-danger bg-danger text-c"><b>{{number_format($totalsales,0) }}</b>
                                </td>
                                </tr> --}}
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="tbl-main p-5">
                            <thead class="bg-primary text-primary" style="margin-bottom:4px;  border-bottom:solid 1px #000; background-color:#1363DF;color:red;">
                                <tr style="margin-bottom:4px; background-color:#1363DF;color:#fff;">
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    @foreach($monthsBtn as $month)
                                        <th class="text-right">{{ $month }}</th>
                                    @endforeach
                                    <th class="text-right">SubTotal</th>
                                    <th class="text-right">CrNote</th>
                                    <th class="text-right">Paid</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php  
										$coltotal=0;
										$crtotal=0;
										$paidtotal=0;
										$gtotal=0;
										$jantotal=0;
										$febtotal=0;
										$martotal=0;
										$aptotal=0;
										$maytotal=0;
										$juntotal=0;
										$jultotal=0;
										$augtotal=0;
										$septotal=0;
										$octtotal=0;
										$novtotal=0;
										$dectotal=0;
									?>
                                @foreach($details as $i=> $det)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td class="text-c">{{ $det->code }}</td>
                                        <td class='text-c'>{{ $det->name }}</td>
                                        <?php 
											$rtotal=0;
										?>
                                        @foreach($monthsBtn as $key=> $month)

                                            <?php $msale=isset($det->sales[$key])?$det->sales[$key]:0;?>
                                            <td
                                                class="text-right {{ $msale>0? 'text-success':'text-danger' }} ">
                                                {{ number_format($msale) }}</td>
                                            <?php 
										    switch ($month) {
												case 'Jan':
													$jantotal+=$msale;
													break;
												case 'Feb':
													$febtotal+=$msale;
													break;
												case 'Mar':
													$martotal+=$msale;
													break;
												case 'Apr':
													$aptotal+=$msale;
													break;
												case 'May':
													$maytotal+=$msale;
													break;
												case 'Jun':
													$juntotal+=$msale;
													break;
												case 'Jul':
													$jultotal+=$msale;
													break;
												case 'Aug':
													$augtotal+=$msale;
													break;
												case 'Sept':
													$septotal+=$msale;
													break;
												case 'Oct':
													$octtotal+=$msale;
													break;
												case 'Nov':
													$novtotal+=$msale;
													break;
												case 'Dec':
													$dectotal+=$msale;
													break;
												default:
													break;
											}
										 	$rtotal+=isset($det->sales[$key])?$det->sales[$key]:0;
										 ?>
                                        @endforeach
                                        <td
                                            class="text-right text-primary {{ $rtotal>0? 'text-success':'text-danger' }}">
                                            <b class="text-primary">{{ number_format($rtotal,0) }}</b>
										</td>
                                        <td
                                            class="text-right {{ $det->crnote>0? 'text-warning':'text-default' }}">
                                            <b>{{ number_format($det->crnote,0) }}</b>
										</td>
                                        <td
                                            class="text-right {{ $det->paid>0? 'text-success':'text-default' }}">
                                            <b>{{ number_format($det->paid,0) }}</b>
										</td>
                                        <td
                                            class="text-right {{ $det->paid>0? 'text-success':'text-default' }}">
                                            <b>{{ number_format($rtotal-$det->crnote-$det->paid,0) }}</b>
										</td>
                                        <?php 
										 $coltotal+=$rtotal;
										 $crtotal+=$det->crnote;
										 $paidtotal+=$det->paid;
										 $gtotal+=($rtotal-$det->crnote-$det->paid)
										 ?>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-success">
                                <tr>
                                    <td colspan="3" class="text-left"><strong>Total: </strong></td>
                                    <td class="text-right"><strong>{{ number_format($jantotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($martotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($maytotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($jultotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($septotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($novtotal,0) }}</strong></td>

                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right" style='color:blue'>
                                        <strong>{{ number_format($coltotal,0) }}</strong></td>

                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($paidtotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong></strong></td>
                                    <td class="text-right"><strong>{{ number_format($febtotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($aptotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($juntotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($augtotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($octtotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($dectotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right" style='color:red'>
                                        <strong>{{ number_format($crtotal,0) }}</strong></td>
                                    <td colspan="1" class="text-right"></td>
                                    <td class="text-right"><strong>{{ number_format($gtotal,0) }}</strong></td>

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
    table.tbl-params td:first-child {
        text-align: right !important;
    }

    .text-c {
        font-size: 12px;
        font-style: bold;
        text-align: left;
    }

    tfoot td {
        border-top: solid 2px #000;
        font-size: 18px;
    }

    .tbl-main {
        width: 100%;
        padding: 0px 3px;
    }

    .tbl-main thead th {
        padding: 7px 5px;
    }

    .tbl-main tbody td {
        border-collapse: collapse;
        border-bottom: dotted 1px #000 !important;
        padding: 5px 3px;

    }

    .tbl-params td {
        border: #000 1px solid;
        padding: 3px;
    }

</style>
<script type="text/javascript">
    $(function () {
        $(document).on('click', '#btnPrintExcel', function (e) {
            e.preventDefault();
            var urli = '{!!$xceluri!!}';
            window.open(urli, '_blank', 'menubar=0,width=800, height=900');
        });


    })

</script>
