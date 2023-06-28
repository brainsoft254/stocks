@extends('stocksmaster') 
@section('content')              
<section class="section">
  <div class="row">
    <div class="col-md-11">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="title text-center"> Users List </h3>

          <br/>
          <a href="#" link-url="{{route('users.create')}}" class="btn btn-primary pull-left" id="btnNew"><i class="fa fa-plus"></i>New User</a>
        </div>


        <div class="box-body">
          <div class="row">
            <div class="col col-8 col-sm-12 col-md-12 col-xl-12 stats-col">
             &nbsp;
             <ul class="nav nav-tabs">
              <li class="active ">
                <a class=" text-primary" href="#active_users" data-toggle="tab"><i class="fa fa-th-list fa-fw"></i> Active Users </a>
              </li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="active_users">
                <br/>
                <table class="table table-striped table-responsive " id="tbl-users-list">
                  <thead class="text-success">
                    <tr>
                      <th>#</th>
                      <th>FullNames</th>
                      <th>Email</th>
                      <th>User Group</th>
                      <th>Station</th>
                      <th>Status</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php $i=1;?>
                    @foreach ($users as $user)
                    @if($user->status <=1)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->ugroup}}</td>
                      <td>{{Stockspro::getLocationName($user->station)}}</td>
                      <td>{{($user->status>0?'Active':'Inactive')}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a id="editLink"  href="{{route('users.edit',$user->id)}}" class="text-primary editlink" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{route('users.destroy',$user->id)}}"  class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>

                          </ul>
                        </div>
                      </td>                               
                    </tr>
                    @endif
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
</section>
@stop
@section('page-style')
<style type="text/css">
a.dropdown-item,a.dropdown-item:hover{
 text-decoration: none;
}
</style>
@stop
@section('page-script')
<script type="text/javascript">
	$(function(){

   $('#tbl-users-list').DataTable();

   $(document).on('click',"a#btnNew",function(e){
    e.preventDefault();
    var urli=$(this).attr('link-url');
    $.get(urli,"",function(data){
     bootbox.dialog({
       title:'',
       message:data,
       backdrop:true,
       onEscape:true,
     });
   });
  });

   $(document).on('click','#viewLink',function(e){
    e.preventDefault();
    var urli=$(this).attr('href');
    alert(urli);

  });

   $(document).on('click','#editLink',function(e){
    e.preventDefault();

    var urli=$(this).attr('href');
    $.get(urli,"",function(data){

      bootbox.dialog({
        message:data,
        size:'large',
        backdrop:true,
        onEscape:function(){location.reload();},
      });
    });
  });

   $(document).on('click','#deleteLink',function(e,id){
    e.preventDefault();
    var urli= $(this).attr("href");
    bootbox.confirm({ 
      size: "small",
      message: "Delete Selected User ?", 
      callback: function(result){
       if(result){
        var token = $('input[name="_token"]').val();
        $.ajax({
          url:urli,
          method:'POST',
          data:{
            "_token": token,
            "_method": 'DELETE',
          },
          cache:false,
          complete:function(xhr){
            swal("",xhr.responseText,"success");
          }
        });
      }else{
        alert('You Shied !! ;)');
      }
    }
  });
  });


 });
</script>
@stop