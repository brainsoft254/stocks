@extends('stocksmaster')

@section('content')
<!-- Content comes here -->
<!-- Main content -->

<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ number_format($items->count(),0) }}</h3>

                    <p>Stock Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('items') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ number_format($orders->ototal,0) }}<sup style="font-size: 20px"></sup></h3>
                    
                    <p>Orders this Month </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('orders')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ number_format($receipts->rcts,0) }}</h3>
                    
                    <p>Paid This Month</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('receipts')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ number_format($balances->tbal,0) }}</h3>

                    <p>Balances</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-7 connectedSortable">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Orders</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>RefNo#</th>
                                    <th>Client</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderlist as $list)
                                    <tr>
                                        <td><a id="viewLink"
                                                href="{{ route('orders.show',$list->id) }}">{{ $list->refno }}</a>
                                        </td>
                                        <td>{{ Stockspro::getClientName($list->clcode) }}</td>
                                        <td>
                                            @if(Stockspro::isVatable($list->clcode))
                                                <span
                                                    class="label label-warning">{{ number_format($list->total+$list->tax,0) }}</span>
                                            @else
                                                <span
                                                    class="label label-warning">{{ number_format($list->total,0) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span
                                                class="label {{ $list->status?'label-success':'label-danger' }}">{{ $list->status?'POSTED':'UnPOSTED' }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="{{ url('orders/create') }}"
                        class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                    <a href="{{ url('orders') }}"
                        class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <div class="col-lg-5 connectedSortable">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Inventory Value</span>
                    <span class="info-box-number">Kes: {{ number_format($inventvalue[0]->svalue,0) }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                        As at now
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                
                <div class="info-box-content">
                    <span class="info-box-text">Sales</span>
                    <span class="info-box-number">Kes: {{ number_format($receipts->rcts,0) }}</span>
                    
                    <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                    {{-- <span class="progress-description">
                        0% Increase in 30 Days
                    </span> --}}
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                
                <div class="info-box-content">
                    <span class="info-box-text">Expenses</span>
                    <span class="info-box-number">0</span>
                    
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                        0% Increase in 30 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Client Aging Balance</span>
                    <span class="info-box-number">0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                    </div>
                    <span class="progress-description">
                        Cummulative Balances in 30 Days
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- right col -->
    </div>
    
    <!-- Monthly Sales -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Monthly Client Sales</h3>
                    <div class="chart-responsive">
                        <canvas id="bar-chart-horizontal" width="800" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

@stop
@section('page-script')
<script type="text/javascript">
    $(function () {
        'use strict';
        
        
        
        // -----------------
        // - SPARKLINE BAR -
        // -----------------
        $('.sparkbar').each(function () {
            var $this = $(this);
            $this.sparkline('html', {
                type: 'bar',
                height: $this.data('height') ? $this.data('height') : '30',
                barColor: $this.data('color')
            });
        });
        // -----------------
        // - SPARKLINE PIE -
        // -----------------
        $('.sparkpie').each(function () {
            var $this = $(this);
            $this.sparkline('html', {
                type: 'pie',
                height: $this.data('height') ? $this.data('height') : '90',
                sliceColors: $this.data('color')
            });
        });
        
        $(document).on('click', "a#viewLink", function (e) {
            e.preventDefault();
            var urli = $(this).attr('href');
            $.get(urli, "", function (data) {
                bootbox.dialog({
                    title: '',
                    message: data,
                    size: 'large',
                    backdrop: true,
                    onEscape: function () {
                        location.reload();
                    },
                }).find("div.modal-dialog").addClass("largeWidth");
            });
        });
        
        
        /*bar Chart*/
        var cColors = ['#007bff', '#6610f2', '#6f42c1', '#e83e8c', '#dc3545', '#fd7e14', '#ffc107',
            '#28a745', '#20c997', '#17a2b8'
        ];
        /* var sdata={!!$DSSales!!}
        var plabels=[],pdata=[];*/

        /*for(i in sdata)
    {
        plabels.push(sdata[i].y);
        pdata.push(sdata[i].a);
    }
    */

        var vdata = @json($DSSales);
        console.log('---------------------');
        console.log(vdata);
        console.log('---------------------');
        var clabels = [],
            clabelNames = [],
            cdata = [],
            bgColors = [];
        for (var i in vdata) {
            clabels.push(vdata[i].y);
            clabelNames.push(vdata[i].name);
            var dd = parseFloat(vdata[i].a);
            cdata.push(vdata[i].a);
            bgColors.push(cColors[Math.floor(Math.random() * cColors.length)]);
        }
        console.log(bgColors);

        var ctx = document.getElementById('bar-chart-horizontal');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: clabels,
                /*['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],*/
                datasets: [{
                    label: 'Monthly Sales',
                    data: cdata,
                    backgroundColor: bgColors,
                    borderColor: bgColors,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Monthly Sales By Customer'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {

                            var label = data.datasets[tooltipItem.datasetIndex].label || '';
                            // console.log('LABEl',tooltipItem.xlabel);
                            var clname = vdata[tooltipItem.index].name;

                            var nLabel = clname + "\n";
                            if (label) {
                                //claname+'\n\r'+
                                nLabel += "\n" + label + ':';
                            }
                            //console.log(nLabel);
                            nLabel += addCommas(tooltipItem
                            .yLabel); //Math.round(tooltipItem.yLabel * 100) / 100;
                            return nLabel;
                        }
                    }
                }
            }
        });

        function addCommas(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        };




    });

</script>
@stop
