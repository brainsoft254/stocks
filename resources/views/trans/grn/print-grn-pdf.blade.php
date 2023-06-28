<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>GoodReceiveNot-{{ $grn->refno }}</title>

    <style>
        .invoice-box {
            max-width: 100%;
            margin: auto;
            padding: 10px;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            /* border:dotted 1px #000;*/
        }

        tr.information td:first-child {
            padding-top: 150px !important;
        }

        tr.inv-totals td:first-child {
            /* padding-top: 350px !important;*/
        }

        tr.information td {
            font-size: 13px;
            line-height: 24px;
            font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
            font-weight: bold;
        }

        td.inv-details table td {
            text-align: right;
            border: dotted 1px #000 !important;
        }

        td.customer-details table td {
            text-align: left !important;
            /* border:dotted 1px #000 !important;*/
        }

        tr.heading td {
            background: #000;
            color: #fff;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            font-size: 13px;
        }

        tr.heading td {
            border-right: 1px dotted #fff !important;
        }

        tr.itemx td {
            border-bottom: 1px dotted #000 !important;
            border-right: 1px dotted #000 !important;
            font-size: 13px;
            line-height: 24px;
            font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
            font-weight: bold;
        }

        tr.itemx td:last-child {
            border-right: none !important;
        }

        .figures td {
            text-align: right;
            border: solid 1px #000;
            font-size: 13px;
            line-height: 24px;
            font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
            font-weight: bold;

        }

        .figures td:nth-child(1),
        td:nth-child(2) {
            border-top: none !important;
        }

    </style>

</head>

<body>


    <script type="text/php">
        if ( isset($pdf) ) { 
     $pdf->page_script('
     if ($PAGE_COUNT >= 1) {
     $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
     $size = 9;
     $pageText =  $PAGE_NUM . " / " . $PAGE_COUNT;
     $pageTextx = "Printed By: {{ Auth()->user()->name }}  ";
     $timestamp = "Timestamp: {{ Stockspro::getTimeStamp() }}";
     $y = 756;
     $x = 260;
     $pdf->text($x, $y, $pageText, $font, $size);
     $pdf->text(35, 756, $pageTextx, $font, $size);
     $pdf->text(420, 756, $timestamp, $font, $size);
 } 
 ');
}
</script>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; width:100%;">
            <tr class="information">
                <td>
                    <table cellpadding="0" cellspacing="0"
                        style="border-collapse: collapse; width:100%;margin-bottom:20px !important;">
                        <tr>
                            <td styl="width:70% border:solid 1px red">
                                <strong>Grn Type:
                                    {{ $grn->trantype>0?'Opening Stock':'Purchases' }}</strong><br>
                                <strong>Payment
                                    Mode:{{ $grn->pmode>0?'Credit':'Cash' }}</strong><br>
                                <strong>({{ $grn->clcode }})</strong><br>
                                <strong>Location: #{{ Stockspro::getLocationName($grn->location) }}</strong><br>
                            </td>
                            <td style="width:20% !important"></td>
                            <td class="inv-details " style="text-align: right !important;">
                                <strong>No#:{{ $grn->refno }}</strong><br><br>
                                <strong>Date: {{ $grn->trandate }}</strong><br>
                                <strong>Lpo: #{{ $grn->lpo }}</strong><br>

                            </td>
                        </tr>
                    </table>
                    <br />
                </td>
            </tr>


            <tr class="inv-grid">
                <td>
                    <table style="page-break-before:auto; border-collapse: collapse; width: 100%!important;">
                        <tr class="heading">
                            <td class="text-center" style="text-align: center!important;">#</td>
                            <td class="text-left" style="text-align: left!important;">Item</td>
                            <td class="text-left" style="text-align: left!important;">Description</td>
                            <td class="text-right" style="text-align: center!important;">Uom</td>
                            <td class="text-right" style="text-align: center!important;">Qty</td>
                            <td class="text-right" style="text-align: center!important;">Rate</td>
                            <td class="text-right" style="text-align: right!important;">Vat</td>
                            <td class="text-right" style="text-align: right!important;">Total</td>
                        </tr>
                        <?php $i=1;?>
                        @foreach($grn->grn_d as $det)

                            <tr class="itemx">

                                <td class="text-left" style="text-align: center!important; width:10%">{{ $i }}</td>
                                <td class="text-left" style="text-align: left!important; width:40%">
                                    {{ Str::title($det->icode) }}</td>
                                <td class="text-left" style="text-align: left!important; width:80%;padding-left: 4px">
                                    {{ Str::title($det->idesc) }}</td>
                                <td class="text-left" style="text-align: center!important; width:15%">
                                    {{ $det->punit }}</td>
                                <td class="text-left" style="text-align: center!important; width:15%">{{ $det->qty }}
                                </td>
                                <td class="text-left" style="text-align: center!important; width:20%">
                                    {{ number_format($det->price,2) }}</td>
                                <td class="text-right"
                                    style="text-align: right!important; width:25%;padding-right: 2px">
                                    {{ number_format($det->vat,2) }}
                                </td>
                                <td class="text-right"
                                    style="text-align: right!important; width:35%;padding-right: 2px">
                                    {{ number_format($det->total,2) }}</td>
                                <?php $i+=1; ?>
                            </tr>

                        @endforeach
                    </table>
                </td>
            </tr>
            <tr class="inv-totals">
                <td>
                    <table style="border-collapse: collapse; width:100% !important;">
                        <tr>
                            <td style="width: 66%"></td>
                            <td style="width: 34%">
                                <table style="border-collapse: collapse; width:100% !important;">
                                    <tr class="figures">
                                        <td class="text-right" style="padding-right: 4px;"><strong>Sub total</strong>
                                        </td>
                                        <td class="text-right">{{ number_format(($grn->total-$grn->vat),2) }}
                                        </td>
                                    </tr>
                                    <tr class="figures">
                                        <td class="text-right" style="padding-right: 4px;"><strong>Vat</strong></td>
                                        <td class="text-right">
                                            {{ number_format($grn->vat,2) }}
                                        </td>
                                    </tr>
                                    <tr class="figures">
                                        <td class="no-line text-right" style="padding-right: 4px;">
                                            <strong>Total</strong></td>
                                        <td class="no-line text-right">{{ number_format($grn->total,2) }}
                                        </td>

                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


    </div>
</body>

</html>
