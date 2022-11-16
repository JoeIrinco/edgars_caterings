@extends('frontEnd.layout.main')
@section('content')
    



    <div class="col-md-12" style="margin-top: 40px; margin-bottom:40px;">
        
        <div class="col-md-12" style="text-align: center;">
            <label class="btn btn-warning"><h1>Finalize Reservation</h1></label>
        </div>

        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Customer Information </span></label>

                <label class="btn btn-success"> <span class="pull-right"> Total Amount </span></label>
                <input type="text" name='total_price' id='total_price' class="form-control" disabled style="text-align: right" >
            </div>
            <div class="col-md-6">
                    <table class="table table-hover table-striped table-bordered">
                        
                        
                        <tr>
                            <th style="width:10%;">Name</th>
                            <td style="width: 35%;" colspan="3">{{$tbl_cust->last_name}}, {{$tbl_cust->first_name}} {{$tbl_cust->middle_name}}</td>
                           
                        <tr>
                            <th>Contact</th>
                            <td>{{$tbl_cust->contact_no}}</td>
                            <th>E-Mail</th>
                            <td>{{$tbl_cust->email}}</td>
                        </tr>
                        
                        
                        <tr>
                            <th>Message</th>
                            <td>{{$tbl_reservation->message}}</td>
                            
                            <th>Location of Event</th>
                            <td>
                                <select name="location" id="location" class="form-select">
                                    <option value="customer_location">Customer Location</option>
                                    <option value="edgar_location">Edgar's Location</option>
                                </select>
                            </td>
                        
                        </tr>

                        

                        <tr>
                            <th>Date of Event</th>
                            <td>
                                <input type="text" id="event_date" name="event_date" value="{{date('Y-m-d')}}" >
                            </td>

                            <th>Time of Event</th>
                            <td>
                                <input type="text" id="event_time" name="event_time" >
                            </td>
                        </tr>

                        

                        <tr>
                            <th>No. of Packs</th>
                            <td>
                                <input type="number" value="0" id="no_packs" name="no_packs">
                            </td>

                            <th>Initial Package</th>
                            <td>{{$tbl_reservation->name}}</td>
                        </tr>

                        <tr>
                            <th>Add Package</th>
                            <td colspan="3">    
                                <div class="row">
                                   
                                        <div class="col-md-6">
                                            <label for="additional_package">Package</label>
                                            <select name="additional_package" id="additional_package" class="form-select">
                                                <option value="0">Select Additional Package</option>
            
                                                @foreach($tbl_package as $pack)
                                                <option value="{{$pack->id}}">{{$pack->name}}</option>
            
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="col-md-3">
                                            <label for="qty_package">Qty</label>
                                            <input type="number" id="qty_package" name="qty_package"   value="0">
            
                                        </div>
    
                                        <div class="col-md-3">
                                            <button class="btn btn-success"  id='add_package'> + </button>
                                        </div>
                                    

                                    
                                </div>

                                
                                
                                
                               
                            </td>
                        </tr>

                        <tr>
                            <th>Add Ons</th>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="add_ons">Menu</label>
                                        <select name="add_ons" id="add_ons" class="form-select">
                                            <option value="0">Select Add Ons</option>
        
                                            @foreach($tbl_add_on as $on)
                                            <option value="{{$on->id}}">{{$on->name}}</option>
        
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="qty_package">Qty</label>
                                        <input type="number" id="qty_on" name="qty_on"  value="0">
        
                                    </div>
                                  
                                    <div class="col-md-3">
                                        <button class="btn btn-success btn-sm" id='add_on'>+</button>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>



                    </table>
            </div>
        </div>



        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 " style="text-align: center">
                <div style="overflow: auto; max-height:100vh; width:auto;">
                    <table class="table table-hover table-striped table-bordered" id="order_tbl">
                        <thead>
                            <tr>
                                <th width="20%"> Menu Name </th>
                                <th width="30%"> Description </th>
                                <th width="10%"> Quantity </th>
                                <th width="10%"> Price </th>
                                <th> Sub Total </th>
                                
                            </tr>
                        </thead>
                      
                        <tbody id="order_list">
                            <tr>
                                <td>
                                    <input type="text"  id="ord_name_1" name="ord_name_1" value="{{$initial_order->name}}" disabled>
                                </td>
                                <td>
                                    <textarea disabled rows="1" class="form-control">{{$initial_order->description}}</textarea>
                                </td>
                                <td>
                                    <input type="text" id="ord_qty_1" name="ord_qty_1" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" id="ord_price_1" name="ord_price_1" value="{{$initial_order->price}}" disabled>
                                </td>
                                <td>
                                    <input type="hidden" id="id_1" name="id_1" value="{{$initial_order->id}}">
                                    <input type="hidden" id="ord_type_1" name="ord_type_1" value="package">
                                    
                                    <label id="sub_total">{{$initial_order->price}}</label>

                                </td>

                            </tr>
                        </tbody>
                       



                    </table>
                </div>
                  
            </div>
        </div>
      

       



        <div class="row">
                <div class="col-md-12" style="text-align: center;">
                        <button class="btn btn-info" id="proceed" >Proceed</button>
                        <button class="btn btn-danger" id="reset" onclick="reset();">Reset</button>
                        
                </div>
        </div>


    </div>


@endsection

