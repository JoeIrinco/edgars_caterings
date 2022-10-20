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
            <table class="table table-striped table-bordered table-hover dataTables-example" id="tbl_reservation">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>Date and Time </th>
                <th>No of Packs</th>
                <th>Message</th>
                <th>Total Price</th>
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

@endsection
@push("scripts")
    <script>
        var url ="{{url('/')}}";

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
                    {'data':"no_packs"},
                    {'data':"message"},
                    {'data':"total_price"},
                    {'data':"action"},


            

                ]
            });


}


    </script>
@endpush