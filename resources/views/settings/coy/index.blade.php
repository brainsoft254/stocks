@extends('stocksmaster') 
@section('content')   
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="title"> Company Profile List </h3>
        <br/>
        @if(Auth::user()->role[0]->edt_coy)
        <a href="#" link-url="{{route('coys.create')}}" class="btn btn-primary pull-left" id="btnNew"><i class="fa fa-plus"></i>New Company Profile</a>
        @endif
      </div>
      <div class="box-body">
        <div class="row">
         <div class="col col-12 col-sm-12 col-md-12 col-xl-12 stats-col">
           &nbsp;
           <ul class="nav nav-tabs">
            <li class="active ">
              <a class=" text-primary" href="#tab_master" data-toggle="tab"><i class="fa fa-th-list fa-fw"></i> Company Profile </a>
            </li>

          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_master">
              <table class="table table-striped " id="tbl-receipts-list">
                <thead class="text-success">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Town</th>
                    <th>Email</th>
                    <th>Cellphone</th>
                    <th>PayBill</th>
                    <th></th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1;?>
                  @foreach ($coy as $cy)

                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$cy->name}}</td>
                    <td>{{$cy->address}}</td>
                    <td>{{$cy->town}}</td>
                    <td>{{$cy->email}}</td>
                    <td>{{$cy->cellphone}}</td>
                    <td>{{$cy->paybillno}}</td>
                    <td><img src="stockspro/public/{{$cy->getFirstMediaUrl('logo','thumb')}}" alt="x" class=" responsive img-rounded bordered" style="border-radius: 30%" /></td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                         @if(Auth::user()->role[0]->edt_coy)
                         <li><a id="editLink" edit-url="{{route('coys.edit',$cy->id)}}" class="text-primary editlink" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></li>
                         <li role="separator" class="divider"></li>
                         @endif
                         @if(Auth::user()->role[0]->vw_coy)
                         <li><a id="viewLink"  view-url="{{url('coys',$cy->id)}}" class="text-primary viewLink" ><i class="fa fa-view" aria-hidden="true"></i> View</a></li>
                         <li role="separator" class="divider"></li>
                         @endif
                         @if(Auth::user()->role[0]->del_coy)
                         <li ><input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"><a class="text-primary" id="deleteLink" href="{{route('coys.destroy',$cy->id)}}" idd="{{$cy->id}}" class="text-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
                         @endif
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
@stop
@section('page-script')
<script type="text/javascript">
  $(function(){

   $('#tbl-receipts-list').DataTable();

   $(document).on('click',"a#btnNew",function(e){
    e.preventDefault();
    var urli=$(this).attr('link-url');
    $.get(urli,"",function(data){
     bootbox.dialog({
       title:'',
       message:data,
       size:'large',
       backdrop:true,
       onEscape:true,
     });
   });
  });

   $(document).on('click','#viewLink',function(e){
    e.preventDefault();
    var urli=$(this).attr('view-url');
    alert(urli);
    $.get(urli,"",function(data){

      bootbox.dialog({
        title:'',
        message:data,
        size:'large',
        backdrop:true,
        onEscape:function(){location.reload();},
      });
    });
  });

   $(document).on('click','#editLink',function(e){
    e.preventDefault();
    var urli=$(this).attr('edit-url');
    $.get(urli,"",function(data){

      bootbox.dialog({
        title:'',
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
      message: "Delete Selected Company Details?", 
      callback: function(result){
       /* result is a boolean; true = OK, false = Cancel*/
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