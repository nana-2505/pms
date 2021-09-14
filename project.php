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
              <a href="newproject.php">roject List</a> 
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
        <!-- <li>
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
        </li> -->
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
      <!-- <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <!-- <span class="admin_name"> -->
    <!-- </span> -->
        <!-- <i class='bx bx-chevron-down' ></i> -->
      <!-- </div>  -->
    </nav>
    <table class="styled-table" >
    <thead >
    <th colspan="5"><h2 class="pull-left">Project Details</h2></th>
  </thead>
  <tr>
             <th ><a href="newproject.php" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add New Project</a></th>
             <th colspan="4" >	<a href="print_pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a></th>
</tr>
						<tr>
						<th>PROJECT TITLE</th>
						<th>PROJECT SUPERVISOR</th>
						<th>CONTACT PERSON</th>
						<th>STATUS</th>
            <th>ACTION</th>
</tr>
					<tbody>
						<?php
							include_once('connection.php');
							$sql = "SELECT *FROM Project";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['prj_title']."</td>
									<td>".$row['prj_supervisor']."</td>
									<td>".$row['contact_person']."</td>
                  <td>".$row['prj_status']."</td>
									<td> 
										<a href='view_project.php' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> view</a>
										<a href='#edit_".$row['prj_id']."' class='btn btn-info btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['prj_id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
                    </td>
								</tr>";
								include('edit_delete_modal.php');
							}
              ?>
              <?php
// database connection info
include('connection.php');
// find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM project";
$result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 5;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$sql = "SELECT prj_id, number FROM project LIMIT $offset, $rowsperpage";
$result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);

// while there are rows to be fetched...
while ($list = mysql_fetch_assoc($result)) {
   // echo data
   echo $list['prj_id'] . " : " . $list['project'] . "<br />";
} // end while

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
} // end if
/****** end build pagination links ******/
?>
        </table>

  
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