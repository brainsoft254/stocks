@extends('stocksmaster') 
@section('content')       
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
                    <li><a href="#tab-items" data-toggle="tab"  class="text-success text-weight-bold"><i class="fa fa-list fa-fw"></i>  Client Items</a></li>
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
                                <div class="col-md-3 btn_toggle">
                                    <input type="checkbox" class="form-control" name="hasvat" id="hasvat" checked data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>HasVat"  data-off="<i class='fa fa-times'></i>NoVat" data-onstyle="success" data-offstyle="danger" >
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
                                <div class="col-md-3 btn_toggle">
                                    <input type="checkbox" class="form-control" name="vatexc" id="vatexc" checked data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>Vatable"  data-off="<i class='fa fa-times'></i>VAT Exc" data-onstyle="success" data-offstyle="danger" >
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
                                <div class="col-md-4 btn_toggle">
                                    <input type="checkbox" class="form-control" name="factax" id="factax" data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>Has Fac.Charge"  data-off="<i class='fa fa-check-square-o'></i>No Fac.Charge" data-onstyle="danger" data-offstyle="success" >
                                </div>                            

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('pobox') ? ' has-error' : '' }}">
                                        <div class="input-group">
                                            <span class="input-group-addon primary"><i class="fa fa-book fa-fw"></i> POBOX</span>
                                            <input id="pobox" type="text" class="form-control" name="pobox" value="{{ old('pobox') }}" required autofocus placeholder="Enter Address">
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
                                    <div class="form-group {{ $errors->has('tel') ? ' has-error' : '' }}">
                                        <div class="input-group">
                                            <span class="input-group-addon primary"><i class="fa fa-phone-square fa-fw"></i> CellPhone</span>
                                            <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" required autofocus placeholder="Enter Cellphone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 btn_toggle">
                                    <input type="checkbox" class="form-control" name="parent" id="parentcl" checked data-toggle="toggle" data-on="<i class='fa fa-check-square-o'></i>Parent Client"  data-off="<i class='fa fa-check-square-o'></i>Child Client" data-onstyle="success" data-offstyle="danger" >
                                </div>                            
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('attachedto') ? ' has-error' : '' }}" id="attach-group">
                                        <div class="input-group">
                                            <span class="input-group-addon danger">Parent</span>
                                            <select class="form-control" name="attachedto" id="attachedto">
                                                <option value="1" selected="selected">--Pick Parent--</option>
                                                @foreach($parents as $parent)
                                                <option value="{{$parent->code}}">{{$parent->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>                      
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('pinno') ? ' has-error' : '' }}">
                                        <div class="input-group">
                                            <span class="input-group-addon primary"><i class="fa fa-external-link-square fa-fw"></i> Pin No</span>
                                            <input id="pinno" type="text" class="form-control" name="pinno" value="{{ old('pinno') }}" required autofocus placeholder="Enter Pin No">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('paymode') ? ' has-error' : '' }}" id="status-group">
                                        <div class="input-group">
                                            <span class="input-group-addon info"><i class="fa fa-signal fa-fw" aria-hidden="true"></i> Pay Mode</span>
                                            <select class="form-control" name="paymode" id="paymode">
                                                <option value="1" selected="selected">Cash</option>
                                                <option value="0">Account</option>
                                            </select>
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
                            <fieldset class="the-fieldset">
                                <legend class="the-legend info">&mdash;Contact Person Details&mdash;</legend>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <span class="input-group-addon warning"><i class="fa fa-user fa-fw"></i>Contact Name</span>
                                                <input  id="contact_person" type="text" class="form-control" name="contact_person" value="{{ old('contact_person') }}" required autofocus placeholder="Enter Contact Person Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('concell') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <span class="input-group-addon warning"><i class="fa fa-mobile fa-fw"></i>Contact Cellphone</span>
                                                <input  id="concell" type="text" class="form-control" name="concell" value="{{ old('concell') }}" required autofocus placeholder="Enter Contact Person CellPhone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('conemail') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <span class="input-group-addon warning"><i class="fa fa-envelope fa-fw"></i> Contact Email</span>
                                                <input id="conemail" id="conemail" type="email" class="form-control" name="conemail" value="{{ old('conemail') }}" required autofocus placeholder="Enter Contact Person Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('route') ? ' has-error' : '' }}" id="route-group">
                                        <div class="input-group">
                                            <span class="input-group-addon danger">Route</span>
                                            <select class="form-control" name="route" id="route">
                                                <option value="-1" selected="selected">--Pick Route--</option>
                                                @foreach($routes as $route)
                                                <option value="{{$route->code}}">{{$route->code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>                      
                                    <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('rep') ? ' has-error' : '' }}" id="route-group">
                                        <div class="input-group">
                                            <span class="input-group-addon danger">Rep</span>
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
                            </fieldset>

                            <hr/>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <button type="submit" id="btnSubmit" class="col-md-6 btn btn-block btn-primary pull-right"><i class="fa fa-check"></i> Save/Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab-items" style="padding-top: 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tbl-clients-items" class="table table-striped" style="width:100%">
                                    <thead class="text-primary">
                                        <tr>
                                           <th>#</th>
                                           <th>Item Code</th>
                                           <th>Description</th>
                                           <th>BarCode</th>
                                           <th>Selling Price</th>
                                           <th>Options</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                    <?php $i=1;?>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$client->code}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->cellphone}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>
                                           <div class="btn-group">
                                              <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a id="edit_Link" class="dropdown-item text-default" href="{{route('clients.edit',$client->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a id="viewLink"  class="dropdown-item text-default" href="{{route('clients.show',$client->id)}}"><i class="fa fa-search" aria-hidden="true"></i> View</a></li>
                                            </ul>
                                        </div>
                                    </td>                               
                                </tr>
                                <?php $i+=1;?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>    

            </div>                

        </div>
    </div>
</div>
</div>
</div>
</section>
<style type="text/css">
/*.select2 .select2-container.select2-container--default.select2-container--below').css('width','100% !important')*/
</style>
@stop
@section('page-script')
<script type="text/javascript">
    $(function(){
        $('#tbl-clients-items').DataTable();
        $('#status,#attachedto,#route,#rep').select2({theme:'bootstrap',width:'100%',dropdownParent: $('body')});
        $('.toggle').css('width','100px');
        $('#parentcl,#vatexc,#hasvat,#factax').bootstrapToggle();
        

        $(document).on('change','#parentcl',function(){
            if($(this).prop('checked')){
                $('#attach-group').hide();
            }else{
                $('#attach-group').show();

            }
        });

        

        $(document).on('click','#edit_Link',function(e){
          e.preventDefault();
          var urli=$(this).attr('href');

          $.get(urli,"",function(data){
             bootbox.dialog({
                 title:'',
                 message:data,
                 size:'large',
                 backdrop:true,
                 onEscape:function(){
                  location.reload();
              }
          });
         });
      });

        function resetModalFormErrors() {
            $('.form-group').removeClass('has-error');
            $('.form-group').find('.help-block').remove();
            $('#btnSubmit').prop('disabled',false);
            
        }

        $('form.form-client').on('submit', function(submission) {

            submission.preventDefault();


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
                    //location.reload();
                }
            });
        });
      // Reset errors when opening modal.
      $('.form-client').click(function() {
        resetModalFormErrors();
    });

  });
</script>
@stop