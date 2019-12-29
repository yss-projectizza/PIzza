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
</head>

<body>
  <?php include('header_loggedin.php') ?>
  <?php include('display_profile_pic.php') ?>
  <main class="main">
    <h3>Admin Panel</h3>

    <div class="card">
        <h2>Retreat Information</h2>
        <label><strong>Retreat Name</strong><br><input id="program-name" type="text"></input></label>
        <label><strong>Retreat Price</strong><br><input id="program-price" type="number" step="0.01"></input></label>
        <label><strong>Activate Group Selection</strong><input style="margin-left:10px" id="activate-selection" type="checkbox" onchange="activateGroups()"></input></label>
        <button id="submit-camp-info" class="rounded" onclick="saveCampInfoChanges()">Submit</button>
    </div>
    
    <!-- Buttons to Manage Groups, Assign Counselors, and View All User Info pages -->
    <div class="card">
      <button class="rounded" style="margin-bottom: 10px" type="button" onclick="window.location.href='/dashboard/manage_groups.php'"> Manage Groups </button>
      <button class="rounded" style="margin-bottom: 10px" type="button" onclick="window.location.href='/dashboard/assign_counselors.php'"> Assign Counselors </button>
      <button class="rounded" style="margin-bottom: 10px" type="button" onclick="window.location.href='/dashboard/view_all_user_info.php'"> View All User Information </button>
    </div>


      <div class="card">
        <h2>Schedule</h2>
          <div id="schedule" overflow="auto">
          <table id="inside-div">
            <tbody id="schedule-table-body"></tbody>
          </table>
        </div>
        <div>
          <button id="addEvent" class="rounded">Add</button>
          <button id="submit-change-btn" class="rounded">Submit</button>
        </div>
      </div>
  </main>
</body>
</html>

<script>
  let activate_selection = document.getElementById("activate-selection");

  firebase.database().ref('currentProgram').once("value", function(snapshot)
  {
    let program = snapshot.val();

    if(program.activateGroups == "true")
    {
      activate_selection.checked = true;
    }
    else
    {
      activate_selection.checked = false;
    }
  });

  var counter = 0;
  let schedule = document.getElementById("schedule");
  schedule.style.display = "block";

  firebase.database().ref('/schedule/').once('value').then(item => 
  {
    if (!item.val()) 
    {
      var firebasedataArray = [];
    } 
    else
    {
      var firebasedataArray = Object.entries(item.val());
    }

    let row = "";

    for (let i = 0; i < firebasedataArray.length; ++i) 
    {
      let key = firebasedataArray[i][0];

      counter++;
      
      var updiv = document.getElementById("inside-div");

      row += `<tr id="event${counter}">
                <th>
                  <label>
                    Event ${counter}
                      <input class="input" type="text" id="eventinput${counter}" value="${firebasedataArray[i][1]["event"]}">
                      </input>
                  </label>
                </th>
                <th>
                  <label>
                    Time ${counter}
                    <input class="input" type="time" id="timeinput${counter}" value="${firebasedataArray[i][1]["time"]}">
                    </input>
                  </label>
                </th>
                <th>
                  <label>
                    Date ${counter}
                    <input class="input" type="date" id="dateinput${counter}" value="${firebasedataArray[i][1]["date"]}">
                    </input>
                  </label>
                </th>
                <th>
                  <div class="dropdown">
                  <button id="toggle-group-type" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Groups:
                     <div class="dropdown-menu" id="family-list-${counter}"aria-labelledby="dropdownMenuButton">
                     </div>
                  </button>
                </th>
                <th>
                  <div style="padding:15px" id="group-list-${counter}">${firebasedataArray[i][1]["group"]}</div>
                </th>
                <th>
                  <button id="delete-btn" class="rounded delete-btn" onclick="delete_event('${key}')">Delete</button>
                </th>
              </tr>`;    

        add_family_dropdown_items(counter);
    }
    
    updiv.innerHTML = row;
  });
  
  addEventButton = document.getElementById("addEvent");
  addEventButton.addEventListener("click", function () 
  {
    window.location.href = "#event"+ counter; // jumps to the new event being added
    
    counter++;
    
    var updiv = document.getElementById("inside-div");

    let row = document.createElement('tr');
    
    let row_contents = `<tr id="event${counter}">
                <th>
                  <label>
                    Event ${counter}
                      <input class="input" type="text" id="eventinput${counter}">
                      </input>
                  </label>
                </th>
                <th>
                  <label>
                    Time ${counter}
                    <input class="input" type="time" id="timeinput${counter}">
                    </input>
                  </label>
                </th>
                <th>
                  <label>
                    Date ${counter}
                    <input class="input" type="date" id="dateinput${counter}">
                    </input>
                  </label>
                </th>
                <th>
                  <div class="dropdown">
                  <button id="toggle-group-type" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Groups:
                     <div class="dropdown-menu" id="family-list-${counter}"aria-labelledby="dropdownMenuButton">
                     </div>
                  </button>
                </th>
                <th>
                  <div style="padding:15px" id="group-list-${counter}">all</div>
                </th>
              </tr>`;

              add_family_dropdown_items(counter);

              row.innerHTML = row_contents;

              updiv.appendChild(row);

  });
  
  newdict = {}

  document.getElementById("submit-change-btn").addEventListener("click", function () 
  {
    newdict = {}
    
    firebase.database().ref('/schedule/').set(null);

    for (let i = 1; i <= counter; ++i) 
    {
      newdict["event"] = document.getElementById("eventinput" + i).value;
      newdict["time"] = document.getElementById("timeinput" + i).value;
      newdict["date"] = document.getElementById("dateinput" + i).value;
      newdict["group"] = document.getElementById("group-list-" + i).innerHTML;
      firebase.database().ref('/schedule/').push(newdict);
    }

    location.reload();
  });

