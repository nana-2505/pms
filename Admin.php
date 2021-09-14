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
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/profile-user.png">
        <span class="admin_name"><?php
    print $role;
    ?></span>
        <!-- <i class='bx bx-chevron-down' ></i> -->
      </div>
    </nav>
    <table class="styled-table" >
    <thead>
						<th>PROJECT ID</th>
						<th>PROJECT TITLE</th>
						<th>PROJECT SUPERVISOR</th>
						<th>CONTACT PERSON</th>
						<th>STATUS</th>
            <th>ACTION</th>
					</thead>
					<tbody>
						<?php
							include_once('connection.php');
							$sql = "SELECT prj_id, prj_title, prj_supervisor,contact_person, prj_status FROM Project WHERE prj_status ='onProgress'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['prj_id']."</td>
									<td>".$row['prj_title']."</td>
									<td>".$row['prj_supervisor']."</td>
									<td>".$row['contact_person']."</td>
                  <td>".$row['prj_status']."</td>
									<td>
										<a href='view_project.php".$row['prj_id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> view</a>
										</td>
								</tr>";
								// include('edit_delete_modal.php');
							}
              ?>
        </table>

<!-- END ADMIN SIDE VIEW--------------------------------------------------------------------------------------------- -->
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

