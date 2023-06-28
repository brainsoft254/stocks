@extends('stocksmaster') 
@section('content')    
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
       <h3 class="title text-center text-primary"> Payments List </h3>

       <a href="{{route('payments.create')}}" class="btn btn-success pull-left mr-1 " id="btnNew"><i class="fa fa-plus"></i>Add new Voucher</a> 
     </div>
     <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <table id="tbl-payments" class="table table-striped display nowrap" style="width:100%">
            <thead class="text-success bg-primary">
              <tr>
               <th>#</th>
               <th>Refno</th>
               <th>Payee</th>
               <th>Trandate</th>
               <th>Amount</th>
               <th>Cheque</th>
               <th>Remarks</th>
               <th>Staff</th>
               <th>Status</th>
               <th>Options</th>
             </tr>
           </thead>
           <tbody>
            <?php $i=1;?>
            @foreach ($payments as $payment)
            <tr>
              <td>{{$i}}</td>
              <td>{{$payment->refno}}</td>
              <td class="dt-nowrap">{{$payment->payee}}</td>
              <td>{{$payment->trandate}}</td>
              <td><span class="label label-primary"> {{number_format($payment->amount,2)}}</span></td>
              <td>{{$payment->cheque}}</td>
              <td>{{$payment->remarks}}</td>
              <td>{{$payment->staff}}</td>
              <td>@if($payment->status==0)<span class="text-danger"> UnPosted</span> @else<span class="text-success"> Posted</span> @endif</td>
              <td>
               <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  @if($payment->status==0)
                  <li><a id="editLink" class="dropdown-item text-default" href="{{route('payments.edit',$payment->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a id="deleteLink" class="dropdown-item text-default" href="{{route('payments.destroy',$payment->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Delete</a></li>
                  <li role="separator" class="divider"></li>
                  @endif
                  @if($payment->status>0)

                  <li><a id="reverseLink" class="dropdown-item text-default" href="{{url('post-payment')}}" payt_id="{{$payment->id}}"><i class="fa fa-reply-all" aria-hidden="true"></i> Reverse</a></li>
                  @else
                  <li><a id="approveLink" class="dropdown-item text-default" href="{{url('post-payment')}}" payt_id="{{$payment->id}}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Post</a></li>
                  @endif
                  <li role="separator" class="divider"></li>
                  <li><a id="viewLink"  class="dropdown-item text-default" href="{{route('payments.show',$payment->id)}}"><i class="fa fa-print" aria-hidden="true"></i> Print</a></li>

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
    $('#tbl-payments').DataTable();

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

      $(document).on('click','#approveLink',function(e){
        e.preventDefault();
        var v_id=$(this).attr('payt_id');;
        var uri=$(this).attr('href');

        bootbox.confirm({ 
          size: "small",
          message: "Post Selectd Payment Record {"+v_id+"} ?", 
          callback: function(result){
            /* result is a boolean; true = OK, false = Cancel*/
            if(result){
              var alertbox="";
              $.ajax({
                url:uri,
                method:'get',
                data:"id="+v_id+'&post=1',
                cache:false,
                beforeSend:function(){
                  alertbox=bootbox.dialog({message:"<i class='fa fa-spinner fa-spin'></i> Please wait..."});
                },
                complete:function(xhr){
                  alertbox.modal('hide');
                  swal("",xhr.responseText,"success");
              },

            });

            }else{
              alert('You Shied !! ;)');
            }
          }
        });
      });

      $(document).on('click','#reverseLink',function(e){
        e.preventDefault();
        var v_id=$(this).attr('payt_id');;
        var uri=$(this).attr('href');

        bootbox.confirm({ 
          size: "small",
          message: "Reverse Selectd Payment Record {"+v_id+"} ?", 
          callback: function(result){
            /* result is a boolean; true = OK, false = Cancel*/
            if(result){
              var alertbox="";
              $.ajax({
                url:uri,
                method:'get',
                data:"id="+v_id+'&post=0',
                cache:false,
                beforeSend:function(){
                  alertbox=bootbox.dialog({message:"<i class='fa fa-spinner fa-spin'></i> Please wait..."});
                },
                complete:function(xhr){
                  alertbox.modal('hide');
                  swal("",xhr.responseText,"success");
              },

            });

            }else{
              alert('You Shied !! ;)');
            }
          }
        });
      });

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

    $(document).on('click','a#deleteLink',function(e){
      e.preventDefault();
      var v_id=$(this).attr('idd');;
      var uri=$(this).attr('href');
      bootbox.confirm({ 
        size: "small",
        message: "Delete Payment Voucher {"+v_id+"} ?", 
        callback: function(result){
          /* result is a boolean; true = OK, false = Cancel*/
          if(result){
            var token = $('input[name="_token"]').val();
            $.ajax({
              url:uri,
              method:'POST',
              data:{
                "_token": token,
                "_method": 'DELETE',
              },
              cache:false,
              complete:function(xhr){
                swal("",xhr.responseText,"success");
                location.reload();
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