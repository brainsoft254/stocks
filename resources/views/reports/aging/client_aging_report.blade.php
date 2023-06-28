
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> Client Aging Analysis </title>
    
    <style>
    .invoice-box {
        max-width: 100%;
        margin: auto;
        /* padding: 30px; */
        border: 1px solid #eee;
        /*box-shadow: 0 0 10px rgba(0, 0, 0, .15);*/
        font-family: 'Montserrat', sans-serif;
        font-family: 'Open Sans','Lato' sans-serif,'Raleway','Roboto Mono',monospace,'Roboto Slab';
        font-size: 15px;
        font-weight: 200;
        line-height: auto;
        /* font-family: 'Raleway', sans-serif; */
        color: #555;
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
        font-size: 20px;
        line-height: 20px;
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
        /* padding-bottom: 20px; */
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
      .itemx td{
        border-bottom: dotted 1px #ccc;
      }
      #btnPrintPdf{
          font-family: 'Open Sans','Lato' sans-serif,'Raleway','Roboto Mono',monospace,'Roboto Slab';
          font-size:16px;

      }
  </style>
</head>
 
<body>
    <div class="print-opts">
        <div class="row">
            <div class="col-md-4">
                <a href="{{url('print_client_aging_analysis')}}" id="btnPrintPdf"  class="btn btn-success" ><span class="fa fa-file-excel-o"></span> Export EXCEL</a>
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
                                <span>{{$coy->name}}</span>
                            </td>
                            
                            <td class="inv-details">
                                <strong>Aging Analysis</strong><br>
                                <strong>Period: {{$period}} Days</strong><br>
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
                                {{$coy->address}}<br>
                                {{$coy->town}}.
                            </td>
                            <td>
                                <strong>{{$client}}</strong><br>
                                <strong></strong><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="bg-primary">
                {{-- <td class="text-right" style="text-align: left!important;">#</td>
                <td class="text-right" style="text-align: left!important;">Code</td>
                <td class="text-left" style="text-align: left!important;">Name</td> --}}
                
                @foreach ($header as $key=> $head )
                   <td class="text-right" style="text-align: {{$key>2?'right!important;':'left!important;'}} white-space: nowrap; font-weight:bolder">{{$head}}</td>
                @endforeach
                {{-- <td class="text-right" style="text-align: right!important;">Current</td>
                <td class="text-right" style="text-align: right!important;">30 Days</td>
                <td class="text-right" style="text-align: right!important;">60 Days</td>
                <td class="text-right" style="text-align: right!important;">90 Days</td> --}}
                {{-- <td class="text-right" style="text-align: right!important;">Total</td> --}}
            </tr>

            <?php $tbal=0;$rtotal=0;?>
            @foreach ($details as $key=> $det)
            <?php $rtotal+=$det->_current+$det->_1stage+$det->_2ndage+$det->_3rdage;?>

            <tr class="itemx">
                <td class="text-left" style="text-align: left!important; width:auto">{{$key+1}}</td>
                <td class="text-left" style="text-align: left!important; width:auto">{{$det->code}}</td>
                <td class="text-left" style="text-align: left!important; width:80%" >{{$det->name}}</td>
                <td class="text-left {{$det->_current<=0?'text-success':'text-danger'}}" style="text-align: right!important; width:20%">{{number_format($det->_current)}}</td>
                <td class="text-left {{$det->_1stage<=0?'text-success':'text-danger'}}" style="text-align: right!important; width:20%" >{{number_format($det->_1stage)}}</td>
                <td class="text-left {{$det->_2ndage<=0?'text-success':'text-danger'}}" style="text-align: right!important; width:20%" >{{number_format($det->_2ndage)}}</td>
                <td class="text-left {{$det->_3rdage<=0?'text-success':'text-danger'}}" style="text-align: right!important; width:20%" >{{number_format($det->_3rdage)}}</td>
                <td class="text-left text-primary" style="text-align: right!important; width:50%;font-weight:bold" >{{number_format($rtotal)}}</td>
                <?php $tbal+=$rtotal;$rtotal=0;?>
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

            <td class="bill-totals" colspan="5" style="width:100%!important;">
                <table >
                    <tr class="figures">
                        <td class="text-right" style="text-align: right;width:100%!important; font-weight:250"><strong>Total</strong></td>
                        <td class="text-right text-primary" style="text-align: right;width:100%!important; font-weight:bolder">{{number_format($tbal,0)}}</td>
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
        var datastr='&client={!!$client!!}';
            datastr+='&period={!!$period!!}';
            datastr+='&parent={!!$parent!!}';
            
        var urli=$(this).attr('href')+'?excel=1'+datastr;
        window.open(urli,'_blank','menubar=0,width=800, height=900'); 
        window.close();
        
    });

});
</script>

</body>
</html>