function delete_event(id) 
{
  firebase.database().ref('/schedule/' + id).remove();
  alert("deleted successfully");
  location.reload();
}

function activateGroups()
{
    let activate_selection = document.getElementById("activate-selection");

    if(activate_selection.checked)
    {
      firebase.database().ref('currentProgram/').update({activateGroups: "true"});

      alert("Youth may now select their groups.");
    }
    else
    {
      firebase.database().ref('currentProgram/').update({activateGroups: "false"});

      alert("Group selection is now closed.");
    }
}

function add_family_dropdown_items(index)
{
  firebase.database().ref("families").once("value", function(snapshot)
  {
    let families = Object.entries(snapshot.val());

    let family_names = "";

    for(let i = 0; i < families.length; ++i)
    {
      if(i == 0)
      {
        family_names += `<a class="dropdown-item" onclick="editNameList('all', '${index}')">all</a>`;
      }

      family_names += `<a class="dropdown-item" onclick="editNameList('${families[i][1].name}', ${index})">${families[i][1].name}</a>`;
    }

    document.getElementById("family-list-" + index).innerHTML = family_names;
  });
}

function editNameList(name, index)
{
  let group_list_ref = document.getElementById("group-list-" + index);
  let group_list = group_list_ref.innerHTML;
  
  if(name == "all")
  {
    group_list_ref.innerHTML = "all";
  }
  else
  {
    if(group_list == "all")
    {
      group_list_ref.innerHTML = name;
    }
    else
    {
      if(!group_list.includes(name))
      {
        if(group_list != "")
        {
          group_list += ",";
        }

        group_list += name;
      }
      else
      {
        if(group_list.includes(","))
        {
          if(group_list.includes("," + name))
          {
            group_list = group_list.replace("," + name, "");
          }
          else if(group_list.includes(name + ","))
          {
            group_list = group_list.replace(name + ",", "");
          }
        }
        else
        {
          group_list = group_list.replace(name, "");
        }
      }

      group_list_ref.innerHTML = group_list;
    }
  }
}

firebase.database().ref('currentProgram').once("value", function(snapshot)
  {
    let programObj = snapshot.val();

    document.getElementById("program-name").value = programObj.eventName;
    document.getElementById("program-price").value = parseFloat(programObj.price);
  });

function saveCampInfoChanges()
{
  let eventName = document.getElementById("program-name").value;
  let price = parseFloat(document.getElementById("program-price").value);

  firebase.database().ref('currentProgram').update({'eventName' : eventName, 'price': price});

  firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot)
  {
    let students = Object.entries(snapshot.val());
    
    for(let i = 0; i < students.length; i++)
    {
      let key = students[i][0];

      if(parseFloat(students[i][1].balance) != 0)
      {
        firebase.database().ref('users/' + key).update({'balance' : price});
      }
    }

    // update parent's balance
    firebase.database().ref('users').orderByChild('user_type').equalTo('parent').once("value", function(snapshot)
    {
      let parents = Object.entries(snapshot.val());

      for(let i = 0; i < parents.length; i++)
      {
        let parentEmail = parents[i][1].email;
        
        firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot)
        {
          let students = Object.entries(snapshot.val());

          let updated_parent_balance = 0.0;

          for(let j = 0; j < students.length; j++)
          {
            if(students[j][1].parent_email == parentEmail && students[j][1].accountStatus == "Activated")
            {
              updated_parent_balance += parseFloat(students[j][1].balance);
            }
          }

          let parentKey = parentEmail.replace(".", ",");

          firebase.database().ref('users/' + parentKey).update({'credit_due': parseFloat(updated_parent_balance)});
        });
      }
    });

    alert("Your changes were successfully saved!");
  });
}

</script>
</html>

