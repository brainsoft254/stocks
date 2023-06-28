<div class="invoice-box">
    <div class="row">
        {{-- <div class="col-md-6 header">
            <img src="{{asset($coy->getFirstMediaUrl('logo'))}}" alt="{{ $coy->name }}" class=" responsive" style="width:150px;" />
        </div> --}}
        <div class="col-md-12 header">
            <h2 class="text-center">{{$coy->name}}</h2>
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
</div>