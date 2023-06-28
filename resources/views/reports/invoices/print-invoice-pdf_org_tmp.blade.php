<html>
<head>
    <style>
    /** Define the margins of your page **/
    @page {
        margin-top: 255px 1px;
    }

/* 
    header {
        position: fixed;
        margin-top: 170px;
        left: 0px;
        right: 0px;
      

    } */

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
        position: fixed; 
        bottom: -60px; 
        left: 0px; 
        right: 0px;
        height: 50px; 

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
   <?php $p=1;$clContacts=Stockspro::getClientContacts($invoice->clcode);?>
   <!-- Define header and footer blocks before your content -->
   <header>
       
       <table cellpadding="0" cellspacing="0"  style="border-collapse: collapse; width:100%;">
         <tr class="information" >
           <td>
               <table style="width:100%;">
                   <tr>
                       <td class="customer-details">
                           
                           <table style="border-collapse: collapse; width: 100%!important;">
                               <tr><td><strong>To:</strong></td></tr>
                               <tr><td><strong>{{Stockspro::getClientName($invoice->clcode)}})</strong><br>({{$invoice->clcode}})</td></tr>
                               <tr><td>{{$clContacts->pobox}}</td></tr>
                               <tr><td>Tel:{{$clContacts->tel}}</td></tr>

                           </table>
                       </td>
                       <td class="inv-details">
                           <br/><br/>
                           <table style="border-collapse: collapse; width: 100%!important; float:right;">
                               <tr><td> <strong></strong></td><td><strong>{{$invoice->invno}}</strong></td></tr>
                               <tr><td> <strong>Date:</strong></td><td><strong>{{$invoice->invdate}}</strong></td></tr>
                               <tr><td> <strong>Lpo#:</strong></td><td><strong>{{$invoice->lpo}}</strong></td></tr>
                               @if($voucherno)<tr><td> <strong>RCT-VoucherNO#:</strong></td><td><strong>{{$voucherno}}</strong></td></tr>@endif
                               @if($dno)<tr><td> <strong>DeliveryNote NO#:</strong></td><td><strong>{{$dno}}</strong></td></tr>@endif                               
                           </table>
                       </td>
                   </tr>
               </table>
               <br/>
           </td>
       </tr>
   </table>  
