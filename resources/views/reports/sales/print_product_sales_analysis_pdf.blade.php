<html>
<head>
    <style>
    /** Define the margins of your page **/
    @page {
            margin: 70px 40px 40px 50px;
        }

    header {
 /*       position: fixed;
        margin-top: 70px;
        left: 0px;
        right: 0px;*/
        

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


    footer {
        /*position: fixed; 
        
        left: 0px; 
        right: 0px;
        /*height: 50px; 
        bottom: -10px; 
        */

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
    <!-- Define header and footer blocks before your content -->
   
    <header>
        <table cellpadding="0" cellspacing="0"  style="border-collapse: collapse; width:100%;">
          <tr class="information" >
            <td style="border-bottom: solid 1px #000; width:100%;">
                <table style="width:100%; border-collapse: collapse;">
                    <tr>
                        <td class="customer-details">

                            <img src="{{asset($coy->getFirstMediaUrl('logo'))}}" alt="{{ $coy->name }}" class=" responsive" style="width:150px;" />
                        </td>
                        <td class="inv-detailsx">

                            <table style="border-collapse: collapse; width: 100%!important;">
                                <tr><td><strong><h2>{{$coy->name}}</h2></strong></td></tr>
                                <tr><td>{{$coy->address}},{{$coy->town}}</td></tr>
                                <tr><td>Email: {{$coy->email}}</td></tr>
                                <tr><td>Tel: {{$coy->cellphone}}/{{$coy->telephone}}</td></tr>
                                
                            </table>
                        </td>
                    </tr>
                </table>
                <br/>
            </td>
        </tr>

        <tr class="information" >
            <td>
                <br/>
                <table style="width:100%;">
                    <tr>
                        <td class="customer-details">
                            <table style="border-collapse: collapse; width: 100%!important;">
                                <tr><td><strong>Product Sales Analysis </strong></td></tr>
                                <tr><td><</td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                
                            </table>
                        </td>
                        <td class="inv-details">

                            <table style="border-collapse: collapse; width: 100%!important; float:right;">
                                <tr><td> <strong></strong></td><td><strong>Analysis Period</strong></td></tr>
                                <tr><td> <strong>From:</strong></td><td><strong>From: {{$dfrom}}</strong></td></tr>
                                <tr><td> <strong>To:</strong></td><td><strong>To: {{$dto}}</strong></td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br/>
            </td>
        </tr> 
    </table>       
</header>
<br/>
<br/>
<br/>
<footer>
 <script type="text/php">
     if ( isset($pdf) ) { 
     $pdf->page_script('
     if ($PAGE_COUNT >=1) {
     $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
     $size = 9;
     $pageText =  $PAGE_NUM . " / " . $PAGE_COUNT;
     $pageTextx = "Printed By: {{Auth()->user()->name}}  ";
     $pageTitle= "Product Sales Analysis ";
     $timestamp = "Timestamp: {{Stockspro::getTimeStamp()}}";
     $y = 765;
     $x = 260;
     $pdf->text($x, $y, $pageText, $font, $size);
     $pdf->text(35, $y, $pageTextx, $font, $size);
     $pdf->text(420, $y, $timestamp, $font, $size);

     $pdf->text(35, 10, $pageTitle, $font, $size);
 } 
 ');
}
</script>

</footer>

<main>
       <table style="border-collapse: collapse; width: 100%!important;">
         @foreach($master as $item)
                        <tr class="text-primary"><th colspan="7" style="border-bottom: solid 1px red">{{$item->idesc}}</th></tr>
            <tr class="heading">
                <td class="text-center" style="text-align: center!important;">#</td>
                <td class="text-left" style="text-align: left!important;">Trandate</td>
                <td class="text-left" style="text-align: left!important;">Invno</td>
                <td class="text-left" style="text-align: center!important;">Item</td>
                <td class="text-left" style="text-align: right!important;">LPO</td>
                <td class="text-right" style="text-align: right!important;">Qty</td>
                <td class="text-right" style="text-align: right!important;">Amount</td>

            </tr>
            <?php $i=1; $total=0;$tqty=0;?>
            @foreach ($details as $sale)
                @if($item->icode==$sale->icode)
                <tr class="itemx">
                    <td class="text-left" style="text-align: center!important; ">{{$i}}</td>
                    <td class="text-left"  style="text-align: left!important; " >{{$sale->invdate}}</td>
                    <td class="text-left" style="text-align: center!important; ">{{$sale->invno}}</td>
                    <td class="text-left" style="text-align: left!important; padding-left: 4px" >{{$sale->icode}}</td>
                    <td class="text-left" style="text-align: right!important; padding-right: 2px">{{$sale->lpo}}</td>
                    <td class="text-right" style="text-align: right!important; padding-right: 2px">{{$sale->qty}}</td>
                    <td class="text-left" style="text-align: right!important; ">{{number_format($sale->total,0)}}</td>
                    <?php $total+=$sale->total;$i+=1;$tqty+=$sale->qty;?>
                </tr>
                @endif
            @endforeach
            <tr class="tr_subtotal bg-danger">
                <td colspan="5" class="text-right"style="text-align: right"><strong>Total: </strong></td>
                <td colspan="1" class="text-right" style="text-align: right"><strong>{{number_format($tqty,2)}}</strong></td>
                <td colspan="1" class="text-right" style="text-align: right"><strong>{{number_format($total,2)}}</strong></td>

            </tr>            
             @endforeach
    </table>
             
</main>
</body>
</html>