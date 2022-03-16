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
  alert('');


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
      <form action="" method="POST" >
        <div>
          <h2 class="text-center">Schedule a new interview</h2>
        </div><br><br>
        
        <div class="form-group">
          <div class="row">
            <div class="column">
              <label><b>Meeting Name</b></label>
              <input type="text" name="meeting" placeholder="meeting name"  class="form-control" required autofocus>
            </div>

            <div class="column">
              <label><b>Choose Date</b></label>
              <input type="date" name="date" placeholder="choose date" class="form-control">
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
              <select name="candidates" type="email" placeholder="Select Candidates" class="form-control">
              <?php
                include 'connection.php';
                $Select = "SELECT * FROM candidates";
                $query = mysqli_query($conn,$Select);
                while ($data = mysqli_fetch_array($query)){
                  echo "<option value=\"". $data['emailID'] ."\" >" . $data['emailID'] . "</option>";
                }
              ?>
               
              </select>
            </div>
            <div class="column">
              <label><b>Select Interviewers</b></label>
              <select name="interviewers" placeholder="Select Interviewer" class="form-control">
              <?php
                $Select = "SELECT * FROM interviewer";
                $query = mysqli_query($conn,$Select);
                while ($data = mysqli_fetch_array($query)){
                  echo "<option value=\"".$data['emailID']."\">" . $data['emailID'] . "</option>";
                }
              ?>
              </select>
            </div>
          </div><br>
          

          <br><br><br>

            <input type="submit" class="btn" value="Schedule Meeting" name="schedulemeeting" >
          </form>
        </div>
      </section>
    </body>
    </html>




    <?php

    if (isset($_POST['schedulemeeting'])) {
      $name = $_POST['meeting'];
      $date = $_POST['date'];
      $stime = $_POST['stime'];
      $etime = $_POST['etime'];
      $candidates = $_POST['candidates'];
      $interviewers = $_POST['interviewers'];

      $Select = "SELECT candidate FROM meeting WHERE candidate = ?";
      $Insert = "INSERT INTO meeting(meetingName, mdate, startTime, endTime, candidate, interviewer) values(?, ?, ?, ?, ?, ?)";




      $stmt = $conn->prepare($Select);
      $stmt->bind_param("s", $candidates);
      $stmt->execute();
      $stmt->bind_result($result);
      $stmt->store_result();
      $stmt->fetch();
      $rnum = $stmt->num_rows;

      if ($rnum == 0) {
        $stmt->close();

        $stmt = $conn->prepare($Insert);
        $stmt->bind_param("ssssss",$name, $date, $stime, $etime, $candidates, $interviewers);
        if ($stmt->execute()) {
          ?>
          <script>
            alert('Email sent to the candidate');
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
      else {
        ?>
        <script>
          alert('Candidate with given email already scheduled with interview');
        </script>

        <?php
        header('location:home.php');
      }

    }
    else {
    }
    
    $stmt->close();
    $conn->close();
    ?>


