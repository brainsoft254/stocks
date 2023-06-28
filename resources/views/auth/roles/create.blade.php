@extends('reams-main') 
@section('content')              
    <section class="section">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="header-block">
                            <h3 class="title"> New Invoice Category Details </h3>
                        </div>
                    </div>
                    <div class="card-block ">
                        <div class="ui-alert"></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-item" id="form-item" action="{{route('categories.store')}}" method="POST" novalidate="">
                                @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="code">Category</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input id="code" id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus placeholder="Enter Invoice Category">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="description">Status</label>
                                     <select class="form-control status"  id="status" name="status">
                                        <option value="1" selected="selected">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="description">Commisionable</label>
                                            <div class="row">
                                                     <select class="form-control commission"  id="commission" name="commission">
                                                        <option value="0" selected="selected">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="description">Payable</label>
                                            <div class="row">
                                                     <select class="form-control payable"  id="payable" name="payable">
                                                        <option value="0" selected="selected">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="description">Vatable</label>
                                            <div class="row">
                                                     <select class="form-control vatable"  id="vatable" name="vatable">
                                                        <option value="0" selected="selected">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="damount">Default Amount</label>
                                            <div class="row">
                                                    <input id="damount" type="text" class="form-control" name="damount" value="0.00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="description">Refundable</label>
                                            <div class="row">
                                                     <select class="form-control refundable"  id="refundable" name="refundable">
                                                        <option value="0" selected="selected">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr/>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <button type="submit" class="col-md-6 btn btn-block btn-primary pull-right"><i class="fa fa-check"></i> Save Category</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('page-style')
    <style type="text/css">
        /*.select2 .select2-container.select2-container--default.select2-container--below').css('width','100% !important')*/
    </style>
@stop
@section('page-script')
    <script type="text/javascript">
        $(function(){

            $('form.form-item').on('submit', function(submission) {
                
                submission.preventDefault();
                
                if($('#code').val()==""){
                    $('.ui-alert').html('Enter Category code').addClass('text-danger'); 
                    $('#code').closest('.form-group').addClass('text-danger'); 
                    return;
                };

                if($('#status').val()=="-1"){
                    $('.ui-alert').html('Select Item status cant be blank').addClass('text-danger'); 
                    $('#status').closest('.form-group').addClass('text-danger'); 
                    return;
                };

                if(!confirm('Add '+$("#code").val()+' as invoice Category?')){
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
                    submit.html('Please wait...');
                } else if (submit.is('input')) {
                    var submitOriginal = submit.val();
                    submit.val('Please wait...');
                }

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

                    // Reset errors.
                   // resetModalFormErrors();
                    
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
                        
                        //var err=$.parseJSON(response.responseText);
                        //alert(err);
                       //$('.ui-alert').html(response.responseText).fadeIn( 300 ).delay( 30000 ).fadeOut( 400 );
                       $('.ui-alert').html(response.responseText);                   
                      }else{  
                          //var err=$.parseJSON(response);
                        //alert(err);
                        //alert(response.responseText);
                        $('form.form-item')[0].reset();
                        $(".ui-alert").html(response.responseText).addClass('alert alert-warning').fadeIn( 300 ).delay( 30000 ).fadeOut( 400 );
                        // Reset submit.
                        if (submit.is('button')) {
                            submit.html(submitOriginal);
                        } else if (submit.is('input')) {
                            submit.val(submitOriginal);
                        }
                      }
                        location.reload();
                    }
                });
            });
        });
    </script>
@stop
