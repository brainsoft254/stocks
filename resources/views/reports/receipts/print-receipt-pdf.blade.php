<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt-{{$receipt->rno}}</title>
    
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
      <tr class="information">
        <td>
            <table style="width:100%;">
                <tr>
                    <td class="customer-details">
                        <table style="border-collapse: collapse; width: 100%!important;">
                            <tr><td><strong>To:</strong></td></tr>
                            <tr><td><strong>{{Stockspro::getClientName($receipt->clcode)}})</strong><br>({{$receipt->clcode}})</td></tr>
                            <tr><td>{{$coy->address}}-{{$coy->town}}</td></tr>
                        </table>
                    </td>
                    <td class="inv-details">
                        <br>
                        <table style="border-collapse: collapse; width: 100%!important; float:right;">
                            <tr><td> <strong>No#:</strong></td><td><strong>{{$receipt->rno}}</strong></td></tr>
                            <tr><td> <strong>Date:</strong></td><td><strong>{{$receipt->trandate}}</strong></td></tr>
                            <tr><td> <strong>RefNo/ChequeNo#:</strong></td><td><strong>{{$receipt->refno}}/{{$receipt->chequeno}}</strong></td></tr>
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
                    <td class="text-center" style="text-align: center!important;">#</td>
                    <td class="text-left" style="text-align: left!important;">Invno</td>
                    <td class="text-left" style="text-align: left!important;">Invdate</td>
                    <td class="text-right" style="text-align: center!important;">Lpo</td>
                    <td class="text-right" style="text-align: center!important;">Due</td>
                    <td class="text-right" style="text-align: right!important;">Paid</td>
                </tr>
                <?php $i=1;$totaldue=0;?>
                @foreach ($details as $det)
                <tr class="itemx">
                    <td class="text-left" style="text-align: center!important; width:10%">{{$i}}</td>
                    <td class="text-left"  style="text-align: left!important; width:40%" >{{Str::title($det->invno)}}</td>
                    <td class="text-left" style="text-align: center!important; width:35%">{{$det->invdate}}</td>
                    <td class="text-left" style="text-align: center!important; width:35%">{{$det->lpo}}</td>
                    <td class="text-left" style="text-align: center!important; width:40%">{{number_format($det->due,0)}}</td>
                    <td class="text-right" style="text-align: right!important; width:40%;padding-right: 2px">{{number_format($det->paid,2)}}</td>
                    
                    <?php $i+=1;$totaldue+=$det->due;?>
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
                            <td class="text-right" style="padding-right: 4px;"><strong>Total Due</strong></td>
                            <td class="text-right">{{number_format($totaldue,2)}}</td>
                        </tr>
                        <tr class="figures">
                            <td class="text-right" style="padding-right: 4px;"><strong>Total Paid</strong></td>
                            <td class="text-right">{{number_format($receipt->amount,2)}}</td>
                        </tr>
                        <tr class="figures">
                            <td class="no-line text-right" style="padding-right: 4px;"><strong>Bal C/F</strong></td>
                            <td class="no-line text-right">{{number_format($receipt->balcf,2)}}</td>
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
