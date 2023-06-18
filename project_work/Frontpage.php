<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['userType'])) {
    $userType = $_POST['userType'];
    
    switch ($userType) {
      case 'patient':
        header('Location: loginpatinet.html');
        exit();
      case 'doctor':
        header('Location: doctor-login.php');
        exit();
      case 'supervisor':
        header('Location: supervisor-login.php');
        exit();
      case 'pharmacist':
        header('Location: pharmacist-login.php');
        exit();
      default:
        // Handle any other user types or show an error message
        break;
    }
  }
}
?>
