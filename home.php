<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="homeStyle.css">
  <link rel="javascript" href="data.js">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 

</head>
<body>	
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Interview Creation Portal</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="scheduleMeeting.php">Schedule New Interview <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
<form action="" method="POST">
  <div class="interview-list">
        <h1>Upcoming Interviews</h1>
  <?php


include 'connection.php';
              $Select = "SELECT * FROM meeting";
              $query = mysqli_query($conn,$Select);
              $count=1;
              while ($data = mysqli_fetch_array($query)){
              ?>
  
        <div class="interview-preview">
            <a href="/interview/7d303d54-fbc8-4ca9-af50-67fc437601af" style="text-decoration: none;">
            <div>
 
  
               <h2>Interview<?php echo $count ?></h2>
               <p>Date: <?php echo $data['mdate'] ?></p>
               <p>StartTime: <?php echo $data['startTime'] ?></p>
               <p>EndTime: <?php echo $data['endTime'] ?></p>
               <p>Candidate: <?php echo $data['candidate'] ?></p>
               <p>Interviewer: <?php echo $data['interviewer'] ?></p>
               </div></a>
               <a href="rescheduleMeeting.php?id=<?php echo $data['id']?>">
               Reschedule or Edit
               </a>
               <a href="deleteMeeting.php?id=<?php echo $data['id']?>">
               Delete
               </a>
               
               </div>
               </div>
               <?php
               $count++;
}
?>
</form>
    </body>
    </html>



    