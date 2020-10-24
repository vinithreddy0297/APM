<?php
session_start();
if(!isset($_GET["sec"])){
	if(isset($_COOKIE["sec"])){
		$sec=htmlspecialchars($_COOKIE["sec"]);
		header("Location:guide.php?sec=$sec");
		}else
		header("location:guide.php?sec=team_tabled");
}
	
	
$conn = mysqli_connect("localhost","root","","miniproject");
if(!isset($_SESSION["guidename"])){
	header("Location:index.php");
}
$guidename=$_SESSION["guidename"];
$teamno=$_SESSION["teamno"];
if(isset($_GET["sec"])){
	$sec=$_GET["sec"];
	setcookie("sec",$sec,time()+3600,"/");
}
$que="SELECT * from $sec WHERE team_no='$teamno'";
if($row=mysqli_fetch_assoc(mysqli_query($conn,$que))){
	 $srs=$row["Srs"];
	 $abs=$row["abstract"];
	 $teammem1=$row["team_mem1"];
	 $teammem2=$row["team_mem2"];
	 $teammem3=$row["team_mem3"];
}
if(isset($_POST["btn"])){
	//echo $_POST["week"];
	//echo $_POST["texta"];
	
	/*$details="SELECT * FROM team_table where team_no=$teamno";
	$que=mysqli_query($details);
	if($row=mysqli_fetch_assoc($que)){
		echo $row[""];
	}*/
	$week=$_POST["week"];
	$text=$_POST["texta"];
	$grade=$_POST["grade"];
	$gradeval=$_POST["gradeval"];
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sec=$_COOKIE["sec"];
$sql = "UPDATE $sec SET $week='$text',$grade='$gradeval',lastweek='$week' WHERE team_no='$teamno'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
}else {
    echo "Error updating record: " . mysqli_error($conn);
}

	/*echo $week.$text;
	$que="ÜPDATE team_table SET $week=$text WHERE team_no=$teamno";
	if(mysqli_query($conn,$que)){
		echo "Update";
	}else 
		echo "Not updated";*/
	//$res=mysqli_query($conn,$que);
	
	
}
$selectque="Select * from $sec Where Guide='$guidename'";
$selres=mysqli_query($conn,$selectque);
?>
<html>
<head>
<link rel="stylesheet" href="team.css" />
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <style>
  html,body{
	  overflow-x:hidden;
  }
   p,th,td,tr,a,span{
	   font-family: 'Josefin Sans', sans-serif;
  }
  div.card.navcard{
	  box-shadow:none;
  }
  div.card.maincard{
	  position:absolute;
	  left:260px;
	  top:91px;
	  width:1074px;
	  height:400px;
	 
  }
  div.card.sidecard{
	  background-color:#F5F5F5;
	  width:250px;
	  min-width:250px;
	  float:left;
	  margin:0px;
	  height:100%;
	border-radius:0px;  
	box-shadow:none;
  }
  div.navlink{
	  padding:20px;
	  color:#607D8B;
	  
  }
  div.navlink:hover{
	  background-color:#E0E0E0;
	  cursor: pointer;
  }
  div.navtitle{
	  background-color:#EEEEEE;
	  min-width:100%;
	  min-height:200px;
	  max-height:258px;
	  margin:0;
  }
  p.navnormtitle{
	  padding:10px;
	  color:#26a69a;
	  margin-bottom:0px;
  }
  
  ul#menu li {
    display:inline;
}
  </style>
</head>
<body>
 
<div class="card navcard">
  <div class="card-content">
  <p id="titletext">Anurag Project Management</p>
  <p style="position:relative;color:#fff;margin:0;float:left;left:318px;">SECTION:<?php echo substr($sec,-1); ?></p>
  
  </div>
  <a class="waves-effect waves-light btn" style="float:right ; top:-35px;right:5px;" href="logout.php">Logout</a>
  </div>
 <div class="card sidecard">
 <div class="navtitle">

 <p style="color:#26a69a;position:relative;left:10px;margin-top:0;top:30px;">PROJECT TITLE</p>

 <i class="material-icons" style="position:relative;left:3px;top:30px;">account_circle</i><p style="display:inline-block;position:relative;top:25px;left:6px;"><?php echo $teammem1?></p>
<i class="material-icons" style="position:relative;left:3px;display:list-item;top:30px;">account_circle</i><p style="display:inline-block;position:relative;top:-7px;left:32px;"><?php echo $teammem2?></p>
 <i class="material-icons" style="position:relative;left:3px;top:-2px;display:list-item;">account_circle</i><p style="display:inline-block;position:relative;top:-38px;left:32px;"><?php echo $teammem3?></p>
 </div>
 <p class="navnormtitle">
 Actions
 </p>
<div class="navlink" id="uploads" onclick="clickedupload()">
<span>
View Uploads
</span>
</div>
<div class="navlink" id="reviews">

  </div>
  </div>
  <script>
  $(document).ready(function() {
    $('select').material_select();
	
  });
	 function clickedupload(){
		 $(".card.maincard").css("display","none");
		 $(".card.doccard").css("display","block");
		 $("#uploads").text("Home");
		 $("#uploads").attr("onclick","clickedhome()");
	 }
	 function clickedhome(){
		  $(".card.maincard").css("display","block");
		 $(".card.doccard").css("display","none");
		 $("#uploads").text("Uploads");
		 $("#uploads").attr("onclick","clickedupload()");
	 }
	 function clickedsec(){
		 var value=$("#section").val();
		 window.location.href="guide.php?sec=team_table"+value;
	 }
	 
	  </script>
  
