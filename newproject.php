<?php
session_start();
$user =  $_SESSION['username'];
$role = $_SESSION['Role'];
if(empty($_SESSION['username']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title> Admin Dashboard</title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus'></i> -->
      &nbsp;&nbsp;&nbsp;<span class="logo_name"> STUDENT PROJECT</BR>MANAGEMENT SYSTEM</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Admin.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="project.php">
            <i class='bx bx-box' ></i>
          <div class="links_name">
              <span>PROJECT</span>
            <div class="dropdown-content">
              <a href="newproject.php">Add New Project</a>
              <a href="project.php">roject List</a> 
            </div>
         </div>
          </a>
        </li>
        <!-- <li>
        <a href="#">
         <i class="fa fa-caret-down"></i>
             <span class="links_name"><button class="dropdown-btn">PROJECT</button></span>
               <div class="dropdown-container">
                
</div> 
        </a>              
       </li> -->
          <!-- <ul>
            <li><a href="newproject.php">Add New Project</a></li>
            <li><a href="project.php">Project List</a></li>
            </ul> -->
        <!-- </li> -->
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Manage</span>
          </a>
          <!-- <ul>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Student</a></li>
            <li><a href="#">supervisor</a></li>
              </ul> -->
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Notification</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Projects</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">
    </span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    
<div class="container">
<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
	<div class="wrapper">
		<div class="company-info">
			<h3>NEW PROJECT</h3>
		</div>
		<div class="conatct">
		<form method="POST" action="PR.php">
				<p>
				<label>PROJECT TILLE</label>
				<input type="text" name="prj_title">
				</p>
				<p>
				<label>TEAM MEMBERS</label>
				<input type="text" name="prj_team_members">
				</p>
				<p>
				<label>PROJECT LOCATION</label>
				<input type="text" name="prj_location">
				</p>
				<p>
				<label>CONTACT PERSON</label>
				<input type="text" name="contact_person">
				</p>
                <p>
				<label>PROJECT SUPERVISOR</label>
				<input type="text" name="prj_supervisor">
				</p>
                <p>
				<label>STATUS </label>
				<input type="text" name="prj_status">
				</p>
				<p class="Description">
				<label>PROJECT DESCRIPTION</label>
				<textarea name="prj_description" rows="5"></textarea>
				</p>
                <p>
				<label>START DATE</label>
				<input type="date" name="start_date">
				</p>
                <p>
				<label>END DATE</label>
				<input type="date" name="end_date">
				</p>
				<p class="submit-btn">
				<button type="submit" onclick="location.href='PR.php'" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				<button type="button" onclick="location.href='Admin.php'" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>			
				</p>
			</form>
		</div>
	</div>
</div>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
 <script>
 $(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});</script>

</body>
</html>
<?php
 
}
elseif($role=="Faculty")    
{
    header('Location:../Admin.php'); 
?>
 <?php
}
else   
{
    header('Location:../Admin.php'); 
?>
      
<?php
}
?>
</table>
<p>
  <?php
}
?>