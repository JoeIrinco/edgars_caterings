@extends('frontEnd.layout.main')
@section('content')
    



    <div class="col-md-12" style="margin-top: 40px; margin-bottom:40px;">
        
        <div class="col-md-12" style="text-align: center;">
            <label class="btn btn-warning"><h1>Reservation Form</h1></label>
        </div>

        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Last Name </span></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
            </div>
        </div>
      
        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> First Name </span></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
            </div>
        </div>
      
        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Middle Name </span></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="mid_name" id="mid_name" placeholder="Middle Name">
            </div>
        </div>
      
        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Contact Number </span></label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> E-Mail </span></label>
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail">
            </div>
        </div>


        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Message </span></label>
            </div>
            <div class="col-md-6">
                <textarea name="message" id="message" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
            </div>
        </div>


        
        <div class="row">
            <div class="col-md-3" style="text-align: right;">
                <label class="btn btn-success"> <span class="pull-right"> Packages </span></label>
            </div>
            <div class="col-md-6">
              
                <select name="package" id="package" class="form-control">
                        <option value="0">Select a Package</option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}" > {{$service->name}} </option>
                    @endforeach
                </select>   


            </div>
        </div>

        <div class="row">
          
                <div class="col-md-3" style="text-align: right;">
                    <label class="btn btn-success"> <span class="pull-right"> CAPTCHA </span></label>
                </div>

                <div class="col-md-6" style="text-align: center">
                    <canvas id="captcha" style="border-style:dotted;">captcha text</canvas>
                    <br>

                        <button id="refreshButton" type="submit">Refresh</button>
                        <input id="textBox" type="text" name="text">
                    <span id="output"></span>
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
        
        $("#proceed").on("click", function(){
            var package = $("#package").val();
            var last_name = $("#last_name").val();
            var first_name = $("#first_name").val();
            var mid_name = $("#mid_name").val();
            var contact = $("#contact").val();
            var email = $("#email").val();
            var message = $("#message").val();
                if(package == "0"){
                    alert("Please Select a package to proceed");
                    return;
                }

                if(last_name == ""){
                    alert("Please Fill out your Last Name");
                    return;
                }
                if(first_name == ""){
                    alert("Please Fill out your First Name");
                    return;
                }
              
                if(contact == ""){
                    alert("Please Fill out your Contact Number");
                    return;
                }
                if(email == ""){
                    alert("Please Fill out your Email address");
                    return;
                }


                if (userText.value === c) {
                    output.classList.add("correctCaptcha");
                    var SITE_URL = "{{url('reservation/finalize')}}";


                    $.ajax({
						method: 'POST',
						url: SITE_URL,
						data: {
							package : package, 
                            last_name : last_name, 
                            first_name : first_name, 
                            mid_name : mid_name, 
                            contact : contact, 
                            email : email, 
                            message : message, 
						},
						dataType: 'json',
						success: function (source) {
                                window.open(SITE_URL+"/"+source);


                        }
				});


                } else {
                    output.classList.add("incorrectCaptcha");
                    output.innerHTML = "Incorrect, please try again";
                }





        }); 
    </script>

    <script>
        // document.querySelector() is used to select an element from the document using its ID
let captchaText = document.querySelector('#captcha');
var ctx = captchaText.getContext("2d");
ctx.font = "30px Roboto";
ctx.fillStyle = "#08e5ff";

let userText = document.querySelector('#textBox');

let output = document.querySelector('#output');
let refreshButton = document.querySelector('#refreshButton');

// alphaNums contains the characters with which you want to create the CAPTCHA
let alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
let emptyArr = [];
// This loop generates a random string of 7 characters using alphaNums
// Further this string is displayed as a CAPTCHA
for (let i = 1; i <= 7; i++) {
    emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
}
var c = emptyArr.join('');
ctx.fillText(emptyArr.join(''),captchaText.width/4, captchaText.height/2);

// This event listener is stimulated whenever the user press the "Enter" button
// "Correct!" or "Incorrect, please try again" message is
// displayed after validating the input text with CAPTCHA
userText.addEventListener('keyup', function(e) {
    // Key Code Value of "Enter" Button is 13
    if (e.keyCode === 13) {
        if (userText.value === c) {
            output.classList.add("correctCaptcha");
            output.innerHTML = "Correct!";
        } else {
            output.classList.add("incorrectCaptcha");
            output.innerHTML = "Incorrect, please try again";
        }
    }
});
// This event listener is stimulated whenever the user clicks the "Submit" button
// "Correct!" or "Incorrect, please try again" message is
// displayed after validating the input text with CAPTCHA
// submitButton.addEventListener('click', function() {
   
// });
// This event listener is stimulated whenever the user press the "Refresh" button
// A new random CAPTCHA is generated and displayed after the user clicks the "Refresh" button
refreshButton.addEventListener('click', function() {
    userText.value = "";
    let refreshArr = [];
    for (let j = 1; j <= 7; j++) {
        refreshArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
    }
    ctx.clearRect(0, 0, captchaText.width, captchaText.height);
    c = refreshArr.join('');
    ctx.fillText(refreshArr.join(''),captchaText.width/4, captchaText.height/2);
    output.innerHTML = "";
});


        </script>



@endpush