<div class="card doccard" style="width:250px;height:250px;position:relative;left:10px;float:left; margin-left:30px;top:30px;display:none;">
        <div class="card-image" style="width:250px;height:150px;">
          <img src="doc.jpg" width="250px" height="150px"/>
         
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="<?php echo $abs;?>"><i class="material-icons">list</i></a>
        </div>
		
        <div class="card-content">
		 <span class="card-title">Abstract</span>
          <p>Last updated</p>
        </div>
      </div>
	  <div class="card doccard" id="srs" style="width:250px;height:250px;position:relative;left:-270px;float:left; margin-left:30px; top:320px;display:none;">
        <div class="card-image" style="width:250px;height:150px;">
          <img src="doc.jpg" width="250px" height="150px"/>
          
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="<?php echo $srs;?>"><i class="material-icons">list</i></a>
        </div>
        <div class="card-content">
		<span class="card-title">SRS</span>
          <p>Last updated</p>
        </div>
      </div>
      
   <div class="input-field" style="position:relative;top:-650px;left:260px;">
    <select onchange="clickedsec();" id="section">
	  <option value="B" selected>Choose Section</option>
      <option value="B" >B</option>
      <option value="D" >D</option>
    </select>
  </div>
    
      <div class="card maincard" style="height:inherit; top:150px;">
	  <p class="card-content" style="position: relative;top: -15px; min-height:20px; display:none;">
	  <!--ikkada edit chey -->
	 <!-- <div class="row" style="position:relative;top:-114px;left:58px;width:400px">
			<div class="input-field col s12">
          <input id="text" type="text" name="id">
	
		  </div>
        </div>-->
		
    
		<section> 
  <header> <center><p style="font-size:20px; color:#26a69a;">
MINI PROJECT SCHEDULE</center></p></header>
 <style>
table, td, th {
    border: 1px solid black;
}

table {
     
    border-collapse: collapse;
    width: 70%;
}

