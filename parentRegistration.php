<?php
// Initialize the session
session_start();
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Youth Spiritual Summit | Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!--
    <link rel = "stylesheet" href = "/Users/Cherald/Desktop/ProjectIzza-PIzza-/parentRegistrationStyle.css ">
    -->
  </head>

  <body style = "text-align: center" >
    <!--
    Navigation bar
    -->
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
      <div class="container" style = "background: LightSteelBlue">
        <a class="navbar-brand" href="http://youthspiritualsummit.weebly.com">
          <img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png"
          width="150" height="65" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse"
         data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
         aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

          <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link" href="http://youthspiritualsummit.weebly.com">
              <font color="white">Home</font>
            </a>
                      <!-- change to YSS Activities -->
            <a class="nav-item nav-link" href="http://campizza.com/calendar">
              <font color="white">Activities</font>
            </a>
                      <!-- change to YSS Fees -->
            <a class="nav-item nav-link" href="http://campizza.com/camp-fees">
              <font color="white">Fees</font>
            </a>
                      <!-- change to YSS Contact -->
            <a class="nav-item nav-link" href="http://campizza.com/contact">
              <font color="white">Contact</font>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <form id= "appForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      method="post">
      <div class="container" style = "background: white; margin-top: 20px;">
          <!-- Parent Registration Header -->
          <h1 align="center" style = "font-size:50px;padding-top: 20px;">Register for a Parent Account</h1>
          <br>

          <div class="block_1"><p style="padding-top:20px"</div>
            <hr  style="
              border-width: medium;
              border-color: LightSteelBlue;
            " />

        	<div class="container">

              <!-- Info and Exp -->
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">First Name:<b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "fnameInput" type="text" placeholder="Ex: John"
                       name="firstname" class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Last Name:<b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "lnameInput" type="text" placeholder="Ex: Smith"
                      name="lastname" class="form-control" required>
                  </div>

                  <p align="center" style = "font-size:30px;padding-top: 10px;">
                    Contact Information</p>
                  <br>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Phone Number:
                            <b style = "color: red;">*</b>
                          </span>
                      </div>
                      <input id="phoneInput" type="tel" placeholder="Ex: (123)-456-7890"
                      name="phone" class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Email Address:
                            <b style = "color: red;">*</b>
                          </span>
                      </div>
                      <input id="emailInput" type="semail" placeholder="Ex: johnsmith@gmail.com"
                       name="email" class="form-control" required>
                  </div>

                  <p align="center" style = "font-size:30px;padding-top: 10px;">
                    Residence Information</p>
                  <br>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Address:
                            <b style = "color: red;">*</b>
                          </span>
                      </div>
                      <input id="addressInput" type="text"
                      placeholder="Ex: 102 Irvine Avenue" name="address"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">City:
                            <b style = "color: red;">*</b>
                          </span>
                      </div>
                      <input id="cityInput" type="text" placeholder="Ex: Irvine" name="city"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Zipcode:
                            <b style = "color: red;">*</b>
                          </span>
                      </div>
                      <input id="zipcodeInput" type="text" placeholder="Ex: 111222"
                      name="zipcode" class="form-control" required>
                  </div>

                  <p align="left" style = "font-size:20px;padding-top: 10px;">
                    Emergency Contact 1 Information</p>
                  <br>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Relationship: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "ec1relInput" type="text"name="ec1relation"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Name: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "ec1name" type="text"name="ec1name"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Phone Number:
                            <b style = "color: red;">*</b>
                          </span>
                      </div>
                      <input id="ec1phoneInput" type="tel" placeholder="Ex: (123)-456-7890"
                      name="ec1phone" class="form-control" required>
                  </div>

                  <p align="left" style = "font-size:20px;padding-top: 10px;">
                    Emergency Contact 2 Information</p>
                  <br>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Relationship: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "ec2relInput" type="text"name="ec2relation"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Name: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "ec2name" type="text"name="ec2name"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Phone Number:
                            <b style = "color: red;">*</b>
                          </span>
                      </div>
                      <input id="ec2phoneInput" type="tel" placeholder="Ex: (123)-456-7890"
                      name="ec2phone" class="form-control" required>
                  </div>

                  <p align="center" style = "font-size:30px;padding-top: 10px;">
                    Medical Information</p>
                  <br>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Allergies/Conditions: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "ec1name" type="text"name="ec1name"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Medications: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "medInput" type="text"name="medication"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Activity Restrictions: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "actRestrictionInput" type="text"
                      name="actRestriction" class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Dietary Restrictions: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "dietRestrictionsInput" type="text"
                      name="dietRestrictions" class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Other: </span>
                      </div>
                      <input id = "otherInput" type="text"name="other"
                       class="form-control">
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Insurance Provider: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "insuranceInput" type="text" name="insurance"
                       class="form-control" required>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Name of Policy Holder: <b
                            style = "color: red;">*</b></span>
                      </div>
                      <input id = "policyInput" type="text" name="policy"
                       class="form-control" required>
                  </div>

                  <p align="left" style = "font-size:20px;">
                    Parent Authentication</p>
                  <br>

                  <form action="upload.php" method="post" enctype="multipart/form-data">
                      Picture of Driver's License:<b style = "color: red;">*</b>
                      <input type="file" name="license" id="licenseUpload" class="form-control" required">
                  </form>

              <!-- Verification -->
              <label><p style = "font-size:30px;">Verification</p></label>
                  <div class="row initial-task-padding">
                      <div class="col">
                      I certify that my answers are true and complete to the best of my knowledge. By checking "yes," I certify that if this application leads to my participation, any false or misleading information in my application or interview may result in my release.<b style = "color: red;">*</b>
                          <form action="/action_page.php">
                              <input type="radio" name="available" value="Yes"> Yes, I certify <br>
                              <input type="radio" name="available" value="No"> No, I do not certify <br>
                          </form>
                          <br>
                      </div>
                  </div>
              </div>
          </div>
      	<input type="hidden" id="gender" name="gender" value="">

      	<!-- Submit -->
          <div class="row margin-data"
          style = "padding-bottom: 50px;
                  padding-top: 10px;"
                  align="center";>
      			<div class="col">
      				<input type="submit" class="btn-xl" align="center" value="Submit" >
      			</div>
      		</div>
    	</form>

