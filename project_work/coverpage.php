<!DOCTYPE html>
<html>
<head>
  <title>Your Website</title>
  <!-- Add any necessary CSS stylesheets or other PHP includes -->
</head>
<body>
  <header>
    <h1>Welcome to Your Website</h1>
  </header>
  <main>
    <div id="button-container">
      <button id="patient-button">Patient</button>
      <button id="doctor-button">Doctor</button>
      <button id="supervisor-button">Supervisor</button>
      <button id="pharmacist-button">Pharmacist</button>
    </div>
  </main>

  <?php
    // Check if a button is clicked and redirect accordingly
    if (isset($_POST['buttonClicked'])) {
      $buttonClicked = $_POST['buttonClicked'];

      if ($buttonClicked === 'patient') {
        header("Location: patient-login.php");
        exit();
      } elseif ($buttonClicked === 'doctor') {
        header("Location: doctor-login.php");
        exit();
      } elseif ($buttonClicked === 'supervisor') {
        header("Location: supervisor-login.php");
        exit();
      } elseif ($buttonClicked === 'pharmacist') {
        header("Location: pharmacist-login.php");
        exit();
      }
    }
  ?>

  <script>
    // Add click event listeners to the buttons and submit the form with the clicked button value
    var patientButton = document.getElementById("patient-button");
    var doctorButton = document.getElementById("doctor-button");
    var supervisorButton = document.getElementById("supervisor-button");
    var pharmacistButton = document.getElementById("pharmacist-button");

    patientButton.addEventListener("click", function() {
      document.getElementById('buttonClicked').value = 'patient';
      document.getElementById('buttonForm').submit();
    });

    doctorButton.addEventListener("click", function() {
      document.getElementById('buttonClicked').value = 'doctor';
      document.getElementById('buttonForm').submit();
    });

    supervisorButton.addEventListener("click", function() {
      document.getElementById('buttonClicked').value = 'supervisor';
      document.getElementById('buttonForm').submit();
    });

    pharmacistButton.addEventListener("click", function() {
      document.getElementById('buttonClicked').value = 'pharmacist';
      document.getElementById('buttonForm').submit();
    });
  </script>

  <form id="buttonForm" method="post">
    <input type="hidden" id="buttonClicked" name="buttonClicked" value="">
  </form>
</body>
</html>
