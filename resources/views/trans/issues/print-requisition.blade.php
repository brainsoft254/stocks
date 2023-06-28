<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> Issue / Transfer </title>
    
    <style>
    .invoice-box {
        max-width: 98%;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        /*box-shadow: 0 0 10px rgba(0, 0, 0, .15);*/
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    tr.itemx td{
        border-bottom: dotted 1px #ccc !important;
    }
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
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
        font-family: sans-serif,Arial !important;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #000;
        color:#fff;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    /*.invoice-box table tr.total td:nth-child(8),tr.total td:nth-child(9) {
        border-top: 2px solid #000;
        font-weight: bold;
        }*/
        .invoice-box td.bill-totals table td{
            border-bottom:  2px solid #000;
            font-weight: bold;
        }
        .invoice-box table td.instructions,td.bill-totals{
            border-top:  2px solid #000;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
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
        .inv-details{
            float: right;
        }
        .text-left{text-align: left;}
        .text-right{text-align: right;}
        .text-center{text-align: center;}
        .dotted {
          border:none;
          border-top:1px dotted #000;
          color:#000;
          background-color:#fff;
          height:1px;
          width:100%;
      }
  </style>
</head>

<body>
    <div class="print-opts">
        <div class="row">
            <div class="col-md-4">
                <a href="{{url('print-order')}}" id="btnPrintPdf"  class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF</a>
            </div>
        </div>
        <hr/>
    </div>
    <div class="invoice-box">

        <table cellpadding="0" cellspacing="0" style="width:100%">
            <tr class="top">
                <td colspan="12">
                    <table style="width:100%;border-bottom: solid 1px #272822;">
                        <tr>
                            <td class="title">
                                <span>{{Stockspro::getCoy()->name}}</span>
                            </td>
                            
                            <td class="inv-details">
                                <strong>RefNo: #{{$issue->refno}}</strong><br>
                                <strong>Date: {{$issue->trandate}}</strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="9">
                    <table>
                        <tr>
                            <td>
                                <strong>From:</strong>
                                <strong>{{$issue->locfrom}}</strong><br>
                                <strong>({{Stockspro::getLocationName($issue->locfrom)}})</strong><br>
                            </td>
                            <td>
                                <strong>To:</strong>
                                <strong>{{$issue->locto}}</strong><br>
                                <strong>({{Stockspro::getLocationName($issue->locto)}})</strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td class="text-left">Item</td>
                <td class="text-left" style="text-align: left!important;">Description</td>
                <td class="text-right" style="text-align: right!important;">Uom</td>
                <td class="text-right" style="text-align: right!important;">Qty</td>
                <td class="text-right" style="text-align: right!important;">U/Cost</td>
                <td class="text-right" style="text-align: right!important;">Total</td>

            </tr>
            
            @foreach ($details as $det)
            <tr class="itemx">
                <td class="text-left">{{$det->icode}}</td>
                <td class="text-left" style="text-align: left!important; width:100%" >{{$det->description}}</td>
                <td class="text-left">{{$det->uom}}</td>
                <td class="text-left">{{$det->qty}}</td>
                <td class="text-left">{{$det->rate}}</td>
                <td class="text-right">{{number_format($det->total,0)}}</td>

            </tr>
            @endforeach
            <tr class="total">
                <td class="instructions" colspan="3">
                    <table>
                        <tr><td><i><b>Notes:</b></i></td></tr>
                        <tr>
                            <td>
                             <ul style="list-style: none;">
                                @switch($issue->status)
                                    @case(1) <li><span class="alert alert-success"><i>Received </i></li>
                                        @break
                                    @case(0) <li class="alert alert-danger"><i>..Waiting</i></li>
                                        @break
                                @endSwitch
                                
                            </ul> 
                        </td>
                    </tr>
                    <tr><td style="font:16px arial"><i>Printed By {{Auth::User()->name}} | Timestamp:{{$tstamp}}</i></td></tr>
                </table>
            </td>

            <td class="bill-totals" colspan="4" style="width:100%!important;">
                <table >
                    <tr class="figures">
                        <td class="text-right" style="text-align: right;width:100%!important;"><strong>Total</strong></td>
                        <td class="text-right">{{number_format($issue->total,0)}}</td>
                    </tr>
                    <tr class="figures">
                       
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <span style="font-style: italic;">*Valid Computer Generated</span>
</div>
<br/>
<br/>
<hr class='dotted' />
<br/>
<br/>
<br/>
<br/>

<script type="text/javascript">
 $(function(){
    $(document).on('click','#btnPrintPdf',function(e){
        e.preventDefault();
        var datastr='&refno={!!$issue->refno!!}';
        var urli=$(this).attr('href')+'?pdf=1'+datastr;
        window.open(urli,'_blank','menubar=0,width=800, height=900'); 
        
    });
});
</script>

</body>
</html>
