@extends('admin_view.layout.main')
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Package Menu</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>Menu</strong>
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
            <table class="table table-striped table-bordered table-hover" id="tbl_package">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Active</th>
                <th>Date Added</th>
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
          <h5 class="modal-title" id="order_m">Update Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label>Package Name</label> 
                <input type="text" placeholder="Enter email" class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label> 
                <input type="text" placeholder="Enter email" class="form-control">
            </div>

            <div class="form-group">
                <label>Category</label> 
                <select class="form-control m-b" name="">
                    <option value="Food">Food</option>
                    <option  value="Clothes">Clothes</option>
                    <option  value="Event">Event</option>
                    <option  value="Others">Others</option>
                </select>
                
            </div>


            <div class="form-group">
                <label>Price (PHP)</label> 
                <input type="number" placeholder="PHP 00.00" class="form-control">
            </div>

            
            <div class="form-group">
                <label>Image</label> 
                <div class="custom-file">
                    <input id="logo" type="file" class="custom-file-input">
                    <label for="logo" class="custom-file-label">Choose file...</label>
                </div> 
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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

$('#tbl_package').DataTable({
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
                    "url": url+'/package/gentable',
                    "dataType": "json",
                    "type": "POST",
                    "data":{
                        "_token": "{{ csrf_token() }}",   
                    }
                },
                "columns":[
                    {'data':"name" },
                    {'data':"description"},
                    {'data':"category"}, 
                    {'data':"price"},
                    {'data':"image_path"},
                    {'data':"is_active"},
                    {'data':"date_added"},
                    {'data':"action"}
                    
                ]
            });

}

    $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    </script>
@endpush