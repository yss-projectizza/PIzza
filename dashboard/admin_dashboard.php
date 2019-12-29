<?php
if (!isset($_SESSION))
  session_start();
?>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>


<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
    authDomain: "yss-project-69ba2.firebaseapp.com",
    databaseURL: "https://yss-project-69ba2.firebaseio.com",
    projectId: "yss-project-69ba2",
    storageBucket: "yss-project-69ba2.appspot.com",
    messagingSenderId: "530416464878"
  };
  firebase.initializeApp(config);

  // Get a reference to the storage service
  var storage = firebase.storage();
</script>

<html lang="en">

<head>
  <title>Youth Spiritual Summit</title>

  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/dashboard.css">
  <link rel="stylesheet" href="/css/admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <script>
    function update_groupnum(event, id) {
      firebase.database().ref('/users/' + id + '/group_num').set(event.target.value);
    }

    function update_cabinnum(event, id) {
      firebase.database().ref('/users/' + id + '/cabin_num').set(event.target.value);
    }

    function update_busnum(event, id) {
      firebase.database().ref('/users/' + id + '/bus_num').set(event.target.value);
    }

    function update_credit(event, id) {
      firebase.database().ref('/users/' + id + '/credit_due').set(event.target.value);
    }
  </script>
</head>

<body onload="sortData('group_num')">
  <?php include('header_loggedin.php') ?>
  <main class="main">
    <h3>Admin Panel</h3>
    
    <!-- Button that links to Manage Groups page -->
    <div class="card">
      <button class="rounded" style="margin-bottom: 10px" type="button" onclick="window.location.href='/dashboard/manage_groups.php'"> Manage Groups </button>
      <button class="rounded" type="button" onclick="window.location.href='/dashboard/assign_counselors.php'"> Assign Counselors </button>
    </div>

    <div class="main-cards">
      <div class="card" style="overflow: scroll; height:50%">
        <div class="dropdown">
          <button id="toggle-sort" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sort By:
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" onclick="sortData('group_num')">Group</a>
            <a class="dropdown-item" onclick="sortData('cabin_num')">Cabin</a>
            <a class="dropdown-item" onclick="sortData('bus_num')">Bus</a>
            <a class="dropdown-item" onclick="sortData('first_name')">First Name</a>
            <a class="dropdown-item" onclick="sortData('last_name')">Last Name</a>
            <a class="dropdown-item" onclick="sortData('gender')">Gender</a>
            <a class="dropdown-item" onclick="sortData('user_type')">User Type</a>
            <a class="dropdown-item" onclick="sortData('credit_due')">Credit Due</a>
          </div>
        </div>
        <br />
        <h2>All User Information</h2>
        <br />
        <table id="data">
        </table>
        <script>
          var sortData = (pattern = "group_num") => {

            var div = document.getElementById('data');
            while (div.firstChild) {
              div.removeChild(div.firstChild);
            }

            firebase.database().ref('/').once('value').then(async function (snapshot) {

              alldata = Object.entries(snapshot.val().users).sort((a, b) => {
                return a[1][pattern] - b[1][pattern]
              });
              div.innerHTML =
                `<tr id="headings">
                <th> Name </th>
                <th> User Type </th>
                <th> Group # </th>
                <th> Cabin # </th>
                <th> Bus # </th>
                <th> Credit </th>
                <th> Image </th>
                <th> Verified </th>
              </tr>`

              for (let i = 0; i < alldata.length; i++) {
                buildUserDiv(alldata[i], i);
              }

              function verifyCheck(verified, id, key) {
                // alert(key);
                if (verified) {
                  document.getElementById(id).checked = true;
                  firebase.database().ref('users/' + key).update({'account_verified': "true"});
                } else {
                  firebase.database().ref('users/' + key).update({'account_verified': "false"});
                  document.getElementById(id).checked = false;
                }
              }

              function buildUserDiv(item, index) {
                const boxDiv = document.createElement('tr');
                const boxID = item[1].first_name + "verified";
                boxDiv.id = "alldataindiv";



                var group = item[1].group_num;
                var cabin = item[1].cabin_num;
                var bus = item[1].bus_num;
                var credit = item[1].credit_due;



                switch (item[1].user_type) {

                  case "student":
                    color = "#FF9E54"
                    break;

                  case "student18":
                    color = "#7FDDE2"
                    break;

                  case "parent":
                    color = "#CE67AA"
                    var isDisabled = "disabled"
                    break;

                  case "admin":
                    color = "grey"
                    var isDisabled = "disabled"
                    break;

                  case "counselor":
                    color = "#76F2BC"
                    break;
                }
			


            boxDiv.innerHTML =
            `<td>
              <a href=/admin_profile.php?name=${item[0]}>
                <button style="background-color: ${color};" class='rounded user-button'>${item[1].first_name} ${item[1].last_name}</button>
              </a>
            </td>
            <td>
              ${item[1].user_type}
            </td>
            <td>
              <input class='group-input' onchange='update_groupnum(event, "${item[0]}")' value="${group}" ${isDisabled}>
            </td>
            <td>
              <input class='group-input' onchange='update_cabinnum(event,"${item[0]}")' value="${cabin}" ${isDisabled}>
            </td>
            <td>
              <input class='group-input' onchange='update_busnum(event,"${item[0]}")' value=${bus} ${isDisabled}>
            </td>
            <td>
              <input class='group-input' onchange='update_credit(event,"${item[0]}")' value=${credit} ${item[1].user_type === "student" || item[1].user_type === "admin" || item[1].user_type === "counselor" ? "disabled" : ""}>
            </td>
            <td>
              <a id='dlImg${index}'></a>
            </td>
            <td>
              <input type='checkbox' id='verified'/>
            </td>
            `


                document.getElementById("data").appendChild(boxDiv);
                if(item[1].hasOwnProperty("account_verified"))
                {  
                  // alert("a");
                  verifyCheck(item[1].account_verified, "verified", item[0]);
                }



                for (var index in alldata) {
                  if (alldata[index][1].user_type == "parent" || alldata[index][1].user_type == "student18") {
                    let i = index;
                    var email = (alldata[index][1].email).replace(".", ",");
                    var dlRef = firebase.storage().ref('dl/' + email);
                    dlRef.getDownloadURL().then(function (url) {
                      var modal_id = "modal" + i;
                      var divID = "dlImg" + i;
                      // console.log("divID=", divID)
                      var dlElem = document.getElementById(divID);
                      dlElem.innerHTML =
                        "<button class='rounded user-button' data-toggle='modal' data-target='#" +
                        modal_id + "'>Show Authentication</button><div id='" +
                        modal_id + "' class='modal fade' role='dialog'>" +
                        `<div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4> Image for Authentication </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <div class="modal-body">
                                            <img class="auth-img" src="` + url + `"/>
                                          </div>
                                        </div>
                                      </div>`
                    }).catch(function (error) {
                      switch (error.code) {
                        case 'storage/object-not-found': // File doesn't exist
                          // console.log("file doesn't exist");
                          break;
                        case 'storage/unauthorized': // User doesn't have permission to access the object
                          console.log("no permission");
                          break;
                        case 'storage/canceled': // User canceled the upload
                          console.log("canceled");
                          break;
                        case 'storage/unknown': // Unknown error occurred, inspect the server response
                          console.log("unknown error");
                          break;
                      }
                    });
                  }
                }
              }
            });
          }
        </script>
      </div>


      <div class="card">
        <h2>Schedule</h2>
        <div id="schedule">
          <div id="schedule_buttons">
            <button id="addEvent" class="rounded">Add an event</button>
            <button id="submit" class="rounded">Submit</button>
            <br/>
            <br/>
          </div>
          <table id="inside-div">
          </table>
          <script>
            var counter = 0
            let schedule_buttons = document.getElementById("schedule_buttons");
            schedule_buttons.style.display = "block";

            firebase.database().ref('/schedule/').once('value').then(item => {

              if (!item.val()) {
                var firebasedataArray = [];
              } else {
                var firebasedataArray = Object.entries(item.val());
              }

              for (let i = 0; i < firebasedataArray.length; ++i) {
                let key = firebasedataArray[i][0];
                counter++;
                var updiv = document.getElementById("inside-div");
                const eventDiv = document.createElement('tr');

                var th1 = document.createElement("th");
                var label = document.createElement("label");
                var input = document.createElement("input");
                input.classList.add('input');
                label.innerHTML = "Event " + counter;
                input.type = "text";
                input.id = "eventinput" + counter;
                input.value = firebasedataArray[i][1]["event"];
                th1.appendChild(label);
                th1.appendChild(input);

                var th2 = document.createElement("th");
                var label = document.createElement("label");
                var input = document.createElement("input");
                input.classList.add('input');
                label.innerHTML = "Time " + counter;
                input.type = "text";
                input.id = "timeinput" + counter;
                input.value = firebasedataArray[i][1]["time"];
                th2.appendChild(label);
                th2.appendChild(input);

                var th3 = document.createElement("th");
                var label = document.createElement("label");
                var input = document.createElement("input");
                input.classList.add('input');
                label.innerHTML = "Date " + counter;
                input.type = "text";
                input.id = "dateinput" + counter;
                input.value = firebasedataArray[i][1]["date"];
                th3.appendChild(label);
                th3.appendChild(input);	

			//	<div class="card" style="overflow: scroll; height:50%">
     //   <div class="dropdown">
   //       <button id="toggle-sort" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
     //       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     //       Sort By:
     //     </button>
    //      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    //        <a class="dropdown-item" onclick="sortData('group_num')">Group</a>
     //       <a class="dropdown-item" onclick="sortData('cabin_num')">Cabin</a>
     //       <a class="dropdown-item" onclick="sortData('bus_num')">Bus</a>
     //       <a class="dropdown-item" onclick="sortData('first_name')">First Name</a>
     //       <a class="dropdown-item" onclick="sortData('last_name')">Last Name</a>
    //        <a class="dropdown-item" onclick="sortData('gender')">Gender</a>
     //       <a class="dropdown-item" onclick="sortData('user_type')">User Type</a>
    //        <a class="dropdown-item" onclick="sortData('credit_due')">Credit Due</a>
  //        </div>
 //       </div> 

 // <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  //                  <a class="dropdown-item" id="family-option" onclick="displayGroups('families')">Families</a> 

                var th4 = document.createElement("th");
                th4.id = "group-list-" + counter;
                th4.innerHTML = `<div class="dropdown">
                <button id="toggle-group-` + counter + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Group(s)</button>
						<div class="dropdown-menu" id = 'group-dropdown-` + counter + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                                    <td id='max-size-` + counter + `'>`;
					

                var th5 = document.createElement("th");
                var currentGroups = document.createElement("label");
                currentGroups.id = "groupinput" + counter;
                currentGroups.innerHTML= firebasedataArray[i][1]["group"];
                th5.appendChild(currentGroups);
                

                function delete_event(id) {
                  firebase.database().ref('/schedule/' + id).remove();
                }

                var delete_th = document.createElement("th");
                var deletebutton = document.createElement("button");
                deletebutton.classList.add('rounded', 'delete-button');
                deletebutton.innerHTML = "Delete"
                deletebutton.onclick = () => {
                  delete_event(key);
                  alert("deleted successfully.");
                  location.reload();
                }

                eventDiv.appendChild(th1);
                eventDiv.appendChild(th2);
                eventDiv.appendChild(th3);
                eventDiv.appendChild(th4);
                eventDiv.appendChild(th5);
                delete_th.appendChild(deletebutton);
                eventDiv.appendChild(delete_th);


                updiv.appendChild(eventDiv);
              }
            });

            addEventButton = document.getElementById("addEvent");
            addEventButton.addEventListener("click", function () {
              var updiv = document.getElementById("inside-div");
              const eventDiv = document.createElement('tr');
              counter++;

              var th1 = document.createElement("th");
              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Event " + counter;
              input.type = "text";
              input.id = "eventinput" + counter;
              th1.appendChild(label);
              th1.appendChild(input);

              var th2 = document.createElement("th");
              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Time " + counter;
              input.type = "text";
              input.id = "timeinput" + counter;
              th2.appendChild(label);
              th2.appendChild(input);

              var th3 = document.createElement("th");
              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Date " + counter;
              input.type = "text";
              input.id = "dateinput" + counter;
              th3.appendChild(label);
              th3.appendChild(input);

			  var th4 = document.createElement("th");
              th4.id = "group-list-" + counter;
              th4.innerHTML = `<div class="dropdown">
              <button id="toggle-group-` + counter + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Group(s)</button>
						<div class="dropdown-menu" id = 'group-dropdown-` + counter + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                                    <td id='max-size-` + counter + `'>`;

              var th5 = document.createElement("th");
              var currentGroups = document.createElement("label");
              currentGroups.id = "groupinput" + counter;
              currentGroups.innerHTML= "None";
              th5.appendChild(currentGroups);

              eventDiv.appendChild(th1);
              eventDiv.appendChild(th2);
              eventDiv.appendChild(th3);
              eventDiv.appendChild(th4);
              eventDiv.appendChild(th5);
              updiv.appendChild(eventDiv);

            });
            newdict = {}

            document.getElementById("submit").addEventListener("click", function () {
              newdict = {}
              firebase.database().ref('/schedule/').set(null);

              for (let i = 1; i <= counter; ++i) {

                newdict["event"] = document.getElementById("eventinput" + i).value;
                newdict["time"] = document.getElementById("timeinput" + i).value;
                newdict["date"] = document.getElementById("dateinput" + i).value;
                newdict["group"] = document.getElementById("groupinput" + i).value;
                firebase.database().ref('/schedule/').push(newdict);
              }


            });
          </script>
        </div>
      </div>
  </main>
</body>

</html>