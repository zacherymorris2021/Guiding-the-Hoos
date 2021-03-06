<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Guiding the Hoos</title>

  <link rel="stylesheet" type="text/css" href="/css/form-style.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/CS4640-ztm4qv-kk6ev-project/css/homepage-after-login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    
</head>
<body>

    <!-- Must connect to the DB -->
    <?php 
    include('../connect-db.php');
    require('../connect-db.php');
    require('../todo-db.php');
    ?> 
  
    <?php
      // We need to use sessions, so you should always start sessions using the below code.
      session_start();
      // If the user is not logged in redirect to the login page...
      if (!isset($_SESSION['loggedin'])) {
        header('Location: http://localhost/CS4640-ztm4qv-kk6ev-project/index.php');
        exit;
      }
  ?>

    <div id="container">
    <div id="main">

    <!-- nav bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto navbar-left">
            <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php">Organizations</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">Add Organization</a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="profile.php"><?php echo $_SESSION['first_name'] . "'s Profile";?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <br>
        <form name="RegisterForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"  enctype="multipart/form-data">
            <!-- <div class="section"><span>1</span>Personal Information</div>
            <p><em> Disclaimer: This info will be made available on this site</em></p>
            <div class="inner-section">
                <label>Your First Name: <input type="text" id="firstname" placeholder="John" autofocus="" /></label>
                <p class="error_message" id="msg_num3" style="color: red;"></p>
                <label>Your last Name: <input type="text" id="lastname" placeholder="Doe" /></label>
                <p class="error_message" id="msg_num4" style="color: red;"></p>
                <label>Email Address: <input type="text" id ="emailholder" placeholder = "abc123@virginia.edu" pattern=".+@virginia.edu" required /></label>
                <p class="error_message" id="msg_num2" style="color: red;"></p>
            </div> -->
        
            <div class="section"><span>1</span>Organization Information</div>
            <div class="inner-section">
                <label>Organization Name:</label> 
                <input type="text" name="org_name" id="org_name" placeholder="Organization" />
                <span class="msg"><?php if(isset($_POST['org_name'])&& (($_POST['org_name']) == NULL) ) echo "Please enter the organization name <br />";?></span>
                <!-- <p class="error_message" id="msg_num5" style="color: red;"></p> -->
                <br>
                <label>Weekly Meeting:
                    <div class="weekDays"> <br>
                        <!-- Monday with time dispaly -->
                        <label><input type="checkbox" id="monday" class="weekday" name = "Days[]" value = "Monday" onclick= "myFunction('conditionalM')"/> Monday</label>
                            <div id="conditionalM" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" name= "times[]" placeholder="11:59"> <br>  <br>
                            </div>
                        <!-- Tuesday with time dispaly -->
                        <label><input type="checkbox" id="tuesday" class="weekday" name = "Days[]" value = "Tuesday" onclick= "myFunction('conditionalT')"/> Tuesday</label>
                            <div id="conditionalT" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" name= "times[]" placeholder="11:59"> <br> <br> 
                            </div>
                        <!-- Wednesday with time dispaly -->
                        <label><input type="checkbox" id="wednesday" class="weekday" name = "Days[]" value = "Wednesday" onclick= "myFunction('conditionalw')"/> Wednesday</label>
                            <div id="conditionalw" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" name= "times[]" placeholder="11:59"> <br>  <br>
                            </div>
                        <!-- Thursday with time display -->
                        <label><input type="checkbox" id="thursday"  name = "Days[]" class="weekday" value = "Thursday" onclick= "myFunction('conditionalTH')"/> Thursday</label>
                            <div id="conditionalTH" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" name= "times[]" placeholder="11:59"> <br>  <br>
                            </div>
                        <!-- Friday with time dispaly -->
                        <label><input type="checkbox" id="friday" class="weekday" name = "Days[]" value = "Friday" onclick= "myFunction('conditionalF')"/> Friday</label>
                            <div id="conditionalF" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" name= "times[]" placeholder="11:59"> <br><br>  
                            </div>
                        <!-- Saturday with time display -->
                        <label><input type="checkbox" id="saturday" name = "Days[]" class="weekday" value = "Saturday" onclick= "myFunction('conditionalST')" /> Saturday</label>
                            <div id="conditionalST" style="display:none">
                                <label for="meetT">Choose a Meeting Time:</label>
                                <input id="meetT" type="time" name= "times[]" placeholder="11:59"> <br>  <br>
                            </div>
                         <!-- Sunday with time display -->
                        <label><input type="checkbox" id="sunday" name = "Days[]" class="weekday" value = "Sunday" onclick= "myFunction('conditionalSU')"/> Sunday</label>
                            <div id="conditionalSU" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" name= "times[]" placeholder="11:59"> <br><br>  
                            </div>
                      </div>
                </label>
                <label>Dues </label><input type="text" placeholder="100" name= "dues" id ="dues" />
                <span class="msg"><?php if((isset($_POST['dues'])) && is_numeric($_POST['dues']) == FALSE) echo "Please give a number for dues. <br />";?><br></span>
                <label>Location <input type="text" name="locations" placeholder = "120 Olsson Hall" /> </label>
                <label>About<input type="text" name="about" onkeyup="countChar(this)" placeholder = "About your organization" id = "message" /></label>
                <div class = "help" id="charNum"></div>
                <span class="msg"> <?php if(isset($_POST['about'])&& (($_POST['about']) == NULL) ) echo "Please give information about your organization <br />";?></span>
                <br>
                <label>Do you want to include an image?<br>
                <input type="file" name ="uploadfile" id = "picupload" /></label>
                
            </div>
            <!-- <div class="button">
                <button type="button" name ="submit" class = "btn btn-primary" id="Submit" onclick="Rightinfo()" >Submit</button>
                <p id="demo"></p>
            </div> -->

            
            <!-- <br>
  -->       <input type="hidden" name = "useremail" value = "<?php  echo $_SESSION['email'] ?>" />
            <input type="submit" name="submit2" value="Submit" />
        </form>
        </div>
    </div>
    </div>

    <footer class="primary-footer bg-dark" id="footer">
        <small class="copyright">&copy; Guiding the Hoos</small>
    </footer>

        <script type="text/javascript">
  function redirect(){
    window.location.href = 'http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php';
  }
