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
     <style>
         .container1{
            /* position: fixed; */
            max-width: 1200px;
             /* margin-top : 60px; */
             margin-left:auto;
             margin-right:auto;
            padding: 20px;
            border-spacing:20px;
                }
            .2col div{
                        margin-top:5px;
                            }
                div{
                margin: 0;
                padding: 0;
                }
           
                .c1{
                display: inline-block;
                padding: 120px 0;
                margin: 0px auto;
                width: 100%;
                text-align: center;
                background-color: rgb(255, 184, 126);
                }

               
                .c2{
                display: inline-block;
                float: left;
                width: 50%;
                text-align: center;
                padding: 120px 0;
                margin: 0px;
                background-color: #8fbbd9;
                
                }

                .c3{
                display: inline-block;
                float: left;
                width: 50%;
                text-align: center;
                padding: 120px 0;
                background-color: #7ed9a7;  
                }

                .c4{
                display: inline-block;
                float: left;
                width: 33.33%;
                text-align: center;
                padding: 120px 0;
                background-color: rgb(230, 150, 134);  
                }

                .c5{
                display: inline-block;
                float: left;
                width: 33.33%;
                text-align: center;
                padding: 120px 0;
                background-color: rgb(230, 203, 118);  
                }

                .c6{
                display: inline-block;
                float: left;
                width: 33.33%;
                text-align: center;
                padding: 120px 0;
                background-color: rgb(173, 170, 230);  
                }

                /* Collapse to full width column */

                @media only screen and (max-width: 750px){
                .c4{
                    width: 100%;
                }
                .c5{
                    width: 100%;
                }
                .c6{
                    width: 100%;
                }
                }

                @media only screen and (max-width: 660px){
                .c2{
                    width: 100%;
                }
                .c3{
                    width: 100%;
                }
                }
         </style>
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
	  <!-- view  -->
    </nav><br><br><br><br><br><br>
  
  <div class="container1" id="view_project <?php echo $row['id'];?>">
  <div class="c1">Content Area 1</div>
  <div class="2col">
  <div class="c2">Content Area 2</div>
  <div class="c3">Content Area 3</div>
  </div>
  <!-- <div class="3col">
    <div class="c4">Content Area 4</div>
    <div class="c5">Content Area 5</div>
    <div class="c6">Content Area 6</div>
  </div> -->
           
<!-- view end -->
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