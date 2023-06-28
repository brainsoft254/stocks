<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> Client Statement</title>
    
    <style>
    /*body { font-family: DejaVu Sans, sans-serif; }*/
    .invoice-box {
        max-width: 98%;
        margin: auto;
        padding: 5px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 12px;
        line-height: 20px;
        font-family: 'Helvetica', 'Helvetica', Helvetica, Arial, sans-serif;
        /*font-family: DejaVu Sans, sans-serif;*/
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
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
        font: bold 12px/30px arial, serif;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(8),tr.total td:nth-child(9) {
        border-top: 2px solid #000;
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
    tr.itemx td{
        border-bottom: dotted 1px #000;
        font: bold 12px/30px arial, serif;
    }
    .td-right-border{
        border-right: solid 1px #000;
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
    table.ui-cl-info td{
        font: bold 12px/30px arial, serif;
        border-bottom: solid 1px #eee;
        padding: 0px;
        text-align: left;
    }
    .print-opts {
        max-width: 98%;
        margin: auto;
        padding: 5px;
    }
    </style>
</head>

<body>

    <div class="print-opts">
        <div class="row">
            <div class="col-md-12">
                <a href="#" id="btnPrint" class="btn btn-primary"><span class="fa fa-print"></span> Print</a>
                <a href="#" id="btnPrintPdf" cltype="{{$parent}}" cl="{{$client->code}}" dfrom="{{$dfrom}}" dto="{{$dto}}" ptrans="{{$ptrans}}" rpt-url="{{url('print-client-statement')}}" class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF</a>
                <a href="#" id="btnEmailPdf" cltype="{{$parent}}" cl="{{$client->code}}" dfrom="{{$dfrom}}" dto="{{$dto}}" ptrans="{{$ptrans}}" rpt-url="{{url('print-client-statement')}}" class="btn btn-warning"><span class="fa fa-envelope-o"></span> Send Via Email</a>
                <a href="#" id="btnPrintExcel" cltype="{{$parent}}" cl="{{$client->code}}" dfrom="{{$dfrom}}" dto="{{$dto}}" ptrans="{{$ptrans}}" rpt-url="{{url('print-client-statement')}}" class="btn btn-success"><span class="fa fa-file-excel-o"></span> Print EXCELX</a>
                <a href="#" id="btnPrintPdfHeader" cltype="{{$parent}}" cl="{{$client->code}}" dfrom="{{$dfrom}}" dto="{{$dto}}" ptrans="{{$ptrans}}" 
                 rpt-url="{{url('print-client-statement')}}" class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF+Header</a>
            </div>
        </div>
    </div>

    <div class="invoice-box">
<!--         <div class="row">
            <div class="col-md-12">
                <a href="#" id="btnPrint" rpt-url="{{url('print-client_statement')}}" class="btn btn-warning col-md-2 pull-right"><span class="fa fa-file-pdf-o"></span> Download</a>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 header">
                <h2 class="text-center"></h2>
                <hr/ style="border-bottom: dotted 1px #eee;">
            </div>
        </div>
         <div class="row">
                <div class="col-md-4 pull-left">
                    <table class="ui-cl-info">
                        <tr><td><h3 class="text-primary">Client Statement</h3> </td></tr>
                        <tr><td><span class="glyphicon glyphicon-calendar"></span> From: {{$dfrom}}</td></tr>
                        <tr><td><span class="glyphicon glyphicon-calendar"></span> To: {{$dto}}</td></tr>
                    </table>
                </div>
                <div class="col-md-4 ">
                    
                </div>
                <div class="col-md-4 pull-right">
                    <table class="ui-cl-info">
                        <tr><td><span class="glyphicon glyphicon-user"></span> {{$client->name}}</td></tr>
                        <tr><td><span class="glyphicon glyphicon-folder-close"></span> ({{$client->code}})</td></tr>
                    </table>
                </div>
            </div>
        <hr/>
        <table cellpadding="0" cellspacing="0" style="width:100%">
            <tr class="heading">
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
                <td class="text-right">{{number_format($stat->debit,0)}}</td>
                <td class="text-right">{{number_format($stat->credit,0)}}</td>
                <td class="text-right">{{number_format($bal,0)}}</td>
            </tr>
            <?php $i+=1;?>
            @endforeach

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
    <div class="ui-print"></div>

    <div class="mailbox" style="display: none;">
        <div class="row">
            <div class="col-md-6">
                <form class="form-email-stat" action ="{{url('print-client-statement')}}" method ="GET">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon primary"><i class="fa fa-user fa-fw"></i> Email </span>
                        <input type="email" name="toemail" id="toemail" class=" email form-control" placeholder="Enter Receiver Email" required>

                        <input type="text" name="cltype" id="cltype"  value="{{$parent}}" class=" cltype form-control" placeholder="Enter Receiver Email" style="display: none;">
                        <input type="text" name="client" id="client"  value="{{$client->code}}" class=" cltype form-control" placeholder="Enter Receiver Email" style="display: none;">
                        <input type="text" name="dfrom" id="dfrom"  value="{{$dfrom}}" class=" cltype form-control" placeholder="Enter Receiver Email" style="display: none;">
                        <input type="text" name="dto" id="dto"  value="{{$dto}}" class=" cltype form-control" placeholder="Enter Receiver Email" style="display: none;">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" id="btnSendPdf" rpt-url=""><i class="fa fa-envelope-o" ></i> Send Email</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','#btnPrint',function(){
                $('.invoice-box').printThis({
                    loadCSS:["{!!asset('css/rpt.css')!!}","{!!asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') !!}"],
                });
            })

            $(document).on('click','#btnPrintPdf',function(e){
                e.preventDefault();
                var datastr="&cltype="+$(this).attr('cltype')+"&client="+$(this).attr('cl')+"&dfrom="+$(this).attr('dfrom')+"&dto="+$(this).attr('dto')+"&with_parent="+$(this).attr('ptrans');
                var urli=$(this).attr('rpt-url')+'?pdf=1'+datastr;
                    window.open(urli,'_blank','menubar=0,width=800, height=900'); 
            });

            $(document).on('click','#btnPrintPdfHeader',function(e){
                e.preventDefault();
                var datastr="&cltype="+$(this).attr('cltype')+"&client="+$(this).attr('cl')+"&dfrom="+$(this).attr('dfrom')+"&dto="+$(this).attr('dto')+"&with_parent="+$(this).attr('ptrans');
                var urli=$(this).attr('rpt-url')+'?pdf=1&withheader=1'+datastr;

                    window.open(urli,'_blank','menubar=0,width=800, height=900'); 
            });

            $(document).on('click','#btnPrintExcel',function(e){
                e.preventDefault();
                var datastr="&cltype="+$(this).attr('cltype')+"&client="+$(this).attr('cl')+"&dfrom="+$(this).attr('dfrom')+"&dto="+$(this).attr('dto')+"&with_parent="+$(this).attr('ptrans');
                var urli=$(this).attr('rpt-url')+'?excel=1'+datastr;
                    window.open(urli,'_blank','menubar=0,width=800, height=900'); 
            });

            $(document).on('click','#btnEmailPdf',function(e){
                e.preventDefault();
               bootbox.dialog({
                            title:'Email Client Statement',
                            message:$('.mailbox').html(),
                            /*size:'auto',*/
                            backdrop:true,
                            onEscape:true,
                        });
           });

             $(document).on('submit', 'form.form-email-stat', function(e) {
                e.preventDefault();
                if($('.toemail').val()==""){alert('Email Required');return;}

                var form   = $(this),
                formurli    = form.attr('action'),
                submit = form.find('[type=submit]'),
                formdata=form.serialize();   

                //var datastr="&cltype="+$(this).attr('cltype')+"&client="+$(this).attr('cl')+"&dfrom="+$(this).attr('dfrom')+"&dto="+$(this).attr('dto');
                alert(formdata);
                    var linkdata=formdata+'&emailpdf=1&with_parent='+$(this).attr('ptrans');
                $.ajax({
                    url:formurli,
                    type:'GET',
                    data:linkdata,
                    dataType:'html',
                    complete:function(data){
                        bootbox.dialog({message:data.responseText});
                        //swal('',data.responseText,'info');
                    }
                });
              });
        });
    </script>
</body>
</html>
