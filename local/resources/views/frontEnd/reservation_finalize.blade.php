@extends('frontEnd.layout.main')
@section('content')
    



    <div class="col-md-12" style="margin-top: 40px; margin-bottom:40px;">
        
        <div class="col-md-12" style="text-align: center;">
            <label class="btn btn-warning"><h1>Finalize Reservation</h1></label>
        </div>

        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Customer Information </span></label>
            </div>
            <div class="col-md-6">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <tr>
                            <th>Caption</th>
                            <th>Information</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$tbl_cust->last_name}}, {{$tbl_cust->first_name}} {{$tbl_cust->middle_name}}</td>
                            
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>{{$tbl_cust->contact_no}}</td>
                            
                        </tr>
                        <tr>
                            <td>E-Mail address</td>
                            <td>{{$tbl_cust->email}}</td>
                        </tr>

                        <tr>
                            <td>Messahe</td>
                            <td>{{$tbl_reservation->message}}</td>
                        </tr>

                        <tr>
                            <td>Initial Package</td>
                            <td>{{$tbl_reservation->name}}</td>
                        </tr>

                        <tr>
                            <td>Date of Event</td>
                            <td>
                                <input type="text" id="event_date" name="event_date" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>Time of Event</td>
                            <td>
                                <input type="text" id="event_time" name="event_time" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>Location of Event</td>
                            <td>
                                <select name="location" id="location" class="form-control">
                                    <option value="customer_location">Customer Location</option>
                                    <option value="edgar_location">Edgar Location</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>No. of Packs</td>
                            <td>
                                <input type="text" id="no_packs" name="no_packs" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>Add Package</td>
                            <td>    
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="additional_package">Package</label>
                                        <select name="additional_package" id="additional_package" class="form-control">
                                            <option value="0">Select Additional Package</option>
        
                                            @foreach($tbl_package as $pack)
                                            <option value="{{$pack->id}}">{{$pack->name}}</option>
        
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="qty_package">Qty</label>
                                        <input type="number" id="qty_package" name="qty_package" class="form-control"  value="0">
        
                                    </div>

                                    <div class="col-md-4">
                                        <button class="btn btn-success" id='add_package'>Add</button>
                                    </div>
                                </div>

                                
                                
                                
                               
                            </td>
                        </tr>

                        <tr>
                            <td>Add Ons</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="add_ons">Menu</label>
                                        <select name="add_ons" id="add_ons" class="form-control">
                                            <option value="0">Select Add Ons</option>
        
                                            @foreach($tbl_add_on as $on)
                                            <option value="{{$on->id}}">{{$on->name}}</option>
        
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="qty_package">Qty</label>
                                        <input type="number" id="qty_on" name="qty_on" class="form-control" value="0">
        
                                    </div>
                                  
                                    <div class="col-md-4">
                                        <button class="btn btn-success" id='add_on'>Add</button>
                                    </div>
                                </div>
                                
                            </td>
                        </tr>



                    </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Order List</span></label>
            </div>
            <div class="col-md-6">
                <div style="overflow: auto; max-height:100vh; width:auto;">
                    <table class="table table-hover table-striped table-bordered" id="order_tbl">
                        <thead>
                            <tr>
                                <th> Menu Name </th>
                                <th> Description </th>
                                <th> Quantity </th>
                                <th> Price </th>
                                <th> Action </th>
                                
                            </tr>
                        </thead>
                      
                        <tbody id="order_list">
                            <tr>
                                <td>
                                    <input type="text" id="ord_name_{{$initial_order->id}}" name="ord_name_{{$initial_order->id}}" value="{{$initial_order->name}}">
                                </td>
                                <td>
                                    <textarea rows="1" class="form-control">{{$initial_order->description}}</textarea>
                                </td>
                                <td>
                                    <input type="text" id="ord_qty_{{$initial_order->id}}" name="ord_qty_{{$initial_order->id}}" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" id="ord_price_{{$initial_order->id}}" name="ord_price_{{$initial_order->id}}" value="{{$initial_order->price}}" disabled>
                                </td>
                                <td>

                                </td>

                            </tr>
                        </tbody>
                       



                    </table>
                </div>
                  
            </div>
        </div>
      

       



        <div class="row">
                <div class="col-md-12" style="text-align: center;">
                        <button class="btn btn-info" id="proceed">Proceed</button>
                </div>
        </div>


    </div>


@endsection

@push('scripts')
    <script>
    

    </script>




@endpush