<?php
if (!isset($_SESSION))
  session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>Make an Account | Youth Spiritual Summit</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredericka+the+Great"> -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> -->
	<!-- <link rel="stylesheet" href="registrationstyle.css"> -->
	<!-- <link rel="stylesheet" href="StudentRegistration.css"> -->

	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
		<div class="container" style = "background: #5b77a5">
			<a class="navbar-brand" href="http://youthspiritualsummit.weebly.com">
				<img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav mx-auto">
					<a class="nav-item nav-link" href="http://campizza.com"><font color="white">Home</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/calendar"><font color="white">Activities</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/camp-fees"><font color="white">Fees</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/contact"><font color="white">Contact</font></a>
				</div>
			</div>
		</div>
    </nav>

    <form id=form1 method="post">
        <div class="container" style = "background: white; margin-top: 20px;">
        <!-- Camp Registration Header -->
        <h1 align="center" style = "font-size:30px;padding-top: 20px;">Create New Account</h1>

        <!-- NEW STUFF STARTING HERE -->
        <div class="block_1"><p style="padding-top:20px"</div> <hr />

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Enter email:<b style = "color: red;">*</b></span>
            </div>
                <input type="semail" placeholder="Ex: 12345@gmail.com" name="email" id="email" class="form-control" required>
        </div>

        <div class="input-group mb-3">
             <div class="input-group-prepend">
                <span class="input-group-text">Enter A Password:<b style = "color: red;">*</b></span>
            </div>
                <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="input-group mb-3">
             <div class="input-group-prepend">
                <span class="input-group-text">Retype Your Password:<b style = "color: red;">*</b></span>
            </div>
                <input type="password" name="password2" id="password2" class="form-control" required>
        </div>

				<div class="input-group mb-3">
						 <div class="input-group-prepend" style="padding-right: 30px;">
								<span class="input-group-text">Choose Account type:<b
									style = "color: red;">*</b></span>
						</div>
								<select id="accountType" class="input-group-option" style="
									padding-left: 15px;
									padding-right: 20px;
								">
									<option value="parent">Guardian</option>
									<option value="counselor">Counselor</option>
									<option value="overage">Attendee</option>
								</select>
				</div>

        <div class="block_1"><p style="padding-top:30px"</div> <hr />
        <!-- Submit -->
        <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
                <div class="col">
                    <!-- <button id="myBtn">Submit</button> -->
                    <button type="button" value="Submit"
										 name="subscribe" id="submitAccount" >Next
                </div>
            </div>
        </div>
    </form>

    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
    <!--<script src="counselor_app.js"></script>-->
    <script>
        var config = {
            apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
            authDomain: "yss-project-69ba2.firebaseapp.com",
            databaseURL: "https://yss-project-69ba2.firebaseio.com",
            projectId: "yss-project-69ba2",
            storageBucket: "yss-project-69ba2.appspot.com",
            messagingSenderId: "530416464878"
        };
        firebase.initializeApp(config);

        document.getElementById("submitAccount").addEventListener("click", function(){
                var database = firebase.database();
                var email = document.getElementById("email").value;
                var pw1 = document.getElementById("password").value;
                var pw2 = document.getElementById("password2").value;
                email = email.replace(".", ",");
                    //console.log("testing");
                    //console.log(fn, ln, dob, e);
                if (!email || !pw1 || !pw2){
                    alert("Please fill in all fields");
                } else if ( pw1 != pw2 ){
                    alert("Password confirmation failed: re-entered password must match password")
                } else {
                    var check_e;
                    firebase.database().ref('/users/' + email).once('value').then(function(snapshot)
                        {
                            console.log("checking if exists");
                            check_e = (snapshot.val() && snapshot.val().email);
                            console.log(check_e);
                        }
                    );

                // setTimeout(function(){

                // if (check_e == null){
                //     // var newPostRef = firebase.database().ref('/users/' + email).set({
                //     //     email: email,
                //     //     password: pw1
                //     // },
                //     function(error) {
                //         if (error) {
                //             console.log("Failed to add user");
                //         } else {
                //             window.location.replace("counselor_registration.php");
                //             console.log("Added user to firebase");
                //         }
                //     };
                //     } else {
                //         alert("An account with the entered email already exists")
                //     }
                // }, 2000);

                    setTimeout(function(){
                        if (check_e == null){
                            var data = "email=" + email + "&password=" + pw1;
                            var url = "http://localhost:8000/counselor_registration.php";

                            var status = navigator.sendBeacon(url, data);

                                // Log the data and result
                            console.log("sendBeacon: URL = ", url, "; data = ", data, "; status = ", status);
                        } else {

                        }
                    });
                }
        });
            // Get the unique ID generated by push() by accessing its key




    </script>

</body>
</html>
