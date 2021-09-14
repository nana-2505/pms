
<?php
session_start();
$user =  $_SESSION['username'];
$role = $_SESSION['Role'];
    include 'connection.php';
        if(isset($_POST['submit']))
        {
           $prj_title =$_POST['prj_title']; 
           $prj_team_members =$_POST['prj_team_members'];
           $prj_location=$_POST['prj_location'];
           $contact_person=$_POST['contact_person'];
           $prj_supervisor=$_POST['prj_supervisor']; 
           $prj_status=$_POST['prj_status'];
           $prj_description=$_POST['prj_description'];
		   $start_date=$_POST['start_date'];
		   $end_date=$_POST['end_date'];
           
           
if (!empty($prj_title)||!empty($prj_team_members)||!empty($prj_location)||!empty($contact_person)||!empty($prj_supervisor)||!empty($prj_status)||!empty($prj_description)||!empty($start_date)||!empty($end_date))
           {              
              $sql= "INSERT INTO project ( prj_title, prj_team_members, prj_location, contact_person, prj_supervisor, prj_status, prj_description, start_date, end_date)
			  VALUES ('$prj_title', '$prj_team_members', '$prj_location', '$contact_person', '$prj_supervisor', '$prj_status',' $prj_description', '$start_date','$end_date');";
                mysqli_query($conn, $sql);
                //use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
}

	header('location: newproject.php');

    ?>
        //         $conn->close();
        //        //  header('Location:Admin.php');
        //    }
        // else
            
        // {
        //       echo 'Please fill up all fields';
        //       header('Location:Admin.php');
        // }       
                  
        // }

    