@push('scripts')
    <script>
        
        function reset(){
            var yesno = confirm("Do you want to reset the page?");
            
            if(yesno){
                location.reload();
            }
           
        }

        $( "#event_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $('#event_time').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '11',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });


        var order_arr = "{{$initial_order->price}}" ;
        var row_count = 1;

        get_total(0);
        function get_total(addme){
            order_arr = parseFloat(order_arr) + parseFloat(addme);
            $("#total_price").val(order_arr);
        }


        $("#proceed").on("click", function(){
           
           var cust_id = "{{$tbl_cust->id}}";
           var location = $("#location").val();
           var event_date = $("#event_date").val();
           var event_time = $("#event_time").val();
           var no_packs = $("#no_packs").val();
            
           var orderArray = [];

           if(parseInt(no_packs) <= 0)
           {
               alert("Please input no. of packs");
               return;
           }

          

           for(let x=0; x<row_count; x++){
                var ind = x+1;
                var id = $("#id_"+ind).val();
                var ord_type = $("#ord_type_"+ind).val();
                
                var qty = $("#ord_qty_"+ind).val();
                var price = $("#ord_price_"+ind).val();
                orderArray[x] =id+":"+qty+":"+price+":"+ord_type;
                
            }


           var msg = confirm("Finalize order?");
           var url = "{{url('/')}}";
           if(msg){
                    $.ajax({
                    type: "POST",
                    url : url+"/submit_order",
                    dataType: 'json',
                    data: {
                        order: orderArray,
                        cust_id: cust_id,
                        location: location,
                        event_date: event_date,
                        event_time: event_time,
                        no_packs: no_packs,
                        reservation_id: "{{$tbl_reservation->id}}"
                    },
                        success: function(data) {
                            alert(data);

                            window.location.replace(url);
                        }
                    });

           }
          
           



       });



        $("#add_package").on("click", function(){
            var package = $("#additional_package").val();
            var package_qty = $("#qty_package").val();

            if(package == "0" || package_qty == "0"){
                alert("Please Complete the Data");
                return;
            }
            var url = "{{url('/')}}";

            $.ajax({
            type: "POST",
            url : url+"/add_order",
            dataType: 'json',
            data: {
                id: package
            },
                success: function(data) {
                    row_count = row_count+1;

                    var sub_total = parseFloat(package_qty) * data.price;
                    get_total(sub_total);

                    var append_row = "<tr><td>"
                        append_row = append_row + "<input type='text'  id='ord_name_"+row_count+"' name='ord_name_"+row_count+"' value='"+data.name+"' disabled></td>";
                        append_row = append_row + "<td><textarea class='form-control' disabled rows='1'>"+data.description+"</textarea></td>";
                        append_row = append_row + "<td><input type='text'  id='ord_qty_"+row_count+"' name='ord_qty_"+row_count+"' value='"+package_qty+"' disabled></td>";
                        append_row = append_row + "<td><input type='text'  id='ord_price_"+row_count+"' name='ord_price_"+row_count+"' value='"+data.price+"' disabled></td>";
                        append_row = append_row + "<td><input type='hidden'  id='id_"+row_count+"' name='id_"+row_count+"' value='"+data.id+"'> <input type='hidden'  id='ord_type_"+row_count+"' name='ord_type_"+row_count+"' value='package' disabled>";


                            
                            append_row = append_row + "<label id='sub_total'>"+sub_total+"</label>";   
                    $("#order_tbl").append(append_row);

                    $('#additional_package').val("0").change();
                    $("#qty_package").val('0');
                         


                }
            });




        });


        $("#add_on").on("click", function(){
            var add_ons = $("#add_ons").val();
            var qty_on = $("#qty_on").val();

            if(add_ons == "0" || qty_on == "0"){
                alert("Please Complete the Data");
                return;
            }
            var url = "{{url('/')}}";

            $.ajax({
            type: "POST",
            url : url+"/add_addon",
            dataType: 'json',
            data: {
                id: add_ons
            },
                success: function(data) {
                    row_count = row_count+1;

                    var sub_total = parseFloat(qty_on) * data.price;
                    get_total(sub_total);

                    var append_row = "<tr><td>"
                        append_row = append_row + "<input type='text'  id='ord_name_"+row_count+"' name='ord_name_"+row_count+"' value='"+data.name+"' disabled></td>";
                        append_row = append_row + "<td><textarea class='form-control' disabled rows='1'>"+data.description+"</textarea></td>";
                        append_row = append_row + "<td><input type='text'  id='ord_qty_"+row_count+"' name='ord_qty_"+row_count+"' value='"+qty_on+"' disabled></td>";
                        append_row = append_row + "<td><input type='text'  id='ord_price_"+row_count+"' name='ord_price_"+row_count+"' value='"+data.price+"' disabled></td>";
                        append_row = append_row + "<td><input type='hidden'  id='id_"+row_count+"' name='id_"+row_count+"' value='"+data.id+"' ><input type='hidden'  id='ord_type_"+row_count+"' name='ord_type_"+row_count+"' value='addon' >";

                            append_row = append_row + "<label id='sub_total'>"+sub_total+"</label>";   
                    $("#order_tbl").append(append_row);

                    $('#add_ons').val("0").change();
                    $("#qty_on").val('0');
                         


                }
            });




        });



    </script>




@endpush