<div class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="actionbtns">
                <a href="{{ url('print-client-sales-analysis') }}" id="btnPrintPdf" class="btn btn-danger mr-1"><i
                        class="fa fa-file-pdf-o "></i> Print Pdf</a>
						<span>&nbsp;&nbsp;</span>
                <a href="{{ url('print-client-sales-analysis') }}" id="btnPrintExcel" class="btn btn-success ml-2"><i
                        class="fa fa-file-excel-o "></i> Export to Excel</a>
            </div>
            <div class="box box-success mt-3">
                <div class="box-header">
                    <div class="main-header">
                        <div class="coy-info">
							<div>
								<img src="{{asset($coy->getFirstMediaUrl('logo'))}}" alt="{{ $coy->name }}" class=" responsive" style="width:150px;" />
							</div>
                            <h4><strong>Client Sales Analysis Report</strong></h4>
                            <div>
                                <span><strong>CLIENT:</strong></span><br />
                                @if ($client != '-1')
                                    <span><strong>{{ Stockspro::getClientName($client) }} ( {{ $client }}
                                            )</strong></span>
                                @else
                                    <span><strong>ALL CLIENTS</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="rpt-info">
                            <span><strong>Period:</strong></span>
                            <div>
                                <span><strong>From:</strong></span>
                                <span><strong>{{ $dfrom }}</strong></span>
                            </div>
                            <div>
                                <span><strong>To:</strong></span>
                                <span><strong>{{ $dto }}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-responsive">
                        <thead class="bg-blue">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $i = 1; ?>
                            @foreach ($details as $sale)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $sale->code }}</td>
                                    <td>{{ Stockspro::getClientName($sale->code) }}</td>
                                    <td class="text-right"><strong>{{ number_format($sale->amount, 2) }}</strong>
                                    </td>
                                </tr>

                                <?php $total += $sale->amount;
                                $i += 1; ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Total: </strong></td>
                                <td colspan="1" class="text-right"><strong>{{ number_format($total, 2) }}</strong>
                                </td>
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
<style>
    .main-header {
        display: flex;
        align-content: center;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding: 5px 3px;
    }
	.actionbtns{
		display: flex;
		justify-content: flex-end;
		align-items:center;
	}

</style>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '#btnPrintPdf', function(e) {
            e.preventDefault();
            var datastr =
                '&dfrom={!! $dfrom !!}&dto={!! $dto !!}&parent={!! $parent !!}&client={!! $client !!}';
            var urli = $(this).attr('href') + '?pdf=1' + datastr;
            window.open(urli, '_blank', 'menubar=0,width=800, height=900');
        });

        $(document).on('click', '#btnPrintExcel', function(e) {
            e.preventDefault();
            var datastr = '&dfrom={!! $dfrom !!}&dto={!! $dto !!}&client={!! $client !!}';
            var urli = $(this).attr('href') + '?excel=1' + datastr;
            // $.get(urli,"",function(data){
            // 	swal("","Success","success");
            // });
            window.open(urli, '_blank', 'menubar=0,width=800, height=900');
        });

    });
</script>
