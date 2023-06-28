<html>
<head>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 70px 40px 40px 50px;
        }

        header {
            /*position: fixed;
            margin-top: 20px;
            left: 0px;
            right: 0px;*/
       /*     position: fixed;
            top: 10px;
            width: 100%;
            height: 50px*/;
        }

        main { 
            /*position: relative;*/
            /* margin-top: 10px;*/
        /*left: 0px;
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
        font-size: 12px;
        line-height: 22px;
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
    <?php $p=1;$clContacts=Stockspro::getClientContacts($creditnote->clcode);?>
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
                <table style="width:100%;">
                    <tr>
                        <td class="customer-details">
                            <table style="border-collapse: collapse; width: 100%!important;">
                                <tr><td><strong>To:</strong></td></tr>
                                <tr><td><strong>{{Stockspro::getClientName($creditnote->clcode)}})</strong><br>({{$creditnote->clcode}})</td></tr>
                                <tr><td>{{$clContacts->pobox}}</td></tr>
                                <tr><td>Tel:{{$clContacts->tel}}</td></tr>

                            </table>
                        </td>
                        <td class="inv-details">

                            <table style="border-collapse: collapse; width: 100%!important; float:right;">
                                <tr><td> <strong>Creditnote No#:</strong></td><td><strong>{{$creditnote->refno}}</strong></td></tr>
                                <tr><td> <strong>Date:</strong></td><td><strong>{{$creditnote->trandate}}</strong></td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br/>
            </td>
        </tr> 
    </table>       
</header>
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
     $y = 756;
     $x = 260;
     $pdf->text($x, $y, $pageText, $font, $size);
     $pdf->text(35, 756, $pageTextx, $font, $size);
     $pdf->text(420, 756, $timestamp, $font, $size);
 } 
 ');
}
</script>

</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
   <br/>       
   <br/> 
   <!--  <p style="page-break-after: always;"> -->
    <table style="border-collapse: collapse; width: 100%!important;">
        <tr class="heading" >
            <td class="text-center" style="text-align: center!important;">#</td>
            <td class="text-left" style="text-align: left!important;">Invno</td>
            <td class="text-right" style="text-align: center!important;">Invdate</td>
            <td class="text-left" style="text-align: left!important;">Description</td>
            <td class="text-right" style="text-align: right!important;">Balance</td>
            <td class="text-right" style="text-align: right!important;">CrAMNT</td>
        </tr>
        <?php $i=1;?>
        @foreach ($details as $det)
        <tr class="itemx">
            <td class="text-left" style="text-align: center!important; width:10%">{{$i}}</td>
            <td class="text-left"  style="text-align: left!important; width:20%" >{{$det->invno}}</td>
            <td class="text-left" style="text-align: center!important; width:20%">{{$det->invdate}}</td>
            <td class="text-left" style="text-align: left!important; width:90%;padding-left: 4px" >{{Str::title($det->rmks)}}</td>
            <td class="text-right" style="text-align: right!important; width:25%;padding-right: 2px">{{number_format($det->invamnt,2)}}</td>
            <td class="text-right" style="text-align: right!important; width:35%;padding-right: 2px">{{number_format($det->cramnt,2)}}</td>
            <?php $i+=1; ?>
        </tr>

        @endforeach
    </table>  
    <table style="border-collapse: collapse; width:100% !important;">
        <tr>
            <td style="width: 66%">
                <strong>Remarks:</strong><br/>
                {{Str::title($creditnote->remarks)}}
            </td>
            <td style="width: 34%">
                <table style="border-collapse: collapse; width:100% !important;">
                    <tr class="figures">
                        <td class="text-right" style="padding-right: 4px;"><strong>Sub total</strong></td>
                        <td class="text-right">{{number_format($creditnote->amount,2)}}</td>
                    </tr>
                    <tr class="figures">
                        <td class="text-right" style="padding-right: 4px;"><strong>Vat</strong></td>
                        <td class="text-right">{{number_format(0,2)}}</td>
                    </tr>
                    <tr class="figures">
                        <td class="no-line text-right" style="padding-right: 4px;"><strong>Total</strong></td>
                        <td class="no-line text-right">{{number_format($creditnote->amount,2)}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</main>
</body>
</html>