<!--
Javascript Segment
-->

    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>

    <script>
        var config = {
          apiKey: "AIzaSyDyWL6I7h4Vm_n3eJBWLie92wm77E1lQhU",
          authDomain: "youth-spiritual-summit.firebaseapp.com",
          databaseURL: "https://youth-spiritual-summit.firebaseio.com",
          projectId: "youth-spiritual-summit",
          storageBucket: "youth-spiritual-summit.appspot.com",
          messagingSenderId: "215019311847"
        };
        firebase.initializeApp(config);

        document.getElementById("appForm").addEventListener("click", function(){
            var database = firebase.database();
            //name and password
            var fName = document.getElementById("fnameInput").value;
            var lName = document.getElementById("lnameInput").value;
            var Password = document.getElementById("passwordInput").value;
            //contact info
            var Email = document.getElementById("emailInput").value;
            var phoneNum = document.getElementById("phoneInput").value;
            //Residence info
            var Address = document.getElementById("addressInput").value;
            var City = document.getElementById("cityInput").value;
            var Zipcode = document.getElementById("zipcodeInput").value;

            if (fName == ""){
                alert("fill in first name");
            }
            else {
              var newPostRef = firebase.database().ref('/').push({
                first_name: fName,
                last_name: lName,
                email: Email,
                phone: phoneNum,
                address: Address,
                city: City,
                zipcode: Zipcode
                },
               function(error){
                  if(error) {
                      alert("didn't go through")
                  }
                  else {
                      var postID = newPostRef.key;
                      window.location.replace("login.php");
                      console.log("went to firebase");
                  // Data saved successfully!
                  }
              });
          }
        });
    </script>
  </body>
</html>