td {
    height: 40px;
	max-width:50px;
    position:relative;
	
}
textarea{
	resize:none;
	
}
button{
	float:right;
}
</style>
</head>
  <section>
    <table align="center" style="width:95%;">
      <thead>
        <tr>
          <th style="text-align:center;">WEEK</th>
          <th style="text-align:center;">TO DO</th>
         <th style="text-align:center;">GUIDE REMARKS</th>
		  <th style="text-align:center;" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="range 1-5" >RATING</th>

		 </tr>
		 
      </thead>
      <tbody>
	  <?php while($row=mysqli_fetch_assoc($selres)){?>
	  <tr>
        <form action="guide.php" method="post">
          <td ><input type="hidden" name="week" value="week1">week 1</td>
          <td>   Abstract/SRS</td>
          
          <td>
		  
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week1"]) echo "readonly";?> ><?php echo $row["week1"];?></textarea>
		  
		  
		  </td>
		 <td>
		 <input type="hidden" name="grade" value="grade1">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade1"]; ?>" <?php if($row["grade1"]){echo "disabled";}?> />
		 <button name="btn" type="submit" style="display:<?php if($row["grade1"]) echo "none";?>">post</button>
		 </td>
         </form>
        </tr>
		<tr>
		<form action="guide.php" method="post">
        <td ><input type="hidden" name="week" value="week2">week 2</td>
          <td>Submission of project design</td>
          
          <td>
		  
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week2"]) echo "readonly";?> ><?php echo $row["week2"];?></textarea>
		  
		  </td>
		 
		 <td>
		 <input type="hidden" name="grade" value="grade2">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade2"]; ?>" <?php if($row["grade2"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade2"]) echo "none";?>">post</button>
		 </td>
		 
         </form>
        </tr>
		<tr>
		<form action="guide.php" method="post">
        <td ><input type="hidden" name="week" value="week3">week 3</td>
          <td>Review1(Presentation1)</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week3"]) echo "readonly";?> ><?php echo $row["week3"];?></textarea>
		 
		 
		  
          </td>
		   <td>
		 <input type="hidden" name="grade" value="grade3">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade3"]; ?>" <?php if($row["grade3"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade3"]) echo "none";?>">post</button>
		 </form>
		 </td>
		  
        </tr>
		
		
		 <tr>
		<form action="guide.php" method="post">
        <td ><input type="hidden" name="week" value="week4">week 4</td>
          <td>Module/Funcionality Implementation Explanation</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week4"]) echo "readonly";?> ><?php echo $row["week4"];?></textarea>
		  
		  </td>
		  <td>
		  <input type="hidden" name="grade" value="grade4">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade4"]; ?>" <?php if($row["grade4"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade4"]) echo "none";?>">post</button>
		 </form>
		  </td>
      </tr>
		
		<tr>
		<form action="guide.php" method="post">
          <td ><input type="hidden" name="week" value="week5">week 5</td>
          <td>Module/Enhanced Functionality Implementation</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week5"]) echo "readonly";?> ><?php echo $row["week5"];?></textarea>
		  </td>
		  <td>
		  <input type="hidden" name="grade" value="grade5">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade5"]; ?>" <?php if($row["grade5"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade5"]) echo "none";?>">post</button>
		 </form>
		  </td>
         
        </tr>
		<tr>
		<form action="guide.php" method="post">
         <td ><input type="hidden" name="week" value="week6">week 6</td>
          <td>CodeExecution1</td>
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week6"]) echo "readonly";?> ><?php echo $row["week6"];?></textarea>
		  
		  </td>
         <td>
		 <input type="hidden" name="grade" value="grade6">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade6"]; ?>" <?php if($row["grade6"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade6"]) echo "none";?>">post</button>
		 </td>
		 </form>
        </tr>
		<tr>
		<form action="guide.php" method="post">
        <td ><input type="hidden" name="week" value="week7">week 7</td>
          <td>   Module/Enhanced Functionality Explanation</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week7"]) echo "readonly";?> ><?php echo $row["week7"];?></textarea>
		
		  </td>
         <td>
		 <input type="hidden" name="grade" value="grade7">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade7"]; ?>" <?php if($row["grade7"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade7"]) echo "none";?>">post</button>
		 </form>
		 </td>
        </tr>
		<tr>
		<form action="guide.php" method="post">
         <td ><input type="hidden" name="week" value="week8">week 8</td>
          <td>Module/Enhanced Functionality Explanation  </td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week8"]) echo "readonly";?> ><?php echo $row["week8"];?></textarea>
		 
		  </td>
         <td>
		 <input type="hidden" name="grade" value="grade8">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade8"]; ?>" <?php if($row["grade8"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade8"]) echo "none";?>">post</button>
		 </form>
		 </td>
        </tr>
		<tr>
		<form action="guide.php" method="post">
           <td><input type="hidden" name="week" value="week9">week 9</td>
          <td>   Review2(Presentation2)</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week9"]) echo "readonly";?> ><?php echo $row["week9"];?></textarea>
		  
		  </td>
		  <td>
         <input type="hidden" name="grade" value="grade9">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade9"]; ?>" <?php if($row["grade9"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade9"]) echo "none";?>">post</button>
		 </form></td>
		 
        </tr>
		<tr>
		<form action="guide.php" method="post">
        <td><input type="hidden" name="week" value="week10">week 10</td>
          <td>   Testing and Deployment</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week10"]) echo "readonly";?> ><?php echo $row["week10"];?></textarea>
		  </td>
		  <td>
		  <input type="hidden" name="grade" value="grade10">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest value="<?php echo $row["grade10"]; ?>" <?php if($row["grade10"]){echo "disabled";}?>"/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade10"]) echo "none";?>">post</button>
		 </form>
		  </td>
         
        </tr>
		<tr>
		<form action="guide.php" method="post">
         <td ><input type="hidden" name="week" value="week11">week 11</td>
          <td>   Preparation of Documentation</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week11"]) echo "readonly";?> ><?php echo $row["week11"];?></textarea>
		  
		  </td>
		  <td>
		  <input type="hidden" name="grade" value="grade11">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade11"]; ?>" <?php if($row["grade11"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade11"]) echo "none";?>">post</button>
		 </form>
		  </td>
         
        </tr>
		<tr>
		<form action="guide.php" method="post">
         <td><input type="hidden" name="week" value="week12">week 12</td>
          <td>   Submission of Documentation</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week12"]) echo "readonly";?> ><?php echo $row["week12"];?></textarea>
		 
		  </td>
		  <td>
		  <input type="hidden" name="grade" value="grade12">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade12"]; ?>" <?php if($row["grade12"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade12"]) echo "none";?>">post</button>
		 </form>
		  </td>
        </tr>
		<tr>
		<form action="guide.php" method="post">
          <td><input type="hidden" name="week" value="week13">week 13</td>
          <td>Final Evaluation</td>
          
          <td>
		  <textarea rows="3" cols="70" name="texta" <?php if($row["week13"]) echo "readonly";?> ><?php echo $row["week13"];?></textarea>
		  
		  </td>
         <td>
		 <input type="hidden" name="grade" value="grade13">
		 <input type="number" class="tooltipped" name="gradeval" data-position="bottom" data-delay="50" data-tooltip="Range(1-5) 1-least 5-highest" value="<?php echo $row["grade13"]; ?>" <?php if($row["grade13"]){echo "disabled";}?>/>
		 <button name="btn" type="submit" style="display:<?php if($row["grade13"]) echo "none";?>">post</button>
		 </form>
	  <?php }?>
		 </td>
        </tr>
           <td>      </td>
          <td>   Project coordinator</td>
          
          <td><textarea rows="3" cols="70" ></textarea></td>
         
        </tr>

       
      </tbody>
    </table>
  </section>
</section>
</section>
	</p>
	  
</div>	 
	  


</body>
</html>
