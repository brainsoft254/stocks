<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice-{{$ret->invno}}</title>
    
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
        padding-top: 150px !important;
    }
    tr.inv-totals td:first-child{
       /* padding-top: 350px !important;*/
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
     $pageTextx = "Printed By: {{Auth()->user()->name}}  ";
     $timestamp = "Timestamp: {{Stockspro::getTimeStamp()}}";
     $y = 756;
     $x = 260;
     $pdf->text($x, $y, $pageText, $font, $size);
     $pdf->text(35, 756, $pageTextx, $font, $size);
     $pdf->text(420, 756, $timestamp, $font, $size);
 } 
 ');
}
</script>
<?php $p=1;$clContacts=Stockspro::getClientContacts($ret->clcode);?>


<div class="invoice-box" >
    <table cellpadding="0" cellspacing="0"  style="border-collapse: collapse; width:100%;">
      <tr class="information" >
        <td>
            <table style="width:100%;">
                <tr>
                    <td class="customer-details">
                        <table style="border-collapse: collapse; width: 100%!important;">
                            <tr><td><strong>To:</strong></td></tr>
                            <tr><td><strong>{{Stockspro::getClientName($ret->clcode)}})</strong><br>({{$ret->clcode}})</td></tr>
                            <tr><td>{{$clContacts->pobox}}</td></tr>
                            <tr><td>Tel:{{$clContacts->tel}}</td></tr>
                            
                        </table>
                    </td>
                    <td class="inv-details">
                        
                        <table style="border-collapse: collapse; width: 100%!important; float:right;">
                            <tr><td> <strong>Creditnote No#:</strong></td><td><strong>{{$ret->refno}}</strong></td></tr>
                            <tr><td> <strong>Date:</strong></td><td><strong>{{$ret->trandate}}</strong></td></tr>
                            <tr><td> <strong>InvNo:</strong></td><td><strong>{{$ret->invno}}</strong></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br/>
        </td>
    </tr>
    <tr class="inv-grid">
        <td>
            <table style="page-break-before:auto; border-collapse: collapse; width: 100%!important;">
                <tr class="heading" >
                    <td class="text-center" style="text-align: center!important;">#</td>
                    <td class="text-left" style="text-align: left!important;">Code</td>
                    <td class="text-right" style="text-align: center!important;">Description</td>
                    <td class="text-left" style="text-align: center!important;">PU</td>
                    <td class="text-right" style="text-align: center!important;">Qty</td>
                    <td class="text-right" style="text-align: right!important;">Rate</td>
                    <td class="text-right" style="text-align: right!important;">Vat</td>
                    <td class="text-right" style="text-align: right!important;">Total</td>
                </tr>
                <?php $i=1;?>
                @foreach ($details as $det)
                    
                <tr class="itemx">

                    <td class="text-left" style="text-align: center!important; width:10%">{{$i}}</td>
                    <td class="text-left"  style="text-align: left!important; width:50%" >{{$det->icode}}</td>
                    <td class="text-left" style="text-align: center!important; width:70%">{{$det->idesc}}</td>
                    <td class="text-left" style="text-align: center!important; width:20%;padding-left: 4px" >{{$det->uom}}</td>
                    <td class="text-right" style="text-align: center!important; width:25%;padding-right: 2px">{{$det->qty}}</td>
                    <td class="text-right" style="text-align: right!important; width:25%;padding-right: 2px">{{number_format($det->rate,2)}}</td>
                    <td class="text-right" style="text-align: right!important; width:25%;padding-right: 2px">{{number_format($det->vat,2)}}</td>
                    <td class="text-right" style="text-align: right!important; width:35%;padding-right: 2px">{{number_format($det->total,2)}}</td>
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
                <td style="width: 66%">
                    <strong>Remarks:</strong><br/>
                    {{Str::title($ret->remarks)}}
                </td>
                <td style="width: 34%">
                    <table style="border-collapse: collapse; width:100% !important;">
                        <tr class="figures">
                            <td class="text-right" style="padding-right: 4px;"><strong>Sub total</strong></td>
                                <td class="text-right">{{number_format($ret->amount-$ret->vat,2)}}</td>
                        </tr>
                        <tr class="figures">
                            <td class="text-right" style="padding-right: 4px;"><strong>Vat</strong></td>
                            <td class="text-right">{{number_format($ret->vat,2)}}</td>
                        </tr>
                        <tr class="figures">
                            <td class="no-line text-right" style="padding-right: 4px;"><strong>Total</strong></td>
                            <td class="no-line text-right">{{number_format($ret->amount,2)}}</td>
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
