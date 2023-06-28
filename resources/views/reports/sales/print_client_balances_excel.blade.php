<html>
<head>
    <style>
    /** Define the margins of your page **/
    @page {
            margin: 70px 40px 40px 50px;
        }
    @page {
        size: 21cm 29.7cm;
        margin-top: 1.85cm;
        margin-bottom: 0.32cm;
        border: 1px solid blue;
    }
    content {
        color: blue;
        position:absolute; top:108.46mm; left:25mm;
    }
    footer {
        color: red;
        position:absolute; top:270mm; left:25mm;
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
    .wrapper-page {
    page-break-after: always;
    }

    .wrapper-page:last-child {
        page-break-after: avoid;
    }


</style>
</head>
<body>
    <!-- Define header and footer blocks before your content -->
   
<div class='header'>
    <table style="border-collapse: collapse; width: 100%!important; float:right;">
        <tr><td><strong>Client Type:</strong></td><td class="text-primary"><b>{{$client_type}}</b></td></tr>
        <tr><td><b>Report Type:</b></td><td class="text-danger"><b>{{$report_type}}</b></td></tr>
        <tr><td><b>Client:</b></td><td class="text-success"><b>{{$client==-1?'ALL': $client}}: {{$client!=-1?Stockspro::getClientName($client):'*ALL CLIENTS*'}}</b></td></tr>
        <tr><td><b>TOTAL BALANCES:</b></td><td class="text-danger bg-danger text-c"><b>{{number_format($totalBals,2)}}</b></td></tr>
    </table>
</div>
<div class='main'>
       <table style="border-collapse: collapse; width: 100%!important;">
        @if($parent==1 && $summary!=1 && $client==-1)
            {{-- {{dd($parents->sortByDesc(function($par) use ($parents){return $parents->where('attachedto',$par->code)->count();}) )}} --}}
            @foreach($parents as $parent)
                   
                @if($parent->children>1)
                <tr class="text-primary"><td colspan="4" style="border-bottom: solid 1px #f3f3f3">{{$parent->name}}</td></tr>
                    <tr class="heading">
                        <td class="text-center" style="text-align: center!important;">#</td>
                        <td class="text-left" style="text-align: left!important;">Code</td>
                        <td class="text-left" style="text-align: left!important;">Name</td>
                        <td class="text-right" style="text-align: right!important;">Amount</td>
                    </tr>
                @endif 
                <?php $i=1; $total=0;?>
                @foreach ($details as $det)
                    @if($parent->code==$det->parent)
                    <tr class="itemx">
                        <td class="text-left" style="text-align: center!important; ">{{$i}}</td>
                        <td class="text-left"  style="text-align: left!important; " >{{$det->code}}</td>
                        <td class="text-left" style="text-align: left!important; padding-left: 4px" >{{$det->name}}</td>
                        <td class="text-left" style="text-align: right!important; ">{{number_format($det->bal,2)}}</td>
                        <?php $total+=$det->bal;$i+=1;?>
                    </tr>
                    @endif
                @endforeach
                    @if($parent->children>1)
                        <tr class="tr_subtotal bg-danger">
                            <td colspan="3" class="text-right"style="text-align: right"><strong>Total: </strong></td>
                            <td class="text-right" style="text-align: right"><strong>{{number_format($total,2)}}</strong></td>
                        </tr>    
                    @endif        
                @endforeach
                <tr class="tr_subtotal bg-danger">
                    <td colspan="3" class="text-right "style="text-align: right; color:red;font:18px bold"><strong>Grand Total: </strong></td>
                    <td class="text-right" style="text-align: right;color:red; font:18px bold"><strong>{{number_format($totalBals,2)}}</strong></td>
                </tr> 
            @else
                <tr class="heading">
                    <td class="text-center" style="text-align: center!important;">#</td>
                    <td class="text-left" style="text-align: left!important;">Code</td>
                    <td class="text-left" style="text-align: left!important;">Name</td>
                    <td class="text-right" style="text-align: right!important;">Amount</td>

                </tr>
                <?php $i=1; $total=0;?>
                @foreach ($details as $det)
                    @if($det->bal>0)
                    <tr class="itemx">
                        <td class="text-left" style="text-align: center!important; ">{{$i}}</td>
                        <td class="text-left"  style="text-align: left!important; " >{{$det->code}}</td>
                        <td class="text-left" style="text-align: left!important; padding-left: 4px" >{{$det->name}}</td>
                        <td class="text-left" style="text-align: right!important; ">{{number_format($det->bal,2)}}</td>
                    </tr>
                    <?php $total+=$det->bal;$i+=1;?>
                    @endif
                    @endforeach
                    <tr class="tr_subtotal bg-danger">
                        <td colspan="3" class="text-right "style="text-align: right; color:red;font:18px bold"><strong>Grand Total: </strong></td>
                        <td class="text-right" style="text-align: right;color:red; font:18px bold"><strong>{{number_format($totalBals,2)}}</strong></td>
                    </tr> 
            @endif
    </table>
</div>
</body>
</html>