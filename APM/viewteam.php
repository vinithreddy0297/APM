<?php
$conn = mysqli_connect("localhost","root","","miniproject");
session_start();
$sec=$_GET["section"];
$teamno=$_GET["tno"];
$ressql="select * from $sec where team_no=$teamno";
$ressql1="select * from $sec where team_no=$teamno";
$res1=mysqli_query($conn,$ressql1);
$res=mysqli_query($conn,$ressql);
?><html>
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
</head>
<body>
<div class="card navcard">
  <div class="card-content">

  <p style="position:relative;color:#fff;margin:0;float:left;left:600px;">SECTION:<?php echo substr($sec,-1); ?></p>
  
  </div>
  <button class="waves-effect waves-light btn" style="float:left; top:-35px;left:5px;" onclick="window.history.back()" >BACK</button>
  </div>
  <?php
  while($row=mysqli_fetch_array($res1)){
  ?>
  <div class="sidediv" style="background-color:#EEEEEE;width:250px;height:250px;position:fixed;float:left;top:150px;left:10px;">
  <center>
  <p class="title" style="position:relative;color:#26a69a;"><?php echo $row["Title"];?></p>
  <p class="mem1" style="position:relative;"><?php echo $row["team_mem1"];?></p>
  <p class="mem1" style="position:relative;"><?php echo $row["team_mem2"];?></p>
  <p class="mem1" style="position:relative;"><?php echo $row["team_mem3"];?></p>
  <p class="mentor" style="position:relative;"><?php echo $row["Guide"];?></p>
  </center>
  </div>
  <?php
  }
  ?>
<section style="position:relative;width:80%;left:260px;"> 
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
        <tr>
          <td>week 1</td>
          <td>   Abstract/SRS</td>
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week1"]; ?></textarea></td>
		  <td><?php echo $row["grade1"]; ?></td>
         
        </tr>
		<tr>
        <td>week 2</td>
          <td>Submission of project design
</td>
		  
          
          <td><textarea rows="3" cols="70" readonly><?php echo $row["week2"]; ?></textarea></td>
		  <td><?php echo $row["grade2"]; ?></td>
         
        </tr>
		<tr>
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
</body>
</html>