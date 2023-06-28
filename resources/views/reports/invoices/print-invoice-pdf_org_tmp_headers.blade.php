<html>
<head>
    <style>
    /** Define the margins of your page **/
    @page {
        margin: 100px 25px;
    }

    header {
        position: fixed;
        top: 160px;
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

        /** Extra personal styles **/
        background-color: #03a9f4;
        color: white;
        text-align: center;
        line-height: 35px;
    }
</style>
</head>
<body>
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

                            <table style="border-collapse: collapse; width: 100%!important; float:right;">
                                <tr><td> <strong></strong></td><td><strong>{{$invoice->invno}}</strong></td></tr>
                                <tr><td> <strong>Date:</strong></td><td><strong>{{$invoice->invdate}}</strong></td></tr>
                                <tr><td> <strong>Lpo#:</strong></td><td><strong>{{$invoice->lpo}}</strong></td></tr>
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
        Copyright &copy; <?php echo date("Y");?> 
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p style="page-break-after: always;">
            Content Page 1
        </p>
        <p style="page-break-after: never;">
            Content Page 2
        </p>
    </main>
</body>
</html>