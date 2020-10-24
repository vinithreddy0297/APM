<?php
session_start();
if(isset($_SESSION["teammem1"])){
//echo $_SESSION["guide"];
//echo $_SESSION["teammem1"];
}else{
	header("Location:index.php");
}
$conn = mysqli_connect("localhost","root","","miniproject");
$teamno=$_SESSION["teamno"];
$tablenamenew=$_SESSION["tablen"];
$que="SELECT * FROM $tablenamenew WHERE team_no='$teamno'";
$res=mysqli_query($conn,$que);
$res1=mysqli_query($conn,$que);
if($row=mysqli_fetch_assoc($res1)){
	$srsdate=$row["srsdate"];
	$absdate=$row["absdate"];
    $teammem1=$row["team_mem1"];
	 $teammem2=$row["team_mem2"];
	 $teammem3=$row["team_mem3"];
}
if(isset($_FILES['file'])){
	$file=$_FILES['file'];
	//print_r($file);
	$filename=$file['name'];
	$filetmp=$file['tmp_name'];
	$filesize=$file['size'];
	$fileerror=$file['error'];
	
	$file_ext=explode('.',$filename);
	$file_ext=strtolower(end($file_ext));
	//print_r($file_ext);
	
	$allowedfiles=array('docx','txt','pdf','ppt');
	
	if(in_array($file_ext,$allowedfiles)){
		if($fileerror==0){
			if($filesize<=2097152){
				$filenamenew=uniqid('',true).'.'.$file_ext;
				$filedest='Abstract/'.$filenamenew;
				if(move_uploaded_file($filetmp,$filedest)){
					echo $filedest;
					$date=date("Y-m-d");
					 $que="UPDATE team_tabled SET Abstract='$filedest',absdate='$date' WHERE team_no=$teamno";
					if(mysqli_query($conn,$que)){
						echo "üpdated";
					}
				}else
					echo "File not uploaded";
			}else echo "File too large";
		}else echo "Upload error please try again";
	}else echo "File not supported";
}
if(isset($_FILES['file1'])){
	$file=$_FILES['file1'];
	//print_r($file);
	$filename=$file['name'];
	$filetmp=$file['tmp_name'];
	$filesize=$file['size'];
	$fileerror=$file['error'];
	
	$file_ext=explode('.',$filename);
	$file_ext=strtolower(end($file_ext));
	//print_r($file_ext);
	
	$allowedfiles=array('docx','txt','pdf','ppt');
	
	if(in_array($file_ext,$allowedfiles)){
		if($fileerror==0){
			if($filesize<=2097152){
				$filenamenew=uniqid('',true).'.'.$file_ext;
				$filedest='SRS/'.$filenamenew;
				$date=date("Y-m-d");
				if(move_uploaded_file($filetmp,$filedest)){
					echo $filedest;
					 $que="UPDATE team_tabled SET Srs='$filedest',srsdate='$date' WHERE team_no=$teamno";
					if(mysqli_query($conn,$que)){
						echo "üpdated";
					}
				}else
					echo "File not uploaded";
			}else echo "File too large";
		}else echo "Upload error please try again";
	}else echo "File not supported";
}
?>
<html>
<head>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
<link rel="stylesheet" href="team.css" />
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
 <!-- imports start-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	   <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  <style>
  p,th,td,tr,a,span{
	   font-family: 'Josefin Sans', sans-serif;
  }
  html,body{
	  overflow-y:none;
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
  </style>
</head>
<body>
 
<div class="card navcard">
  <div class="card-content">
  <p id="titletext">Anurag Project Management</p>
  </div>
  <a class="waves-effect waves-light btn" style="float:right ; top:-35px;right:5px;" href="logout.php">Logout</a>
  </div>
 <div class="card sidecard">
 <div class="navtitle">
 <p style="color:#26a69a;position:relative;left:10px;margin-top:0;top:30px;">PROJECT TITLE</p>
 <i class="material-icons" style="position:relative;left:3px;top:30px;">account_circle</i><p style="display:inline-block;position:relative;top:25px;left:6px;"><?php echo $teammem1;?></p>
<i class="material-icons" style="position:relative;left:3px;display:list-item;top:30px;">account_circle</i><p style="display:inline-block;position:relative;top:-7px;left:32px;"><?php echo $teammem2;?></p>
 <i class="material-icons" style="position:relative;left:3px;top:-2px;display:list-item;">account_circle</i><p style="display:inline-block;position:relative;top:-38px;left:32px;"><?php echo $teammem3;?></p>
 </div>
 <p class="navnormtitle">
 Actions
 </p>
<div class="navlink" id="uploads" onclick="clickedupload()">
<span>
Uploads
</span>
</div>
<div class="navlink" id="reviews">
<span>
Reviews
</span>
  </div>
  </div>
  <script>
	 function clickedupload(){
		 $(".card.maincard").css("display","none");
		 $(".card.doccard").css("display","block");
		 $("#uploads").text("Home");
		 $("#uploads").attr("onclick","clickedhome()");
		  $("#srs").css({"left":"360px","top":"32px"});
		  $("div.card.uploadcard1.srs").css("display","none");
		  $("div.card.uploadcard").css("display","none");
	 }
	 function clickedhome(){
		  $(".card.maincard").css("display","block");
		 $(".card.doccard").css("display","none");
		 $("#uploads").text("Uploads");
		 $("#uploads").attr("onclick","clickedupload()");
		 $("#srs").css({"left":"360px","top":"32px"});
		 $(".card.uploadcard").css("display","none");
	 }
	 function srsupload(){
		// alert("clicked srs upload");
		$("#absc").css({"display":"none"});
		$("#srs").css({"left":"50px","top":"-182px"});
		
		$("div.card.uploadcard1.srs").css("display","block");
		}
	 function absupload(){
		// alert("clicked abs upload");
		$(".card.uploadcard").css("display","block");
		$("#srs").css("display","none");
	 }
	
	  </script>
  
<div class="card doccard" id="absc" style="width:250px;height:250px;position:relative;left:50px;float:left; margin-left:30px;top:30px;display:none;">
        <div class="card-image" style="width:250px;height:150px;">
          <img src="doc.jpg" width="250px" height="150px"/>
         
      <!--  <form action="team1.php" method="post" enctype="multipart/form-data">
		  <input type="file" name="file"/> 
		  <input type="submit"/>
		  </form>-->
		   <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="absupload()"><i class="material-icons">add</i></a>
        </div>
		
        <div class="card-content">
		 <span class="card-title">Abstract</span>
          <p>Last updated: <?php echo $absdate;?></p>
        </div>
      </div>
	  <div class="card uploadcard" style="width:400px;position:relative;left:700px;top:58px;height:200px;display:none;">
	  <div class="card-content" style="position:relative;width:100%;height:100%;">
	  <form action="team1.php" enctype="multipart/form-data" style="position:relative;top:-630px;" method="post">
	  <input type="file" name="file" /><br><br>
	  <button type="submit" >Upload</button>
	  </form>
	  </div>
	  </div>
	   <div class="card uploadcard1 srs" style="width:400px;position:relative;left:700px;top:58px;height:200px;display:none;">
	  <div class="card-content" style="position:relative;width:100%;height:100%;">
	  <form action="team1.php" enctype="multipart/form-data" style="position:relative;top:-630px;" method="post">
	  <input type="file" name="file1" /><br><br>
	  <button type="submit" >Upload</button>
	  </form>
	  </div>
	  </div>
	  <div class="card doccard" id="srs" style="width:250px;height:250px;position:relative;left:360px;float:left; margin-left:30px; top:32px;display:none;">
        <div class="card-image" style="width:250px;height:150px;">
          <img src="doc.jpg" width="250px" height="150px"/>
          
          <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="srsupload()"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
		<span class="card-title">SRS</span>
          <p>Last updated: <?php echo $srsdate;?></p>
        </div>
      </div>
	  
      <div class="card maincard" style="height:inherit;">
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
    
}
textarea{
	resize:none;
}
</style>
</head>
  <section>
  <?php
  if($row=mysqli_fetch_assoc($res)){
  ?>
 
    <table align="center" style="width:95%;">
      <thead>
        <tr>
          <th style="text-align:center;">WEEK</th>
          <th style="text-align:center;">TO DO</th>
         <th style="text-align:center;">GUIDE REMARKS</th>
		  <th style="text-align:center;" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="1:least 5:highest">RATING</th>
		 </tr>
		 
      </thead>
      <tbody>
        
          <td>week 1</td>
          <td>   Abstract/SRS</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week1"]; ?></textarea></td>
		  <td><?php echo $row["grade1"]; ?></td>
         
        </tr>
        <td>week 2</td>
          <td>Submission of project design
</td>
		  
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week2"]; ?></textarea></td>
		  <td><?php echo $row["grade2"]; ?></td>
         
        </tr>
        <td>week 3</td>
          <td>Review1(Presentation1)</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week3"]; ?></textarea></td>
		  <td><?php echo $row["grade3"]; ?></td>
         
        </tr>
        <td>week 4</td>
          <td>Module/Funcionality Implementation Explanation</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week4"]; ?></textarea></td>
		  <td><?php echo $row["grade4"]; ?></td>
         
        </tr>
          <td>week 5</td>
          <td>Module/Enhanced Functionality Implementation</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week5"]; ?></textarea></td>
		  <td><?php echo $row["grade5"]; ?></td>
         
        </tr>
         <td>week 6</td>
          <td>CodeExecution1</td>
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week6"]; ?></textarea></td>
		  <td><?php echo $row["grade6"]; ?></td>
         
        </tr>
        <td>week 7</td>
          <td>   Module/Enhanced Functionality Explanation</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week7"]; ?></textarea></td>
		  <td><?php echo $row["grade7"]; ?></td>
         
        </tr>
         <td>week 8</td>
          <td>Module/Enhanced Functionality Explanation  </td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week8"]; ?></textarea></td>
		  <td><?php echo $row["grade8"]; ?></td>
         
        </tr>
           <td>week 9</td>
          <td>   Review2(Presentation2)</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week9"]; ?></textarea></td>
		  <td><?php echo $row["grade9"]; ?></td>
         
        </tr>
        <td>week 10</td>
          <td>   Testing and Deployment</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week10"]; ?></textarea></td>
		  <td><?php echo $row["grade10"]; ?></td>
         
        </tr>
         <td>week 11</td>
          <td>   Preparation of Documentation</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week11"]; ?></textarea></td>
		  <td><?php echo $row["grade11"]; ?></td>
         
        </tr>
         <td>week 12</td>
          <td>   Submission of Documentation</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week12"]; ?></textarea></td>
		  <td><?php echo $row["grade12"]; ?></td>
         
        </tr>
          <td>week 13</td>
          <td>Final Evaluation</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week13"]; ?></textarea></td>
		  <td><?php echo $row["grade13"]; ?></td>
         
        </tr>
           <td>      </td>
          <td>   Project coordinator</td>
          
          <td><textarea rows="3" cols="70" readonly></textarea></td>
         
        </tr>

       
      </tbody>
    </table>
	<?php
  }?>
  </section>
</section>
</section>
	</p>
	  
</div>	 
	  


</body>
</html>