</header>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
  <br/>       
 <br/> 
 <!--  <p style="page-break-after: always;"> -->
    <table style="border-collapse: collapse; width: 100%!important;">
        <tr class="heading" >
            <td></td>
            <td class="text-center" style="text-align: center!important;">#</td>
            <td class="text-left" style="text-align: left!important;">Item</td>
            <td class="text-left" style="text-align: left!important; color:red">Description</td>
            <td class="text-right" style="text-align: center!important;">Uom</td>
            <td class="text-right" style="text-align: center!important;">Qty</td>
            <td class="text-right" style="text-align: center!important;">Rate</td>
            <td class="text-right" style="text-align: right!important;">Vat</td>
            <td class="text-right" style="text-align: right!important;">Total</td>
        </tr>
        <?php $i=1;?>
        @foreach ($details as $det)

        <tr class="itemx">
            <td><?php if($i%20==0){echo"<br/><div style='page-break-after:always;'></div><hr/>";}?></td>
            <td class="text-left" style="text-align: center!important; width:10%">{{$i}} </td>
            <td class="text-left"  style="text-align: left!important; width:40%" >{{Str::title($det->icode)}}</td>
            <td class="text-left" style="text-align: left!important; width:80%;padding-left: 4px" >{{Str::title($det->idesc)}}</td>
            <td class="text-left" style="text-align: center!important; width:15%">{{$det->punit}}</td>
            <td class="text-left" style="text-align: center!important; width:15%">{{$det->qty}}</td>
            <td class="text-left" style="text-align: center!important; width:20%">{{number_format($det->price,2)}}</td>
            <td class="text-right" style="text-align: right!important; width:25%;padding-right: 2px">{{$clContacts->hasvat>0?number_format($det->vat,2):'0.00'}}</td>
            <td class="text-right" style="text-align: right!important; width:35%;padding-right: 2px">{{number_format($det->total,2)}}</td>
            <?php $i+=1; ?>
        </tr>
        @endforeach
    </table>  
    <table style="border-collapse: collapse; width:100% !important;">
        <tr>
            <td style="width: 66%"></td>
            <td style="width: 34%">
                <table style="border-collapse: collapse; width:100% !important;">
                    <tr class="figures">
                        <td class="text-right" style="padding-right: 4px;"><strong>Sub total</strong></td>

                            @if($clContacts->hasvat>0)
                                @if(Stockspro::isVatable($invoice->clcode))
                                    <td class="text-right">{{number_format($invoice->amount,2)}}</td>
                                @else
                                    <td class="text-right">{{number_format($invoice->amount-$invoice->vat,2)}}</td>
                                @endif
                            @else
                                <td class="text-right">{{number_format($invoice->amount,2)}}</td>
                            @endif
                    </tr>
                    @if($invoice->discount>0)
                    <tr class="figures">
                        <td class="text-right" style="padding-right: 4px;"><strong>Discount {{number_format($invoice->discrate)}}%</strong></td>
                            <td class="text-right">{{number_format($invoice->discount,2)}}</td>
                    </tr>
                    @endif 
                    <!-- Var calculation when we have Discount Applied -->
                    @if($invoice->discount>0)
                        <?php
                             $vat=0;
                             if(Stockspro::isVatable($invoice->clcode)){
                                $vat=($invoice->amount-$invoice->discount)*0.16;
                             }else{
                                $vat=($invoice->amount-$invoice->vat-$invoice->discount)*0.16;
                             }
                        ?>
                    <tr class="figures">
                        <td class="text-right" style="padding-right: 4px;"><strong>Vat</strong></td>
                            <td class="text-right">{{number_format($vat,2)}}</td>
                    </tr>
                    @else
                    <!-- Normal Vat Calculation from order -->
                    <tr class="figures">
                        <td class="text-right" style="padding-right: 4px;"><strong>Vat</strong></td>
                            <td class="text-right">{{$clContacts->hasvat>0?number_format($invoice->vat,2):'0.00'}}</td>
                    </tr>
                    @endif
                    <tr class="figures">
                        <td class="no-line text-right" style="padding-right: 4px;"><strong>Total</strong></td>
                        <!-- Calculation of Total in a Discount Situation -->
                        @if($invoice->discount>0)
                        <?php
                            $invTotal=0;
                            if(Stockspro::isVatable($invoice->clcode)){
                               //take amount-discount+vat(without discount)
                              $invTotal = ($invoice->amount-$invoice->discount)+$vat;
                            }else{
                             //Minus vat from total amount then minus discount add vat(without discount)
                              $invTotal = ($invoice->amount-$invoice->vat-$invoice->discount)+$vat;  
                                
                            }

                        ?>
                        <td class="text-right" style="color:red;text-align: right;width:60%!important;">{{number_format($invTotal,2)}}</td>
                        @else
                        <!-- Normal Total Workings without Discount -->

                            @if($clContacts->hasvat>0)
                                 @if(Stockspro::isVatable($invoice->clcode))
                                    <td class="no-line text-right">{{number_format(($invoice->amount+$invoice->vat),2)}}</td>
                                @else
                                    <td class="no-line text-right">{{number_format($invoice->amount,2)}}</td>
                                @endif
                            @else
                                <td class="no-line text-right">{{number_format($invoice->amount,2)}}</td>
                            @endif
                        @endif
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <footer>
        <script type="text/php">
            if ( isset($pdf) ) { 
            $pdf->page_script('
            if ($PAGE_COUNT >=1) {
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $size = 9;
            $pageText =  $PAGE_NUM . " / " . $PAGE_COUNT;
            $pageTextx = "Printed By: {{Auth()->user()->name}}  ";
            $timestamp = "Timestamp: {{Stockspro::getTimeStamp()}}";
            $y = 806;
            $x = 260;
            $pdf->text($x, $y, $pageText, $font, $size);
            $pdf->text(35, 806, $pageTextx, $font, $size);
            $pdf->text(420, 806, $timestamp, $font, $size);
        } 
        ');
     }
     </script>
     
     </footer>
</main>
</body>
</html>