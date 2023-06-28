<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> Order </title>
    
    <style>
        .grn-box {
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

        .grn-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .grn-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .grn-box table tr td:nth-child(2) {
            text-align: right;
        }

        .grn-box table tr.top table td {
            padding-bottom: 20px;
        }

        .grn-box table tr.top table td.title {
            font-size: 30px;
            line-height: 25px;
            font-style: bold;
            font-family: sans-serif,Arial !important;
            color: #333;
        }

        .grn-box table tr.information table td {
            padding-bottom: 40px;
        }

        .grn-box table tr.heading td {
            background: #000;
            color:#fff;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .grn-box table tr.details td {
            padding-bottom: 20px;
        }

        tr.itemx td{
            border-bottom: 1px dotted #000 !important;
            border-right: 1px dotted #000 !important;
        }
        tr.heading td{
            border-right: 1px dotted #fff !important;
        }

        tr.itemx td:last-child{
            border-right: none  !important;
        }

        .grn-box table tr.item.last td {
            border-bottom: none;
        }

        tr.figures td{
            border-right:dotted 1px #000;
        }

    /*.grn-box table tr.total td:nth-child(8),tr.total td:nth-child(9) {
        border-top: 2px solid #000;
        font-weight: bold;
        }*/
        .grn-box td.bill-totals table td{
            border-bottom:  2px solid #000;
            font-weight: bold;
        }
        .grn-box table td.instructions,td.bill-totals{
            border-top:  2px solid #000;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .grn-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .grn-box table tr.information table td {
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
            <div class="col-md-12">
                <a href="{{url('print-grn-pdf')}}" grnid="{{$grn->id}}" id="btnPrintPdf"  class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF</a>
            </div>
        </div>
        <hr/>
    </div>
    <div class="grn-box">

        <table cellpadding="0" cellspacing="0" style="width:100%">
            <tr class="top">
                <td colspan="12">
                    <table style="width:100%;border-bottom: solid 1px #272822;">
                        <tr>
                            <td class="title">
                                <span>{{$coy->name}}</span>
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
                                <strong>Grn Type: {{$grn->trantype>0?'Opening Stock':'Purchases'}}</strong><br>
                                <strong>Payment Mode:{{$grn->pmode>0?'Credit':'Cash'}}</strong><br>
                                <strong>({{$grn->clcode}})</strong><br>
                                <strong>Location: #{{Stockspro::getLocationName($grn->location)}}</strong><br>
                            </td>
                            <td class="inv-details">
                                <strong>No#:{{$grn->refno}}</strong><br><br>
                                <strong>Date: {{$grn->trandate}}</strong><br>
                                <strong>Lpo: #{{$grn->lpo}}</strong><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td class="text-left">#</td>
                <td class="text-left" style="text-align: left!important;">Item</td>
                <td class="text-left" style="text-align: left!important;">Description</td>
                <td class="text-right" style="text-align: right!important;">Uom</td>
                <td class="text-right" style="text-align: right!important;">Qty</td>
                <td class="text-right" style="text-align: right!important;">Rate</td>
                <td class="text-right" style="text-align: right!important;">Vat</td>
                <td class="text-right" style="text-align: right!important;">Total</td>
            </tr>
            <?php $i=1;?>
            @foreach ($grn->grn_d as $det)
            <tr class="itemx">
                <td class="text-left">{{$i}}</td>
                <td class="text-left"  style="text-align: left!important; width:30%" >{{$det->icode}}</td>
                <td class="text-left" style="text-align: left!important; width:70%" >{{Stockspro::getItemDescr($det->icode)}}</td>
                <td class="text-left" style="text-align: center!important; width:15%">{{$det->pu}}</td>
                <td class="text-left" style="text-align: center!important; width:10%">{{$det->qty}}</td>
                <td class="text-left" style="text-align: center!important; width:20%">{{number_format($det->uprice,0)}}</td>
                <td class="text-right" style="text-align: right!important; width:20%">{{number_format($det->vat,2)}}</td>
                <td class="text-right" style="text-align: right!important; width:20%">{{number_format($det->total,2)}}</td>
                <?php $i+=1;?>
            </tr>
            @endforeach
            <tr class="total">
                <td class="instructions" colspan="3">
                    <table>
                        <tr><td><i><b>Notes:</b></i></td></tr>
                        <tr>
                            <td>
                             <ul style="list-style: none;">


                             </ul> 
                         </td>
                     </tr>
                     <tr><td style="font:16px arial"><i>Printed By {{Auth::User()->name}} | Timestamp:{{$tstamp}}</i></td></tr>
                 </table>
             </td>

             <td class="bill-totals" colspan="5" style="width:100%!important; ">
                <table >
                    <tr class="figures">
                        <td class="text-right" style="text-align: right;width:10%!important;"><strong>SubTotal</strong></td>
                        <td class="text-right" style="text-align: right;width:60%!important;">{{number_format(($grn->total-$grn->vat),2)}}</td>
                        <td class="text-right" style="text-align: right;width:60%!important;">{{number_format($grn->vat,2)}}</td>
                        <td class="text-right" style="text-align: right;width:60%!important;">{{number_format($grn->total,2)}}</td>
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
        var datastr='&id='+$(this).attr('grnid');
        var urli=$(this).attr('href')+'?pdf=1'+datastr;

        window.open(urli,'_blank','menubar=0,width=800, height=900'); 
        
    });
});
</script>

</body>
</html>
