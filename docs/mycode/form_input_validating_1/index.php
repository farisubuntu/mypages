<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Form - Santitize / Validating input</title>
 
</head>

<body>
 <h3>Form - Santitize / Validating input</h3>
 <form action="index.php" method="post">
  <div>
   username:<br>
   <input type="text" name="username" id="username"><br>
   <input type="number" name="age" id="age"><br>
   <input type="submit" value="Login" name="login">
  </div>
 </form>


</body>

</html>

<?php
// isset($var): determine if a variable is declared and have a value other than 'null'
if (isset($_POST["login"])) {
 /* use code below to 
   1. prevent execute code such as: <script>alert("Virus...");</script> inserted into username text box
   2. prevent entering a non integer number into age text box
  */
  // for more about filters IDs and types see https://php.net/manual/en/filter.constants.php
 $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
 $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
 // check if filtered field is empty:
 if (empty($username) || empty($age)) {
  echo "your username/age is not valid";
 } else {
  echo "Your name: " . $username . "<br>Your age: " . $age;
 }
}


?>