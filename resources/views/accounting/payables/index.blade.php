@extends('stocksmaster') 
@section('content')    
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
               <h3 class="title"> Suppliers List </h3>

               <div class="row">
                <a href="{{route('payables.create')}}" class="btn btn-primary pull-left mr-1 " id="btnNew"><i class="fa fa-plus"></i>Add new Supplier</a> 
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="tbl-suppliers" class="table table-striped display nowrap" style="width:100%">
                        <thead class="text-success bg-primary">
                            <tr>
                               <th>#</th>
                               <th>Code</th>
                               <th>Name</th>
                               <th>Cellphone</th>
                               <th>Email</th>
                               <th>Addrress</th>
                               <th>Status</th>
                               <th>Options</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php $i=1;?>
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$supplier->code}}</td>
                            <td class="dt-nowrap">{{$supplier->name}}</td>
                            <td>{{$supplier->tel}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->pobox}}</td>
                            <td>@if($supplier->status==0)<span class="text-danger"> InActive</span> @else<span class="text-success"> Active</span> @endif</td>
                            <td>
                               <div class="btn-group">
                                  <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a id="editLink" class="dropdown-item text-default" href="{{route('payables.edit',$supplier->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a id="viewLink"  class="dropdown-item text-default" href="{{route('payables.show',$supplier->id)}}"><i class="fa fa-search" aria-hidden="true"></i> View</a></li>
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
@stop
@section('page-script')
<script type="text/javascript">
	$(function(){
        $('#tbl-suppliers').DataTable();

        $(document).on('click',"a#btnNew",function(e){
            e.preventDefault();
            var urli=$(this).attr('href');
            $.get(urli,"",function(data){
               bootbox.dialog({
									//title:'',
									message:data,
									size:'large',
									backdrop:true,
									onEscape:function(){
                                      location.reload();
                                  }
                              });
           });
        });

        $(document).on('click',"a#btnNewItem",function(e){
            e.preventDefault();
            var urli=$(this).attr('href');
            $.get(urli,"",function(data){
             bootbox.dialog({
                message:data,
                size:'large',
                backdrop:true,
                onEscape:function(){
                     // location.reload();
                 }
             });
         });
        });


/*
			$('a.btn').on('click',function(e){
				e.preventDefault();

				$.ajax({
            			url:$('a.btn').attr('href'),
            			method:'GET',
            			complete:function(xhr){
            				bootbox.dialog({message:xhr.responseText,onEscape:function(){
            					className: "medium",
            					location.reload();
            				}});
            			}
                	});
			});
            */

            $(document).on('click','#editLink',function(e){
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
            $(document).on('click','#viewLink',function(e){
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
        });
    </script>
    @stop