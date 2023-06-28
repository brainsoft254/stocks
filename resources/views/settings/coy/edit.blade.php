      
<section class="section">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="header-block">
                        <h3 class="title alert alert-info"> Edit Company Profile  </h3>
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
                    <form class="form-coy" id="form-coy" action="{{route('coys.update',$coy->id)}}" method="POST" novalidate="" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Name</span>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $coy->name }}" required autofocus placeholder="Enter Company Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 btn_toggle">
                               <input type="checkbox" class="form-control" name="defaultcoy" id="defaultcoy"  data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>Default"  data-off="<i class='fa fa-times'></i>Not Default" data-onstyle="success" data-offstyle="danger" style="width: 159px !important" {{ $coy->defaultcoy>0 ?  'checked' : "" }}>
                            
                           </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-book fa-fw"></i> Address</span>
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $coy->address }}" required autofocus placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-bank fa-fw"></i> Town</span>
                                    <input id="town" type="text" class="form-control" name="town" value="{{ $coy->town }}" required autofocus placeholder="Enter Town">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-phone-square fa-fw"></i> Telephone</span>
                                    <input id="telephone" type="text" class="form-control" name="telephone" value="{{$coy->telephone }}" required autofocus placeholder="Enter Telephone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('cellphone') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-mobile fa-fw"></i> Cellphone</span>
                                    <input  id="cellphone" type="text" class="form-control" name="cellphone" value="{{ $coy->cellphone }}" required autofocus placeholder="Enter cellphone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('pinno') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-external-link-square fa-fw"></i> Pin No</span>
                                    <input id="pinno" type="text" class="form-control" name="pinno" value="{{ $coy->pinno }}" required autofocus placeholder="Enter Pin No">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('paybillno') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-signal fa-fw"></i> Paybill No</span>
                                    <input  id="paybillno" type="text" class="form-control" name="paybillno" value="{{ $coy->paybillno }}" required autofocus placeholder="Enter Paybillno">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-envelope-o fa-fw"></i> Email</span>
                                    <input id="email" id="email" type="email" class="form-control" name="email" value="{{ $coy->email }}" required autofocus placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-compass fa-fw"></i> Logo</span>
                                    <input id="logo" type="file" class="form-control" name="logo" value="{{ old('logo') }}" >
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-globe fa-fw"></i> Website</span>
                                    <input id="website"  type="text" class="form-control" name="website" value="{{ $coy->website }}" required autofocus placeholder="Enter Website">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('physicaladd') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon reams-input-addon"><i class="fa fa-map fa-fw"></i> Physical Address</span>
                                    <textarea style="resize: none" id="physicaladd" id="physicaladd" type="text" class="form-control" name="physicaladd"  required autofocus placeholder="Enter Physical Address">{{ $coy->physicaladd }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                            <div class="image-container">
                                <div class="coylogo pull-right" style=" border-radius:75px; width:150px; height:150px; background-image:url('stockspro/public/{{$coy->getFirstMediaUrl('logo','thumb')}}')"></div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <button type="submit" class="col-md-6 btn btn-block btn-primary pull-right"><i class="fa fa-check"></i> Save/Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<style type="text/css">
/*.select2 .select2-container.select2-container--default.select2-container--below').css('width','100% !important')*/
</style>
<script type="text/javascript">
    $(function(){
        $('#defaultcoy').bootstrapToggle();

        $(document).on("change","#logo",function(){
            $('.coylogo').css('background',"url('')");
            readImage(this);
        });

        function readImage(input)
        {
            var cnt=input.files.length;
            alert(cnt);

            //for (var i=1; i<= input.files.length; i++) {
                if (input.files && input.files[0]) {

                    var reader = new FileReader();
                    reader.onload = function (e) {
                       //alert(e.target.result);
                       $('.coylogo').css('background',"url('"+e.target.result+"')").css('background-size','cover');
                   }
                   reader.readAsDataURL(input.files[0]);
               }
            // }
        }


        $('form.form-coy').on('submit', function(submission) {

            submission.preventDefault();


            if($('#name').val()==""){
             swal('Blank Field','Name Cant be blank','error');
             $(this).focus();
             return;
         };
         if($('#address').val()==""){
            swal('Blank Field','Address Cant be blank','error');
            $(this).focus();
            return;
        };
        if($('#town').val()==""){
            swal('Blank Field','Town Cant be blank','error');
            $(this).focus();
            return;
        };
        if($('#cellphone').val()==""){
            swal('Blank Field','Cellphone Cant be blank','error');
            $(this).focus();
            return;
        };
        if($('#email').val()==""){
            swal('Blank Field','Email Cant be blank','error');
            $(this).focus();
            return;
        };


        var ext = $('#logo').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            swal("Invalid Logo",'Select Valid Image',"error"); 
            return;
        }

        if(!confirm('Create/Update Company Details?')){
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
                     //swal("Something Went Wrong",response.responseText,'error');  
                     bootbox.dialog({message:response.responseText});                 
                 }else{  
                    $('form.form-coy')[0].reset();
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
  });
</script>
