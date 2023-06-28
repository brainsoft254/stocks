<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order</title>

    <style>
        .invoice-box {
            max-width: 100%;
            margin: auto;
            padding: 30px;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table td {
            padding: 0px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 30px;
            line-height: 25px;
            font-style: bold;
            font-family: sans-serif, Arial !important;
            color: #333;
        }

        .invoice-box table tr.information table {
            width: 100%;

        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #000;
            color: #fff;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box td.bill-totals table td {
            border-bottom: 2px solid #000;
            font-weight: bold;
        }

        .invoice-box table td.instructions,
        td.bill-totals {
            /*border-top:  2px solid #000;*/
            font-weight: bold;
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .inv-details {
            float: right;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .dotted {
            border: none;
            border-top: 2px dotted #000;
            color: #000;
            background-color: #fff;
            height: 1px;
            width: 100%;
        }

        .alert-success {
            color: green;
        }

        .alert-danger {
            color: red;
        }

        .alert-warning {
            color: orange;
        }

        td.td-item {
            padding: 10px;
            border-bottom: solid 2px #000;
            font-weight: bold;
        }

        tr.bill-row td {
            border-bottom: dotted 1px #000;
            /*   border-right: dotted 1px #000;*/
        }

        tr.bill-row td:nth-child(1) {
            /*  border-bottom: dotted 1px #000;*/
            border-right: dotted 1px #000;
        }

        .d-header{
          border:solid 1px #000;
          border-radius: 10px;
          padding: 8px 5px;
      }


    </style>

</head>

<body>
    <script type="text/php">
        if ( isset($pdf) ) { 
     $pdf->page_script('
     if ($PAGE_COUNT >= 1) {
     {{-- $font = Font_Metrics::get_font("Arial, Helvetica, sans-serif", "normal"); --}}
     $font = $fontMetrics->getFont("Arial, Helvetica, sans-serif", "normal");
     $size = 12;
     $pageText = "Page" . " " . $PAGE_NUM . " of " . $PAGE_COUNT;
     $y = 805;
     $x = 260;
     $pdf->text($x, $y, $pageText, $font, $size);
 } 
 ');
}
</script>
    <?php $p=1;?>

    <div class="invoice-box">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2 text-center">
            <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <!-- <h1 class="d-header"><strong></strong></h1> -->
            </div>
            <div class="col-md-5"></div>
        </div>
        <table cellpadding="0" cellspacing="0" style="width:100%">
            <tr class="top">
                <td colspan="12">
                    <table >
                        <tr>
                            <td class="inv-details" style="vertical-align: bottom; ">

                            </td>
                            <td class="title" >
                                <!-- <span>{{ $coy->name }}</span> -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="12">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td>
                                <strong>Delivery Note</strong><br>
                                REFNO:{{  $order->dno  }}<br>
                            </td>

                            <td class="inv-details">
                                <strong>LPONo: #{{ $order->refno }}</strong><br>
                                @if($order->voucherno!='')<strong>RCT VoucherNo: #{{ $order->voucherno }}</strong><br>@endif
                                <strong>Date: {{ $order->trandate }}</strong><br>
                            </td>

                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <strong>{{ $order->clientcode }}</strong><br>
                                <strong>({{ Stockspro::getClientName($order->clcode) }})</strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="itemx">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr class="heading">
                        <td>#</td>
                        <td class="text-left" style="text-align: left!important;">Item</td>
                        <td class="text-left" style="text-align: left!important;">Description</td>
                        <td class="text-right" style="text-align: center!important;">Uom</td>
                        <td class="text-right" style="text-align: center!important;">Qty</td>
                    </tr>
                    <?php $i=1;$totalQty=0;?>
                    @foreach($details as $det)
                        <tr class="bill-row">
                            <td style="padding-right: 4px;">{{ $i }}</td>
                            <td class="text-left" style="text-align: left!important; width:40%;padding-left: 4px;">
                                {{ Str::title($det->icode) }}</td>
                            <td class="text-left" style="text-align: left!important; width:70%; padding-left: 4px;">
                                {{ Str::title($det->description) }}</td>
                            <td class="text-left" style="text-align: center!important; width:20%">{{ $det->uom }}</td>
                            <td class="text-left" style="text-align: center!important; width:20%">{{ $det->qty }}</td>
                        </tr>
                        <?php $i+=1;$totalQty+=$det->qty;?>
                    @endforeach

                </table>
            </tr>
        </table>
        <br />
        <br />
        <br />
        <br />
        <table style="width: 87%; border-collapse:collapse; ">
            <tr>
                <td class="instructions" colspan="7" style="width:80%!important;">
                    <table style="border-top:dotted 2px #000">
                        <tr>
                            <td><i><b></b></i></td>
                        </tr>
                        <tr>
                            <td>
                           <br/>
                           <br/>
                           <br/>

                            </td>
                        </tr>
                        <tr>
                            <td style="font:16px arial"><i>Printed By {{ Auth::User()->name }} |
                                    Timestamp:{{ $tstamp }}</i></td>
                        </tr>
                    </table>
                </td>
                <td class="bill-totals" colspan="2" style="width:20%!important;">
                    <table style="border-collapse: collapse; width:200px !important; border-top: solid 2px #000">
                        <tr class="figures">
                            <td class="no-line text-right"><strong>Total</strong></td>
                            <td class="no-line text-right">{{ number_format($totalQty,2) }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br />
        <br />
        <br />
        <!-- <span style="font-style: italic;"><strong>*Valid Computer Generated</strong></span> -->

        <?php //if($p%2==0){echo "<br><br/><hr class='dotted' style='page-break-after: always;'/>";}else{echo "<br/><br/><hr class='dotted'/><br/><br/>";} $p+=1;?>

    </div>
</body>

</html>
