<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>StockLevel-{{$ttimestamp}}</title>
    
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
    tr.information td:first-child{
        padding-top: 10px !important;
    }
    tr.information td{
        font-size: 13px;
        line-height: 24px;
        font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
        font-weight: bold;
    }
    td.inv-details table td{
        text-align: right;
        border:dotted 1px #000 !important;
    }
    td.customer-details table td{
        text-align: left !important;
        /* border:dotted 1px #000 !important;*/
    }

    tr.heading td {
        background: #000;
        color:#fff;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        font-size: 13px;
    }
    tr.heading td{
        border-right: 1px dotted #fff !important;
    }
    tr.itemx td{
        border-bottom: 1px dotted #000 !important;
        border-right: 1px dotted #000 !important;
        font-size: 13px;
        line-height: 24px;
        font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
        font-weight: bold;
    }
    tr.itemx td:last-child{
        border-right: none  !important;
    }

    .figures td{
        text-align: right;
        border:solid 1px #000;
        font-size: 13px;
        line-height: 24px;
        font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
        font-weight: bold;

    }
    .figures td:nth-child(1),td:nth-child(2){
        border-top:none !important;
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
     $y = 776;
     $x = 260;
     $pdf->text($x, $y, $pageText, $font, $size);
 } 
 ');
}
</script>
<?php $p=1;?>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0"  style="border-collapse: collapse; width:100%;">
        <tr class="top">
            <td >
                <table style="width:100%;border-bottom: solid 1px #272822;">
                    <tr>
                        <td class="title">
                            <span>{{$coy->name}}</span>
                        </td>
                        <td class="inv-details">
                            <strong>STOCK LEVELS REPORT</strong><br>

                        </td>
                        
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td>
                <table style="width:100%;">
                    <tr>
                        <td class="customer-details">
                            <table style="border-collapse: collapse; width: 100%!important;">
                                <tr><td><strong>{{$coy->address}}-{{$coy->town}}</strong></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                            </table>
                            <br/>
                        </td>
                        <td class="inv-details">
                            <br>
                            <table style="border-collapse: collapse; width: 100%!important; float:right;">
                                <tr><td> <strong>Location#:</strong></td><td><strong>{{Stockspro::getLocationName($location)}}</strong></td></tr>
                                <tr><td> <strong>Date:</strong></td><td><strong>{{$tstamp}}</strong></td></tr>

                            </table>
                        </td>
                    </tr>
                </table>
                <br/>
            </td>
        </tr>
        <tr class="inv-grid">
            <td>
                <table style="border-collapse: collapse; width: 100%!important;">
                    <tr class="heading">
                        <td class="text-left">Item</td>
                        <td class="text-left" style="text-align: left!important;">Description</td>
                        <td class="text-right" style="text-align: right!important;">Qty</td>
                        <td class="text-right" style="text-align: right!important;">Cost</td>
                        <td class="text-right" style="text-align: right!important;">Value</td>
                    </tr>
                    <?php $tvalue=0;?>
                    @foreach ($details as $det)
                    <tr class="itemx">
                        <td class="text-left" style="text-align: left!important; width:40%">{{$det->code}}</td>
                        <td class="text-left" style="text-align: left!important; width:80%" >{{Stockspro::getItemDescr($det->code)}}</td>
                        <td class="text-left">{{number_format($det->qty,0)}}</td>
                        <td class="text-right">{{number_format(Stockspro::getBuyingPrice($det->code),0)}}</td>
                        <td class="text-right" style="text-align: right!important;">{{number_format(($det->qty*Stockspro::getBuyingPrice($det->code)),0)}}</td>
                        <?php $tvalue+=($det->qty*Stockspro::getBuyingPrice($det->code));?>
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
                                <td class="no-line text-right" style="padding-right: 4px;"><strong>Total</strong></td>
                                <td class="no-line text-right">{{number_format($tvalue,0)}}</td>
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
