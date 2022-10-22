@extends('admin_view.layout.main')
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Customer Management</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            
            <li class="breadcrumb-item active">
                <strong>Customer Information</strong>
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
            <table class="table table-striped table-bordered table-hover" id="tbl_customer">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Contact No.</th>
                <th>Email</th>
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
          <h5 class="modal-title" id="order_m">Update Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input id="id_update" type="hidden" placeholder="Package Name" class="form-control">

            <div class="form-group">
                <label>Last Name</label> 
                <input id="last_name_text" type="text" placeholder="Package Name" class="form-control">
            </div>

            <div class="form-group">
                <label>First Name</label> 
                <input id="first_name_text" type="text" placeholder="Description" class="form-control">
            </div>

            <div class="form-group">
                <label>Middle Name</label> 
                <input id="middle_name_text" type="text" placeholder="Middle Name" class="form-control">
            </div>

            <div class="form-group">
                <label>Contact</label> 
                <input id="contact_no_text" type="text" placeholder="Description" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label> 
                <input id="email_text" type="email" placeholder="email" class="form-control">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn_update">Save</button>
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

$('#tbl_customer').DataTable({
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
                    "url": url+'/customers/gentable',
                    "dataType": "json",
                    "type": "POST",
                    "data":{
                        "_token": "{{ csrf_token() }}",   
                    }
                },
                "columns":[
                    {'data':"customer_name" },
                    {'data':"contact_no"},
                    {'data':"email"}, 
                    {'data':"date_added"},
                    {'data':"action"}
                    
                ]
            });

}

    $('body').on('click', '.update_show', function(e){
        var id =$(this).attr("data-id");
        $('#add_modal').modal('hide');
 

          $.ajax({
            type: 'POST',
            url: url+'/customers/update_view',
            data: {
                _token: "{{ csrf_token() }}",
                id:id,
                
                
            },
            success: function(data){
                console.log(data[0].name);

                $("#id_update").val(data[0].id);
                $("#last_name_text").val(data[0].last_name);
                $("#first_name_text").val(data[0].first_name);
                $("#middle_name_text").val(data[0].middle_name);
                $("#contact_no_text").val(data[0].contact_no);
                $("#email_text").val(data[0].email);
                
                $('#update_modal').modal('show');
        
            }
        });

    });


    $('#btn_update').on('click', function() {
        
        var id = $("#id_update").val();
        var last_name = $("#last_name_text").val();
        var first_name = $("#first_name_text").val();
        var middle_name = $("#middle_name_text").val();
        var contact_no = $("#contact_no_text").val();
        var email = $("#email_text").val();

        if( last_name==""|| first_name==""){
            alert('Please Complete the form');
        }else{

        $.ajax({
            type: 'POST',
            url: url+'/customers/update',
            data: {
                _token: "{{ csrf_token() }}",
                id: id, 
                last_name: last_name, 
                first_name: first_name,
                middle_name: middle_name,
                contact_no: contact_no,
                email: email
                
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




    </script>
@endpush