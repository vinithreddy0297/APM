<?php
session_start();
if(isset($_SESSION["teammem1"])){
//echo $_SESSION["guide"];
//echo $_SESSION["teammem1"];
}else{
	header("Location:index.php");
}
?>
<html>
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<link rel="stylesheet" href="team.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  <style>
  div.card.maincard{
	  position:absolute;
	  left:400px;
	  top:91px;
	  width:600px;
	  height:400px;
	 
  }
  
  </style>
</head>
<body>
<div class="card navcard">
  <div class="card-content">
  <p id="titletext">Anurag Project Management</p>
  </div>
  </div>
<div class="card doccard" style="width:250px;height:250px;position:relative;left:10px;float:left; margin-left:30px;top:30px;border:0.5px solid black;">
        <div class="card-image" style="width:250px;height:150px;">
          <img src="doc.jpg" width="250px" height="150px"/>
         
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
		
        <div class="card-content">
		 <span class="card-title">Abstract</span>
          <p>Last updated</p>
        </div>
      </div>
	  <div class="card doccard" id="srs" style="width:250px;height:250px;position:relative;left:-270px;float:left; margin-left:30px; top:320px;border:0.5px solid black;">
        <div class="card-image" style="width:250px;height:150px;">
          <img src="doc.jpg" width="250px" height="150px"/>
          
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
		<span class="card-title">SRS</span>
          <p>Last updated</p>
        </div>
      </div>
      <div class="card maincard">
	  <p class="card-content" style="position: relative;top: -15px; min-height:20px;">
	  <div class="row" style="position:relative;top:-114px;left:58px;width:400px">
			<div class="input-field col s12">
          <input id="text" type="text" name="id">
	
		  </div>
        </div>
	</p>
	  
</div>	  
	  
	  

</body>
</html>