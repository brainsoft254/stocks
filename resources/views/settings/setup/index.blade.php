@extends('stocksmaster') 
@section('content')       
<section class="section">
    <div class="row">
        <div class="col-sm-8 col-md-8 col-xl-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="title alert alert-info"> System Params </h3>

                </div>
                <div class="box-body">
                    <form class="form-setup" id="form-setup" action="{{route('setup.store')}}" method="POST" novalidate="" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('vat') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon warning"><i class='fa fa-briefcase'></i> Vat Cntrl</span>
                                        <select class="form-control vat" name="vat" id="vat" required>
                                            <option value="-1">--Select Account--</option>
                                            @foreach($accounts as $account)
                                            <option value="{{$account->code}}" @if(isset($settings)) {{$settings->vat==$account->code? 'selected': ''}} @endif >{{$account->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 btn_toggle">
                                @if(isset($settings))
                                @if($settings->vat_inclusive==1)
                                <input type="checkbox" class="form-control" name="vat_inclusive" id="vat_inclusive" checked data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>Vat Inclusive"  data-off="<i class='fa fa-times'></i>Vat Exclusive" data-onstyle="success" data-offstyle="danger" >
                                @else
                                <input type="checkbox" class="form-control" name="vat_inclusive" id="vat_inclusive"  data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>Vat Inclusive"  data-off="<i class='fa fa-times'></i>Vat Exclusive" data-onstyle="success" data-offstyle="danger" >
                                @endif
                                @else
                                <input type="checkbox" class="form-control" name="vat_inclusive" id="vat_inclusive" checked data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>Vat Inclusive"  data-off="<i class='fa fa-times'></i>Vat Exclusive" data-onstyle="success" data-offstyle="danger" >
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('stocks') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon warning"><i class='fa fa-bar-chart'></i> Stocks Cntrl</span>
                                        <select class="form-control stocks" name="stocks" id="stocks" required>
                                            <option value="-1">--Select Account--</option>
                                            @foreach($accounts as $account)
                                            <option value="{{$account->code}}" @if(isset($settings)) {{$settings->stocks==$account->code? 'selected': ''}}@endif >{{$account->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('receivables') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon warning"><i class='fa fa-bookmark'></i> Receivables Cntrl</span>
                                        <select class="form-control receivables" name="receivables" id="receivables" required>
                                            <option value="-1">--Select Account--</option>
                                            @foreach($accounts as $account)
                                            <option value="{{$account->code}}" @if(isset($settings)){{$settings->receivables==$account->code? 'selected': ''}} @endif>{{$account->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('payables') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon warning"><i class='fa fa-cab'></i> Payables Cntrl</span>
                                        <select class="form-control payables" name="payables" id="payables" required>
                                            <option value="-1">--Select Account--</option>
                                            @foreach($accounts as $account)
                                            <option value="{{$account->code}}" @if(isset($settings)){{$settings->payables==$account->code? 'selected': ''}}@endif>{{$account->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('returns') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon warning"><i class='fa fa-exchange'></i> Returns Cntrl</span>
                                        <select class="form-control returns" name="returns" id="returns" required>
                                            <option value="-1">--Select Account--</option>
                                            @foreach($accounts as $account)
                                            <option value="{{$account->code}}" @if(isset($settings)){{$settings->returns==$account->code? 'selected': ''}} @endif>{{$account->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('wtax') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon info">W/Tax Rate</span>
                                        <input type="text" name="wtax"  id="wtax" class="col-md-6 form-control" value="{{$settings->wtax}}" placeholder="Enter Wtax Rate" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('factax') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon info">Facilitation Charge Rate</span>
                                        <input type="text" name="factax"  id="factax" class="col-md-6 form-control" value="{{$settings->factax}}" placeholder="Enter FacTax Rate" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('vatrate') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon danger">VAT Rate</span>
                                        <input type="text" name="vrate"  id="vrate" class="col-md-6 form-control" value="{{$settings->vrate}}" placeholder="Enter VAT Rate" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <hr/>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <button type="submit" class="col-md-6 btn btn-block btn-primary pull-right"><i class="fa fa-check"></i> Save/Update Params</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('page-script')
<script type="text/javascript">
    $(function(){
        $('.toggle').css('width','100px');
        $('#vat_inclusive').bootstrapToggle();
        

        function resetModalFormErrors() {
            $('.form-group').removeClass('has-error');
            $('.form-group').find('.help-block').remove();
            $('.ui-alert').html('');
        }


        $('form.form-setup').on('submit', function(submission) {

            submission.preventDefault();



            if(!confirm('Create/Update System Params?')){
                return;
            };

                // Set vars.  1
                var form   = $(this),
                url    = form.attr('action'),
                submit = form.find('[type=submit]');


                if (form.find('[type=file]').length) {
                    //var det=CKEDITOR.instances['details'].getData();

                    // If found, prepare submission via FormData object.
                    var input       = form.serializeArray(),
                    data        = new FormData($(this)[0]),
                    contentType = false;

                }

                // If no file input found, do not use FormData object (better browser compatibility).
                else {
                    var data        = form.serialize(),
                    contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
                }

                // Please wait.
                if (submit.is('button')) {
                    var submitOriginal = submit.html();
                    submit.html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
                    submit.prop('disabled',true);

                } else if (submit.is('input')) {
                    var submitOriginal = submit.val();
                    submit.val('Please wait...');
                }

                //swal("",data,"success");
                // Request.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: 'json',
                    cache: false,
                    contentType: contentType,
                    processData: false

                // Response.
            }).always(function(response, status) {

                resetModalFormErrors();
                     // Check for errors.
                     if (response.status == 422) {

                        //console.log(response.responseText);
                        
                        var err = $.parseJSON(response.responseText);
                           // console.log(err.errors[0]);                     
                        // Iterate through errors object.
                        $.each(err.errors, function(field, message) {

                            console.error(field+':'+message);
                            //handle arrays
                            if(field.indexOf('.') != -1) {
                                field = field.replace('.', '[');
                                //handle multi dimensional array
                                for (i = 1; i <= (field.match(/./g) || []).length; i++) {
                                    field = field.replace('.', '][');
                                }
                                field = field + "]";
                            }
                            
                            var formGroup = $("[name='"+field+"']", form).closest('.form-group');
                            formGroup.addClass('has-error').append('<p class="help-block text-danger">'+message+'</p>');
                            $('.ui-alert').append(message+"<br/>").addClass('alert alert-danger');
                        });

                        // Reset submit.
                        if (submit.is('button')) {
                            submit.html(submitOriginal);
                        } else if (submit.is('input')) {
                            submit.val(submitOriginal);
                        }

                    // If successful, reload.
                } else {
                  if(response.status==500){
                   //bootbox.dialog({message:response.responseText});
                   swal("Something Went Wrong",response.responseText,'error');                   
               }else{  
                   $('form.form-setup')[0].reset();
                bootbox.dialog({message:response.responseText});
                //swal('Success',response.responseText,'success');

                        // Reset submit.
                        if (submit.is('button')) {
                            submit.html(submitOriginal);
                        } else if (submit.is('input')) {
                            submit.val(submitOriginal);
                        }
                        submit.prop('disabled',false);
                    }
                    //location.reload();
                }
            });
        });

 // Reset errors when opening modal.
 $('.form-setup').click(function() {
    var submit = $('#form-setup').find('[type=submit]');
    submit.prop('disabled',false);
    resetModalFormErrors();
});
});
</script>
@stop
