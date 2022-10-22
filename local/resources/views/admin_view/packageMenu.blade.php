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
                <a class="btn btn-success" title="Add Menu" data-toggle="modal" data-target="#add_modal"><i style="color:white;" class="fa fa-plus" aria-hidden="true"> Add</i> </a><br><br>
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


<div class="modal fade" id="update_modal" name="update_modal" tabindex="-1" role="dialog" aria-labelledby="order_m" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="order_m">Update Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input id="id_update" type="hidden" placeholder="Package Name" class="form-control">

            <div class="form-group">
                <label>Package Name</label> 
                <input id="update_name" type="text" placeholder="Package Name" class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label> 
                <input id="update_description" type="text" placeholder="Description" class="form-control">
            </div>

            <div class="form-group">
                <label>Category</label> 
                <select class="form-control m-b" name="" id="update_category">
                    <option value="0">...</option>
                    <option value="Food">Food</option>
                    <option  value="Clothes">Clothes</option>
                    <option  value="Event">Event</option>
                    <option  value="Others">Others</option>
                </select>
                
            </div>


            <div class="form-group">
                <label>Price (PHP)</label> 
                <input type="number" placeholder="PHP 00.00" class="form-control" id="update_price">
            </div>

            
            <div class="form-group">
                <label>Image</label> 
                <div class="custom-file">
                    <input id="update_image_path" type="file" class="custom-file-input">
                    <label for="update_image_path" class="custom-file-label">Choose file...</label>
                </div> 

                
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn_update">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="add_modal" name="add_modal" tabindex="-1" role="dialog" aria-labelledby="order_m" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="order_m">Add Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label>Package Name</label> 
                <input type="text" id="add_name" placeholder="Package Name" class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label> 
                <input type="text" id="add_description" placeholder="Description" class="form-control">
            </div>

            <div class="form-group">
                <label>Category</label> 
                <select class="form-control m-b" name="" id="add_category">
                    <option value="Food">...</option>
                    <option value="Food">Food</option>
                    <option  value="Clothes">Clothes</option>
                    <option  value="Event">Event</option>
                    <option  value="Others">Others</option>
                </select>
                
            </div>


            <div class="form-group">
                <label>Price (PHP)</label> 
                <input type="number" id="add_price" placeholder="PHP 00.00" class="form-control">
            </div>

            
            <div class="form-group">
                <label>Image</label> 
                <div class="custom-file">
                    <input id="add_image_path" type="file" class="custom-file-input">
                    <label for="add_image_path" class="custom-file-label">Choose file...</label>

                    {{-- <input id="image_name" type="text" class=""> --}}
                </div> 
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"  id="btn_add">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="delete_modal" name="delete_modal" tabindex="-1" role="dialog" aria-labelledby="order_m" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="order_m"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            

            <div class="form-group">
                <h2>Are yoiu sure you want to delete this mernu package?</h2> 
                <input type="hidden" id="id_for_delete" placeholder="Package Name" class="form-control">
            </div>      

        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger"  id="btn_delete">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deactivate_modal" name="deactivate_modal" tabindex="-1" role="dialog" aria-labelledby="order_m" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="order_m"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            

            <div class="form-group">
                <h2>Are yoiu sure you want to Deactivate this mernu package?</h2> 
                <input type="hidden" id="deactivate_modal_id" placeholder="Package Name" class="form-control">
            </div>      

        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger"  id="btn_deactivate">Deactivate</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="activate_modal" name="deactivate_modal" tabindex="-1" role="dialog" aria-labelledby="order_m" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="order_m"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            

            <div class="form-group">
                <h2>Are yoiu sure you want to Activate this mernu package?</h2> 
                <input type="hidden" id="activate_modal_id" placeholder="Package Name" class="form-control">
            </div>      

        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success"  id="btn_activate">Activate</button>
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
                    {'data':"image_path",
                        render: function( data, type, full, meta ) {
                            return "<img src=\"../local/public/admin_assets/image_menu/" + data + "\" height=\"50\"/>";
                    
                        }
                    },
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



    $('#btn_update').on('click', function() {
        
        var id = $("#id_update").val();
        var name = $("#update_name").val();
        var description = $("#update_description").val();
        var category = $("#update_category").val();
        var price = $("#update_price").val();
        var image_path = $("#update_image_path").val();

        if( name==""|| description=="" || category=="" || image_path =="" || price ==""){
            alert('Please Complete the form');
        }else{

        $.ajax({
            type: 'POST',
            url: url+'/package/update',
            data: {
                _token: "{{ csrf_token() }}",
                id: id, 
                name: name,
                description: description,
                category: category,
                price: price,
                image_path: image_path
                
            },
            success: function(data){
                
                genTable();
                $('#update_modal').modal('hide');
                location.reload();
                alert('Successfuly Updated');
               
            }
        });

        }
  
    });


    $('#btn_add').on('click', function() {
     
        var name = $("#add_name").val();
        var description = $("#add_description").val();
        var category = $("#add_category").val();
        var price = $("#add_price").val();
        var image_path = $("#add_image_path").val();


        if( name==""|| description=="" || category=="" || image_path =="" || price ==""){
            alert('Please Complete the form');
        }else{

            $.ajax({
            type: 'POST',
            url: url+'/package/add',
            data: {
                _token: "{{ csrf_token() }}",
                name: name,
                description: description,
                category: category,
                price: price,
                image_path: image_path
                
            },
            success: function(data){
                
                genTable();
                $('#add_modal').modal('hide');
                location.reload();
                alert('Successfuly Added');
               
            }
            });

        }
   
        
    });

    $('body').on('click', '.update_show', function(e){
        var id =$(this).attr("data-id");
        $('#add_modal').modal('hide');
 

          $.ajax({
            type: 'POST',
            url: url+'/package/update_view',
            data: {
                _token: "{{ csrf_token() }}",
                id:id,
                
                
            },
            success: function(data){
                console.log(data[0].name);

                $("#id_update").val(data[0].id);
                $("#update_name").val(data[0].name);
                $("#update_description").val(data[0].description);
                $("#update_category").val(data[0].category);
                $("#update_price").val(data[0].price);
                // $("#update_image_path").val(data[0].image_path);
                
    
                $('#update_modal').modal('show');
        
            }
        });

    });


    $('body').on('click', '.delete_show', function(e){
        var id =$(this).attr("data-id");

        $("#id_for_delete").val(id);

        $('#delete_modal').modal('show');
        
    });

    $('body').on('click', '.deactivate_menu', function(e){
        var id =$(this).attr("data-id");
        $("#deactivate_modal_id").val(id);
        $('#deactivate_modal').modal('show');
       
    });


    $('body').on('click', '.activate_menu', function(e){
        var id =$(this).attr("data-id");
        $("#activate_modal_id").val(id);
        $('#activate_modal').modal('show');
        
    });


    $('#btn_delete').on('click', function() {
        
        var id = $("#id_for_delete").val();

        $.ajax({
            type: 'POST',
            url: url+'/package/delete',
            data: {
                _token: "{{ csrf_token() }}",
                id: id
                
            },
            success: function(data){
                
                genTable();
                $('#update_modal').modal('hide');
                location.reload();
                alert('Menu Deleted');
               
            }
        });
  
    });


    $('#btn_deactivate').on('click', function() {
        
        var id = $("#deactivate_modal_id").val();

        $.ajax({
            type: 'POST',
            url: url+'/package/deactivate',
            data: {
                _token: "{{ csrf_token() }}",
                id: id
                
            },
            success: function(data){
                
                genTable();
                $('#update_modal').modal('hide');
                location.reload();
                alert('Menu Deactivated');
               
            }
        });
  
    });

    $('#btn_activate').on('click', function() {
        
        var id = $("#activate_modal_id").val();

        $.ajax({
            type: 'POST',
            url: url+'/package/activate',
            data: {
                _token: "{{ csrf_token() }}",
                id: id
                
            },
            success: function(data){
                
                genTable();
                $('#update_modal').modal('hide');
                location.reload();
                alert('Menu set to Active');
               
            }
        });
  
    });

    


   



    </script>
@endpush