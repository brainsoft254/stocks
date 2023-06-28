<html>
<head>
    <style>
    /** Define the margins of your page **/
    @page {
        margin-top: 170px 1px;
    }

    header {
        position: fixed;
        margin-top: 160px;
        left: 0px;
        right: 0px;
        

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
    <?php $p=1;$clContacts=Stockspro::getClientContacts($client->code);?>
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
                                <tr><td><strong>{{$client->name}})</strong><br>({{$client->code}})</td></tr>
                                <tr><td>{{$clContacts->pobox}}</td></tr>
                                <tr><td>Tel:{{$clContacts->tel}}</td></tr>
                            </table>
                        </td>
                        <td class="inv-details">
                            <table style="border-collapse: collapse; width: 100%!important; float:right;">
                                <tr><td> <strong></strong></td><td><strong>Client Statement</strong></td></tr>
                                <tr><td> <strong>From:</strong></td><td><strong>{{$dfrom}}</strong></td></tr>
                                <tr><td> <strong>To:</strong></td><td><strong>{{$dto}}</strong></td></tr>
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
     $y = 570;
     $x = 50;
     $pdf->text($x, $y, $pageText, $font, $size);
     $pdf->text(200, 570, $pageTextx, $font, $size);
     $pdf->text(500, 570, $timestamp, $font, $size);
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
            <td class="text-center">#</td>
            <td class="text-left" style="text-align: left!important;">Date</td>
            <td class="text-left" style="text-align: left!important;">Trantype</td>
            <td class="text-left" style="text-align: left!important;">Trancode</td>
            <td class="text-left" style="text-align: left!important;">Remarks</td>
            <td class="text-left" style="text-align: right!important;">Debit</td>
            <td class="text-left" style="text-align: right!important;">Credit</td>
            <td class="text-left" style="text-align: right!important;">Balance</td>
        </tr>

        <?php $i=1; $bal=0;?>
        @foreach ($statement as $stat)
        <?php $bal=$bal+$stat->debit-$stat->credit?>
        <tr class="itemx" >
            <td class="text-left">{{$i}}</td>
            <td class="text-left" style="text-align: left!important;" >{{$stat->jtdate}}</td>
            <td class="text-left" style="text-align: left!important;" >{{$stat->tranref}}</td>
            <td class="text-left" style="text-align: left!important;" >{{$stat->trancode}}</td>
            <td class="text-left" style="text-align: left!important;" >{{$stat->trandesc}}</td>
            <td class="text-right" style="text-align: right!important;">{{number_format($stat->debit,0)}}</td>
            <td class="text-right" style="text-align: right!important;">{{number_format($stat->credit,0)}}</td>
            <td class="text-right" style="text-align: right!important;">{{number_format($bal,0)}}</td>
        </tr>
        <?php $i+=1;?>
        @endforeach
    </table>  
    <table style="border-collapse: collapse; width:100% !important;">
        <tr>
            <td style="width: 66%"></td>
            <td style="width: 34%">
                <table style="border-collapse: collapse; width:100% !important;">
                    <tr>
                        <td style="width: 66%"></td>
                        <td style="width: 34%">
                            <table style="border-collapse: collapse; width:100% !important;">
                                <tr class="figures">
                                    <td class="no-line text-right" style="padding-right: 4px;"><strong>Total</strong></td>
                                    <td class="no-line text-right">{{number_format($bal,2)}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</main>
</body>
</html>