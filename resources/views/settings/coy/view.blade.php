      
<section class="section">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="header-block">
                        <h3 class="title alert alert-info"> Company Profile </h3>
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
                    <form class="form-coy" id="form-coy" action="{{route('coys.store')}}" method="POST" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Name</span>
                                        <input id="name" type="text" class="form-control" name="name" value="{{$coy->name}}" readonly autofocus placeholder="Enter Company Name">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Address</span>
                                        <input id="address" type="text" class="form-control" name="address" value="{{ $coy->address }}" readonly autofocus placeholder="Enter Address">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Town</span>
                                        <input id="town" type="text" class="form-control" name="town" value="{{ $coy->town }}" readonly autofocus placeholder="Enter Town">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Telephone</span>
                                        <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $coy->telephone }}" readonly autofocus placeholder="Enter Telephone">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('cellphone') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Cellphone</span>
                                        <input  id="cellphone" type="text" class="form-control" name="cellphone" value="{{ $coy->cellphone }}" readonly autofocus placeholder="Enter cellphone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Email</span>
                                        <input id="email" id="email" type="email" class="form-control" name="email" value="{{ $coy->email }}" readonly autofocus placeholder="Enter Email">
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
                                        <span class="input-group-addon reams-input-addon"><i class="fa fa-credit-card fa-fw"></i> Physical Address</span>
                                        <textarea style="resize: none" id="physicaladd" id="physicaladd" type="text" class="form-control" name="physicaladd"  readonly autofocus placeholder="Enter Physical Address">{{ $coy->physicaladd }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                <div class="image-container">
                                    <div class="coylogo pull-right" style=" border-radius:75px; width:150px; height:150px; background-image:url('{{$coy->getFirstMediaUrl('logo','thumb')}}') "></div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
/*.select2 .select2-container.select2-container--default.select2-container--below').css('width','100% !important')*/
</style>
