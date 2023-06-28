<section class="section">
<div class="row">
    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="title">Client Profile </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                <li class="active "><a href="#tab-info" data-toggle="tab" class="text-primary text-weight-bold"><i class="fa fa-database fa-fw"></i> Client Master Details</a></li>
                </ul> 
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab-info" style="padding-top:10px;">
                        <form class="form-client" id="form-client" action="{{route('clients.store')}}" method="POST" novalidate="" >
                            @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon warning"><i class="fa fa-barcode fa-fw"></i> Code</span>
                                        <input id="code" type="text" class="form-control" name="code" value="-AUTO-" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="status-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-bolt" aria-hidden="true"></i> Status</span>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" selected="selected">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon success"><i class="fa fa-credit-card fa-fw"></i> Name</span>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter Company Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('rep') ? ' has-error' : '' }}" id="route-group">
                                    <div class="input-group">
                                        <span class="input-group-addon danger">Sales Person</span>
                                        <select class="form-control" name="rep" id="rep">
                                            <option value="-1" selected="selected">--Pick Rep--</option>
                                            @foreach($staffs as $staff)
                                            <option value="{{$staff->name}}">{{$staff->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>                      
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('tel') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-phone-square fa-fw"></i> CellPhone</span>
                                        <input id="tel" type="text" class="form-control tel" name="tel" value="{{ old('tel') }}" required autofocus placeholder="Enter Cellphone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-envelope fa-fw"></i> Email</span>
                                        <input id="email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('physicaladd') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-map  fa-fw"></i> Physical Address</span>
                                        <textarea style="resize: none" id="physicaladd" id="physicaladd" type="text" class="form-control" name="physicaladd"  required autofocus placeholder="Enter Physical Address">{{ old('physicaladd') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('remarks') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-map  fa-fw"></i> Remarks</span>
                                        <textarea style="resize: none" id="remarks" id="remarks" type="text" class="form-control" name="remarks"  required autofocus placeholder="Enter Remarks">{{ old('remarks') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <button type="submit" id="btnSubmit" class="col-md-6 btn btn-block btn-primary pull-right"><i class="fa fa-check"></i> Save/Update Profile</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
    $(function(){
        //$('#status,#rep').select2({theme:'bootstrap',width:'100%',dropdownParent: $('.modal')});
        $('.toggle').css('width','100px');
        
        function resetModalFormErrors() {
            $('.form-group').removeClass('has-error');
            $('.form-group').find('.help-block').remove();
            $('#btnSubmit').prop('disabled',false);
            
        }
        
        $('form.form-client').on('submit', function(submission) {
            submission.preventDefault();
            if($("#name").val()==""){
                swal("Error","Name cannot by blank","error");
                return;
            }
            if($("#tel").val()==""){
                swal("Erro","Enter valid telphone no","error");
                return;
            }
            if(!confirm('Create/Update Client Details?')){
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
                     bootbox.dialog({message:response.responseText});
                   //swal("Something Went Wrong",response.responseText,'error');                   
               }else{  
                $('form.form-client')[0].reset();
                //bootbox.dialog({message:response.responseText});
                swal('Success',response.responseText,'success');
                        
                        // Reset submit.
                        if (submit.is('button')) {
                            submit.html(submitOriginal);
                        } else if (submit.is('input')) {
                            submit.val(submitOriginal);
                        }
                        submit.prop('disabled',false);
                    }
                    location.reload();
                }
            });
        });
      // Reset errors when opening modal.
      $('.form-client').click(function() {
        resetModalFormErrors();
    });
  
  });
</script>
