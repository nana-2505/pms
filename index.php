<?php
session_start();
if(empty($_SESSION['username']))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="../css.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		background-image:url(background.jpg);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
    
	}
  .well{
        min-height:20px;
        width:19.5%;
        padding:19px;
        margin-left:50%;
        margin-bottom:20px;
        background-color:#f5f5f5;
        border:1px solid #e3e3e3;
        border-radius:4px;
        -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow:inset 0 1px 1px rgba(0,0,0,.05)}
  .well a{
          text-decoration:none;
          color: blue;
          font-family: 'Asap Condensed', sans-serif;
          font-size: 16px;
          font-weight: 100;
        }
        .title-text{
          position: absolute;
width:50%;
padding-left:20px;
margin-right:50%;
margin-top:100px;

        }
  .title-text h1{
          color: white;
          font-family: 'Asap Condensed', sans-serif;
          font-size: 50px;
}

  .title-text h4{
          color: white;
          font-size: 20px;
          font-weight: bolder;
}
</style>
<title>Project Management System</title>
</head>
<div>
<body>
<div class="title-text">
         <img src="images/ucclogo.jpg" class="img-rounded img-responsive" width="100" height="100">
     	<h4>University of Dar Es Salaam Computing Center UCC</h4>
     	<h1>STUDENTS' PROJECT MANAGEMENT SYSTEM</h1>
     </div>

<table width="100%"  cellspacing="00" cellpadding="00">
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><br/><br/><div style="width:fit-content;background-color:white;margin-left:50%;margin-top:100px;border:1px solid black;border-radius:4px;">
    	<br><br>
                <form name="login" action="chk.php" method="post">
                    
        <table width="100%"  cellspacing="02" cellpadding="05">
  <tr>
      <th colspan="2" scope="col"><font size="6">LOGIN</font></th>
    </tr>
  <tr>
      <td align="right"><font size="5">Username&nbsp;:&nbsp;</font></td>
    <td><input style="height: 20px; font-size: 15px;" type="text" name="username"/><br/>
    </td>
  </tr>
  <tr>
      <td align="right"><font size="5">Password&nbsp;:&nbsp;</font></td>
    <td><input style="height: 20px; font-size: 15px;" type="password" name="pass" /></td>
  </tr>
  <tr>
      <td align="right"><font size="5">Login_As&nbsp;:&nbsp;</font></td>
    <td>
        <select name="role" style="width: 13em; height: 2em; font-size: 15px;">
        <option value="Admin">Admin</option> 
        <option value="Student">Student</option>
        <option value="Faculty">Faculty</option>
                 
        </select>
      </td>
  </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" style="width: 4em;  height: 2em; font-size: 20px;" name="register" value="Submit" /></td>
            </tr>
               
            
</table> 
             
       

        <br/>
        &nbsp;
        </form>
    	</div>
     </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>  
     <div class="well">
          	<label><a href="password.php">Forget Password ?</a></label>
</div>

</body>
</div>
    
</html>

<?php
}
else
{
header("location:Admin.php");
}

?>