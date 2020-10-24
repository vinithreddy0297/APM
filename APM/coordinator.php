<?php
session_start();
if(!isset($_SESSION["coodname"])){
	header("Location:index.php");
}

$conn = mysqli_connect("localhost","root","","miniproject");
if(isset($_GET["section"]))
$sec=$_GET["section"];
else
	$sec="team_tabled";
$selectall="Select * from $sec ORDER BY team_no";
$res=mysqli_query($conn,$selectall);
?>
<html>
<head>
<link rel="stylesheet" href="team.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

     
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	   <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  <style>
	  .dropdown-button.btn{
		  background-color:#ee6e73 ;
		  position:relative;
		  top:20px;
		  left:20px;
	  }
	  .sectionn{
		  text-align:center;
		  
	  }
	  .highlight{
		  
		  position:relative;
	  }
	  p,th,td,tr,a,span{
	   font-family: 'Josefin Sans', sans-serif;
  }
  a.btn-floating,btn-large.red{
	  position:relative;
  }
	  </style>
</head>

<body>
<script>
window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
      
    }
};
</script>
 <div class="card navcard">
  <div class="card-content">
  <p id="titletext">Anurag Project Management</p>
  </div>
  <a class="waves-effect waves-light btn" style="float:right ; top:-35px;right:5px;" href="logout.php">Logout</a>
  </div>
<div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large red">
      <i class="material-icons">mode_edit</i>
    </a>
    <ul>
      <li class="waves-effect waves-light"><a href="coordinator.php?section=team_tableb">B</a></li>
      <li class="waves-effect waves-light"><a href="coordinator.php?section=team_tabled">D</a></li>
    </ul>
  </div>
    <table class="highlight centered bordered">
        <thead>
          <tr>
		      <th>Title</th>
              <th>Team</th>
              <th>Teamno</th>
              <th>Guide</th>
			  <th>Status</th>
			  <th>Grade</th>
          </tr>
        </thead>

        <tbody>
		<?php while($row=mysqli_fetch_array($res)){?>
          <tr onclick="window.location.href='viewteam.php?section=<?php echo $sec;?>&&tno=<?php echo $row["team_no"];?>'">
		  <td><?php echo $row["Title"];?></td>
            <td><?php echo $row["team_mem1"]?><br><?php echo $row["team_mem2"]?><br><?php echo $row["team_mem3"]?></td>
            <td><?php echo $row["team_no"]?></td>
			
            <td><?php echo $row["Guide"]?></td>
			<td><b>Last reviewed:</b><?php if(null!=($weekpre=$row["lastweek"])){
				echo $weekpre;
			}else{
			echo "Not Yet Reviewed";
			$weekpre="week1";}
			?>
			
		<br><br><b>Review:</b><?php echo $row["$weekpre"];?></td>
			<td>A</td>
          </tr>
          
		<?php }?>
         
        </tbody>
      </table>
        
</body>
</html>