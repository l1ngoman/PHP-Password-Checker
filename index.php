<?php
require './credential_checker.php';
$checker = new Checker;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="index.css">
  <title>PHP Login Form</title>
</head>

<body>
  <main class="formContainer">
    <h1>Credential Checker</h1>
    <h3>Username and password must be longer than 6 characters.</h3>
    <h3>Username and password cannot be the same.</h3>
    <h3>Username cannot contain $, @, or #.</h3>
    <h3>Password must contain $, @, or #.</h3>
    <form>
      
        <?php
          if($_GET)
          {
            $checker->evaluate($_GET['username'],$_GET['password']);
            echo "<div class='errors'>".
              $checker->errors[0].
            "</div>";
          }
          if($checker->login_success)
          {
            echo '<script>window.location.href = "/credential_checker/success.html";</script>';
          }
        ?>
      <div class="formGroup">
        <label name="username">
          Username
        </label>
        <input name="username" type="text" required>
      </div>
      <div class="formGroup">
        <label name="password">
          Password
        </label>
        <input name="password" type="password" required>
      </div>
      <div class="formGroup">
        <input type="submit">
      </div>
    </form>
  </main>

</body>

</html>