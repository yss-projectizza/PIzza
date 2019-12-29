<?php
// Initialize the session
session_start();

$parent_email = $_SESSION["queryData"]["email"];
?>

<!doctype html>
<html lang="en">

<head>
	<title>Youth Registration | Youth Spiritual Summit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <?php include('header_loggedin.php') ?>
    <form id=form1 method="post">
        <div class="container" style = "background: white; margin-top: 20px;">
        <!-- Camp Registration Header -->
        <h1 align="center" style = "font-size:40px;padding-top: 20px;">Youth Participant Registration</h1>

        <!-- NEW STUFF STARTING HERE -->
        <div class="block_1"><p style="padding-top:20px"</div> <hr />

        <div class="container">
        <!-- Youth Information -->
        <!-- ONLY PARENT SHOULD FILL THIS OUT. STUDENT CAN NOT CHANGE IT -->
            <label><p style = "font-size:30px;">Participant Information</p></label>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">First Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: John" name="firstname" id="firstname" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Last Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: Smith" name="lastname" id="lastname" class="form-control" required>
                </div>
                
                <!--Sky: This block adds student's date of birth question-->
                <div class="input-group mb-3">
                	<div class="input-group-prepend">
                		<span class="input-group-text">Date of Birth:<b style="color: red;">*</b></span>
                	</div>
                		<input type="date" name="studentDOB" id="studentDOB" class="form-control" required>
                </div>
                
                <div class="input-group mb-3">
                	<div class="input-group-preend">
                		<span class="input-group-text">Student's Email:<b style = "color: red;"></b></span>
                	</div>
                	<input type="text" placeholder="Ex: abc@gmail.com" name="studentEmail" id="studentEmail" class="form-control" required>
                </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Gender:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="gender" id="gender">
                                <option>Female</option>
                                <option>Male</option>
                        </select>
                    </div>
                </div>

                <!--
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
                -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Upcoming School Year:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="schoolyear" id="schoolyear">
                            <option>Freshman</option>
                            <option>Sophomore</option>
                            <option>Junior</option>
                            <option>Senior</option>
                            <option>Early College</option>
                            <option>Home School</option>
                        </select>
                    </div>
                </div>


                <!-- SHOULD BE AUTOMATICALLY CALCULATED BASED OFF OF DOB -->
<!--                 <div class="input-group mb-3"> -->
<!--                     <div class="input-group-prepend"> -->
                    <span class="input-group-text">Age:<b style = "color: red;">*</b></span>
<!--                         <select class="form-control form-control-md" name="age" id="age"> -->
<!--                             <option>14</option> -->
<!--                             <option>15</option> -->
<!--                             <option>16</option> -->
<!--                             <option>17</option> -->
                            <!-- <option>18</option> -->
<!--                         </select> -->
<!--                     </div> -->
<!--                 </div> -->

                <!-- STUDENT FILL THIS OUT ONCE THERE'S AN ACCOUNT
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Sweatshirt Size:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="size" id="size">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div>
                </div>
                -->

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Picture of Student ID:<b style = "color: red;">*</b>
                    <input type="file" name="upload" id="upload" class="form-control" required>
                </form>
        </div>

        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <div class="container">
        <!-- Health Information -->
        </div>
            <label><p style = "font-size:30px;padding-top: 10px;">Health Information</p></label>
            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Allergies You Have. If none, type N/A.<b style = "color: red;">*</b></p>
                    <textarea id="allergies" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Medication You Are Currently On. If none, type N/A<b style = "color: red;">*</b></p>
                    <textarea id="meds" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Activity Restrictions.</b></p>
                    <textarea id="activities" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Dietary Restrictions.</b></p>
                    <textarea id="dietary" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Other Important Information </b></p>
                    <textarea id="other" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Insurance Provider:<b style = "color: red;">*</b></span>
                 </div>
                <input type="text" placeholder="Ex: PPO" name="insurance" id="insurance" class="form-control" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Policy Holder:<b style = "color: red;">*</b></span>
                 </div>
                <input type="text" placeholder="Ex: John" name="policy_holder" id="policy_holder" class="form-control" required>
            </div>
        
        <div class="block_1">
            <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px; margin-bottom: 10%;" align="center">
                <div class="col">
                    <button type="button" value="Submit" class="rounded" name="subscribe" id="submitContact">Submit
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

            document.getElementById("submitContact").addEventListener("click", functSubmit);
                function functSubmit(event){
                    var database = firebase.database();
                    var fn = document.getElementById("firstname").value;
                    var ln = document.getElementById("lastname").value;
                    var studentEmail = document.getElementById("studentEmail").value;
                    var emailwcharactersreplaced = studentEmail.replace(".",",");
                    var gender = document.getElementById("gender").value;
                    var year = document.getElementById("schoolyear").value;
                    var dob = document.getElementById("studentDOB").value;
                    var birthYear = dob.slice(0,4);
                    var defaultPassword = ln + birthYear;
                    
                    // var size = document.getElementById("size").value;
                    var file = document.getElementById("upload").value;
                    var allergies = document.getElementById("allergies").value;
                    var meds = document.getElementById("meds").value;
                    var activities = document.getElementById("activities").value;
                    var dietary = document.getElementById("dietary").value;
                    var other = document.getElementById("other").value;
                    var insurance = document.getElementById("insurance").value;
                    var policy_holder = document.getElementById("policy_holder").value;
                    if (fn == ''){
                        alert("fill in first name");
                    }
                    else if (ln == ''){
                        alert("fill in last name");
                    }
                    else if (allergies == ''){
                        alert("please add any alleriges or type N/A");
                    }
                    else if (meds == ''){
                        alert("please add any medication or type N/A");
                    }
                    else {
                        let parent_email = "<?php echo $parent_email; ?>";
                        var newPostRef = firebase.database().ref('/users/' + emailwcharactersreplaced).set({
                            user_type: "student",
                            first_name: fn,
                            last_name: ln,
                            studentEmail: studentEmail,
                            gender: gender,
                            year: year,
                            dob: dob,
                            birthYear: birthYear,
                            password: defaultPassword,
                            file: file,
                            alleriges: allergies,
                            meds: meds,
                            activities: activities,
                            dietary: dietary,
                            other: other,
                            insurance: insurance,
                            policy_holder: policy_holder,
                            parent_email:"<?php echo $parent_email; ?>",
                            group_num: "N/A",
                            cabin_num: "N/A",
                            bus_num: "N/A",
                        }, function(error){
                        if (error) {
                            alert("Did not go through")
                        } else {
                            alert("The form was submitted.");
                            var postID = newPostRef.key;
                            window.location.href = "email_student.php?studentEmail=" + studentEmail + "&reset=true";	
                        }
                        }
                        );
                    }

                };

        </script>

</body>
</html>
