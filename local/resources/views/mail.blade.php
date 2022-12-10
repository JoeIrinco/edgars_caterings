<body style="font-family: century gothic">
    
    <h4>Good Day Mr/Mrs {{$name_to}} ,</h4>   
    <h3>RESERVATION ALERT: </h3>
    <h4> {{$status_msg}} </h4>
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

        <br>

        <div>
            <table border =1>
        
                <?php 
                       echo " <tr>
                                        <th colspan=4> ORDER LIST </th>
                                </tr>";

                                echo " <tr>
                                        <th> ORDER NAME </th>
                                        <th> INCLUSION </th>
                                        <th> QTY </th>
                                        <th> PRICE </th>
                                        
                                </tr>";



                    foreach($order_list as $order){

                       

                        echo "<tr>";
                        echo  "<td>".$order["order_name"]."</td>";
                      
                            if($order["liner"] > 1){
                                $inc_arr = explode("*", $order["inclusion"]);
                                echo "<td>";
                            foreach($inc_arr as $key=> $inc){
                                if($key > 1){
                                    echo "<br>";
                                }
                                
                                if($key > 0){
                                    echo $key.".) ".$inc;
                                }
                            }  
                        echo "</td>";


                            }else{
                                echo  "<td>".$order["inclusion"]."</td>";
                            }
                          
                        
                        echo  "<td>".$order["qty"]."</td>";
                        echo  "<td>".$order["price"]."</td>";
                        echo  "</tr>";



                    }

                ?>


              
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
    <small><i style="color:red;">RESERVATION REMINDER! <br> PAYMENTS SHOULD BE DONE BEFORE TEN (10) DAYS AFTER THE CONFIRMATION OF RESERVATION  </i></small>




    <br>

    <small><i>This is a system generated email please do not reply</i></small>

   
  
</body>