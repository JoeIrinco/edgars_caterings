@extends('admin_view.layout.main')
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Reservation Request</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>Reservation Request</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
           
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tbl_reservation">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>Date and Time </th>
                <th>Location</th>
                <th>No of Packs</th>
                <th>Message</th>
                <th>Total Price</th>
                <th>Status</th>
                
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            
     

            </tbody>
           




            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>


<div class="modal fade" id="order_modal" name="order_modal" tabindex="-1" role="dialog" aria-labelledby="order_m" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="order_m">Order List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover" id="tbl_order_list">
                <thead>
                <tr>
                    <th>Order Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Sub Total</th>
                </tr>
                </thead>
                <tbody>
    
                </tbody>
                </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@endsection
@push("scripts")
    <script>
        var url ="{{url('/')}}";

    function approve(id){
        var yesNo = confirm("Confirmed Booking?");
            if(yesNo){

                $.ajax({
                    type: "POST",
                    url : url+"/approval_process",
                    data: {
                        "_token": "{{ csrf_token() }}",  
                        "id": id,
                        "status": "approve"
                    },
                    dataType: 'json',
                        success: function(data) {
                           alert(data);

                           genTable();
                        }
                    });

            }
    }

    function disapprove(id){
        var yesNo = confirm("Disapprove Booking?");
            if(yesNo){

                $.ajax({
                    type: "POST",
                    url : url+"/approval_process",
                    data: {
                        "_token": "{{ csrf_token() }}",  
                        "id": id,
                        "status": "disapprove"
                    },
                    dataType: 'json',
                        success: function(data) {
                           alert(data);

                           genTable();
                        }
                    });

            }
    }
    function paid(id){
        var yesNo = confirm("Received Payment?");
            if(yesNo){

                $.ajax({
                    type: "POST",
                    url : url+"/approval_process",
                    data: {
                        "_token": "{{ csrf_token() }}",  
                        "id": id,
                        "status": "paid"
                    },
                    dataType: 'json',
                        success: function(data) {
                           alert(data);

                           genTable();
                        }
                    });

            }
    }
    

    function done(id){
        var yesNo = confirm("Delivered Reservation?");
            if(yesNo){

                $.ajax({
                    type: "POST",
                    url : url+"/approval_process",
                    data: {
                        "_token": "{{ csrf_token() }}",  
                        "id": id,
                        "status": "done"
                    },
                    dataType: 'json',
                        success: function(data) {
                           alert(data);

                           genTable();
                        }
                    });

            }
    }
    

    function cancel(id){
        var yesNo = confirm("Cancel Booking?");
            if(yesNo){

                $.ajax({
                    type: "POST",
                    url : url+"/approval_process",
                    data: {
                        "_token": "{{ csrf_token() }}",  
                        "id": id,
                        "status": "cancel"
                    },
                    dataType: 'json',
                        success: function(data) {
                           alert(data);

                           genTable();
                        }
                    });

            }
    }
    
    function receipt(id){
        var yesNo = confirm("Send Receipt to Client?");
            if(yesNo){

                $.ajax({
                    type: "POST",
                    url : url+"/approval_process",
                    data: {
                        "_token": "{{ csrf_token() }}",  
                        "id": id,
                        "status": "receipt"
                    },
                    dataType: 'json',
                        success: function(data) {
                           alert(data);

                           genTable();
                        }
                    });

            }
    }
    function resend_receipt(id){
        var yesNo = confirm("Resend Receipt to Client?");
            if(yesNo){

                $.ajax({
                    type: "POST",
                    url : url+"/approval_process",
                    data: {
                        "_token": "{{ csrf_token() }}",  
                        "id": id,
                        "status": "resend_receipt"
                    },
                    dataType: 'json',
                        success: function(data) {
                           alert(data);

                           genTable();
                        }
                    });

            }
    }
    

    function getOrderList(id){
        $('#tbl_order_list').DataTable({
                "bDestroy": true,
                "autoWidth": false,
                "searchHighlight": true,
                "searching": true,
                "processing": true,
                "serverSide": true,
                "orderMulti": true,
                "order": [],
                "pageLength": 10,
                "ajax": {
                    "url": url+'/reserv/getOrderList',
                    "dataType": "json",
                    "type": "POST",
                    "data":{
                        "_token": "{{ csrf_token() }}",   
                        id: id
                    }
                },
                "columns":[
                    {'data':"order_name" },
                    {'data':"qty"},
                    {'data':"price"}, 
                    {'data':"sub_total"},

                ]
            });

    }


genTable();



function genTable(){


$('#tbl_reservation').DataTable({
                "bDestroy": true,
                "autoWidth": false,
                "searchHighlight": true,
                "searching": true,
                "processing": true,
                "serverSide": true,
                "orderMulti": true,
                "order": [],
                "pageLength": 10,
                "ajax": {
                    "url": url+'/reserv/gentable',
                    "dataType": "json",
                    "type": "POST",
                    "data":{
                        "_token": "{{ csrf_token() }}",   
                    }
                },
                "columns":[
                    {'data':"customer_name" },
                    {'data':"datetime"},
                    {'data':"location"}, 
                    {'data':"no_packs"},
                    {'data':"message"},
                    {'data':"total_price"},
                    {'data':"status"},
                    
                    {'data':"action"},


            

                ]
            });


}


    </script>
@endpush