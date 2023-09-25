<?php
// Include script to make a database connection
include("connect.php");
// Check if input fileds are empty
if(empty($_POST['name']) && empty($_POST['email'])){
    // If the fields are empty, display a message to the user
    echo "Please fill in the fields";
// Process the form data if the input fields are not empty
}else{
    $name= $_POST['name'];
    $email= $_POST['email'];
    echo ('Your Name is:     '. $name. '<br/>');
    echo ('Your Email is:'   . $email. '<br/>');
    # Insert into the database
    $query = "INSERT INTO user(name,email) VALUES ('$name','$email')";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully !";
    } else {
         echo "Error inserting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FORMS</title>
</head>
<body>
    <h1>Form</h1>
    <form method="post" action="form-post.php">
        Name: <input type="text" name="name"><br><br/>
        Email: <input type="text" name="email"><br/>
        <br/>
        <input type="submit" name="save" value="submit" >
    </form>
</body>
</html>