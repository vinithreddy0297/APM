<?php
$conn = mysqli_connect("localhost","root","","miniproject");
session_start();
if(!$conn)
	echo "not connected";
if(isset($_SESSION["guide"])){
	header("Location:team1.php");
}else if(isset($_SESSION["guidename"])){
	 header("Location:guide.php");
}else if(isset($_SESSION["coodname"])){
	header("Location:coordinator.php");
}

if(isset($_POST['submitbtn'])){
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$sql1="select * from team_tabled where loginid='$id' and password='$pass'";
	$sql4="select * from team_tableb where loginid='$id' and password='$pass'";
	$sql2="select * from guide_table where id='$id'and password='$pass'";
	$sql3="select * from coordinator_table where id='$id'and password='$pass'";
	$teamd=mysqli_query($conn,$sql1);
	$guide=mysqli_query($conn,$sql2);
	$coordinator=mysqli_query($conn,$sql3);
	$teamb=mysqli_query($conn,$sql4);
	if(mysqli_num_rows($teamb)){
		echo "usertable";
	    while($row=mysqli_fetch_array($teamb)){
			
			$_SESSION["teammem1"]=$row["team_mem1"];
		    $_SESSION["teammem2"]=$row["team_mem2"]; 
			$_SESSION["teammem3"]=$row["team_mem3"];
			$_SESSION["guide"]=$row["Guide"];
			$_SESSION["teamno"]=$row["team_no"];	
			$_SESSION["tablen"]="team_tableb";
		}
		header("Location:team1.php");
		
	}else if(mysqli_num_rows($teamd)){
		echo "usertable";
	    while($row=mysqli_fetch_array($teamd)){
			
			$_SESSION["teammem1"]=$row["team_mem1"];
		    $_SESSION["teammem2"]=$row["team_mem2"]; 
			$_SESSION["teammem3"]=$row["team_mem3"];
			$_SESSION["guide"]=$row["Guide"];
			$_SESSION["teamno"]=$row["team_no"];	
			$_SESSION["tablen"]="team_tabled";
		}
		header("Location:team1.php");
		
	}else if(mysqli_num_rows($guide)){
		//echo "guidetable";
		 while($row=mysqli_fetch_array($guide)){
		$_SESSION["guidename"]=$row["name"];
		    $_SESSION["teamno"]=$row["team_no"];
		 }
		 header("Location:guide.php?sec=team_tableb");
	}else if(mysqli_num_rows($coordinator)){
		//echo "coordinator_table";
		while($row=mysqli_fetch_array($coordinator)){
		$_SESSION["coodname"]=$row["name"];
		 }
		header("Location:coordinator.php");
	}else
		echo "<script>alert('Invalid Login');</script>";
}
?><html>
<head> <!-- Compiled and minified CSS -->
<link rel="stylesheet" href="index.css"/>
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!-- Compiled and minified JavaScript -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  
   <script type="text/javascript" src="js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  
  <style>
   p,th,td,tr,a,span,button,label{
	   font-family: 'Josefin Sans', sans-serif;
  }
  </style>
  
  </head>
  <body>
  
  <div class="card navcard">
  <div class="card-content">
  <p id="titletext">Anurag Project Management</p>
  </div>
  </div>
 
        <center>
		<p id="logintext">Login</p>                                                                      
		<!-- animated text -->
		<form action="index.php" method="POST">
          <div class="card login">
            <div class="card-content">
			<div class="row" style="position:relative;top:30px;">
			<div class="input-field col s12">
          <input id="text" type="text" name="id">
          <label for="email">ID</label>
		  </div>
        </div>
		<div class="row" style="position:relative;top:30px;">
        <div class="input-field col s12">
          <input id="password" type="password" name="pass">
          <label for="password">Password</label>
        </div>
  </div>
  <script>
  $(document).ready(function(){
	  $('a#clicker.btn.toast).click();
  $('a#clicker.btn.toast').click(function(){
	   Materialize.toast('Invalid Login', 4000);
  });
  });
  </script>
  <div class="row">
  <button type="submit" class="waves-effect waves-light btn" style="position:relative;top:80px; width:100%;background-color:#26a69a;" name="submitbtn">LOGIN</button>
			</div>
			</div>
      </div>
	  </form>
  </body>
  </html>