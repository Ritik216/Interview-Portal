<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="javascript" href="data.js">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
  <script>
function test(){
  alert('hi');
}

</script>
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

  <section class="my-5">
    <div class="container">
      <form action="" method="POST">
        <div>
          <h2 class="text-center">Reschedule Interview</h2>
        </div><br><br>
        <?php
        include 'connection.php';
        $id=$_GET['id'];
                $Select = "SELECT * FROM meeting where id=$id";
                $query = mysqli_query($conn,$Select);
                $data = mysqli_fetch_array($query);
                ?>
                <label><b>Meeting Name : <?php echo $data['meetingName']?></b></label><br>
                <label><b>Date : <?php echo $data['mdate']?></b></label><br>
                <label><b>Start Time : <?php echo $data['startTime']?></b></label><br>
                <label><b>End Time : <?php echo $data['endTime']?></b></label><br>
                <label><b>Candidate : <?php echo $data['candidate']?></b></label><br>
                <label><b>Interviewer : <?php echo $data['interviewer']?></b></label><br>
        <div class="form-group">
          <div class="row">
            <div class="column">
            
              <label><b>Meeting Name</b></label>
              <input type="text" id="meeting2" name="meeting1" placeholder="meeting name"  class="form-control" required autofocus>
            </div>

            <div class="column">
              <label><b>Choose Date</b></label>
              <input type="date" name="mdate" placeholder="choose date" class="form-control">
            </div>
          </div><br>

          <div class="row">
            <div class="column">
              <label><b>Start Time</b></label>
              <input type="time" name="stime" placeholder="start time" class="form-control" required>
            </div>

            <div class="column">
              <label><b>End Time</b></label>
              <input type="time" name="etime" placeholder="end time" class="form-control" required>
            </div>
          </div><br>

          

          
          <div class="row">
            <div class="column">
              <label><b>Select Candidates</b></label>
              <input type="email" name="candidates" placeholder="choose date" value="<?php echo $data['candidate']?>"class="form-control">
              
               
              </select>
            </div>
            <div class="column">
              <label><b>Select Interviewers</b></label>
              <input type="email" name="interviewers" placeholder="choose date" value="<?php echo $data['interviewer']?>"class="form-control">
              
              </select>
            </div>
          </div><br>
          

          <br><br><br>

            <input type="submit" class="btn" value="Reschedule" name="reschedulemeeting">
          </form>
        </div>
      </section>
    </body>
    </html>




    <?php

    if (isset($_POST['reschedulemeeting'])) {
       $mName = $_POST['meeting1'];
       $date = $_POST['mdate'];
       $stime = $_POST['stime'];
       $etime = $_POST['etime'];
       $candidates=$_POST['candidates'];
       $interviewers=$_POST['interviewers'];

      $UPDATE = "UPDATE meeting SET meetingName = '$mName', mdate =  '$date', startTime = '$stime', endTime = '$etime' WHERE candidate='$candidates'";
      // $UPDATE = "UPDATE meeting SET meetingName = 'Ashish', mdate =  '2022-01-25', startTime = '11:00', endTime = '12:00' WHERE candidate='ashishsaini338680@gmail.com'";
      $query = mysqli_query($conn,$UPDATE);
      if ($query) {
        ?>
        <script>
          alert('Meeting rescheduled');
        </script>

        <?php
        header('location:home.php');
      }
      else {
        ?>
        <script>
          alert('Error');
        </script>

        <?php
      }
      
    }
    ?>