</script>
<?php
    error_reporting(0);
        $name_msg = NULL;
        $name = NULL;
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['submit2'])){
            if(($_POST['org_name']) != NULL){
                $org_name = ($_POST['org_name']);
            }
            //if(($_POST['dues']) != NULL){
                $dues = $_POST['dues'];
            //}
            $locations = $_POST['locations'];
            if(($_POST['about']) != NULL){
                $about = $_POST['about'];
            }
            //if(isset($_POST['Days'])){
                $checkbox = $_POST['Days'];
                $chk="";   
                foreach($checkbox as $chk1){   
                    $chk .= $chk1."/"; // so we can EXPLODE the values which only works with / https://stackoverflow.com/questions/47640313/phpmyadmin-multiple-values-in-one-column
                }  
            //}
        
        
        if(isset($_POST['times'])){ //name= "times[]"
            $timebox = $_POST['times'];
            $tbox="";   
            foreach($timebox as $tbox1){   
                $tbox .= $tbox1."/";
        }
       }
    //    if(isset($_POST["file_name"])) {
        $filename = $_FILES["uploadfile"]["name"];
        $filetmpname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../uploadedimages/";
        move_uploaded_file($filetmpname, $folder.$filename);

        $email = $_POST['useremail'];
        addTask($org_name, $dues, $locations,$about,$chk,$tbox,$filename,$email);

        if((($_POST['about']) != NULL && ($_POST['org_name']) != NULL && is_numeric($_POST['dues']) == TRUE)){
        echo '<script type="text/javascript">',
                'redirect();',
                '</script>';
    }
}
}
?>

    </body> 
    <script src="http://code.jquery.com/jquery-1.5.js"></script> 
