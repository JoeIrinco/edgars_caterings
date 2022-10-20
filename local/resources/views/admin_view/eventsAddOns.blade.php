@extends('admin_view.layout.main')
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Events Add-on's</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>Additional Services</strong>
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
                <a class="btn btn-success" onclick="" title="confirm reservation" data-target="#order_modal"><i style="color:white;" class="fa fa-plus" aria-hidden="true"> Add</i> </a><br><br>

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tbl_addOns">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Active</th>
                <th>Date added</th>
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

$('#tbl_addOns').DataTable({
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
                    "url": url+'/events/additional/gentable',
                    "dataType": "json",
                    "type": "POST",
                    "data":{
                        "_token": "{{ csrf_token() }}",   
                    }
                },
                "columns":[
                    {'data':"name" },
                    {'data':"description"},
                    {'data':"price"}, 
                    {'data':"is_active"},
                    {'data':"date_added"},
                    {'data':"action"}
                    
                ]
            });

}

    </script>
@endpush