<html>
<title>ORDER LIST</title>

<body>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        table,
        td,
        tr,
        th {

            border-collapse: collapse;
            text-align: center;
            font-family: arial;
            font-size: 15px;
        }
    </style>
    {{-- <img src="{{asset('images/icon.png')}}" alt="" width="10" > --}}

    <center> <

        <h2 style="margin-top:-20;">Edgar's Catering Services
        </h2>
    </center>



    <p>
        <strong>Name: <u>{{$cust_info->first_name}} {{$cust_info->middle_name}} {{$cust_info->last_name}}
            </u></strong> <br>
        <strong>Contact: <u>{{$cust_info->contact_no}} </u></strong> <br>
        <strong>Email: &nbsp; <u>{{$cust_info->email}} </u></strong> <br>
        <strong>Reservation Date: &nbsp; <u>{{$cust_info->date_reserved}} </u></strong> <br>
        <strong>Reservation Time: &nbsp; <u>{{$cust_info->time_reserved}} </u></strong> <br>
        <strong>No of Packs: &nbsp; <u>{{$cust_info->no_of_packs}} </u></strong> <br>
        <strong>Event Location: &nbsp; <u>{{$cust_info->location_type}} </u></strong> <br>
        <strong>Description: &nbsp; <u>{{$cust_info->message}} </u></strong> <br>
        {{-- <strong>Total Price: &nbsp; <u>Php. {{number_format($cust_info->total_price,2)}} </u></strong> <br> --}}
        
        
    </p>

    <TABLE border="1" class="center"style="width:100%">
            <tr>
                <th colspan="5">Order List</th>
            </tr>
            <tr>
                <th width="20%">Order Name</th>
                <th width="40%">Inclusion</th>
                <th width="10%">Qty</th>
                <th width="15%">Price</th>
                <th width="15%">Sub Total</th>
                
            </tr>
            @foreach($order_list as $order)
            <tr>
                <td style="text-align: left;">{{$order['order_name']}}</td>
                <td style="text-align: left;">
                    @php
                        $order_data = str_replace("*", "<br>", $order["inclusion"]);
                        echo $order_data;
                    @endphp
                    
                </td>
                <td style="text-align: center;">{{$order['qty']}}</td>
                <td style="text-align: right;">{{$order['price']}}</td>
                <td style="text-align: right;">{{$order['sub_total']}}</td>
                
            </tr>
            @endforeach
        
    </TABLE>




</body>

</html>