<script>
function countChar(val){
     var len = val.value.length;
     if (len >= 250) {
              val.value = val.value.substring(0, 250);
     } else {
              $('#charNum').text(250 - len + " characters left");
     }
};
</script>
<script>
    // id = 
// document.getElementById("Submit").addEventListener("click", displaydone);
// var SubmitDate = () =>{
//     return " Date: " + Date();
// }
// var displaydone = function(){
//     document.getElementById("demo").innerHTML = SubmitDate();
// }
// displaydone();
// // puts in the time for when a day is checked
function myFunction(id) {
       var a = document.getElementById(id);
       if(a.style.display == 'block')
          a.style.display = 'none';
       else
          a.style.display = 'block';
    }

function Rightinfo(){
    document.getElementById("msg_num5").innerHTML = text5;  
    
    var frm = document.getElementsByName('RegisterForm')[0];
    frm.submit();
    frm.reset();

    }
</script>

<style>
    /* {
        margin:0;
        padding:0;
    } */

    html, body {
      background: url(http://localhost/CS4640-ztm4qv-kk6ev-project/images/planeback3.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      height:100%;
    }

    #container{
      min-height:100%;
    }

    #main{
      overflow:auto;
      padding-bottom:50px;
    }

    #footer {
      position:relative;
      bottom: 0;
      width: 100%;
      height: 50px;
      background-color: #343A40;
      color:lightgrey;
      text-align: center;
      padding: 10px;
      margin-top:-50px;
      clear:both;
    }

.msg {
	  font-style: italic;
	  color: red;
    }
    /* changed the bootstrap button */
.btn-primary:hover {
    background-color: rgb(66, 184, 20) !important;
    border: greenyellow !important;
}

p{
    font-size:80%;
}
.container{
	width:70%;
	padding:2%;
	margin:40px auto;
	background: rgb(255, 255, 255);
    border-radius: 10px;
    box-decoration-break: inherit;
	box-shadow: 0px 0px 10px rgba(25, 37, 61, 0.719);
}
.container .inner-section{
	padding: 2%;
	background: #F8F8F8;
	border-radius: 6px;
	margin-bottom: 15px;
}

.container label{ /*looks at the labels*/
    display: block;
    font-size: 90%;
    font-family: sans-serif;
    margin-bottom: 15px;
    color: #0B3F72;
}
.container input[type="text"] { /*looks at the input type text*/
	display: block;
	box-sizing: border-box;
	width: 100%;
    padding: 8px;
    border: 2px solid rgb(243, 236, 236);
	border-radius: 20%;
	-webkit-border-radius:6px;
	box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.432);
}

.container .section{
	font: normal 20px, serif;
	color: #2D95EA; 
	margin-bottom: 10px;
}
.container .section span {/* sets the number*/
	background: #1981DE;
	padding: 5px 10px 5px 10px;
	border-radius: 50%; /*circle*/
	border: 4px solid rgb(250, 250, 250);
	font-size: 82%;
    margin-left: -40px;
    margin-top: -5px;
    color: rgb(255, 255, 255); 
    position: absolute;
}

.nav-item a:hover {
      color: rgb(255, 255, 255) !important;
      cursor: pointer;
    }

    .navbar-nav a:hover{
      background-color: #0B3F72;
      color: #000000;
    }

    .navbar-nav li {
      font-family: "Open Sans", sans-serif;
      font-size: 1em;
      line-height: 30px;
      padding-right: 3px;
      padding-left: 3px;
    }

    .navbar-nav a {
      text-decoration: none !important;
      color: lightgrey!important;
      display: block;
      transition: .3s background-color;
    }

    .navbar-nav a.active {
      background-color: #0B3F72 !important;
      cursor: default;
      color: white!important;
    }

    .navbar-nav li.active{
      background-color: #0B3F72 !important;
      cursor: default;
    }
</style>
</html>
