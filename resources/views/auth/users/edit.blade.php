    <div class="row">
        <div class ="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-user"></i><strong> Edit User Details</strong>
                </div>
                <div class="panel-body">
                    <form class="signup-form" id="signup-form" action="{{ route('users.update',$user->id) }}" method="POST" novalidate="">
                        @csrf  @method('PUT')
                        <div class="row">
                            <div class ="col-md-12">
                                <div class="form-group" id="name-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-book fa-fw"></i> Name</span>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} underlined" name="name" value="{{ $user->name }}" required  >

                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class ="col-md-12">
                                <div class="form-group" id="email-group">
                                    <div class="input-group">
                                        <span class="input-group-addon warning"><i class="fa fa-envelope fa-fw"></i> Email</span>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} underlined " name="email" value="{{ $user->email }}" placeholder="Email Address" required readonly>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class ="col-md-6">
                                <div class="form-group" id="ugroup-group">
                                    <div class="input-group">
                                        <span class="input-group-addon success"><i class="fa fa-cubes fa-fw"></i> Group</span>
                                        <select class="form-control ugroup" name="ugroup" id="ugroup" readonly>
                                            <option value="-1" selected="selected">-Select User Group-</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->group}}" {{ ( $role->group==$user->ugroup ) ? 'selected': ''}} >{{$role->group}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group" id="status-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-cubes fa-fw"></i> Status</span>
                                        <select class="form-control status" name="status" id="status" readonly>
                                            <option value="1" {{$user->status==1? 'selected': ''}}>-Active-</option>
                                            <option value="0" {{$user->status==0? 'selected': ''}}>-InActive-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class ="col-md-6">
                                <div class="form-group" id="location-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary"><i class="fa fa-cubes fa-fw"></i> Location</span>
                                        <select class="form-control location" name="location" id="location" readonly>
                                            <option value="-1" selected="selected">-Select User Location-</option>
                                            @foreach($locations as $location)
                                            <option value="{{$location->code}}" {{$user->location==$location->code? 'selected': ''}}>{{$location->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o fa-fw"></i> Save Details</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){

            function resetModalFormErrors() {
                $('.form-group').removeClass('has-error');
                $('.form-group').find('.help-block').remove();
                
            }


            $('form.signup-form').on('submit', function(submission) {
                submission.preventDefault();


                swal("Are you sure you want to do this?", {
                    buttons: {
                        cancel: "Run away!",
                        catch: {
                            text: "Proceed!",
                            value: "catch",
                        },
                        default:false
                    },
                })
                .then((value) => {
                    switch (value) {

                        case "defeat":
                        return;
                        break;

                        case "catch":
                        var form   = $(this),
                        url    = form.attr('action'),
                        submit = form.find('[type=submit]');


                        var data        = form.serialize(),
                        contentType  = 'application/x-www-form-urlencoded; charset=UTF-8';

                        /*alert(data);*/
                            // Please wait.
                            if (submit.is('button')) {
                                var submitOriginal = submit.html();
                                submit.html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
                                submit.prop('disabled',true);
                            } else if (submit.is('input')) {
                                var submitOriginal = submit.val();
                                submit.val('Please wait...');
                                submit.prop('disabled',true);
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
                            resetModalFormErrors();
                             // Check for errors.
                             if (response.status == 422) {


                                var err = $.parseJSON(response.responseText);
                                

                            // Iterate through errors object.
                            $.each(err.errors, function(field, message) {

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
                                formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
                                
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

                               swal("Something Went Wrong",response.responseText,"error");                   
                           }else{  
                            swal("Success",response.responseText,"success");
                            $('form.signup-form')[0].reset();
                            if (submit.is('button')) {
                                submit.html(submitOriginal);
                            } else if (submit.is('input')) {
                                submit.val(submitOriginal);
                            }
                            /*Reset fields*/
                            resetFields();
                        }
                           // location.reload();

                       }
                   });

                        break;

                        default:
                        swal("Got away safely!");
                    }
                });

});

            // Reset errors when opening modal.
            $('.form-credits').click(function() {
                resetModalFormErrors();
            });

        });

    </script>
