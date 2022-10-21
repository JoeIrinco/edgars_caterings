<body style="font-family: century gothic">
    
    <h4>Good Day Mr/Mrs {{$name_to}} ,</h4>   
    <h3>RESERVATION ALERT: </h3>
    {{$status_msg}}
    <div>
       
        <div>
            <table >
                <tr>
                    <th colspan=2> Reservation Information </th>
                </tr>
               <tr>
                    <td>Reservation ID:</td>
                    <td>{{$reservationid}}</td>
                </tr>
                <tr>
                    <td>Date and Time:</td>
                    <td>{{$datetime}}</td>
                </tr>
                <tr>
                    <td>No of Packs:</td>
                    <td>{{$packs}}</td>
                </tr>
                <tr>
                    <td>Total Contract Price:</td>
                    <td>{{$totalprice}}</td>
                </tr>
            </table>
        </div>

        <h1><u><b> </b></u></h1>
    </div>

    <div>
       If you have question on this matter, Please contact directly the Edgard's Catering
    </div>
    <br>
    <br>
    <br>
    
    <div>
        Regards, <br>

        Edgar's Catering
    </div>
    

    <br>

    <small><i>This is a system generated email please do not reply</i></small>

   
  
</body>